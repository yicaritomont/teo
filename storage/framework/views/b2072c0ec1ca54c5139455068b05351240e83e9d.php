<?php $__env->startSection('title', trans('words.Edit').' '.trans('words.User') . $user->first_name); ?>

<?php $__env->startSection('content'); ?>

    <div class="col-xs-12 col-sm-8 col-md-6 col-md-offset-3">    
        <div class="panel panel-default">
            <div class="panel-header-form">
                <h3 class="panel-titles"><?php echo app('translator')->getFromJson('words.Edit'); ?> <?php echo e($user-> name); ?></h3>                    
            </div>
            <div class="panel-body black-letter">
                <?php echo Form::model($user, ['method' => 'PUT', 'route' => ['perfiles.update',  $user->id ],'enctype' => "multipart/form-data" ]); ?>                        
                        <?php echo $__env->make('perfil._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <!-- Submit Form Button -->                           
                        <input class="btn-body" type="submit" value="<?php echo app('translator')->getFromJson('words.SaveChanges'); ?>">
                <?php echo Form::close(); ?>

            </div>
        </div>   
    </div>


    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>