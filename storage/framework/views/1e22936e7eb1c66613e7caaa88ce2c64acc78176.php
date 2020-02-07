<!-- name for modules -->
<div class="form-group <?php if($errors->has('name')): ?> has-error <?php endif; ?>">
    <?php echo Form::label('modulo', trans('words.ManageModulo') ); ?>

    <?php echo Form::text('name', old('name'), ['class' => 'input-body']); ?>

    <?php if($errors->has('name')): ?> <p class="help-block"><?php echo e($errors->first('name')); ?></p> <?php endif; ?>
</div>