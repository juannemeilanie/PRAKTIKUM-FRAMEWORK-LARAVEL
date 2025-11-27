

<?php $__env->startSection('content'); ?>

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
                    <h5 class="fw-bold mb-1">Halo, <?php echo e(session('user_name')); ?> 👋</h5>
                    <span>Selamat datang di dashboard dokter RSHP Unair.</span>
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
                        <span class="info-box-text">Rekam Medis Hari Ini</span>
                        <span class="info-box-number">12</span>
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
                        <span class="info-box-number">7</span>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon text-bg-warning shadow-sm">
                        <i class="bi bi-clock-history"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">Menunggu Pemeriksaan</span>
                        <span class="info-box-number">5</span>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon text-bg-danger shadow-sm">
                        <i class="bi bi-bandaid-fill"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">Tindakan Hari Ini</span>
                        <span class="info-box-number">3</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- ====== TABLE REKAM MEDIS ====== -->
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card shadow-sm">
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
                                        <th>No. RM</th>
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
                                        <td>27 Nov 2025</td>
                                        <td><span class="badge text-bg-success">Selesai</span></td>
                                    </tr>

                                    <tr>
                                        <td><a href="#">RM002</a></td>
                                        <td>Luna</td>
                                        <td>Sarah</td>
                                        <td>27 Nov 2025</td>
                                        <td><span class="badge text-bg-warning">Proses</span></td>
                                    </tr>

                                    <tr>
                                        <td><a href="#">RM003</a></td>
                                        <td>Milo</td>
                                        <td>Michael</td>
                                        <td>26 Nov 2025</td>
                                        <td><span class="badge text-bg-danger">Belum Ditangani</span></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-footer clearfix">
                        <a href="#" class="btn btn-primary btn-sm float-end">Lihat Semua</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end::App Content-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.lte.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\laravel\laravelrshp\resources\views/dokter/dashboard-dokter.blade.php ENDPATH**/ ?>