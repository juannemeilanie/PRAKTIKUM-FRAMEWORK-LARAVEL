@extends('layouts.lte.main')
@section('title', 'Edit Temu Dokter')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h4>Edit Temu Dokter</h4>
                </div>

                <div class="card-body">

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('resepsionis.temu-dokter.update', $temuDokter->idreservasi_dokter) }}">
                        @csrf
                        @method('PUT')

                        {{-- Nama Pet --}}
                        <div class="mb-3">
                            <label for="idpet" class="form-label">Nama Pet <span class="text-danger">*</span></label>
                            <select name="idpet" id="idpet" 
                                    class="form-select @error('idpet') is-invalid @enderror">
                                <option value="">-- Pilih Pet --</option>
                                @foreach ($pet as $p)
                                    <option value="{{ $p->idpet }}"
                                        {{ old('idpet', $temuDokter->idpet) == $p->idpet ? 'selected' : '' }}>
                                        {{ $p->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('idpet')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="waktu_daftar">Tanggal Daftar</label>
                            <input type="datetime-local" name="waktu_daftar"
                                value="{{ date('Y-m-d\TH:i', strtotime($temuDokter->waktu_daftar)) }}"
                                class="form-control" required>
                        </div>
                        <br>

                        {{-- Nama Dokter --}}
                        <div class="mb-3">
                            <label for="idrole_user" class="form-label">Nama Dokter <span class="text-danger">*</span></label>
                            <select name="idrole_user" id="idrole_user" 
                                    class="form-select @error('idrole_user') is-invalid @enderror">
                                <option value="">-- Pilih Dokter --</option>
                                @foreach ($dokter as $d)
                                    <option value="{{ $d->idrole_user }}"
                                        {{ old('idrole_user', $temuDokter->idrole_user) == $d->idrole_user ? 'selected' : '' }}>
                                        {{ $d->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('idrole_user')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Tombol --}}
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('resepsionis.temu-dokter.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Update
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
