<!DOCTYPE html>
<html>
<head>
    <title>Data Master - Ras Hewan</title>
    <style>
        tr { text-align: center; }
        body { font-family: Arial, sans-serif; background: #f4f4f4; padding:20px; }
        h2 { color: #333; }
        table { width:50%; border-collapse: collapse; margin-top:20px; }
        th, td { border:1px solid #000000ff; padding:10px; text-align:left; }
        th { background:#8f93d8ff; }
        button { background: #2f3c93ff;; border:none; padding:10px 15px; border-radius:5px; color:#fff; cursor:pointer; }
        button:hover { background: #1e265cff;; }
        a{color: #ffffffff;}
    </style>
</head>
<body>
    <h2>Data Master - Ras Hewan</h2>
    <table>
        <thead>
            <tr>
                <th>ID Ras</th>
                <th>Jenis Hewan</th>
                <th>Nama Ras Hewan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rashewan as $index => $ras)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>@if($ras->jenisHewan)
                        <span class="badge-jenis">
                            {{ $ras->jenisHewan->nama_jenis_hewan }}
                        </span>
                            @else
                                <span class="text-muted">-</span>
                            @endif</td>
                <td>{{ $ras->nama_ras }}</td>
            </tr>
            @endforeach
        </tbody>