$(function () {
    $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
    });

    $('.btn-flat').on('click',function(){
        let user = $('#user').val(),
            password =$('#pwd').val();

        if(user == ''){
            layui.use('layer', function(){
                    layer.msg('账号必须填写');
            });
            return false;
        }
        if(password == ''){
            layui.use('layer', function(){
                    layer.msg('密码必须填写');
            });
            return false;
        }

        $.post(USER_LOGIN, { user:user,password:password,'_token':CSRF }, function (data) {
            // console.log(data);
            // return false;
            if(data.code == 200){
                layui.use('layer', function(){
                    layer.msg(data.data);
                });
                window.location.href = INDEX;
            }else{
                layui.use('layer', function(){
                    layer.msg(data.error_msg);
                });
            }
                
        });
    });


});