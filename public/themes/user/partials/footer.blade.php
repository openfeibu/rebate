<footer>
    <ul>
        <li @if(URL::current() == url('/')) class="active" @endif><a href="{{ url('/') }}">首页</a></li>
        <li @if(URL::current() == url('/rebate')) class="active" @endif><a href="{{ url('/rebate') }}">佣金</a></li>
        <li @if(URL::current() == url('vip')) class="active" @endif><a href="{{ url('vip') }}">VIP</a></li>
    </ul>
</footer>