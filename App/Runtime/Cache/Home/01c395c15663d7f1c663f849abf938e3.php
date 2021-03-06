<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>添加新的病人资料</title>
    <link rel="stylesheet" href="<?php echo ($staticPath); ?>/layui/css/layui.css">
    <link rel="icon" href="<?php echo ($staticPath); ?>/images/hospital.ico" type="image/x-icon">
    <style media="screen">
        .layui-container{ border: 1px solid #ccc;}
    </style>
</head>
<body>
<div class="layui-container">
    <div class="layui-row">
      <div class="layui-col-md12">
          <div class="layui-card">
            <div class="layui-card-header layui-bg-blue"><?php echo ($item); ?></div>
            <div class="layui-card-body">
                <p>提示: </p>
                <p>1. 姓名必须填写; 2. 电话号码必须填写; 3. 未尽资料填写于备注中; </p>
            </div>
          </div>
      </div>
    </div>
    <form class="layui-form" action="<?php echo U('Admin/Index/index/id/' . $id);?>" method="post">
        <div class="layui-form-item">
          <label class="layui-form-label">姓名</label>
          <div class="layui-input-inline">
            <input type="text" name="name" required lay-verify="required" placeholder="请输入姓名" autocomplete="off" class="layui-input">
          </div>
          <div class="layui-form-mid layui-word-aux">必填</div>
        </div>
      <div class="layui-form-item">
        <label class="layui-form-label">年龄</label>
        <div class="layui-input-inline">
          <input type="number" name="old" required lay-verify="required" placeholder="请输入年龄" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-form-mid layui-word-aux">必填</div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">电话</label>
        <div class="layui-input-inline">
          <input type="number" name="phone" required lay-verify="required" placeholder="请输入电话" value="000000" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-form-mid layui-word-aux"></div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">QQ</label>
        <div class="layui-input-inline">
          <input type="number" name="qq" required lay-verify="required" placeholder="请输入QQ" value="000000" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-form-mid layui-word-aux"></div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">病患类型</label>
        <div class="layui-input-inline">
          <select name="diseases" lay-verify="required">
            <!-- foreach 病种选择 -->
            <?php if(is_array($diseases)): foreach($diseases as $k=>$vo): ?><option value="<?php echo ($k); ?>"><?php echo ($vo['diseases']); ?></option><?php endforeach; endif; ?>
          </select>
        </div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">就诊来源</label>
        <div class="layui-input-inline">
          <select name="fromAddress" lay-verify="required">
            <!-- 来源渠道选择 -->
            <?php if(is_array($address)): foreach($address as $k=>$vo): ?><option value="<?php echo ($k); ?>"><?php echo ($vo['fromaddress']); ?></option><?php endforeach; endif; ?>
          </select>
        </div>
      </div>

      <div class="layui-form-item">
        <label class="layui-form-label">是否本市</label>
        <div class="layui-input-block">
          <input type="checkbox" name="switch" lay-skin="switch">
        </div>
        <div class="layui-form-mid layui-word-aux">可选(默认为其他市)</div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">是男是女?</label>
        <div class="layui-input-block">
          <input type="radio" name="sex" value="男" title="男" checked>
          <input type="radio" name="sex" value="女" title="女">
        </div>
      </div>
      <div class="layui-form-item layui-form-text">
        <label class="layui-form-label">咨询内容</label>
        <div class="layui-input-block">
          <textarea name="desc1" placeholder="请输入内容" value="默认为空" required lay-verify="required" class="layui-textarea"></textarea>
        </div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">专家号</label>
        <div class="layui-input-inline">
          <input type="text" name="expert" required lay-verify="required" placeholder="一般为你名字的缩写" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-form-mid layui-word-aux">必填</div>
      </div>
      <div class="layui-form-item">
          <label class="layui-form-label">预约时间</label>
          <div class="layui-inline">
              <input name="oldDate" type="text" class="layui-input" id="date">
          </div>
      </div>
      <div class="layui-form-item layui-form-text">
        <label class="layui-form-label">备注</label>
        <div class="layui-input-block">
          <textarea name="desc2" placeholder="其他备注信息" class="layui-textarea"></textarea>
        </div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">赴约状态</label>
        <div class="layui-input-inline">
          <select name="status" lay-verify="required">
            <!-- foreach 病种选择 -->
            <?php if(is_array($status)): foreach($status as $k=>$vo): ?><option value="<?php echo ($k); ?>"><?php echo ($vo['status']); ?></option><?php endforeach; endif; ?>
          </select>
        </div>
      </div>

        <div class="layui-form-item">
            <label class="layui-form-label">赴约时间</label>
            <div class="layui-inline">
                <input name="newDate" type="text" class="layui-input" id="date2">
            </div>
        </div>

      <div class="layui-form-item">
        <div class="layui-input-block">
          <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
          <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
      </div>
    </form>
</div>
<script src="<?php echo ($staticPath); ?>/layui/layui.js"></script>
<script>
    // layui demo.
        layui.use(['form', 'laydate'], function(){

            var form = layui.form;
            var laydate = layui.laydate;

            laydate.render({
                elem: '#date'
            });
            laydate.render({
                elem: '#date2'
            })

            //监听提交
            form.on('submit(formDemo)', function(data){
                // layer.msg(JSON.stringify(data.field));
            });

            form.render();
    });



</script>
</body>
</html>