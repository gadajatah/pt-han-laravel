@extends('layouts.app')
@section('title', 'Admin | Employees')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                      Detail {{ $employee->name }}
                    </div>
                    <div class="card-body">
                        <ul>
                            <li>NIP     : {{ $employee->nip }}</li>
                            <li>Fullname : {{ $employee->name }}</li>
                            <li>Gender : {{ $employee->gender }}</li>
                            <li>Handphone : {{ $employee->handphone }}</li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('employee.index') }}" class="btn btn-warning btn-sm">Cancel</a>
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