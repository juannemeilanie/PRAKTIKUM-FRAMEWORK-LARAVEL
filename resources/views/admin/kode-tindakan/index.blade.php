@extends('layouts.lte.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card p-3">

            <h2>Kode Tindakan</h2>

            <div class="d-flex justify-content-between mb-2">
                <a href="{{ route('admin.kode-tindakan.create') }}" 
                   class="btn btn-sm btn-secondary">
                    Tambah Kode Tindakan
                </a>
            </div>

            <table class="table table-bordered">
                <thead style="background:#8f93d8ff; text-align:center;">
                    <tr>
                        <th>ID</th>
                        <th>Kode Tindakan</th>
                        <th>Deskripsi</th>
                        <th>Kategori</th>
                        <th>Kategori Klinis</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($kodetindakan as $index => $kode)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $kode->kode }}</td>
                        <td>{{ $kode->deskripsi_tindakan_terapi }}</td>
                        <td>{{ $kode->nama_kategori }}</td>
                        <td>{{ $kode->nama_kategori_klinis }}</td>

                        <td class="text-center">
                            <a href="{{ route('admin.kode-tindakan.edit', $kode->idkode_tindakan_terapi) }}"
                               class="btn btn-sm btn-warning">
                               <i class="fas fa-edit"></i> Edit
                            </a>

                            <form action="{{ route('admin.kode-tindakan.destroy', $kode->idkode_tindakan_terapi) }}" 
                                  method="POST" 
                                  style="display:inline-block;"
                                  onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i> Hapus
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
