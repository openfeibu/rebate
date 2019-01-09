
<div class="main">
    <div class="vipType">
        @if($account_vip)
            <div class="vipType-test">
                <p>VIP3</p>
            </div>
        @else
            <div class="vipType-test">
                <p class="no-vip"></p>
            </div>
        @endif
        <div class="vipType-btn">
            <a href="{{ url('vip') }}">升级会员</a>
        </div>
    </div>
    <div class="showData fb-clearfix">
        <div class="showData-item">
            <img src="{!!theme_asset('images/wallte.png')!!}" alt="">
            <p>金币</p>
            <span>{{ Auth::user()->userInsureScore() }}</span>
        </div>
        <div class="showData-item">
            <img src="{!!theme_asset('images/mp1-active.png')!!}" alt="">
            <p>返佣金币</p>
            <span>{{ Auth::user()->userRebateCount() }}</span>
        </div>
    </div>

    <div class="vip-explain">
        @foreach($vips as $vip_key => $vip)
            <div class="vip-explain-item">
                <div class="vip-explain-item-header">{{ $vip->VipName }}</div>
                <div class="vip-explain-item-test">
                    {{ $vip->Detail }}
                </div>
            </div>
        @endforeach
    </div>
</div>
