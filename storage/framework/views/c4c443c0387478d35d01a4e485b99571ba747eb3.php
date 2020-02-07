<?php $__env->startSection('title', trans('words.Permission')); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-5">
            <h3 class="modal-title"> <?php echo e(str_plural(trans('words.Permission'), 2)); ?> </h3>
        </div>
        <div class="col-md-7 page-action text-right">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add_permissions')): ?>
                <a href="<?php echo e(route('permissions.create')); ?>" class="btn btn-primary btn-sm"> <i class="glyphicon glyphicon-plus-sign"></i> <?php echo app('translator')->getFromJson('words.Create'); ?></a>
            <?php endif; ?>
        </div>
    </div>

    <div class="result-set">
        <table id="dataTable" class="table table-bordered table-hover dataTable nowrap">
            <thead>
            <tr>
                <th><?php echo app('translator')->getFromJson('words.Id'); ?></th>
                <th><?php echo app('translator')->getFromJson('words.Name'); ?></th>            
                <th><?php echo app('translator')->getFromJson('words.CreatedAt'); ?></th>
                <th><?php echo app('translator')->getFromJson('words.UpdatedAt'); ?></th>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete_permissions')): ?>
                    <th class="text-center"><?php echo app('translator')->getFromJson('words.Actions'); ?></th>
                <?php endif; ?>
            </tr>
            </thead>   
        </table>  
    </div>

    <input type="hidden" name="permisos" value="<?php echo e(app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete_permissions')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>  
        
        $(document).ready(function() {

            //Se definen las columnas (Sin actions)
            var columns = [
                {data: 'id'},
                {data: 'name'},
                {data: 'created_at'},
                {data: 'updated_at'},
            ];

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete_permissions')): ?>
                dataTableObject.ajax = {url: "<?php echo e(route('datatable', ['model' => 'Permission', 'whereHas' => 'none', 'entity' => 'permissions', 'identificador' => 'name', 'relations' => 'none'])); ?>"};
 
                columns.push({data: 'actions', className: 'text-center wCellActions', orderable: false},)
                dataTableObject.columnDefs = [formatDateTable([-2, -3])];
            <?php else: ?>
                dataTableObject.ajax = {url: "<?php echo e(route('datatable', ['model' => 'Permission'])); ?>"};
                dataTableObject.columnDefs = [formatDateTable([-1, -2])];
            <?php endif; ?>

            dataTableObject.ajax.type = 'POST';
            dataTableObject.ajax.data = {_token: window.Laravel.csrfToken};
            dataTableObject.columns = columns;

            var table = $('.dataTable').DataTable(dataTableObject);
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>