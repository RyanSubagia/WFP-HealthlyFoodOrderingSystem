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
                            <th>Total</th>
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
                            <td>{{ $item->status }}</td>
                            <td>
                                <a href="{{ route('orders.details', $item->id) }}"
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