@extends('layouts.main')

@section('title')
Admin Transaction
@endsection

@section('container')
<h1 class="card-title">Order</h1>
                @if($transaction)
                <div class="container-admin-table">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Total (Rp.)</th>
                            <th>Order Date</th>
                            <th>Table Number</th>
                            <th>Method</th>
                            <th>Status</th>
                            <th>Details</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($transaction as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->total }}</td>
                            <td>{{ $item->tgl_Pemesanan }}</td>
                            <td>{{ $item->no_meja }}</td>
                            <td>{{ $item->metode_Pemesanan }}</td>
                            <td>
                                @php
                                    // status berikutnya
                                    $next = \App\Models\Transaction::NEXT_STATUS[$item->status] ?? null;
                                @endphp

                                {{-- Jika masih bisa berubah --}}
                                @if ($next)
                                    <form action="{{ route('admin.orders.updateStatus', $item->id) }}" method="POST">
                                        @csrf @method('PATCH')

                                        <select name="status"
                                                class="form-select form-select-sm"
                                                onchange="this.form.submit()">
                                            {{-- tampilkan status sekarang tapi non‑pilih --}}
                                            <option selected disabled>{{ ucfirst($item->status) }}</option>
                                            {{-- pilihan satu‑satunya → status berikut --}}
                                            <option value="{{ $next }}">{{ ucfirst($next) }}</option>
                                        </select>
                                    </form>
                                @else
                                    {{-- Sudah completed – tidak bisa diubah --}}
                                    @php
                                        $status = strtolower($item->status);
                                        $badgeClass = match ($status) {
                                            'pending'    => 'bg-warning text-dark',
                                            'processing' => 'bg-primary',
                                            'ready'      => 'bg-info text-dark',
                                            'completed'  => 'bg-success',
                                            'cancelled'  => 'bg-danger', // merah
                                            default      => 'bg-secondary',
                                        };
                                    @endphp

                                    <span class="badge {{ $badgeClass }}">
                                        {{ ucfirst($status) }}
                                    </span>

                                @endif
                            </td>


                            <td>
                                <a href="{{ route('admin.orders.details', $item->id) }}"
                                    class="btn btn-sm btn-primary">
                                    Details
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>

                        </table>
                        <div class="d-flex justify-content-center mt-4">
                            {{ $transaction->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
                @else
                    <div class="alert alert-info">Belum ada data customer</div>
                @endif
@endsection