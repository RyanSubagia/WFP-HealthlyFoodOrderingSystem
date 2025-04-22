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
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category as $item)
                                   <tr>
                                        <td>
                                            {{ $item->id }}
                                        </td>
                                        <td>{{ $item->name }}</td>
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
                                              url: '{{ route("category.showListFoods") }}',
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
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center mt-4">
                            {{ $category->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
                @else
                    <div class="alert alert-info">Belum ada data customer</div>
                @endif
@endsection
