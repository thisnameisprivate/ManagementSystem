<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>病人搜索</title>
    <link rel="stylesheet" href="<?php echo ($staticPath); ?>/layui/css/layui.css">
    <style media="screen">
        .layui-container{ border: 1px solid #ccc;}
    </style>
</head>
<body>
    <div class="layui-card layui-anim layui-anim-up">
      <div class="layui-card-header"><?php echo ($tableFont); ?> - 病人搜索 & 重复病人查询</div>
      <div class="layui-card-body">
        <p>提示:</p>
        <p>搜索项为必填字段【一般为病人的姓名】否则可能查询不到该信息</p>
      </div>
    </div>
    <form class="layui-form layui-card layui-anim layui-anim-up" action="<?php echo U('Home/Index/checkPeople/table/' . $table . '/id/'. $id);?>" method="post">
        <div class="layui-form-item">
          <label class="layui-form-label">关键词</label>
          <div class="layui-input-inline">
            <input type="text" name="name" required lay-verify="required" placeholder="请输入姓名" autocomplete="off" class="layui-input">
          </div>
          <div class="layui-form-mid layui-word-aux">必填</div>
        </div>
      <div class="layui-form-item">
        <div class="layui-input-block">
          <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
          <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
      </div>
    </form>
<script src="<?php echo ($staticPath); ?>/layui/layui.js"></script>
<script>
window.onload = function () {
    // layui demo.
        layui.use('from', function(){

            var form = layui.form;
            form.render();

            //监听提交
            form.on('submit(formDemo)', function(data){
                // layer.msg(JSON.stringify(data.field));
            });
    });
}
</script>
</body>
</html>