@extends('layouts.app')
@section('title', 'Admin | Employees')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                      <a href="{{ route('employee.create') }}" class="btn btn-primary">Add new Data</a>
                      <a href="{{ route('employees.export') }}" class="btn btn-warning">Export Excel</a>
                    </div>
                    @if (session()->has('success'))
                    <div class="card-body p-2">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
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
                                <th scope="col">Picture</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($employees as $index => $em)
                              <tr>
                                <th scope="row">{{ ++$index }}</th>
                                <td>{{ $em->nip }}</td>
                                <td>{{ $em->name }}</td>
                                <td>{{ $em->gender }}</td>
                                <td>{{ $em->address }}</td>
                                <td>{{ $em->handphone }}</td>
                                <td><img src="{{ asset($em->picture) }}" width="100" height="75" alt=""></td>
                                <td>
                                  <a href="{{ route('employee.show', $em->id) }}" class="btn btn-success btn-sm">View</a>
                                  <a href="{{ route('employee.edit', $em->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                  <a href="{{ route('employee.destroy', $em->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                              </tr>
                              @endforeach
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