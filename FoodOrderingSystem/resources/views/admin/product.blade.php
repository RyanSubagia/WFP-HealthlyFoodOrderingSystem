@extends('layouts/main')

@section('title')
Admin Product
@endsection

@section('container')
                @if($food)
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
                    </div>
                @else
                    <div class="alert alert-info">Belum ada data customer</div>
                @endif
@endsection