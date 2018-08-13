<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="<?php echo ($staticPath); ?>/layui/css/layui.css">
</head>
<body>
<div class="layui-card layui-anim layui-anim-up">
    <div class="layui-card-header"><span style="font-weight:700; font-size:1rem; color:#FF5722;"><span class="layui-icon layui-icon-username"></span> <?php echo ($username); ?></span>&nbsp;&nbsp;正在进行人员管理</div>
    <div class="layui-card-body">
        <p>当前预约系统所有科室</p>
    </div>
</div>
<table class="layui-table layui-anim layui-anim-up" style="table-layout: fixed;" lay-size="sm">
    <thead>
    <tr>
        <th>科室名称</th>
        <th>添加时间</th>
    </tr>
    </thead>
    <tbody>
    <?php if(is_array($departmentList)): foreach($departmentList as $k=>$vo): ?><tr class="rowData" index="<?php echo ($vo['id']); ?>">
            <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($vo['username']); ?></td>
            <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($vo['currtime']); ?></td>
        </tr><?php endforeach; endif; ?>
    </tbody>
</table>
</body>
<script src="<?php echo ($staticPath); ?>/layui/layui.js"></script>
</html>