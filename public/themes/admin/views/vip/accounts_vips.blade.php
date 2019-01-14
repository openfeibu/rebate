<div class="main">
    <div class="layui-card fb-minNav">
        <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
            <a href="{{ route('home') }}">主页</a><span lay-separator="">/</span>
            <a><cite>VIP升级记录</cite></a>
        </div>
    </div>
    <div class="main_full">
        <div class="layui-col-md12">
            <div class="tabel-message">
                <div class="layui-inline">
                    <input class="layui-input search_key" name="AI.Accounts|AI.GameID" id="demoReload" placeholder="用户账号或GameID" autocomplete="off" style="width: 300px">
                </div>
                <button class="layui-btn" data-type="reload">{{ trans('app.search') }}</button>
            </div>

            <table id="fb-table" class="layui-table"  lay-filter="fb-table">

            </table>
        </div>
    </div>
</div>


<script>
    var main_url = "{{guard_url('accounts_vips')}}";
    var delete_all_url = "";
    var id='AccountVipID';
    layui.use(['jquery','element','table'], function(){
        var table = layui.table;
        var form = layui.form;
        var $ = layui.$;
        table.render({
            elem: '#fb-table'
            ,url: main_url
            ,cols: [[
                {field:'AccountVipID',title:'ID', width:80}
                ,{field:'UpgradeDate',title:'时间'}
                ,{field:'GameID',title:'GameID'}
                ,{field:'Accounts',title:'昵称'}
                ,{field:'VipName',title:'VIP'}
                ,{field:'Price',title:'价格'}
            ]]
            ,id: 'fb-table'
            ,page: true
            ,limit: 10
            ,height: 'full-200'
        });


    });
</script>
{!! Theme::partial('common_handle_js') !!}