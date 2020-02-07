<?php $__env->startSection('title', trans('words.Edit').' '.trans_choice('words.Format',1).', '); ?>

<?php $__env->startSection('content'); ?>
<div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1">
    <a href="<?php echo e(route('formats.index')); ?>" class="btn btn-default"> <i class="fa fa-arrow-left"></i> <?php echo app('translator')->getFromJson('words.Back'); ?></a>

    <div class="panel panel-default">
        <div class="panel-header-form">
            <h3 class="panel-titles"><?php echo app('translator')->getFromJson('words.Edit'); ?> <?php echo e($formato->name); ?></h3>
        </div>
        <div class="panel-body black-letter">
                <?php echo Form::model($formato,['method' => 'PUT', 'route' => [ 'formats.update', $formato->id], 'id' => 'form_expediction']); ?>

                    <div id="contenedorHtml">
                        <?php echo $__env->make('format._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                <input type="hidden" name="format_expediction" id="format_expediction">
                <input type="hidden" name="state" id="state" value="1">
          <div  >
            <div class="col-xs-4" style="display:<?php echo $state_format; ?>;">
                <a href="<?php echo e(route('formats.supports', [str_singular('formats') => $formato->id])); ?>" class="btn btn-primary btn-body">
                <?php echo trans('words.upload_sopports'); ?></a>
            </div>
            <div class="col-xs-4" style="display:<?php echo $state_firma; ?>;">
              <span class="btn btn-primary btn-body" id="boton_firmar_formato" info="firma" value="<?php echo e($formato->id); ?>"><?php echo trans('words.SignFormat'); ?></span>
            </div>
            <div class="col-xs-4" style="display:<?php echo $state_format; ?>;">
              <span class="btn btn-primary btn-body" id="boton_guardar_html"><?php echo trans('words.SaveChanges'); ?></span>
            </div>
          <div>
            <?php echo Form::close(); ?>

        </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>