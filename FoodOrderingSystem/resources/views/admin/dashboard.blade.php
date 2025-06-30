@extends('layouts.main')

@section('title')
Admin Dashboard
@endsection

@section('container')
    <h1>Dashboard </h1>
    <ul class="show">
        <li class="item">Most products by category: <strong>{{ $mostFood->name ?? '-' }}</strong></li>
        <li class="item">Most active member: <strong>{{ $mostActiveMember->name ?? '-' }}</strong></li>
        <li class="item">Member with the most purchases: <strong>{{ $mostPurchasingMember->name ?? '-' }}</strong></li>
        <li class="item">Total Revenue: <strong>Rp{{ number_format($totalRevenue, 0, ',', '.') }}</strong></li>
        <li class="item">Best selling products: <strong>{{ $topProduct->name ?? '-' }}</strong></li>
        <li class="item">Products that need to be endorsed: <strong>{{ $endorseProduct->name ?? '-' }}</strong></li>
    </ul>

@endsection