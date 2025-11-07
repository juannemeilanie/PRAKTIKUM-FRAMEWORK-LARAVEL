@extends('layouts.app')
@section ('title', 'Tambah User')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah User</h4>
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('admin.user.store') }}">
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

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">
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
                        