@extends('layouts/main')

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

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

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
                                  <form method="POST" action="{{ route('addEmployee.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" aria-describedby="name"
                                            placeholder="Enter Employee Name">
                                        <br>
                                        <label for="name">Email</label>
                                        <textarea class="form-control" id="email" name="email" aria-describedby="name"
                                            placeholder="Enter Email"></textarea>
                                        <br>
                                        <label for="name">Password</label>
                                        <textarea class="form-control" id="password" name="password" aria-describedby="name"
                                            placeholder="Enter Password"></textarea>
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
                            {{ $employee->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
                @else
                    <div class="alert alert-info">Belum ada data admin</div>
                @endif
@endsection