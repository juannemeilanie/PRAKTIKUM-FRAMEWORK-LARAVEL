

<?php $__env->startSection('content'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Master - Pet</title>
    <style>
        tr { text-align: center;}
        th, td { border:1px solid #000000ff; padding:10px; text-align:left; }
        th { background:#8f93d8ff;}
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
    <h2>Pet</h2>

    <table>
        <div class="d-flex justify-content-between">
            <a href ="<?php echo e(route('admin.pet.create')); ?>"  method="POST" class="btn btn-secondary">Tambah Pet</a>
        </div>
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
</body>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.lte.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\laravel\laravelrshp\resources\views/admin/pet/index.blade.php ENDPATH**/ ?>