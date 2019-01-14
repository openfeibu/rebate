<div class="main">
    <div class="layui-card fb-minNav">
        <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
            <a href="{{ route('home') }}">主页</a><span lay-separator="">/</span>
            <a><cite>VIP返佣记录</cite></a>
        </div>
    </div>
    <div class="main_full">
        <div class="layui-col-md12">
            <div class="tabel-message">
                <div class="layui-inline">
                    <input class="layui-input search_key" name="AI2.Accounts|AI2.GameID" id="demoReload" placeholder="用户账号或GameID" autocomplete="off" style="width: 300px">
                </div>
                <div class="layui-inline">
                    <input class="layui-input search_key" name="AI.Accounts|AI.GameID" id="demoReload" placeholder="返佣来源用户账号或GameID" autocomplete="off" style="width: 300px">
                </div>
                <button class="layui-btn" data-type="reload">{{ trans('app.search') }}</button>
            </div>

            <table id="fb-table" class="layui-table"  lay-filter="fb-table">

            </table>
        </div>
    </div>
</div>


<script>
    var main_url = "{{guard_url('rebates')}}";
    var delete_all_url = "";
    var id='RebateID';
    layui.use(['jquery','element','table'], function(){
        var table = layui.table;
        var form = layui.form;
        var $ = layui.$;
        table.render({
            elem: '#fb-table'
            ,url: main_url
            ,cols: [[
                {field:'RebateID',title:'ID', width:80}
                ,{field:'RebateDate',title:'时间'}
                ,{field:'AccountsDetail',title:'用户(GameID)'}
                ,{field:'RebateDetail',title:'返佣来源用户(GameID)'}
                ,{field:'Currency',title:'金额',width:160}
                ,{field:'Rebate',title:'返佣',width:160}
            ]]
            ,id: 'fb-table'
            ,page: true
            ,limit: 10
            ,height: 'full-200'
        });


    });
</script>
{!! Theme::partial('common_handle_js') !!}