@extends('layouts.main')

@section('title')
Admin Kategori
@endsection

@section('container')
<h1 class="card-title">Categories</h1>
                @if($category)
                <div class="container-admin-table">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Jenis</th>
                                    <th>Jumlah Makanan</th>
                                    <th>List Nama Makanan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category as $item)
                                   <tr id="tr_{{ $item->id }}">
                                        <td>
                                            {{ $item->id }}
                                        </td>
                                        <td id="td_name_{{ $item->id }}">{{ $item->name }}</td>
                                        <td>{{ count($item->foods)}}</td>
                                        <td>
                                          <button type="button" class="btn btn-info" data-bs-toggle="modal" 
                                              data-bs-target="#detailModal" onclick="showDetail({{ $item->id }})" >
                                              Details
                                          </button>

                                          @push ('modals')
                                          <!-- Modal -->
                                          <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h1 class="modal-title fs-5" id="detail-title">List of Foods</h1>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body" id="detail-body">
                                                  
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          @endpush
                                          @push("script")
                                          <script>
                                          function showDetail(id) {
                                            $.ajax({
                                              type: 'POST',
                                              url: '{{ route("admin.category.showListFoods") }}',
                                              data: { 
                                                      '_token': '<?php echo csrf_token(); ?>',
                                                      'idcat': id,
                                                    },
                                              success: function(data) {
                                                $('#detail-title').html(data.title);
                                                $('#detail-body').html(data.body);
                                              }
                                            });
                                          }
                                          </script>
                                          @endpush
                                        </ul>
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
                                          url: '{{route("kategori.getEditForm")}}',
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
                                      var name = $('#name').val();
                                      console.log(name); //debug->print to browser console
                                      $.ajax({
                                        type: 'POST',
                                        url: '{{ route("kategori.saveDataUpdate") }}',
                                        data: {
                                        '_token': '<?php  echo csrf_token(); ?>',
                                        'id': id,
                                          'name': name,
                                          },
                                          success: function (data) {
                                          if (data.status == "oke") {
                                          $('#td_name_' + id).html(name);
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
                                              url: '{{ route("admin.category.destroy") }}',
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
                          <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#btnFormModal">+ New Category</button>
                            @push('modals')
                          <div class="modal fade" id="btnFormModal" tabindex="-1" role="basic" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Add New Category</h4>
                                </div>
                                <div class="modal-body">
                                  <form method="POST" action="{{ route('admin.category.store') }}">
                                    @csrf
                                    <div class="form-group">
                                      <label for="name">Name</label>
                                      <input type="text" class="form-control" id="name" name="name" aria-describedby="name"
                                        placeholder="Enter Category Name">
                                      <small id="name" class="form-text text-muted">Please write down Category Name here.</small>
                                    </div>
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
                            {{ $category->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
                @else
                    <div class="alert alert-info">Belum ada data customer</div>
                @endif
@endsection
