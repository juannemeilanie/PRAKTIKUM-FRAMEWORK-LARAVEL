@extends('layouts.lte.main')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Data Master - Kategori</title>
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
    <h2>Kategori</h2>
    <table>
        <div class="d-flex justify-content-between">
            <a href="{{ route('admin.kategori.create') }}" class="btn btn-secondary"><i class="fas fa-plus"></i> Tambah Kategori</a>
        </div>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kategori as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->nama_kategori }}</td>
                <td>
                    <button type="button" class="btn btn-sm btn-warning" onclick="window.location='{{ route('admin.kategori.edit', $item->idkategori) }}'">
                        <i class="fas fa-edit"></i>Edit</button>
                    <button type="button" class="btn btn-sm btn-danger" onclick="if(confirm('Apakah Anda yakin ingin menghapus data ini?')) { document.getElementById('delete-form-{{ $item->idkategori }}').submit(); }">
                        <i class="fas fa-trash"></i> Hapus
                    </button>
                    <form id="delete-form-{{ $item->idkategori }}" action="{{ route('admin.kategori.destroy', $item->idkategori) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endsection