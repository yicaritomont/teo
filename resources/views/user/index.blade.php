@extends('layouts.app')

@section('title', trans('words.ManageUsers'))

@section('content')
    <div class="row">
        <div class="col-md-5">            
                <h3 class="modal-title"> {{ str_plural(trans('words.User'), 2) }} </h3>
        </div>
        <div class="col-md-7 page-action text-right">
            
            <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm"> <i class="glyphicon glyphicon-plus-sign"></i> @lang('words.Create')</a>
            <a href="{{ route('login') }}" class="btn btn-success btn-sm"> <i class="glyphicon glyphicon-user"></i> @lang('words.Login')</a>

            
        </div>
    </div>

    <div class="result-set">
        <table class="table table-bordered table-hover dataTable nowrap" id="data-table">
            <thead>
            <tr>
                <th>@lang('words.Id')</th>
                <th>@lang('words.Name')</th>
                <th>@lang('words.Email')</th>
                <th>@lang('words.CreatedAt')</th>
                <th>@lang('words.UpdatedAt')</th> 
                @can('edit_users', 'delete_users')
                <th class="text-center">@lang('words.Actions')</th>
                @endcan
            </tr>
            </thead>
            <tbody>
            @if(isset($users) && count($users)>0)
                @foreach($users as $user)
                    <tr>
                        <th>{{ $user->id }}</th>
                        <th>{{ $user->name }}</th>
                        <th>{{ $user->email }}</th>
                        <th>{{ $user->created_at}}</th>
                        <th>{{ $user->updated_at}}</th> 
                        @can('edit_users', 'delete_users')
                        <th class="text-center">@lang('words.Actions')</th>
                        @endcan
                    </tr>
                @endforeach
            @else
            <tr>
                <td colspan="6"> CLEAN</td>
            <tr>
            @endif
            </tbody
        </table>
    </div>
@endsection