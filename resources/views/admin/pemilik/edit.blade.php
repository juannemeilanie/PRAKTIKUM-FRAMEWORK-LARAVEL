@extends('layouts.lte.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">
                <h3>Edit Pemilik</h3>
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

    <form action="{{ route('admin.pemilik.update', $pemilik->idpemilik) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Pilih User</label>
            <select name="iduser" class="form-control" required>
                @foreach ($users as $user)
                    <option value="{{ $user->iduser }}" 
                        {{ $pemilik->iduser == $user->iduser ? 'selected' : '' }}>
                        {{ $user->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Nomor WA</label>
            <input type="text" name="no_wa" class="form-control" 
                value="{{ $pemilik->no_wa }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" required>{{ $pemilik->alamat }}</textarea>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('admin.pemilik.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Update
            </button>
        </div>
    </form>
</div>
@endsection
