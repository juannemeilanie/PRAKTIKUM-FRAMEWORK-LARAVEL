
<!DOCTYPE html>
<html>
<head>
    <title>Data Master - Pet</title>
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
    <h2>Data Master - Pemilik</h2>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pemilik</th>
                <th>No WA</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pemilik as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->user->nama }}</td>
                <td>{{ $item->no_wa }}</td>
                <td>{{ $item->alamat }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
