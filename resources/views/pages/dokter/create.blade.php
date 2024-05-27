@extends('layouts.app')

@section('title', 'Create New Dokter')
@section('desc', ' On this page you can create a new Dokter. ')

@section('content')
    <form action="{{ route('dokter.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Dokter Form</h4>
                    </div>
                        <input type="file" class="d-none" id="avatar" name="avatar">
                        <div class="card-body">
                          
                            <div class="form-group row">
                                <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                                <div class="col-sm-9">
                                    <input value="{{ old('nama') }}" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" placeholder="Nama">
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nip" class="col-sm-3 col-form-label">NIP</label>
                                <div class="col-sm-9">
                                    <input value="{{ old('nip') }}" type="text" class="form-control @error('nip') is-invalid @enderror" name="nip" id="nip" placeholder="NIP">
                                    @error('nip')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input value="{{ old('email') }}" type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nohp" class="col-sm-3 col-form-label">No Handphone</label>
                                <div class="col-sm-9">
                                    <input value="{{ old('nohp') }}" type="text" class="form-control @error('nohp') is-invalid @enderror" name="nohp" id="nohp" placeholder="No Handphone">
                                    @error('nohp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                </div>
            </div>
        </div>
    </form>
@endsection