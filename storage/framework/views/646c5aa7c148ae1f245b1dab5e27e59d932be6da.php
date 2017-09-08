<?php $__env->startSection('app-content'); ?>

    <div class="row">
        <div class="col-md-4 col-md-offset-4">

            <h1 class="text-center">Register</h1>

            <form method="POST" action="/register">
                <?php echo csrf_field(); ?>


                <div class="col-md-12 raw-margin-top-24">
                    <label>Name</label>
                    <input class="form-control" type="text" name="name" value="<?php echo e(old('name')); ?>">
                </div>
                <div class="col-md-12 raw-margin-top-24">
                    <label>Email</label>
                    <input class="form-control" type="email" name="email" value="<?php echo e(old('email')); ?>">
                </div>
                <div class="col-md-12 raw-margin-top-24">
                    <label>Password</label>
                    <input class="form-control" type="password" name="password">
                </div>
                <div class="col-md-12 raw-margin-top-24">
                    <label>Confirm Password</label>
                    <input class="form-control" type="password" name="password_confirmation">
                </div>
                <div class="col-md-12 raw-margin-top-24">
                    <a class="btn btn-default pull-left" href="/login">Login</a>
                    <button class="btn btn-primary pull-right" type="submit">Register</button>
                </div>
            </form>

        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>