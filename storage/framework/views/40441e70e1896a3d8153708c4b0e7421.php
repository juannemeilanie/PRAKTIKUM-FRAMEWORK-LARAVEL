

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
    <h2>Pemilik</h2>
    <table>
        <div class="d-flex justify-content-between">
            <a href="<?php echo e(route('admin.pemilik.create')); ?>" class="btn btn-secondary"><i class="fas fa-plus"></i> Tambah Pemilik</a>
        </div>
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
                    <button type="button" class="btn btn-sm btn-warning" onclick="window.location='<?php echo e(route('admin.pemilik.edit', $item->idpemilik)); ?>'">
                        <i class="fas fa-edit"></i> Edit
                    </button>
                    <button type="button" class="btn btn-sm btn-danger" onclick="if(confirm('Apakah Anda yakin ingin menghapus data ini?')) { document.getElementById('delete-form-<?php echo e($item->idpemilik); ?>').submit(); }">
                        <i class="fas fa-trash"></i> Hapus
                    </button>
                    <form id="delete-form-<?php echo e($item->idpemilik); ?>" action="<?php echo e(route('admin.pemilik.destroy', $item->idpemilik)); ?>" method="POST" style="display: none;">
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
<?php echo $__env->make('layouts.lte.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\laravel\laravelrshp\resources\views/admin/pemilik/index.blade.php ENDPATH**/ ?>