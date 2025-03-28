{{-- <!DOCTYPE html>
<html lang="en">
<head>
  <title>List Makanan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
   <div class="container">  --}}
@extends('layouts.adminlte4')
  
@section('title')
  Daftar Makanan
  @endsection

@section('makanan')
active
@endsection

@section('content')
  <table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Makanan</th>
        <th>Nama Kategori</th>
        <th>Deskripsi</th>
        <th>Nutrisi</th>
        <th>Harga</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($foods as $f)
        <tr>
            <td>{{ $f->id }}</td>
            <td> <a href="{{ route('listmakanan.show', $f->id) }}">{{ $f->name }} </a></td>
            <td>{{ $f->category->name}}</td>
            <td>{{ $f->description }}</td>
            <td>{{ $f->nutrition_fact }}</td>
            <td>{{ $f->price }}</td>
        </tr>
        @endforeach
    </tbody>
  </table>
@endsection
{{-- </div>
</body>
</html> --}}
