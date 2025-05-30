@extends('layouts.main')

@section('title')
Menu
@endsection

@section('container')
<h1> Halaman Menu </h1>
<div class="container-fluid">
  <h2 class="mb-4">Pilih Menu Makanan</h2>
  <div class="row">
    @foreach ($foods as $f)
      <div class="col-md-4 mb-4">
        <div class="card h-100" data-toggle="modal" data-target="#modalFood{{ $f->id }}" style="cursor:pointer;">
<img class="img-fluid mx-auto d-block" style="max-height: 200px; object-fit: contain;" 
     src="{{ $f->image ? asset('storage/menu_sushi/' . $f->image) : 'https://via.placeholder.com/300x250?text=No+Image' }}"
     alt="{{ $f->name }}">

          <div class="card-body">
            <h5 class="card-title">{{ $f->name }}</h5>
            <p class="card-text">
              <strong>Kategori:</strong> {{ $f->category->name }}<br>
              <strong>Harga:</strong> Rp. {{ $f->price }},-
            </p>
          </div>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="modalFood{{ $f->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel{{ $f->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalLabel{{ $f->id }}">{{ $f->name }}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <img src="{{ $f->image ? asset('storage/menu_sushi/' . $f->image) : 'https://via.placeholder.com/600x300?text=No+Image' }}" class="img-fluid mb-3" alt="{{ $f->name }}">
              <p><strong>Deskripsi:</strong> {{ $f->description }}</p>
              <p><strong>Fakta Nutrisi:</strong> {{ $f->nutrition_fact }}</p>
              <p><strong>Harga:</strong> Rp. {{ $f->price }},-</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection


