@extends('layouts.main')

@section('title')
My Cart
@endsection

@section('container')

    <section class="about-hero position-relative">
        <div class="container-fluid p-0">
            <div class="hero-overlay d-flex align-items-center justify-content-center text-center"
                 style="background-image: url('{{ asset('img/illustration/background_about.png') }}'); background-size: cover; background-position: center; height: 400px; position: relative;">
                <div style="background-color: rgba(0,0,0,0.5); position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></div>
                <div class="position-relative" style="z-index: 2;">
                    <h1 class="display-4 fw-bold text-white mb-2">My Cart</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Cart content section -->
    <section class="py-5 bg-light">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success text-center">{{ session('success') }}</div>
            @endif

            @if($carts->isEmpty())
                <div class="alert alert-info text-center">
                    Keranjang kamu masih kosong.
                </div>
            @else
                <div class="table-responsive mb-4">
                    <table class="table table-bordered align-middle bg-white">
                        <thead class="table-light">
                            <tr>
                                <th>Gambar</th>
                                <th>Nama Makanan</th>
                                <th>Ukuran</th>
                                <th>Catatan</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $grandTotal = 0; @endphp
                            @foreach ($carts as $item)
                                @php
                                    $total = $item->food->price * $item->quantity;
                                    $grandTotal += $total;
                                @endphp
                                <tr>
                                    <td style="width: 100px;">
                                        <img src="{{ asset('storage/menu_sushi/' . $item->food->image) }}" alt="{{ $item->food->name }}"
                                             class="img-fluid rounded" style="max-height: 80px;">
                                    </td>
                                    <td>{{ $item->food->name }}</td>
                                    <td>{{ $item->size }}</td>
                                    <td>{{ $item->note ?? '-' }}</td>
                                    <td>Rp {{ number_format($item->food->price, 0, ',', '.') }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>Rp {{ number_format($total, 0, ',', '.') }}</td>
                                    <td>
                                        <a href="#" value="Delete" class="btn btn-danger" 
                                          onclick="if(confirm('Yakin ingin menghapus {{ $item->name }} dari keranjang? ')) deleteCartItem({{ $item->id }})">
                                            <i class="fas fa-trash-alt me-1"></i>✕</a>
                                        <script>
                                            function deleteCartItem(id) {
                                                $.ajax({
                                                    type: 'POST',
                                                    url: '{{ route("customer.cart.destroy") }}',
                                                    data: {
                                                        _token: '{{ csrf_token() }}',
                                                        id: id
                                                    },
                                                    success: function (data) {
                                                        if (data.status === 'oke') {
                                                            location.reload();
                                                        }
                                                    },
                                                    error: function (xhr) {
                                                        console.error(xhr.responseText);
                                                        alert('Gagal menghapus item.');
                                                    }
                                                });
                                            }
                                        </script>   
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="6" class="text-end fw-bold">Total Keseluruhan:</td>
                                <td class="fw-bold">Rp {{ number_format($grandTotal, 0, ',', '.') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Checkout form -->
                <form action="{{ route('customer.cart.checkout') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="type" class="form-label"><strong>Tipe Pemesanan</strong></label>
                        <select name="type" id="type" class="form-select" onchange="toggleTableInput(this.value)" required>
                            <option value="Take-Away">Take Away</option>
                            <option value="Dine-In">Dine In</option>
                        </select>
                    </div>

                    <div class="mb-3" id="table-number-group" style="display: none;">
                        <label for="table_number" class="form-label">Nomor Meja</label>
                        <input type="text" name="table_number" id="table_number" class="form-control" placeholder="Contoh: A12">
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-success px-4">Checkout</button>
                    </div>
                </form>

                <script>
                    function toggleTableInput(value) {
                        const tableGroup = document.getElementById('table-number-group');
                        tableGroup.style.display = (value === 'Dine-In') ? 'block' : 'none';
                    }
                </script>
            @endif
        </div>
    </section>
@endsection
