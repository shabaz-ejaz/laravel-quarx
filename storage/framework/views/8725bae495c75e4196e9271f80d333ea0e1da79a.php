<ul class="nav nav-sidebar">
    <li <?php if(Request::is('dashboard', 'dashboard/*')): ?> class="active" <?php endif; ?>>
        <a href="<?php echo url('dashboard'); ?>"><span class="fa fa-dashboard"></span> Dashboard</a>
    </li>
    <li <?php if(Request::is('user/settings', 'user/password')): ?> class="active" <?php endif; ?>>
        <a href="<?php echo url('user/settings'); ?>"><span class="fa fa-user"></span> Settings</a>
    </li>
    <li <?php if(Request::is('teams', 'teams/*')): ?> class="active" <?php endif; ?>>
        <a href="<?php echo url('teams'); ?>"><span class="fa fa-users"></span> Teams</a>
    </li>
    <?php if(Gate::allows('admin')): ?>
        <li class="sidebar-header"><span>Admin</span></li>
        <li <?php if(Request::is('admin/dashboard', 'admin/dashboard/*')): ?> class="active" <?php endif; ?>>
            <a href="<?php echo url('admin/dashboard'); ?>"><span class="fa fa-dashboard"></span> Dashboard</a>
        </li>
        <li <?php if(Request::is('admin/users', 'admin/users/*')): ?> class="active" <?php endif; ?>>
            <a href="<?php echo url('admin/users'); ?>"><span class="fa fa-users"></span> Users</a>
        </li>
        <li <?php if(Request::is('admin/roles', 'admin/roles/*')): ?> class="active" <?php endif; ?>>
            <a href="<?php echo url('admin/roles'); ?>"><span class="fa fa-lock"></span> Roles</a>
        </li>
    <?php endif; ?>
</ul>