@extends('layouts/main')

@section('title')
Admin Customer
@endsection

@section('container')
<h1 class="card-title">Customer</h1>
                @if($customer->count())
                <div class="container-admin-table">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Point</th>
                                    <th>Telephone Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customer as $c)
                                   <tr>
                                        <td>
                                            {{ $c->id }}
                                        </td>
                                        <td>
                                            {{ $c->name }}
                                        </td>
                                        <td>
                                            {{ $c->email }}
                                        </td>
                                        <td>
                                            {{ $c->poin }}
                                        </td>
                                        <td>
                                            {{ $c->no_telp }}
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center mt-4">
                            {{ $customer->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
                @else
                    <div class="alert alert-info">Belum ada data customer</div>
                @endif
@endsection