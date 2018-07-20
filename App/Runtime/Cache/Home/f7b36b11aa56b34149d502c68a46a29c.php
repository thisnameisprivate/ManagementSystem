<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>layui</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
 <link rel="stylesheet" href="<?php echo ($staticPath); ?>/layui/css/layui.css">
  <style type="text/css"></style>
</head>
<body>
    <div class="layui-card layui-anim layui-anim-up">
      <div class="layui-card-header"><?php echo ($item); ?></div>
      <div class="layui-card-body">
          <table class="layui-table" style="table-layout: fixed;" lay-size="sm">
            <thead>
              <tr>
                <th></th>
                <th colspan="3">今日</th>
                <th></th>
                <th colspan="3">昨日</th>
                <th></th>
                <th colspan="3">本月</th>
                <th></th>
                <th colspan="3">上月</th>
              </tr>
              <tr>
                  <th>客服</th>
                  <th>总共</th>
                  <th>已到</th>
                  <th>未到</th>
                  <th></th>
                  <th>总共</th>
                  <th>已到</th>
                  <th>未到</th>
                  <th></th>
                  <th>总共</th>
                  <th>已到</th>
                  <th>未到</th>
                  <th></th>
                  <th>总共</th>
                  <th>已到</th>
                  <th>未到</th>
              </tr>
            </thead>
            <tbody>
            <?php if(is_array($result)): foreach($result as $k=>$vo): ?><tr>
                    <th><?php echo ($vo['username']); ?></th>
                    <th><?php echo ($vo['terday'][0]['count']); ?></th>
                    <th><?php echo ($vo['terdayArrived'][0]['count']); ?></th>
                    <th><?php echo ($vo['terdayOutArrived'][0]['count']); ?></th>
                    <th></th>
                    <th><?php echo ($vo['yesterday'][0]['count']); ?></th>
                    <th><?php echo ($vo['yesterdayArrived'][0]['count']); ?></th>
                    <th><?php echo ($vo['yesterdayOutArrived'][0]['count']); ?></th>
                    <th></th>
                    <th><?php echo ($vo['currMonth'][0]['count']); ?></th>
                    <th><?php echo ($vo['currMonthArrived'][0]['count']); ?></th>
                    <th><?php echo ($vo['currMonthOutArrived'][0]['count']); ?></th>
                    <th></th>
                    <th><?php echo ($vo['yesterMonth'][0]['count']); ?></th>
                    <th><?php echo ($vo['yesterMonthArrived'][0]['count']); ?></th>
                    <th><?php echo ($vo['yesterMonthOutArrived'][0]['count']); ?></th>
                </tr><?php endforeach; endif; ?>
            </tbody>
          </table>
      </div>
    </div>
</body>
</html>