@extends('layouts.lte.main')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Data Master - Pet</title>
    <style>
        tr { text-align: center;}
        th, td { border:1px solid #000000ff; padding:10px; text-align:left; }
        th { background:#8f93d8ff;}
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
    <h2>Pet</h2>

    <table>
        <div class="d-flex justify-content-between">
            <a href ="{{ route('admin.pet.create') }}"  method="POST" class="btn btn-secondary">Tambah Pet</a>
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
                <td>{{ $pet->nama }}</td>
                <td>{{ $pet->tanggal_lahir }}</td>
                <td>{{ $pet->warna_tanda }}</td>
                <td>{{ $pet->jenis_kelamin }}</td>
                <td>{{ $pet->nama_pemilik }}</td>
                <td>{{ $pet->nama_ras }}</td>
                <td>
                    <button type="button" class="btn btn-sm btn-warning" onclick="window.location='{{ route('admin.pet.edit', $pet->idpet) }}'">
                        <i class="fas fa-edit"></i> Edit
                    </button>
                    <button type="button" class="btn btn-sm btn-danger" onclick="if(confirm('Apakah Anda yakin ingin menghapus data ini?')) { document.getElementById('delete-form-{{ $pet->idpet }}').submit(); }">
                        <i class="fas fa-trash"></i> Hapus
                    </button>
                    <form id="delete-form-{{ $pet->idpet }}" action="{{ route('admin.pet.destroy', $pet->idpet) }}" method="POST" style="display: none;">
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