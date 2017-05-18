<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-body">
                <ul>
                	<?php echo $__env->make('layouts.alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				
					<?php if(count($requests)): ?>
					<div><br>

					<?php if(!empty($questions)): ?>
                    <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    	<?php $a = 'Ans' . $question->_id; $ans = $requests->$a; ?>
                        <h4><?php echo e($question->question); ?></h4>
						<ul><li><?php echo e($ans); ?></li></ul>
                        <br>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

					<a  href="<?php echo route('edit', $requests->_id); ?>" class="btn btn-warning" role="button">Send edit request</a>
					</div><br>

                    <?php endif; ?>

				    <?php else: ?>
				    <h4>No one has written on your Slambook yet</h4>
					<?php endif; ?>
					
				   	<?php if(!empty($prev)): ?>
				   	<a  href="<?php echo e(route('postSlams', $prev)); ?>" class="btn btn-info" role="button">Prev</a>
				   	<?php endif; ?>

				   	<?php if(!empty($next)): ?>
				   	<a  href="<?php echo e(route('postSlams', $next)); ?>" class="btn btn-primary" role="button">Next</a><br>
				   	<?php endif; ?>
				</ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>