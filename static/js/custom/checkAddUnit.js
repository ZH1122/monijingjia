/*验证新建推广单元&&修改推广单元
 * time：2016/10/19   from:哈哈哈蜜瓜    email：jiang.qiong.xx@qq.com
 * */
$(function() {
    var ok1=false;
    // 验证推广单元名称
    $('input[name="unit_name"]').focus(function(){
        $("#error").html("推广单元名称应该为2-20位之间！");
        $("#error").removeClass('alert-success').addClass('alert-warning');

    }).blur(function(){
        if($(this).val().length >= 2 && $(this).val().length <=20 && $(this).val()!=''){
            ok1=true;
        }else{
            $("#error").html("推广单元名称应该为2-20位之间！");
            $("#error").removeClass('alert-success').addClass('alert-danger');
        }
    });


    $('.submit').click(function(){
        //验证修改单元
        if($('input[name="unit_name"]').val().length >= 2 && $('input[name="unit_name"]').val().length <=20 && $('input[name="unit_name"]').val()!=''){
            ok1=true;
        }else{
            $("#error").html("推广单元名称应该为2-20位之间！");
            $("#error").removeClass('alert-success').addClass('alert-danger');
        }

        if(ok1){
            $('form').submit();
        }else{
            $("#error").html("请检查推广单元名称的格式！");
            $("#error").removeClass('alert-success').addClass('alert-danger');
            return false;
        }
    });


});





