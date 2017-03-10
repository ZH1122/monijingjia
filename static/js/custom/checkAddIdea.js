/*验证推广创意+预览
 * time：2016/10/26   from:哈哈哈蜜瓜    email：jiang.qiong.xx@qq.com
 * */
$(function() {
    //绑定创意预览
    $('#idea_title').bind('input propertychange', function () {
        var idea_title = document.getElementById("idea_title");
        $("#showTitle").html(idea_title.value);
    });

    $('#idea_describr').bind('input propertychange', function () {
        var idea_describr = document.getElementById("idea_describr");
        $("#showDescribr").html(idea_describr.value);
    });

    $('#idea_url').bind('input propertychange', function () {
        var idea_url = document.getElementById("idea_url");
        $("#showUrl").html(idea_url.value);
    });

    //验证推广创意
    checkTitle=false;
    checkUrl=false;
    checkDescribr=false;

    //验证推广创意标题（失去焦点时候验证）
   $('input[name="idea_title"]').focus(function(){
           $("#state_title").removeClass('glyphicon-ok glyphicon-remove').addClass('glyphicon-warning-sign');
           $("#idea_titlepearent").removeClass('has-error has-success').addClass('has-warning');
    }).blur(function(){
        if($(this).val().length >= 2 && $(this).val().length <=20 && $(this).val()!=''){
            checkTitle=true;
            $("#state_title").removeClass(' glyphicon-remove glyphicon-warning-sign').addClass('glyphicon-ok');
            $("#idea_titlepearent").removeClass('has-error has-warning').addClass('has-success');
        }else{
            $("#state_title").removeClass('glyphicon-ok glyphicon-warning-sign').addClass('glyphicon-remove');
            $("#idea_titlepearent").removeClass('has-warning has-success').addClass('has-error');
        }
    });

    //验证推广创意URL（失去焦点时候验证）
    $('input[name="idea_url"]').focus(function(){
        $("#state_url").removeClass('glyphicon-ok glyphicon-remove').addClass('glyphicon-warning-sign');
        $("#idea_urlpearent").removeClass('has-error has-success').addClass('has-warning');
    }).blur(function(){
        if($(this).val().length >= 2 && $(this).val().length <=30 && $(this).val()!=''){
            checkDescribr=true;
            $("#state_url").removeClass(' glyphicon-remove glyphicon-warning-sign').addClass('glyphicon-ok');
            $("#idea_urlpearent").removeClass('has-error has-warning').addClass('has-success');
        }else{
            $("#state_url").removeClass('glyphicon-ok glyphicon-warning-sign').addClass('glyphicon-remove');
            $("#idea_urlpearent").removeClass('has-warning has-success').addClass('has-error');
        }
    });

    //验证推广创意描述（失去焦点时候验证）
    $('textarea[name="idea_describr"]').focus(function(){
        $("#state_describr").removeClass('glyphicon-ok glyphicon-remove').addClass('glyphicon-warning-sign');
        $("#idea_describrpearent").removeClass('has-error has-success').addClass('has-warning');
    }).blur(function(){
        if($(this).val().length >= 2 && $(this).val().length <=80 && $(this).val()!=''){
            checkDescribr=true;
            $("#state_describr").removeClass(' glyphicon-remove glyphicon-warning-sign').addClass('glyphicon-ok');
            $("#idea_describrpearent").removeClass('has-error has-warning').addClass('has-success');
        }else{
            $("#state_describr").removeClass('glyphicon-ok glyphicon-warning-sign').addClass('glyphicon-remove');
            $("#idea_describrpearent").removeClass('has-warning has-success').addClass('has-error');
        }
    });



    $('.submit').click(function(){
        //点击确定验证推广创意
        if($('input[name="idea_title"]').val().length >= 2 && $('input[name="idea_title"]').val().length <=15 && $('input[name="idea_title"]').val()!=''){
            checkTitle=true;
        }else{
            $("#state_title").removeClass('glyphicon-ok glyphicon-warning-sign').addClass('glyphicon-remove');
            $("#idea_titlepearent").removeClass('has-warning has-success').addClass('has-error');
        }

        if($('input[name="idea_url"]').val().length >= 2 && $('input[name="idea_url"]').val().length <=30 && $('input[name="idea_url"]').val()!=''){
            checkUrl=true;
        }else{
            $("#state_url").removeClass('glyphicon-ok glyphicon-warning-sign').addClass('glyphicon-remove');
            $("#idea_urlpearent").removeClass('has-warning has-success').addClass('has-error');
        }

        if($('textarea[name="idea_describr"]').val().length >= 2 && $('textarea[name="idea_describr"]').val().length <=80 && $('textarea[name="idea_describr"]').val()!=''){
            checkDescribr=true;
        }else{
            $("#state_describr").removeClass('glyphicon-ok glyphicon-warning-sign').addClass('glyphicon-remove');
            $("#idea_describrpearent").removeClass('has-warning has-success').addClass('has-error');
        }



        if(checkTitle&& checkUrl&&checkDescribr){
            $('form').submit();
        }else{
            return false;
        }
    });



});