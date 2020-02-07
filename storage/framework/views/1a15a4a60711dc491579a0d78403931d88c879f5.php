<?php $__env->startSection('title', trans_choice('words.Inspectionappointment', 1)); ?>

<?php $__env->startSection('content'); ?>

    <div class="msgAlert"></div>    
    
    <div class="row">
        <div class="col-xs-12 col-lg-8 col-lg-offset-2">

            <div class="inputs-header">
                <?php if(auth()->user()->hasRole('Admin') && !isset($inspector)): ?>
                    <?php echo Form::select('citas-compania',$companies, null, ['class' => 'input-body select2 form-control', 'id' => 'citas-compania', 'placeholder' => 'Compañias']); ?>

                <?php endif; ?>
                <?php if( !isset($inspector) ): ?>
                    <?php echo Form::select('subtypes',$subtypes, null, ['class' => 'input-body select2 form-control', 'id' => 'citas-subtipo', 'placeholder' => 'Agendas disponibles por', (auth()->user()->hasRole('Admin')) ? 'disabled' : '']); ?>

                <?php endif; ?>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php if(isset($inspector)): ?>
                        <h3 class="modal-title inline-block"><?php echo e(trans_choice('words.Inspectionappointment', 2)); ?>  <?php echo app('translator')->getFromJson('words.Of'); ?> <?php echo e($inspector->user->name); ?>  </h3>
                    <?php else: ?>
                        <h3 class="modal-title inline-block"><?php echo app('translator')->choice('words.Inspectionappointment', 2); ?></h3>
                    <?php endif; ?>
                    <div class="loading" id="appointment_loading"></div>
                </div>
                <div class="panel-body">
                    <div id="calendar"></div>
                </div>        
            </div>

            <ul style="list-style-type:none">
                <?php $__currentLoopData = $appointment_states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><span class="glyphicon glyphicon-bookmark" style="color:<?php echo e($state->color); ?>"></span> <?php echo app('translator')->getFromJson('words.'.$state->name); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>  
        </div>
    </div>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add_inspectionappointments')): ?>
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

                        <?php echo Form::open(['route' => ['inspectionappointments.store'], 'class' => 'formCalendar', 'id' => 'formCreateAppointmet', 'data-modal'=>'#modalCreate']); ?>

                            <?php echo $__env->make('inspection_appointment._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

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
                        <button data-toggle="#showCita" class="btn btn-primary showCalendar"><?php echo app('translator')->getFromJson("words.Watch"); ?></button>
                        
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete_inspectionappointments')): ?>
                            <form method="POST" id="deleteAppointment" class="formCalendar" data-modal="#modalEditDel" style="display: inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="button" onclick="confirmModal('#deleteAppointment', '<?php echo e(trans('words.DeleteMessage')); ?>', 'warning')" class="btn btn-danger" id=""><?php echo app('translator')->getFromJson('words.Delete'); ?></button>
                            </form>
                        <?php endif; ?>

                        <div class="btns"></div>
                    </div>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_inspectionappointments')): ?>
                        <?php echo Form::open(['method' => 'PUT', 'class' => 'formCalendar formSlide', 'id' => 'editAppointment', 'data-modal'=>'#modalEditDel', 'style' => 'display:none']); ?>


                            <div class="form-group">
                                <?php echo Form::label('start_date', trans('words.StartDate').' - '); ?>

                                <?php echo Form::label('end_date', trans('words.EndDate')); ?>

                                
                                <div class="input-group date-range-inputs">
                                    <input type="text" class="form-control input-date" name="start_date" id="start_date" autocomplete="off">
                                    <span class="input-group-addon"><?php echo app('translator')->getFromJson('words.To'); ?></span>
                                    <input type="text" class="form-control input-date" name="end_date" id="end_date" autocomplete="off">
                                </div>
                                <div class="errors"></div>
                            </div>

                            <!-- Submit Form Button -->                        
                            <?php echo Form::submit(trans('words.Edit'), ['class' => 'btn btn-primary btn-block']); ?>

                        <?php echo Form::close(); ?>


                        <?php echo Form::open(['method' => 'PUT', 'class' => 'formCalendar formSlide', 'id' => 'completeAppointment', 'data-modal'=>'#modalEditDel', 'style' => 'display:none']); ?>


                            <!-- Range Date of Appointment -->
                            <div class="form-group">
                                <?php echo Form::label('start_date', trans('words.StartDate').' - '); ?>

                                <?php echo Form::label('end_date', trans('words.EndDate')); ?>

                                
                                <div class="input-group date-range-inputs">
                                    <input type="text" class="form-control input-date" name="start_date" id="start_date" autocomplete="off">
                                    <span class="input-group-addon"><?php echo app('translator')->getFromJson('words.To'); ?></span>
                                    <input type="text" class="form-control input-date" name="end_date" id="end_date" autocomplete="off">
                                </div>
                                <div class="errors"></div>
                            </div>
                            <div class="form-group <?php if($errors->has('inspector_id')): ?> has-error <?php endif; ?>">
                                <?php echo Form::label('inspector_id', trans_choice("words.Inspector", 1)); ?>

                                <div class="loading inspectorField_loading"></div>
                                <?php echo Form::select('inspector_id', isset($inspectors) ? $inspectors : [], isset($agenda) ? $agenda['inspector_id'] : null, ['class' => 'input-body select2 form-control inspectorField', 'placeholder'=>trans('words.ChooseOption')]); ?>

                                <div class="errors"></div>
                            </div>
                            <!-- Submit Form Button -->                        
                            <?php echo Form::submit(trans('words.Confirm'), ['class' => 'btn btn-primary btn-block']); ?>

                        <?php echo Form::close(); ?>


                    <?php endif; ?>

                    <div class="formSlide" id="showCita" style="display:none">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center active" colspan="2" style="font-size:2em"><?php echo app('translator')->getFromJson('words.AppointmentInformation'); ?></th>
                                </tr>
                            </thead>
                            <tr>
                                <th><?php echo app('translator')->getFromJson('words.RequestDate'); ?>: </th>
                                <td id="cell-request_date"></td>
                            </tr>
                            <tr style="display:none">
                                <th><?php echo app('translator')->getFromJson('words.AssignmentDate'); ?>: </th>
                                <td id="cell-assignment_date"></td>
                            </tr>
                            <tr style="display:none">
                                <th><?php echo app('translator')->getFromJson('words.EstimatedStartDate'); ?>: </th>
                                <td id="cell-estimated_start_date"></td>
                            </tr>
                            <tr style="display:none">
                                <th><?php echo app('translator')->getFromJson('words.EstimatedEndDate'); ?>: </th>
                                <td id="cell-estimated_end_date"></td>
                            </tr>
                            <tr>
                                <th><?php echo app('translator')->choice('words.Inspector', 1); ?>: </th>
                                <td id="cell-inspector"></td>
                            </tr>
                            <tr>
                                <th><?php echo app('translator')->choice('words.InspectionType', 1); ?>: </th>
                                <td id="cell-inspectionType"></td>
                            </tr>
                            <tr>
                                <th><?php echo app('translator')->choice('words.InspectionSubtype', 1); ?>: </th>
                                <td id="cell-inspectionSubtype"></td>
                            </tr>
                            <tr>
                                <th><?php echo app('translator')->choice('words.Client', 1); ?>: </th>
                                <td id="cell-client"></td>
                            </tr>
                            <tr>
                                <th><?php echo app('translator')->choice('words.Headquarters', 1); ?>: </th>
                                <td id="cell-headquarters"></td>
                            </tr>
                            <tr>
                                <th><?php echo app('translator')->choice('words.Contract', 1); ?>: </th>
                                <td id="cell-contract"></td>
                            </tr>
                        </table>
                    </div>

                    <div class="text-center info"></div>
                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->getFromJson('words.Close'); ?></button>
                </div>
            </div>
      
        </div>
    </div>
    <input type="hidden" id="url" value="<?php echo e(route('inspectionappointments.index')); ?>">
    <input type="hidden" id="_token" value="<?php echo e(csrf_token()); ?>">
    <input type="hidden" id="selectOption" value="<?php echo e(trans('words.ChooseOption')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <script type="text/javascript">
    
        //Se define un objeto que contenga las caracteristicas particulares de cada calendario y luego se definen
        var calendarObj = {};
        calendarObj.customButtons = null;

        <?php if(isset($inspector)): ?>
            calendarObj.events = {url: $('#url').val()+'/events/inspector/<?php echo e($inspector->id); ?>'};
            ajax(
                window.Laravel.url+'/inspectoragendas/subtype',
                'POST',
                {_token: $('#_token').val(),
                subtype_id: <?php echo e($inspector->inspectorType->inspection_subtypes_id); ?>,
                inspector_id: <?php echo e($inspector->id); ?> },
                (res) => {
                    guiaAgendas = [];
                    $.each(res.agendas, function(key, value){
                        guiaAgendas.push(value);
                    });
                    
                    colorearAgendas();
                }
            );
        <?php elseif(isset($company)): ?>
            calendarObj.events = {url: $('#url').val()+'/events/company/<?php echo e($company->id); ?>'};
        <?php elseif(isset($clientAuth)): ?>
            calendarObj.events = {url: $('#url').val()+'/events/client/<?php echo e($clientAuth); ?>'};
        <?php else: ?>
            
            calendarObj.events = [];
        <?php endif; ?>

        calendarObj.events.type = 'POST';
        calendarObj.events.data = { _token: window.Laravel.csrfToken };

        

        calendarObj.eventClick = function(event)
        {
            // Vaciar el div de los mensajes
            $('.info').empty();

            $('.btns').empty();

            //Resetar y setear el action el formulario de completar si existe el elemento
            if($('#completeAppointment')[0])
            {
                $('#completeAppointment')[0].reset();
                $('#inspector_id').trigger('change');
                $('#completeAppointment').attr('action', $('#url').val()+'/'+event.id+'/complete');
            }

            //Cambiar el action del formulario
            $('#deleteAppointment').attr('action', $('#url').val()+'/'+event.id);
            $('.showCalendar').attr('data-route', $('#url').val()+'/'+event.id);
            
            if(event.appointment_states_id == 1){
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_inspectionappointments')): ?>
                    $('.btns').html('<button class="btn btn-info btn-form-slide" data-toggle="#completeAppointment"><?php echo app('translator')->getFromJson("words.Confirm"); ?></button>');

                    //Llene el select de inspectores
                    fillSelect(window.Laravel.url+'/headquarters/inspectors/'+event.id, '.inspectorField');
                <?php endif; ?>
            }else if(event.appointment_states_id == 2){
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_inspectionappointments')): ?>
                    $('.btns').html('<button data-toggle="#editAppointment" class="btn btn-primary editCalendar" data-route="'+$('#url').val()+'/'+event.id+'/edit'+'"><?php echo app('translator')->getFromJson("words.Edit"); ?></button>');
                <?php endif; ?>

                // Si hay preformato por el subtipo y la compañía de la cita
                if(event.hasPreformat == 1){
                    if(event.format_id){
                        if(event.format_status == 2){
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_formats')): ?>
                                $('.btns').append('<a target="_blank" class="btn btn-default btn-form-slide" data-toggle="#fillFormat" href="'+window.Laravel.url+'/formats/'+event.format_id+'/edit"><?php echo app('translator')->getFromJson("words.Whatch"); ?> <?php echo app('translator')->choice("words.Format", 1); ?></a>');
                            <?php endif; ?>
                        }else{
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_formats')): ?>
                                $('.btns').append('<a target="_blank" class="btn btn-default btn-form-slide" data-toggle="#fillFormat" href="'+window.Laravel.url+'/formats/'+event.format_id+'/edit"><?php echo app('translator')->getFromJson("words.Edit"); ?> <?php echo app('translator')->choice("words.Format", 1); ?></a>');
                            <?php endif; ?>
                        }
                    }else{
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add_formats')): ?>
                            $('.btns').append('<a target="_blank" class="btn btn-default btn-form-slide" data-toggle="#fillFormat" href="'+window.Laravel.url+'/formats/create?appointment='+event.id+'"><?php echo app('translator')->getFromJson("words.Fill"); ?> <?php echo app('translator')->choice("words.Format", 1); ?></a>');
                        <?php endif; ?>
                    }
                }else if(event.hasPreformat == 0){
                   $('.info').html('<span><?php echo app('translator')->getFromJson("words.PreformatNotFound"); ?></span>');
                }
            }else{
                $('.btns').html('');
            }

            //Se limpia las alertas
            $('.msgError').html('');

            //Limpiar las validaciones
            $('.form-group').removeClass('has-error');
            $('.errors').empty();

            //Ocultar los formularios desplegables
            $(".formSlide").hide();

            $('#modalEditDel').modal('show');
        };

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add_inspectionappointments')): ?>
            calendarObj.select = function(startDate, endDate, jsEvent, view)
            {
                
                //if($('.fc-day[data-date="'+date.format()+'"]').hasClass('bgEvent')){
                //Separar en fecha[0] y hora[1]
                var start = startDate.format().split('T');

                //Como al seleccionar los días la fecha final al día le agrega uno de más, hay que hacer la conversión
                var ed = new Date(endDate.format());
                ed = ed.getFullYear()+'-'+ ("0" + (ed.getMonth() + 1)).slice(-2) +'-'+("0" + ed.getDate()).slice(-2);

                //Validar se se secciono un rango de dias, de lo contrario pase al evento dayClick
                if(start != ed){
                    var filterDays = $('.fc-day').filter(function( index ){
                        return $(this).attr('data-date') >= start[0] && $(this).attr('data-date') <= ed && $(this).hasClass('bgEvent');
                    }).length;

                    var selectDays = $('.fc-day').filter(function( index ){
                        return $(this).attr('data-date') >= start[0] && $(this).attr('data-date') <= ed;
                    }).length;

                    if(filterDays == selectDays){
                        limpiarForm(start[0], ed, '#formCreateAppointmet', 'estimated_', '#inspection_subtype_id');
                        $('#modalCreate').modal('show');
                    }
                }
            };
            calendarObj.dayClick = function(date, jsEvent, view)
            {
                if($('.fc-day[data-date="'+date.format()+'"]').hasClass('bgEvent')){
                    limpiarForm(date.format(), null, '#formCreateAppointmet', 'estimated_', '#inspection_subtype_id');
                    $('#modalCreate').modal('show');
                }
            };

            calendarObj.customButtons = {
                createButton: {
                    text: '<?php echo e(trans('words.Create')); ?>',
                    click: function() {
                        limpiarForm(null, null, '#formCreateAppointmet', 'estimated_', '#inspection_subtype_id');
                        $('#modalCreate').modal('show');
                    }
                }
            };

        <?php endif; ?>
        
        calendarObj.eventDrop = function(calEvent, delta, revertFunc)
        {
            if(calEvent.inspector_id){
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_inspectionappointments')): ?>
                    var end = calEvent.end.format().split('T');

                    $('#editAppointment').attr('action', $('#url').val()+'/'+calEvent.id);
                    $('#modalEditDel #start_date').val(calEvent.start.format());
                    $('#modalEditDel #end_date').val(end[0]);
                    $('#modalEditDel #edit-inspector_id').val(calEvent.inspector_id);

                    confirmModal('#editAppointment', '<?php echo e(trans('words.UpdateMessage')); ?>', 'question', revertFunc);
                <?php else: ?>

                    swal('Error','<?php echo app('translator')->getFromJson("words.PermissionError"); ?>','error');
                    revertFunc();
                
                <?php endif; ?>
            }else{
                swal('Error', '<?php echo app('translator')->getFromJson("words.EditRequestedAppointment"); ?>', 'error');
                revertFunc();
            }
        };

        calendarObj.eventDragStart = function( event, jsEvent, ui, view )
        {
            if(event.appointment_states_id != 1){
                ajax(
                    window.Laravel.url+'/inspectoragendas/subtype',
                    'POST',
                    {_token: $('#_token').val(),
                    subtype_id: $('#subtypeFilter').val(),
                    company_id: $('#citas-compania').val(),
                    inspector_id: event.inspector_id},
                    (res) => {
                        if(res.msg){
                            $('.fc-day.bgEvent').removeClass('bgEvent');
                        }else{
                            guiaAgendas = [];
                            $.each(res.agendas, function(key, value){
                                guiaAgendas.push(value);
                            });
                            
                            colorearAgendas();
                        }
                    }
                );
            }
        };

        calendarObj.eventDragStop = function( event, jsEvent, ui, view )
        {
            if(event.appointment_states_id != 1){
                $('#citas-subtipo').trigger('change');
            }
        };

        //Se llama la función que inicializará el calendario de acuerdo al objeto enviado
        calendar(calendarObj);

    </script>   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>