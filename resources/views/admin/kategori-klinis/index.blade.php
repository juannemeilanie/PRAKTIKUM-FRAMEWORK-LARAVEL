<!DOCTYPE html>
<html>
<head>
    <title>Data Master - Kategori Klinis</title>
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
    <h2>Kategori Klinis</h2>
    <table>
        <button><a href="{{ route('admin.kategori-klinis.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Kategori Klinis</a></button>
        <button><a href="{{ route('admin.data_master') }}" class="btn btn-secondary w-100 fw-bold">Kembali</a></button>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Kategori Klinis</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kategoriklinis as $index => $kategori)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $kategori->nama_kategori_klinis }}</td>
                <td>
                    <button type="button" class="btn btn-sm btn-warning" onclick="window.location='#'">
                        <i class="fas fa-edit"></i> Edit
                    </button>
                    <button type="button" class="btn btn-sm btn-danger" onclick="if(confirm('Apakah Anda yakin ingin menghapus data ini?')) { document.getElementById('delete-form-{{ $kategori->idkategori_klinis }}').submit(); }">
                        <i class="fas fa-trash"></i> Hapus
                    </button>
                    <form id="delete-form-{{ $kategori->idkategori_klinis }}" action="#" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>