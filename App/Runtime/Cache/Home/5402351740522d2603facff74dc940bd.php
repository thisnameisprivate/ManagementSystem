<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>数据导出页面</title>
</head>
<body>
<?php if(is_array($result)): foreach($result as $k=>$vo): if(is_array($vo)): foreach($vo as $key=>$val): echo ($val); ?>&nbsp;&nbsp;<?php endforeach; endif; ?>
    <br><?php endforeach; endif; ?>
</body>
</html>