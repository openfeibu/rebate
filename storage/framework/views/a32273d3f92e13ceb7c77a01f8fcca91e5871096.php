<footer>
    <ul>
        <li <?php if(URL::current() == url('/')): ?> class="active" <?php endif; ?>><a href="<?php echo e(url('/')); ?>">首页</a></li>
        <li <?php if(URL::current() == url('/rebate')): ?> class="active" <?php endif; ?>><a href="<?php echo e(url('/rebate')); ?>">佣金</a></li>
        <li <?php if(URL::current() == url('vip')): ?> class="active" <?php endif; ?>><a href="<?php echo e(url('vip')); ?>">VIP</a></li>
    </ul>
</footer>