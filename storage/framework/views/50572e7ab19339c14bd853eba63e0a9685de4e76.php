<!-- Name of Company Form Input -->
<div class="form-group <?php if($errors->has('name')): ?> has-error <?php endif; ?>">
    <?php echo Form::label('name', trans('words.Name')); ?>

    <?php echo Form::text('name', isset($user) ? $user->name : null, ['class' => 'input-body']); ?>

    <?php if($errors->has('name')): ?> <p class="help-block"><?php echo e($errors->first('name')); ?></p> <?php endif; ?>
</div>

<!-- Address of Company Form Input -->
<div class="form-group <?php if($errors->has('address')): ?> has-error <?php endif; ?>">
    <?php echo Form::label('address', trans('words.Address')); ?>

    <?php echo Form::text('address', null, ['class' => 'input-body ckeditor']); ?>

    <?php if($errors->has('address')): ?> <p class="help-block"><?php echo e($errors->first('address')); ?></p> <?php endif; ?>
</div>

<!-- Phone of Company Form Input -->
<div class="form-group <?php if($errors->has('phone')): ?> has-error <?php endif; ?>">
    <?php echo Form::label('phone', trans('words.Phone')); ?>

    <?php echo Form::text('phone', null, ['class' => 'input-body',]); ?>

    <?php if($errors->has('phone')): ?> <p class="help-block"><?php echo e($errors->first('phone')); ?></p> <?php endif; ?>
</div>

<!-- Email of Company Form Input -->
<div class="form-group <?php if($errors->has('email')): ?> has-error <?php endif; ?>">
    <?php echo Form::label('email', trans('words.Email')); ?>

    <?php echo Form::text('email', isset($user) ? $user->email : null, ['class' => 'input-body']); ?>

    <?php if($errors->has('email')): ?> <p class="help-block"><?php echo e($errors->first('email')); ?></p> <?php endif; ?>
</div>

<!-- password Form Input -->
<!--<div class="form-group <?php if($errors->has('password')): ?> has-error <?php endif; ?>">
    <?php echo Form::label('password', trans('words.Password')); ?>

    <?php echo Form::password('password', ['class' => 'input-body']); ?>   
    <?php if($errors->has('password')): ?> <p class="help-block"><?php echo e($errors->first('password')); ?></p> <?php endif; ?>
</div>-->

<!-- Activity of Company Form Input -->
<div class="form-group <?php if($errors->has('activity')): ?> has-error <?php endif; ?>">
    <?php echo Form::label('activity', trans('words.Activity')); ?>

    <?php echo Form::text('activity', null, ['class' => 'input-body']); ?>

    <?php if($errors->has('activity')): ?> <p class="help-block"><?php echo e($errors->first('activity')); ?></p> <?php endif; ?>
</div>

<?php $__env->startPush('scripts'); ?>
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<?php $__env->stopPush(); ?>