<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="<?php echo ($staticPath); ?>/js/echart.js"></script>
    <script src="<?php echo ($staticPath); ?>/js/macarons.js"></script>
    <title>月趋势报表</title>
    <style>
        .container{height:800px; width:100%; position:fixed; top:0; left:0; bottom:0; right:0; margin:auto;}
        .pieBar{float:left; width:30%; height:100%;}
        .line{float:right; width:70%; height:100%;}
    </style>
</head>
<body>
    <div class="container">
        <div class="pieBar">
            <div id="pie" style="width:100%; height:400px;"></div>
            <div id="bar" style="width:100%; height:400px;"></div>
        </div>
        <div class="line">
            <div id="line" style="width:100%; height:100%;"></div>
        </div>
    </div>
</body>
<script type="text/javascript">
    let myChartPie = echarts.init(document.getElementById('pie'), 'macarons');
    let myChartBar = echarts.init(document.getElementById('bar'), 'macarons');
    let myChartLine = echarts.init(document.getElementById('line'), 'macarons');



    // 使用刚指定的配置项和数据显示图表。
    myChartPie.setOption({
        tooltip: {},
        legend: {
            orient: 'vertical',
            x: 'left',
            data: ['预约', '预到', '已到', '未到', '全流失', '半流失', '已诊治'],
        },
        series: [
            {
                name: '本月数据',
                type: 'pie',
                radius: '55%',
                data: [
                    {value: <?php echo ($currMonthReser[0]['count']); ?>, name: '预约'},
                    {value: <?php echo ($currMonthAdvan[0]['count']); ?>, name: '预到'},
                    {value: <?php echo ($currMonthArrival[0]['count']); ?>, name: '已到'},
                    {value: <?php echo ($currMonthOutArrival[0]['count']); ?>, name: '未到'},
                    {value: <?php echo ($currMonthTotal[0]['count']); ?>, name: '全流失'},
                    {value: <?php echo ($currMonthHalf[0]['count']); ?>, name: '半流失'},
                    {value: <?php echo ($currMonthTreat[0]['count']); ?>, name: '已诊治'}
                ],
            }
        ],
    });

    // 柱状图
    myChartBar.setOption({
        tooltip: {},
        legend: {
            data: ['本月数据'],
        },
        xAxis: {
            data: ['预约', '预到', '已到', '未到', '全流失', '半流失', '已诊治'],
        },
        yAxis: {},
        series: [{
            name: '本月数据',
            type: 'bar',
            data: [<?php echo ($currMonthReser[0]['count']); ?>, <?php echo ($currMonthAdvan[0]['count']); ?>, <?php echo ($currMonthArrival[0]['count']); ?>, <?php echo ($currMonthOutArrival[0]['count']); ?>, <?php echo ($currMonthTotal[0]['count']); ?>, <?php echo ($currMonthHalf[0]['count']); ?>, <?php echo ($currMonthTreat[0]['count']); ?>],
        }],
    });

    // 趋势线性图
    myChartLine.setOption({
        title: {
            text: '近6个月的数据'
        },
        tooltip: {
            trigger: 'axis'
        },
        legend: {
            data:['预约', '预到', '已到', '未到', '全流失', '半流失', '已诊治']
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true
        },
        toolbox: {
            feature: {
                saveAsImage: {}
            }
        },
        xAxis: {
            type: 'category',
            boundaryGap: false,
            data: [<?php echo ($month['currMonth']); ?>, <?php echo ($month['oneMonth']); ?>, <?php echo ($month['twoMonth']); ?>, <?php echo ($month['threeMonth']); ?>, <?php echo ($month['fourMonth']); ?>, <?php echo ($month['fiveMonth']); ?>, <?php echo ($month['sixMonth']); ?>]
        },
        yAxis: {
            type: 'value'
        },
        series: [
            {
                name:'预约',
                type:'line',
                stack: '总量',
                data:[$currMonthReser[0]['count']}, 132, 101, 134, 90, 230, 210]
            },
            {
                name:'预到',
                type:'line',
                stack: '总量',
                data:[<?php echo ($currMonthAdvan[0]['count']); ?>, 182, 191, 234, 290, 330, 310]
            },
            {
                name:'已到',
                type:'line',
                stack: '总量',
                data:[<?php echo ($currMonthArrival[0]['count']); ?>, 232, 201, 154, 190, 330, 410]
            },
            {
                name:'未到',
                type:'line',
                stack: '总量',
                data:[<?php echo ($currMonthOutArrival[0]['count']); ?>, 332, 301, 334, 390, 330, 320]
            }
        ]
    });

</script>
</html>