@extends('layouts.lte.main')

@section('content')

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<style>
    tr { text-align: center; }
    th, td { border:1px solid #000000ff; padding:10px; text-align:center; }
    th { background:#8f93d8ff; }
    table { width: 100%; border-collapse: collapse; }
    .card { padding: 20px; background: white; border-radius: 10px; }
</style>

<body>
    
<div class="container">
    <div class="row justify-content-center">
        <div class="card">

            <h2>Data Rekam Medis</h2>

            <div class="d-flex justify-content-between mb-3">
                <a href="{{ route('perawat.rekam_medis.create') }}" class="btn btn-secondary">Tambah Rekam Medis</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Pet</th>
                        <th>Pemilik</th>
                        <th>Anamnesa</th>
                        <th>Temuan Klinis</th>
                        <th>Diagnosa</th>
                        <th>Dokter</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataRekam as $i => $r)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $r->created_at }}</td>
                        <td>{{ $r->nama_pet }}</td>
                        <td>{{ $r->nama_pemilik }}</td>
                        <td>{{ $r->anamnesa }}</td>
                        <td>{{ $r->temuan_klinis }}</td>
                        <td>{{ $r->diagnosa }}</td>
                        <td>{{ $r->nama_dokter}}</td>
                        <td>
                            <a href="{{ route('perawat.rekam_medis.show', $r->idrekam_medis) }}" class="btn btn-secondary">Detail</a>
                            <a href="{{ route('perawat.rekam_medis.edit', $r->idrekam_medis) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('perawat.rekam_medis.destroy', $r->idrekam_medis) }}" method="POST"  style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus rekam medis ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
@endsection