@extends('layouts.lte.main')

@section('content')

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<style>
    tr { text-align: center; }
    th, td { border:1px solid #000000ff; padding:10px; text-align:left; }
    th { background:#8f93d8ff; }
    table { width: 100%; border-collapse: collapse; }
    .card { padding: 20px; background: white; border-radius: 10px; }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="card">

        <h3>Detail Rekam Medis</h3>

        <p><strong>Nama Pet:</strong> {{ $rekam->nama_pet }}</p>
        <p><strong>Anamnesa:</strong> {{ $rekam->anamnesa }}</p>
        <p><strong>Temuan Klinis:</strong> {{ $rekam->temuan_klinis }}</p>
        <p><strong>Diagnosa:</strong> {{ $rekam->diagnosa }}</p>

        <hr>
        <div class="d-flex justify-content-between mb-3">
            <a href="{{ route('dokter.rekam_medis.create', $rekam->idrekam_medis) }}" class="btn btn-primary">Tambah Tindakan</a>
        </div>

        <table >
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Deskripsi Tindakan</th>
                    <th>Detail</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tindakan as $i => $t)
                <tr>
                    <td>{{ $i + 1  }}</td>
                    <td>{{ $t->kode }}</td>
                    <td>{{ $t->deskripsi_tindakan_terapi }}</td>
                    <td>{{ $t->detail }}</td>
                    <td>
                        <a href="{{ route('dokter.rekam_medis.edit', $t->iddetail_rekam_medis) }}"
                           class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('dokter.rekam_medis.destroy', $t->iddetail_rekam_medis) }}"
                              method="POST"
                              style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Hapus tindakan ini?')" 
                                    class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="text-center">Belum ada tindakan</td></tr>
                @endforelse
            </tbody>
        </table>

        <div class="d-flex justify-content-between mb-3">
            <a href="{{ route('dokter.rekam_medis.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
