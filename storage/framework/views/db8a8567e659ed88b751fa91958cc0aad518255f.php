<!-- Name of Headquarters Form Input -->
<div class="form-group <?php if($errors->has('name')): ?> has-error <?php endif; ?>">
    <?php echo Form::label('name', trans('words.Name')); ?>

    <?php echo Form::text('name', null, ['class' => 'input-body']); ?>

    <?php if($errors->has('name')): ?> <p class="help-block"><?php echo e($errors->first('name')); ?></p> <?php endif; ?>
</div>

<!-- Address of Headquarters Form Input -->
<div class="form-group <?php if($errors->has('address')): ?> has-error <?php endif; ?>">
    <?php echo Form::label('address', trans('words.Address')); ?>

    <?php echo Form::text('address', null, ['class' => 'input-body ckeditor']); ?>

    <?php if($errors->has('address')): ?> <p class="help-block"><?php echo e($errors->first('address')); ?></p> <?php endif; ?>
</div>

<?php if( !auth()->user()->hasRole('Cliente') ): ?>
    <!-- Client of Headquarters Form Select -->
    <div class="form-group <?php if($errors->has('client_id')): ?> has-error <?php endif; ?>">
        <?php echo Form::label('client_id', trans_choice('words.Client', 1)); ?>

        <?php echo Form::select('client_id', $clients, isset($headquarters) ? $headquarters->client_id : null, ['class' => 'input-body form-control select2', 'placeholder' => trans('words.ChooseOption')]); ?>

        <?php if($errors->has('client_id')): ?> <p class="help-block"><?php echo e($errors->first('client_id')); ?></p> <?php endif; ?>
    </div>
<?php endif; ?>

<!-- Location of Headquarters Form Select -->
<div class="form-group <?php if($errors->has('latitude') || $errors->has('longitude')): ?> has-error <?php endif; ?>">
    <label>Ubicación</label>
    
    <div id="map"></div>

    <input type="hidden" name="latitude" id="latitude">
    <input type="hidden" name="longitude" id="longitude">

    <?php if($errors->has('latitude') || $errors->has('longitude')): ?> <p class="help-block"><?php echo app('translator')->getFromJson('words.ErrorMapForm'); ?></p> <?php endif; ?>
</div>

<?php $__env->startSection('scripts'); ?>

    <?php echo $__env->make('shared._formMap', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    
<?php $__env->stopSection(); ?>