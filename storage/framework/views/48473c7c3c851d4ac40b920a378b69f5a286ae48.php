<?php $__env->startSection('title', trans_choice('words.Headquarters', 1)); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-5">
            <h3 class="modal-title"> <?php echo app('translator')->choice('words.Headquarters', 2); ?> </h3>
        </div>
        <div class="col-md-7 page-action text-right">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_headquarters')): ?>
                <a href="<?php echo e(route('headquarters.create')); ?>" class="btn btn-primary btn-sm"> <i class="glyphicon glyphicon-plus-sign"></i> <?php echo app('translator')->getFromJson('words.Create'); ?></a>
            <?php endif; ?>
        </div>
    </div>

    <div class="result-set">
        <table class="table table-bordered table-hover dataTable nowrap" id="data-table">
            <thead>
            <tr>
                <th><?php echo app('translator')->getFromJson('words.Id'); ?></th>
                <th><?php echo app('translator')->getFromJson('words.Name'); ?></th>
                <th><?php echo app('translator')->choice('words.Client', 1); ?></th>
                <th><?php echo app('translator')->getFromJson('words.Address'); ?></th>
                <th><?php echo app('translator')->getFromJson('words.CreatedAt'); ?></th>
                <th><?php echo app('translator')->getFromJson('words.UpdatedAt'); ?></th>
                <th class="text-center"><?php echo app('translator')->getFromJson('words.Actions'); ?></th>
            </tr>
            </thead>
        </table>

    </div>

    <div class="row" style="padding: 10px 0">
        <div class="col-sm-12">
            <div id="map" style="//border: 1px solid #d3d3d3;"></div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>  
        
        $(document).ready(function() {

            //Se definen las columnas (Sin actions)
            var columns = [
                {data: 'id'},
                {data: 'name'},
                {data: 'client.user.name'},
                {data: 'address'},
                {data: 'created_at'},
                {data: 'updated_at'},
                {data: 'actions', className: 'text-center wCellActions', orderable: false},
            ];

            dataTableObject.columnDefs = [formatDateTable([-2, -3])];

            dataTableObject.columnDefs.push({
                //En la columna 6 (actions) se agregan nuevo boton
                targets: 6,
                render: function(data, type, row){

                    btn = '<button type="button" class="btn-delete btn btn-xs btn-primary" title="<?php echo app('translator')->getFromJson("words.Whatch"); ?>" onclick="VerMapa('+row.id+')">\
                        <i class="fa fa-eye"></i>\
                    </button>';

                    return data + btn;
                }
            });

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_headquarters', 'delete_headquarters')): ?>
                <?php if(isset($clientAuth)): ?>
                    dataTableObject.ajax = {url: "<?php echo e(route('datatable', ['model' => 'Headquarters', 'whereHas' => 'client,slug,'.$clientAuth->slug, 'entity' => 'headquarters', 'identificador' => 'slug', 'relations' => 'cities,client,client.user'])); ?>"};
                <?php else: ?>    
                    dataTableObject.ajax = {url: "<?php echo e(route('datatable', ['model' => 'Headquarters', 'whereHas' => 'none', 'entity' => 'headquarters', 'identificador' => 'slug', 'relations' => 'cities,client,client.user'])); ?>"};
                <?php endif; ?>
            <?php else: ?>
                <?php if(isset($clientAuth)): ?>
                    dataTableObject.ajax = {url: "<?php echo e(route('datatable', ['model' => 'Headquarters', 'whereHas' => 'client,slug,'.$clientAuth->slug, 'relations' => 'cities,client,client.user'])); ?>"};
                <?php else: ?>    
                    dataTableObject.ajax = {url: "<?php echo e(route('datatable', ['model' => 'Headquarters', 'whereHas' => 'none', 'relations' => 'cities,client,client.user'])); ?>"};
                <?php endif; ?>
            <?php endif; ?>
            
            dataTableObject.ajax.type = 'POST';
            dataTableObject.ajax.data = {_token: window.Laravel.csrfToken};
            dataTableObject.columns = columns;

            table = $('.dataTable').DataTable(dataTableObject);
        });
    </script>

    <?php echo $__env->make('shared._mapIndex', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>