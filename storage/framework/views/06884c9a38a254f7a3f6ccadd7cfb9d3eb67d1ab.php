<nav class="navbar navbar-default navbar-fixed-top clearfix">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navBar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo e(url('')); ?>">Home</a>
        </div>
        <div class="collapse navbar-collapse" id="navBar">
            <ul class="nav navbar-nav">
                <?php echo Quarx::menu('main', 'quarx-frontend::partials.main-menu'); ?>
                <li><a href="<?php echo e(url('blog')); ?>">Blog</a></li>
                <li><a href="<?php echo e(url('events')); ?>">Events</a></li>
                <li><a href="<?php echo e(url('faqs')); ?>">FAQs</a></li>
                <li><a href="<?php echo e(url('gallery')); ?>">Gallery</a></li>
                <?php echo Quarx::moduleLinks(); ?>
            </ul>
            <ul class="nav navbar-nav navbar-right menu">
                <?php if(auth()->user()): ?>
                    <li><a href="<?php echo url('user/settings'); ?>"><span class="fa fa-user"></span> Settings</a></li>
                    <li><a href="<?php echo url('logout'); ?>"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                            <span class="fa fa-sign-out"></span>
                            Logout
                        </a>
                    </li>
                    <form id="logout-form" action="<?php echo e(url('logout')); ?>" method="POST" style="display: none;">
                        <?php echo e(csrf_field()); ?>

                    </form>
                <?php else: ?>
                    <li><a href="<?php echo url('login'); ?>"><span class="fa fa-sign-in"></span> Login</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
