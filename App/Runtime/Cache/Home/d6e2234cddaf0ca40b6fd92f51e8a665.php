<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>数据横向对比页</title>
    <script src="<?php echo ($staticPath); ?>/js/echart.js"></script>
    <script src="<?php echo ($staticPath); ?>/js/macarons.js"></script>
    <style>
        #line {height:800px; width:100%;}
    </style>
</head>
<body>
<div class="layui-container">
    <div class="layui-card">
        <div class="layui-card-header">各月同期数据对比(近7月每月到院数据)</div>
        <div class="layui-card-body" style="color:#FF5722;">
            (提醒：由于本页面查询的数据量太大，严重占用服务器资源，请尽量减少刷新。)
        </div>
    </div>
</div>
    <div id="line"></div>
</body>
<script type="text/javascript">
    let myChartLine = echarts.init(document.getElementById('line'), 'mmacarons');
    // 时间函数
    function getTime (x) {
        let date = new Date();
        date.setMonth((date.getMonth() + 1) - x);
        let year = date.getFullYear();
        let month = date.getMonth();

        if (month < 10) {
            month = '0' + month;
        }
        return year + '-' + month;
    }
    // 趋势线性图
    myChartLine.setOption({
        title: {
            text: '近7个月的数据'
        },
        tooltip: {
            trigger: 'axis'
        },
        legend: {
            data: ['广元协和医院男科', '广元协和医院妇科', '广元协和医院不孕不育', '广元协和医院其他', '广元协和医院计划生育科', '广元协和医院肛肠科', '广元协和医院微创外科', '广元协和医院乳腺科'],
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true
        },
        toolbox: {
            feature: {
                saveAsImage: {},
            },
        },
        xAxis: {
            type: 'category',
            boundarGap: false,
            data: [getTime(7), getTime(6), getTime(5), getTime(4), getTime(3), getTime(2), getTime(1)],
        },
        yAxis: {
            type: 'value',
        },
        series: [
            {
                name: '广元协和医院男科',
                type: 'line',
                stack: '总量',
                data: [<?php echo ($arrival['sixArrival']['nk'][0]['count']); ?>, <?php echo ($arrival['fiveArrival']['nk'][0]['count']); ?>, <?php echo ($arrival['fourArrival']['nk'][0]['count']); ?>, <?php echo ($arrival['threeArrival']['nk'][0]['count']); ?>, <?php echo ($arrival['twoArrival']['nk'][0]['count']); ?>, <?php echo ($arrival['oneArrival']['nk'][0]['count']); ?>, <?php echo ($arrival['currArrival']['nk'][0]['count']); ?>],
            },
            {
                name: '广元协和医院妇科',
                type: 'line',
                stack: '总量',
                data: [<?php echo ($arrival['sixArrival']['fk'][0]['count']); ?>, <?php echo ($arrival['fiveArrival']['fk'][0]['count']); ?>, <?php echo ($arrival['fourArrival']['fk'][0]['count']); ?>, <?php echo ($arrival['threeArrival']['fk'][0]['count']); ?>, <?php echo ($arrival['twoArrival']['fk'][0]['count']); ?>, <?php echo ($arrival['oneArrival']['fk'][0]['count']); ?>, <?php echo ($arrival['currArrival']['fk'][0]['count']); ?>],
            },
            {
                name: '广元协和医院不孕不育',
                type: 'line',
                stack: '总量',
                data: [<?php echo ($arrival['sixArrival']['byby'][0]['count']); ?>, <?php echo ($arrival['fiveArrival']['byby'][0]['count']); ?>, <?php echo ($arrival['fourArrival']['byby'][0]['count']); ?>, <?php echo ($arrival['threeArrival']['byby'][0]['count']); ?>, <?php echo ($arrival['twoArrival']['byby'][0]['count']); ?>, <?php echo ($arrival['oneArrival']['byby'][0]['count']); ?>, <?php echo ($arrival['currArrival']['byby'][0]['count']); ?>],
            },
            {
                name: '广元协和医院其他',
                type: 'line',
                stack: '总量',
                data: [<?php echo ($arrival['sixArrival']['other'][0]['count']); ?>, <?php echo ($arrival['fiveArrival']['other'][0]['count']); ?>, <?php echo ($arrival['fourArrival']['other'][0]['count']); ?>, <?php echo ($arrival['threeArrival']['other'][0]['count']); ?>, <?php echo ($arrival['twoArrival']['other'][0]['count']); ?>, <?php echo ($arrival['oneArrival']['other'][0]['count']); ?>, <?php echo ($arrival['currArrival']['other'][0]['count']); ?>],
            },
            {
                name: '广元协和医院计划生育科',
                type: 'line',
                stack: '总量',
                data: [<?php echo ($arrival['sixArrival']['jhsy'][0]['count']); ?>, <?php echo ($arrival['fiveArrival']['jhsy'][0]['count']); ?>, <?php echo ($arrival['fourArrival']['jhsy'][0]['count']); ?>, <?php echo ($arrival['threeArrival']['jhsy'][0]['count']); ?>, <?php echo ($arrival['twoArrival']['jhsy'][0]['count']); ?>, <?php echo ($arrival['oneArrival']['jhsy'][0]['count']); ?>, <?php echo ($arrival['currArrival']['jhsy'][0]['count']); ?>],
            },
            {
                name: '广元协和医院肛肠科',
                type: 'line',
                stack: '总量',
                data: [<?php echo ($arrival['sixArrival']['gck'][0]['count']); ?>, <?php echo ($arrival['fiveArrival']['gck'][0]['count']); ?>, <?php echo ($arrival['fourArrival']['gck'][0]['count']); ?>, <?php echo ($arrival['threeArrival']['gck'][0]['count']); ?>, <?php echo ($arrival['twoArrival']['gck'][0]['count']); ?>, <?php echo ($arrival['oneArrival']['gck'][0]['count']); ?>, <?php echo ($arrival['currArrival']['gck'][0]['count']); ?>],
            },
            {
                name: '广元协和医院微创外科',
                type: 'line',
                stack: '总量',
                data: [<?php echo ($arrival['sixArrival']['wcwk'][0]['count']); ?>, <?php echo ($arrival['fiveArrival']['wcwk'][0]['count']); ?>, <?php echo ($arrival['fourArrival']['wcwk'][0]['count']); ?>, <?php echo ($arrival['threeArrival']['wcwk'][0]['count']); ?>, <?php echo ($arrival['twoArrival']['wcwk'][0]['count']); ?>, <?php echo ($arrival['oneArrival']['wcwk'][0]['count']); ?>, <?php echo ($arrival['currArrival']['wcwk'][0]['count']); ?>],
            },
            {
                name: '广元协和医院乳腺科',
                type: 'line',
                stack: '总量',
                data: [<?php echo ($arrival['sixArrival']['rxk'][0]['count']); ?>, <?php echo ($arrival['fiveArrival']['rxk'][0]['count']); ?>, <?php echo ($arrival['fourArrival']['rxk'][0]['count']); ?>, <?php echo ($arrival['threeArrival']['rxk'][0]['count']); ?>, <?php echo ($arrival['twoArrival']['rxk'][0]['count']); ?>, <?php echo ($arrival['oneArrival']['rxk'][0]['count']); ?>, <?php echo ($arrival['currArrival']['rxk'][0]['count']); ?>],
            },
        ],
    });
</script>
</html>