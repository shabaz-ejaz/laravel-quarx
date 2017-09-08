<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">Dashboard</h1>
            <div class="row">
                <canvas id="dashboardChart" class="raw100"></canvas>
            </div>
            <div class="row raw-margin-top-24">
                <div class="col-md-4">
                    <p class="lead">Top Browsers</p>
                    <table class="table table-striped">
                        <thead>
                            <th>Browser</th>
                            <th class="text-right">Views</th>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $topBrowsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $browser => $views): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($browser); ?></td>
                                <td class="text-right"><?php echo e($views); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                    <p class="lead">Most Visited Pages</p>
                    <table class="table table-striped">
                        <thead>
                            <th>URL</th>
                            <th class="text-right">Views</th>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $topPages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $url => $views): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(str_limit($url, 30)); ?></td>
                                <td class="text-right"><?php echo e($views); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                    <p class="lead">Top Referers</p>
                    <table class="table table-striped">
                        <thead>
                            <th>URL</th>
                            <th class="text-right">Views</th>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $topReferers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $url => $views): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(str_limit($url, 40)); ?></td>
                                <td class="text-right"><?php echo e($views); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    ##parent-placeholder-b6e13ad53d8ec41b034c49f131c64e99cf25207a##
    <script type="text/javascript">
        var _chartData = {
            _labels : <?php echo json_encode($stats['dates']); ?>,
            _visits : <?php echo json_encode($stats['visits']); ?>

        };
        var options = {};
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.js"></script>
    <?php echo Minify::javascript(Quarx::asset('js/dashboard-chart.js')); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('quarx::layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>