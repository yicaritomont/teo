@extends('layouts.app')

@section('title', trans('words.Create').' '.trans('words.ManageMenu'))

@section('content')
    <div class="row">
        <div class="col-md-5">
            <h3 class="modal-title"> {{ str_plural(trans('words.ManageMenu'), 2) }} </h3>
        </div>
        <div class="col-md-7 page-action text-right">
            @can('add_menus')
                <a href="{{ route('menus.create') }}" class="btn btn-primary btn-sm"> <i class="glyphicon glyphicon-plus-sign"></i> @lang('words.Create')</a>
            @endcan
        </div>
    </div>

    <div class="result-set">
        <table class="table table-bordered table-hover dataTable nowrap" id="data-table">
            <thead>
            <tr>
                <th>@lang('words.Id')</th>
                <th>@lang('words.Name')</th>
                <th>@lang('words.Url')</th>
                <th>@lang('words.Menu')</th>
                <th>@lang('words.CreatedAt')</th>
                <th>@lang('words.UpdatedAt')</th>
                @can('edit_menus', 'delete_menus')
                    <th class="text-center">Actions</th>
                @endcan
            </tr>
            </thead>
        </table>
    </div>

@endsection

@section('scripts')
    <script>  
        
        $(document).ready(function() {

            //Se definen las columnas (Sin actions)
            var columns = [
                {data: 'id'},
                {data: 'name'},
                {data: 'url', orderable: false},
                {data: 'menu.name', orderable: false},
                {data: 'created_at'},
                {data: 'updated_at'},
            ];

            @can('edit_menus', 'delete_menus')
                
                dataTableObject.ajax = {url: "{{ route('datatable', ['model' => 'Menu', 'whereHas' => 'none', 'entity' => 'menus', 'identificador' => 'id', 'relations' => 'menu']) }}"};
                columns.push({data: 'actions', className: 'text-center wCellActions', orderable: false},)
                dataTableObject.columnDefs = [formatDateTable([-2, -3])];
            @else
                dataTableObject.ajax = {url: "{{ route('datatable', ['model' => 'Menu', 'whereHas' => 'none', 'relations' => 'menu']) }}"};
                dataTableObject.columnDefs = [formatDateTable([-1, -2])];
            @endcan

            dataTableObject.columns = columns;

            dataTableObject.columnDefs.push(
                {
                    //En la columna 2 (url) se agrega una condición
                    targets: 2,
                    render: function(data, type, row)
                    {
                        // Se comprueba si es menu desplegable
                        var res = (data) ? data : '@lang("words.DropdownMenu")';

                        return res;
                    }
                },
                {
                    //En la columna 3 (menu) se agrega una condición
                    targets: 3,
                    render: function(data, type, row)
                    {
                        // Se comprueba si el menu es de primer nivel
                        var res = (row.id == row.menu_id) ? '@lang("words.MainMenu")' : data;

                        return res;
                    }
                }     
            );
            
            dataTableObject.ajax.type = 'POST';
            dataTableObject.ajax.data = {_token: window.Laravel.csrfToken};

            var table = $('.dataTable').DataTable(dataTableObject);
        });
    </script>
@endsection