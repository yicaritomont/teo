<!-- name for a New permission -->
<div class="form-group <?php if($errors->has('permission')): ?> has-error <?php endif; ?>">
    <label for="name"><?php echo app('translator')->getFromJson('words.Permissions'); ?></label>
    <?php echo Form::text('permission', null, ['class' => 'input-body']); ?>

    <?php if($errors->has('permission')): ?> <p class="help-block"><?php echo e($errors->first('permission')); ?></p> <?php endif; ?>
</div>