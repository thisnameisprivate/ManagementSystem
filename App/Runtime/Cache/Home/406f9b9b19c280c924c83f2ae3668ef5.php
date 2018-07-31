<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>广元协和医院新媒体</title>
    <link rel="stylesheet" href="<?php echo ($staticPath); ?>/layui/css/layui.css">
    <style media="screen">
        /* 关闭iframe线条 */
        body{border:0px;}
        /* 关闭iframe的左边间距 */
        .layui-container{margin-left:0px;}
        /* 面包屑*/
        .layui-breadcrumb{visibility:visible;}
        .breadCrumbs{padding:10px; margin-bottom:20px;}
    </style>
</head>
<body>
    <div class="breadCrumbs">
        <span class="layui-breadcrumb" lay-separator="/">
          <a class="layui-anim-upbit" href="javascript:;">首页</a>
          <a><cite> <?php echo ($item); ?></cite></a>
        </span>
    </div>
    <div class="layui-container">
      <div class="layui-row">
        <div class="layui-col-md5">
            <div class="layui-card">
              <div class="layui-card-header layui-bg-green layui-anim layui-anim-up">挂号数据统计</div>
              <div class="layui-card-body layui-anim layui-anim-up">
                <p>明日:&nbsp;&nbsp;预计: <?php echo ($result['tommorday'][0]['count']); ?></p>
                <p>今日:&nbsp;&nbsp;总共: <?php echo ($result['terday'][0]['count']); ?>&nbsp;&nbsp;&nbsp;&nbsp;已到: <?php echo ($result['terdayArrived'][0]['count']); ?>&nbsp;&nbsp;&nbsp;&nbsp;未到: <?php echo ($result['terdayOutArrived'][0]['count']); ?></p>
                <p>昨天:&nbsp;&nbsp;总共: <?php echo ($result['yesterday'][0]['count']); ?>&nbsp;&nbsp;&nbsp;&nbsp;已到: <?php echo ($result['yesterdayArrived'][0]['count']); ?>&nbsp;&nbsp;&nbsp;&nbsp;未到: <?php echo ($result['yesterdayOutArrived'][0]['count']); ?></p>
                <p>本月:&nbsp;&nbsp;总共: <?php echo ($result['currMonth'][0]['count']); ?>&nbsp;&nbsp;&nbsp;&nbsp;已到: <?php echo ($result['currMonthArrived'][0]['count']); ?>&nbsp;&nbsp;&nbsp;&nbsp;未到: <?php echo ($result['currMonthOutArrived'][0]['count']); ?></p>
                <p>上月:&nbsp;&nbsp;总共: <?php echo ($result['yesterMonth'][0]['count']); ?>&nbsp;&nbsp;&nbsp;&nbsp;已到: <?php echo ($result['yesterMonthArrived'][0]['count']); ?>&nbsp;&nbsp;&nbsp;&nbsp;未到: <?php echo ($result['yesterMonthOutArrived'][0]['count']); ?></p>
              </div>
            </div>
        </div>
        <div class="layui-col-md1">&nbsp;</div>
        <div class="layui-col-md3">
            <div class="layui-card">
              <div class="layui-card-header layui-bg-blue layui-anim layui-anim-up">本月到院排行</div>
              <div class="layui-card-body layui-anim layui-anim-up">
                  <?php if(is_array($userSort)): foreach($userSort as $k=>$vo): ?><p><span class="layui-icon layui-icon-rate-solid layui-anim layui-anim-up" style="color:#FF5722;"></span>&nbsp;&nbsp;&nbsp;<?php echo ($vo['expert'] == null?'null':$vo['expert']); ?>&nbsp;&nbsp;&nbsp; <?php echo ($vo['count']); ?></p><?php endforeach; endif; ?>
              </div>
            </div>
        </div>
        <div class="layui-col-md3">
            <div class="layui-card">
              <div class="layui-card-header layui-bg-orange layui-anim layui-anim-up">本月预约排行榜</div>
              <div class="layui-card-body layui-anim layui-anim-up">
                  <?php if(is_array($currUserSortRese)): foreach($currUserSortRese as $k=>$vo): ?><p><span class="layui-icon layui-icon-rate-solid" style="color:#FF5722;"></span>&nbsp;&nbsp;&nbsp;<?php echo ($vo['expert'] == null?'null':$vo['expert']); ?>&nbsp;&nbsp;&nbsp; <?php echo ($vo['count']); ?></p><?php endforeach; endif; ?>
              </div>
            </div>
        </div>
      </div>

      <div class="layui-row">
        <div class="layui-col-md5">
            <div class="layui-card">
              <div class="layui-card-header layui-bg-red layui-anim layui-anim-up">预约未定数据统计</div>
              <div class="layui-card-body layui-anim layui-anim-up">
                  <p>明日:&nbsp;&nbsp;&nbsp;<?php echo ($checkCountRese['tommodayRese'][0]['count'] == null?'null':$checkCountRese['tommodayRese'][0]['count']); ?></p>
                  <p>今日:&nbsp;&nbsp;&nbsp;<?php echo ($checkCountRese['todayRese'][0]['count'] == null?'null':$checkCountRese['todayRese'][0]['count']); ?></p>
                  <p>昨天:&nbsp;&nbsp;&nbsp;<?php echo ($checkCountRese['terdayRese'][0]['count'] == null?'null':$checkCountRese['terdayRese'][0]['count']); ?></p>
                  <p>本月:&nbsp;&nbsp;&nbsp;<?php echo ($checkCountRese['currMonthRese'][0]['count'] == null?'null':$checkCountRese['currMonthRese'][0]['count']); ?></p>
                  <p>上月:&nbsp;&nbsp;&nbsp;<?php echo ($checkCountRese['yesterMonthRese'][0]['count'] == null?'null':$checkCountRese['yesterMonthRese'][0]['count']); ?></p>
              </div>
            </div>
        </div>
        <div class="layui-col-md1">&nbsp;</div>
        <div class="layui-col-md3">
            <div class="layui-card">
              <div class="layui-card-header layui-bg-blue layui-anim layui-anim-up">上月到院排行</div>
              <div class="layui-card-body layui-anim layui-anim-up">
                  <?php if(is_array($yesterUserSortArrival)): foreach($yesterUserSortArrival as $k=>$vo): ?><p><span class="layui-icon layui-icon-rate-solid" style="color:#FF5722;"></span>&nbsp;&nbsp;&nbsp;<?php echo ($vo['expert'] == null?'null':$vo['expert']); ?>&nbsp;&nbsp;&nbsp; <?php echo ($vo['count']); ?></p><?php endforeach; endif; ?>
              </div>
            </div>
        </div>
        <div class="layui-col-md3">
            <div class="layui-card">
              <div class="layui-card-header layui-bg-orange layui-anim layui-anim-up">上月预约排行榜</div>
              <div class="layui-card-body layui-anim layui-anim-up">
                  <?php if(is_array($yesterUserSortRese)): foreach($yesterUserSortRese as $k=>$vo): ?><p><span class="layui-icon layui-icon-rate-solid" style="color:#FF5722;"></span>&nbsp;&nbsp;&nbsp;<?php echo ($vo['expert'] == null?'null':$vo['expert']); ?>&nbsp;&nbsp;&nbsp; <?php echo ($vo['count']); ?></p><?php endforeach; endif; ?>
              </div>
            </div>
        </div>
      </div>
    </div>
</body>
<script src="<?php echo ($staticPath); ?>/layui/layui.js"></script>
</html>