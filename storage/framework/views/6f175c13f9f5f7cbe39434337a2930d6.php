

<?php $__env->startSection('content'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Master - Jenis Hewan</title>
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
    <h2>Jenis Hewan</h2>
    <table>
        <div class="d-flex justify-content-between">
            <a href="<?php echo e(route('admin.jenis-hewan.create')); ?>"  method="POST" class="btn btn-secondary">Tambah Jenis Hewan</a>
        <div>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Jenis Hewan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $jenisHewan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $hewan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($index + 1); ?></td>
                    <td><?php echo e($hewan->nama_jenis_hewan); ?></td>
                    <td>
                        <button type="button" class="btn btn-sm btn-warning" onclick="window.location='<?php echo e(route('admin.jenis-hewan.edit', $hewan->idjenis_hewan)); ?>'">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button type="button" class="btn btn-sm btn-danger" onclick="if(confirm('Apakah Anda yakin ingin menghapus data ini?')) { document.getElementById('delete-form-<?php echo e($hewan->idjenis_hewan); ?>').submit(); }">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                        <form id="delete-form-<?php echo e($hewan->idjenis_hewan); ?>" action="<?php echo e(route('admin.jenis-hewan.destroy', $hewan->idjenis_hewan)); ?>" method="POST" style="display: none;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.lte.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\laravel\laravelrshp\resources\views/admin/jenis-hewan/index.blade.php ENDPATH**/ ?>