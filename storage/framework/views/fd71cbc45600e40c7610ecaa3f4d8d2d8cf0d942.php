<?php $__env->startSection('title', trans_choice('words.Preformato',2).', '); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-5">
            <h3 class="modal-title"><?php echo e(trans_choice('words.Preformato',2)); ?></h3>
        </div>
        <div class="col-md-7 page-action text-right">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add_preformatos')): ?>
                <a href="<?php echo e(route('preformatos.create')); ?>" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-plus-sign"></i><?php echo app('translator')->getFromJson('words.Create'); ?></a>
            <?php endif; ?>
        </div>
    </div>

    <div class="result-set">
        <table class="table table-bordered table-striped table-hover dataTable nowrap" id="data-table">
            <thead>
            <tr>
                <th><?php echo app('translator')->getFromJson('words.Id'); ?></th>
                <th><?php echo app('translator')->getFromJson('words.Name'); ?></th>
                <th><?php echo app('translator')->choice('words.Company', 1); ?></th>
                <th><?php echo app('translator')->getFromJson('words.CreatedAt'); ?></th>
                <th><?php echo app('translator')->getFromJson('words.UpdatedAt'); ?></th>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_preformatos','delete_preformatos')): ?>
                    <th class="text-center"><?php echo app('translator')->getFromJson('words.Actions'); ?></th>
                <?php endif; ?>
            </tr>
            </thead>
        </table>
    </div>
<?php $__env->stopSection(); ?>

    <?php $__env->startSection('scripts'); ?>
        <script>

            $(document).ready(function() {

                //Se definen las columnas (Sin actions)
                var columns = [
                    {data: 'id'},
                    {data: 'name'},
                    {data: 'company.user.name'},
                    {data: 'created_at'},
                    {data: 'updated_at'},
                ];

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_preformatos','delete_preformatos')): ?>
                    <?php if(isset($companySlug)): ?>
                        dataTableObject.ajax = {url: "<?php echo e(route('datatable', ['model' => 'Preformato', 'whereHas' => 'company,slug,'.$companySlug, 'entity' => 'preformatos', 'identificador' => 'id', 'relations' => 'company.user'])); ?>"};
                    <?php else: ?>
                        dataTableObject.ajax = {url: "<?php echo e(route('datatable', ['model' => 'Preformato', 'whereHas' => 'none', 'entity' => 'preformatos', 'identificador' => 'id', 'relations' => 'company.user'])); ?>"};
                    <?php endif; ?>
                    columns.push({data: 'actions', className: 'text-center wCellActions', orderable: false},)
                    dataTableObject.columnDefs = [formatDateTable([-2, -3])];
                <?php else: ?>
                    dataTableObject.ajax = {url: "<?php echo e(route('datatable', ['model' => 'Preformato'])); ?>"};
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