@extends('layouts.app')
@section('title', 'Admin | Employees')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit {{ $employee->name }}</div>
                    <div class="card-body">
                        <form action="{{ route('employee.update', $employee->id) }}" method="post" enctype="multipart/form-data">
                          @csrf
                            <div class="form-group row">
                                <label for="inputNip" class="col-sm-2 col-form-label">NIP</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control @error('nip') is-invalid @enderror" 
                                  id="inputNip" name="nip" 
                                  placeholder="Input NIP .."
                                  value="{{ $employee->nip }}">
                                  @error('nip')
                                      <small class="text-sm text-danger">
                                          {{ $message }}
                                      </small>
                                  @enderror
                                </div>
                              </div>
                              <div class="form-group row mt-3">
                                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                  id="inputName" name="name" 
                                  placeholder="Input name .."
                                  value="{{ $employee->name }}">
                                  @error('name')
                                      <small class="text-sm text-danger">
                                          {{ $message }}
                                      </small>
                                  @enderror
                                </div>
                              </div>
                              <div class="form-group row mt-3">
                                <label for="inputGender" class="col-sm-2 col-form-label">Gender</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control @error('gender') is-invalid @enderror" 
                                  id="inputGender" name="gender" 
                                  placeholder="Input gender .."
                                  value="{{ $employee->gender }}">
                                  @error('gender')
                                      <small class="text-sm text-danger">
                                          {{ $message }}
                                      </small>
                                  @enderror
                                </div>
                              </div>
                              <div class="form-group row mt-3">
                                <label for="inputAddress" class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control @error('address') is-invalid @enderror" 
                                  id="inputAddress" name="address" 
                                  placeholder="Input address .."
                                  value="{{ $employee->address }}">
                                  @error('address')
                                      <small class="text-sm text-danger">
                                          {{ $message }}
                                      </small>
                                  @enderror
                                </div>
                              </div>
                              <div class="form-group row mt-3">
                                <label for="inputHandphone" class="col-sm-2 col-form-label">Handphone</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control @error('handphone') is-invalid @enderror" 
                                  id="inputHandphone" name="handphone" 
                                  placeholder="Input Handphone number .."
                                  value="{{ $employee->handphone }}">
                                  @error('handphone')
                                      <small class="text-sm text-danger">
                                          {{ $message }}
                                      </small>
                                  @enderror
                                </div>
                              </div>
                              <div class="form-group row mt-3">
                                <label for="inputPicture" class="col-sm-2 col-form-label">Picture</label>
                                <div class="col-sm-10">
                                  <input type="file" class="form-control @error('picture') is-invalid @enderror" 
                                  id="inputPicture" name="picture" 
                                  placeholder="Input picture .."
                                  value="{{ $employee->picture }}">
                                  @error('picture')
                                      <small class="text-sm text-danger">
                                          {{ $message }}
                                      </small>
                                  @enderror
                                </div>
                              </div>
                              <div class="form-group row mt-3">
                                <div class="col-sm-10">
                                  <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                              </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop