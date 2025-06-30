@extends('layouts.main')

@section('title', 'My Cart')

@section('container')
<section class="about-hero position-relative">
    <div class="container-fluid p-0">
        <div class="hero-overlay d-flex align-items-center justify-content-center text-center"
             style="background-image: url('{{ asset('img/illustration/background_about.png') }}'); background-size: cover; background-position: center; height: 400px;">
            <div style="background-color: rgba(0,0,0,0.5); position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></div>
            <div class="position-relative" style="z-index: 2;">
                <h1 class="display-4 fw-bold text-white mb-2">My Cart</h1>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">

        {{-- Success Message --}}
        @if (session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if ($carts->isEmpty())
            <div class="alert alert-info text-center">Keranjang kamu masih kosong.</div>
        @else
            <div class="table-responsive mb-4">
                <table class="table table-bordered align-middle bg-white">
                    <thead class="table-light">
                        <tr>
                            <th>Gambar</th>
                            <th>Nama</th>
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
                                $price = $item->food->price;
                                if ($item->size === 'L') {
                                    $price += 5000;
                                }
                                $total = $price * $item->quantity;
                                $grandTotal += $total;
                            @endphp
                            <tr>
                                <td><img src="{{ asset('storage/menu_sushi/' . $item->food->image) }}" class="img-fluid" style="max-height: 80px;"></td>
                                <td>{{ $item->food->name }}</td>
                                <td>{{ $item->size }}</td>
                                <td>{{ $item->note ?? '-' }}</td>
                                <td>Rp {{ number_format($price, 0, ',', '.') }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>Rp {{ number_format($total, 0, ',', '.') }}</td>
                                <td>
                                    <button class="btn btn-danger" onclick="deleteCartItem({{ $item->id }})">✕</button>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="6" class="text-end fw-bold">Total:</td>
                            <td class="fw-bold">Rp {{ number_format($grandTotal, 0, ',', '.') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- Checkout Form --}}
            <form action="{{ route('customer.cart.checkout') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="type" class="form-label"><strong>Tipe Pemesanan</strong></label>
                    <select name="type" id="type" class="form-select" onchange="toggleTableInput(this.value)" required>
                        <option value="Take-Away">Take-Away</option>
                        <option value="Dine-In" selected>Dine-In</option>
                    </select>
                    @error('type')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3" id="table-number-group">
                    <label for="table_number" class="form-label">Nomor Meja</label>
                    <input type="text" name="table_number" id="table_number" class="form-control" placeholder="Contoh: A12">
                    @error('table_number')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="payments_id" class="form-label"><strong>Metode Pembayaran</strong></label>
                    <select name="payments_id" id="payments_id" class="form-select" required>
                        <option value="">-- Pilih Metode Pembayaran --</option>
                        @foreach ($paymentMethods as $payment)
                            <option value="{{ $payment->id }}">{{ $payment->nama }}</option>
                        @endforeach
                    </select>
                    @error('payments_id')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success px-4">Checkout</button>
                </div>
            </form>

            {{-- JavaScript --}}
            <script>
                function toggleTableInput(value) {
                    const group = document.getElementById('table-number-group');
                    const input = document.getElementById('table_number');

                    if (value === 'Dine-In') {
                        group.style.display = 'block';
                        input.setAttribute('required', 'required');
                    } else {
                        group.style.display = 'none';
                        input.removeAttribute('required');
                        input.value = '';
                    }
                }

                // Jalankan sekali saat halaman dibuka untuk set default ke Dine-In
                document.addEventListener("DOMContentLoaded", function () {
                    toggleTableInput("Dine-In");
                });

                function deleteCartItem(id) {
                    if (confirm("Yakin ingin menghapus item ini?")) {
                        fetch("{{ route('customer.cart.destroy') }}", {
                            method: "POST",
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({ id })
                        }).then(res => res.json())
                          .then(data => {
                              if (data.status === "oke") location.reload();
                              else alert("Gagal menghapus");
                          });
                    }
                }
            </script>
        @endif
    </div>
</section>
@endsection
