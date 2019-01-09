<div class="main">
    <div class="vip-up">
        <?php $__currentLoopData = $vips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vip_key => $vip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="vip-item <?php if($account_vip && $account_vip->VipID == $vip->VipID): ?> active <?php endif; ?>" >
                <?php if($account_vip && $account_vip->VipID == $vip->VipID): ?>
                    <p><?php echo e($vip->VipName); ?></p>
                    <a href="javascript:;" vip-id="<?php echo e($vip->VipID); ?>">您已是<?php echo e($vip->VipName); ?></a>
                <?php else: ?>
                <p><?php echo e($vip->VipName); ?></p>
                <a href="javascript:;" class="vip-btn" vip-id="<?php echo e($vip->VipID); ?>">升级为<?php echo e($vip->VipName); ?></a>
                <?php endif; ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                url : "<?php echo e(url('vip/upgrade')); ?>",
                data : {'_token':"<?php echo csrf_token(); ?>",'vip_id':$this.attr('vip-id')},
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