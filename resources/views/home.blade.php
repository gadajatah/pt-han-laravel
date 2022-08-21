@extends('layouts.app')
@section('title', 'Admin | Dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Hello, <b>{{ Auth::user()->name }}</b>!</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row text-center">
                        <div class="col-4">
                            <div class="card">
                                <div class="card-header">
                                    All Employee
                                </div>
                                <div class="card-body">
                                    0
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
