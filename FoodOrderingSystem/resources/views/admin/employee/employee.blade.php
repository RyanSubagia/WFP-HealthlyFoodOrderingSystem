@extends('layouts.main')

@section('title')
Admin Employee
@endsection

@section('container')
<h1 class="card-title">Employee</h1>
                @if($employee->count())
                <div class="container-admin-table">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Telephone Number</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employee as $e)
                                   <tr>
                                        <td>
                                            {{ $e->id }}
                                        </td>
                                        <td>
                                            {{ $e->name }}
                                        </td>
                                        <td>
                                            {{ $e->email }}
                                        </td>
                                        <td>
                                            {{ $e->no_telp }}
                                        </td>

                                         <td>
                                        <div>
                                        {{-- Modal Edit --}}
                                        <a href="#modalEdit" class="btn btn-info" data-bs-toggle="modal" onclick="getEditForm({{$e->id}})">Edit</a>
                                        @push('script')
                                        <script>
                                        function getEditForm(id) {
                                        $.ajax({
                                            type: 'POST',
                                            url: '{{ route("admin.employee.getEditForm") }}',
                                            data: {
                                            _token: '{{ csrf_token() }}',
                                            id: id
                                            },
                                            success: function (data) {
                                            if (data.status === 'ok') {
                                                $('#modalContent').html(data.msg);
                                            } else {
                                                alert(data.msg);
                                            }
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
                                    function saveEmployeeUpdate(id) {
                                    $.ajax({
                                        type: 'POST',
                                        url: '{{ route("admin.employee.saveDataUpdate") }}',
                                        data: {
                                        _token: '{{ csrf_token() }}',
                                        id: id,
                                        name: $('#name').val(),
                                        email: $('#email').val(),
                                        no_telp: $('#no_telp').val(),
                                        password: $('#password').val()
                                        },
                                        success: function (data) {
                                        if (data.status === 'oke') {
                                            $('#modalEdit').modal('hide');
                                            alert(data.msg);
                                            location.reload();
                                        } else {
                                            alert(data.msg);
                                        }
                                        },
                                        error: function (xhr) {
                                        console.error(xhr.responseText);
                                        alert("Gagal menyimpan data.");
                                        }
                                    });
                                    }
                                        </script>
                                        @endpush

                                       <a href="#" value="DeleteNoReload" class="btn btn-danger" 
                                          onclick="if(confirm('Are you sure to delete {{ $e->id }} - {{ $e->name }} ? ')) deleteDataRemove({{ $e->id }})">
                                            <i class="fas fa-trash-alt me-1"></i> Hapus
                                        </a>
                                        <script>
                                          function deleteDataRemove(id) {
                                            $.ajax({
                                              type: 'POST',
                                              url: '{{ route("admin.employee.destroy") }}',
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
                        <div class="d-flex justify-content-center mt-4">
                            {{ $employee->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
                @else
                    <div class="alert alert-info">Belum ada data admin</div>
                @endif
                 <div>
                          <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#btnFormModal">+ New Employee</button>
                          
                            @push('modals')
                          <div class="modal fade" id="btnFormModal" tabindex="-1" role="basic" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Add New Employee</h4>
                                </div>
                                <div class="modal-body">
                                  <form method="POST" action="{{ route('admin.addEmployee.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" aria-describedby="name"
                                            placeholder="Enter Employee Name">
                                        <br>
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
                                        <br>
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
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
@endsection