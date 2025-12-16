@extends('layouts.lte.main')

@section('content')

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

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
    <h2>Pet</h2>

    <table class="custom-table">
        <div class="d-flex justify-content-between">
            <a href ="{{ route('resepsionis.pet.create') }}"  method="POST" class="btn btn-secondary">Registrasi Pet</a>
        </div>
        <thead>
            <tr>
                <th>Nama Pet</th>
                <th>Tanggal Lahir</th>
                <th>Warna Tanda</th>
                <th>Jenis Kelamin</th>
                <th>Pemilik</th>
                <th>Ras Hewan</th>
                <th>Aksi</th>
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
                <td>
                    <button type="button" class="btn btn-sm btn-warning" onclick="window.location='{{ route('resepsionis.pet.edit', $pet->idpet) }}'">
                        <i class="fas fa-edit"></i> Edit
                    </button>
                    <button type="button" class="btn btn-sm btn-danger" onclick="if(confirm('Apakah Anda yakin ingin menghapus data ini?')) { document.getElementById('delete-form-{{ $pet->idpet }}').submit(); }">
                        <i class="fas fa-trash"></i> Hapus
                    </button>
                    <form id="delete-form-{{ $pet->idpet }}" action="{{ route('resepsionis.pet.destroy', $pet->idpet) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
@endsection