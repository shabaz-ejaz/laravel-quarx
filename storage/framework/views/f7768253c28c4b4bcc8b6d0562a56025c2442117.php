<div class="container">

    <div class="">
        <?php echo e(Session::get('message')); ?>

    </div>

    <div class="row">
        <div class="pull-right">
            <?php echo Form::open(['route' => 'books.search']); ?>

            <input class="form-control form-inline pull-right" name="search" placeholder="Search">
            <?php echo Form::close(); ?>

        </div>
        <h1 class="pull-left">Books</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="<?php echo route('books.create'); ?>">Add New</a>
    </div>

    <div class="row">
        <?php if($books->isEmpty()): ?>
            <div class="well text-center">No books found.</div>
        <?php else: ?>
            <table class="table">
                <thead>
                    <th>Name</th>
                    <th width="50px">Action</th>
                </thead>
                <tbody>
                <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <a href="<?php echo route('books.edit', [$book->id]); ?>"><?php echo e($book->name); ?></a>
                        </td>
                        <td>
                            <a href="<?php echo route('books.edit', [$book->id]); ?>"><i class="fa fa-pencil"></i> Edit</a>
                            <form method="post" action="<?php echo route('books.destroy', [$book->id]); ?>">
                                <?php echo csrf_field(); ?>

                                <?php echo method_field('DELETE'); ?>

                                <button type="submit" onclick="return confirm('Are you sure you want to delete this book?')"><i class="fa fa-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

            <div class="row">
                <?php echo $books;; ?>

            </div>
        <?php endif; ?>
    </div>
</div>