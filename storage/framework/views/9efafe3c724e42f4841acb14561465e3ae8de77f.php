<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tell a friend to write on your Slambook</div>

                <div class="panel-body">
                	<?php echo $__env->make('layouts.alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					<h3><?php echo e($result->name); ?></h3>
                    <h5><?php echo e($result->email); ?></h5>
                    <?php if(!count($already)): ?>
                    <a href="<?php echo route('send', $result->_id); ?>" class="btn btn-success">Send request</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>