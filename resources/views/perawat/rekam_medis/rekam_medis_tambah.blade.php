@extends('layouts.lte.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">

                {{-- HEADER --}}
                <div class="card-header">
                    <h4>Tambah Rekam Medis</h4>
                </div>

                {{-- BODY --}}
                <div class="card-body">

                    {{-- ERROR VALIDATION --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- FORM --}}
                    <form action="{{ route('perawat.rekam_medis.store') }}" method="POST">
                        @csrf

                        
                        {{-- PET --}}
                        <div class="form-group">
                            <label>Nama Pet</label>
                            <select name="idpet" id="idpet" class="form-control" required>
                                <option value="">-- Pilih Pet --</option>
                                @foreach ($pets as $p)
                                    <option 
                                        value="{{ $p->idpet }}" 
                                        data-idreservasi="{{ $p->idreservasi_dokter }}"
                                        data-no="{{ $p->no_urut }}"
                                    >
                                        {{ $p->nama }} (No. Urut: {{ $p->no_urut }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <input type="hidden" name="idreservasi_dokter" id="idreservasi_dokter">


                        {{-- Anamnesa --}}
                        <div class="mb-3">
                            <label for="anamnesa" class="form-label">
                                Anamnesa <span class="text-danger">*</span>
                            </label>
                            <textarea id="anamnesa"
                                      name="anamnesa"
                                      class="form-control @error('anamnesa') is-invalid @enderror"
                                      required>{{ old('anamnesa') }}</textarea>

                            @error('anamnesa')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Temuan Klinis --}}
                        <div class="mb-3">
                            <label for="temuan_klinis" class="form-label">
                                Temuan Klinis <span class="text-danger">*</span>
                            </label>
                            <textarea id="temuan_klinis"
                                      name="temuan_klinis"
                                      class="form-control @error('temuan_klinis') is-invalid @enderror"
                                      required>{{ old('temuan_klinis') }}</textarea>

                            @error('temuan_klinis')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- DIAGNOSA --}}
                        <div class="mb-3">
                            <label for="diagnosa" class="form-label">
                                Diagnosa <span class="text-danger">*</span>
                            </label>
                            <textarea id="diagnosa"
                                      name="diagnosa"
                                      class="form-control @error('diagnosa') is-invalid @enderror"
                                      required>{{ old('diagnosa') }}</textarea>

                            @error('diagnosa')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Dokter --}}
                        <div class="mb-3">
                            <label for="dokter_pemeriksa">Dokter Pemeriksa</label>
                            <select name="dokter_pemeriksa" id="dokter_pemeriksa" class="form-control">
                                <option value="">-- Pilih Dokter --</option>
                                @foreach($dokter as $d)
                                    <option value="{{ $d->idrole_user }}" {{ old('dokter_pemeriksa') == $d->idrole_user ? 'selected' : '' }}>
                                        {{ $d->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- BUTTONS --}}
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('perawat.rekam_medis.index') }}" class="btn btn-secondary">
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
<script>
document.getElementById('idpet').addEventListener('change', function () {
    const selected = this.options[this.selectedIndex];
    document.getElementById('idreservasi_dokter').value = selected.dataset.idreservasi;
});
</script>

@endsection
