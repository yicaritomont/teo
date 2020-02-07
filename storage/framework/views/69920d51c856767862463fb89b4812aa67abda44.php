<?php $__env->startSection('title', trans('words.Create').' '.trans('words.ManageModulo')); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-5">
            <h3 class="modal-title"><?php echo e($result->total()); ?> <?php echo e(str_plural(trans('words.ManageModulo'), $result->count())); ?> </h3>
        </div>
        <div class="col-md-7 page-action text-right">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add_modulos')): ?>
                <a href="<?php echo e(route('modulos.create')); ?>" class="btn btn-primary btn-sm"> <i class="glyphicon glyphicon-plus-sign"></i> <?php echo app('translator')->getFromJson('words.Create'); ?></a>
            <?php endif; ?>
        </div>
    </div>

    <div class="result-set">
        <table class="table table-bordered table-striped table-hover" id="data-table">
            <thead>
            <tr>
                <th><?php echo app('translator')->getFromJson('words.Id'); ?></th>
                <th><?php echo app('translator')->getFromJson('words.Name'); ?></th>                
                <th><?php echo app('translator')->getFromJson('words.CreatedAt'); ?></th>               
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_modulos', 'delete_modulos')): ?>
                    <th class="text-center"><?php echo app('translator')->getFromJson('words.Actions'); ?></th>
                <?php endif; ?>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($item->id); ?></td>
                    <td><?php echo e($item->name); ?></td>                    
                    <td><?php echo e($item->created_at->toFormattedDateString()); ?></td>                    
                    <td>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_modulos')): ?>
                            <a href="<?php echo e(route('modulos.edit', $item->id)); ?>" class="btn btn-xs btn-info">
                                <i class="fa fa-edit"></i>
                            </a>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete_modulos')): ?>
                        <?php echo Form::open( ['method' => 'delete', 'url' => route('modulos.destroy', ['user' => $item->id]), 'style' => 'display: inline', 'onSubmit' => 'return confirm("Are your sure wanted to delete it?")']); ?>                            
                            <?php if($item->state == 1): ?>
                                <button class="btn  btn-xs btn-success"><span class='glyphicon glyphicon-ok-sign'></span></button>
                            <?php else: ?>
                                <button class="btn  btn-xs btn-danger"><span class='glyphicon glyphicon-remove-sign'></button>
                            <?php endif; ?>    
                        <?php echo Form::close(); ?>

                        <?php endif; ?>
                    </td>                

                   <!-- <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_modulos', 'delete_modulos')): ?>
                    <td class="text-center">
                        <?php echo $__env->make('shared._actions', [
                            'entity' => 'modulos',
                            'id' => $item->id
                        ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </td>
                    <?php endif; ?>-->
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

        <div class="text-center">
            <?php echo e($result->links()); ?>

        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>