<!DOCTYPE html>
<html>
<head>
    <title>Data Master - User</title>
    <style>
        tr { text-align: center; }
        body { font-family: Arial, sans-serif; background: #f4f4f4; padding:20px; }
        h2 { color: #333; }
        table { width:50%; border-collapse: collapse; margin-top:20px; }
        th, td { border:1px solid #000000ff; padding:10px; text-align:left; }
        th { background:#8f93d8ff; }
        button { background: #2f3c93ff;; border:none; padding:10px 15px; border-radius:5px; color:#fff; cursor:pointer; }
        button:hover { background: #1e265cff;; }
        a{color: #ffffffff;}
    </style>
</head>
<body>
    <h2>User</h2>

    <table>
        <button><a href ="<?php echo e(route('admin.user.create')); ?>"  method="POST" class="btn btn-danger w-100 fw-bold">Tambah User</a></button>
        <button><a href="<?php echo e(route('admin.data_master')); ?>" class="btn btn-secondary w-100 fw-bold">Kembali</a></button>
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
                    <button><a href="<?php echo e(route('admin.user.edit', $u->iduser)); ?>" class="btn btn-sm btn-warning">Edit</a></button>
                    <form action="<?php echo e(route('admin.user.destroy', $u->iduser)); ?>" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?');">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                    <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table><?php /**PATH C:\laragon\www\laravel\laravelrshp\resources\views/admin/user/index.blade.php ENDPATH**/ ?>