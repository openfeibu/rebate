<div class="main">
    <div class="layui-card fb-minNav">
        <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
            <a href="<?php echo e(route('home')); ?>">主页</a><span lay-separator="">/</span>
            <a><cite>VIP设置</cite></a>
        </div>
    </div>
    <div class="main_full">
        <div class="layui-col-md12">
            <div class="tabel-message">
                <div class="layui-inline tabel-btn">
                    <button class="layui-btn layui-btn-warm "><a href="<?php echo e(url('/admin/vip/create')); ?>">添加VIP</a></button>
                    <button class="layui-btn layui-btn-primary " data-type="del" data-events="del">删除</button>
                </div>
                
            </div>

            <table id="fb-table" class="layui-table"  lay-filter="fb-table">

            </table>
        </div>
    </div>
</div>
<script type="text/html" id="barDemo">
    <a class="layui-btn layui-btn-sm" lay-event="edit">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-sm" lay-event="del">删除</a>
</script>
<script type="text/html" id="imageTEM">
    <img src="{{d.image}}" alt="" height="28">
</script>
<script>
    var main_url = "<?php echo e(guard_url('vip')); ?>";
    var delete_all_url = "<?php echo e(guard_url('vip/destroyAll')); ?>";
    layui.use(['jquery','element','table'], function(){
        var $ = layui.$;
        var table = layui.table;
        var form = layui.form;
        table.render({
            elem: '#fb-table'
            ,url: '<?php echo e(guard_url('vip')); ?>'
            ,cols: [[
                {checkbox: true, fixed: true}
                ,{field:'VipID',title:'ID', width:80, sort: true,edit:'text'}
                ,{field:'VipName',title:'图片', width:200,toolbar:'#imageTEM',}
                ,{field:'Price',title:'路径', sort: true}
                ,{field:'score',title:'操作', width:200, align: 'right',toolbar:'#barDemo'}
            ]]
            ,id: 'fb-table'
            ,height: 'full-200'
        });
    });
</script>
<?php echo Theme::partial('common_handle_js'); ?>