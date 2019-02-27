@extends('adminlte::master')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/iCheck/square/blue.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/auth.css') }}">
    <link rel="stylesheet" href="{{ asset('layui/css/layui.css') }}">
    @yield('css')
@stop

@section('body_class', 'login-page')

@section('body')
    <div class="login-box">
        <div class="login-logo">
            <a href="#">医美小程序</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">{{ trans('adminlte::adminlte.login_message') }}</p>
                <div class="form-group has-feedback">
                    <input type="user" name="user" class="form-control" id="user" 
                           placeholder="User">
                    <span class="glyphicon fa fa-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" id="pwd" 
                           placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" name="remember"> {{ trans('adminlte::adminlte.remember_me') }}
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit"
                                class="btn btn-primary btn-block btn-flat">{{ trans('adminlte::adminlte.sign_in') }}</button>
                    </div>
                    <!-- /.col -->
                </div>
        </div>
        <!-- /.login-box-body -->
    </div><!-- /.login-box -->
@stop

@section('adminlte_js')
    <script src="{{ asset('vendor/adminlte/plugins/iCheck/icheck.min.js') }}"></script>
    <script src="{{ asset('layui/layui.js') }}"></script>
    <script src="{{ asset('js/admin/login.js') }}"></script>
    <script type="text/javascript">
        var USER_LOGIN = "{{ url('admin/user_login') }}",
            INDEX = "{{ url('admin/index') }}",
            CSRF = '{{csrf_token()}}';
    </script>
    @yield('js')
@stop
