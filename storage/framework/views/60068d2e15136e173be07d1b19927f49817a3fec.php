<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Write on your friend's Slambook</div>

                <div class="panel-body">

                    <?php echo $__env->make('layouts.alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo Form::model($id, [
                        'route' => 'store',
                        'method' => 'put'
                      ]); ?>


                    <?php if(!empty($ques)): ?>
                    <?php $__currentLoopData = $ques; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $q): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <h4><?php echo e($q->question); ?></h4>
                        <?php $a = 'Ans' . $q->_id; $ans = $id->$a; ?>
                        <?php echo Form::text( $q->_id, $ans, [
                            'class' => 'form-control', 
                            'placeholder' => '']
                            ); ?>

                        <br>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                    <?php echo Form::hidden('request_id', $id->_id, [
                        'class' => 'form-control']
                        ); ?>


                    <?php echo Form::hidden('sender_id', $id->sender_id, [
                        'class' => 'form-control']
                        ); ?>


                    <br>

                    <?php echo Form::submit('Save', ['class'=>'form-control btn-success', 'style' => 'width:100px;']); ?>


                    <br>

                    <a class="btn btn-danger" style="width:100px;" href="<?php echo route('delete', $id->_id); ?>">Delete</a>

                    <?php echo Form::close(); ?>


                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>