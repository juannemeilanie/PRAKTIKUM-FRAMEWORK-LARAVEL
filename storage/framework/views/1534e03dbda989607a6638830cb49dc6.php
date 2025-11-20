

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="card p-3">

            <h2>Kode Tindakan</h2>

            <div class="d-flex justify-content-between mb-2">
                <a href="<?php echo e(route('admin.kode-tindakan.create')); ?>" 
                   class="btn btn-sm btn-secondary">
                    Tambah Kode Tindakan
                </a>
            </div>

            <table class="table table-bordered">
                <thead style="background:#8f93d8ff; text-align:center;">
                    <tr>
                        <th>ID</th>
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
                        <td><?php echo e($kode->nama_kategori); ?></td>
                        <td><?php echo e($kode->nama_kategori_klinis); ?></td>

                        <td class="text-center">
                            <a href="<?php echo e(route('admin.kode-tindakan.edit', $kode->idkode_tindakan_terapi)); ?>"
                               class="btn btn-sm btn-warning">
                               <i class="fas fa-edit"></i> Edit
                            </a>

                            <form action="<?php echo e(route('admin.kode-tindakan.destroy', $kode->idkode_tindakan_terapi)); ?>" 
                                  method="POST" 
                                  style="display:inline-block;"
                                  onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>

                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
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

<?php echo $__env->make('layouts.lte.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\laravel\laravelrshp\resources\views/admin/kode-tindakan/index.blade.php ENDPATH**/ ?>