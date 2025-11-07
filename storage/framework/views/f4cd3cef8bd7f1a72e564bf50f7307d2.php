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
    <h2>Pet</h2>
    <table>
        <button><a href ="<?php echo e(route('admin.pet.create')); ?>"  method="POST" class="btn btn-danger w-100 fw-bold">Tambah Pet</a></button>
        <button><a href="<?php echo e(route('admin.data_master')); ?>" class="btn btn-secondary w-100 fw-bold">Kembali</a></button>
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
                <td><?php echo e($pet->pemilik->user->nama); ?></td>
                <td><?php echo e($pet->rasHewan->nama_ras); ?></td>
                <td>
                    <button type="button" class="btn btn-sm btn-warning" onclick="window.location='#'">
                        <i class="fas fa-edit"></i> Edit
                    </button>
                    <button type="button" class="btn btn-sm btn-danger" onclick="if(confirm('Apakah Anda yakin ingin menghapus data ini?')) { document.getElementById('delete-form-<?php echo e($pet->idpet); ?>').submit(); }">
                        <i class="fas fa-trash"></i> Hapus
                    </button>
                    <form id="delete-form-<?php echo e($pet->idpet); ?>" action="#" method="POST" style="display: none;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                    </form>                    
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</body><?php /**PATH C:\laragon\www\laravel\laravelrshp\resources\views/admin/pet/index.blade.php ENDPATH**/ ?>