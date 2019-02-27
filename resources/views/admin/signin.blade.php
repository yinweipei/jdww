{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', '每日美签')

@section('content_header')
    <h1>每日美签 >></h1>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">每日美签</h3>

                    <div class="box-tools">
                            <button class="layui-btn" id="signin_add">增加</button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>日期</th>
                            <th>农历</th>
                            <th>星期</th>
                            <th>每日标题</th>
                            <th>每日解语</th>
                            <th>操作</th>
                        </tr>

                       @foreach($signins as $signin)
                        <tr>
                            <td>{{ $signin->datetime }}</td>
                            <td>{{ $signin->calendar }}</td>
                            <td>
                                @if ($signin->day == 1)
                                    星期一
                                @elseif ($signin->day == 2)
                                    星期二
                                @elseif ($signin->day == 3)
                                    星期三
                                @elseif ($signin->day == 4)
                                    星期四
                                @elseif ($signin->day == 5)
                                    星期五
                                @elseif ($signin->day == 6)
                                    星期六
                                @else
                                    星期日
                                @endif
                            </td>
                            <td>{{ $signin->title }}</td>

                            <td>{{ $signin->interpretation }}</td>

                            <td>
                                <a type="button" class="btn btn-success btn-xs" onclick="del_signin(this,{{$signin->id}});">删除</a>
                                <a type="button" class="btn btn-success btn-xs" onclick="edit_signin(this,{{$signin->id}})">修改</a>
                                <!-- <a type="button" class="btn btn-success btn-xs">详细信息</a> -->
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
    {{ $signins->links() }}

    <!-- 添加美签弹框 -->
  <div class="add_siginin_frame">
    <div class="inner_frame">
        <div class="signin-box">
            <span class="sign-title">展示日期</span>   
            <div class="layui-inline">
                <input id="date" placeholder="请选择日期" readonly="" lay-key="1">
            </div>
        </div>
        <div class="signin-box">
            <span class="sign-title">签文标题</span>   
            <div class="layui-inline">
                <input id="title" type="text">
            </div>
        </div>
        <div class="signin-box">
            <span class="sign-title">签文解语</span>   
            <div class="layui-inline">
                <input id="interpretation" type="text">
            </div>
        </div>
    </div> 
  </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('layui/css/layui.css') }}">
@stop

@section('js')
<script src="{{ asset('layui/layui.js') }}"></script>
<script src="{{ asset('js/admin/signin.js') }}"></script>
<script>
    var SIGNIN_ADD = "{{ url('admin/signin_add') }}",
        SIGNIN_DEL = "{{ url('admin/signin_del') }}",
        SIGNIN_EDIT = "{{ url('admin/signin_edit') }}",
        CSRF = '{{csrf_token()}}';
</script>
@stop