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
                    <th>时间</th>
                    <th>总人数</th>
                    <th>男</th>
                    <th>女</th>
                    <th>未知</th>
                </tr>
                </thead>
                <tbody>
                <tr class="rowData">
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;">模拟数据</td>
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;">模拟数据</td>
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;">模拟数据</td>
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;">模拟数据</td>
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;">模拟数据</td>
                </tr>
                <tr class="rowData">
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;">模拟数据</td>
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;">模拟数据</td>
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;">模拟数据</td>
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;">模拟数据</td>
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;">模拟数据</td>
                </tr>
                <tr class="rowData">
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;">模拟数据</td>
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;">模拟数据</td>
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;">模拟数据</td>
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;">模拟数据</td>
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;">模拟数据</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>