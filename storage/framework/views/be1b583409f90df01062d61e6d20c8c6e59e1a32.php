
<?php if(Session::has("notification")): ?>
    quarxNotify("<?php echo e(Session::get("notification")); ?>", "<?php echo e(Session::get("notificationType")); ?>");
<?php endif; ?>

<?php if(Session::has("message")): ?>
    quarxNotify("<?php echo e(Session::get("message")); ?>", "alert-info");
<?php endif; ?>

<?php if(Session::has("errors")): ?>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        quarxNotify("<?php echo e($error); ?>", "alert-danger");
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>