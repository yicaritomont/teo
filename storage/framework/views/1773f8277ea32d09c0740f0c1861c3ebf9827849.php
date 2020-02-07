<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_'.$entity)): ?>
  <?php if(isset($status) && $status == 2): ?>
    <a href="<?php echo e(route($entity.'.edit', [str_singular($entity) => ${$action}])); ?>" title="<?php echo app('translator')->getFromJson('words.Whatch'); ?>" class="btn btn-xs btn-default">
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
  <?php else: ?>
    <a href="<?php echo e(route($entity.'.edit', [str_singular($entity) => ${$action}])); ?>" title="<?php echo app('translator')->getFromJson('words.Edit'); ?>" class="btn btn-xs btn-info">
        <i class="fa fa-edit"></i>
    </a>
  <?php endif; ?>

    <?php
        $parameters = Route::current()->parameters();
    ?>

    <?php if( isset($parameters['entity']) && $parameters['entity'] == 'formats' ): ?>
        <a href="<?php echo e(route($entity.'.supports', [str_singular($entity) => ${$action}])); ?>" title="<?php echo app('translator')->getFromJson('words.supports'); ?>" class="btn btn-xs btn-warning">
            <i class="glyphicon glyphicon-folder-open"></i></a>
        <?php if($status == 2): ?>
            <?php
                $num_firmas = App\Http\Helpers\Equivalencia::numeroFirmasPorFormato(${$action});
                $num_sellos = App\Http\Helpers\Equivalencia::numeroSellosPorFormato(${$action});
                $num_block  = App\Http\Helpers\Equivalencia::numeroBlockPorFormato(${$action});

            ?>
            <?php if($num_firmas > 0): ?>
                <a href="<?php echo e(route($entity.'.signedFormats', [str_singular($entity) => ${$action}])); ?>" title="<?php echo app('translator')->getFromJson('words.signa'); ?>" target="_blank" class="btn btn-xs btn-success">
                    <i class="glyphicon glyphicon-pencil"></i>
                </a>
            <?php endif; ?>

            <?php if($num_firmas == 2 && $num_sellos == 0): ?>  
                <a href="<?php echo e(route($entity.'.signature', [str_singular($entity) => ${$action}])); ?>" title="<?php echo app('translator')->getFromJson('words.tagsello'); ?>" class="btn btn-xs btn-info">
                    <i class="glyphicon glyphicon-tag"></i>
                </a>   
            <?php elseif($num_firmas == 2 && $num_sellos == 1): ?>    
                <a href="<?php echo e(route($entity.'.infoSignature', [str_singular($entity) => ${$action}])); ?>" title="<?php echo app('translator')->getFromJson('words.viewSellos'); ?>" class="btn btn-xs btn-info">
                    <i class="glyphicon glyphicon-info-sign"></i>
                </a>
                <?php if($num_block <=0 ): ?>
                    <a href="<?php echo e(route($entity.'.registrarBlockchain', [str_singular($entity) => ${$action}])); ?>" title="<?php echo app('translator')->getFromJson('words.saveBlockchain'); ?>" class="btn btn-xs btn-danger">
                        <i class="fa fa-btc"></i>
                    </a> 
                <?php else: ?>
                    <a href="<?php echo e(route($entity.'.certificarBlockchain', [str_singular($entity) => ${$action}])); ?>" target="_blank" title="<?php echo app('translator')->getFromJson('words.viewCertificateBlo'); ?>" class="btn btn-xs btn-danger">
                        <i class="fa fa-file-pdf-o"></i>
                    </a> 
                <?php endif; ?> 
            <?php endif; ?>
        <?php endif; ?>
    <?php endif; ?>
<?php endif; ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete_'.$entity)): ?>

    <?php if(isset($status)): ?>
        <?php echo Form::open( ['method' => 'delete', 'url' => route($entity.'.destroy', ['user' => ${$action}]), 'style' => 'display: inline-table', 'id' => 'd'.${$action}, 'class' => 'formDelete']); ?>

            <?php if($status == 1): ?>
                <button type="button" onclick="confirmModal('<?php echo '#d'.${$action} ?>', '<?php echo e(trans('words.InactiveMessage')); ?>', 'warning')" title="<?php echo app('translator')->getFromJson('words.inactivate'); ?>" class="btn  btn-xs btn-success btnDelete"><span class='glyphicon glyphicon-ok-sign'></span></button>
            <?php elseif($status == 2): ?>
                <a href="<?php echo e(action('FormatController@downloadPDF',${$action})); ?>" title="<?php echo app('translator')->getFromJson('words.download'); ?>" class="btn  btn-xs btn-primary"><i class='glyphicon glyphicon-download-alt'></i></a>
            <?php else: ?>
                <button type="button" onclick="confirmModal('<?php echo '#d'.${$action} ?>', '<?php echo e(trans('words.ActiveMessage')); ?>', 'warning')" title="<?php echo app('translator')->getFromJson('words.activate'); ?>" class="btn  btn-xs btn-danger btnDelete"><span class='glyphicon glyphicon-remove-sign'></button>
            <?php endif; ?>
        <?php echo Form::close(); ?>

    <?php else: ?>
        <?php echo Form::open( ['method' => 'delete', 'url' => route($entity.'.destroy', ['user' => ${$action}]), 'style' => 'display: inline-table', 'id' => 'd'.${$action}, 'class' => 'formDelete']); ?>

            <button type="button" class="btn-delete btn btn-xs btn-danger" title="<?php echo app('translator')->getFromJson('words.Delete'); ?>" onclick="confirmModal('<?php echo '#d'.${$action} ?>', '<?php echo e(trans('words.DeleteMessage')); ?>', 'warning')">
                <i class="glyphicon glyphicon-trash"></i>
            </button>
        <?php echo Form::close(); ?>

    <?php endif; ?>
<?php endif; ?>
