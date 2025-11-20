@extends('layouts.lte.main')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Data Master - Ras Hewan</title>
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
    <h2>Ras Hewan</h2>
    <table>
        <div class="d=flex justify-content-between">
            <a href="{{ route('admin.ras-hewan.create') }}"  method="POST" class="btn btn-secondary">Tambah Ras Hewan</a>
        </div>
        <thead>
            <tr>
                <th>ID Ras</th>
                <th>Jenis Hewan</th>
                <th>Nama Ras Hewan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rasHewan as $index => $ras)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $ras->nama_jenis_hewan}}</td>
                <td>{{ $ras->nama_ras }}</td>
                <td>
                    <button type="button" class="btn btn-sm btn-warning" onclick="window.location='{{ route('admin.ras-hewan.edit', $ras->idras_hewan) }}'">
                        <i class="fas fa-edit"></i> Edit
                    </button>
                    <button type="button" class="btn btn-sm btn-danger" onclick="if(confirm('Apakah Anda yakin ingin menghapus data ini?')) { document.getElementById('delete-form-{{ $ras->idras_hewan }}').submit(); }">
                        <i class="fas fa-trash"></i> Hapus
                    </button>
                    <form id="delete-form-{{ $ras->idras_hewan }}" action="{{ route('admin.ras-hewan.destroy', $ras->idras_hewan) }}" method="POST" style="display: none;">
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