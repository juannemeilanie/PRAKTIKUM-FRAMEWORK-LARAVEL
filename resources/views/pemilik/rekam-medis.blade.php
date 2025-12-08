@extends('layouts.lte.main')

@section('content')

    <style>
        tr { text-align: center;}
        td { border:1px solid #e0e0e0; padding:10px 12px; text-align: center; }
        th { background:#8f93d8ff; padding: 12px;}
        table { width: 100%; border-collapse: collapse; overflow: hidden; border-radius: 8px; }
        .card {
            padding: 25px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.08);
            margin-top: 10px;
        }
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