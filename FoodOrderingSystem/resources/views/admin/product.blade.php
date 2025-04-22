@extends('layouts/main')

@section('title')
Admin Product
@endsection

@section('container')
<h1 class="card-title">Products</h1>
                @if($food)
                <div class="container-admin-table">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nama Produk</th>
                                    <th>Nutrition Fact</th>
                                    <th>description</th>
                                    <th>Price</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($food as $item)
                                   <tr>
                                        <td>
                                            {{ $item->id }}
                                        </td>
                                        <td>
                                            {{ $item->name }}
                                        </td>
                                        <td>
                                            {{ $item->nutrition_fact }}
                                        </td>
                                        <td>
                                            {{ $item->description }}
                                        </td>
                                        <td>
                                            {{ $item->price }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center mt-4">
                            {{ $food->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
                @else
                    <div class="alert alert-info">Belum ada data customer</div>
                @endif
@endsection