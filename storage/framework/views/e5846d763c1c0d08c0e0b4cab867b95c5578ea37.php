<!doctype html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">

        <title><?php echo e(config('app.name')); ?> <?php if(isset($page) && !is_null($page->title)): ?> - <?php echo e($page->title); ?> <?php endif; ?></title>

        <meta name="description" content="<?php echo $__env->yieldContent('seoDescription'); ?>">
        <meta name="keywords" content="<?php echo $__env->yieldContent('seoKeywords'); ?>">
        <meta name="author" content="">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/app.css')); ?>">

        <?php echo $__env->yieldContent('stylesheets'); ?>
    </head>

    <body>

        <?php echo $__env->make("quarx-frontend::partials.navigation", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="site-wrapper <?php if(Request::is('/')): ?> homepage <?php endif; ?>">
            <div class="container-fluid">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>

        <div class="footer container-fluid navbar-fixed-bottom">
            <p class="pull-left">&copy; <?php echo e(date('Y')); ?> - <a href="<?php echo e(url('pages')); ?>">Page Directory</a></p>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('quarx')): ?>
                <a class="btn btn-xs btn-default pull-right" href="<?php echo e(url('quarx/dashboard')); ?>">Quarx</a>
                <?php echo $__env->yieldContent('quarx'); ?>
            <?php else: ?>
                <a class="btn btn-xs btn-default pull-right" href="<?php echo e(url('login')); ?>">Login</a>
            <?php endif; ?>
        </div>

    </body>

    <script type="text/javascript">
        var _token = '<?php echo csrf_token(); ?>';
        var _url = '<?php echo url("/"); ?>';
    </script>
    <?php echo $__env->yieldContent("pre-javascript"); ?>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/app.js')); ?>"></script>
    <?php echo $__env->yieldContent('javascript'); ?>
</html>
