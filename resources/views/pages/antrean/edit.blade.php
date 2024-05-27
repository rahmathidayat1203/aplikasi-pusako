@extends('layouts.app')

@section('title', 'Edit Antrean')
@section('desc', ' On this page you can edit a antrean. ')

@section('content')
    <form action="{{ route('antrean.update', $item->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Antrean Form</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="id_pasien" class="col-sm-3 col-form-label">Id_Pasien</label>
                            <div class="col-sm-9">
                                <input value="{{ old('id_pasien', $item->id_pasien) }}"
                                type="text" class="form-control @error('id_pasien') is-invalid @enderror" name="id_pasien" id="id_pasien" placeholder="Id_Pasien">
                                @error('id_pasien')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="id_dokter" class="col-sm-3 col-form-label">Id_Dokter</label>
                            <div class="col-sm-9">
                                <input value="{{ old('id_dokter', $item->id_dokter)}}"
                                type="text" class="form-control @error('id_dokter') is-invalid @enderror" name="id_dokter" id="id_dokter" placeholder="Id_Dokter">
                                @error('id_dokter')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nomor_antrean" class="col-sm-3 col-form-label">Nomor_Antrean</label>
                            <div class="col-sm-9">
                                <input value="{{ old('nomor_antrean', $item->nomor_antrean) }}"
                                type="text" class="form-control @error('nomor_antrean') is-invalid @enderror" name="nomor_antrean" id="nomor_antrean" placeholder="Nomor_Antrean">
                                @error('nomor_antrean')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="waktu_antrean" class="col-sm-3 col-form-label">Waktu_Antrean</label>
                            <div class="col-sm-9">
                                <input value="{{ old('waktu_antrean', $item->waktu_antrean) }}"
                                type="text" class="form-control @error('waktu_antrean') is-invalid @enderror" name="waktu_antrean" id="waktu_antrean" placeholder="Waktu_Antrean">
                                @error('waktu_antrean')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="waktu_panggil" class="col-sm-3 col-form-label">Waktu_Panggil</label>
                            <div class="col-sm-9">
                                <input value="{{ old('waktu_panggil', $item->waktu_panggil) }}"
                                type="date" class="form-control @error('waktu_panggil') is-invalid @enderror" name="waktu_panggil" id="waktu_panggil" placeholder="Waktu_Panggil">
                                @error('waktu_panggil')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="waktu_keluar" class="col-sm-3 col-form-label">Waktu_Keluar</label>
                            <div class="col-sm-9">
                                <input value="{{ old('waktu_keluar', $item->waktu_keluar) }}"
                                type="date" class="form-control @error('waktu_keluar') is-invalid @enderror" name="waktu_keluar" id="waktu_keluar" placeholder="Waktu_Keluar">
                                @error('waktu_keluar')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="rating" class="col-sm-3 col-form-label">Rating</label>
                            <div class="col-sm-9">
                                <input value="{{ old('rating', $item->rating) }}"
                                type="text" class="form-control @error('rating') is-invalid @enderror" name="rating" id="rating" placeholder="Rating">
                                @error('rating')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="komentar" class="col-sm-3 col-form-label">Komentar</label>
                            <div class="col-sm-9">
                                <input value="{{ old('komentar', $item->komentar) }}"
                                type="text" class="form-control @error('komentar') is-invalid @enderror" name="komentar" id="komentar" placeholder="Komentar">
                                @error('komentar')
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
