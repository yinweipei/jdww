{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', '会员管理')

@section('content_header')
    <h1>会员管理 >></h1>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">客户列表</h3>
                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" id="table_search" class="form-control pull-right" placeholder="请输入会员名称">

                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="box-tools">
                       <button class="layui-btn" id="signin_add">增加</button>
                    </div> -->
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>添加时间</th>
                            <th>会员名称</th>
                            <th>手机号码</th>
                            <th>备注</th>
                            <th>操作</th>
                        </tr>

                       @foreach($users as $user)
                        <tr>
                            <td>{{ date('Y-m-d H:i',$user->create_time) }}</td>
                            <td>{{ $user->nickname }}</td>
                            <td>{{ $user->phone }}</td>


                            <td>{{ $user->remarks }}</td>

                            <td>
                                <a type="button" class="btn btn-success btn-xs" onclick="del_user(this,{{$user->id}})">删除</a>
                                <a type="button" class="btn btn-success btn-xs" onclick="edit_user(this,{{$user->id}})">修改</a>
                                <!-- <a type="button" class="btn btn-success btn-xs" onclick="user_info(this,{{$user->id}})">会员详情</a> -->
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
    {{ $users->links() }}
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('layui/css/layui.css') }}">
@stop

@section('js')
<script src="{{ asset('layui/layui.js') }}"></script>
<script src="{{ asset('js/admin/userlist.js') }}"></script>
<script>
    var USER_DEL ="{{ url('admin/user_del') }}",
        USER_INFO = "{{ url('admin/userinfo') }}",
        USER_LIST = "{{ url('admin/userlist') }}",
        CSRF = '{{csrf_token()}}';
</script>
@stop