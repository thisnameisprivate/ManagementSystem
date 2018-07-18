<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo ($staticPath); ?>/layui/css/layui.css">
    <title>人员管理</title>
</head>
<body>
<div class="layui-card layui-anim layui-anim-up">
    <div class="layui-card-header"><span style="font-weight:700; font-size:1rem; color:#FF5722;"><span class="layui-icon layui-icon-username"></span> <?php echo ($username); ?></span>&nbsp;&nbsp;正在进行人员管理</div>
    <div class="layui-card-body">
        <p>提示:</p>
        <p style="color:red;">权限越大责任越大 :)三思而后行</p>
    </div>
    <table class="layui-table layui-anim layui-anim-up" style="table-layout: fixed;" lay-size="sm">
        <thead>
        <tr>
            <th>用户</th>
            <th>密码</th>
            <th>删除预约信息</th>
            <th>修改预约信息</th>
            <th>修改个人资料</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($result)): foreach($result as $k=>$vo): ?><tr class="rowData" index="<?php echo ($vo['id']); ?>">
                <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($vo['username']); ?></td>
                <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($vo['password']); ?></td>
                <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($vo['deletedata']==1? 是:否); ?></td>
                <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($vo['updatedata']==1? 是:否); ?></td>
                <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($vo['updateuser']==1? 是:否); ?></td>
                <td>
                    <a href="javascript:;" title="更改内容" class="layui-icon layui-icon-edit update" style="color:#FFB800;"></a>
                    <a href="javascript:;" title="删除此行" class="layui-icon layui-icon-delete delete" style="color:#FF5722;"></a>
                </td>
            </tr><?php endforeach; endif; ?>
        </tbody>
    </table>
</div>
</body>
<script src="<?php echo ($staticPath); ?>/layui/layui.js"></script>
<script>
    layui.use('form', function(){
        var form = layui.form;

        //监听提交
        form.on('submit(formDemo)', function(data){
            // layer.msg(JSON.stringify(data.field));
        });
    });
</script>
</html>