<?php $__env->startSection('title', trans('words.Create').' '.trans_choice('words.Format', 1).', '); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1">
            <a href="<?php echo e(route('formats.index')); ?>" class="btn btn-default"> <i class="fa fa-arrow-left"></i> <?php echo app('translator')->getFromJson('words.Back'); ?></a>
            <div class="panel panel-default">
                <div class="panel-header-form">
                    <h3 class="panel-titles"><?php echo app('translator')->getFromJson('words.Create'); ?> <?php echo e(trans_choice('words.Format',1)); ?></h3>
                </div>
                <div class="panel-body black-letter">
                    <?php echo Form::open(['route' => ['formats.store'], 'id' => 'form_expediction' ]); ?>

                        <div id="contenedorHtml">
                            <?php echo $__env->make('format._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                        <input type="hidden" name="format_expediction" id="format_expediction">
                        <!-- Submit Form Button -->
                        <span class="btn btn-primary btn-body" id="boton_guardar_html"><?php echo trans('words.Create'); ?></span>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>