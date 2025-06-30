@extends('layouts.main')

@section('title')
Admin Dashboard
@endsection

@section('container')
    <h1> Halaman Dashboard </h1>
    <ul class="show">
        <li class="item">Produk terbanyak berdasarkan kategori: <strong>{{ $mostFood->name ?? '-' }}</strong></li>
        <li class="item">Member teraktif: <strong>{{ $mostActiveMember->name ?? '-' }}</strong></li>
        <li class="item">Member dengan pembelian terbanyak: <strong>{{ $mostPurchasingMember->name ?? '-' }}</strong></li>
        <li class="item">Total Omzet: <strong>Rp{{ number_format($totalRevenue, 0, ',', '.') }}</strong></li>
        <li class="item">Produk terlaris: <strong>{{ $topProduct->name ?? '-' }}</strong></li>
        <li class="item">Produk yang perlu diendorse: <strong>{{ $endorseProduct->name ?? '-' }}</strong></li>
    </ul>

@endsection