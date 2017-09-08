<?php $__env->startSection('app-content'); ?>

    <div class="row">
        <div class="col-md-4 col-md-offset-4 text-center">

            <h1 class="text-center">Activate</h1>

            <p>Please check your email to activate your account.</p>

            <a class="btn btn-primary" href="<?php echo e(url('activate/send-token')); ?>">Request new Token</a>

        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>