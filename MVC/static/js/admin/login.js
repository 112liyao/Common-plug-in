$(window).ready(function(){
//  var btn=$("input[type=submit]");
    var btn=$(".floating-btn");
    $("input[name=code]").blur(function(){
        var code=$(this).val();
        that=$(this);
        $.ajax({
            url:"index.php?m=admin&f=index&a=checkCode",
            data:{code:code},
            success:function(e){
                if(e=="ok"){
                    that.attr("use","yes");
                }else{
                    alert(e)
                }
            }
        })
    })
})