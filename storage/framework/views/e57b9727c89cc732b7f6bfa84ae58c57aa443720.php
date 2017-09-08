<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">

        <title>App</title>

        <link rel="icon" type="image/ico" href="">

        <!-- Font Awesome -->
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

        <!-- Local -->
        <link rel="stylesheet" type="text/css" href="/css/raw.min.css">
        <link rel="stylesheet" type="text/css" href="/css/app.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <?php echo $__env->yieldContent('stylesheets'); ?>
    </head>
    <body>

        <?php echo $__env->make("layouts.navigation", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="app-wrapper container-fluid raw-margin-top-50">
            <?php echo $__env->yieldContent("app-content"); ?>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <?php echo $__env->make('partials.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('partials.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </div>
        </div>

        <div class="pull-left raw100 navbar navbar-fixed-bottom">
            <div class="pull-left footer">
                <p class="raw-margin-left-20">&copy; <?php echo date('Y');; ?> <a href="">You</a>
                    <?php if(Session::get('original_user')): ?>
                        <a class="btn btn-default pull-right btn-xs" href="/users/switch-back">Return to your Login</a>
                    <?php endif; ?>
                </p>
            </div>
        </div>

        <script type="text/javascript">
            var _token = '<?php echo Session::token(); ?>';
            var _url = '<?php echo url("/"); ?>';
        </script>
        <?php echo $__env->yieldContent("pre-javascript"); ?>
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script src="/js/app.js"></script>
        <?php echo $__env->yieldContent("javascript"); ?>
    </body>
</html>