<?php $__env->startSection('page-content'); ?>

    <div class="overlay"></div>

    <div class="raw100 raw-left raw-margin-top-50">
        <div class="col-sm-3 col-md-2 sidebar">
            <div class="raw100 raw-left raw-margin-bottom-90">
                <?php echo $__env->make('quarx::dashboard.panel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <div class="col-md-12">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    </div>

    <div class="raw100 raw-left navbar navbar-fixed-bottom">
        <div class="raw100 raw-left quarx-footer">
            <p class="raw-margin-left-20 pull-left">Brought to you by: <a href="https://yabhq.com">Yab Inc.</a></p>
            <p class="raw-margin-right-20 pull-right">v. <?php echo e(Quarx::version()); ?></p>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <?php echo Minify::javascript(Quarx::asset('js/dashboard.js', 'application/javascript')); ?>

    <?php echo Minify::javascript(Quarx::asset('js/chart.min.js', 'application/javascript')); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('quarx::layouts.navigation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>