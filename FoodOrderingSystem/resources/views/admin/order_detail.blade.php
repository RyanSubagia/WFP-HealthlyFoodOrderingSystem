@extends('layouts.main')

@section('title', 'Order #'.$transaction->id.' – Detail')

@section('container')
    <h1 class="card-title mb-4">Detail Order #{{ $transaction->id }}</h1>

    {{-- Info ringkas transaksi --}}
    <div class="mb-3">
        <strong>Tanggal:</strong> {{ $transaction->tgl_Pemesanan }}<br>
        <strong>Total (Rp):</strong> {{ number_format($transaction->total, 0, ',', '.') }}<br>
        <strong>Status:</strong> {{ ucfirst($transaction->status) }}
    </div>

    {{-- Tabel item transaksi --}}
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Food</th>
                    <th>Size</th>
                    <th>Note</th>
                    <th>Qty</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($items as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->food->name ?? '—' }}</td>
                    <td>{{ $row->size }}</td>
                    <td>{{ $row->note ?: '—' }}</td>
                    <td>{{ $row->quantity }}</td>
                    <td>{{ number_format($row->price, 0, ',', '.') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">← Back</a>
@endsection
