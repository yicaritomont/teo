<?php $__env->startSection('title', trans_choice('words.InspectorAgenda', 1)); ?>

<?php $__env->startSection('content'); ?>
    <div class="msgAlert"></div>
        
    <div class="row">
        <div class="col-md-12 col-lg-8 col-lg-offset-2">

            <div class="inputs-header">
                <?php if(auth()->user()->hasRole('Admin') && !isset($inspector)): ?>
                    <?php echo Form::select('citas-compania',$companies, null, ['class' => 'input-body select2 form-control', 'id' => 'agenda-compania', 'placeholder' => 'Compañias']); ?>

                <?php endif; ?>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">              
                    <div class="row">
                        <div class="col-md-12">
                            <?php if(isset($inspector)): ?>
                                <h3 class="modal-title"><?php echo e(count($inspector->inspector_agendas)); ?> <?php echo e(trans_choice('words.InspectorAgenda', count($inspector->inspector_agendas))); ?> <?php echo e($inspector->user->name); ?>  </h3>
                            <?php elseif(isset($company)): ?>
                                <h3 class="modal-title"><?php echo app('translator')->choice('words.InspectorAgenda', 2); ?></h3>
                            <?php else: ?>
                                <h3 class="modal-title"><?php echo app('translator')->choice('words.InspectorAgenda', 2); ?> </h3>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add_inspectoragendas')): ?>
        <!-- Modal Crear -->
        <div class="modal fade" id="modalCreate" role="dialog">
            <div class="modal-dialog">
        
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="modal-title text-center"><?php echo app('translator')->getFromJson('words.Create'); ?></h3>
                    </div>
                    <div class="modal-body">
                        <div class="msgError"></div>
                        <?php echo Form::open(['route' => ['inspectoragendas.store'], 'class' => 'formCalendar', 'id' => 'formCreateAgenda', 'data-modal'=>'#modalCreate']); ?>

                            <?php echo $__env->make('inspector_agenda._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <!-- Submit Form Button -->
                            <?php echo Form::submit(trans('words.Create'), ['class' => 'btn-body']); ?>

                        <?php echo Form::close(); ?>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->getFromJson('words.Close'); ?></button>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- Modal Editar y Eliminar -->
    <div class="modal fade" id="modalEditDel" role="dialog">
        <div class="modal-dialog">
    
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title text-center"><?php echo app('translator')->getFromJson('words.WhatYouLike'); ?></h3>
                </div>
                <div class="modal-body">
                    <div class="msgError"></div>

                    <div class="content-btn">
                        <button data-toggle="#showAgenda" class="btn btn-primary showCalendar"><?php echo app('translator')->getFromJson("words.Watch"); ?></button>
                        

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete_inspectoragendas')): ?>
                            <form method="POST" id="deleteAgenda" class="formCalendar" data-modal="#modalEditDel" style="display: inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="button" onclick="confirmModal('#deleteAgenda', '<?php echo e(trans('words.DeleteMessage')); ?>', 'warning')" class="btn btn-danger" id=""><?php echo app('translator')->getFromJson('words.Delete'); ?></button>
                            </form>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_inspectoragendas')): ?>
                            <button data-toggle="#editAgenda" class="btn btn-primary editCalendar"><?php echo app('translator')->getFromJson("words.Edit"); ?></button>
                            
                        <?php endif; ?>

                    </div>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_inspectoragendas')): ?>
                        <?php echo Form::open(['method' => 'PUT', 'class' => 'formCalendar formSlide', 'id' => 'editAgenda', 'data-modal'=>'#modalEditDel', 'style' => 'display:none']); ?>

                            <?php echo $__env->make('inspector_agenda._form', ['edit' => 'edit-'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <!-- Submit Form Button -->                        
                            <?php echo Form::submit(trans('words.Edit'), ['class' => 'btn btn-primary btn-block']); ?>

                        <?php echo Form::close(); ?>

                    <?php endif; ?>

                    <div class="formSlide" id="showAgenda" style="display:none">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center active" colspan="2" style="font-size:2em"><?php echo app('translator')->getFromJson('words.AgendaInformation'); ?></th>
                                </tr>
                            </thead>
                            <tr>
                                <th><?php echo app('translator')->getFromJson('words.StartDate'); ?>: </th>
                                <td id="cell-start_date"></td>
                            </tr>
                            <tr>
                                <th><?php echo app('translator')->getFromJson('words.EndDate'); ?>: </th>
                                <td id="cell-end_date"></td>
                            </tr>
                            <tr>
                                <th><?php echo app('translator')->choice('words.Inspector', 1); ?>: </th>
                                <td id="cell-inspector"></td>
                            </tr>
                            <tr>
                                <th><?php echo app('translator')->getFromJson('words.Country'); ?>: </th>
                                <td id="cell-country"></td>
                            </tr>
                            <tr>
                                <th><?php echo app('translator')->getFromJson('words.City'); ?>: </th>
                                <td id="cell-city"></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button style="display:inline" type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->getFromJson('words.Close'); ?></button>
                </div>
            </div>
      
        </div>
    </div>

    
    
    
    <input type="hidden" id="url" value="<?php echo e(route('inspectoragendas.index')); ?>">
    <input type="hidden" id="_token" value="<?php echo e(csrf_token()); ?>">
    <input type="hidden" id="selectOption" value="<?php echo e(trans('words.ChooseOption')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <script type="text/javascript" >

        //Se define un objeto que contenga las caracteristicas particulares de cada calendario y luego se definen
        var calendarObj = {};
        calendarObj.customButtons = null;

        <?php if(isset($inspector)): ?>
            calendarObj.events = {url: $('#url').val()+'/events/inspector/<?php echo e($inspector->id); ?>'};
        <?php elseif(isset($company)): ?>
            calendarObj.events = {url: $('#url').val()+'/events/company/<?php echo e($company->id); ?>'};
        <?php else: ?>
            
            calendarObj.events = [];
        <?php endif; ?>
        
        calendarObj.events.type = 'POST';
        calendarObj.events.data = { _token: window.Laravel.csrfToken };

        calendarObj.eventClick = function(event)
        {
            //Cambiar el action del formulario
            $('#deleteAgenda').attr('action', $('#url').val()+'/'+event.slug);
            $('.showCalendar').attr('data-route', $('#url').val()+'/'+event.slug);
            $('.editCalendar').attr('data-route', $('#url').val()+'/'+event.slug+'/edit');

            //Se limpia las alertas
            $('.msgError').html('');

            //Limpiar las validaciones
            $('.form-group').removeClass('has-error');
            $('.errors').empty();

            //Ocultar los formularios desplegables
            $(".formSlide").hide();

            $('#modalEditDel').modal('show');
        };

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add_inspectoragendas')): ?>
            calendarObj.select = function(startDate, endDate, jsEvent, view)
            {
                //Separar en fecha[0] y hora[1]
                var start = startDate.format().split('T');

                //Como al seleccionar los días la fecha final al día le agrega uno de más, hay que hacer la conversión
                var ed = new Date(endDate.format());  
                ed = ed.getFullYear()+'-'+ ("0" + (ed.getMonth() + 1)).slice(-2) +'-'+("0" + ed.getDate()).slice(-2);
                
                //Validar se se secciono un rango de dias, de lo contrario pase al evento dayClick
                if(start != ed)
                {
                    limpiarForm(start[0], ed, '#formCreateAgenda', '');
                    $('#modalCreate').modal('show');
                }
            };
        
            calendarObj.dayClick = function(date, jsEvent, view)
            {
                limpiarForm(date.format(), null, '#formCreateAgenda', '');
                $('#modalCreate').modal('show');
            };

            calendarObj.customButtons = {
                createButton: {
                    text: '<?php echo e(trans('words.Create')); ?>',
                    click: function() {
                        limpiarForm(null, null, '#formCreateAgenda', '');
                        $('#modalCreate').modal('show');
                    }
                }
            };
        <?php endif; ?>

        
        
        calendarObj.eventDrop = function(calEvent, delta, revertFunc)
        {
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_inspectoragendas')): ?>
                var end = calEvent.end.format().split('T');

                $('#editAgenda').attr('action', $('#url').val()+'/'+calEvent.slug);
                $('#modalEditDel #start_date').val(calEvent.start.format());
                $('#modalEditDel #end_date').val(end[0]);
                $('#modalEditDel #edit-inspector_id').val(calEvent.inspector_id);

                confirmModal('#editAgenda', '<?php echo e(trans('words.UpdateMessage')); ?>', 'question', revertFunc);

            <?php else: ?>

                swal('Error','No puede realizar esta acción, no tienes permisos','error');
                revertFunc();

            <?php endif; ?>
        };

        //Se llama la función que inicializará el calendario de acuerdo al objeto enviado
        calendar(calendarObj);

    </script>    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>