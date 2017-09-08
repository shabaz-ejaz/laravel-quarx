<?php $__env->startSection('content'); ?>

    <div class="row">
        <h1 class="page-header">Images</h1>
    </div>

    <?php echo $__env->make('quarx::modules.images.breadcrumbs', ['location' => ['edit']], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="thumbnail ">
                <img src="<?php echo $images->url; ?>" />
            </div>
        </div>
        <div class="col-md-4">
            <h2 class="raw-margin-top-0 raw-margin-bottom-24">Blade Tags</h2>
<pre>
 &#64;image(<?php echo e($images->id); ?>)
 &#64;image_link(<?php echo e($images->id); ?>)
<?php $__currentLoopData = explode(',', $images->tags); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> &#64;images(<?php echo e(trim($tag)); ?>)<br><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></pre>
            <?php if(!is_null($images->entity_id)): ?>
                <h2 class="raw-margin-top-24 raw-margin-bottom-8">Linked Entity</h2>
                <a href="<?php echo e(url(config('quarx.backend-route-prefix', 'quarx').'/'.$images->entity_type.'s/'.$images->entity_id.'/edit')); ?>"><?php echo e(ucfirst($images->entity_type)); ?></a>
            <?php endif; ?>
        </div>
    </div>

    <div class="row">
        <?php echo Form::model($images, ['route' => [config('quarx.backend-route-prefix', 'quarx').'.images.update', $images->id], 'method' => 'patch', 'files' => true, 'class' => 'edit']); ?>


            <?php echo FormMaker::fromObject($images, Config::get('quarx.forms.images-edit')); ?>


            <div class="form-group text-right">
                <a href="<?php echo url(config('quarx.backend-route-prefix', 'quarx').'/images'); ?>" class="btn btn-default raw-left">Cancel</a>
                <?php echo Form::submit('Save', ['class' => 'btn btn-primary']); ?>

            </div>

        <?php echo Form::close(); ?>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('quarx::layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>