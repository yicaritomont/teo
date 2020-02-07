<!-- Name of Contract Form Input -->
<div class="form-group <?php if($errors->has('name')): ?> has-error <?php endif; ?>">
    <?php echo Form::label('name', trans('words.Name')); ?>

    <?php echo Form::text('name', null, ['class' => 'input-body']); ?>

    <?php if($errors->has('name')): ?> <p class="help-block"><?php echo e($errors->first('name')); ?></p> <?php endif; ?>
</div>

<!-- Date of Contract Form Date -->
<div class="form-group <?php if($errors->has('date')): ?> has-error <?php endif; ?>">
    <?php echo Form::label('date', trans('words.Date')); ?>

    <div class="input-group date">
        <?php echo Form::text('date', null, ['class' => 'form-control input-date', 'autocomplete' => 'off']); ?>

        <span class="input-group-addon" style="background-color: #eee !important;cursor:pointer"><i class="glyphicon glyphicon-th"></i></span>
    </div>
    <?php if($errors->has('date')): ?> <p class="help-block"><?php echo e($errors->first('date')); ?></p> <?php endif; ?>
</div>

<!-- Company of Contract Form Select -->
<div class="form-group <?php if($errors->has('company_id')): ?> has-error <?php endif; ?>">
    <?php echo Form::label('company_id', trans_choice('words.Company', 1)); ?>

    <?php echo Form::select('company_id', $companies, isset($contract) ? $contract->company_id : null, ['class' => 'input-body form-control select2', 'disablePlaceholder' => true, 'placeholder' => trans('words.ChooseOption')]); ?>

    <?php if($errors->has('company_id')): ?> <p class="help-block"><?php echo e($errors->first('company_id')); ?></p> <?php endif; ?>
</div>

<!-- Client of Contract Form Select -->
<div class="form-group <?php if($errors->has('client_id')): ?> has-error <?php endif; ?>">
    <?php echo Form::label('client_id', trans_choice('words.Client', 1)); ?>

    <div class="loading" id="client_id_loading"></div>
    
    <select id="client_id" name="client_id" class="input-body form-control select2">
        <option selected value><?php echo app('translator')->getFromJson('words.ChooseOption'); ?></option>
    </select>
    <?php if($errors->has('client_id')): ?> <p class="help-block"><?php echo e($errors->first('client_id')); ?></p> <?php endif; ?>
</div>

<input type="hidden" id="selectOption" value="<?php echo e(trans('words.ChooseOption')); ?>">

<?php $__env->startPush('scripts'); ?>
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>

<?php $__env->stopPush(); ?>
