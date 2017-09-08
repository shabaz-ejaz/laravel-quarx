<?php $__env->startSection('content'); ?>

    <div class="modal fade" id="deleteModal" tabindex="-3" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="deleteModalLabel">Delete File</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure want to delete this file?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a id="deleteBtn" type="button" class="btn btn-warning" href="#">Confirm Delete</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <a class="btn btn-primary pull-right" href="<?php echo route(config('quarx.backend-route-prefix', 'quarx').'.files.create'); ?>">Add New</a>
        <div class="raw-m-hide pull-right raw-m-hide">
            <?php echo Form::open(['url' => 'quarx/files/search']); ?>

            <input class="form-control header-input pull-right raw-margin-right-24" name="term" placeholder="Search">
            <?php echo Form::close(); ?>

        </div>
        <h1 class="page-header">Files</h1>
    </div>

    <div class="row">
        <?php if(isset($term)): ?>
            <div class="well text-center">Searched for "<?php echo $term; ?>".</div>
        <?php endif; ?>
        <?php if($files->count() === 0): ?>
            <div class="well text-center">No files found.</div>
        <?php else: ?>
            <table class="table table-striped">
                <thead>
                    <th><?php echo sortable('Name', 'name'); ?></th>
                    <th><?php echo sortable('Is Published', 'is_published'); ?></th>
                    <th width="200px" class="text-right">Actions</th>
                </thead>
                <tbody>

                <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <a href="<?php echo FileService::fileAsDownload($file->name, $file->location); ?>"><span class="fa fa-download"></span></a>
                            <a href="<?php echo route(config('quarx.backend-route-prefix', 'quarx').'.files.edit', [$file->id]); ?>"><?php echo $file->name; ?></a>
                        </td>
                        <td class="raw-m-hide"><?php if($file->is_published): ?> <span class="fa fa-check"></span> <?php else: ?> <span class="fa fa-close"></span> <?php endif; ?></td>
                        <td class="text-right">
                            <form method="post" action="<?php echo url(config('quarx.backend-route-prefix', 'quarx').'/files/'.$file->id); ?>">
                                <?php echo csrf_field(); ?>

                                <?php echo method_field('DELETE'); ?>

                                <button class="delete-btn btn btn-xs btn-danger pull-right" type="submit"><i class="fa fa-trash"></i> Delete</button>
                            </form>
                            <a class="btn btn-xs btn-default pull-right raw-margin-right-8" href="<?php echo route(config('quarx.backend-route-prefix', 'quarx').'.files.edit', [$file->id]); ?>"><i class="fa fa-pencil"></i> Edit</a>
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

<?php $__env->startSection('javascript'); ?>

##parent-placeholder-b6e13ad53d8ec41b034c49f131c64e99cf25207a##
<?php echo Minify::javascript( Quarx::asset('js/bootstrap-tagsinput.min.js', 'application/javascript') ); ?>

<?php echo Minify::javascript( Quarx::asset('dropzone/dropzone.js', 'application/javascript') ); ?>

<?php echo Minify::javascript( Quarx::asset('js/files-module.js', 'application/javascript') ); ?>

<?php echo Minify::javascript( Quarx::asset('js/dropzone-custom.js', 'application/javascript') ); ?>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('quarx::layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>