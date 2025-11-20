

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah Jenis Hewan</h4>
                    </div>
                    <div class="card-body">
                        <?php if($errors->any()): ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <form method="POST" action="<?php echo e(route('admin.jenis-hewan.store')); ?>">
                            <?php echo csrf_field(); ?>

                            <div class="mb-3">
                                <label for="nama_jenis_hewan" class="form-label">Nama Jenis Hewan <span class="text-danger">*</span></label>
                                <input  type="text" 
                                        class="form-control <?php $__errorArgs = ['nama_jenis_hewan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                        id="nama_jenis_hewan" 
                                        name="nama_jenis_hewan" 
                                        value="<?php echo e(old('nama_jenis_hewan')); ?>" 
                                        placeholder="Masukkan nama jenis hewan" 
                                        required>
                                <?php $__errorArgs = ['nama_jenis_hewan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($message); ?>

                                    </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="<?php echo e(route('admin.jenis-hewan.index')); ?>" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i>Kembali</a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
                        
<?php echo $__env->make('layouts.lte.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\laravel\laravelrshp\resources\views/admin/jenis-hewan/tambah.blade.php ENDPATH**/ ?>