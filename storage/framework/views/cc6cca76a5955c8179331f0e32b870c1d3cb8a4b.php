<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">

        <title>Quarx: <?php echo e(ucfirst(request()->segment(2))); ?></title>

        <link rel="icon" type="image/ico" href="<?php echo Quarx::asset('images/favicon.ico', 'image/ico'); ?>?v2">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo Quarx::asset('images/favicon-32x32.png', 'image/png'); ?>?v2">
        <link rel="icon" type="image/png" sizes="96x96" href="<?php echo Quarx::asset('images/favicon-96x96.png', 'image/png'); ?>?v2">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo Quarx::asset('images/favicon-16x16.png', 'image/png'); ?>?v2">

        <!-- Bootstrap -->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Bootstrap Theme -->
        <link rel="stylesheet" type="text/css" href="<?php echo Quarx::asset('themes/bootstrap-'.Config::get('quarx.backend-theme', 'united').'.css', 'text/css'); ?>">

        <!-- App style -->
        <link rel="stylesheet" type="text/css" href="<?php echo Quarx::asset('dist/css/all.css', 'text/css'); ?>">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <?php echo $__env->yieldContent('stylesheets'); ?>

        <script type="text/javascript">

            var _token = '<?php echo csrf_token(); ?>';
            var _url = '<?php echo url("/"); ?>';
            var _pixabayKey = '<?php echo config('quarx.pixabay', ''); ?>';
            var _appTimeZone = '<?php echo config('app.timezone', 'UTC'); ?>';

        </script>
    </head>
    <body>

        <?php echo $__env->make('quarx::layouts.loading-overlay', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="quarx-notification">
            <div class="quarx-notify">
                <p class="quarx-notify-comment"></p>
            </div>
            <div class="quarx-notify-closer">
                <span class="glyphicon glyphicon-remove quarx-notify-closer-icon"></span>
            </div>
        </div>

        <?php echo $__env->yieldContent("navigation"); ?>

        <div class="container-fluid raw-margin-bottom-72">
            <div class="row">
                <?php echo $__env->yieldContent("page-content"); ?>
            </div>
        </div>

        <script type="text/javascript">
            var _apiKey = '<?php echo config("quarx.api-key"); ?>';
            var _apiToken = '<?php echo config("quarx.api-token"); ?>';

            <?php echo $__env->yieldContent('pre_javascript'); ?>
        </script>
        <script type="text/javascript" src="<?php echo Quarx::asset('js/jquery.min.js', 'application/javascript'); ?>"></script>
        <script type="text/javascript" src="<?php echo Quarx::asset('dist/js/all.js', 'application/javascript'); ?>"></script>
        <script type="text/javascript">
            <?php echo $__env->make('quarx::notifications', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </script>
        <?php echo $__env->yieldContent("javascript"); ?>
    </body>
</html>