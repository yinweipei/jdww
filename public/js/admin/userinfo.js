$('.save-button').on('click',function(){
    var nickname = $('#name').val(),
        phone = $('#phone').val(),
        email = $('#e_mail').val(),
        sex = $("input[name='sex']:checked").val(),
        remarks = $('#remarks').val(),
        uid = $('.table_frame').data('uid');
    // var reg = new RegExp("^[a-z0-9]+([._\\-]*[a-z0-9])*@([a-z0-9]+[-a-z0-9]*[a-z0-9]+.){1,63}[a-z0-9]+$");
    if(nickname == ''){
        layui.use('layer', function(){
                layer.msg('会员昵称必须填写');
        });
        return false;
    }
    if(phone == ''){
        layui.use('layer', function(){
                layer.msg('手机号码必须填写');
        });
        return false;
    }
    if(email == ''){
        layui.use('layer', function(){
                layer.msg('邮箱必须填写');
        });
        return false;
    }
    // else if(!reg.test(email)){
    //     layui.use('layer', function(){
    //             layer.msg('邮箱格式错误');
    //     });
    //     return false;
    // }
    // console.log(nickname);return false;
    
    $.post(USER_EDIT, { id:uid,nickname:nickname,phone:phone,email:email,sex:sex,remarks:remarks,'_token':CSRF }, function (data) {
        console.log(data);
        if(data.code == 200){
            window.location.href = USER_LIST;
            layui.use('layer', function(){
                layer.msg('修改成功!');
            });
        }else{
            layui.use('layer', function(){
                layer.msg(data.error_msg);
            });
        }
            
    });

});

$('.back-user').on('click',function(){
    window.location.href = USER_LIST;
});