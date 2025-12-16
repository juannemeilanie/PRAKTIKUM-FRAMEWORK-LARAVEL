@extends('layouts.lte.main')

@section('content')

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<!DOCTYPE html>
<html>
<head>
    <title>Data Master - Kategori Klinis</title>
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
    <h2>Kategori Klinis</h2>
    <table>
        <div class="d-flex justify-content-between">
            <a href="{{ route('admin.kategori-klinis.create') }}" class="btn btn-secondary"><i class="fas fa-plus"></i> Tambah Kategori Klinis</a>
        </div>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Kategori Klinis</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kategoriklinis as $index => $kategori)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $kategori->nama_kategori_klinis }}</td>
                <td>
                    <button type="button" class="btn btn-sm btn-warning" onclick="window.location='{{ route('admin.kategori-klinis.edit', $kategori->idkategori_klinis)}}'">
                        <i class="fas fa-edit"></i> Edit
                    </button>
                    <button type="button" class="btn btn-sm btn-danger" onclick="if(confirm('Apakah Anda yakin ingin menghapus data ini?')) { document.getElementById('delete-form-{{ $kategori->idkategori_klinis }}').submit(); }">
                        <i class="fas fa-trash"></i> Hapus
                    </button>
                    <form id="delete-form-{{ $kategori->idkategori_klinis }}" action="{{ route('admin.kategori-klinis.destroy', $kategori->idkategori_klinis)}}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
@endsection