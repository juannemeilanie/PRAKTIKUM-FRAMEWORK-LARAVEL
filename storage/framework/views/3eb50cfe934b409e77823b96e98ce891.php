<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Dashboard')); ?> - <?php echo e(session('user_name')); ?></div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <?php echo e(__('You are logged in!')); ?> <?php echo e(session('user_role_name')); ?>


                    <div class="mt-4">
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <a href="<?php echo e(route('admin.jenis-hewan.index')); ?>" class="btn btn-primary btn-block">
                                    <i class="fas fa-paw"></i>Jenis Hewan</a>
                            </div>
                            <div class="col-md-12 mb-2">
                                <a href="<?php echo e(route('admin.pemilik.index')); ?>" class="btn btn-primary btn-block">
                                    <i class="fas fa-users"></i>Pemilik</a>         
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\laravel\laravelrshp\resources\views/home.blade.php ENDPATH**/ ?>