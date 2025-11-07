<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Rekam Medis</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; padding:20px; }
        h2 { color: #333; }
        .btn {
            background: #2f3c93;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .btn:hover { background: #1e265c; }
        table { width: 80%; border-collapse: collapse; margin-top: 20px; background: white; }
        th, td { border: 1px solid #000; padding: 10px; text-align: left; }
        th { background: #8f93d8; color: #fff; }
        a.link-detail {
            color: #2f3c93;
            text-decoration: none;
            font-weight: bold;
        }
        a.link-detail:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <h2>Data Rekam Medis</h2>

    <a href="{{ route('perawat.rekam_medis.create') }}" class="btn">Tambah Rekam Medis</a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Pet</th>
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
                    <td>{{ $r->pet->nama ?? '-' }}</td>
                    <td>{{ $r->diagnosa }}</td>
                    <td>{{ $r->dokter_pemeriksa }}</td>
                    <td>{{ $r->created_at }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
