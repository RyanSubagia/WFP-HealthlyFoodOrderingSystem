@extends('layouts.main')

@section('title', 'Riwayat Pesanan')

@section('container')
    <div class="container py-5">
        <h2 class="mb-4">Riwayat Pesanan Saya</h2>

        @forelse ($transactions as $tx)
            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-primary text-white d-flex justify-content-between">
                    <span><strong>Pesanan #{{ $tx->id }}</strong> • {{ $tx->created_at->format('d M Y H:i') }}</span>
                    <span class="badge bg-warning text-dark">{{ $tx->status }}</span>
                </div>
                <div class="card-body">
                    <p><strong>Metode:</strong> {{ $tx->metode_Pemesanan }} 
                        @if($tx->type == 'Dine In') • Meja: {{ $tx->table_number }} @endif
                    </p>
                    <p><strong>Pembayaran:</strong> {{ $tx->payment->method ?? 'N/A' }}</p>

                    <ul class="list-group mb-3">
                        @foreach ($tx->items as $item)
                            <li class="list-group-item d-flex justify-content-between">
                                <div>
                                    {{ $item->food->name }} ({{ $item->size }}) - <small>{{ $item->note ?? '-' }}</small>
                                </div>
                                <span>Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</span>
                            </li>
                        @endforeach
                    </ul>

                    <div class="text-end fw-bold">
                        Total: Rp {{ number_format($tx->total, 0, ',', '.') }}
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center">Belum ada pesanan.</p>
        @endforelse
    </div>
@endsection