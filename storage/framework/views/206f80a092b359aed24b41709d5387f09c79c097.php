<?php $__env->startSection('title', 'Edit Inspector ' . $inspector->name); ?>

<?php $__env->startSection('content'); ?>

<div class="col-xs-12 col-sm-8 col-md-6 col-md-offset-3">
    <a href="<?php echo e(route('inspectors.index')); ?>" class="btn btn-default"> <i class="fa fa-arrow-left"></i> <?php echo app('translator')->getFromJson('words.Back'); ?></a>
    <div class="panel panel-default">
        <div class="panel-header-form">
            <h3 class="panel-titles"><?php echo app('translator')->getFromJson('words.Edit'); ?> <?php echo e($inspector->name); ?></h3>                  
        </div>
        <div class="panel-body black-letter">
            <?php echo Form::model($inspector,['method' => 'PUT', 'route' => [ 'inspectors.update', $inspector->id]]); ?>

            <?php echo $__env->make('inspector._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <?php echo Form::submit(trans('words.SaveChanges'), ['class' => 'btn btn-primary']); ?>

            <?php echo Form::close(); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>