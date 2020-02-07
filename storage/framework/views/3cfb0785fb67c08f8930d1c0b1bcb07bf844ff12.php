<?php $__env->startSection('title', trans('words.Create').' '.trans('words.ManageMenu')); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6 col-md-offset-3">
            <a href="<?php echo e(route('menus.index')); ?>" class="btn btn-default"> <i class="fa fa-arrow-left"></i> <?php echo app('translator')->getFromJson('words.Back'); ?></a>
            <div class="panel panel-default">
                <div class="panel-header-form">
                    <h3 class="panel-titles"><?php echo app('translator')->getFromJson('words.Create'); ?></h3>                    
                </div>
                <div class="panel-body black-letter">
                    <?php echo Form::open(['route' => ['menus.store']]); ?>

                        <?php echo $__env->make('menu._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <!-- Submit Form Button -->                        
                        <?php echo Form::submit(trans('words.Create'), ['class' => 'btn-body']); ?>

                    <?php echo Form::close(); ?>

                </div>
            </div>                 
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>