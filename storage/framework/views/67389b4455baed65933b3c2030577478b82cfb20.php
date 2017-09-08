<?php $__env->startSection('content'); ?>

    <div class="modal fade" id="deleteModal" tabindex="-3" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="deleteModalLabel">Delete Widgets</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure want to delete this widget?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a id="deleteBtn" type="button" class="btn btn-warning" href="#">Confirm Delete</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <a class="btn btn-primary pull-right" href="<?php echo route(config('quarx.backend-route-prefix', 'quarx').'.widgets.create'); ?>">Add New</a>
        <div class="raw-m-hide pull-right">
            <?php echo Form::open(['url' => 'quarx/widgets/search']); ?>

            <input class="form-control header-input pull-right raw-margin-right-24" name="term" placeholder="Search">
            <?php echo Form::close(); ?>

        </div>
        <h1 class="page-header">Widgets</h1>
    </div>

    <div class="row">
        <?php if(isset($term)): ?>
        <div class="well text-center">Searched for "<?php echo $term; ?>".</div>
        <?php endif; ?>
        <?php if($widgets->count() === 0): ?>
            <div class="well text-center">No widgets found.</div>
        <?php else: ?>
            <table class="table table-striped">
                <thead>
                    <th><?php echo sortable('Name', 'name'); ?></th>
                    <th><?php echo sortable('Slug', 'slug'); ?></th>
                    <th width="200px" class="text-right">Actions</th>
                </thead>
                <tbody>

                <?php $__currentLoopData = $widgets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $widget): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><a href="<?php echo route(config('quarx.backend-route-prefix', 'quarx').'.widgets.edit', [$widget->id]); ?>"><?php echo $widget->name; ?></a></td>
                        <td class="raw-m-hide"><?php echo $widget->slug; ?></td>
                        <td>
                            <form method="post" action="<?php echo url(config('quarx.backend-route-prefix', 'quarx').'/widgets/'.$widget->id); ?>">
                                <?php echo csrf_field(); ?>

                                <?php echo method_field('DELETE'); ?>

                                <button class="delete-btn btn btn-xs btn-danger pull-right" type="submit"><i class="fa fa-trash"></i> Delete</button>
                            </form>
                            <a class="btn btn-xs btn-default pull-right raw-margin-right-8" href="<?php echo route(config('quarx.backend-route-prefix', 'quarx').'.widgets.edit', [$widget->id]); ?>"><i class="fa fa-pencil"></i> Edit</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

    <div class="text-center">
        <?php echo $pagination; ?>

    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('quarx::layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>