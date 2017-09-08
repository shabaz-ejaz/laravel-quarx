<?php $__env->startSection('content'); ?>

    <div class="row">
        <h1 class="page-header">Roles: Edit</h1>
    </div>
    <div class="row">
        <form method="POST" action="/admin/roles/<?php echo e($role->id); ?>">
            <input name="_method" type="hidden" value="PATCH">
            <?php echo csrf_field(); ?>


            <div class="col-md-12 form-group">
                <?php echo InputMaker::label('Name'); ?>
                <?php echo InputMaker::create('name', ['type' => 'string'], $role); ?>
            </div>

            <div class="col-md-12 form-group">
                <?php echo InputMaker::label('Label'); ?>
                <?php echo InputMaker::create('label', ['type' => 'string'], $role); ?>
            </div>

            <div class="col-md-12 form-group">
                <h3>Permissions</h3>
                <?php $__currentLoopData = Config::get('permissions', []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="checkbox">
                        <label for="<?php echo e($name); ?>">
                            <?php if(stristr($role->permissions, $permission)): ?>
                                <input type="checkbox" name="permissions[<?php echo e($permission); ?>]" id="<?php echo e($name); ?>" checked>
                            <?php else: ?>
                                <input type="checkbox" name="permissions[<?php echo e($permission); ?>]" id="<?php echo e($name); ?>">
                            <?php endif; ?>
                            <?php echo e($name); ?>

                        </label>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="col-md-12 form-group">
                <a class="btn btn-default pull-left" href="<?php echo e(URL::previous()); ?>">Cancel</a>
                <button class="btn btn-primary pull-right" type="submit">Save</button>
            </div>
        </form>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('quarx::layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>