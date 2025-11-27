@extends('layouts.lte.main')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Temu Dokter</title>
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
                    <button type="button" class="btn btn-sm btn-warning" onclick="window.location='#'">
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