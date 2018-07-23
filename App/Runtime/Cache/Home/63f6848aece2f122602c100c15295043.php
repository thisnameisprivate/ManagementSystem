<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo ($staticPath); ?>/layui/css/layui.css">
    <title>详情页面查看</title>
    <style media="screen">
        .border{border:1px solid #F0F0F0; height:700px;}
    </style>
</head>
<body>
    <div class="layui-container layui-anim layui-anim-up">
        <div class="layui-row">
          <div class="layui-col-md12">
              <div class="layui-card">
                <div class="layui-card-header layui-bg-gray">查看病人资料</div>
              </div>
          </div>
      </div>
        <div class="layui-row layui-col-space10">
            <div class="layui-col-md3">
                <table class="layui-table">
                  <colgroup>
                    <col width="150">
                    <col width="200">
                    <col>
                  </colgroup>
                  <thead>
                      <tr><td>基本资料</td></tr>
                  </thead>
                  <tbody>
                      <?php if(is_array($data)): foreach($data as $k=>$vo): ?><tr><td>姓名: <?php echo ($vo['name']); ?></td></tr>
                          <tr><td>性别: <?php echo ($vo['sex']); ?></td></tr>
                          <tr><td>年龄: <?php echo ($vo['old']); ?></td></tr>
                          <tr><td>电话: <?php echo ($vo['phone']); ?></td></tr>
                          <tr><td>QQ:  <?php echo ($vo['qq']); ?></td></tr>
                          <tr><td>专家号: <?php echo ($vo['expert']); ?></td></tr>
                          <tr><td>病患类型: <?php echo ($vo['diseases']); ?></td></tr>
                          <tr><td>预约时间: <?php echo ($vo['oldDate']); ?></td></tr>
                          <tr><td>媒体来源: <?php echo ($vo['fromAddress']); ?></td></tr>
                          <tr><td>赴约状态: <?php echo ($vo['status']); ?></td></tr>
                          <tr><td>赴约时间: <?php echo ($vo['newDate'] ? $vo['newDate'] : "未赴约"); ?></td></tr>
                          <tr><td>添加人: <?php echo ($vo['custService']); ?></td></tr>
                          <tr><td>资料添加时间: <?php echo ($vo['currentTime']); ?></td></tr><?php endforeach; endif; ?>
                  </tbody>
                </table>
            </div>
            <div class="layui-col-md3">
                <table class="layui-table">
                  <colgroup>
                    <col width="150">
                    <col width="200">
                    <col>
                  </colgroup>
                  <thead>
                      <tr><td>聊天记录</td></tr>
                  </thead>
                  <tbody>
                      <?php if(is_array($data)): foreach($data as $k=>$vo): ?><tr><td><?php echo ($vo[desc1]); ?></td></tr><?php endforeach; endif; ?>
                  </tbody>
                </table>
            </div>
            <div class="layui-col-md3">
                <table class="layui-table">
                  <colgroup>
                    <col width="150">
                    <col width="200">
                    <col>
                  </colgroup>
                  <thead>
                      <tr><td>回访记录</td></tr>
                  </thead>
                  <tbody>
                      <tr><td>待更改</td></tr>
                  </tbody>
                </table>
            </div>
            <div class="layui-col-md3">
                <table class="layui-table">
                  <colgroup>
                    <col width="150">
                    <col width="200">
                    <col>
                  </colgroup>
                  <thead>
                      <tr><td>备注资料</td></tr>
                  </thead>
                  <tbody>
                      <?php if(is_array($data)): foreach($data as $k=>$vo): ?><tr><td><?php echo ($vo[desc2]); ?></td></tr><?php endforeach; endif; ?>
                  </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>