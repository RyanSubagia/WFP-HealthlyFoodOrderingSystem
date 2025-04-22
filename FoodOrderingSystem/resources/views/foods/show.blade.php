@extends('layouts.main')

@section('title')
Detail Menu
@endsection

@section('container')
<a href="{{ route('menu.index')}}"> < Back </a>
        <h2>{{$current_food->name}}</h2>
        <h3>{{$current_food->description}}</h3>
        <h5>{{$current_food->nutrition_fact}}</h5>
        <b style="color:red">Rp. {{$current_food->price}},-</b>
@endsection