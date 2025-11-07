
<!DOCTYPE html>
<html>
<head>
    <title>Data Master - Pet</title>
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
    <h2>Pemilik</h2>
    <table border="1" cellpadding="8" cellspacing="0">
        <button><a href="<?php echo e(route('admin.pemilik.create')); ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Pemilik</a></button>
        <button><a href="<?php echo e(route('admin.data_master')); ?>" class="btn btn-secondary w-100 fw-bold">Kembali</a></button>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pemilik</th>
                <th>No WA</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $pemilik; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($index + 1); ?></td>
                <td><?php echo e($item->user->nama); ?></td>
                <td><?php echo e($item->no_wa); ?></td>
                <td><?php echo e($item->alamat); ?></td>
                <td>
                    <button type="button" class="btn btn-sm btn-warning" onclick="window.location='#'">
                        <i class="fas fa-edit"></i> Edit
                    </button>
                    <button type="button" class="btn btn-sm btn-danger" onclick="if(confirm('Apakah Anda yakin ingin menghapus data ini?')) { document.getElementById('delete-form-<?php echo e($item->idpemilik); ?>').submit(); }">
                        <i class="fas fa-trash"></i> Hapus
                    </button>
                    <form id="delete-form-<?php echo e($item->idpemilik); ?>" action="#" method="POST" style="display: none;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</body>
<?php /**PATH C:\laragon\www\laravel\laravelrshp\resources\views/admin/pemilik/index.blade.php ENDPATH**/ ?>