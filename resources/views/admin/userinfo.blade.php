{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', '会员详情')

@section('content_header')
    <h1>会员详情 >></h1>

    <div class="user_table_frame">
    	<div class="table_frame" data-uid="{{$user->id}}">
    		<div class="user-group">
                <span>会员昵称</span>
                <input type="text" name="name" class="form-control" id="name" value="{{$user->nickname}}">
            </div>

            <div class="user-group">
                <span>手机号码</span>
                <input type="text" name="phone" class="form-control" id="phone" value="{{$user->phone}}">
            </div>
            <div class="user-group">
                <span>邮箱　　</span>
                <input type="text" name="e_mail" class="form-control" id="e_mail" value="{{$user->email}}">
            </div>
            <div class="user-group">
                <span>性别　　</span>
                <div class="select-box">
	                <div class="select-sex select-sex1">
	                	<input type="radio" name="sex" value="1" @if ($user->sex == 1)checked @endif >
	                	<label>男</label>
	                </div>
	                <div class="select-sex select-sex2">
						<input type="radio" name="sex" value="2" @if ($user->sex == 2)checked @endif >
						<label>女</label>
					</div>
					<div class="select-sex select-sex3">
						<input type="radio" name="sex" value="0" @if ($user->sex == 0)checked @endif >
						<label>未知</label>
	                </div>
                </div>
            </div>
            <div class="user-group intro">
                <span>备注　　</span>
                <textarea class="form-control" name="remarks" id="remarks">{{$user->remarks}}</textarea>
            </div>

            <div class="save-button">保存</div>
            <span class="back-user">返回会员列表</span>
    	</div>
    </div>
@stop

@section('content')

@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('layui/css/layui.css') }}">
@stop

@section('js')
<script src="{{ asset('layui/layui.js') }}"></script>
<script src="{{ asset('js/admin/userinfo.js') }}"></script>
<script>
	var USER_EDIT = "{{ url('admin/user_edit') }}",
        USER_LIST = "{{ url('admin/userlist') }}",
        CSRF = '{{csrf_token()}}';

</script>
@stop