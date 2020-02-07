<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="<?php echo e(isset($title) ? str_slug($title) :  'permissionHeading'); ?>">
        <h4 class="panel-title">
            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#dd-<?php echo e(isset($title) ? str_slug($title) :  'permissionHeading'); ?>" aria-expanded="<?php echo e(isset($closed) ? $closed : 'true'); ?>" aria-controls="dd-<?php echo e(isset($title) ? str_slug($title) :  'permissionHeading'); ?>">
                <?php echo e(isset($title) ? $title : 'Override Permissions'); ?> <?php echo isset($user) ? '<span class="text-danger">(' . $user->getDirectPermissions()->count() . ')</span>' : ''; ?>

            </a>
        </h4>
    </div>
    <div id="dd-<?php echo e(isset($title) ? str_slug($title) :  'permissionHeading'); ?>" class="panel-collapse collapse <?php echo e(isset($closed) ? $closed : 'in'); ?>" role="tabpanel" aria-labelledby="dd-<?php echo e(isset($title) ? str_slug($title) :  'permissionHeading'); ?>">
        <div class="panel-body">
            <div class="row">   
                <?php echo e($antes_role = ""); ?>

                <?php $i = 0;?>
                <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $perm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <?php
                        $abilities = ['view_','add_','edit_','delete_'];
                        $permission = str_replace($abilities,'',$perm->name);
                        
                        $per_found = null;

                        if( isset($role) ) {
                            $per_found = $role->hasPermissionTo($perm->name);
                        }

                        if( isset($user)) {
                            $per_found = $user->hasDirectPermission($perm->name);
                        }

                        if($permission != $antes_role)
                        {
                            ?>
                            <div class="col-sm-12 col-md-12 panel-header-form" >
                                <?php echo e(strtoupper($permission)); ?>

                            </div>
                            
                            <?php                            
                        }
                        $antes_role = $permission;
                       
                    ?>
                       
                    <!--<div class="collapse" id="collapseExample<?php echo e($i); ?>">
                        <div class="card card-body">
                            <div class="col-md-3">
                                <div class="checkbox">
                                    <label class="<?php echo e(str_contains($perm->name, 'delete') ? 'text-danger' : ''); ?>">
                                        <?php echo Form::checkbox("permissions[]", $perm->name, $per_found, isset($options) ? $options : []); ?> <?php echo e($perm->name); ?>

                                    </label>
                                </div>
                            </div> 
                        </div>
                    </div>-->
                    <div class="col-md-3">
                        <div class="checkbox">
                            <label class="<?php echo e(str_contains($perm->name, 'delete') ? 'text-danger' : ''); ?>">
                                <?php echo Form::checkbox("permissions[]", $perm->name, $per_found, isset($options) ? $options : []); ?> <?php echo e($perm->name); ?>

                            </label>
                        </div>
                    </div>
                    <?php  $i++;?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>