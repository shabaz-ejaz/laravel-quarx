<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="pull-right raw-margin-top-24 raw-margin-left-24">
                <?php echo Form::open(['route' => 'posts.search']); ?>

                <input class="form-control form-inline pull-right" name="search" placeholder="Search">
                <?php echo Form::close(); ?>

            </div>
            <h1 class="pull-left">Posts: Edit</h1>
            <a class="btn btn-primary pull-right raw-margin-top-24 raw-margin-right-8" href="<?php echo route('posts.create'); ?>">Add New</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            <?php echo Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'patch']); ?>


            <?php echo FormMaker::fromObject($post, FormMaker::getTableColumns('posts')); ?>


            <h2>Tags:</h2>


            <?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p>Tag: <?php echo e($tag->name); ?></p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



            <?php echo Form::submit('Update', ['class' => 'btn btn-primary pull-right']); ?>


            <?php echo Form::close(); ?>


        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('quarx::layouts.dashboard', ['pageTitle' => '_camelUpper_casePlural_ &raquo; Edit'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>