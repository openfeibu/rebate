<div class="main">
    <div class="layui-card fb-minNav">
        <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
            <a href="{{ route('home') }}">主页</a><span lay-separator="">/</span>
            <a><cite>VIP返佣统计</cite></a>
        </div>
    </div>
    <div class="main_full">
        <div class="layui-col-md12">
            <div class="tabel-message">
                <div class="layui-inline">
                    <input class="layui-input search_key" name="Accounts" id="demoReload" placeholder="用户账号" autocomplete="off" style="width: 200px">
                </div>
                <div class="layui-inline">
                    <input type="text" class="layui-input search_key" name="datetime" id="datetime" placeholder="时间选择" style="width: 300px">
                </div>
                <button class="layui-btn" data-type="reload">{{ trans('app.search') }}</button>
            </div>

            <table id="fb-table" class="layui-table"  lay-filter="fb-table">

            </table>
        </div>
    </div>
</div>


<script>
    var main_url = "{{guard_url('account_vip')}}";
    var delete_all_url = "";
    var id='UserID';
    layui.use(['jquery','element','table','laydate'], function(){
        var table = layui.table;
        var form = layui.form;
        var $ = layui.$;
        table.render({
            elem: '#fb-table'
            ,url: main_url
            ,cols: [[
                {field:'UserID',title:'用户ID', width:80}
                ,{field:'Accounts',title:'昵称'}
                ,{field:'VipName',title:'VIP'}
                ,{field:'RebateTotal',title:'返佣总额'}
            ]]
            ,id: 'fb-table'
            ,page: true
            ,limit: 10
            ,height: 'full-200'
        });

        var laydate = layui.laydate;
        //日期时间范围选择
        laydate.render({
            elem: '#datetime'
            ,type: 'datetime'
            ,range: '~' //或 range: '~' 来自定义分割字符
        });
    });

</script>
{!! Theme::partial('common_handle_js') !!}