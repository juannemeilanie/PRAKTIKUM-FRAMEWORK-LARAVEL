
@extends('layouts.lte.main')
@section('title', 'Temu Dokter')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h4>Temu Dokter</h4>
                </div>
                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('resepsionis.temu-dokter.store') }}">
                        @csrf


                        <div class="mb-3">
                            <label for="idpet" class="form-label">Nama Pet <span class="text-danger">*</span></label>
                            <select name="idpet" id="idpet" 
                                    class="form-select @error('idpet') is-invalid @enderror" required>
                                <option value="">-- Pilih Pet --</option>
                                @foreach ($pet as $p)
                                    <option value="{{ $p->idpet }}" 
                                            {{ old('idpet') == $p->idpet ? 'selected' : '' }}>
                                        {{ $p->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('idpet')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="waktu_daftar">Tanggal Daftar</label>
                            <input type="datetime-local" name="waktu_daftar" class="form-control" required>
                        </div>
                        <br>

                        <div class="mb-3">
                            <label for="idrole_user" class="form-label">Nama Dokter <span class="text-danger">*</span></label>
                            <select name="idrole_user" id="idrole_user" 
                                    class="form-select @error('idrole_user') is-invalid @enderror" required>
                                <option value="">-- Pilih Dokter --</option>
                                @foreach ($dokter as $d)
                                    <option value="{{ $d->idrole_user }}" 
                                            {{ old('idrole_user') == $d->idrole_user ? 'selected' : '' }}>
                                        {{ $d->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('idrole_user')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('resepsionis.temu-dokter.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
          