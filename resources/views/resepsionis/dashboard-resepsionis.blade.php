@extends('layouts.lte.main')

@section('content')

<!--begin::App Content Header-->
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Dashboard Resepsionis</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard Resepsionis</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!--end::App Content Header-->

<!--begin::App Content-->
<div class="app-content">
    <div class="container-fluid">

        <!-- ====== GREETING CARD ====== -->
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="alert alert-primary shadow-sm">
                    <h5 class="fw-bold mb-1">Halo, {{ Auth::user()->nama ?? 'Pengguna' }} 👋</h5>
                    <span>Selamat datang di Dashboard Resepsionis RSHP Unair.</span>
                </div>
            </div>
        </div>

        <!-- ====== INFO BOXES ====== -->
        <div class="row">

            <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box shadow-sm">
                    <span class="info-box-icon text-bg-primary"><i class="bi bi-people-fill"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Pemilik</span>
                        <span class="info-box-number">{{ $totalPemilik ?? 0 }}</span>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box shadow-sm">
                    <span class="info-box-icon text-bg-success"><i class="bi bi-heart-pulse-fill"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Hewan</span>
                        <span class="info-box-number">{{ $totalPet ?? 0 }}</span>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box shadow-sm">
                    <span class="info-box-icon text-bg-warning"><i class="bi bi-calendar-check"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Temu Dokter Hari Ini</span>
                        <span class="info-box-number">{{ $totalTemuDokter ?? 0 }}</span>
                    </div>
                </div>
            </div>

        </div>

        <!-- ====== TABLE PEMILIK ====== -->
        <div class="card shadow-sm mt-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title"><i class="bi bi-people"></i> Daftar Pemilik Terbaru</h3>
                <a href="{{ route('resepsionis.pemilik.index') }}" class="btn btn-primary btn-sm">Lihat Semua</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover m-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pemilik</th>
                                <th>Email</th>
                                <th>No WA</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pemilik as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->no_wa }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>
                                    <button class="btn btn-warning btn-sm">Edit<i class="fas fa-edit"></i></button>
                                    <button class="btn btn-danger btn-sm" onclick="if(confirm('Hapus?')) document.getElementById('delete-{{ $item->idpemilik }}').submit()">Hapus<i class="fas fa-trash"></i></button>
                                    <form id="delete-{{ $item->idpemilik }}" method="POST" action="{{ route('resepsionis.pemilik.destroy', $item->idpemilik) }}" hidden>@csrf @method('DELETE')</form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- ====== TABLE PET ====== -->
        <div class="card shadow-sm mt-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title"><i class="bi bi-heart"></i> Daftar Pet Terbaru</h3>
                <a href="{{ route('resepsionis.pet.index') }}" class="btn btn-primary btn-sm">Lihat Semua</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover m-0">
                        <thead>
                            <tr>
                                <th>Nama Pet</th>
                                <th>Tanggal Lahir</th>
                                <th>Warna Tanda</th>
                                <th>Jenis Kelamin</th>
                                <th>Pemilik</th>
                                <th>Ras Hewan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pets as $pet)
                            <tr>
                                <td>{{ $pet->nama_pet }}</td>
                                <td>{{ $pet->tanggal_lahir }}</td>
                                <td>{{ $pet->warna_tanda }}</td>
                                <td>{{ $pet->jenis_kelamin }}</td>
                                <td>{{ $pet->nama_pemilik }}</td>
                                <td>{{ $pet->nama_ras }}</td>
                                <td>
                                    <a href="{{ route('resepsionis.pet.edit', $pet->idpet) }}" class="btn btn-warning btn-sm">Edit<i class="fas fa-edit"></i></a>
                                    <button class="btn btn-danger btn-sm" onclick="if(confirm('Hapus?')) document.getElementById('delpet-{{ $pet->idpet }}').submit()">Hapus<i class="fas fa-trash"></i></button>
                                    <form id="delpet-{{ $pet->idpet }}" method="POST" hidden action="{{ route('resepsionis.pet.destroy', $pet->idpet) }}">@csrf @method('DELETE')</form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- ====== TEMU DOKTER ====== -->
        <div class="card shadow-sm mt-4 mb-5">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title"><i class="bi bi-calendar-check"></i> Jadwal Temu Dokter Hari Ini</h3>
                <a href="{{ route('resepsionis.temu-dokter.index') }}" class="btn btn-primary btn-sm">Lihat Semua</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover m-0">
                        <thead>
                            <tr>
                                <th>No Urut</th>
                                <th>Waktu Daftar</th>
                                <th>Nama Pet</th>
                                <th>Nama Dokter</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($temuDokter as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->waktu_daftar }}</td>
                                <td>{{ $item->nama_pet }}</td>
                                <td>{{ $item->nama_dokter }}</td>
                                <td>
                                    @if($item->status == 1)
                                        <span class="badge text-bg-warning">Diproses</span>
                                    @else
                                        <span class="badge text-bg-success">Selesai</span>
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-warning btn-sm">Edit<i class="fas fa-edit"></i></button>
                                    <button class="btn btn-danger btn-sm" onclick="if(confirm('Hapus?')) document.getElementById('deltd-{{ $item->idreservasi_dokter }}').submit()">Hapus<i class="fas fa-trash"></i></button>
                                    <form id="deltd-{{ $item->idreservasi_dokter }}" method="POST" action="{{ route('resepsionis.temu-dokter.destroy', $item->idreservasi_dokter) }}" hidden>@csrf @method('DELETE')</form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
<!--end::App Content-->

@endsection
