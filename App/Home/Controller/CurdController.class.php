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

    public function Curd ($id = null, $table = null, $pid = null)
    {
        $this->access();

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
        $username = cookie('username');
        if (is_null($username)) {
            $this->error("cookie时效过期,请重新登录", U("Home/Index/longin"), 1);
        }

        // 实例化管理员表
        /*
         * $user = M('user');
        $result = $uesr->where("username = '$username'")->getFiled("deletedata")->select();
        print_r($result);
        exit;
         * */
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
        $this->access();
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

        $cookieVal = cookie('username');
        $cookieModStat = $user->table('user')->field('modstat')->where("username='{$cookieVal}'")->select();
        if ($cookieModStat[0]['modstat'] == 1) {
            $checked = false;
        } else {
            $checked = true;
        }

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
        $this->assign('checked', $checked);
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
        $this->access();
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
        $this->access();
        /* 传入js/css资源文件路径 */
        $staticPath = C(STATIC_PATH);
        $this->assign('staticPath', $staticPath);

        if (is_null($pid)) return false;

        // 权限验证
        if (!$this->accSystem('kfmx')) {
            $this->display('notSystemAccess');
            exit;
        }

        /* 根据$pid 判断当前查看的医院科室 */
        switch ($pid) {
            case 1:
                $this->assign('item', '广元协和医院男科 网络部 客服预约情况');
                $result = $this->checkCountData('nk');
                $this->assign('result', $result);
                break;
            case 2:
                $this->assign('item', '广元协和医院妇科 网络部 客服预约情况');
                $result = $this->checkCountData('fk');
                $this->assign('result', $result);
                break;
            case 3:
                $this->assign('item', '广元协和不孕不育科 网络部 客服预约情况');
                $result = $this->checkCountData('byby');
                $this->assign('result', $result);
                break;
            case 4:
                $this->assign('item', '广元协和医院其他 网络部 客服预约情况');
                $result = $this->checkCountData('other');
                $this->assign('result', $result);
                break;
            case 5:
                $this->assign('item', '广元协和医院计划生育科 网络部 客服预约情况');
                $result = $this->checkCountData('jhsy');
                $this->assign('result', $result);
                break;
            case 6:
                $this->assign('item', '广元协和医院肛肠科 网络部 客服预约情况');
                $result = $this->checkCountData('gck');
                $this->assign('result', $result);
                break;
            case 7:
                $this->assign('item', '广元协和医院微创外科 网络部 客服预约情况');
                $result = $this->checkCountData('wcwk');
                $this->assign('result', $result);
                break;
            case 8:
                $this->assign('item', '广元协和医院乳腺科 网络部 客服预约情况');
                $result= $this->checkCountData('rxk');
                $this->assign('result', $result);
                break;
            default:
                $this->assign('item', '未选择医院');
                $this->display();
                break;
        }
        $this->display();
    }

    /*
     *  功能打开权限
     * */

    public function system ()
    {
        $this->access();
        // 读取cookie
        $username = cookie('username');
        if (is_null($username)) {
            $this->error("cookie过期,请重新登录", U("Home/Index/login"));
        }

        // 实例化成员表
        $user = M('user');
        $result = $user->where("username = '$username'")->select();
    }

    /*
     *
     *  客服明细报表方法
     */

    public function checkCountData ($table = null)
    {
        $this->access();
        if (is_null($table)) return false;
        /* 查询所有客服账号 */
        $user = M('user');
        $result = $user->field('username')->select();
//        print_r($result[0]['username']);
//        exit;

       for ($i = 0; $i < count($result); $i ++) {
           /* 实例化一个空的Model对象 */
           $Model = new \Think\Model();
           /* 获取今天的信息 */
           // 今日总共
           $terday = "SELECT COUNT(*) AS count FROM $table WHERE to_days(oldDate) = to_days(now()) AND custService = '{$result[$i]['username']}'";
           // 今日已到
           $terdayArrived = "SELECT COUNT(*) AS count FROM $table WHERE to_days(oldDate) = to_days(now()) AND status = 1 AND custService = '{$result[$i]['username']}'";
           // 今日未到
           $terdayOutArrived= "SELECT COUNT(*) AS count FROM $table WHERE to_days(oldDate) = to_days(now()) AND status != 1 AND custService = '{$result[$i]['username']}'";


           /* 获取昨天的信息 */
           // 昨天总共
           $yesterday = "SELECT COUNT(*) AS count FROM $table WHERE to_days(NOW()) - TO_DAYS(oldDate) = 1 AND custService = '{$result[$i]['username']}'";
           // 昨天已到
           $yesterdayArrived= "SELECT COUNT(*) AS count FROM $table WHERE to_days(NOW()) - TO_DAYS(oldDate) = 1 AND status = 1 AND custService = '{$result[$i]['username']}'";
           // 昨日未到
           $yesterdayOutArrived = "SELECT COUNT(*) AS count FROM $table WHERE to_days(NOW()) - TO_DAYS(oldDate) = 1 AND status != 1 AND custService = '{$result[$i]['username']}'";



           /* 获取本月信息 */
           // 本月总共
           $currMonth = "SELECT COUNT(*) AS count FROM $table WHERE DATE_FORMAT(oldDate, '%Y%m') = DATE_FORMAT(CURDATE(), '%Y%m') AND custService = '{$result[$i]['username']}'";
           // 本月已到
           $currMonthArrived = "SELECT COUNT(*) AS count FROM $table WHERE DATE_FORMAT(oldDate, '%Y%m') = DATE_FORMAT(CURDATE(), '%Y%m') AND status = 1 AND custService = '{$result[$i]['username']}'";
           // 本月未到
           $currMonthOutArrived = "SELECT COUNT(*) AS count FROM $table WHERE DATE_FORMAT(oldDate, '%Y%m') = DATE_FORMAT(CURDATE(), '%Y%m') AND status != 1 AND custService = '{$result[$i]['username']}'";

           /* 查询上月信息 */
           // 上月总共
           $yesterMonth = "SELECT COUNT(*) AS count FROM $table WHERE PERIOD_DIFF(DATE_FORMAT(NOW(),'%Y%m'), DATE_FORMAT(oldDate,'%Y%m')) = 1 AND custService = '{$result[$i]['username']}'";
           // 上月已到
           $yesterMonthArrived = "SELECT COUNT(*) AS count FROM $table WHERE PERIOD_DIFF(DATE_FORMAT(NOW(), '%Y%m'), DATE_FORMAT(oldDate, '%Y%m')) = 1 AND status = 1 AND custService = '{$result[$i]['username']}'";
           // 上月未到
           $yesterMonthOutArrived = "SELECT COUNT(*) AS count FROM $table WHERE PERIOD_DIFF(DATE_FORMAT(NOW(), '%Y%m'), DATE_FORMAT(oldDate, '%Y%m')) = 1 AND status != 1 AND custService = '{$result[$i]['username']}'";

           $result[$i]['terday'] = $Model->query($terday);
           $result[$i]['terdayArrived'] = $Model->query($terdayArrived);
           $result[$i]['terdayOutArrived'] = $Model->query($terdayOutArrived);

           $result[$i]['yesterday'] = $Model->query($yesterday);
           $result[$i]['yesterdayArrived'] = $Model->query($yesterdayArrived);
           $result[$i]['yesterdayOutArrived'] = $Model->query($yesterdayOutArrived);

           $result[$i]['currMonth'] = $Model->query($currMonth);
           $result[$i]['currMonthArrived'] = $Model->query($currMonthArrived);
           $result[$i]['currMonthOutArrived'] = $Model->query($currMonthOutArrived);

           $result[$i]['yesterMonth'] = $Model->query($yesterMonth);
           $result[$i]['yesterMonthArrived'] = $Model->query($yesterMonthArrived);
           $result[$i]['yesterMonthOutArrived'] = $Model->query($yesterMonthOutArrived);

       }
//       print_r($result);
//        echo count($result);
        return $result;
//       var_dump($data[$result[0]['username']['currMoth']['currMonth']]);
//       var_dump($data[$result[1]['username']['currMoth']]);
//        if ($data) return $data;
    }

    /*
     *
     *  cookie验证防止直接url路径访问模板
     */

    public function access ()
    {
        $cookieUsername = cookie('username');
        if (! $cookieUsername) {
            $this->error('请先登录', U("Home/Index/login"));
        }
    }


    /*
     *  权限控制
     *  @param $field 要查询的权限字段
     * */

    public function accSystem ($field = null)
    {
        if (is_null($field)) return false;

        // 读取cookie

        $this->access();
        $username = cookie('username');

        $user = M('user');

        $result = $user->where("username = '{$username}'")->select();
        if ($result[0]["$field"] != 1 ) {
            return false;
        } else {
            return true;
        }

    }


    /*
    *
    *     权限不足打开的模板
    */

    private function notSystemAccess ()
    {
        $this->display();
    }

}
