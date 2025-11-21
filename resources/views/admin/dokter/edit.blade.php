@extends('layouts.lte.main')

@section('content')

<style>
    label { font-weight: bold; }
    .card { padding: 20px; background: white; border-radius: 10px; }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
            <h2>Edit Dokter</h2>

            <form action="{{ route('admin.dokter.update', $dokter->iddokter) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="{{ $dokter->alamat }}">
                </div>

                <div class="mb-3">
                    <label>No HP</label>
                    <input type="text" name="no_hp" class="form-control" value="{{ $dokter->no_hp }}">
                </div>

                <div class="mb-3">
                    <label>Bidang Dokter</label>
                    <input type="text" name="bidang_dokter" class="form-control" value="{{ $dokter->bidang_dokter }}">
                </div>

                <div class="mb-3">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control">
                        <option value="Laki-Laki" {{ $dokter->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                        <option value="Perempuan" {{ $dokter->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.dokter.index') }}" class="btn btn-secondary">
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

@endsection
