<?php $__env->startSection('content'); ?>

    <div class="row">
        <h1 class="page-header">Images</h1>
    </div>

    <?php echo $__env->make('quarx::modules.images.breadcrumbs', ['location' => ['create']], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="row">
        <?php echo Form::open(['url' => 'quarx/images/upload', 'files' => true, 'class' => 'dropzone', 'id' => 'fileDropzone']);; ?>

        <?php echo Form::close(); ?>


        <?php echo Form::open(['route' => config('quarx.backend-route-prefix', 'quarx').'.images.store', 'files' => true, 'id' => 'fileDetailsForm', 'class' => 'add']); ?>


            <?php echo FormMaker::fromTable('files', Config::get('quarx.forms.images')); ?>


            <div class="form-group text-right">
                <a href="<?php echo url(config('quarx.backend-route-prefix', 'quarx').'/images'); ?>" class="btn btn-default raw-left">Cancel</a>
                <?php echo Form::submit('Save', ['class' => 'btn btn-primary', 'id' => 'saveImagesBtn']); ?>

            </div>

        <?php echo Form::close(); ?>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('quarx::layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>