@extends('layouts.lte.main')

@section('content')

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<!DOCTYPE html>
<html>
<head>
    <title>Data Pasien</title>
<style>
    tr { text-align: center; }
    th, td { border:1px solid #000000ff; padding:10px; text-align:left; }
    th { background:#8f93d8ff; }
    table { width: 100%; border-collapse: collapse; }
    .card { padding: 20px; background: white; border-radius: 10px; }
</style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <h2>Data Pasien</h2>

            <table class="custom-table">
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
                        <td>{{ $pet->nama}}</td>
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