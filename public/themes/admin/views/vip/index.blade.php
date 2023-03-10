<div class="main">
    <div class="layui-card fb-minNav">
        <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
            <a href="{{ route('home') }}">主页</a><span lay-separator="">/</span>
            <a><cite>VIP设置</cite></a>
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
    var main_url = "{{guard_url('vip')}}";
    var delete_all_url = "{{guard_url('vip/destroyAll')}}";
    var id = 'VipID';
    layui.use(['jquery','element','table'], function(){
        var $ = layui.$;
        var table = layui.table;
        var form = layui.form;
        table.render({
            elem: '#fb-table'
            ,url: main_url
            ,cols: [[
                {field:'VipID',title:'ID', width:80, sort: true}
                ,{field:'VipName',title:'VIP', width:80, edit:'title'}
                ,{field:'Detail',title:'详情',  edit:'title'}
                ,{field:'Price',title:'升级价格', width:100,  edit:'title'}
            ]]
            ,id: 'fb-table'
            ,height: 'full-200'
        });
    });
</script>
{!! Theme::partial('common_handle_js') !!}