<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>总体报表</title>
</head>
<body>
<div class="layui-container">
    <div class="layui-card layui-anim layui-anim-up">
        <div class="layui-card-header table"><?php echo ($tableFont); ?> - 数据统计</div>
        <div class="layui-card-body">
            按年份输出(最近3年总数据)
            <table class="layui-table layui-anim layui-anim-up" style="table-layout: fixed;" lay-size="sm">
                <thead>
                <tr>
                    <th>年份</th>
                    <th>预约</th>
                    <th>预到</th>
                    <th>已到</th>
                    <th>未到</th>
                </tr>
                </thead>
                <tbody>
                <tr class="rowData">
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($data['currYear']); ?></td>
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($data['currYearReser'][0]['count']); ?></td>
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($data['currYearAdvan'][0]['count']); ?></td>
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($data['currYearArrival'][0]['count']); ?></td>
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($data['currYearOutArrival'][0]['count']); ?></td>
                </tr>
                <tr class="rowData">
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($data['lastYear']); ?></td>
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($data['lastYearReser'][0]['count']); ?></td>
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($data['lastYearAdvan'][0]['count']); ?></td>
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($data['lastYearArrival'][0]['count']); ?></td>
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($data['lastYearOutArrival'][0]['count']); ?></td>
                </tr>
                <tr class="rowData">
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($data['beforeYear']); ?></td>
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($data['beforeYearReser'][0]['count']); ?></td>
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($data['beforeYearAdvan'][0]['count']); ?></td>
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($data['beforeYearArrival'][0]['count']); ?></td>
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($data['beforeYearOutArrival'][0]['count']); ?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>


    <div class="layui-card layui-anim layui-anim-up">
        <div class="layui-card-header table">按月份输出(最近12个月的数据)</div>
        <div class="layui-card-body">
            <table class="layui-table layui-anim layui-anim-up" style="table-layout: fixed;" lay-size="sm">
                <thead>
                <tr>
                    <th>年份</th>
                    <th>预约</th>
                    <th>预到</th>
                    <th>已到</th>
                    <th>未到</th>
                </tr>
                </thead>
                <tbody>
                <tr class="rowData">
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($month['currMonth']); ?></td>
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($month['currMonthReser'][0]['count']); ?></td>
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($month['currMonthAdvan'][0]['count']); ?></td>
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($month['currMonthArrival'][0]['count']); ?></td>
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($month['currMonthOutArrival'][0]['count']); ?></td>
                </tr>
                <tr class="rowData">
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($month['oneMonth']); ?></td>
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($month['oneMonthReser'][0]['count']); ?></td>
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($month['oneMonthAdvan'][0]['count']); ?></td>
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($month['oneMonthArrival'][0]['count']); ?></td>
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($month['oneMonthOutArrival'][0]['count']); ?></td>
                </tr>
                <tr class="rowData">
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($month['twoMonth']); ?></td>
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($month['twoMonthReser'][0]['count']); ?></td>
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($month['twoMonthAdvan'][0]['count']); ?></td>
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($month['twoMonthArrival'][0]['count']); ?></td>
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($month['twoMonthOutArrival'][0]['count']); ?></td>
                </tr>
                <tr class="rowData">
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($month['threeMonth']); ?></td>
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($month['threeMonthReser'][0]['count']); ?></td>
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($month['threeMonthAdvan'][0]['count']); ?></td>
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($month['threeMonthArrival'][0]['count']); ?></td>
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($month['threeMonthOutArrival'][0]['count']); ?></td>
                </tr>
                <tr class="rowData">
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($month['fourMonth']); ?></td>
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($month['fourMonthReser'][0]['count']); ?></td>
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($month['fourMonthAdvan'][0]['count']); ?></td>
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($month['fourMonthArrival'][0]['count']); ?></td>
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($month['fourMonthOutArrival'][0]['count']); ?></td>
                </tr>
                <tr class="rowData">
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($month['fiveMonth']); ?></td>
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($month['fiveMonthReser'][0]['count']); ?></td>
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($month['fiveMonthAdvan'][0]['count']); ?></td>
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($month['fiveMonthArrival'][0]['count']); ?></td>
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($month['fiveMonthOutArrival'][0]['count']); ?></td>
                </tr>
                <tr class="rowData">
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($month['sixMonth']); ?></td>
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($month['sixMonthReser'][0]['count']); ?></td>
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($month['sixMonthAdvan'][0]['count']); ?></td>
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($month['sixMonthArrival'][0]['count']); ?></td>
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo ($month['sixMonthOutArrival'][0]['count']); ?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>