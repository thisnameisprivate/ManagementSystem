<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>广元协和医院预新媒体</title>
  <link rel="stylesheet" href="<?php echo ($staticPath); ?>/layui/css/layui.css">
  <style media="screen">
      iframe{border:0px;}
  </style>
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
  <div class="layui-header">
    <div class="layui-logo">广元协和医院预约挂号</div>
    <!-- 头部区域（可配合layui已有的水平导航） -->
    <ul class="layui-nav layui-layout-left">
    </ul>
    <ul class="layui-nav layui-layout-right">
        <li class="layui-nav-item">
          <a href="javascript:;" class="layui-anim layui-anim-up layui-this" id="classification">选择医院科室</a>
          <dl class="layui-nav-child">
              <dd class="layui-anim layui-anim-scaleSpring"><a href="javascript:;" onclick="readyHtml(this);" index="1">广元协和医院男科</a></dd>
              <dd class="layui-anim layui-anim-scaleSpring"><a href="javascript:;" onclick="readyHtml(this);" index="2">广元协和医院妇科</a></dd>
              <dd class="layui-anim layui-anim-scaleSpring"><a href="javascript:;" onclick="readyHtml(this);" index="3">广元协和医院不孕不育科</a></dd>
              <dd class="layui-anim layui-anim-scaleSpring"><a href="javascript:;" onclick="readyHtml(this);" index="4">广元协和医院其他</a></dd>
              <dd class="layui-anim layui-anim-scaleSpring"><a href="javascript:;" onclick="readyHtml(this);" index="5">广元协和医院计划生育科</a></dd>
              <dd class="layui-anim layui-anim-scaleSpring"><a href="javascript:;" onclick="readyHtml(this);" index="6">广元协和医院肛肠科</a></dd>
              <dd class="layui-anim layui-anim-scaleSpring"><a href="javascript:;" onclick="readyHtml(this);" index="7">广元协和医院微创外科</a></dd>
              <dd class="layui-anim layui-anim-scaleSpring"><a href="javascript:;" onclick="readyHtml(this);" index="8">广元协和医院微乳腺科</a></dd>
          </dl>
        </li>
      <li class="layui-nav-item">
        <a href="javascript:;">
          <img src="http://t.cn/RCzsdCq" class="layui-nav-img">
          admin
        </a>
        <dl class="layui-nav-child">
          <dd class="layui-anim layui-anim-scaleSpring"><a href="">基本资料</a></dd>
          <dd class="layui-anim layui-anim-scaleSpring"><a href="">安全设置</a></dd>
        </dl>
      </li>
      <li class="layui-nav-item">
        <a href="javascript:;">在线用户</a>
        <dl class="layui-nav-child">
          <dd class="layui-anim layui-anim-scaleSpring"><a href="">林鸿斌<span class="layui-badge-dot"></span></a></dd>
          <dd class="layui-anim layui-anim-scaleSpring"><a href="">叶慧<span class="layui-badge-dot"></span></a></dd>
          <dd class="layui-anim layui-anim-scaleSpring"><a href="">董鑫<span class="layui-badge-dot"></span></a></dd>
          <dd class="layui-anim layui-anim-scaleSpring"><a href="">admin<span class="layui-badge-dot layui-bg-blue"></span></a></dd>
        </dl>
      </li>
      <li class="layui-nav-item"><a href="">注销</a></li>
    </ul>
  </div>

  <div class="layui-side layui-bg-black">
    <div class="layui-side-scroll">
      <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
      <ul class="layui-nav layui-nav-tree"  lay-filter="test">
        <li class="layui-nav-item layui-nav-itemed">
          <a class="" href="javascript:;">病人预约管理</a>
          <dl class="layui-nav-child">
            <dd><a class="active" href="javascript:;" onclick="readytab(this);">预约登记列表</a></dd>
            <dd><a class="active" href="javascript:;" onclick="readytab(this);">预约病人搜索</a></dd>
            <dd><a class="active" href="javascript:;" onclick="readytab(this);">重复病人查询</a></dd>
            <dd><a class="active" href="javascript:;" onclick="readytab(this);">客服明细报表</a></dd>
            <dd><a class="active" href="javascript:;" onclick="readytab(this);">月趋势报表</a></dd>
            <dd><a class="active" href="javascript:;" onclick="readytab(this);">自定义图像报表</a></dd>
            <dd><a class="active" href="javascript:;" onclick="readytab(this);">导出病人数据</a></dd>
            <dd><a class="active" href="javascript:;" onclick="readytab(this);">数据横向对比</a></dd>
            <dd><a class="active" href="javascript:;" onclick="readytab(this);">添加新的病人资料</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item">
          <a href="javascript:;">访客数据统计</a>
          <dl class="layui-nav-child">
            <dd><a href="javascript:;">数据明细（网络）</a></dd>
            <dd><a href="javascript:;">医院项目设置（网络）</a></dd>
            <dd><a href="javascript:;">数据明细（电话）</a></dd>
            <dd><a href="javascript:;">医院项目设置（电话）</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item">
          <a href="javascript:;">网站挂号管理</a>
          <dl class="layui-nav-child">
            <dd><a href="javascript:;">网站挂号列表</a></dd>
            <dd><a href="javascript:;">网站挂号设置</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item">
          <a href="javascript:;">数据列表</a>
          <dl class="layui-nav-child">
            <dd><a class="active" href="javascript:;" onclick="readytab(this);">总体报表</a></dd>
            <dd><a class="active" href="javascript:;" onclick="readytab(this);">性别</a></dd>
            <dd><a class="active" href="javascript:;" onclick="readytab(this);">年龄</a></dd>
            <dd><a class="active" href="javascript:;" onclick="readytab(this);">病患类型</a></dd>
            <dd><a class="active" href="javascript:;" onclick="readytab(this);">媒体来源</a></dd>
            <dd><a class="active" href="javascript:;" onclick="readytab(this);">来院状态</a></dd>
            <dd><a class="active" href="javascript:;" onclick="readytab(this);">接待医生</a></dd>
            <dd><a class="active" href="javascript:;" onclick="readytab(this);">客服</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item">
          <a href="javascript:;">设置</a>
          <dl class="layui-nav-child">
            <dd><a href="javascript:;">医生设置</a></dd>
            <dd><a href="javascript:;">疾病设置</a></dd>
            <dd><a href="javascript:;">就诊类型设置</a></dd>
            <dd><a href="javascript:;">医院科室设置</a></dd>
            <dd><a href="javascript:;">搜索引擎设置</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item">
          <a href="javascript:;">我的资料</a>
          <dl class="layui-nav-child">
            <dd><a href="javascript:;">修改我的资料</a></dd>
            <dd><a href="javascript:;">修改密码</a></dd>
            <dd><a href="javascript:;">选项设置</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item">
          <a href="javascript:;">系统管理</a>
          <dl class="layui-nav-child">
            <dd><a href="javascript:;">人员管理</a></dd>
            <dd><a href="javascript:;">权限管理</a></dd>
            <dd><a href="javascript:;">医院列表</a></dd>
            <dd><a href="javascript:;">通知列表</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item">
          <a href="javascript:;">日志记录</a>
          <dl class="layui-nav-child">
            <dd><a href="javascript:;">操作日志</a></dd>
            <dd><a href="javascript:;">登录错误日志</a></dd>
          </dl>
        </li>
      </ul>
    </div>
  </div>

  <div class="layui-body" style="overflow:hidden;">
    <!-- 内容主体区域 -->
    <iframe id="page" src="<?php echo U('Home/Index/ready');?>" width="100%;" height="100%;"></iframe>

    </div>
  </div>

  <div class="layui-footer">
    <!-- 底部固定区域 -->
    © 广元协和医院
  </div>
