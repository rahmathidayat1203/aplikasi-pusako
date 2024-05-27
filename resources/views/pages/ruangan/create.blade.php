@extends('layouts.app')

@section('title', 'Create New Ruangan')
@section('desc', ' On this page you can create a new Ruangan. ')

@section('content')
    <form action="{{ route('ruangan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Ruangan Form</h4>
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
                                <label for="catatan" class="col-sm-3 col-form-label">Catatan</label>
                                <div class="col-sm-9">
                                    <input value="{{ old('catatan') }}" type="text" class="form-control @error('catatan') is-invalid @enderror" name="catatan" id="catatan" placeholder="Catatan">
                                    @error('catatan')
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