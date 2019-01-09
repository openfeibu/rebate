@foreach($rebates as $key => $rebate)

    <dl class="fb-clearfix">
        <dt>
            <span class="s1">时间</span>
            <span class="s2">昵称</span>
            <span class="s4">金额</span>
            <span class="s5">返佣</span>
        </dt>
        <dd>
            <span class="s1">{{ $rebate->RebateDate }}</span>
            <span class="s2">{{ $rebate->FromAccounts }} @if($rebate->Rank == 1)（一级下线）@elseif($rebate->Rank == 2)（二级下线）@endif</span>
            <span class="s4">{{ $rebate->Currency }}</span>
            <span class="s5">{{ $rebate->Rebate }}</span>
        </dd>
    </dl>
@endforeach