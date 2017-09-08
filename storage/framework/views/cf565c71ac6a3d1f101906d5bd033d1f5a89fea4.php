<ul class="nav nav-sidebar">
    <li class="<?php if(Request::is(config('quarx.backend-route-prefix', 'quarx').'/dashboard')): ?> active <?php endif; ?>">
        <a href="<?php echo url(config('quarx.backend-route-prefix', 'quarx').'/dashboard'); ?>"><span class="fa fa-fw fa-dashboard"></span> Dashboard</a>
    </li>

    <li class="<?php if(Request::is(config('quarx.backend-route-prefix', 'quarx').'/help')): ?> active <?php endif; ?>">
        <a href="<?php echo url(config('quarx.backend-route-prefix', 'quarx').'/help'); ?>"><span class="fa fa-fw fa-info-circle"></span> Help</a>
    </li>

    <?php if(Route::get('user/settings')): ?>
        <li class="<?php if(Request::is('user/settings') || Request::is('user/password')): ?> active <?php endif; ?>">
            <a href="<?php echo url('user/settings'); ?>"><span class="fa fa-fw fa-gear"></span> Settings</a>
        </li>
    <?php endif; ?>

    <?php if(in_array('images', Config::get('quarx.active-core-modules', Quarx::defaultModules()))): ?>
        <li class="<?php if(Request::is(config('quarx.backend-route-prefix', 'quarx').'/images') || Request::is(config('quarx.backend-route-prefix', 'quarx').'/images/*')): ?> active <?php endif; ?>">
            <a href="<?php echo url(config('quarx.backend-route-prefix', 'quarx').'/images'); ?>"><span class="fa fa-fw fa-image"></span> Images</a>
        </li>
    <?php endif; ?>

    <?php if(in_array('files', Config::get('quarx.active-core-modules', Quarx::defaultModules()))): ?>
        <li class="<?php if(Request::is(config('quarx.backend-route-prefix', 'quarx').'/files') || Request::is(config('quarx.backend-route-prefix', 'quarx').'/files/*')): ?> active <?php endif; ?>">
            <a href="<?php echo url(config('quarx.backend-route-prefix', 'quarx').'/files'); ?>"><span class="fa fa-fw fa-file"></span> Files</a>
        </li>
    <?php endif; ?>

    <?php if(in_array('menus', Config::get('quarx.active-core-modules', Quarx::defaultModules()))): ?>
        <li class="<?php if(Request::is(config('quarx.backend-route-prefix', 'quarx').'/menus') || Request::is(config('quarx.backend-route-prefix', 'quarx').'/menus/*') || Request::is(config('quarx.backend-route-prefix', 'quarx').'/links') || Request::is(config('quarx.backend-route-prefix', 'quarx').'/links/*')): ?> active <?php endif; ?>">
            <a href="<?php echo url(config('quarx.backend-route-prefix', 'quarx').'/menus'); ?>"><span class="fa fa-fw fa-link"></span> Menus</a>
        </li>
    <?php endif; ?>

    <?php if(in_array('widgets', Config::get('quarx.active-core-modules', Quarx::defaultModules()))): ?>
        <li class="<?php if(Request::is(config('quarx.backend-route-prefix', 'quarx').'/widgets') || Request::is(config('quarx.backend-route-prefix', 'quarx').'/widgets/*')): ?> active <?php endif; ?>">
            <a href="<?php echo url(config('quarx.backend-route-prefix', 'quarx').'/widgets'); ?>"><span class="fa fa-fw fa-gear"></span> Widgets</a>
        </li>
    <?php endif; ?>

    <?php if(in_array('blog', Config::get('quarx.active-core-modules', Quarx::defaultModules()))): ?>
        <li class="<?php if(Request::is(config('quarx.backend-route-prefix', 'quarx').'/blog') || Request::is(config('quarx.backend-route-prefix', 'quarx').'/blog/*')): ?> active <?php endif; ?>">
            <a href="<?php echo url(config('quarx.backend-route-prefix', 'quarx').'/blog'); ?>"><span class="fa fa-fw fa-pencil"></span> Blog</a>
        </li>
    <?php endif; ?>

    <?php if(in_array('pages', Config::get('quarx.active-core-modules', Quarx::defaultModules()))): ?>
        <li class="<?php if(Request::is(config('quarx.backend-route-prefix', 'quarx').'/pages') || Request::is(config('quarx.backend-route-prefix', 'quarx').'/pages/*')): ?> active <?php endif; ?>">
            <a href="<?php echo url(config('quarx.backend-route-prefix', 'quarx').'/pages'); ?>"><span class="fa fa-fw fa-file-text-o"></span> Pages</a>
        </li>
    <?php endif; ?>

    <?php if(in_array('faqs', Config::get('quarx.active-core-modules', Quarx::defaultModules()))): ?>
        <li class="<?php if(Request::is(config('quarx.backend-route-prefix', 'quarx').'/faqs') || Request::is(config('quarx.backend-route-prefix', 'quarx').'/faqs/*')): ?> active <?php endif; ?>">
            <a href="<?php echo url(config('quarx.backend-route-prefix', 'quarx').'/faqs'); ?>"><span class="fa fa-fw fa-question"></span> FAQs</a>
        </li>
    <?php endif; ?>

    <?php if(in_array('events', Config::get('quarx.active-core-modules', Quarx::defaultModules()))): ?>
        <li class="<?php if(Request::is(config('quarx.backend-route-prefix', 'quarx').'/events') || Request::is(config('quarx.backend-route-prefix', 'quarx').'/events/*')): ?> active <?php endif; ?>">
            <a href="<?php echo url(config('quarx.backend-route-prefix', 'quarx').'/events'); ?>"><span class="fa fa-fw fa-calendar"></span> Events</a>
        </li>
    <?php endif; ?>

    <?php echo ModuleService::menus(); ?>


    <?php echo Quarx::packageMenus(); ?>


    <?php if(Route::get('admin/users')): ?> <li class="sidebar-header"><span>Admin</span></li> <?php endif; ?>

    <?php if(Route::get('admin/dashboard')): ?>
        <li class="<?php if(Request::is('admin/dashboard') || Request::is('admin/dashboard/*')): ?> active <?php endif; ?>">
            <a href="<?php echo url('admin/dashboard'); ?>"><span class="fa fa-fw fa-dashboard"></span> Dashboard</a>
        </li>
    <?php endif; ?>
    <?php if(Route::get('admin/users')): ?>
        <li class="<?php if(Request::is('admin/users') || Request::is('admin/users/*')): ?> active <?php endif; ?>">
            <a href="<?php echo url('admin/users'); ?>"><span class="fa fa-fw fa-users"></span> Users</a>
        </li>
    <?php endif; ?>
    <?php if(Route::get('admin/roles')): ?>
        <li class="<?php if(Request::is('admin/roles') || Request::is('admin/roles/*')): ?> active <?php endif; ?>">
            <a href="<?php echo url('admin/roles'); ?>"><span class="fa fa-fw fa-lock"></span> Roles</a>
        </li>
    <?php endif; ?>
</ul>
