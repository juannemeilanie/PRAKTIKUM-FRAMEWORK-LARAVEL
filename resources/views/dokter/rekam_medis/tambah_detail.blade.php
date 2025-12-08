@extends('layouts.lte.main')

@section('content')
<div class="container">
    <div class="card p-4">

        <h3>Tambah Tindakan Terapi</h3>

        <form action="{{ route('dokter.rekam_medis.store', $rekam->idrekam_medis) }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Kode Tindakan</label>
                <select name="idkode_tindakan_terapi" class="form-control" required>
                    <option value="">-- Pilih Kode --</option>
                    @foreach($kode as $k)
                        <option value="{{ $k->idkode_tindakan_terapi }}">
                            {{ $k->kode }} - {{ $k->deskripsi_tindakan_terapi }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Detail</label>
                <textarea name="detail" class="form-control" required></textarea>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('dokter.rekam_medis.show', $rekam->idrekam_medis) }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan
                </button>
            </div>
        </form>

    </div>
</div>
@endsection
