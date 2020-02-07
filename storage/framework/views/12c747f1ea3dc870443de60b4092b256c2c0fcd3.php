<?php $__env->startSection('title', trans_choice('words.Profession',2).', '); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-5">
            <h3 class="modal-title"> <?php echo e(trans_choice('words.Profession', 2)); ?></h3>
        </div>
        <div class="col-md-7 page-action text-right">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add_professions')): ?>
                <a href="<?php echo e(route('professions.create')); ?>" class="btn btn-primary btn-sm"> <i class="glyphicon glyphicon-plus-sign"></i><?php echo app('translator')->getFromJson('words.Create'); ?></a>
            <?php endif; ?>
        </div>
    </div>

    <div class="result-set">
        <table class="table table-bordered table-hover dataTable nowrap" id="data-table">
            <thead>
            <tr>
                <th><?php echo app('translator')->getFromJson('words.Id'); ?></th>
                <th><?php echo app('translator')->getFromJson('words.Name'); ?></th>
                <th><?php echo app('translator')->getFromJson('words.CreatedAt'); ?></th>
                <th><?php echo app('translator')->getFromJson('words.UpdatedAt'); ?></th>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_professions','delete_professions')): ?>
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
                {data: 'created_at'},
                {data: 'updated_at'},
            ];

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_professions','delete_professions')): ?>
                dataTableObject.ajax = "<?php echo e(route('datatable', ['model' => 'Profession', 'company' => 'none', 'entity' => 'professions', 'identificador' => 'id', 'relations' => 'none'])); ?>";
                
                columns.push({data: 'actions', className: 'text-center w1em'},)
                dataTableObject.columnDefs = [setDataTable([-2, -3])];     
            <?php else: ?>
                dataTableObject.ajax = "<?php echo e(route('datatable', ['model' => 'Profession', 'company' => 'none'])); ?>";
                dataTableObject.columnDefs = [setDataTable([-1, -2])];
            <?php endif; ?>

            dataTableObject.columns = columns;

            var table = $('.dataTable').DataTable(dataTableObject);
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>