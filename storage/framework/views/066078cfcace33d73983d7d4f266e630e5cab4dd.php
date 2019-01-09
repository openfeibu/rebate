<?php $__currentLoopData = $rebates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $rebate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <dl class="fb-clearfix">
        <dt>
            <span class="s1">时间</span>
            <span class="s2">昵称</span>
            <span class="s4">金额</span>
            <span class="s5">返佣</span>
        </dt>
        <dd>
            <span class="s1"><?php echo e($rebate->RebateDate); ?></span>
            <span class="s2">XXX <?php if($rebate->Rank == 1): ?>（一级下线）<?php elseif($rebate->Rank == 2): ?>（二级下线）<?php endif; ?></span>
            <span class="s4"><?php echo e($rebate->Currency); ?></span>
            <span class="s5"><?php echo e($rebate->Rebate); ?></span>
        </dd>
    </dl>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>