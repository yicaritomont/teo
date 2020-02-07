<?php $__env->startSection('title', trans('words.Edit')); ?>

<?php $__env->startSection('content'); ?>

    <div class="col-xs-12 col-sm-8 col-md-6 col-md-offset-3">
            <a href="<?php echo e(route('users.index')); ?>" class="btn btn-default"> <i class="fa fa-arrow-left"></i> <?php echo app('translator')->getFromJson('words.Back'); ?></a>
            <div class="panel panel-default">
                <div class="panel-header-form">
                    <h3 class="panel-titles"><?php echo app('translator')->getFromJson('words.Edit'); ?> <?php echo app('translator')->getFromJson('words.Password'); ?></h3>                    
                </div>
                <div class="panel-body black-letter">
                
                    <?php echo Form::open(['route' => ['changePassword',$user->id] ]); ?>

                       <!-- password Form Input -->
                        <div class="form-group <?php if($errors->has('password')): ?> has-error <?php endif; ?>">
                            <label for="password"><?php echo app('translator')->getFromJson('words.Password'); ?></label>
                            <input type="hidden" id='user_pasword' value='<?php echo e($user->id); ?>'>
                            <?php echo Form::password('password',['class' => 'input-body' ,'id' => 'password_update']); ?>   
                            
                            <?php if($errors->has('password')): ?> <p class="help-block"><?php echo e($errors->first('password')); ?></p> <?php endif; ?>
                        </div>
                        <p id="div_info_lengthPwd" ></p>
                        <p id="div_info_lengthNumber"></p>
                        <p id="div_info_lengthLower"></p>
                        <p id="div_info_lengthUpper"></p>
                        <p id="div_info_beforePass"></p>


                        <!-- Submit Form Button -->                        
                        <?php echo Form::submit(trans('words.SaveChanges'), ['class' => 'btn-body' ,'id' => 'changePassword']); ?>

                    <?php echo Form::close(); ?>

                </div>
            </div>                 
        
    </div>
     <!-- Modal Notificacion-->
     <div class="modal fade" id="modal_notificacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-custom">
                <div class="modal-content">                                          
                    <div class="modal-body modal-body-custom">                                                        
                        <div class="panel panel-success pan">
                            <div class="panel-body">                                  
                                <fieldset><legend class="text-center" style="color:black;">ATENCION</legend></fieldset>
                                <div class="text-center">
                                    <div id="cont-notificacion-modal" class="notificacion-turno-err"></div>
                                </div>
                                <div class="col-xs-12 text-center">
                                    <label for="usuario" style="color:white;"> Derechos Reservados 2018.</label>
                                </div>
                            </div>
                        </div>
                    </div>                                          
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>