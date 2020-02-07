<!-- Name Form Input -->
<div class="form-group <?php if($errors->has('name')): ?> has-error <?php endif; ?>">
    <label for="name"><?php echo trans_choice('words.InspectionType',1); ?> </label>
    <?php echo Form::select('inspection_type_id',$inspection_types,null, array('class' => 'chosen-select form-control','require')); ?>

    <?php if($errors->has('inspection_type')): ?> <p class="help-block"><?php echo e($errors->first('inspection_type')); ?></p> <?php endif; ?>
</div>
<div class="form-group <?php if($errors->has('name')): ?> has-error <?php endif; ?>">
    <label for="name"><?php echo app('translator')->getFromJson('words.Name'); ?></label>
    <?php echo Form::text('name', null, ['class' => 'input-body', 'placeholder' => 'Name']); ?>

    <?php if($errors->has('name')): ?> <p class="help-block"><?php echo e($errors->first('name')); ?></p> <?php endif; ?>
</div>
