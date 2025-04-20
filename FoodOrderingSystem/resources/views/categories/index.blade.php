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

@section('container')
  <table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Foto Makanan</th>
        <th>Jenis</th>
        <th>Jumlah Makanan</th>
        <th>List Nama Makanan</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($category as $c)
        <tr>
            <td>{{ $c->id }}</td>
            <td>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" 
              data-bs-target="#imageModal-{{ $c->id }}">
            Show
              </button>
              @push ('modals')
              <!-- Modal {{ $c->id }} -->
              <div class="modal fade" id="imageModal-{{ $c->id }}" tabindex="-1" aria-labelledby="imageModalLabel" 
              aria-hidden="true">
              <div class="modal-dialog">
              <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="imageModalLabel">Gambar untuk Kategori {{$c->id}} </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                <img class="img-responsive" style="max-height:250px;" src="{{ asset('storage/category/'.$c->image) }}" />
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      @endpush
            </td>
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
