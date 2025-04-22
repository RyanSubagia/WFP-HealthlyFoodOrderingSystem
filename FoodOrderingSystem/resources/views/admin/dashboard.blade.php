@extends('layouts.main')

@section('title')
Admin Dashboard
@endsection

@section('container')
    <h1> Halaman Dashboard </h1>
    <ul class="show">
        <li class="item">
            <p>The highest amount of food is <a href="#" onclick="showinfo()">click here!</a></p>
            <div id="showinfo"></div>

            @push("script")
                <script>
                    function showinfo() {
                        $.ajax({
                            type: 'POST',
                            url: '{{ route("category.showHighestFoods") }}',
                            data: '_token=<?php echo csrf_token(); ?>',
                            success: function (data) {
                                $('#showinfo').html(data.msg);
                            }
                        });
                    }
                </script>
            @endpush
        </li>
        <li class="item">
            <p>The lowest amount of calories in food is <a href="#" onclick="showres()">click here!</a></p>
            <div id="showres"></div>

            @push("script")
                {{-- <script>
                    function showres() {
                        $.ajax({
                            type: 'POST',
                            url: '{{ route("category.showLowestCalorie") }}',
                            data: '_token=<?php echo csrf_token(); ?>',
                            success: function (data) {
                                $('#showinfo').html(data.msg);
                            }
                        });
                    }
                </script> --}}
            @endpush
        </li>
    </ul>
@endsection