<!DOCTYPE html>
<html>
<head>
    <title>Data Master - Kode Tindakan</title>
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
    <h2>Data Master - Kode Tindakan</h2>
    <table>
        <thead>
            <tr>
                <th>ID </th>
                <th>Kode Tindakan</th>
                <th>Deskripsi</th>
                <th>Kategori</th>
                <th>Kategori Klinis</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $kodetindakan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $kode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($index + 1); ?></td>
                <td><?php echo e($kode->kode); ?></td>
                <td><?php echo e($kode->deskripsi_tindakan_terapi); ?></td>
                <td><?php echo e($kode->kategori->nama_kategori); ?></td>
                <td><?php echo e($kode->kategoriKlinis->nama_kategori_klinis); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>    <?php /**PATH C:\laragon\www\laravel\laravelrshp\resources\views/admin/kode-tindakan/index.blade.php ENDPATH**/ ?>