@extends('layouts.lte.main')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Pet</title>
    <style>
        th { background:#8f93d8ff;}

        .custom-table {
            width: 100%;
            border-collapse: collapse;
        }

        .custom-table th {
            padding: 15px;
            text-align: left;
            font-weight: 600;
            font-size: 14px;
            border-bottom: 2px solid #e0e0e0;
        }

        .custom-table td {
            padding: 15px;
            border-bottom: 1px solid #f0f0f0;
            color: #555;
            font-size: 14px;
        }

        .custom-table tbody tr:hover {
            background: #f8f9fa;
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