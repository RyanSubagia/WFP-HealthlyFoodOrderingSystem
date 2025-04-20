{{-- <!DOCTYPE html>
<html lang="en">
<head>
  <title>List Customer</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Tabel customer</h2>          --}}

@extends('layouts.adminlte4')

@section('title')
  Daftar Pelanggan
  @endsection

@section('customer')
active
@endsection

@section('container')
  <table class="table table-hover">
    <thead>
      <tr>
        @extends('layouts.adminlte4')

@section('title')
  Daftar Pelanggan
  @endsection

@section('customer')
active
@endsection

@section('container')
  <table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nama</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($user as $u)
        <tr>
            <td>{{ $u->id }}</td>
            <td>{{ $u->name }}</td>
        </tr>
        @endforeach
    </tbody>
  </table>
@endsection
    </tbody>
  </table>
@endsection
{{-- </div>
</body>
</html> --}}
