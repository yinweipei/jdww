$("#signin_add").on("click",function(e){
    startApplyBtn()    
});

 //日期
  layui.use('laydate', function(){
    var laydate = layui.laydate;
    //执行一个laydate实例 
    laydate.render({
      elem: '#date' //指定元素
    });

  });

//添加美签
function startApplyBtn(){
    clear_sign();
    layui.use('layer', function(){
        var layer = layui.layer;
        layer.open({
            type: 1,
            title: '添加美签',
            closeBtn: 1,  //关闭按钮，可通过配置1和2来展示，如果不显示 0
            fixed: false,  //鼠标滚动时，层是否固定在可视区域
            //move: false,
            offset: '200px',
            area: ['500px',],
            shadeClose: true, //点击遮罩关闭
            content: $('.add_siginin_frame'),
            btnAlign: 'c',
            btn: ['取消','提交'],
            yes: function(index, layero){
              //按钮【按钮一】的回调
              layer.close(index); 
              console.log(11)
            },
            btn2: function(index, layero){
              //按钮【按钮一】的回调
                var date = $('#date').val(),
                    title = $('#title').val(),
                    interpretation = $('#interpretation').val();
                if(date == ''){
                    layui.use('layer',function(){
                      layer.msg('请选择日期',{
                        time:500
                      },function(){
                        
                    });   
                  });
                  return false;   
                }
                if(title == ''){
                    layui.use('layer',function(){
                      layer.msg('请填写签文标题',{
                        time:500
                      },function(){
                        
                    });   
                  });
                  return false;   
                }
                if(interpretation == ''){
                    layui.use('layer',function(){
                      layer.msg('请填写签文解语',{
                        time:500
                      },function(){
                        
                    });   
                  });
                  return false;   
                }

                $.post(SIGNIN_ADD,{date:date,title:title,interpretation:interpretation,'_token':CSRF},function(res){
                    if(res.code == '200'){
                        layui.use('layer', function(){
                            layer.msg('添加成功!');
                          });
                        clear_sign();
                        location.reload();
                      }else{
                        layui.use('layer', function(){
                            layer.msg(res.error_msg);
                          });
                      }

                });
            }
        });
    });
}

function del_signin(res,gid){
    console.log(gid)
    layui.use('layer', function(){
        layer.confirm("确认要删除吗", { title: "删除确认" }, function (index) {
        layer.close(index);
        $.post(SIGNIN_DEL, { id:gid,'_token':CSRF }, function (data) {
            if(data.code == 200){
                location.reload();
                layer.msg('删除成功!');
            }else{
                layer.msg('删除失败!');
            }
            
        });
    });                      
    });

}

function clear_sign(){
    $('#date').val(''),
    $('#title').val(''),
    $('#interpretation').val('');
}

function edit_signin(res,gid){
    var date = $(res).parent().parent().children('td').eq(0).text(),
        title = $(res).parent().parent().children('td').eq(3).text(),
        interpretation = $(res).parent().parent().children('td').eq(4).text();

        $('#date').val(date);
        $('#title').val(title);
        $('#interpretation').val(interpretation);

        layui.use('layer', function(){
        var layer = layui.layer;
        layer.open({
            type: 1,
            title: '修改美签',
            closeBtn: 1,  //关闭按钮，可通过配置1和2来展示，如果不显示 0
            fixed: false,  //鼠标滚动时，层是否固定在可视区域
            //move: false,
            offset: '200px',
            area: ['500px',],
            shadeClose: true, //点击遮罩关闭
            content: $('.add_siginin_frame'),
            btnAlign: 'c',
            btn: ['取消','提交'],
            yes: function(index, layero){
              //按钮【按钮一】的回调
              layer.close(index); 
            },
            btn2: function(index, layero){
              //按钮【按钮一】的回调
                var date = $('#date').val(),
                    title = $('#title').val(),
                    interpretation = $('#interpretation').val();
                if(date == ''){
                    layui.use('layer',function(){
                      layer.msg('请选择日期',{
                        time:500
                      },function(){
                        
                    });   
                  });
                  return false;   
                }
                if(title == ''){
                    layui.use('layer',function(){
                      layer.msg('请填写签文标题',{
                        time:500
                      },function(){
                        
                    });   
                  });
                  return false;   
                }
                if(interpretation == ''){
                    layui.use('layer',function(){
                      layer.msg('请填写签文解语',{
                        time:500
                      },function(){
                        
                    });   
                  });
                  return false;   
                }

                $.post(SIGNIN_EDIT,{id:gid,date:date,title:title,interpretation:interpretation,'_token':CSRF},function(res){
                    if(res.code == '200'){
                        layui.use('layer', function(){
                            layer.msg('修改成功!');
                          });
                        clear_sign();
                        location.reload();
                      }else{
                        layui.use('layer', function(){
                            layer.msg(res.error_msg);
                          });
                      }

                });
            }
        });
    });
    
}