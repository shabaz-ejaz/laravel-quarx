<?php $__env->startSection('app-content'); ?>

    <div class="row">
        <div class="col-md-4 col-md-offset-4 text-center">

            <h1 class="text-center">Activate</h1>

            <p>A new token has been emailed to you.</p>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>