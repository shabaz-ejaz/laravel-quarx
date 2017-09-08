<?php $__env->startSection('app-content'); ?>

    <div class="row">
        <div class="col-md-4 col-md-offset-4">

            <h1 class="text-center">Login</h1>

            <form method="POST" action="/login">
                <?php echo csrf_field(); ?>

                <div class="col-md-12 raw-margin-top-24">
                    <label>Email</label>
                    <input class="form-control" type="email" name="email" value="<?php echo e(old('email')); ?>">
                </div>
                <div class="col-md-12 raw-margin-top-24">
                    <label>Password</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <div class="col-md-12 raw-margin-top-24">
                    <label>
                        Remember Me <input type="checkbox" name="remember">
                    </label>
                </div>
                <div class="col-md-12 raw-margin-top-24">
                    <a class="btn btn-default pull-left" href="/password/reset">Forgot Password</a>
                    <button class="btn btn-primary pull-right" type="submit">Login</button>
                </div>

                <div class="col-md-12 raw-margin-top-24">
                    <a class="btn raw100 btn-info" href="/register">Register</a>
                </div>
            </form>

        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>