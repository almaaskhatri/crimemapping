@extends('adminlte::master')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/auth.css') }}">
    @yield('css')
@stop
@section('pageTitle', 'Register')

@section('body_class', 'register-page')

@section('body')
    <div class="register-box">
        <div class="register-logo">
            <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}">{!! config('CrimeMapping.logo', '<b>Crime</b>Mapping') !!}</a>
        </div>

        <div class="register-box-body">
            <p class="login-box-msg">{{ trans('adminlte::adminlte.register_message') }}</p>
            <form action="{{ url(config('adminlte.register_url', 'register')) }}" method="post">
                {!! csrf_field() !!}

                <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                           placeholder="{{ trans('adminlte::adminlte.full_name') }}">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                           placeholder="{{ trans('adminlte::adminlte.email') }}">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                    <input type="cnic" name="cnic" class="form-control" value="{{ old('cnic') }}"
                           placeholder="CNIC" onBlur='addDashes(this)'>
                    <span class="glyphicon glyphicon-barcode form-control-feedback"></span>
                    @if ($errors->has('cnic'))
                        <span class="help-block">
                            <strong>{{ $errors->first('cnic') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('age') ? 'has-error' : '' }}">
                    <input type="age" name="age" class="form-control" value="{{ old('age') }}"
                           placeholder="Age">
                    <span class="glyphicon glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('age'))
                        <span class="help-block">
                            <strong>{{ $errors->first('age') }}</strong>
                        </span>
                    @endif
                </div>
                
                <div class="form-group has-feedback {{ $errors->has('cellno') ? 'has-error' : '' }}">
                    <input type="cellno" name="cellno" class="form-control"
                           placeholder="Cell No" value="{{ old('country_code') }}">
                    <span class="glyphicon glyphicon glyphicon-phone form-control-feedback"></span>
                    @if ($errors->has('cellno'))
                        <span class="help-block">
                            <strong>{{ $errors->first('cellno') }}</strong>
                        </span>
                    @endif
                </div>
                
                <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                    <input type="password" name="password" class="form-control"
                           placeholder="{{ trans('adminlte::adminlte.password') }}">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                    <input type="password" name="password_confirmation" class="form-control"
                           placeholder="{{ trans('adminlte::adminlte.retype_password') }}">
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
                <button type="submit"
                        class="btn btn-primary btn-block btn-flat"
                >{{ trans('adminlte::adminlte.register') }}</button>
            </form>
            <div class="auth-links">
                <a href="{{ url(config('adminlte.login_url', 'login')) }}"
                   class="text-center">{{ trans('adminlte::adminlte.i_already_have_a_membership') }}</a>
            </div>
        </div>
        <!-- /.form-box -->
    </div><!-- /.register-box -->
@stop

@section('adminlte_js')
    @yield('js')
@stop
<SCRIPT LANGUAGE="JavaScript">
        function addDashes(f)
            {
                 if (f.value.charAt(5) != "-" &&f.value.charAt(14) != "-")
      {  
                f.value = f.value.slice(0,5)+"-"+f.value.slice(5,12)+"-"+f.value.slice(12,13);
         }   }
    </SCRIPT>