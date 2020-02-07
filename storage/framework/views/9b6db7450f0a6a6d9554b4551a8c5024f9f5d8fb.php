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
                        <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('password.request')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <input type="hidden" name="token" value="<?php echo e($token); ?>">

                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-4 control-label"><?php echo app('translator')->getFromJson('words.E-Mail'); ?></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="input-login" name="email" value="<?php echo e(isset($email) ? $email : old('email')); ?>" required autofocus>

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <label for="password" class="col-md-4 control-label"><?php echo app('translator')->getFromJson('words.Password'); ?></label>

                            <div class="col-md-6">
                                <input id="password_update" type="password" class="input-login" name="password" required>

                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('password_confirmation') ? ' has-error' : ''); ?>">
                            <label for="password-confirm" class="col-md-4 control-label"><?php echo app('translator')->getFromJson('words.Confirm'); ?> <?php echo app('translator')->getFromJson('words.Password'); ?></label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="input-login" name="password_confirmation" required>

                                <?php if($errors->has('password_confirmation')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <p id="div_info_lengthPwd" ></p>
                        <p id="div_info_lengthNumber"></p>
                        <p id="div_info_lengthLower"></p>
                        <p id="div_info_lengthUpper"></p>
                        <p id="div_info_beforePass"></p>
                        <p id="div_info_keyWordPass"></p>
                        <p id="div_info_confirmPass"></p>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" id="changePassword" class="btn-login">
                                    <?php echo app('translator')->getFromJson('words.SaveChanges'); ?>
                                </button>
                            </div>
                        </div>
                    </form>
                       
                    </div>      
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>