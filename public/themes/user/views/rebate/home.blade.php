<div class="main">
    <div class="commission">
        <div class="commission-t">

            @include('rebate.list')
        </div>
        <div class="commission-more">
            点击加载更多
        </div>
    </div>
</div>
<script>
    var page = 1;
    $(".commission-more").on("click",function(){
        $(this).text("正在加载中...");
        var html="";
        page++;
        $.ajax({
            url : "{{ url('rebate') }}",
            data : {'page':page},
            type : 'get',
            dataType : "json",
            success : function (data) {
                var html = data.data.content;
                console.log(html);
                if(html)
                {
                    $(".commission-t").append(html);
                    $(".commission-more").text("点击加载更多");
                }else{
                    $(".commission-more").text("");
                    layer.open({
                        content: "没有更多了"
                        ,skin: 'msg'
                        ,time: 2 //2秒后自动关闭
                    });
                }

            },
            error : function (jqXHR, textStatus, errorThrown) {
                responseText = $.parseJSON(jqXHR.responseText);
                var message =  responseText.msg;
                if(!message)
                {
                    message = '服务器错误';
                }
                layer.open({
                    content: message
                    ,skin: 'msg'
                    ,time: 2 //2秒后自动关闭
                });
            }
        });
    })
</script>