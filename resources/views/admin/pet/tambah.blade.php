@extends('layouts.lte.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h4>Tambah Pet</h4>
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


                    <form method="POST" action="{{ route('admin.pet.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama <span class="text-danger">*</span></label>
                            <input  type="text" 
                                    id="nama" 
                                    name="nama" 
                                    class="form-control @error('nama') is-invalid @enderror" 
                                    value="{{ old('nama') }}" 
                                    placeholder="Masukkan nama hewan" 
                                    required>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Tanggal Lahir --}}
                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                            <input  type="date" 
                                    id="tanggal_lahir" 
                                    name="tanggal_lahir" 
                                    class="form-control @error('tanggal_lahir') is-invalid @enderror" 
                                    value="{{ old('tanggal_lahir') }}" 
                                    required>
                            @error('tanggal_lahir')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Warna Tanda --}}
                        <div class="mb-3">
                            <label for="warna_tanda" class="form-label">Warna Tanda <span class="text-danger">*</span></label>
                            <input  type="text" 
                                    id="warna_tanda" 
                                    name="warna_tanda" 
                                    class="form-control @error('warna_tanda') is-invalid @enderror" 
                                    value="{{ old('warna_tanda') }}" 
                                    placeholder="Masukkan warna tanda hewan" 
                                    required>
                            @error('warna_tanda')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Jenis Kelamin --}}
                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                            <select id="jenis_kelamin" 
                                    name="jenis_kelamin" 
                                    class="form-select @error('jenis_kelamin') is-invalid @enderror" 
                                    required>
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="M" {{ old('jenis_kelamin') == 'M' ? 'selected' : '' }}>Jantan</option>
                                <option value="F" {{ old('jenis_kelamin') == 'F' ? 'selected' : '' }}>Betina</option>
                            </select>
                            @error('jenis_kelamin')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="idpemilik" class="form-label">Pemilik <span class="text-danger">*</span></label>
                            <select name="idpemilik" id="idpemilik" 
                                    class="form-select @error('idpemilik') is-invalid @enderror" required>
                                <option value="">-- Pilih Pemilik --</option>
                                @foreach ($pemilik as $p)
                                    <option value="{{ $p->idpemilik }}" 
                                            {{ old('idpemilik') == $p->idpemilik ? 'selected' : '' }}>
                                        {{ $p->user->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('idpemilik')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="idras_hewan" class="form-label">Ras Hewan <span class="text-danger">*</span></label>
                            <select name="idras_hewan" id="idras_hewan" 
                                    class="form-select @error('idras_hewan') is-invalid @enderror" required>
                                <option value="">-- Pilih Ras Hewan --</option>
                                @foreach ($rashewan as $r)
                                    <option value="{{ $r->idras_hewan }}" 
                                            {{ old('idras_hewan') == $r->idras_hewan ? 'selected' : '' }}>
                                        {{ $r->nama_ras }}
                                    </option>
                                @endforeach
                            </select>
                            @error('idras_hewan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.pet.index') }}" class="btn btn-secondary">
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
