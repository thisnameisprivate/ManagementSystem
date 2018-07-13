<?php
namespace Home\Controller;
use Think\Controller;


class CurdController extends Controller {

    /*
    *   显示当前页面指定ID的数据详情页面
    *   @param int $id 当前要查看的id default null
    *   @param string $table 当前数据对应的表单 default null
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
    *   @param int  $id 当前删除数据的id
    *   @param string $table 当前删除数据对应表格
    *   echo 删除成功 id 为 $id
    */

    public function delete ($id = null, $table = null)
    {
        if (is_null($id)) return false;
        if (is_null($table)) return false;
        $user = M($table);
        $result = $user->where("id = $id")->delete();
        if ($result) echo "删除成功:id为$id";
    }

    /*
    *
    *  修改当前信息
    *  @param int $id 当前修改的数据ID
    *  @param string $table 当前修改数据对应的表格
    *  @param int $pid 当前对应的对应病种表单的id
    *  @param int $pageIndex 当前修改数据对应的页码
    *  $this->display();
    **/

    public function update ($id = null, $table = null, $pid = null, $pageIndex = null)
    {
        /* 传入js/css资源文件路径 */
        $staticPath = C(STATIC_PATH);
        $this->assign('staticPath', $staticPath);

        if (is_null($id)) return false;
        if (is_null($table)) return false;
        if (is_null($pid)) return false;
        if (is_null($pageIndex)) return false;


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

        /* 重新查询数据到前端三元运算符 */
        $address = $user->table("fromaddress")->select();
        $status = $user->table("status")->select();

        /* 发送数据到前端 */
        $this->assign('id', $id);
        $this->assign('pid', $pid);
        $this->assign('table', $table);
        $this->assign('pageIndex', $pageIndex);
        $this->assign('data', $data);
        $this->assign('diseases', $diseases);
        $this->assign('address', $address);
        $this->assign('status', $status);
        $this->display();
    }


    /*
    *
    *   确认修改提交
    *   @param int $id 当前要修改的数据id default null
    *   @param string $table 当前要修改数据的表格  default null
    *   @param int $pid 当前要修改数据对应的病种 default null
    *   @param int $pidIndex 当前要修改数据对应的页码 default null
    *   $this->Home/IndexController/showTab/
    **/

    public function determine ($id = null, $table = null, $pid = null, $pageIndex = null)
    {
        if (is_null($id)) return false;
        if (is_null($table)) return false;
        if (is_null($pid)) return false;
        if (is_null($pageIndex)) return false;


        /* 接收修改的新数据 */
        $user = M($table);
        $data = $user->where("id = $id")->select();

        /* 根据ID修改信息 */
        $result = $user->where("id = $id")->save($_POST);

        if ($result) {
            $this->success("修改成功:)");
            // http://localhost/ThinkPHP/index.php/Home/Curd/update/id/2/table/nk/pid/1/pageIndex/1.html
        }
    }

    /*
    *
    *   客服明细报表
    *   @param int $pid 根据id查询对应科室的表格
    *   $this->display();
    **/

    public function detailReport ($pid = null)
    {
        /* 传入js/css资源文件路径 */
        $staticPath = C(STATIC_PATH);
        $this->assign('staticPath', $staticPath);

        if (is_null($pid)) return false;

        /* 根据$pid 判断当前查看的医院科室 */
        switch ($pid) {
            case 1:
                $this->assign('item', '广元协和医院男科 网络部 客服预约情况');
                break;
            case 2:
                $this->assign('item', '广元协和医院妇科 网络部 客服预约情况');
                break;
            case 3:
                $this->assign('item', '广元协和不孕不育科 网络部 客服预约情况');
                break;
            case 4:
                $this->assign('item', '广元协和医院其他 网络部 客服预约情况');
                break;
            case 5:
                $this->assign('item', '广元协和医院计划生育科 网络部 客服预约情况');
                break;
            case 6:
                $this->assign('item', '广元协和医院肛肠科 网络部 客服预约情况');
                break;
            case 7:
                $this->assign('item', '广元协和医院微创外科 网络部 客服预约情况');
                break;
            case 8:
                $this->assign('item', '广元协和医院乳腺科 网络部 客服预约情况');
                break;
            default:
                $this->assign('item', '未选择医院');
                $this->display();
                break;
        }
        $this->display();
    }
}
