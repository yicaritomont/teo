<!-- Name Form Input -->
<div class="form-group <?php if($errors->has('name')): ?> has-error <?php endif; ?>">
    <label for="name"><?php echo app('translator')->getFromJson('words.Name'); ?></label>
    <?php echo Form::text('name', null, ['class' => 'input-body']); ?>   
    <?php if($errors->has('name')): ?> <p class="help-block"><?php echo e($errors->first('name')); ?></p> <?php endif; ?>
</div>

<!-- email Form Input -->
<div class="form-group <?php if($errors->has('email')): ?> has-error <?php endif; ?>">
    <label for="email"><?php echo app('translator')->getFromJson('words.E-Mail'); ?></label>
    <?php echo Form::text('email', old('email'), ['class' => 'input-body']); ?>    
    <?php if($errors->has('email')): ?> <p class="help-block"><?php echo e($errors->first('email')); ?></p> <?php endif; ?>
</div>

<!-- Image Form Input -->
<div class="form-group <?php if($errors->has('picture')): ?> has-error <?php endif; ?>">
    <label for="picture"><?php echo app('translator')->getFromJson('words.Picture'); ?></label>
    <?php echo Form::file('picture', old('picture'), ['class' => 'input-body', 'type'=>'file', 'accept'=>'image/*']); ?>`
    <?php if($errors->has('picture')): ?> <p class="help-block"><?php echo e($errors->first('picture')); ?></p> <?php endif; ?>
</div>