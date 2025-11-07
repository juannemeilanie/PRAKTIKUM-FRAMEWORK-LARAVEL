<!DOCTYPE html>
<html>
<head>
    <title>Data Master - Ras Hewan</title>
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
    <h2>Ras Hewan</h2>
    <table>
        <button><a href="<?php echo e(route('admin.ras-hewan.create')); ?>"  method="POST" class="btn btn-danger w-100 fw-bold">Tambah Ras Hewan</a></button>
        <button><a href="<?php echo e(route('admin.data_master')); ?>" class="btn btn-secondary w-100 fw-bold">Kembali</a></button>
        <thead>
            <tr>
                <th>ID Ras</th>
                <th>Jenis Hewan</th>
                <th>Nama Ras Hewan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $rashewan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $ras): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($index + 1); ?></td>
                <td><?php if($ras->jenisHewan): ?>
                        <span class="badge-jenis">
                            <?php echo e($ras->jenisHewan->nama_jenis_hewan); ?>

                        </span>
                            <?php else: ?>
                                <span class="text-muted">-</span>
                            <?php endif; ?></td>
                <td><?php echo e($ras->nama_ras); ?></td>
                <td>
                    <button type="button" class="btn btn-sm btn-warning" onclick="window.location='#'">
                        <i class="fas fa-edit"></i> Edit
                    </button>
                    <button type="button" class="btn btn-sm btn-danger" onclick="if(confirm('Apakah Anda yakin ingin menghapus data ini?')) { document.getElementById('delete-form-<?php echo e($ras->idras_hewan); ?>').submit(); }">
                        <i class="fas fa-trash"></i> Hapus
                    </button>
                    <form id="delete-form-<?php echo e($ras->idras_hewan); ?>" action="#" method="POST" style="display: none;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</body><?php /**PATH C:\laragon\www\laravel\laravelrshp\resources\views/admin/ras-hewan/index.blade.php ENDPATH**/ ?>