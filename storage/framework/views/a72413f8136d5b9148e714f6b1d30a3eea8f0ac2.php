<?php $__env->startSection('title', trans_choice('words.Format',2).', '); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-5">
            <h3 class="modal-title"><?php echo e(trans_choice('words.Format', 2)); ?></h3>
        </div>
    </div>
    <div class="result-set">
        <table class="table table-bordered table-striped table-hover dataTable" id="data-table">
            <thead>
            <tr>
                <th><?php echo app('translator')->getFromJson('words.Id'); ?></th>
                <th><?php echo app('translator')->choice('words.Preformato',2); ?></th>
                <th><?php echo app('translator')->choice('words.Company',2); ?></th>
                <th><?php echo app('translator')->choice('words.Client', 2); ?></th>
                <th><?php echo app('translator')->getFromJson('words.CreatedAt'); ?></th>
                <th><?php echo app('translator')->getFromJson('words.UpdatedAt'); ?></th>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_formats','delete_formats')): ?>
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

          var columns = [
            {data: 'id'},
            {data: 'preformato.name'},
            {data: 'company.user.name'},
            {data: 'client.user.name'},
            {data: 'created_at'},
            {data: 'updated_at'},
          ]

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_formats','delete_preformats')): ?>
                <?php if(isset($inspectorId)): ?>
                    dataTableObject.ajax = {url: "<?php echo e(route('datatable', ['model' => 'Format', 'whereHas' => 'inspection_appointments.inspector,id,'.$inspectorId, 'entity' => 'formats', 'identificador' => 'id', 'relations' => 'preformato,company.user,client.user'])); ?>"};
                <?php else: ?>
                    dataTableObject.ajax = {url: "<?php echo e(route('datatable', ['model' => 'Format', 'whereHas' => 'none', 'entity' => 'formats', 'identificador' => 'id', 'relations' => 'preformato,company.user,client.user'])); ?>"};
                <?php endif; ?>

                columns.push({data: 'actions', className: 'text-center wCellActions', orderable: false},)
                dataTableObject.columnDefs = [formatDateTable([-2, -3])];
            <?php else: ?>
                dataTableObject.ajax = {url: "<?php echo e(route('datatable', ['model' => 'Format', 'whereHas' => 'none', 'relations' => 'preformato,company.user,client.user'])); ?>"};
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