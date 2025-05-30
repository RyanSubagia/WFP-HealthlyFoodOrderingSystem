@extends('layouts.main')

@section('title')
Admin Product
@endsection

@section('container')
<h1 class="card-title">Products</h1>
                @if($food)
                <div class="container-admin-table">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Nama Produk</th>
                                    <th>Nutrition Fact</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($food as $item)
                                   <tr id="tr_{{ $item->id }}">
                                        <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#imageModal-{{ $item->id }}">
                                            Show
                                            </button>
                                            @push ('modals')
                                            <!-- Modal {{ $item->id }} -->
                                            <div class="modal fade" id="imageModal-{{ $item->id }}" tabindex="-1" aria-labelledby="imageModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="imageModalLabel">Gambar Menu {{$item->name}} </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                            <img class="img-responsive" style="max-height:250px;"
                                            src="{{ asset('storage/menu_sushi/' . $item->image) }}" alt="{{ $item->name }}"/>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                            </div>
                                            </div>
                                            </div>
                                            @endpush
                                        </td>
                                        <td>
                                            {{ $item->name }}
                                        </td>
                                        <td>
                                            {{ $item->nutrition_fact }}
                                        </td>
                                        <td>
                                            {{ $item->description }}
                                        </td>
                                        <td>
                                            {{ $item->price }}
                                        </td>
                                        <td>
                                        <div>
                                        {{-- Modal Edit --}}
                                        <a href="#modalEdit" class="btn btn-info" data-bs-toggle="modal" onclick="getEditForm({{$item->id}})">Edit</a>
                                        @push('script')
                                        <script>
                                        function getEditForm(id) {
                                          $.ajax({
                                          type: 'POST',
                                          url: '{{route("produk.getEditForm")}}',
                                          data: {
                                            '_token': '<?php  echo csrf_token() ?>',
                                            'id': id
                                          },
                                        success: function (data) {
                                          $('#modalContent').html(data.msg)
                                        }
                                      });
                                    }
                                  </script>
                                @endpush
                                <div class="modal fade" id="modalEdit" tabindex="-1" role="basic" aria-hidden="true">
                                  <div class="modal-dialog modal-wide">
                                    <div class="modal-content">
                                    <div class="modal-body" id="modalContent">
                                    {{-- You can put animated loading image here... --}}
                                    </div>
                                    </div>
                                  </div>
                                </div>

                                @push('script')
                                  <script>
                                    function saveDataUpdate(id) {
                                    var nutrition_fact = $('#nutrition_fact').val();
                                    var description = $('#description').val();
                                    var price = $('#price').val();
                                    var category_id = $('#category_id').val();

                                    $.ajax({
                                        type: 'POST',
                                        url: '{{ route("produk.saveDataUpdate") }}',
                                        data: {
                                        '_token': '{{ csrf_token() }}',
                                        'id': id,
                                        'nutrition_fact': nutrition_fact,
                                        'description': description,
                                        'price': price,
                                        'category_id': category_id
                                        },
                                        success: function (data) {
                                        if (data.status == "oke") {
                                            $('#modalEdit').modal('hide');
                                            alert("Berhasil diupdate!");
                                            location.reload();
                                        }
                                        },
                                        error: function(xhr) {
                                        alert("Gagal update");
                                        console.log(xhr.responseText);
                                        }
                                    });
                                    }
                                        </script>
                                        @endpush

                                       <a href="#" value="DeleteNoReload" class="btn btn-danger" 
                                          onclick="if(confirm('Are you sure to delete {{ $item->id }} - {{ $item->name }} ? ')) deleteDataRemove({{ $item->id }})">
                                            <i class="fas fa-trash-alt me-1"></i> Hapus
                                        </a>
                                        <script>
                                          function deleteDataRemove(id) {
                                            $.ajax({
                                              type: 'POST',
                                              url: '{{ route("listmakanan.destroy") }}',
                                              data: {
                                                _token: '{{ csrf_token() }}',
                                                id: id
                                              },
                                              success: function(data) {
                                                if (data.status === "oke") {
                                                  $('#tr_' + id).remove();
                                                  alert(data.msg);
                                                }
                                              },
                                              error: function(xhr) {
                                                console.error(xhr.responseText);
                                                alert("Gagal menghapus data.");
                                              }
                                            });
                                          }
                                          </script>
                                        </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div>
                          <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#btnFormModal">+ New Menu</button>
                            @push('modals')
                          <div class="modal fade" id="btnFormModal" tabindex="-1" role="basic" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Add New Menu</h4>
                                </div>
                                <div class="modal-body">
                                  <form method="POST" action="{{ route('listmakanan.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" aria-describedby="name"
                                            placeholder="Enter Meals Name">
                                        <br>
                                        <label for="name">Nutrition Fact</label>
                                        <textarea class="form-control" id="nutrition_fact" name="nutrition_fact" aria-describedby="name"
                                            placeholder="Enter Nutrition Facts"></textarea>
                                        <br>
                                        <label for="name">Description</label>
                                        <textarea class="form-control" id="description" name="description" aria-describedby="name"
                                            placeholder="Enter Description"></textarea>
                                        <br>
                                        <label for="name">Price</label>
                                        <input type="number" class="form-control" id="price" name="price" aria-describedby="name"
                                            placeholder="Enter Price">
                                        <br>
                                        <label for="name">Category</label>
                                        <select name="category_id" id="category_id" class="form-control">
                                            <option value="">-- Select Category --</option>
                                            @foreach ($category as $c)
                                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                                            @endforeach
                                        </select>
                                        <br>
                                        <label for="image">Image</label>
                                        <input type="file" class="form-control" id="image" name="image">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                              </div>
                            </div>
                          </div>
                            @endpush
                        </div>
                        <div class="d-flex justify-content-center mt-4">
                            {{ $food->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
                @else
                    <div class="alert alert-info">Belum ada data customer</div>
                @endif
@endsection