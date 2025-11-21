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
            <h2>Tambah Dokter</h2>

            <form action="{{ route('admin.dokter.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label>Pilih User</label>
                    <select name="iduser" class="form-control" required>
                        @foreach ($users as $u)
                            <option value="{{ $u->iduser }}">{{ $u->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control">
                </div>

                <div class="mb-3">
                    <label>No HP</label>
                    <input type="text" name="no_hp" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Bidang Dokter</label>
                    <input type="text" name="bidang_dokter" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control">
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.dokter.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i>Kembali</a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i>Simpan</button>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection
