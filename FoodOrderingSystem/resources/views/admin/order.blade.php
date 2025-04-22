@extends('layouts/main')

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
                                    <th>Id</th>
                                    <th>total</th>
                                    <th>tgl Pemesanan</th>
                                    <th>No Meja</th>
                                    <th>Metode Pemesanan</th>
                                    <th>Status</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaction as $item)
                                   <tr>
                                        <td>
                                            {{ $item->id }}
                                        </td>
                                        <td>
                                            {{ $item->total }}
                                        </td>
                                        <td>
                                            {{ $item->tgl_Pemesanan }}
                                        </td>
                                        <td>
                                            {{ $item->no_meja }}
                                        </td>
                                        <td>
                                            {{ $item->metode_Pemesanan }}
                                        </td>
                                        <td>
                                            {{ $item->status }}
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