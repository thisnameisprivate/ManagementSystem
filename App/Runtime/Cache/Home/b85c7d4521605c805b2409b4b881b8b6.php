<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="http://localhost/Thinkphp/Public/statics/layui/css/layui.css">
    <title>广元协和医院预约系统登录</title>
    <style media="screen">
        .login-from{position:fixed; top:0; left:0; right:0; bottom:0; margin:auto; height:200px; width:400px;}
    </style>
</head>
<body>
    <!-- 背景画布 -->
    <canvas id="canvas" style="position:absolute;width:100%;height:100%;"></canvas>
        <div class="login-from layui-anim layui-anim-up">
            <form class="layui-form" action="<?php echo U("Home/Index/logincheck");?>" method="post">
                <div class="layui-form-item">
                  <label class="layui-form-label"><span class="layui-icon layui-icon-user"></span></label>
                  <div class="layui-input-inline">
                    <input type="username" name="username" required lay-verify="required" placeholder="请输入账号" autocomplete="off" class="layui-input">
                  </div>
                  <div class="layui-form-mid layui-word-aux"></div>
                </div>
                  <div class="layui-form-item">
                    <label class="layui-form-label"><span class="layui-icon layui-icon-password"></span></label>
                    <div class="layui-input-inline">
                      <input type="password" name="password" required lay-verify="required" placeholder="请输入密码" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux"></div>
                  </div>
                  <div class="layui-form-item">
                    <div class="layui-input-block">
                      <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
                      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                    </div>
                  </div>
            </form>
        </div>
</body>
<script src="http://localhost/Thinkphp/Public/statics/layui/layui.js"></script>
<script src="http://localhost/Thinkphp/Public/statics/login_canvas.js"></script>
<script>
    layui.use('form', function(){
      var form = layui.form;

      form.on('submit(formDemo)', function(data){
        layer.msg(JSON.stringify(data.field));
      });
    });
</script>
</html>