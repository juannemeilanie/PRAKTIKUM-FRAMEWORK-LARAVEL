@extends('layouts.lte.main')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Pemilik</title>
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
            <h2>Pemilik</h2>
            <table class="custom-table">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('resepsionis.pemilik.create') }}" class="btn btn-secondary"><i class="fas fa-plus"></i> Registrasi Pemilik</a>
                </div>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pemilik</th>
                        <th>Email</th>
                        <th>No WA</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pemilik as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->no_wa }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-warning" onclick="window.location='#'">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <button type="button" class="btn btn-sm btn-danger" onclick="if(confirm('Apakah Anda yakin ingin menghapus data ini?')) { document.getElementById('delete-form-{{ $item->idpemilik }}').submit(); }">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                            <form id="delete-form-{{ $item->idpemilik }}" action="{{ route('resepsionis.pemilik.destroy', $item->idpemilik)}}" method="POST" style="display: none;">
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
</div>
</body>
@endsection