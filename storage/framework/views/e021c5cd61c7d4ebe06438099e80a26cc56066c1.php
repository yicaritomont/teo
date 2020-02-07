<div class="form-group <?php if($errors->has('companies')): ?> has-error <?php endif; ?>">
    <?php echo Form::label('inspection_subtypes[]', trans_choice('words.InspectionSubtype', 1)); ?>

    <?php echo Form::select('inspection_subtype_id', $inspection_subtypes, null,  ['class' => 'input-body form-control select2', 'require']); ?>

    <?php if($errors->has('inspection_subtypes')): ?> <p class="help-block"><?php echo e($errors->first('inspection_subtypes')); ?></p> <?php endif; ?>
</div>

<?php if( auth()->user()->hasRole('Admin') ): ?>
    <div class="form-group <?php if($errors->has('company_id')): ?> has-error <?php endif; ?>">
        <?php echo Form::label('company_id', trans_choice('words.Company', 1)); ?>

        <?php echo Form::select('company_id', $companies, null,  ['class' => 'input-body form-control select2', 'placeholder' => trans('words.ChooseOption')]); ?>

        <?php if($errors->has('company_id')): ?> <p class="help-block"><?php echo e($errors->first('company_id')); ?></p> <?php endif; ?>
    </div>
<?php endif; ?>

<div class="form-group <?php if($errors->has('name')): ?> has-error <?php endif; ?>">
    <label for="name"><?php echo app('translator')->getFromJson('words.Name'); ?></label>
    <?php echo Form::text('name', null, ['class' => 'input-body','placeholder' => trans('words.Name')]); ?>

    <?php if($errors->has('name')): ?> <p class="help-block"><?php echo e($errors->first('name')); ?></p> <?php endif; ?>
</div>

<div class="form-group <?php if($errors->has('format')): ?> has-error <?php endif; ?>">
</div>

    <div class="panel panel-default">
        <label for="name"><?php echo e(trans_choice('words.header',1)); ?></label>
        <?php echo Form::textarea('header',null,['class' => 'ckeditor','id' => 'header']); ?>

        <?php if($errors->has('header')): ?> <p class="help-block"><?php echo e($errors->first('header')); ?></p> <?php endif; ?>
    </div>
    <div class="panel panel-default">
        <label for="name"><?php echo e(trans_choice('words.Preformato',1)); ?></label>
        <?php echo Form::textarea('format',null,['class' => 'ckeditor','id' => 'editor1']); ?>

        <?php if($errors->has('format')): ?> <p class="help-block"><?php echo e($errors->first('format')); ?></p> <?php endif; ?>
    </div>
