<?php $__env->startSection('title', Lang::get('words.manage').' '.Lang::get('words.supports') ); ?>

<?php $__env->startSection('content'); ?>

<div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1">
    <div id="buttonsPanel">
        <a href="<?php echo e(route('formats.index')); ?>" class="btn btn-default"> <i class="fa fa-arrow-left"></i> <?php echo app('translator')->getFromJson('words.Back'); ?></a>
    </div>
    <div class="panel panel-default">
        <div class="panel-header-form">
            <h3 class="panel-titles"><?php echo app('translator')->getFromJson('words.manage'); ?> <?php echo app('translator')->getFromJson('words.supports'); ?></h3>
        </div>
        <div class="panel-body black-letter content-over">
            <form method="POST" id="formSupports">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="formato" value="<?php echo e($formato->id); ?>" />
                <label for="input-supports"><?php echo app('translator')->getFromJson('words.supports'); ?></label>
                <div class="file-loading">
                    <input id="input-supports" name="input-supports[]" type="file" multiple>
                </div>
                <div id="kartik-file-errors"></div>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('js/upload.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>