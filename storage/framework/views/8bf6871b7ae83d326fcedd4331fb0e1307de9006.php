<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tell a friend to write on your Slambook</div>

                <div class="panel-body">
                	<?php echo $__env->make('layouts.alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					<?php echo e(Form::open(array('url' => 'search'))); ?>

					<?php echo e(Form::text('name', '', array('placeholder' => 'Enter a name here', 'class' => "col-sm-3"))); ?><br><br>
					<?php echo e(Form::submit('Search', array('class' => 'btn btn-primary'))); ?><br><br>
					<?php echo e(Form::close()); ?>


					<?php if(!empty($results)): ?>
					<legend>Results</legend>
					<ol>
					<?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				       	
				       	<li><a href="<?php echo route('profile', $result->_id); ?>"><?php echo e($result->name); ?></a></li>
				        
				    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php endif; ?>
					</ol>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>