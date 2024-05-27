@extends('layouts.app')

@section('title', 'Edit Rekam Medis')
@section('desc', ' On this page you can edit a rekam medis. ')

@section('content')
    <form action="{{ route('rekam-medis.update', $item->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Rekam Medis Form</h4>
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
                            <label for="keluhan" class="col-sm-3 col-form-label">Keluhan</label>
                            <div class="col-sm-9">
                                <input value="{{ old('keluhan', $item->keluhan) }}"
                                type="text" class="form-control @error('keluhan') is-invalid @enderror" name="keluhan" id="keluhan" placeholder="Keluhan">
                                @error('keluhan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="diagnosa" class="col-sm-3 col-form-label">Diagnosa</label>
                            <div class="col-sm-9">
                                <input value="{{ old('diagnosa', $item->diagnosa) }}"
                                type="text" class="form-control @error('diagnosa') is-invalid @enderror" name="diagnosa" id="diagnosa" placeholder="Diagnosa">
                                @error('diagnosa')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
            
                        <div class="form-group row">
                            <label for="resep" class="col-sm-3 col-form-label">Resep</label>
                            <div class="col-sm-9">
                                <input value="{{ old('resep', $item->resep) }}"
                                type="date" class="form-control @error('resep') is-invalid @enderror" name="resep" id="resep" placeholder="Resep">
                                @error('resep')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tindakan" class="col-sm-3 col-form-label">Tindakan</label>
                            <div class="col-sm-9">
                                <input value="{{ old('tindakan', $item->tindakan) }}"
                                type="date" class="form-control @error('tindakan') is-invalid @enderror" name="tindakan" id="tindakan" placeholder="Tindakan">
                                @error('tindakan')
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
