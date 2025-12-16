@extends('layouts.lte.main')

@section('content')

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<!DOCTYPE html>
<html>
<head>
    <title>Data Master - Role</title>
    <style>
        tr { text-align: center; }
        body { font-family: Arial, sans-serif; background: #f4f4f4; padding:20px; }
        h2 { color: #333; }
        table { width:50%; border-collapse: collapse; margin-top:20px; }
        th, td { border:1px solid #000000ff; padding:10px; text-align:left; }
        th { background:#8f93d8ff; }
        button { background: #2f3c93ff;; border:none; padding:10px 15px; border-radius:5px; color:#fff; cursor:pointer; }
        button:hover { background: #1e265cff;; }
        a{color: #ffffffff;}
    </style>
</head>
<body>
    <h2>Data Master - Role</h2>
    <table>
        <button><a href="{{ route('admin.dashboard') }}" class="btn btn-secondary w-100 fw-bold">Kembali</a></button>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Role</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $index => $role)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $role->nama_role }}</td>
                <td>{{ $role->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection