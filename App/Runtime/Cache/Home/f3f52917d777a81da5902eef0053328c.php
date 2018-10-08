<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>广元协和医院新媒体</title>
    <link rel="stylesheet" href="<?php echo ($staticPath); ?>/layui/css/layui.css">
    <style media="screen">
        .over{width:100px; overflow:hidden;}
    </style>
</head>
<body>
    <div class="layui-card layui-anim layui-anim-up">
      <div class="layui-card-header table" table="<?php echo ($table); ?>"><?php echo ($tableFont); ?> - 预约列表</div>
      <div class="layui-card-body">
        统计数据:<br>
        总共: <?php echo ($dataCount); ?> 条&nbsp;&nbsp;&nbsp;已到: <?php echo ($arrival); ?>&nbsp;&nbsp;&nbsp;未到: <?php echo ($notArrival); ?>
      </div>
    </div>
    <table class="layui-table layui-anim layui-anim-up" style="table-layout: fixed;" lay-size="sm">
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
          <?php if(is_array($data)): foreach($data as $k=>$vo): ?><tr class="rowData" Index="<?php echo ($vo['id']); ?>">
                  <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($vo['name']); ?></td>
                  <td><?php echo ($vo['sex']); ?></td>
                  <td><?php echo ($vo['old']); ?></td>
                  <td><?php echo ($vo['phone']); ?></td>
                  <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($vo['qq']); ?></td>
                  <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($vo['expert']); ?></td>
                  <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($vo['desc1']); ?></td>
                  <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($vo['oldDate']); ?></td>
                  <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($vo['diseases']); ?></td>
                  <td><?php echo ($vo['fromAddress']); ?></td>
                  <td><?php echo ($vo['switch']); ?></td>
                  <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($vo['desc2']); ?></td>
                  <td><?php echo ($vo['custService']); ?></td>
                  <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($vo['newDate']); ?></td>
                  <td><?php echo ($vo['status']); ?></td>
                  <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($vo['currentTime']); ?></td>
                  <td>
                      <a href="javascript:;" title="查看详情" class="layui-icon layui-icon-form more" style="color:#1E9FFF;"></a>
                      <a href="javascript:;" title="更改内容" class="layui-icon layui-icon-edit update" style="color:#FFB800;"></a>
                      <a href="javascript:;" title="删除此行" class="layui-icon layui-icon-delete delete" style="color:#FF5722;"></a>
                  </td>
              </tr><?php endforeach; endif; ?>
      </tbody>
    </table>

    <!-- <div class="layui-container"> -->
        <div class="layui-row layui-anim layui-anim-up">
            <div class="layui-col-md8">&nbsp;</div>
            <div class="layui-btn-group layui-col-md4">
                <button class="layui-btn layui-btn-xs layui-btn-primary">
                    <i class="layui-icon"><?php echo ($home? $home : "首页"); ?></i>
                </button>
                <button class="layui-btn layui-btn-xs layui-btn-primary">
                    <i class="layui-icon"><?php echo ($prev? $prev : "上一页"); ?></i>
                </button>
                <button class="layui-btn layui-btn-xs layui-btn-primary">
                    <i class="layui-icon"><?php echo ($next? $next : "下一页"); ?></i>
                </button>
                <button class="layui-btn layui-btn-xs layui-btn-primary">
                    <i class="layui-icon"><?php echo ($last_page? $last_page : "尾页"); ?></i>
                </button>
                <button class="layui-btn layui-btn-xs layui-btn-primary">
                    <i class="layui-icon">第<?php echo ($pageIndex); ?>/<?php echo ($total_pages); ?>页</i>
                </button>
                <button class="layui-btn layui-btn-xs layui-btn-primary">
                    <i class="layui-icon">每页<?php echo ($pageSize); ?>条</i>
                </button>
                <button class="layui-btn layui-btn-xs layui-btn-primary">
                    <i class="layui-icon">共<?php echo ($dataCount); ?>条</i>
                </button>
            </div>
        </div>
    <!-- </div> -->
    <div class="pageIndex" style="display:none;"><?php echo ($pageIndex); ?></div>
</body>
<script src="<?php echo ($staticPath); ?>/layui/layui.js"></script>
</html>