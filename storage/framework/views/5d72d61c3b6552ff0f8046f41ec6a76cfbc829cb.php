<?php $__env->startSection('title', Lang::get('words.ViewSignanute') ); ?>

<?php $__env->startSection('content'); ?>

<div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1">
    <div id="buttonsPanel">
        <a href="<?php echo e(route('formats.index')); ?>" class="btn btn-default"> <i class="fa fa-arrow-left"></i> <?php echo app('translator')->getFromJson('words.Back'); ?></a>
    </div>
    <div class="panel panel-default">
        <div class="panel-header-form">
            <h3 class="panel-titles"><?php echo app('translator')->getFromJson('words.ViewSignanute'); ?></h3>
        </div>
        <div class="panel-body w-50 p-3">
            <div class="row" style="height: 500px;">
                <iframe src="data:application/pdf;base64,<?php echo e($contents); ?>" height="100%" width="100%"></iframe>                        
            </div>
            <div class="col-xs-12">            
                <span class="btn btn-primary btn-body" id="boton_sellar_formato" info="sello" value="<?php echo e($id); ?>"><i class="glyphicon glyphicon-tag"></i> <?php echo trans('words.SignaSelloTiempo'); ?></span>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>