@extends('layouts.lte.main')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Data Master - Jenis Hewan</title>
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
    <h2>Jenis Hewan</h2>
    <table>
        <div class="d-flex justify-content-between">
            <a href="{{ route('admin.jenis-hewan.create') }}"  method="POST" class="btn btn-secondary">Tambah Jenis Hewan</a>
        <div>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Jenis Hewan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($jenisHewan as $index => $hewan)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $hewan->nama_jenis_hewan }}</td>
            <td>
                <button type="button" class="btn btn-sm btn-warning" onclick="window.location='{{ route('admin.jenis-hewan.edit', $hewan->idjenis_hewan) }}'">
                    <i class="fas fa-edit"></i> Edit
                </button>
                <button type="button" class="btn btn-sm btn-danger" onclick="if(confirm('Apakah Anda yakin ingin menghapus data ini?')) { document.getElementById('delete-form-{{ $hewan->idjenis_hewan }}').submit(); }">
                    <i class="fas fa-trash"></i> Hapus
                </button>
                <form id="delete-form-{{ $hewan->idjenis_hewan }}" action="{{ route('admin.jenis-hewan.destroy', $hewan->idjenis_hewan) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection