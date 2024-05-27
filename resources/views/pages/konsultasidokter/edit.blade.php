@extends('layouts.app')

@section('title', 'Edit Konsultasi Dokter')
@section('desc', ' On this page you can edit a konsultasi dokter. ')

@section('content')
    <form action="{{ route('konsultasi-dokter.update', $item->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Konsultasi Dokter Form</h4>
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
                            <label for="pertanyaan_pasien" class="col-sm-3 col-form-label">Pertanyaan_Pasien</label>
                            <div class="col-sm-9">
                                <input value="{{ old('pertanyaan_pasien', $item->pertanyaan_pasien) }}"
                                type="text" class="form-control @error('pertanyaan_pasien') is-invalid @enderror" name="pertanyaan_pasien" id="pertanyaan_pasien" placeholder="Pertanyaan_Pasien">
                                @error('pertanyaan_pasien')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jawaban_dokter" class="col-sm-3 col-form-label">Jawaban_Dokter</label>
                            <div class="col-sm-9">
                                <input value="{{ old('jawaban_dokter', $item->jawaban_dokter) }}"
                                type="text" class="form-control @error('jawaban_dokter') is-invalid @enderror" name="jawaban_dokter" id="jawaban_dokter" placeholder="Jawaban_Dokter">
                                @error('jawaban_dokter')
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
