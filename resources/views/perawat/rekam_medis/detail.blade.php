@extends('layouts.lte.main')

@section('content')
<style>
    tr { text-align: center; }
    th, td { border:1px solid #000000ff; padding:10px; text-align:left; }
    th { background:#8f93d8ff; }
    table { width: 100%; border-collapse: collapse; }
    .card { padding: 20px; background: white; border-radius: 10px; }
    label { font-weight: bold; }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <h2>Detail Rekam Medis</h2>

            <!-- INFORMASI DASAR REKAM MEDIS -->
            <div class="mb-3">
                <label>Nama Pet:</label>
                <div>{{ $rekam->nama_pet }}</div>
            </div>

            <div class="mb-3">
                <label>Anamnesa:</label>
                <div>{{ $rekam->anamnesa }}</div>
            </div>

            <div class="mb-3">
                <label>Temuan Klinis:</label>
                <div>{{ $rekam->temuan_klinis }}</div>
            </div>

            <div class="mb-3">
                <label>Diagnosa:</label>
                <div>{{ $rekam->diagnosa }}</div>
            </div>

            <hr>

            <!-- TABEL DETAIL TINDAKAN TERAPI -->
            <h4>Daftar Tindakan / Terapi</h4>

            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Deskripsi Tindakan / Terapi</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tindakan as $i => $t)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $t->kode }}</td>
                            <td>{{ $t->deskripsi_tindakan_terapi }}</td>
                            <td>{{ $t->detail }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">Tidak ada tindakan / terapi</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-4">
                <a href="{{ route('perawat.rekam_medis.index') }}" class="btn btn-secondary">Kembali</a>
            </div>

        </div>
    </div>
</div>
@endsection
