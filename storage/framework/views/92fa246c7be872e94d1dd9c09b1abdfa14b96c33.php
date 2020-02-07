<!-- Range Date of Inspector Agenda Form Date -->
<div class="form-group">
    <?php echo Form::label('start_date', trans('words.StartDate').' - '); ?>

    <?php echo Form::label('end_date', trans('words.EndDate')); ?>

    
    <div class="input-group date-range-inputs">
        <input type="text" class="form-control input-date" name="start_date" id="start_date" autocomplete="off">
        <span class="input-group-addon"><?php echo app('translator')->getFromJson('words.To'); ?></span>
        <input type="text" class="form-control input-date" name="end_date" id="end_date" autocomplete="off">
    </div>
    <div class="errors"></div>
</div>

<?php if( !auth()->user()->hasRole('Inspector') ): ?>
    <!-- Inspector of Headquarters Form Select -->
    <div class="form-group">
        <?php echo Form::label(isset($edit) ? $edit.'inspector_id' :  'inspector_id', trans_choice("words.Inspector", 1)); ?>

        <?php echo Form::select('inspector_id', isset($inspectors) ? $inspectors : [], isset($inspectorAgenda) ? $inspectorAgenda->inspector_id : null, ['class' => 'input-body select2 form-control inspectorField', 'placeholder' => trans('words.ChooseOption'), 'id' => isset($edit) ? $edit.'inspector_id' :  'inspector_id']); ?>

        <div class="errors"></div>
    </div>
<?php endif; ?>

<!-- Country of Agenda Form Select -->
<div class="form-group">
    <?php echo Form::label(isset($edit) ? $edit.'country' :  'country', trans('words.Country')); ?>

    <?php echo Form::select('country', $countries, isset($inspectorAgenda) ? $inspectorAgenda->country : null, ['class' => 'input-body country select2 form-control', 'placeholder' => trans('words.ChooseOption'), 'id' => isset($edit) ? $edit.'country' :  'country']); ?>

    <div class="errors"></div>
</div>

<div class="form-group">
    <?php echo Form::label(isset($edit) ? $edit.'city_id' :  'city_id', trans('words.City')); ?>

    <div class="loading city_id_loading"></div>
    
    <select id="<?php echo e(isset($edit) ? $edit :  ''); ?>city_id" name="city_id" class="input-body city_id select2 form-control">
        <option selected value><?php echo app('translator')->getFromJson('words.ChooseOption'); ?></option>
    </select>
    <div class="errors"></div>
</div>

<?php $__env->startPush('scripts'); ?>
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    
<?php $__env->stopPush(); ?>
