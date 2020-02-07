<?php $__env->startSection('title', Lang::get('words.ViewSignanute') ); ?>

<?php $__env->startSection('content'); ?>
<a href="<?php echo e(route('formats.index')); ?>" class="btn btn-default"> <i class="fa fa-arrow-left"></i> <?php echo app('translator')->getFromJson('words.Back'); ?></a>
<div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1">
    <div class="jumbotron">
        <h1><?php echo trans('words.Info'); ?></h1>
        <p><?php echo trans('words.SignaInfo'); ?> </p>
        <span class="btn btn-primary btn-body" id="boton_informacion_sellos" info="info"><i class="glyphicon glyphicon-tag"></i> <?php echo trans('words.Info'); ?></span>
        <div id="showInfo"></div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>