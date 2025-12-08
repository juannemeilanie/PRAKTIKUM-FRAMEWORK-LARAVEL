@extends('layouts.lte.main')

@section('content')
<div class="container">
    <div class="card p-4">

        <h3>Edit Tindakan Terapi</h3>

        <form action="{{ route('dokter.rekam_medis.update', $detail->iddetail_rekam_medis) }}" method="POST">
            @csrf
            @method('PUT') 

            <div class="mb-3">
                <label>Kode Tindakan</label>
                <select name="idkode_tindakan_terapi" class="form-control" required>
                    @foreach($kode as $k)
                        <option value="{{ $k->idkode_tindakan_terapi }}"
                            {{ $detail->idkode_tindakan_terapi == $k->idkode_tindakan_terapi ? 'selected' : '' }}>
                            {{ $k->kode }} - {{ $k->deskripsi_tindakan_terapi }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Detail</label>
                <textarea name="detail" class="form-control" required>{{ $detail->detail }}</textarea>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('dokter.rekam_medis.show', $detail->idrekam_medis) }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update
                </button>
            </div>
        </form>

    </div>
</div>
@endsection
