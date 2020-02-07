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
    <input type="hidden" id='user_pasword' value='0'>
    <?php echo Form::password('password',['class' => 'input-body' ,'id' => 'password_update']); ?>

    <?php if($errors->has('password')): ?> <p class="help-block"><?php echo e($errors->first('password')); ?></p> <?php endif; ?>
    <p id="div_info_lengthPwd" ></p>
    <p id="div_info_lengthNumber"></p>
    <p id="div_info_lengthLower"></p>
    <p id="div_info_lengthUpper"></p>
    <p id="div_info_beforePass"></p>
    <p id="div_info_keyWordPass"></p>
</div>

<!-- Image Form Input -->
<div class="form-group <?php if($errors->has('picture')): ?> has-error <?php endif; ?>">
    <label for="picture"><?php echo app('translator')->getFromJson('words.Picture'); ?></label>
    <?php echo Form::file('picture', old('picture'), ['class' => 'input-body', 'type'=>'file', 'accept'=>'image/*']); ?>

    <?php if($errors->has('picture')): ?> <p class="help-block"><?php echo e($errors->first('picture')); ?></p> <?php endif; ?>
</div>

<!-- Permissions -->
<?php if(isset($user)): ?>
    <?php echo $__env->make('shared._permissions', ['closed' => 'true', 'model' => $user ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>