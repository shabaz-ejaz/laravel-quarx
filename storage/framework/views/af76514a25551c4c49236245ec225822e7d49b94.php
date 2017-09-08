<?php $__env->startSection('content'); ?>

    <div class="modal fade" id="deleteModal" tabindex="-3" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="deleteModalLabel">Delete Event</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure want to delete this event?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a id="deleteBtn" type="button" class="btn btn-warning" href="#">Confirm Delete</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <a class="btn btn-primary pull-right" href="<?php echo route(config('quarx.backend-route-prefix', 'quarx').'.events.create'); ?>">Add New</a>
        <div class="raw-m-hide pull-right">
            <?php echo Form::open(['url' => 'quarx/events/search']); ?>

            <input class="form-control header-input pull-right raw-margin-right-24" name="term" placeholder="Search">
            <?php echo Form::close(); ?>

        </div>
        <h1 class="page-header">Events</h1>
    </div>

    <div class="row">
        <?php if(isset($term)): ?>
        <div class="well text-center">Searched for "<?php echo $term; ?>".</div>
        <?php endif; ?>
        <?php if($events->count() === 0): ?>
            <div class="well text-center">No events found.</div>
        <?php else: ?>
            <table class="table table-striped">
                <thead>
                    <th><?php echo sortable('Title', 'title'); ?></th>
                    <th><?php echo sortable('Start Date', 'start_date'); ?></th>
                    <th><?php echo sortable('End Date', 'end_date'); ?></th>
                    <th><?php echo sortable('Published', 'is_published'); ?></th>
                    <th width="200px" class="text-right">Actions</th>
                </thead>
                <tbody>

                <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><a href="<?php echo route(config('quarx.backend-route-prefix', 'quarx').'.events.edit', [$event->id]); ?>"><?php echo $event->title; ?></a></td>
                        <td><?php echo date('M jS, Y', strtotime($event->start_date)); ?></td>
                        <td><?php echo date('M jS, Y', strtotime($event->end_date)); ?></td>
                        <td class="raw-m-hide">
                            <?php if($event->is_published): ?>
                                <span class="fa fa-check"></span>
                            <?php else: ?>
                                <span class="fa fa-close"></span>
                            <?php endif; ?>
                        </td>
                        <td class="text-right">
                            <form method="post" action="<?php echo url(config('quarx.backend-route-prefix', 'quarx').'/events/'.$event->id); ?>">
                                <?php echo csrf_field(); ?>

                                <?php echo method_field('DELETE'); ?>

                                <button class="delete-btn btn btn-xs btn-danger pull-right" type="submit"><i class="fa fa-trash"></i> Delete</button>
                            </form>
                            <a class="btn btn-xs btn-default pull-right raw-margin-right-8" href="<?php echo route(config('quarx.backend-route-prefix', 'quarx').'.events.edit', [$event->id]); ?>"><i class="fa fa-pencil"></i> Edit</a>
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