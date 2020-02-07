<?php $__env->startSection('content'); ?>
<div class="content-login">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 ">
            <div class="panel panel-default ">                
                <div class="panel-body background-login" align="center">
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo e(csrf_field()); ?>

                        <div>
                            <h1><?php echo app('translator')->getFromJson('words.Login'); ?></h1>
                        </div>
                        <div class="title-space-login">
                            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>" align="center">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <input id="email" type="email" class="input-login" name="email" autocomplete="off" placeholder="<?php echo app('translator')->getFromJson('words.E-Mail'); ?>" value="<?php echo e(old('email')); ?>" required autofocus>                                    
                                    <?php if($errors->has('email')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('email')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?> title-space-login" align="center">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <input id="password" type="password" class="input-login" name="password" required placeholder="<?php echo app('translator')->getFromJson('words.Password'); ?>">

                                    <?php if($errors->has('password')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('password')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>                                

                            <div class="form-group">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <button type="submit" class="btn-login">
                                        <?php echo app('translator')->getFromJson('words.SingIn'); ?>
                                    </button>                                    
                                </div>                                    
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <a class="btn btn-link" href="<?php echo e(route('reminder')); ?>">
                                        <?php echo app('translator')->getFromJson('words.Forgot'); ?> <?php echo app('translator')->getFromJson('words.Your'); ?> <?php echo app('translator')->getFromJson('words.Password'); ?>?
                                    </a>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> <?php echo app('translator')->getFromJson('words.Remember'); ?>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


            <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
            <script>
                /* particlesJS.load(@dom-id, @path-json, @callback (optional)); */
                particlesJS.load('particles-js', 'js/particlesjs-config.json', function() {
                    console.log('callback - particles.js config loaded');
                });
            </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>