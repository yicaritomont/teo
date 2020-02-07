<?php $__env->startSection('title', trans('words.Create').' '.trans('words.ManageMenu')); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-5">
            <h3 class="modal-title"> <?php echo e(str_plural(trans('words.ManageMenu'), 2)); ?> </h3>
        </div>
        <div class="col-md-7 page-action text-right">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add_menus')): ?>
                <a href="<?php echo e(route('menus.create')); ?>" class="btn btn-primary btn-sm"> <i class="glyphicon glyphicon-plus-sign"></i> <?php echo app('translator')->getFromJson('words.Create'); ?></a>
            <?php endif; ?>
        </div>
    </div>

    <div class="result-set">
        <table class="table table-bordered table-hover dataTable nowrap" id="data-table">
            <thead>
            <tr>
                <th><?php echo app('translator')->getFromJson('words.Id'); ?></th>
                <th><?php echo app('translator')->getFromJson('words.Name'); ?></th>
                <th><?php echo app('translator')->getFromJson('words.Url'); ?></th>
                <th><?php echo app('translator')->getFromJson('words.Menu'); ?></th>
                <th><?php echo app('translator')->getFromJson('words.CreatedAt'); ?></th>
                <th><?php echo app('translator')->getFromJson('words.UpdatedAt'); ?></th>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_menus', 'delete_menus')): ?>
                    <th class="text-center">Actions</th>
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
                {data: 'url'},
                {data: 'menu.name'},
                {data: 'created_at'},
                {data: 'updated_at'},
            ];

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_menus', 'delete_menus')): ?>
                
                dataTableObject.ajax = {url: "<?php echo e(route('datatable', ['model' => 'Menu', 'company' => 'none', 'entity' => 'menus', 'identificador' => 'id', 'relations' => 'menu'])); ?>"};
                columns.push({data: 'actions', className: 'text-center w1em'},)
                dataTableObject.columnDefs = [formatDateTable([-2, -3])];
            <?php else: ?>
                dataTableObject.ajax = {url: "<?php echo e(route('datatable', ['model' => 'Menu', 'company' => 'none', 'relations' => 'menu'])); ?>"};
                dataTableObject.columnDefs = [formatDateTable([-1, -2])];
            <?php endif; ?>

            dataTableObject.columns = columns;

            dataTableObject.columnDefs.push(
                {
                    //En la columna 2 (url) se agrega una condición
                    targets: 2,
                    render: function(data, type, row)
                    {
                        // Se comprueba si es menu desplegable
                        var res = (data) ? data : '<?php echo app('translator')->getFromJson("words.DropdownMenu"); ?>';

                        return res;
                    }
                },
                {
                    //En la columna 3 (menu) se agrega una condición
                    targets: 3,
                    render: function(data, type, row)
                    {
                        // Se comprueba si el menu es de primer nivel
                        var res = (row.id == row.menu_id) ? '<?php echo app('translator')->getFromJson("words.MainMenu"); ?>' : data;

                        return res;
                    }
                }     
            );
            
            dataTableObject.ajax.type = 'POST';
            dataTableObject.ajax.data = {_token: window.Laravel.csrfToken};

            var table = $('.dataTable').DataTable(dataTableObject);
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>