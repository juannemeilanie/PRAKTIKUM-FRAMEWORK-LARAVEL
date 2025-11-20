@extends('layouts.lte.main')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Data Master - User</title>
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
        <h2>User</h2>

        <table>
            <div class="d-flex justify-content-between">
                <a href ="{{ route('admin.user.create') }}"  method="POST" class="btn btn-sm btn-secondary">Tambah User</a>
            </div>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama User</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $index => $u)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $u->nama }}</td>
                    <td>{{ $u->email }}</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-warning" onclick="window.location='{{ route('admin.user.edit', $u->iduser) }}'">Edit</button>
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        <form action="{{ route('admin.user.destroy', $u->iduser) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?');">
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
@endsection