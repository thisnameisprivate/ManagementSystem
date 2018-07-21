<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo ($staticPath); ?>/layui/css/layui.css">
    <title>图像报表</title>
    <style media="all">
        .auto-gif{height:200px; width:200px; margin:auto; position:fixed; top:0; left:0; right:0; bottom:0;}
        .auto-gif p{text-align:center; font-size:1rem; font-weight:700; color:#FF5722;}
    </style>
</head>
<body>
    <div class="layui-container">
        <div class="auto-gif">
            <p><img src="<?php echo ($staticPath); ?>/gif/development.gif" alt=""></p>
            <p>开发中...</p>
        </div>
    </div>
</body>
<script src="<?php echo ($staticPath); ?>/layui/layui.js"></script>
</html>