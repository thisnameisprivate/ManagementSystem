<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo ($staticPath); ?>/layui/css/layui.css">
    <title></title>
</head>
<body>

</body>

<script src="<?php echo ($staticPath); ?>/js/echarts.js"></script>
<script type="text/javascript">
    window.onload = function () {
        var myChart = echarts.init(document.getElementById('main'));

        var option = {
            title:{
                text: 'ECharts 入门实例'
            },
            tooltip:{},
            legend: {
                data: ["销量"],
            },
            xAxis: {
                data: ['衬衫', '羊毛衫', '雪纺衫', '裤子', '高跟鞋', '袜子'],
            },
            yAxis: {},
            series: [{
                name: "销量",
                type: "bar",
                data: [5, 20, 36, 10, 10, 20],
            }],
        };

        myChart.setOption(option);
    }
</script>
</html>