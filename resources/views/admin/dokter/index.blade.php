@extends('layouts.lte.main')

@section('content')

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<style>
    tr { text-align: center; }
    th, td { border:1px solid #000000ff; padding:10px; text-align:left; }
    th { background:#8f93d8ff; }
    table { width: 100%; border-collapse: collapse; }
    .card { padding: 20px; background: white; border-radius: 10px; }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="card">

            <h2>Data Dokter</h2>

            <div class="d-flex justify-content-between mb-3">
                <a href="{{ route('admin.dokter.create') }}" class="btn btn-secondary">Tambah Dokter</a>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>ID Dokter</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th>Bidang Dokter</th>
                        <th>Jenis Kelamin</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($dokter as $d)
                    <tr>
                        <td>{{ $d->iddokter }}</td>
                        <td>{{ $d->nama}}</td>
                        <td>{{ $d->alamat }}</td>
                        <td>{{ $d->no_hp }}</td>
                        <td>{{ $d->bidang_dokter }}</td>
                        <td>{{ $d->jenis_kelamin }}</td>

                        <td>
                            <button class="btn btn-sm btn-warning" 
                                onclick="window.location='{{ route('admin.dokter.edit', $d->iddokter) }}'">
                                Edit
                            </button>

                            <form action="{{ route('admin.dokter.destroy', $d->iddokter) }}" 
                                  method="POST" style="display:inline-block;">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Yakin ingin menghapus?')">
                                    Hapus
                                </button>
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
