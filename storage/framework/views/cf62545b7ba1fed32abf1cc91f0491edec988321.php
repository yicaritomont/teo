<?php $__env->startSection('title', 'Card'); ?>

<?php $__env->startSection('content'); ?>

    <div class="col-xs-12 col-sm-8 col-md-6 col-md-offset-3">            
            <div class="panel panel-default">
                <div class="panel-header-form">
                    <h3 class="panel-titles"></h3>                    
                </div>
                <div class="panel-body black-letter">
                    <div class="x_panel">                        
                        <div class="x_content">
                            <?php echo Form::open(['route' => ['saveReadInspector'] ]); ?>

                                <div class="col-md-12 col-sm-12 col-xs-12 profile_left">
                                    <div class="picture_perfil">
                                        <h3><?php echo e(strtoupper($usuario->name)); ?></h3>
                                    </div>
                                    <table class="table table-responsive">
                                        <tr>
                                            <td>
                                                <img class="img-responsive avatar-view" src="<?php echo e(asset($usuario->picture)); ?>" alt="Avatar" title="Change the avatar">
                                            </td>
                                            <td>
                                                <ul class="list-unstyled user_data">
                                                    <li><i class="fa fa-map-marker user-profile-icon"></i> <?php echo e($infoInspector->addres); ?></li>                                   
                                                    <li><i class="fa fa-phone"></i> <?php echo e($infoInspector->phone); ?></li>                                            </ul>
                                                <ul class="list-unstyled">
                                                <?php $__currentLoopData = $infoInspector->companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $companias): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li><i class="fa fa-users"></i> <?php echo e($companias->name); ?></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                
                                                </ul>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div id="map"></div>
                                </div>
                                <input type="hidden" name="map_localization_lat" id="map_localization_lat">
                                <input type="hidden" name="map_localization_lng" id="map_localization_lng">
                                <input type="hidden" name="id_inspector" id="id_inspector" value="<?php echo e($infoInspector->id); ?>">
                                <?php echo Form::submit(trans('words.Confirmlocation'), ['class' => 'btn btn-primary']); ?>

                            <?php echo Form::close(); ?>

                        </div>
                    </div>
                </div>
            </div>                 
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php echo $__env->make('shared._scriptUbicacionGoogle', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>