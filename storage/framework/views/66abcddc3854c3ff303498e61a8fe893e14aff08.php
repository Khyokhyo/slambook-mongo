<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Set questions for your Slambook</div>

                <div class="panel-body">
                	<?php echo $__env->make('layouts.alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					<?php echo e(Form::open(array('url' => 'addQuestion'))); ?>

					<?php echo e(Form::text('question', '', array('placeholder' => 'Add a question here', 'class' => "col-sm-6"))); ?><br><br>
					<?php echo e(Form::submit('Add New', array('class' => 'btn btn-primary'))); ?><br><br>
					<?php echo e(Form::close()); ?>


					<?php if(!empty($results)): ?>
					<legend>Questions on your Slambook</legend>
					<ol>
					<?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				    	<li><?php echo e($result->question); ?></li>
				    	<a class="btn btn-xs btn-danger" href="<?php echo route('deleteQuestion', $result->_id); ?>">Delete</a><br><br>
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