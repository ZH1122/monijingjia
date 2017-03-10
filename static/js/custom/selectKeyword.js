/*选择关键词的ajax
* time：2016/11/1   from:哈哈哈蜜瓜    email：jiang.qiong.xx@qq.com
* */
$(function(){
    $('#getKeywordSubmit').click(function(){
        var postURL="index.php/userhome/uhmanagekeyword/selectKeyword";
        var data=$("#getKeyword").val();
        var inData="inData="+data;
        $.ajax({
            type:"POST",
            url:postURL,
            data:inData,
            //后期改成josn格式
            success:function(returnData){
                $('#test').html(returnData);
            },
            error:function(){
                alert("查找关键词失败，请重新查找！");
            }
        });
        return false
    });



});