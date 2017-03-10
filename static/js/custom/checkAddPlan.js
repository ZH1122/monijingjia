    /*验证新建推广计划&&修改推广计划
     * time：2016/10/17   from:哈哈哈蜜瓜    email：jiang.qiong.xx@qq.com
     * */
    $(function() {
    // 验证推广计划名称
    $('input[name="plan_name"]').focus(function(){
        $("#error").html("推广计划名称应该为2-20位之间！");
        $("#error").removeClass('alert-success').addClass('alert-warning');

    }).blur(function(){
        if($(this).val().length >= 2 && $(this).val().length <=20 && $(this).val()!=''){
            ok1=true;
        }else{
            $("#error").html("推广计划名称应该为2-20位之间！");
            $("#error").removeClass('alert-success').addClass('alert-danger');
        }
    });


    $('.submit').click(function(){
        //验证修改计划
        if($('input[name="plan_name"]').val().length >= 2 && $('input[name="plan_name"]').val().length <=20 && $('input[name="plan_name"]').val()!=''){
            ok1=true;
        }else{
            $("#error").html("推广计划名称应该为2-20位之间！");
            $("#error").removeClass('alert-success').addClass('alert-danger');
        }

        if(ok1){
            $('form').submit();
        }else{
            $("#error").html("请检查推广计划名称的格式！");
            $("#error").removeClass('alert-success').addClass('alert-danger');
            return false;
        }
     });
});









