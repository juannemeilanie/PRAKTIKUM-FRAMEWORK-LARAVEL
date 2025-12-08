@extends('layouts.lte.main')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Pet</title>
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
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <h2>Hewan </h2>

            <table>
                <thead>
                    <tr>
                        <th>Nama Pet</th>
                        <th>Tanggal Lahir</th>
                        <th>Warna Tanda</th>
                        <th>Jenis Kelamin</th>
                        <th>Pemilik</th>
                        <th>Ras Hewan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pets as $index => $pet)
                    <tr>
                        <td>{{ $pet->nama_pet }}</td>
                        <td>{{ $pet->tanggal_lahir }}</td>
                        <td>{{ $pet->warna_tanda }}</td>
                        <td>{{ $pet->jenis_kelamin }}</td>
                        <td>{{ $pet->nama_pemilik }}</td>
                        <td>{{ $pet->nama_ras }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
@endsection