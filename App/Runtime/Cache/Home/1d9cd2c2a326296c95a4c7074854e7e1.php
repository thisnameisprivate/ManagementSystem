<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>权限不足</title>
    <style media="all">
        .auto-gif{height:200px; width:200px; margin:auto; position:fixed; top:0; left:0; right:0; bottom:0;}
        .auto-gif p{text-align:center; font-size:1rem; font-weight:700; color:#FF5722;}
    </style>
</head>
<body>
    <div class="auto-gif">
        <p><img src="<?php echo ($staticPath); ?>/gif/access.gif" alt=""></p>
    </div>
</body>
</html>