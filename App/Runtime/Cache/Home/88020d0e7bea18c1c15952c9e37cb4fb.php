<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo ($staticPath); ?>/layui/css/layui.css">
    <title>导出病人数据</title>
</head>
<body>
<div class="layui-container">
    <div class="layui-row">
        <div class="layui-col-md12">
            <div class="layui-card">
                <div class="layui-card-header layui-bg-blue">导出病人信息</div>
            </div>
        </div>
    </div>
    <form class="layui-form layui-form-pane" method="post" action="<?php echo U('Home/Index/exportCheck/id/' . $id);?>">
        <div class="layui-form-item">
            <label class="layui-form-label">时间类型</label>
            <div class="layui-input-inline">
                <select name="date" lay-verify="required">
                    <option value=""></option>
                    <option value="0">到院时间</option>
                    <option value="1">添加时间</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">开始时间</label>
            <div class="layui-inline">
                <input name="startDate" type="text" class="layui-input" id="date">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">结束时间</label>
            <div class="layui-inline">
                <input name="endDate" type="text" class="layui-input" id="date2">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">是否到院</label>
            <div class="layui-input-inline">
                <select name="arrival" lay-verify="required">
                    <option value=""></option>
                    <option value="0">不限</option>
                    <option value="1">已到</option>
                    <option value="2">未到</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">字段选择</label>
            <input type="checkbox" name="name" title="姓名">
            <input type="checkbox" name="sex" title="性别">
            <input type="checkbox" name="old" title="年龄">
            <input type="checkbox" name="phone" title="电话号码">
            <input type="checkbox" name="expert" title="专家号">
            <input type="checkbox" name="diseases" title="疾病类型">
            <input type="checkbox" name="desc1" title="咨询内容">
            <input type="checkbox" name="fromAddress" title="媒体来源">
            <input type="checkbox" name="desc2" title="备注">
            <input type="checkbox" name="custService" title="客服">
            <input type="checkbox" name="oldDate" title="预约时间">
            <input type="checkbox" name="currentTime" title="添加时间">
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit lay-filter="formDemo">导出数据</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>
</div>
</body>
<script src="<?php echo ($staticPath); ?>/layui/layui.js"></script>
<script>
    layui.use(['form', 'laydate'], function(){
        var form = layui.form;
        var laydate = layui.laydate;

        form.render();
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
    });
</script>
</html>