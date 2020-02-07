<!-- Name Form Input -->
<div class="form-group <?php if($errors->has('name')): ?> has-error <?php endif; ?>">
    <label for="name"><?php echo app('translator')->getFromJson('words.Name'); ?></label>
    <?php echo Form::text('name', null, ['class' => 'input-body']); ?>   
    <?php if($errors->has('name')): ?> <p class="help-block"><?php echo e($errors->first('name')); ?></p> <?php endif; ?>
</div>

<!-- email Form Input -->
<div class="form-group <?php if($errors->has('email')): ?> has-error <?php endif; ?>">
    <label for="email"><?php echo app('translator')->getFromJson('words.Email'); ?></label>
    <?php echo Form::text('email', old('email'), ['class' => 'input-body']); ?>    
    <?php if($errors->has('email')): ?> <p class="help-block"><?php echo e($errors->first('email')); ?></p> <?php endif; ?>
</div>

<!-- password Form Input -->
<div class="form-group <?php if($errors->has('password')): ?> has-error <?php endif; ?>">
    <label for="password"><?php echo app('translator')->getFromJson('words.Password'); ?></label>
    <?php echo Form::password('password', ['class' => 'input-body']); ?>   
    <?php if($errors->has('password')): ?> <p class="help-block"><?php echo e($errors->first('password')); ?></p> <?php endif; ?>
</div>

<!-- Image Form Input -->
<div class="form-group <?php if($errors->has('picture')): ?> has-error <?php endif; ?>">
    <label for="picture"><?php echo app('translator')->getFromJson('words.Picture'); ?></label>
    <?php echo Form::file('picture', old('picture'), ['class' => 'input-body', 'type'=>'file', 'accept'=>'image/*']); ?>

    <?php if($errors->has('picture')): ?> <p class="help-block"><?php echo e($errors->first('picture')); ?></p> <?php endif; ?>
</div>

<!-- Roles Form Input -->
<div class="form-group <?php if($errors->has('roles')): ?> has-error <?php endif; ?>">
    <?php echo Form::label('roles[]', 'Roles'); ?>

    
    <?php echo Form::select('roles[]', $roles, isset($user) ? $user->roles->pluck('id')->toArray() : null,  ['class' => 'input-body form-control chosen-select', 'multiple', 'data-placeholder' => trans('words.ChooseOption')]); ?>

    <?php if($errors->has('roles')): ?> <p class="help-block"><?php echo e($errors->first('roles')); ?></p> <?php endif; ?>
</div>

<!-- Companies Form Input -->
<div class="form-group <?php if($errors->has('companies')): ?> has-error <?php endif; ?>">
    <?php echo Form::label('companies[]', trans_choice('words.Company', 2)); ?>

    <?php echo Form::select('companies[]', $companies, isset($user) ? $user->companies->pluck('id')->toArray() : null,  ['class' => 'input-body form-control chosen-select', 'multiple', 'data-placeholder' => trans('words.ChooseOption')]); ?>

    <?php if($errors->has('companies')): ?> <p class="help-block"><?php echo e($errors->first('companies')); ?></p> <?php endif; ?>
</div>

<!-- Permissions -->
<?php if(isset($user)): ?>
    <?php echo $__env->make('shared._permissions', ['closed' => 'true', 'model' => $user ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>