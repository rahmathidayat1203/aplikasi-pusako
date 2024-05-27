@extends('layouts.app')

@section('title', 'Edit Jadwal Dokter')
@section('desc', ' On this page you can edit a jadwal dokter. ')

@section('content')
    <form action="{{ route('jadwal-dokter.update', $item->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Jadwal Dokter Form</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="id_dokter" class="col-sm-3 col-form-label">Id_Dokter</label>
                            <div class="col-sm-9">
                                <input value="{{ old('id_dokter', $item->id_dokter) }}"
                                type="text" class="form-control @error('id_dokter') is-invalid @enderror" name="id_dokter" id="id_dokter" placeholder="Id_Dokter">
                                @error('id_dokter')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="hari" class="col-sm-3 col-form-label">Hari</label>
                            <div class="col-sm-9">
                                <input value="{{ old('hari', $item->hari)}}"
                                type="text" class="form-control @error('hari') is-invalid @enderror" name="hari" id="hari" placeholder="Hari">
                                @error('hari')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="id_ruangan" class="col-sm-3 col-form-label">Id_Ruangan</label>
                            <div class="col-sm-9">
                                <input value="{{ old('id_ruangan', $item->id_ruangan) }}"
                                type="text" class="form-control @error('id_ruangan') is-invalid @enderror" name="id_ruangan" id="id_ruangan" placeholder="Id_Ruangan">
                                @error('id_ruangan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jam_mulai" class="col-sm-3 col-form-label">Jam_Mulai</label>
                            <div class="col-sm-9">
                                <input value="{{ old('jam_mulai', $item->jam_mulai) }}"
                                type="text" class="form-control @error('jam_mulai') is-invalid @enderror" name="jam_mulai" id="jam_mulai" placeholder="Jam_Mulai">
                                @error('jam_mulai')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jam_selesai" class="col-sm-3 col-form-label">Jam_Selesai</label>
                            <div class="col-sm-9">
                                <input value="{{ old('jam_selesai', $item->jam_selesai) }}"
                                type="text" class="form-control @error('jam_selesai') is-invalid @enderror" name="jam_selesai" id="jam_selesai" placeholder="Jam_Selesai">
                                @error('jam_selesai')
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
    