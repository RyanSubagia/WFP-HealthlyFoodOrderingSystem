@extends('layouts/main')

@section('title')
Admin Transaction
@endsection

@section('container')
                @if($transaction)
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
                    </div>
                @else
                    <div class="alert alert-info">Belum ada data customer</div>
                @endif
@endsection