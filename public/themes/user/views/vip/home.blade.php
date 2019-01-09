<div class="main">
    <div class="vip-up">
        @foreach($vips as $vip_key => $vip)
            <div class="vip-item @if($account_vip && $account_vip->VipID == $vip->VipID) active @endif" >
                @if($account_vip && $account_vip->VipID == $vip->VipID)
                    <p>{{ $vip->VipName }}</p>
                    <a href="javascript:;" vip-id="{{ $vip->VipID }}">您已是{{ $vip->VipName }}</a>
                @else
                <p>{{ $vip->VipName }}</p>
                <a href="javascript:;" class="vip-btn" vip-id="{{ $vip->VipID }}">升级为{{ $vip->VipName }}</a>
                @endif
            </div>
        @endforeach
    </div>
</div>
<script>
    $(function(){
        $(".vip-btn").click(function(){
            load = layer.open({
                type: 2
                ,content: '升级中'
            });
            $this = $(this);
            $.ajax({
                url : "{{ url('vip/upgrade') }}",
                data : {'_token':"{!! csrf_token() !!}",'vip_id':$this.attr('vip-id')},
                type : 'post',
                dataType : "json",
                success : function (data) {
                    layer.close(load);
                    layer.open({
                        content: data.msg
                        ,skin: 'msg'
                        ,time: 2 //2秒后自动关闭
                    });
                    window.location.href = data.url;
                },
                error : function (jqXHR, textStatus, errorThrown) {
                    layer.close(load);
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
        });
    })
</script>