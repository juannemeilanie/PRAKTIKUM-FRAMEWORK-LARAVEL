

<?php $__env->startSection('content'); ?>

<style>
    tr { text-align: center; }
    th, td { border:1px solid #000000ff; padding:10px; text-align:left; }
    th { background:#8f93d8ff; }
    table { width: 100%; border-collapse: collapse; }
    .card { padding: 20px; background: white; border-radius: 10px; }
</style>

<body>
    
<div class="container">
    <div class="row justify-content-center">
        <div class="card">

            <h2>Data Rekam Medis</h2>

            <div class="d-flex justify-content-between mb-3">
                <a href="<?php echo e(route('perawat.rekam_medis.create')); ?>" class="btn btn-secondary">Tambah Rekam Medis</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Pet</th>
                        <th>Pemilik</th>
                        <th>Anamnesa</th>
                        <th>Temuan Klinis</th>
                        <th>Diagnosa</th>
                        <th>Dokter</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $dataRekam; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($i + 1); ?></td>
                        <td><?php echo e(date('d/m/Y H:i', ($r->created_at))); ?></td>
                        <td><?php echo e($r->nama_pet); ?></td>
                        <td><?php echo e($r->nama_pemilik); ?></td>
                        <td><?php echo e($r->anamnesa); ?></td>
                        <td><?php echo e($r->temuan_klinis); ?></td>
                        <td><?php echo e($r->diagnosa); ?></td>
                        <td><?php echo e($dokter->nama); ?></td>
                        <td>
                            <a href="<?php echo e(route('perawat.rekam_medis.show', $r->idrekam_medis)); ?>" class="btn btn-secondary">Detail</a>
                            <a href="<?php echo e(route('perawat.rekam_medis.edit', $r->idrekam_medis)); ?>" class="btn btn-warning">Edit</a>
                            <form action="<?php echo e(route('perawat.rekam_medis.destroy', $r->idrekam_medis)); ?>" method="POST"  style="display:inline;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus rekam medis ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.lte.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\laravel\laravelrshp\resources\views/perawat/rekam_medis.blade.php ENDPATH**/ ?>