

<?php $__env->startSection('content'); ?>

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
                    <h5 class="fw-bold mb-1">Halo, <?php echo e(Auth::user()->nama ?? 'Pengguna'); ?> 👋</h5>
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
                        <span class="info-box-number"><?php echo e($totalPemilik ?? 0); ?></span>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box shadow-sm">
                    <span class="info-box-icon text-bg-success"><i class="bi bi-heart-pulse-fill"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Hewan</span>
                        <span class="info-box-number"><?php echo e($totalPet ?? 0); ?></span>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box shadow-sm">
                    <span class="info-box-icon text-bg-warning"><i class="bi bi-calendar-check"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Temu Dokter Hari Ini</span>
                        <span class="info-box-number"><?php echo e($totalTemuDokter ?? 0); ?></span>
                    </div>
                </div>
            </div>

        </div>

        <!-- ====== TABLE PEMILIK ====== -->
        <div class="card shadow-sm mt-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title"><i class="bi bi-people"></i> Daftar Pemilik Terbaru</h3>
                <a href="<?php echo e(route('resepsionis.pemilik.index')); ?>" class="btn btn-primary btn-sm">Lihat Semua</a>
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
                            <?php $__currentLoopData = $pemilik; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($index + 1); ?></td>
                                <td><?php echo e($item->nama); ?></td>
                                <td><?php echo e($item->email); ?></td>
                                <td><?php echo e($item->no_wa); ?></td>
                                <td><?php echo e($item->alamat); ?></td>
                                <td>
                                    <button class="btn btn-warning btn-sm">Edit<i class="fas fa-edit"></i></button>
                                    <button class="btn btn-danger btn-sm" onclick="if(confirm('Hapus?')) document.getElementById('delete-<?php echo e($item->idpemilik); ?>').submit()">Hapus<i class="fas fa-trash"></i></button>
                                    <form id="delete-<?php echo e($item->idpemilik); ?>" method="POST" action="<?php echo e(route('resepsionis.pemilik.destroy', $item->idpemilik)); ?>" hidden><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?></form>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- ====== TABLE PET ====== -->
        <div class="card shadow-sm mt-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title"><i class="bi bi-heart"></i> Daftar Pet Terbaru</h3>
                <a href="<?php echo e(route('resepsionis.pet.index')); ?>" class="btn btn-primary btn-sm">Lihat Semua</a>
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
                            <?php $__currentLoopData = $pets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($pet->nama_pet); ?></td>
                                <td><?php echo e($pet->tanggal_lahir); ?></td>
                                <td><?php echo e($pet->warna_tanda); ?></td>
                                <td><?php echo e($pet->jenis_kelamin); ?></td>
                                <td><?php echo e($pet->nama_pemilik); ?></td>
                                <td><?php echo e($pet->nama_ras); ?></td>
                                <td>
                                    <a href="<?php echo e(route('resepsionis.pet.edit', $pet->idpet)); ?>" class="btn btn-warning btn-sm">Edit<i class="fas fa-edit"></i></a>
                                    <button class="btn btn-danger btn-sm" onclick="if(confirm('Hapus?')) document.getElementById('delpet-<?php echo e($pet->idpet); ?>').submit()">Hapus<i class="fas fa-trash"></i></button>
                                    <form id="delpet-<?php echo e($pet->idpet); ?>" method="POST" hidden action="<?php echo e(route('resepsionis.pet.destroy', $pet->idpet)); ?>"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?></form>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- ====== TEMU DOKTER ====== -->
        <div class="card shadow-sm mt-4 mb-5">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title"><i class="bi bi-calendar-check"></i> Jadwal Temu Dokter Hari Ini</h3>
                <a href="<?php echo e(route('resepsionis.temu-dokter.index')); ?>" class="btn btn-primary btn-sm">Lihat Semua</a>
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
                            <?php $__currentLoopData = $temuDokter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($index + 1); ?></td>
                                <td><?php echo e($item->waktu_daftar); ?></td>
                                <td><?php echo e($item->nama_pet); ?></td>
                                <td><?php echo e($item->nama_dokter); ?></td>
                                <td>
                                    <?php if($item->status == 1): ?>
                                        <span class="badge text-bg-warning">Diproses</span>
                                    <?php else: ?>
                                        <span class="badge text-bg-success">Selesai</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <button class="btn btn-warning btn-sm">Edit<i class="fas fa-edit"></i></button>
                                    <button class="btn btn-danger btn-sm" onclick="if(confirm('Hapus?')) document.getElementById('deltd-<?php echo e($item->idreservasi_dokter); ?>').submit()">Hapus<i class="fas fa-trash"></i></button>
                                    <form id="deltd-<?php echo e($item->idreservasi_dokter); ?>" method="POST" action="<?php echo e(route('resepsionis.temu-dokter.destroy', $item->idreservasi_dokter)); ?>" hidden><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?></form>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
<!--end::App Content-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.lte.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\laravel\laravelrshp\resources\views/resepsionis/dashboard-resepsionis.blade.php ENDPATH**/ ?>