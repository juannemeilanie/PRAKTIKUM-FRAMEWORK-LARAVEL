

<?php $__env->startSection('content'); ?>

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
            <h5 class="fw-bold mb-1">Halo, <?php echo e(Auth::user()->nama ?? 'Pemilik'); ?> 👋</h5>
            <span>Selamat datang di dashboard Anda. Kelola hewan peliharaan Anda di sini.</span>
        </div>

        <!-- ====== INFO BOXES ====== -->
        <div class="row">
            <div class="col-md-4">
                <div class="info-box shadow-sm">
                    <span class="info-box-icon text-bg-primary"><i class="bi bi-heart"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Pet Anda</span>
                        <span class="info-box-number"><?php echo e($totalPet ?? 0); ?></span>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="info-box shadow-sm">
                    <span class="info-box-icon text-bg-success"><i class="bi bi-calendar-check"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Temu Dokter</span>
                        <span class="info-box-number"><?php echo e($totalTemuDokter ?? 0); ?></span>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="info-box shadow-sm">
                    <span class="info-box-icon text-bg-warning"><i class="bi bi-plus-circle"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Tambah Pet Baru</span>
                        <a href="#" class="btn btn-sm btn-primary mt-2">Daftar Pet</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- ====== TABLE PET ====== -->
        <div class="card shadow-sm mt-4 mb-5">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title"><i class="bi bi-heart-pulse"></i> Daftar Pet Anda</h3>
                <a href="#" class="btn btn-primary btn-sm">Tambah Pet</a>
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
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $pets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($pet->nama_pet); ?></td>
                                <td><?php echo e($pet->tanggal_lahir); ?></td>
                                <td><?php echo e($pet->warna_tanda); ?></td>
                                <td><?php echo e($pet->jenis_kelamin); ?></td>
                                <td><?php echo e($pet->nama_ras); ?></td>
                                <td>
                                    <a href="#" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                    <button class="btn btn-danger btn-sm" onclick="if(confirm('Yakin hapus?')) document.getElementById('delpet-<?php echo e($pet->idpet); ?>').submit()"><i class="fas fa-trash"></i></button>
                                    <form id="delpet-<?php echo e($pet->idpet); ?>" method="POST" hidden action="#"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?></form>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">Belum ada pet terdaftar.</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
<!--end::App Content-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.lte.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\laravel\laravelrshp\resources\views/pemilik/dashboard-pemilik.blade.php ENDPATH**/ ?>