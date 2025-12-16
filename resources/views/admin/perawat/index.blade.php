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

            <h2>Data Perawat</h2>

            <div class="d-flex justify-content-between mb-3">
                <a href="{{ route('admin.perawat.create') }}" class="btn btn-secondary">Tambah Perawat</a>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>ID Perawat</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th>Jenis Kelamin</th>
                        <th>Pendidikan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($perawat as $p)
                    <tr>
                        <td>{{ $p->idperawat }}</td>
                        <td>{{ $p->nama}}</td>
                        <td>{{ $p->alamat }}</td>
                        <td>{{ $p->no_hp }}</td>
                        <td>{{ $p->jenis_kelamin }}</td>
                        <td>{{ $p->pendidikan }}</td>

                        <td>
                            <button class="btn btn-sm btn-warning"
                                onclick="window.location='{{ route('admin.perawat.edit', $p->idperawat) }}'">
                                Edit
                            </button>

                            <form action="{{ route('admin.perawat.destroy', $p->idperawat) }}" method="POST" 
                                  style="display:inline-block;">
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
