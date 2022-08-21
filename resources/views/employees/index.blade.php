@extends('layouts.app')
@section('title', 'Admin | Employees')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Employees</div>
                    @if (session()->has('success'))
                    <div class="card-body p-2">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                        </div>
                    @endif
                    <div class="card-body">
                        <table class="table table-striped" id="dataTable">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">NIP</th>
                                <th scope="col">Name</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Address</th>
                                <th scope="col">Handphone</th>
                                <th scope="col">Religion</th>
                                <th scope="col">Picture</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                              </tr>
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@push('js')
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
          "responsive": true,
        });
    } );
</script>
@endpush