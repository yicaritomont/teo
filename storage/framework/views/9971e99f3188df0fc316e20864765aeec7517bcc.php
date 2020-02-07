<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                              
                <div class="panel-body background-login">
                    <div>
                        <h2><?php echo app('translator')->getFromJson('words.Reset'); ?> <?php echo app('translator')->getFromJson('words.Password'); ?></h2>
                    </div> 
                    <div class="title-space-login">
                        <?php if(session('status')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('status')); ?>

                            </div>
                        <?php endif; ?>

                        <!--<form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('password.email')); ?>">-->
                       
                        <?php echo Form::open(['action' => 'RemindersController@postRemind', 'class' => 'form-signin']); ?>


                            <?php echo e(csrf_field()); ?>


                            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                <label for="email" class="col-md-4 control-label"><?php echo app('translator')->getFromJson('words.E-Mail'); ?></label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="input-login" name="email" value="<?php echo e(old('email')); ?>" required>

                                    <?php if($errors->has('email')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('email')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn-login">
                                        <?php echo app('translator')->getFromJson('words.SendPasswordResetLink'); ?>
                                    </button>
                                </div>
                            </div>
                        <?php echo Form::close(); ?>

                    </div>      
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>