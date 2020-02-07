<?php $__env->startSection('title', trans_choice('words.Company', 2)); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xs-6">
            <h3 class="modal-title"> <?php echo app('translator')->choice('words.Company', 2); ?> </h3>
        </div>
        <div class="col-xs-6 page-action text-right">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add_companies')): ?>
                <a href="<?php echo e(route('companies.create')); ?>" class="btn btn-primary btn-sm"> <i class="glyphicon glyphicon-plus-sign"></i> <?php echo app('translator')->getFromJson('words.Create'); ?></a>
            <?php endif; ?>
        </div>
    </div>

    <div class="result-set">
        <table id="dataTable" class="table table-bordered table-hover dataTable nowrap">
            <thead>
            <tr>
                <th><?php echo app('translator')->getFromJson('words.Id'); ?></th>
                <th><?php echo app('translator')->getFromJson('words.Name'); ?></th>
                <th><?php echo app('translator')->getFromJson('words.Address'); ?></th>
                <th><?php echo app('translator')->getFromJson('words.Phone'); ?></th>
                <th><?php echo app('translator')->getFromJson('words.Email'); ?></th>
                <th><?php echo app('translator')->getFromJson('words.Activity'); ?></th>
                <th><?php echo app('translator')->getFromJson('words.CreatedAt'); ?></th>
                <th><?php echo app('translator')->getFromJson('words.UpdatedAt'); ?></th>
                <?php if(Gate::check('edit_companies') || Gate::check('delete_companies') || Gate::check('view_users') || Gate::check('view_inspectors')): ?>
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
                {data: 'user.name'},
                {data: 'address'},
                {data: 'phone'},
                {data: 'user.email'},
                {data: 'activity'},
                {data: 'created_at'},
                {data: 'updated_at'},
            ];

            <?php if(Gate::check('edit_companies') || Gate::check('delete_companies') || Gate::check('view_users') || Gate::check('view_inspectors')): ?>
                dataTableObject.ajax = {url: "<?php echo e(route('datatable', ['model' => 'Company', 'whereHas' => 'none', 'entity' => 'companies', 'identificador' => 'slug', 'relations' => 'user'])); ?>"};

                columns.push({data: 'actions', className: 'text-center', orderable: false},)
                dataTableObject.columnDefs = [formatDateTable([-2, -3])];
            <?php else: ?>
                dataTableObject.ajax = {url: "<?php echo e(route('datatable', ['model' => 'Company', 'whereHas' => 'none', 'relations' => 'user'])); ?>"};
                dataTableObject.columnDefs = [formatDateTable([-1, -2])];
            <?php endif; ?>

            dataTableObject.columns = columns;

            <?php if(Gate::check('view_users') || Gate::check('view_inspectors')): ?>
                dataTableObject.columnDefs.push({
                    //En la columna 8 (actions) se agregan nuevos botones
                    targets: 8,
                    render: function(data, type, row){
                        var btn =   '<div class="dropdown" style="display:inline-block">\
                                        <button class="btn btn-xs btn-primary dropdown-toggle" title="Ver" type="button" id="watchMenu" data-toggle="dropdown">\
                                            <i class="fa fa-eye"></i>\
                                        </button>\
                                        <ul class="dropdown-menu pull-right" aria-labelledby="watchMenu" style="text-align:right">';

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_users')): ?>
                            btn +=  '<li>\
                                        <a target="_blank" href="'+window.Laravel.url+'/users?id='+row.slug+'">\
                                            <?php echo app('translator')->getFromJson("words.Whatch"); ?> <?php echo app('translator')->getFromJson("words.User"); ?>\
                                        </a>\
                                    </li>';
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_inspectors')): ?>
                            btn +=  '<li>\
                                        <a target="_blank" href="'+window.Laravel.url+'/inspectors?id='+row.slug+'">\
                                            <?php echo app('translator')->getFromJson("words.Whatch"); ?> <?php echo app('translator')->choice("words.Inspector", 2); ?>\
                                        </a>\
                                    </li>';
                        <?php endif; ?>

                        btn += '</ul></div>';

                        return data + btn;
                    }
                });
            <?php endif; ?>

            dataTableObject.ajax.type = 'POST';
            dataTableObject.ajax.data = {_token: window.Laravel.csrfToken};

            var table = $('.dataTable').DataTable(dataTableObject);
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>