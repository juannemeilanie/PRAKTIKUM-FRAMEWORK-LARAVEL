@extends('layouts.lte.main')

@section('content')
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Dashboard RSHP</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->

    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row - Info boxes-->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon text-bg-primary shadow-sm">
                            <i class="bi bi-clipboard2-pulse-fill"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Rekam Medis</span>
                            <span class="info-box-number">0</span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon text-bg-success shadow-sm">
                            <i class="bi bi-heart-pulse-fill"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Hewan</span>
                            <span class="info-box-number">10</span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon text-bg-warning shadow-sm">
                            <i class="bi bi-people-fill"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Pemilik</span>
                            <span class="info-box-number">2</span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon text-bg-danger shadow-sm">
                            <i class="bi bi-person-badge-fill"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total User</span>
                            <span class="info-box-number">7</span>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Row-->

            <!--begin::Row - Recent Records-->
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Rekam Medis Terbaru</h3>
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
                                            <th>No. Rekam Medis</th>
                                            <th>Nama Hewan</th>
                                            <th>Pemilik</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href="#">RM001</a></td>
                                            <td>Bruno</td>
                                            <td>John Doe</td>
                                            <td>14 Nov 2025</td>
                                            <td><span class="badge text-bg-success">Selesai</span></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">RM002</a></td>
                                            <td>Milo</td>
                                            <td>Jane Smith</td>
                                            <td>14 Nov 2025</td>
                                            <td><span class="badge text-bg-warning">Proses</span></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">RM003</a></td>
                                            <td>Luna</td>
                                            <td>Bob Wilson</td>
                                            <td>13 Nov 2025</td>
                                            <td><span class="badge text-bg-success">Selesai</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer clearfix">
                            <a href="#" class="btn btn-sm btn-primary float-end">Lihat Semua</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Row-->

            <!--begin::Row - Statistics-->
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Jenis Hewan</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="text-center border-end">
                                        <i class="bi bi-dog" style="font-size: 2rem; color: #0d6efd;"></i>
                                        <h5 class="fw-bold mb-0 mt-2">180</h5>
                                        <span class="text-uppercase">Anjing</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-center">
                                        <i class="bi bi-heart-fill" style="font-size: 2rem; color: #dc3545;"></i>
                                        <h5 class="fw-bold mb-0 mt-2">140</h5>
                                        <span class="text-uppercase">Kucing</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Statistik Bulanan</h3>
                        </div>
                        <div class="card-body">
                            <div class="progress-group">
                                Kunjungan Bulan Ini
                                <span class="float-end"><b>45</b>/50</span>
                                <div class="progress progress-sm">
                                    <div class="progress-bar text-bg-primary" style="width: 90%"></div>
                                </div>
                            </div>

                            <div class="progress-group">
                                Target Vaksinasi
                                <span class="float-end"><b>30</b>/40</span>
                                <div class="progress progress-sm">
                                    <div class="progress-bar text-bg-success" style="width: 75%"></div>
                                </div>
                            </div>

                            <div class="progress-group">
                                Operasi Terjadwal
                                <span class="float-end"><b>8</b>/10</span>
                                <div class="progress progress-sm">
                                    <div class="progress-bar text-bg-warning" style="width: 80%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
@endsection