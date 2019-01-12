<div class="main">
    <div class="layui-card fb-minNav">
        <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
            <a href="{{ route('home') }}">主页</a><span lay-separator="">/</span>
            <a><cite>VIP返佣设置</cite></a>
        </div>
    </div>
    <div class="main_full">
        <div class="layui-col-md12">
            <table id="fb-table" class="layui-table"  lay-filter="fb-table">

            </table>
        </div>
    </div>
</div>


<script>
    var main_url = "{{guard_url('vip_rebate')}}";
    var delete_all_url = "";
    var id = 'VipRebateID';
    layui.use(['jquery','element','table'], function(){
        var $ = layui.$;
        var table = layui.table;
        var form = layui.form;
        table.render({
            elem: '#fb-table'
            ,url: main_url
            ,cols: [[
                {field:'VipRebateID',title:'ID', width:80, sort: true}
                ,{field:'VipName',title:'VIP'}
                ,{field:'Rank',title:'几级返佣'}
                ,{field:'Ratio',title:'比例（1～100）',  edit:'title'}
            ]]
            ,id: 'fb-table'
            ,height: 'full-200'
        });
    });
</script>
{!! Theme::partial('common_handle_js') !!}