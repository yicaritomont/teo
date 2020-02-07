<!-- Name Form Input -->
<div class="form-group @if ($errors->has('name')) has-error @endif">
    <label for="name">@lang('words.Name')</label>
    {!! Form::text('name', null, ['class' => 'input-body']) !!}   
    @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
</div>

<!-- email Form Input -->
<div class="form-group @if ($errors->has('email')) has-error @endif">
    <label for="email">@lang('words.Email')</label>
    {!! Form::text('email', old('email'), ['class' => 'input-body']) !!}    
    @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
</div>

<!-- password Form Input -->
<div class="form-group @if ($errors->has('password')) has-error @endif">
    <label for="password">@lang('words.Password')</label>
    <input type="hidden" id='user_pasword' value='0'>
    {!! Form::password('password',['class' => 'input-body' ,'id' => 'password_update']) !!}
    @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
    <p id="div_info_lengthPwd" ></p>
    <p id="div_info_lengthNumber"></p>
    <p id="div_info_lengthLower"></p>
    <p id="div_info_lengthUpper"></p>
    <p id="div_info_beforePass"></p>
    <p id="div_info_keyWordPass"></p>
</div>

<!-- Image Form Input -->
<div class="form-group @if ($errors->has('picture')) has-error @endif">
    <label for="picture">@lang('words.Picture')</label>
    {!! Form::file('picture', old('picture'), ['class' => 'input-body', 'type'=>'file', 'accept'=>'image/*']) !!}
    @if ($errors->has('picture')) <p class="help-block">{{ $errors->first('picture') }}</p> @endif
</div>

<!-- Permissions -->
@if(isset($user))
    @include('shared._permissions', ['closed' => 'true', 'model' => $user ])
@endif