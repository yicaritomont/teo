<?php $__env->startSection('title', 'Card'); ?>

<?php $__env->startSection('content'); ?>

    <div class="col-xs-12 col-sm-8 col-md-6 col-md-offset-3">            
            <div class="panel panel-default">
                <div class="panel-header-form">
                    <h3 class="panel-titles"></h3>                    
                </div>
                <div class="panel-body black-letter">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2><?php echo app('translator')->getFromJson('header.Profile'); ?> <?php echo e($usuario->name); ?></h2>                    
                            <div class="clearfix"></div>
                        </div>
                        
                        <div class="x_content">
                            <div class="col-md-12 col-sm-12 col-xs-12 profile_left">
                                <div class="picture_perfil">
                                    <div id="crop-avatar">
                                        <!-- Current avatar -->
                                       
                                        <img class="img-responsive avatar-view" src="<?php echo e(asset($usuario->picture)); ?>" alt="Avatar" title="Change the avatar">
                                    </div>
                                    <h3><?php echo e(strtoupper($usuario->name)); ?></h3>
                                   <?php echo e($infoInspector->status); ?>

                                </div>
                                <table class="table table-responsive">
                                    <tr>
                                        <td>
                                            <ul class="list-unstyled user_data">
                                                <li><i class="fa fa-map-marker user-profile-icon"></i> <?php echo e($infoInspector->addres); ?></li>                                   
                                                <li><i class="fa fa-phone"></i> <?php echo e($infoInspector->phone); ?></li>                                   
                                                <li><i class="fa fa-envelope"></i> <?php echo e($usuario->email); ?></li>
                                                <li><i class="fa fa-university"></i> <?php echo e($infoInspector->profession->name); ?> - <?php echo e($infoInspector->inspectorType->name); ?></li>
                                            </ul>
                                            <ul class="list-unstyled">
                                            <?php $__currentLoopData = $infoInspector->companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $companias): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><i class="fa fa-users"></i> <?php echo e($companias->name); ?></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                
                                            </ul>
                                        </td>
                                        <td>
                                           <?php echo e(\App\Http\Controllers\InspectorController::qrInfoInspector($infoInspector->id)); ?>

                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>                 
        
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>