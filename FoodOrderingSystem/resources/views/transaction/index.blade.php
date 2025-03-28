@extends('layouts.adminlte4')

@section('title')
  Daftar Transaksi
  @endsection

@section('transaction')
active
@endsection

@section('content')
  <table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Makanan</th>
        <th>Harga</th>
        <th>Nama Pembeli</th>
      </tr>
    </thead>
    <tbody>
        {{-- @foreach ($foods as $f)
        <tr>
            <td>{{ $f->id }}</td>
            <td>{{ $f->name }}</td>
            <td>{{ $f->category_id }}</td>
            <td>{{ $f->description }}</td>
            <td>{{ $f->nutrition_fact }}</td>
            <td>{{ $f->price }}</td>
        </tr>
        @endforeach --}}
    </tbody>
  </table>
@endsection