<?php $__env->startSection('title', trans_choice('words.Client', 1)); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-5">
            <?php if(isset($companies)): ?>
                <h3 class="modal-title"><?php echo e(trans_choice('words.Client', 2)); ?> <?php echo app('translator')->getFromJson('words.Of'); ?> <?php echo e($companies->user->name); ?></h3>
            <?php else: ?>
                <h3 class="modal-title"><?php echo e(trans_choice('words.Client', 2)); ?> </h3>
            <?php endif; ?>
        </div>
        <div class="col-md-7 page-action text-right">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add_clients')): ?>
                <a href="<?php echo e(route('clients.create')); ?>" class="btn btn-primary btn-sm"> <i class="glyphicon glyphicon-plus-sign"></i> <?php echo app('translator')->getFromJson('words.Create'); ?></a>
            <?php endif; ?>
        </div>
    </div>

    <div class="result-set">
        <table class="table table-bordered table-hover dataTable nowrap" id="data-table">
            <thead>
            <tr>
                <th><?php echo app('translator')->getFromJson('words.Id'); ?></th>
                <th><?php echo app('translator')->getFromJson('words.Identification'); ?></th>
                <th><?php echo app('translator')->getFromJson('words.Name'); ?></th>
                <th><?php echo app('translator')->getFromJson('words.Phone'); ?></th>
                <th><?php echo app('translator')->getFromJson('words.Email'); ?></th>
                <th><?php echo app('translator')->getFromJson('words.CellPhone'); ?></th>
                <th><?php echo app('translator')->getFromJson('words.CreatedAt'); ?></th>
                <th><?php echo app('translator')->getFromJson('words.UpdatedAt'); ?></th>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_clients', 'delete_clients')): ?>
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
                {data: 'identification'},
                {data: 'user.name'},
                {data: 'phone'},
                {data: 'user.email'},
                {data: 'cell_phone'},
                {data: 'created_at'},
                {data: 'updated_at'},
            ];

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_clients', 'delete_clients')): ?>
                <?php if(isset($companies)): ?>
                    dataTableObject.ajax = {url: "<?php echo e(route('datatable', ['model' => 'Client', 'whereHas' => 'user.companies,slug,'.$companies->slug, 'entity' => 'clients', 'identificador' => 'slug', 'relations' => 'user'])); ?>"};
                <?php else: ?>
                    dataTableObject.ajax = {url: "<?php echo e(route('datatable', ['model' => 'Client', 'whereHas' => 'none', 'entity' => 'clients', 'identificador' => 'slug', 'relations' => 'user'])); ?>"};
                <?php endif; ?>

                columns.push({data: 'actions', className: 'text-center wCellActions', orderable: false},)
                dataTableObject.columnDefs = [formatDateTable([-2, -3])];
            <?php else: ?>
                <?php if(isset($companies)): ?>
                    dataTableObject.ajax = {url: "<?php echo e(route('datatable', ['model' => 'Client', 'whereHas' => 'user.companies,slug,'.$companies->slug, 'relations' => 'user'])); ?>"};
                <?php else: ?>
                    dataTableObject.ajax = {url: "<?php echo e(route('datatable', ['model' => 'Client', 'whereHas' => 'none', 'relations' => 'user'])); ?>"};
                <?php endif; ?>

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