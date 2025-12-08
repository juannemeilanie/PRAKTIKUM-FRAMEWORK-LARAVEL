

<?php $__env->startSection('content'); ?>

    <!--begin::App Content Header-->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Dashboard Perawat</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!--end::App Content Header-->

    <!--begin::App Content-->
    <div class="app-content">
        <div class="container-fluid">

            <div class="alert alert-primary shadow-sm mb-4">
                <h5 class="fw-bold mb-1">Halo, <?php echo e(Auth::user()->nama ?? 'Perawat'); ?></h5>
                <span>Selamat datang di dashboard Perawat</span>
            </div>
            <!-- Info Box Row -->
            <div class="row">

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon text-bg-primary shadow-sm">
                            <i class="bi bi-journal-medical"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Rekam Medis</span>
                            <span class="info-box-number"><?php echo e($totalRekam); ?></span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon text-bg-warning shadow-sm">
                            <i class="bi bi-clipboard2-pulse-fill"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Antrian Hari Ini</span>
                            <span class="info-box-number">0</span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon text-bg-danger shadow-sm">
                            <i class="bi bi-people-fill"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Jumlah Pasien</span>
                            <span class="info-box-number"><?php echo e($totalPasien); ?></span>
                        </div>
                    </div>
                </div>

            </div>
            <!-- End Row -->

            <!-- Rekam Medis Terbaru -->
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
                                        <?php $__currentLoopData = $dataRekam; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($i + 1); ?></td>
                                            <td><?php echo e($r->nama_pet); ?></td>
                                            <td><?php echo e($r->nama_pemilik); ?></td>
                                            <td><?php echo e($r->diagnosa); ?></td>
                                            <td><?php echo e($r->nama_dokter); ?></td>
                                            <td><?php echo e($r->created_at); ?></td>
                                            <td>
                                                <a href="<?php echo e(route('perawat.rekam_medis.show', $r->idrekam_medis)); ?>" class="btn btn-secondary">
                                                    Detail
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card-footer clearfix">
                            <a href="<?php echo e(route('perawat.rekam_medis.index')); ?>" class="btn btn-primary btn-sm float-end">Lihat Semua</a>
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
                                            <?php $__currentLoopData = $pets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $pet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($pet->nama); ?></td>
                                                <td><?php echo e($pet->tanggal_lahir); ?></td>
                                                <td><?php echo e($pet->warna_tanda); ?></td>
                                                <td><?php echo e($pet->jenis_kelamin); ?></td>
                                                <td><?php echo e($pet->nama_pemilik); ?></td>
                                                <td><?php echo e($pet->nama_ras); ?></td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        <div class="card-footer clearfix">
                            <a href="<?php echo e(route('perawat.data-pasien.index')); ?>" class="btn btn-primary btn-sm float-end">Lihat Semua</a>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.lte.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\laravel\laravelrshp\resources\views/perawat/dashboard-perawat.blade.php ENDPATH**/ ?>