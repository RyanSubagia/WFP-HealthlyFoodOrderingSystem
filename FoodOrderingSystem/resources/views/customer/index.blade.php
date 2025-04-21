@extends('layouts.main')

@section('title')
    Daftar Pelanggan
@endsection

@section('customer')
    active
@endsection

@section('container')
    <h2>Tabel customer</h2>
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
