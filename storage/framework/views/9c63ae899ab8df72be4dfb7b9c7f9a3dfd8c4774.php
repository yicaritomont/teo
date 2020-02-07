
<div class="form-group">
    <label for="company_id"><?php echo app('translator')->choice('words.Company',1); ?></label>
    <?php echo Form::text('company_id', $companyName, ['class' => 'input-body form-control', 'disabled']); ?>

</div>
<div class="form-group">
    <label for="client_id"><?php echo app('translator')->choice('words.Client', 1); ?></label>
      <?php echo Form::text('client_id', $clientName, ['class' => 'input-body form-control', 'disabled']); ?>

</div>
<div class="form-group">
    <label for="preformat_id"><?php echo app('translator')->choice('words.Preformato',1); ?></label>
    <?php echo Form::text('preformat_id',$preformatoName,  ['class' => 'input-body form-control', 'disabled']); ?>

</div>

<div id="plantilla_formato" class="col-xs-12" style="display:<?php echo $mostrar_formato; ?>;overflow-y: scroll;"><?php echo isset($formatoSeteado) ? $formatoSeteado : $formato->format; ?></div>
    <div class="panel panel-default col-xs-12" name="format"   id="contenedor_formato" style="display:none;overflow-y: scroll;">
</div>
<?php if(isset($appointment)): ?>
    <input type="hidden" name="appointment" value="<?php echo e($appointment); ?>">
<?php endif; ?>
