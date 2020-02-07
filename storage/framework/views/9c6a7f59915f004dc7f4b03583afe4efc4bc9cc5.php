<!-- Name of Client Form Input -->
<div class="form-group <?php if($errors->has('name')): ?> has-error <?php endif; ?>">
    <?php echo Form::label('name', trans('words.Name')); ?>

    <?php echo Form::text('name', isset($user) ? $user->name : null, ['class' => 'input-body']); ?>

    <?php if($errors->has('name')): ?> <p class="help-block"><?php echo e($errors->first('name')); ?></p> <?php endif; ?>
</div>

<!-- Identificacion of Client Form Input -->
<div class="form-group <?php if($errors->has('identification')): ?> has-error <?php endif; ?>">
    <?php echo Form::label('identification', trans('words.Identification')); ?>

    <?php echo Form::text('identification', null, ['class' => 'input-body']); ?>

    <?php if($errors->has('identification')): ?> <p class="help-block"><?php echo e($errors->first('identification')); ?></p> <?php endif; ?>
</div>

<!-- Email of Client Form Input -->
<div class="form-group <?php if($errors->has('email')): ?> has-error <?php endif; ?>">
    <?php echo Form::label('email', trans('words.Email')); ?>

    <?php echo Form::text('email', isset($user) ? $user->email : null, ['class' => 'input-body']); ?>

    <?php if($errors->has('email')): ?> <p class="help-block"><?php echo e($errors->first('email')); ?></p> <?php endif; ?>
</div>

<!-- password Form Input -->
<!--<div class="form-group <?php if($errors->has('password')): ?> has-error <?php endif; ?>">
    <label for="password"><?php echo app('translator')->getFromJson('words.Password'); ?></label>
    <?php echo Form::password('password', ['class' => 'input-body', 'id' => 'password']); ?>   
    <?php if($errors->has('password')): ?> <p class="help-block"><?php echo e($errors->first('password')); ?></p> <?php endif; ?>
</div>-->

<!-- Phone of Client Form Input -->
<div class="form-group <?php if($errors->has('phone')): ?> has-error <?php endif; ?>">
    <?php echo Form::label('phone', trans('words.Phone')); ?>

    <?php echo Form::text('phone', null, ['class' => 'input-body',]); ?>

    <?php if($errors->has('phone')): ?> <p class="help-block"><?php echo e($errors->first('phone')); ?></p> <?php endif; ?>
</div>

<!-- Cell Phone of Client Form Input -->
<div class="form-group <?php if($errors->has('cell_phone')): ?> has-error <?php endif; ?>">
    <?php echo Form::label('cell_phone', trans('words.CellPhone')); ?>

    <?php echo Form::text('cell_phone', null, ['class' => 'input-body']); ?>

    <?php if($errors->has('cell_phone')): ?> <p class="help-block"><?php echo e($errors->first('cell_phone')); ?></p> <?php endif; ?>
</div>

<?php if( !auth()->user()->hasRole('Compania') ): ?>
    <!-- Companies Form Input -->
    <div class="form-group <?php if($errors->has('companies')): ?> has-error <?php endif; ?>">
        <?php echo Form::label('companies', trans_choice('words.Company', 2)); ?>

        <?php echo Form::select('companies', $companies, isset($user) ? $user->companies->pluck('id')->toArray() : null,  ['class' => 'input-body form-control select2', 'placeholder' => trans('words.ChooseOption')]); ?>

        <?php if($errors->has('companies')): ?> <p class="help-block"><?php echo e($errors->first('companies')); ?></p> <?php endif; ?>
    </div>
<?php endif; ?>

<?php $__env->startPush('scripts'); ?>
    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<?php $__env->stopPush(); ?>