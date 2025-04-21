@extends('layouts.main')
{{-- @extends('layouts.adminlte4') --}}

@section('title')
  Daftar Makanan
  @endsection

@section('makanan')
active
@endsection

@section('container')
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
            <td> <a href="{{ route('menu.show', $f->id) }}">{{ $f->name }} </a></td>
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
