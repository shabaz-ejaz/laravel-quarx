<?php $__env->startSection('content'); ?>

    <div class="row">
        <form id="" class="pull-right raw-margin-left-24" method="post" action="/admin/roles/search">
            <?php echo csrf_field(); ?>

            <input class="form-control" name="search" placeholder="Search">
        </form>
        <a class="btn btn-default pull-right" href="<?php echo e(url('admin/roles/create')); ?>">Create New Role</a>
        <h1 class="page-header">Roles</h1>
    </div>
    <div class="row">
        <table class="table table-striped raw-margin-top-24">

            <thead>
                <th>Name</th>
                <th>Label</th>
                <th class="text-right">Actions</th>
            </thead>
            <tbody>
                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($role->name); ?></td>
                        <td><?php echo e($role->label); ?></td>
                        <td>
                            <form method="post" action="<?php echo url('admin/roles/'.$role->id); ?>">
                                <?php echo csrf_field(); ?>

                                <?php echo method_field('DELETE'); ?>

                                <button class="btn btn-danger btn-xs pull-right" type="submit" onclick="return confirm('Are you sure you want to delete this role?')"><i class="fa fa-trash"></i> Delete</button>
                            </form>
                            <a class="btn btn-warning btn-xs pull-right raw-margin-right-16" href="<?php echo e(url('admin/roles/'.$role->id.'/edit')); ?>"><span class="fa fa-edit"></span> Edit</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>

        </table>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('quarx::layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>