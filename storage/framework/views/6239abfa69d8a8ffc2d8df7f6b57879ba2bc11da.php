<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="pull-right raw-margin-top-24 raw-margin-left-24">
                <?php echo Form::open(['route' => 'tags.search']); ?>

                <input class="form-control form-inline pull-right" name="search" placeholder="Search">
                <?php echo Form::close(); ?>

            </div>
            <h1 class="pull-left">Tags</h1>
            <a class="btn btn-primary pull-right raw-margin-top-24 raw-margin-right-8" href="<?php echo route('tags.create'); ?>">Add New</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <?php if($tags->isEmpty()): ?>
                <div class="well text-center">No tags found.</div>
            <?php else: ?>
                <table class="table table-striped">
                    <thead>
                        <th>Name</th>
                        <th class="text-right" width="200px">Action</th>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <a href="<?php echo route('tags.edit', [$tag->id]); ?>"><?php echo e($tag->name); ?></a>
                                </td>
                                <td class="text-right">
                                    <form method="post" action="<?php echo route('tags.destroy', [$tag->id]); ?>">
                                        <?php echo csrf_field(); ?>

                                        <?php echo method_field('DELETE'); ?>

                                        <button class="btn btn-danger btn-xs pull-right" type="submit" onclick="return confirm('Are you sure you want to delete this tag?')"><i class="fa fa-trash"></i> Delete</button>
                                    </form>
                                    <a class="btn btn-default btn-xs pull-right raw-margin-right-16" href="<?php echo route('tags.edit', [$tag->id]); ?>"><i class="fa fa-pencil"></i> Edit</a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 text-center">
            <?php echo $tags;; ?>

        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard', ['pageTitle' => '_camelUpper_casePlural_ &raquo; Index'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>