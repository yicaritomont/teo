<!-- Name Form Input -->
<div class="form-group <?php if($errors->has('name')): ?> has-error <?php endif; ?>">
    <label for="name"><?php echo app('translator')->getFromJson('words.Name'); ?></label>
    <?php echo Form::text('name', null, ['class' => 'input-body', 'placeholder' => trans('words.Name')]); ?>

    <?php if($errors->has('name')): ?> <p class="help-block"><?php echo e($errors->first('name')); ?></p> <?php endif; ?>
</div>

<!-- InspectionSubType Form Select -->
<div class="form-group <?php if($errors->has('inspection_subtypes_id')): ?> has-error <?php endif; ?>">
    <?php echo Form::label('inspection_subtypes_id', trans_choice('words.InspectionSubtype', 2)); ?>

    <?php echo Form::select('inspection_subtypes_id', $inspectionSubtype, isset($inspector_type) ? $inspector_type->inspection_subtypes_id : null, ['class' => 'input-body', 'placeholder' => trans('words.ChooseOption')]); ?>

    <?php if($errors->has('inspection_subtypes_id')): ?> <p class="help-block"><?php echo e($errors->first('inspection_subtypes_id')); ?></p> <?php endif; ?>
</div>