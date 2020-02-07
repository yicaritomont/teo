<div class="form-group <?php if($errors->has('identification')): ?> has-error <?php endif; ?>">
    <label for="identificacion_inspector"><?php echo app('translator')->getFromJson('words.Identification'); ?></label>
    <?php echo Form::text('identification', null, ['class' => 'input-body', 'placeholder' => 'Identification','id' => isset($user) ? '' : 'identificacion_inspector']); ?>

    <?php if($errors->has('identification')): ?> <p class="help-block"><?php echo e($errors->first('identification')); ?></p> <?php endif; ?>
    <?php echo Form::hidden('id_inspector',null,['id' => 'id_inspector']); ?>

</div>

<div class="form-group <?php if($errors->has('name')): ?> has-error <?php endif; ?>">
    <label for="nombre_inspector"><?php echo app('translator')->getFromJson('words.Name'); ?></label>
    <?php echo Form::text('name', isset($user) ? $user->name : null, ['class' => 'input-body', 'placeholder' => 'Name' , 'id' => 'nombre_inspector']); ?>

    <?php if($errors->has('name')): ?> <p class="help-block"><?php echo e($errors->first('name')); ?></p> <?php endif; ?>
</div>
<div class="form-group <?php if($errors->has('profession_id')): ?> has-error <?php endif; ?>">
    <?php echo Form::label('profession_id', trans_choice('words.Profession', 1)); ?>

    <?php echo Form::select('profession_id',$professions,null, array('class' => 'input-body select2 form-control', 'placeholder' => trans('words.ChooseOption'))); ?>

    <?php if($errors->has('profession_id')): ?> <p class="help-block"><?php echo e($errors->first('profession_id')); ?></p> <?php endif; ?>
</div>
<div class="form-group <?php if($errors->has('inspector_type_id')): ?> has-error <?php endif; ?>">
    <?php echo Form::label('inspector_type_id', trans_choice('words.InspectorType', 1)); ?>

    <?php echo Form::select('inspector_type_id',$inspector_types,null, array('class' => 'input-body select2 form-control', 'placeholder' => trans('words.ChooseOption'))); ?>

    <?php if($errors->has('inspector_type_id')): ?> <p class="help-block"><?php echo e($errors->first('inspector_type_id')); ?></p> <?php endif; ?>
</div>



<div class="form-group <?php if($errors->has('phone')): ?> has-error <?php endif; ?>">
    <label for="telefono_inspector"><?php echo app('translator')->getFromJson('words.Phone'); ?></label>
    <?php echo Form::text('phone', null, ['class' => 'input-body', 'placeholder' => 'Phone','id' => 'telefono_inspector']); ?>

    <?php if($errors->has('phone')): ?> <p class="help-block"><?php echo e($errors->first('phone')); ?></p> <?php endif; ?>
</div>
<div class="form-group <?php if($errors->has('addres')): ?> has-error <?php endif; ?>">
    <label for="direccion_inspector"><?php echo app('translator')->getFromJson('words.Addres'); ?></label>
    <?php echo Form::text('addres', null, ['class' => 'input-body', 'placeholder' => 'Addres','id' => 'direccion_inspector']); ?>

    <?php if($errors->has('addres')): ?> <p class="help-block"><?php echo e($errors->first('addres')); ?></p> <?php endif; ?>
</div>
<div class="form-group <?php if($errors->has('email')): ?> has-error <?php endif; ?>">
    <label for="correo_inspector"><?php echo app('translator')->getFromJson('words.Email'); ?></label>
    <?php echo Form::text('email', isset($user) ? $user->email : null, ['class' => 'input-body', 'placeholder' => 'Email','id' => 'correo_inspector']); ?>

    <?php if($errors->has('email')): ?> <p class="help-block"><?php echo e($errors->first('email')); ?></p> <?php endif; ?>
</div>


<?php if( auth()->user()->hasRole('Admin') ): ?>
    <!-- Companies Form Input -->
    <div class="form-group <?php if($errors->has('companies')): ?> has-error <?php endif; ?>">
        <?php echo Form::label('companies[]', trans_choice('words.Company', 2)); ?>

        <?php echo Form::select('companies[]', $companies, isset($user) ? $user->companies->pluck('id')->toArray() : null,  ['class' => 'input-body select2 form-control', 'multiple', 'data-placeholder' => trans('words.ChooseOption')]); ?>

        <?php if($errors->has('companies')): ?> <p class="help-block"><?php echo e($errors->first('companies')); ?></p> <?php endif; ?>
    </div>
<?php endif; ?>


<!-- Modal Notificacion-->
<div class="modal fade" id="modal_notificacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-custom">
        <div class="modal-content">
            <div class="modal-body modal-body-custom">
                <div class="panel panel-success pan">
                    <div class="panel-body">
                        <div class="text-center">
                            <div id="cont-notificacion-modal" class="title-modal"></div>
                        </div>
                        <div class="col-xs-12 text-center">
                            <label for="usuario" style="color:black"> Derechos Reservados 2018.</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
