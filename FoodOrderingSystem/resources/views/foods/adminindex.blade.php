@extends('layouts.main')
{{-- @extends('layouts.adminlte4') --}}

@section('title')
  Daftar Makanan
  @endsection

@section('makanan')
active
@endsection

@section('container')
<p>The <a href="#" onclick="showinfo()">.table-hover</a> class enables a hover state on table rows. The highest amount of food is <a href="#" onclick="showinfo()">click here!</a></p>
  <div id="showinfo"></div>

  @push("script")
      <script>
        function showinfo() {
          $.ajax({
            type: 'POST',
            url: '{{ route("category.showHighestFoods") }}',
            data: '_token=<?php echo csrf_token(); ?>',
            success: function(data) {
              $('#showinfo').html(data.msg);
            }
          });
        }
      </script>
    @endpush
@endsection
{{-- </div>
</body>
</html> --}}
