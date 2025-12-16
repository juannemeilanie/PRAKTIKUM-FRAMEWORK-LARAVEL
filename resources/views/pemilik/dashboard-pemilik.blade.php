@extends('layouts.lte.main')

@section('content')

<!--begin::App Content Header-->
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Dashboard Pemilik</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard Pemilik</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!--end::App Content Header-->

<!--begin::App Content-->
<div class="app-content">
    <div class="container-fluid">

        <!-- ====== GREETING ====== -->
        <div class="alert alert-primary shadow-sm mb-4">
            <h5 class="fw-bold mb-1">Halo, {{ Auth::user()->nama ?? 'Pemilik' }}</h5>
            <span>Selamat datang di dashboard Anda</span>
        </div>

        <!-- ====== INFO BOXES ====== -->
        <div class="row">
            <div class="col-md-4">
                <div class="info-box shadow-sm">
                    <span class="info-box-icon text-bg-primary"><i class="bi bi-hearts"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Pet Anda</span>
                        <span class="info-box-number">{{ $totalPet ?? 0 }}</span>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="info-box shadow-sm">
                    <span class="info-box-icon text-bg-success"><i class="bi bi-calendar-check"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Temu Dokter</span>
                        <span class="info-box-number">{{ $totaltemuDokter }}</span>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="info-box shadow-sm">
                    <span class="info-box-icon text-bg-danger"><i class="bi bi-clipboard2-pulse-fill"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Riwayat Rekam Medis</span>
                        <span class="info-box-number">{{ $totalRekam }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- ====== TABLE PET ====== -->
        <div class="card shadow-sm mt-4 mb-5">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title"><i class="bi bi-hearts"></i> Daftar Pet Anda</h3>
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
                                <th>Ras</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pets as $pet)
                            <tr>
                                <td>{{ $pet->nama_pet }}</td>
                                <td>{{ $pet->tanggal_lahir }}</td>
                                <td>{{ $pet->warna_tanda }}</td>
                                <td>{{ $pet->jenis_kelamin }}</td>
                                <td>{{ $pet->nama_ras }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">Belum ada pet terdaftar.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="card-footer clearfix">
                        <a href="{{ route('pemilik.data-pet.index')}}" class="btn btn-primary btn-sm float-end">Lihat Semua</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-sm mt-4 mb-5">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title"><i class="bi bi-calendar-check-fill"></i> Jadwal Temu Dokter</h3>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table  class="table table-hover m-0">
                        <thead>
                            <tr>
                                <th>No Urut</th>
                                <th>Waktu Daftar</th>
                                <th>Nama Pet</th>
                                <th>Nama Dokter</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($temuDokter as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->waktu_daftar }}</td>
                                <td>{{ $item->nama_pet }}</td>
                                <td>{{ $item->nama_dokter }}</td>
                                <td>{{ $item->status == 1 ? 'Diproses' : 'Selesai' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="card-footer clearfix">
                        <a href="{{ route('pemilik.temu-dokter.index')}}" class="btn btn-primary btn-sm float-end">Lihat Semua</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-sm mt-4 mb-5">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title"><i class="bi bi-clipboard2-pulse-fill"></i> Riwayat Rekam Medis</h3>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table  class="table table-hover m-0">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Pet</th>
                        <th>Pemilik</th>
                        <th>Diagnosa</th>
                        <th>Dokter</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataRekam as $i => $r)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $r->nama_pet }}</td>
                        <td>{{ $r->nama_pemilik }}</td>
                        <td>{{ $r->diagnosa }}</td>
                        <td>{{ $r->nama_dokter }}</td>
                        <td>{{ $r->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-footer clearfix">
                <a href="{{ route('pemilik.rekam-medis.index')}}" class="btn btn-primary btn-sm float-end">Lihat Semua</a>
            </div>
        </div>
    </div>
</div>
<!--end::App Content-->

@endsection
