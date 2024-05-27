@extends('layouts.app')

@section('title', 'Edit Berita')
@section('desc', ' On this page you can edit a berita. ')

@section('content')
    <form action="{{ route('berita.update', $item->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>berita Form</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="judul" class="col-sm-3 col-form-label">Judul</label>
                            <div class="col-sm-9">
                                <input value="{{ old('judul', $item->judul) }}"
                                type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" id="judul" placeholder="Judul">
                                @error('judul')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="isi" class="col-sm-3 col-form-label">Isi</label>
                            <div class="col-sm-9">
                                <input value="{{ old('isi', $item->isi)}}"
                                type="text" class="form-control @error('isi') is-invalid @enderror" name="isi" id="isi" placeholder="Isi">
                                @error('isi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="foto" class="col-sm-3 col-form-label">Foto</label>
                            <div class="col-sm-9">
                                <input value="{{ old('foto', $item->foto) }}"
                                type="text" class="form-control @error('foto') is-invalid @enderror" name="foto" id="foto" placeholder="Foto">
                                @error('foto')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kategori" class="col-sm-3 col-form-label">Kategori</label>
                            <div class="col-sm-9">
                                <input value="{{ old('kategori', $item->kategori) }}"
                                type="text" class="form-control @error('kategori') is-invalid @enderror" name="kategori" id="kategori" placeholder="Kategori">
                                @error('kategori')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                </div>
            </div>
        </div>
    </form>
@endsection
