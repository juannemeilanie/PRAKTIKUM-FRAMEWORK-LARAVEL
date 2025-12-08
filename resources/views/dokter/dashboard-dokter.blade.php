@extends('layouts.lte.main')

@section('content')

<!--begin::App Content Header-->
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Dashboard Dokter</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard Dokter</li>
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
                    <h5 class="fw-bold mb-1">Halo, {{ session('user_name') }} </h5>
                    <span>Selamat datang di dashboard Dokter</span>
                </div>
            </div>
        </div>

        <!-- ====== INFO BOXES ====== -->
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon text-bg-primary shadow-sm">
                        <i class="bi bi-journal-medical"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">Rekam Medis</span>
                        <span class="info-box-number">{{ $totalRekam}}</span>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon text-bg-success shadow-sm">
                        <i class="bi bi-heart-pulse-fill"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">Pasien Ditangani</span>
                        <span class="info-box-number">{{ $totalPasien}}</span>
                    </div>
                </div>
            </div>
        </div>


        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h3 class="card-title">Rekam Medis</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                                <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                                <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table m-0">        
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pet</th>
                                        <th>Pemilik</th>
                                        <th>Diagnosa</th>
                                        <th>Dokter</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataRekam as $i => $r)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $r->nama_pet }}</td>
                                        <td>{{ $r->nama_pemilik }}</td>
                                        <td>{{ $r->diagnosa }}</td>
                                        <td>{{ $r->nama_dokter}}</td>
                                        <td>{{ $r->created_at }}</td>
                                        <td>
                                            <a href="{{ route('dokter.rekam_medis.show', $r->idrekam_medis) }}" class="btn btn-secondary">
                                                Detail
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-footer clearfix">
                        <a href="{{ route('dokter.rekam_medis.index')}}" class="btn btn-primary btn-sm float-end">Lihat Semua</a>
                    </div>
                </div>
            </div>
        </div>


        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h3 class="card-title">Data Pasien</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                                <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                                <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body p-0">
                        <div class="table-responsive">
                                <table class="table m-0">
                                    <thead>
                                        <tr>
                                            <th>Nama Pet</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Warna Tanda</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Pemilik</th>
                                            <th>Ras Hewan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pets as $index => $pet)
                                        <tr>
                                            <td>{{ $pet->nama}}</td>
                                            <td>{{ $pet->tanggal_lahir }}</td>
                                            <td>{{ $pet->warna_tanda }}</td>
                                            <td>{{ $pet->jenis_kelamin }}</td>
                                            <td>{{ $pet->nama_pemilik }}</td>
                                            <td>{{ $pet->nama_ras }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    <div class="card-footer clearfix">
                        <a href="{{ route('dokter.data-pasien.index')}}" class="btn btn-primary btn-sm float-end">Lihat Semua</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end::App Content-->

@endsection
