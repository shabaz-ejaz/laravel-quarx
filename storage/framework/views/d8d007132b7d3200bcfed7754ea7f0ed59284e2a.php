<?php $__env->startSection('navigation'); ?>

<div class="raw100 raw-left navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <button class="navbar-toggle sidebar-menu-btn">
            <span class="fa fa-bars nav-open"></span>
            <span class="fa fa-close nav-close"></span>
        </button>
        <span class="navbar-brand">
            <span class="quarx-logo"></span> <?php echo e(config('quarx.backend-title', 'Quarx')); ?>

        </span>
        <?php if(Auth::user()): ?>
        <p class="navbar-text navbar-left raw-m-hide">Signed in as <?php echo e(Auth::user()->name); ?></p>
        <?php endif; ?>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavbar">
            <span class="fa fa-gear"></span>
        </button>
    </div>
    <div class="collapse navbar-collapse navbar-right" id="mainNavbar">
        <ul class="nav navbar-nav">
            <li><a href="<?php echo e(URL::to('/')); ?>"><span class="fa fa-arrow-left"></span> Back To Site </a></li>
            <?php if(Auth::user()): ?>
            <li><a href="/logout"><span class="fa fa-sign-out"></span> Logout</a></li>
            <?php endif; ?>
        </ul>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('quarx::layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>