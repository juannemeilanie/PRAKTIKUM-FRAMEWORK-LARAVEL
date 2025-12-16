@extends('layouts.lte.main')

@section('content')

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<!DOCTYPE html>
<html>
<head>
    <title>Temu Dokter</title>
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
    <h2>Jadwal Temu Dokter</h2>
    <table  class="custom-table">
        <div class="d-flex justify-content-between">
            <a href="{{ route('resepsionis.temu-dokter.create') }}" class="btn btn-secondary"><i class="fas fa-plus"></i>Tambah Jadwal Temu Dokter</a>
        </div>
        <thead>
            <tr>
                <th>No Urut</th>
                <th>Waktu Daftar</th>
                <th>Nama Pet</th>
                <th>Nama Dokter</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($temuDokter as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->waktu_daftar }}</td>
                <td>{{ $item->nama_pet }}</td>
                <td>{{ $item->nama_dokter }}</td>
                <td>{{ $item->status == 1 ? 'Diproses' : 'Selesai' }}</td>
                <td>
                    <button type="button" class="btn btn-sm btn-warning" onclick="window.location='{{ route('resepsionis.temu-dokter.edit', $item->idreservasi_dokter) }}'">
                        <i class="fas fa-edit"></i> Edit
                    </button>
                    <button type="button" class="btn btn-sm btn-danger" onclick="if(confirm('Apakah Anda yakin ingin menghapus data ini?')) { document.getElementById('delete-form-{{ $item->idreservasi_dokter }}').submit(); }">
                        <i class="fas fa-trash"></i> Hapus
                    </button>
                    <form id="delete-form-{{ $item->idreservasi_dokter }}" action="{{ route('resepsionis.temu-dokter.destroy', $item->idreservasi_dokter)}}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
        </div>
    </div>
</body>
@endsection