{{-- <!DOCTYPE html>
<html lang="en">
<head>
  <title>List Kategori</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body> 
  <div class="container"> --}}
@extends('layouts.adminlte4')

@section('title')
  Daftar Kategori
  @endsection

@section('kategori')
active
@endsection

@section('content')
  <table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Jenis</th>
        <th>Jumlah Makanan</th>
        <th>List Nama Makanan</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($category as $c)
        <tr>
            <td>{{ $c->id }}</td>
            <td>{{ $c->name }}</td>
            <td>{{ count($c->foods)}}</td>
            <td>
              <ul>
                @foreach ($c->foods as $cf)
                <li>{{$cf->name}}</li>
                @endforeach
              </ul>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
@endsection
{{-- </div> 
</body>
</html> --}}
