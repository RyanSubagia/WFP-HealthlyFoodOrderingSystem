@extends('layouts/main')

@section('title')
Admin Customer
@endsection

@section('container')
                @if($customer)
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
                    </div>
                @else
                    <div class="alert alert-info">Belum ada data customer</div>
                @endif
@endsection