<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>广元协和医院新媒体</title>
    <link rel="stylesheet" href="<?php echo ($staticPath); ?>/layui/css/layui.css">
    <style media="screen">
        /* .ovhid{white-space: nowrap;text-overflow: ellipsis;overflow: hidden;} 超出隐藏 */
    </style>
</head>
<body>
    <table class="layui-table" style="color:#1E9FFF;" lay-size="sm">
      <thead>
        <tr>
          <th>姓名</th>
          <th>性别</th>
          <th>年龄</th>
          <th>电话</th>
          <th>QQ</th>
          <th>专家号</th>
          <th>咨询内容</th>
          <th>预约时间</th>
          <th>病患类型</th>
          <th>媒体来源</th>
          <th>地区</th>
          <th>备注</th>
          <th>客服</th>
          <th>回访</th>
          <th>赴约情况</th>
          <th>添加时间</th>
          <th>操作</th>
        </tr>
      </thead>
      <tbody>
          <?php if(is_array($data)): foreach($data as $k=>$vo): ?><tr>
                  <td><?php echo ($vo['name']); ?></td>
                  <td><?php echo ($vo['sex']); ?></td>
                  <td><?php echo ($vo['old']); ?></td>
                  <td><?php echo ($vo['phone']); ?></td>
                  <td><?php echo ($vo['qq']); ?></td>
                  <td><?php echo ($vo['expert']); ?></td>
                  <td><?php echo ($vo['desc1']); ?></td>
                  <td><?php echo ($vo['oldDate']); ?></td>
                  <td><?php echo ($vo['diseases']); ?></td>
                  <td><?php echo ($vo['fromAddress']); ?></td>
                  <td><?php echo ($vo['switch']); ?></td>
                  <td><?php echo ($vo['desc2']); ?></td>
                  <td>待更改</td>
                  <td>待更改</td>
                  <td><?php echo ($vo['status']); ?></td>
                  <td><?php echo ($vo['newDate']); ?></td>
              </tr><?php endforeach; endif; ?>
      </tbody>
    </table>
</body>
<script src="<?php echo ($staticPath); ?>/layui/layui.js"></script>
</html>