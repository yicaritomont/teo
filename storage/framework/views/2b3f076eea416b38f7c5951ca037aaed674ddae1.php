<?php $__env->startSection('title', trans_choice('words.Inspector',2).', '); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-5">

            <?php if(isset($companies)): ?>
                <h3 class="modal-title"><?php echo e(trans_choice('words.Inspector', 2)); ?> <?php echo app('translator')->getFromJson('words.Of'); ?> <?php echo e($companies->user->name); ?></h3>
            <?php else: ?>
                <h3 class="modal-title"> <?php echo e(trans_choice('words.Inspector', 2)); ?></h3>
            <?php endif; ?>
        </div>
        <div class="col-md-7 page-action text-right">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add_inspectors')): ?>
                <a href="<?php echo e(route('inspectors.create')); ?>" class="btn btn-primary btn-sm"> <i class="glyphicon glyphicon-plus-sign"></i><?php echo app('translator')->getFromJson('words.Create'); ?></a>
            <?php endif; ?>
        </div>
    </div>

    <div class="result-set">
        <table class="table table-bordered table-hover dataTable nowrap" id="data-table">
            <thead>
            <tr>
                <th><?php echo app('translator')->getFromJson('words.Id'); ?></th>
                <th><?php echo app('translator')->getFromJson('words.Name'); ?></th>
                <th><?php echo app('translator')->getFromJson('words.Identification'); ?></th>
                <th><?php echo app('translator')->getFromJson('words.Phone'); ?></th>
                <th><?php echo app('translator')->getFromJson('words.Addres'); ?></th>
                <th><?php echo app('translator')->getFromJson('words.Email'); ?></th>
                <th><?php echo app('translator')->choice('words.Company',2); ?></th>
                <th><?php echo app('translator')->choice('words.Profession',2); ?></th>
                <th><?php echo app('translator')->choice('words.InspectorType',2); ?></th>
                <th><?php echo app('translator')->getFromJson('words.CreatedAt'); ?></th>
                <th><?php echo app('translator')->getFromJson('words.UpdatedAt'); ?></th>
                
                
                    <th class="text-center"><?php echo app('translator')->getFromJson('words.Actions'); ?></th>
                
                
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
                {data: 'identification'},
                {data: 'phone'},
                {data: 'addres'},
                {data: 'user.email'},
                {data: 'companies', orderable: false},
                {data: 'profession.name'},
                {data: 'inspector_type.name'},
                {data: 'created_at'},
                {data: 'updated_at'},
            ];

            //Columnas a ser modificadas
            dataTableObject.columnDefs = [
                {
                    //En la columna 6 (companies) se recorre el areglo y luego se muestran los nombres de cada posición
                    targets: 6,
                    render: function(data, type, row){
                        var res = [];
                        data.forEach(function(elem){
                            res.push(elem.user.name);
                        });

                        return res.join(', ');
                        /*return data.map(function(elem){
                            return elem.user.name;
                        }).join(", ");*/
                    }
                }
            ];

            <?php if(Gate::check('edit_inspectors') || Gate::check('delete_inspectors') || Gate::check('view_inspectoragendas') || Gate::check('view_inspectionappointments')): ?>
                <?php if(isset($companies)): ?>
                    dataTableObject.ajax = {url: "<?php echo e(route('datatable', ['model' => 'Inspector', 'whereHas' => 'user.companies,slug,'.$companies->slug, 'entity' => 'inspectors', 'identificador' => 'id', 'relations' => 'companies,profession,inspectorType,user,companies.user'])); ?>"};
                <?php else: ?>
                    dataTableObject.ajax = {url: "<?php echo e(route('datatable', ['model' => 'Inspector', 'whereHas' => 'none', 'entity' => 'inspectors', 'identificador' => 'id', 'relations' => 'companies,profession,inspectorType,user,companies.user'])); ?>"};
                <?php endif; ?>
            <?php else: ?>
                <?php if(isset($companies)): ?>
                    dataTableObject.ajax = {url: "<?php echo e(route('datatable', ['model' => 'Inspector', 'whereHas' => 'user.companies,slug,'.$companies->slug, 'relations' => 'companies,profession,inspectorType,user,companies.user'])); ?>"};
                <?php else: ?>
                    dataTableObject.ajax = {url: "<?php echo e(route('datatable', ['model' => 'Inspector', 'whereHas' => 'none', 'relations' => 'companies,profession,inspectorType,user,companies.user'])); ?>"};
                <?php endif; ?>
            <?php endif; ?>

            columns.push({data: 'actions', className: 'text-center wCellActions', orderable: false});
            dataTableObject.columns = columns;

            dataTableObject.columnDefs.push(
                {
                    //En la columna 11 (actions) se agrega el boton de ver inspector
                    targets: 11,
                    render: function(data, type, row){
                        var btn =   '<div class="dropdown" style="display:inline-block">\
                                        <button class="btn btn-xs btn-primary dropdown-toggle" type="button" title="Ver" id="watchMenu" data-toggle="dropdown">\
                                            <i class="fa fa-eye"></i>\
                                            \
                                        </button>\
                                        <ul class="dropdown-menu pull-right" aria-labelledby="watchMenu" style="text-align:right">\
                                            <li><a target="_blank" href="'+window.Laravel.url+'/validateInspector/'+row.id+'"><?php echo app('translator')->getFromJson("words.Whatch"); ?> <?php echo e(trans_choice("words.Inspector", 2)); ?></a></li>';

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_inspectoragendas')): ?>
                            btn +=  '<li>\
                                        <a target="_blank" href="'+window.Laravel.url+'/inspectoragendas?id='+row.id+'">\
                                            <?php echo app('translator')->getFromJson("words.Whatch"); ?> <?php echo app('translator')->choice("words.InspectorAgenda", 2); ?>\
                                        </a>\
                                    </li>';
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_inspectionappointments')): ?>
                            btn +=  '<li>\
                                        <a target="_blank" href="'+window.Laravel.url+'/inspectionappointments?id='+row.id+'">\
                                            <?php echo app('translator')->getFromJson("words.Whatch"); ?> <?php echo app('translator')->choice("words.Inspectionappointment", 2); ?>\
                                        </a>\
                                    </li>';
                        <?php endif; ?>

                        btn += '</ul></div>';

                        return data + btn;
                    }
                },
                formatDateTable([-2, -3])
            );

            dataTableObject.ajax.type = 'POST';
            dataTableObject.ajax.data = {_token: window.Laravel.csrfToken};

            var table = $('.dataTable').DataTable(dataTableObject);
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>