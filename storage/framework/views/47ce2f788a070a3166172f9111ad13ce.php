

<?php $__env->startSection('content'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Master - Kategori Klinis</title>
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
    <h2>Kategori Klinis</h2>
    <table>
        <div class="d-flex justify-content-between">
            <a href="<?php echo e(route('admin.kategori-klinis.create')); ?>" class="btn btn-secondary"><i class="fas fa-plus"></i> Tambah Kategori Klinis</a>
        </div>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Kategori Klinis</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $kategoriklinis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $kategori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($index + 1); ?></td>
                <td><?php echo e($kategori->nama_kategori_klinis); ?></td>
                <td>
                    <button type="button" class="btn btn-sm btn-warning" onclick="window.location='<?php echo e(route('admin.kategori-klinis.edit', $kategori->idkategori_klinis)); ?>'">
                        <i class="fas fa-edit"></i> Edit
                    </button>
                    <button type="button" class="btn btn-sm btn-danger" onclick="if(confirm('Apakah Anda yakin ingin menghapus data ini?')) { document.getElementById('delete-form-<?php echo e($kategori->idkategori_klinis); ?>').submit(); }">
                        <i class="fas fa-trash"></i> Hapus
                    </button>
                    <form id="delete-form-<?php echo e($kategori->idkategori_klinis); ?>" action="#" method="POST" style="display: none;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</body>
</html>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.lte.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\laravel\laravelrshp\resources\views/admin/kategori-klinis/index.blade.php ENDPATH**/ ?>