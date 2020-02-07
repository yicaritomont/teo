<!-- Range Date of Appointment -->
<div class="form-group">
    <?php echo Form::label('estimated_start_date', trans('words.StartDate').' - '); ?>

    <?php echo Form::label('estimated_end_date', trans('words.EndDate')); ?>

    
    <div class="input-group date-range-inputs">
        <input type="text" class="form-control input-date" name="estimated_start_date" id="estimated_start_date" autocomplete="off">
        <span class="input-group-addon"><?php echo app('translator')->getFromJson('words.To'); ?></span>
        <input type="text" class="form-control input-date" name="estimated_end_date" id="estimated_end_date" autocomplete="off">
    </div>
    <div class="errors"></div>
</div>



<?php if( !auth()->user()->hasRole('Cliente') ): ?>
    <div class="form-group <?php if($errors->has('client_id')): ?> has-error <?php endif; ?>">
        <?php echo Form::label('client_id', trans_choice('words.Client', 1)); ?>

        
        <?php echo Form::select('client_id', isset($clients) ? $clients : [], null, ['class' => 'input-body select2 form-control client-contract', 'placeholder'=>trans('words.ChooseOption')]); ?>

        <div class="errors"></div>
    </div>
<?php endif; ?>

<div class="form-group <?php if($errors->has('appointment_location_id')): ?> has-error <?php endif; ?>">
    <?php echo Form::label('headquarters_id', trans_choice('words.Headquarters', 1)); ?>

    <div class="loading" id="headquarters_id_loading"></div>
    <?php echo Form::select('headquarters_id', ['' => trans('words.ChooseOption')], null, ['class' => 'input-body select2 form-control']); ?>

    <div class="errors"></div>
</div>

<div class="form-group <?php if($errors->has('contract_id')): ?> has-error <?php endif; ?>">
    <?php echo Form::label('contract_id', trans_choice('words.Contract', 1)); ?>

    <div class="loading" id="contract_id_loading"></div>
    <?php if(auth()->user()->hasRole('Admin')): ?>
        <?php echo Form::select('contract_id', ['' => trans('words.ChooseOption')], null, ['class' => 'input-body select2 form-control']); ?>

    <?php else: ?>
        <?php echo Form::select('contract_id', isset($contracts) ? $contracts : [], null, ['class' => 'input-body select2 form-control','require', 'placeholder'=>trans('words.ChooseOption')]); ?>

    <?php endif; ?>
    <div class="errors"></div>
</div>





<?php if(isset($agenda)): ?>
    <input type="hidden" name="inspector_id" value="<?php echo e($agenda['inspector_id']); ?>">
<?php endif; ?>

<input type="hidden" name="inspection_subtype_id" id="inspection_subtype_id">

<input type="hidden" name="company_id" id="company_id">