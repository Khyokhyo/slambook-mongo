<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Blog Post</div>

                <div class="panel-body">
                    <a class="page-scroll btn btn-primary" href="#Tag" data-toggle="modal">Tag</a>

                    <br><br>

                    <?php echo $__env->make('layouts.alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo Form::open([
                        'route' => 'store',
                        'method' => 'post'
                      ]); ?>


                    <?php echo Form::text('title', null, [
                        'class' => 'form-control', 
                        'placeholder' => 'Give a title to your post', 
                        'required']
                        ); ?>


                    <br>

                    <?php echo Form::textarea('post', null, [
                        'class' => 'form-control', 
                        'placeholder' => 'Write a post', 
                        'required']
                        ); ?>


                    <br>

                    <?php echo Form::submit('Submit', ['class'=>'form-control btn-success']); ?>


                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add notice Modal -->
<div class="modal fade" id="Tag" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4>Tag your friends</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">

            <form class="form-horizontal" role="form" method="POST" id="newNoticeForm" action="<?php echo e(url('tag')); ?>">
                <?php echo e(csrf_field()); ?>


                <h4>Tagged people can edit the post.</h4>
        
                <div class="form-group<?php echo e($errors->has('selected') ? ' has-error' : ''); ?>">
                    <div class="col-md-6">

                        <?php $i = 0; ?>
                        <?php if(!empty($users)): ?>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $i++; ?> 
                        <input id="user<?php echo e($i); ?>" type="checkbox" name="users[]" value="<?php echo e($user->_id); ?>">
                        <?php echo e($user->name); ?><br>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-success">
                            Done
                        </button>
                    </div>
                </div>

            </form>

        </div>
      </div>
      
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>