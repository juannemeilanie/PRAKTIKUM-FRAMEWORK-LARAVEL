@extends('layouts.lte.main')

@section('content')

<style>
    tr { text-align: center; }
    th, td { border:1px solid #000000ff; padding:10px; text-align:left; }
    th { background:#8f93d8ff; }
    table { width: 100%; border-collapse: collapse; }
    .card { padding: 20px; background: white; border-radius: 10px; }
</style>

<body>
    
<div class="container">
    <div class="row justify-content-center">
        <div class="card">

            <h2>Data Rekam Medis</h2>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pet</th>
                        <th>Pemilik</th>
                        <th>Diagnosa</th>
                        <th>Dokter</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataRekam as $i => $r)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $r->nama_pet }}</td>
                        <td>{{ $r->nama_pemilik }}</td>
                        <td>{{ $r->diagnosa }}</td>
                        <td>{{ $r->nama_dokter }}</td>
                        <td>{{ $r->created_at }}</td>
                        <td>
                            <a href="{{ route('dokter.rekam_medis.show', $r->idrekam_medis) }}" class="btn btn-secondary">
                                Detail
                            </a>
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