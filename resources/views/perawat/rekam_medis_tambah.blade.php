<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Rekam Medis</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; padding:20px; }
        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            width: 400px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            margin: auto;
        }
        label { display: block; margin-top: 10px; font-weight: bold; }
        input, textarea {
            width: 100%; padding: 8px; margin-top: 5px;
            border: 1px solid #ccc; border-radius: 4px;
        }
        button {
            background: #2f3c93;
            border: none;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            margin-top: 15px;
            cursor: pointer;
        }
        button:hover { background: #1e265c; }
        .back-link {
            display: inline-block;
            margin-top: 15px;
            color: #2f3c93;
            text-decoration: none;
        }
        .back-link:hover { text-decoration: underline; }
        a{ color: white; text-decoration: none; }
    </style>
</head>
<body>
    <h2>Tambah Rekam Medis</h2>

    @if ($errors->any())
        <div style="color:red;">
            <strong>Terjadi kesalahan:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('perawat.rekam_medis.store') }}" method="POST">
        @csrf
        <label for="idpet">Nama Pet</label>
        <select id="idpet" name="idpet" required>
            <option value="">-- Pilih Pet --</option>
            @foreach ($pets as $pet)
                <option value="{{ $pet->idpet }}" {{ old('idpet') == $pet->idpet ? 'selected' : '' }}>
                    {{ $pet->nama}}
                </option>
            @endforeach
        </select>

        <label for="diagnosa">Diagnosa</label>
        <textarea id="diagnosa" name="diagnosa" required>{{ old('diagnosa') }}</textarea>

        <!-- <label for="perawat">Perawat</label>
        <input type="text" id="perawat" name="perawat" value="{{ old('perawat') }}" required> -->

        <label for="created_at">Tanggal Rekam</label>
        <input type="date" id="created_at" name="created_at" value="{{ old('created_at') }}" required>





        <button type="submit">Simpan</button>
        <button><a href="{{ route('perawat.rekam_medis.index') }}" >Kembali ke daftar</a></button>
    </form>


</body>
</html>
