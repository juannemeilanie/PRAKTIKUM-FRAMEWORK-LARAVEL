@extends('layouts.app')
@section ('title', 'Tambah Pemilik')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah Pemilik</h4>
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('admin.pemilik.store') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama User <span class="text-danger">*</span></label>
                                <input  type="text" 
                                        class="form-control @error('nama') is-invalid @enderror" 
                                        id="nama" 
                                        name="nama" 
                                        value="{{ old('nama') }}" 
                                        placeholder="Masukkan nama user" 
                                        required>
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Email --}}
                            <div class="mb-3">
                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    id="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    placeholder="Masukkan email"
                                    required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Password --}}
                            <div class="mb-3">
                                <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                <input type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    id="password"
                                    name="password"
                                    placeholder="Masukkan password"
                                    required>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="no_wa" class="form-label">No WA <span class="text-danger">*</span></label>
                                <input  type="text" 
                                    id="no_wa" 
                                    name="no_wa" 
                                    class="form-control @error('no_wa') is-invalid @enderror" 
                                    value="{{ old('no_wa') }}" 
                                    placeholder="Masukkan nomor WA" 
                                    required>
                                @error('no_wa')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat  <span class="text-danger">*</span></label>
                                <input  type="text" 
                                    id="alamat" 
                                    name="alamat" 
                                    class="form-control @error('alamat') is-invalid @enderror" 
                                    value="{{ old('alamat') }}" 
                                    placeholder="Masukkan alamat" 
                                    required>
                                @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.pemilik.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i>Kembali</a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
                        