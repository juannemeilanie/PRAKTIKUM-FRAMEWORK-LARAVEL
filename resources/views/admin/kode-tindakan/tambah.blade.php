@extends('layouts.lte.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h4>Tambah Kode Tindakan Terapi</h4>
                </div>
                <div class="card-body">
   
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.kode-tindakan.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="kode" class="form-label">Kode <span class="text-danger">*</span></label>
                            <input  type="text" 
                                    class="form-control @error('kode') is-invalid @enderror" 
                                    id="kode" 
                                    name="kode" 
                                    value="{{ old('kode') }}" 
                                    placeholder="Masukkan kode tindakan" 
                                    required>
                            @error('kode')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi_tindakan_terapi" class="form-label">
                                Deskripsi Tindakan Terapi <span class="text-danger">*</span>
                            </label>
                            <input  type="text" 
                                    class="form-control @error('deskripsi_tindakan_terapi') is-invalid @enderror" 
                                    id="deskripsi_tindakan_terapi" 
                                    name="deskripsi_tindakan_terapi" 
                                    value="{{ old('deskripsi_tindakan_terapi') }}" 
                                    placeholder="Masukkan deskripsi tindakan terapi" 
                                    required>
                            @error('deskripsi_tindakan_terapi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="idkategori" class="form-label">Kategori <span class="text-danger">*</span></label>
                            <select name="idkategori" id="idkategori" 
                                    class="form-select @error('idkategori') is-invalid @enderror" required>
                                <option value="">-- Pilih Kategori --</option>
                                @foreach ($kategori as $k)
                                    <option value="{{ $k->idkategori }}" 
                                            {{ old('idkategori') == $k->idkategori ? 'selected' : '' }}>
                                        {{ $k->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                            @error('idkategori')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="idkategori_klinis" class="form-label">Kategori Klinis <span class="text-danger">*</span></label>
                            <select name="idkategori_klinis" id="idkategori_klinis" 
                                    class="form-select @error('idkategori_klinis') is-invalid @enderror" required>
                                <option value="">-- Pilih Kategori Klinis --</option>
                                @foreach ($kategoriKlinis as $kk)
                                    <option value="{{ $kk->idkategori_klinis }}" 
                                            {{ old('idkategori_klinis') == $kk->idkategori_klinis ? 'selected' : '' }}>
                                        {{ $kk->nama_kategori_klinis }}
                                    </option>
                                @endforeach
                            </select>
                            @error('idkategori_klinis')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.kode-tindakan.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
