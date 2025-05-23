@extends('layouts.main')

@section('title')
Daftar Makanan
@endsection

@section('makanan')
active
@endsection

@section('container')
<div class="container py-4" >
  <h2 class="mb-4 ">Pilih Menu Makanan</h2>
  <div class="row" >
    @foreach ($foods as $f)
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow" data-toggle="modal" data-target="#modalFood{{ $f->id }}" style="cursor:pointer;">
          <img
            src="{{ asset($f->image ?? 'img/menu_sushi/default.jpg') }}"
            class="card-img-top"
            alt="{{ $f->name }}"
            style="object-fit: cover; height: 200px;"
            onerror="this.onerror=null; this.src='{{ asset('img/menu_sushi/default.jpg') }}';"
          >
          <div class="card-body">
            <h5 class="card-title">{{ $f->name }}</h5>
            <p class="card-text">
              <strong>Kategori:</strong> {{ $f->category->name }}<br>
              <strong>Harga:</strong> Rp. {{ number_format($f->price) }},-
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
              <img
                src="{{ asset($f->image ?? 'img/menu_sushi/default.jpg') }}"
                class="img-fluid mb-3"
                alt="{{ $f->name }}"
                onerror="this.onerror=null; this.src='{{ asset('img/menu_sushi/default.jpg') }}';"
              >
              <p><strong>Deskripsi:</strong> {{ $f->description }}</p>
              <p><strong>Fakta Nutrisi:</strong> {{ $f->nutrition_fact }}</p>
              <p><strong>Harga:</strong> Rp. {{ number_format($f->price) }},-</p>
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
