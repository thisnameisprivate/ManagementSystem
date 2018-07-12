<?php
namespace Home\Controller;
use Think\Controller;


class CurdController extends Controller {

    /*
    *   显示当前页面指定ID的数据详情页面
    *   @param id default null
    *   $this->display() Curd.html
    */

    public function Curd ($id = null, $table = null, $pid = null) {

        /* 传入js/css资源文件路径 */
        $staticPath = C(STATIC_PATH);
        $this->assign('staticPath', $staticPath);


        if (is_null($id)) return false;
        if (is_null($table)) return false;
        if (is_null($pid)) return false;

        /* 实例化要查询的表格 */
        $user = M($table);
        $data = $user->where("id = $id")->select();

        /* 查询id对应的病种表单 */
        $diseases = $user->table("alldiseases")->where("pid = $pid")->field("diseases")->select();

        /* 遍历数据替换数组中的数字发送到前端 */
        for ($i = 0; $i < count($data); $i ++) {

            /* 查询id对应的表单 */
            $address = $user->table("fromaddress")->where("pid = {$data[$i]['fromAddress']}")->select();
            $status = $user->table("status")->where("pid = {$data[$i]['status']}")->select();

            /* 替换以数字表示的病种数据 */
            $data[$i]['diseases'] = $diseases[$data[$i]['diseases']]['diseases'];

            /* 替换以数字表示的来源数据 */
            $data[$i]['fromAddress'] = $address[0]['fromaddress'];

            /* 替换以数字表示的状态数据 */
            $data[$i]['status'] = $status[0]['status'];

            /* 替换是否为本市的switch字符 */
            if ($data[$i]['switch'] == 'on') {
                $data[$i]['switch'] = '本市';
            } else {
                $data[$i]['switch'] = '其他';
            }
        }

        $this->assign('id', $id);
        $this->assign('table', $table);
        $this->assign('data', $data);
        $this->display();
    }


    /*
    *   删除当前点击数据
    *
    */

    public function delete ($id = null, $table = null)
    {
        if (is_null($id)) return false;
        if (is_null($table)) return false;
        $user = M($table);
        $result = $user->where("id = $id")->delete();
        if ($result) echo "删除成功:id为$id";
    }
}
