<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="pull-right raw-margin-top-24 raw-margin-left-24">
                <?php echo Form::open(['route' => 'posts.search']); ?>

                <input class="form-control form-inline pull-right" name="search" placeholder="Search">
                <?php echo Form::close(); ?>

            </div>
            <h1 class="pull-left">Posts: Create</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">

            <?php echo Form::open(['route' => 'posts.store']); ?>


            <?php echo FormMaker::fromTable("posts"); ?>

            <?php echo Form::submit('Save', ['class' => 'btn btn-primary pull-right']); ?>


            <?php echo Form::close(); ?>


        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('quarx::layouts.dashboard', ['pageTitle' => '_camelUpper_casePlural_ &raquo; Create'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>