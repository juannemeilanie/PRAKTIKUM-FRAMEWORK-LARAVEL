@extends('layouts.lte.main')

@section('content')

<style>
    .card { padding: 20px; background: white; border-radius: 10px; }
    label { font-weight: bold; }
</style>

<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="card">

            <h2>Edit Rekam Medis</h2>

            <form action="{{ route('perawat.rekam_medis.update', $rekam->idrekam_medis) }}" method="POST">
                @csrf
                @method('PUT')


                <div class="mb-3">
                    <label for="idpet">Nama Pet</label>
                    <select name="idpet" id="idpet" class="form-control">
                        @foreach($pets as $p)
                            <option value="{{ $p->idpet }}" 
                                {{ old('idpet', $rekam->idpet) == $p->idpet ? 'selected' : '' }}>
                                {{ $p->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>


                <div class="mb-3">
                    <label for="anamnesa">Anamnesa</label>
                    <textarea name="anamnesa" id="anamnesa" class="form-control">{{ old('anamnesa', $rekam->anamnesa) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="temuan_klinis">Temuan Klinis</label>
                    <textarea name="temuan_klinis" id="temuan_klinis" class="form-control">{{ old('temuan_klinis', $rekam->temuan_klinis) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="diagnosa">Diagnosa</label>
                    <textarea name="diagnosa" id="diagnosa" class="form-control">{{ old('diagnosa', $rekam->diagnosa) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="dokter_pemeriksa">Dokter Pemeriksa</label>
                    <select name="dokter_pemeriksa" id="dokter_pemeriksa" class="form-control">
                        <option value="">-- Pilih Dokter --</option>
                        @foreach($dokters as $d)
                            <option value="{{ $d->idrole_user }}" 
                                {{ old('dokter_pemeriksa', $rekam->dokter_pemeriksa) == $d->idrole_user ? 'selected' : '' }}>
                                {{ $d->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>


                <div class="d-flex justify-content-between">
                    <a href="{{ route('perawat.rekam_medis.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>

        </div>
    </div>
</div>
</body>
</html>
@endsection