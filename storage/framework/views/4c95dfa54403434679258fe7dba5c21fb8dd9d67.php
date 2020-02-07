<?php $__env->startSection('title', trans('words.ManageUsers')); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-5">            

            <?php if(isset($companies)): ?>
                <h3 class="modal-title"><?php echo e(str_plural(trans('words.User'), 2)); ?> <?php echo app('translator')->getFromJson('words.Of'); ?> <?php echo e($companies->user->name); ?>  </h3>
            <?php else: ?>
                <h3 class="modal-title"> <?php echo e(str_plural(trans('words.User'), 2)); ?> </h3>
            <?php endif; ?>
        </div>
        <div class="col-md-7 page-action text-right">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add_users')): ?>
                <a href="<?php echo e(route('users.create')); ?>" class="btn btn-primary btn-sm"> <i class="glyphicon glyphicon-plus-sign"></i> <?php echo app('translator')->getFromJson('words.Create'); ?></a>
            <?php endif; ?>
        </div>
    </div>

    <div class="result-set">
        <table class="table table-bordered table-hover dataTable nowrap" id="data-table">
            <thead>
            <tr>
                <th><?php echo app('translator')->getFromJson('words.Id'); ?></th>
                <th><?php echo app('translator')->getFromJson('words.Name'); ?></th>
                <th><?php echo app('translator')->getFromJson('words.Email'); ?></th>
                <th><?php echo app('translator')->choice('words.Company', 2); ?></th>
                <th><?php echo app('translator')->getFromJson('words.Roles'); ?></th>
                <th><?php echo app('translator')->getFromJson('words.CreatedAt'); ?></th>
                <th><?php echo app('translator')->getFromJson('words.UpdatedAt'); ?></th> 
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_users', 'delete_users')): ?>
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
                {data: 'email'},
                {data: 'companies', orderable: false},
                {data: 'roles', orderable: false},
                {data: 'created_at'},
                {data: 'updated_at'},
            ];

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_users', 'delete_users')): ?>
                <?php if(isset($companies)): ?>
                    dataTableObject.ajax = {url: "<?php echo e(route('datatable', ['model' => 'User', 'whereHas' => 'companies,slug,'.$companies->slug, 'entity' => 'users', 'identificador' => 'id', 'relations' => 'roles,companies,companies.user'])); ?>"};
                <?php else: ?>
                    dataTableObject.ajax = {url: "<?php echo e(route('datatable', ['model' => 'User', 'whereHas' => 'none', 'entity' => 'users', 'identificador' => 'id', 'relations' => 'roles,companies,companies.user'])); ?>"};
                <?php endif; ?>

                columns.push({data: 'actions', className: 'text-center wCellActions', orderable: false},)
                dataTableObject.columnDefs = [formatDateTable([-2, -3])];
            <?php else: ?>
                <?php if(isset($companies)): ?>
                    dataTableObject.ajax = {url: "<?php echo e(route('datatable', ['model' => 'User', 'whereHas' => 'companies,'.$companies->slug, 'relations' => 'roles,companies,companies.user'])); ?>"};
                <?php else: ?>
                    dataTableObject.ajax = {url: "<?php echo e(route('datatable', ['model' => 'User', 'whereHas' => 'none', 'relations' => 'roles,companies,companies.user'])); ?>"};
                <?php endif; ?>

                dataTableObject.columnDefs = [formatDateTable([-1, -2])];
            <?php endif; ?>
            
            dataTableObject.columns = columns;

            dataTableObject.columnDefs.push(
                {
                    //En la columna 4 (roles) se recorre el areglo y luego se muestran los nombres de cada posición
                    targets: 4,
                    render: function(data, type, row){
                        var res = [];
                        data.forEach(function(elem){
                            res.push(elem.name);
                        });

                        return res.join(', ');
                    }
                },{
                    //En la columna 3 (companies) se recorre el areglo y luego se muestran los nombres de cada posición
                    targets: 3,
                    render: function(data, type, row){
                        var res = [];
                        data.forEach(function(elem){
                            res.push(elem.user.name);
                        });

                        return res.join(', ');
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