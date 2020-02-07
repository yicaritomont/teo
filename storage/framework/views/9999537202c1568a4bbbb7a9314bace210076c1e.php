<?php $__env->startSection('title', trans('words.Edit').' '.trans_choice('words.Company',1).' - '.$user->name); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6 col-md-offset-3">
            <a href="<?php echo e(route('companies.index')); ?>" class="btn btn-default btn-sm"> <i class="fa fa-arrow-left"></i> <?php echo app('translator')->getFromJson('words.Back'); ?></a>
            <div class="panel panel-default">
                <div class="panel-header-form">
                    <h3 class="panel-titles"><?php echo app('translator')->getFromJson('words.Edit'); ?> <?php echo e($user->name); ?></h3>
                </div>
                <div class="panel-body black-letter">
                    <?php echo Form::model($company, ['method' => 'PUT', 'route' => ['companies.update',  $company->slug ]]); ?>

                            <?php echo $__env->make('company._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                            <!-- Submit Form Button -->
                            <input class="btn-body" type="submit" value="<?php echo app('translator')->getFromJson('words.SaveChanges'); ?>">
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>