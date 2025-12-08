

<?php $__env->startSection('content'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Master - User</title>
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
        <h2>User</h2>

        <table>
            <div class="d-flex justify-content-between">
                <a href ="<?php echo e(route('admin.user.create')); ?>"  method="POST" class="btn btn-sm btn-secondary">Tambah User</a>
            </div>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama User</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($index + 1); ?></td>
                    <td><?php echo e($u->nama); ?></td>
                    <td><?php echo e($u->email); ?></td>
                    <td>
                        <button type="button" class="btn btn-sm btn-warning" onclick="window.location='<?php echo e(route('admin.user.edit', $u->iduser)); ?>'">Edit</button>
                        
                        <form action="<?php echo e(route('admin.user.destroy', $u->iduser)); ?>"
                            method="POST"
                            class="d-inline"
                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?');">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.lte.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\laravel\laravelrshp\resources\views/admin/user/index.blade.php ENDPATH**/ ?>