@extends('layouts.main')
@section('content')
   <!-- fill with your page bar like previous week HERE !-->
   <!-- end page bar !-->
    <!-- END PAGE HEADER-->
    <form method="POST" action="{{ route('listkategori.store') }}">
       @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="name"
                placeholder="Enter Category Name">
            <small id="name" class="form-text text-muted">Please write down Category Name here.</small>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
