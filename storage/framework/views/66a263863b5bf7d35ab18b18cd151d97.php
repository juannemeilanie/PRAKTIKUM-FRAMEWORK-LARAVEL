

<?php $__env->startSection('content'); ?>
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
                        <span class="info-box-icon text-bg-success shadow-sm">
                            <i class="bi bi-heart-pulse-fill"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Hewan</span>
                            <span class="info-box-number"><?php echo e($totalPet); ?></span>
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
                            <span class="info-box-number"><?php echo e($totalPemilik); ?></span>
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
                            <span class="info-box-number"><?php echo e($totalUser); ?></span>
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
                            <h3 class="card-title">Data Pet</h3>
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
                                            <th>Aksi</th>
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
                                            <td>
                                                <button type="button" class="btn btn-sm btn-warning" onclick="window.location='<?php echo e(route('admin.pet.edit', $pet->idpet)); ?>'">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>
                                                <button type="button" class="btn btn-sm btn-danger" onclick="if(confirm('Apakah Anda yakin ingin menghapus data ini?')) { document.getElementById('delete-form-<?php echo e($pet->idpet); ?>').submit(); }">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </button>
                                                <form id="delete-form-<?php echo e($pet->idpet); ?>" action="<?php echo e(route('admin.pet.destroy', $pet->idpet)); ?>" method="POST" style="display: none;">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                </form>                    
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                <table class="table m-0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Jenis Hewan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $jenisHewan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $hewan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($index + 1); ?></td>
                                            <td><?php echo e($hewan->nama_jenis_hewan); ?></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                </div>
                                <div class="card-footer clearfix">
                                    <a href="<?php echo e(route('admin.jenis-hewan.index')); ?>" class="btn btn-sm btn-primary float-end">Lihat Semua</a>
                                </div>
                            </div>
                        </div>
                    </div>
                

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">User</h3>
                        </div>
                        <div class="card-body">
                            
                        <table class="table m-0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama User</th>
                                    <th>Nama Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $roleUser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $userRole): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($index + 1); ?></td>
                                    <td><?php echo e($userRole->nama); ?></td>
                                    <td><?php echo e($userRole->nama_role); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            </table>
                        </div>
                        <div class="card-footer clearfix">
                            <a href="<?php echo e(route('admin.user-role.index')); ?>" class="btn btn-sm btn-primary float-end">Lihat Semua</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.lte.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\laravel\laravelrshp\resources\views/admin/dashboard-admin.blade.php ENDPATH**/ ?>