</div>
<script type="text/javascript">

/* 读取新的医院首页  */
    function readyHtml (currElement) {
        /* 获取选择科室对象 */
        let ification = document.getElementById('classification');
        // 获取当前选择的医院对象下标
        let id = parseInt(currElement.getAttribute('index'));
        let actives = document.getElementsByClassName('active');


        /* 设置选择科室对象内容为当前选择的选项 */
        ification.innerHTML = currElement.innerText + "<span class='layui-nav-more'></span>";


        /* 设置当前医院科室下的功能下标 */
        for (let i = 0; i < actives.length; i ++) {
            actives[i].setAttribute('index', id);
            actives[i].setAttribute('tab', i);
        }


        let Request = new XMLHttpRequest();
        Request.open("GET", "<?php echo U('Home/Index/ready/id/"+ id +"');?>");
        Request.send();
        Request.onreadystatechange = function () {
            if (Request.readyState == 4 && Request.status == 200) {
                // iframe加载新的数据页面
                document.getElementById('page').contentWindow.document.body.innerHTML = Request.responseText;
            }
        }
    }

/* 读取新的医院表格页面 */
    function readytab (currElement) {
        // 获取当前选择的服务对象
        let index = parseInt(currElement.getAttribute('index'));
        let tab = parseInt(currElement.getAttribute('tab'));
        let Request = new XMLHttpRequest();


        if (isNaN(index)) { alert("请先选择医院!"); return false;}
        if (tab == 8) {
            /* 页面跳转传递给后台要添加数据的表格id */
            Request.open("GET", "<?php echo U('Home/Index/insertShow/id/"+ index +"');?>");
            Request.send();
            Request.onreadystatechange = function () {
                if (Request.readyState == 4 && Request.status == 200) {
                    console.log(Request.responseText);
                    document.getElementById('page').contentWindow.document.body.innerHTML = Request.responseText;
                }
            }

        } else {

            Request.open("GET", "<?php echo ('Home/Index/showTab/id/"+ index +"');?>");
            Request.send();
            Request.onreadystatechange = function () {
                if (Request.readyState == 4 && Request.status == 200) {
                    // iframe加载新的数据页面
                    document.getElementById('page').contentWindow.document.body.innerHTML = Request.responseText;
                }
            }
        }
    }
</script>
<script src="<?php echo ($staticPath); ?>/layui/layui.js"></script>
<script>
    layui.use('element', function(){
      var element = layui.element;
    });
</script>
</body>
</html>