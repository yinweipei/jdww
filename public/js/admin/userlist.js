
	function del_user(res,gid){
        console.log(gid)
        layui.use('layer', function(){
            layer.confirm("确认要删除吗", { title: "删除确认" }, function (index) {
            layer.close(index);
            $.post(USER_DEL, { id:gid,'_token':CSRF }, function (data) {
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

    function edit_user(res,gid){
        $.get(USER_INFO, { id:gid}, function (data) {
            console.log(data);
            if(data.code == '-1'){
                layui.use('layer', function(){
                    layer.msg(data.error_msg);
                });
            }else{

                window.location.href = USER_INFO + '?id=' + gid;
            }
                
        });

        // window.location.href = "{{ url('admin/userinfo',array('id'=>12)) }}";
    }

    $('.btn-default').on('click',function(){
        let search = $('#table_search').val();
        window.location.href = USER_LIST + '?search=' + search;
    });