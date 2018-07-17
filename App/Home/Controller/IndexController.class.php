<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {

    /*
    *  @后台首页显示,登录验证
    *  $cookie 验证跳转逻辑
    *  $this->display();
    *  Home/View/Index/index.html
    *  Home/View/Index/login.html
    */
    public function index ()
    {

        /* 判断当前时间是否存在cookie */
        $cookieVal = cookie('username');

        if ($cookieVal) {
            // 查询表是否存在该用户
            $user = M('user');
            $result = $user->where("username = '%s'", $cookieVal)->select();

            // 判断是否真的有此用户名
            if ($result) {

                /* 传入js/css资源文件路径 */
                $staticPath = C(STATIC_PATH);
                $this->assign('staticPath', $staticPath);

                // 发送管理员信息到前端
                $this->assign('username', $result[0]['username']);
                // 显示后台首页
                $this->display();

            } else {
                // 错误的Cookie,跳转到登录页login
                $this->error("错误的Cookie", U("Home/Index/login"), 1);
            }

        } else {
            // 跳转至登录页面
            $this->error("请先登录", U("Home/Index/login"), 1);
        }
    }


    /* login测试登录页面 */
    public function login ()
    {
        $this->display();
    }


    /* logincheck demo */
    public function logincheck ()
    {
        /* 验证表单提交的信息是否POST提交 */
        if (IS_POST) {
            $user = M('user');
            $username = $_POST['username'];
            $password = md5($_POST['password']);

            // 防止sql注入查询登录信息是否正确
            $result = $user->where("username = '%s' and password = '%s'", [$username, $password])->select();

            // 登录成功或失败的逻辑处理
            if ($result) {
                cookie('username', $username, 3600);
                $this->success("登录成功", U("Home/Index/index"), 1);
            } else {
                // print_r("login access fail");
                $this->error("login fail(账号或密码错误)", U("Home/Index/login"), 1);
            }
        }

    }

    /*
    *  @医院选择iframe显示
    *  param id int 1-8 default null
    *  $this->display();
    */
    public function ready ($id = null)
    {
        /* 传入js/css资源文件路径 */
        $staticPath = C(STATIC_PATH);
        $this->assign('staticPath', $staticPath);

        $this->assign('id', $id);

        /* 判断当前选择的医院 */
        switch ($id) {
            case 1:
                $result = $this->checkCountData('nk');
                $this->assign('item', '/ 广元协和医院男科');
                break;
            case 2:
                $result = $this->checkCountData('fk');
                $this->assign('item', '/ 广元协和医院妇科');
                break;
            case 3:
                $result = $this->checkCountData('byby');
                $this->assign('item', '/ 广元协和不孕不育科');
                break;
            case 4:
                $result = $this->checkCountData('other');
                $this->assign('item', '/ 广元协和医院其他');
                break;
            case 5:
                $result = $this->checkCountData('jhsy');
                $this->assign('item', '/ 广元协和医院计划生育科');
                break;
            case 6:
                $result = $this->checkCountData('gck');
                $this->assign('item', '/ 广元协和医院肛肠科');
                break;
            case 7:
                $result = $this->checkCountData('wcwk');
                $this->assign('item', '/ 广元协和医院微创外科');
                break;
            case 8:
                $result = $this->checkCountData('rxk');
                $this->assign('item', '/ 广元协和医院乳腺科');
                break;
            default:
                $this->assign('item', '/ 未选择医院');
                $this->display();
                break;
        }

        if ($id) {
            $this->assign('result', $result);
            $this->display();
        } else {

            return false;
        }
    }

    /*
    *  @预约详细页面显示
    *  comment表单查询
    *  @param int $id 根据id选择表单 default null
    *  @param int $pageIndex 当前页 default 1
    *  $this->display();
    */

    public function showTab ($id = null, $pageIndex = 1)
    {
        /* 传入js/css资源文件路径 */
        $staticPath = C(STATIC_PATH);
        $this->assign('staticPath', $staticPath);


        /* 根据发送的id查询表单 */
        switch ($id) {
            case 1:
                $user = M('nk');
                $this->assign('table', 'nk');
                $this->assign('tableFont', '广元协和医院男科');
                break;
            case 2:
                $user = M('fk');
                $this->assign('table', 'fk');
                $this->assign('tableFont', '广元协和医院妇科');
                break;
            case 3:
                $user = M('byby');
                $this->assign('table', 'byby');
                $this->assign('tableFont', '广元协和医院不孕不育');
                break;
            case 4:
                $user = M('other');
                $this->assign('table', 'other');
                $this->assign('tableFont', '广元协和医院其他');
                break;
            case 5:
                $user = M('jhsy');
                $this->assign('table', 'jhsy');
                $this->assign('tableFont', '广元协和医院计划生育');
                break;
            case 6:
                $user = M('gck');
                $this->assign('table', 'gck');
                $this->assign('tableFont', '广元协和医院肛肠科');
                break;
            case 7:
                $user = M('wcwk');
                $this->assign('table', 'wcwk');
                $this->assign('tableFont', '广元协和医院微创外科');
                break;
            case 8:
                $user = M('rxk');
                $this->assign('table', 'rxk');
                $this->assign('tableFont', '广元协和医院乳腺科');
                break;
            default:
                echo "找不到表格,可能是表格id未找到";
                break;
        }
        /* 查询已到和未到 */
        $arrival = $user->where("status = 1")->count('id');
        $notArrival = $user->where("status != 1")->count('id');

        /* 分页查询详情表数据 */
        $pageSize = 50;
        $data = $user->limit(($pageIndex - 1) * $pageSize, $pageSize)->order('id desc')->select();


        /* 计算显示总条数等 */
        $dataCount = $user->count("id");
        $total_pages = ceil($dataCount/$pageSize);


        /* 读取分页配置信息 */
        /* PAGE_SELF => 'http://localhost/ThinkPHP/index.php/Home/Index/showTab' config 定义 */
        $pagePath = C(PAGE_SELF);

        /* 分页逻辑 */
        if ($pageIndex > 1) {
            $prev = "<a href=". $pagePath . '/id/' . $id . '/pageIndex/' . ($pageIndex - 1) .">上一页</a>";
            $home = "<a href=". $pagePath . '/id/' . $id . "/pageIndex/1>首页</a>";
        }

        if ($pageIndex < $total_pages) {
            $next = "<a href=". $pagePath . '/id/' . $id . '/pageIndex/' . ($pageIndex + 1) .">下一页</a>";
            $last_page = "<a href=" . $pagePath . '/id/' . $id . '/pageIndex/' . $total_pages .">尾页</a>";
        }



        /* 查询id对应的病种表单 */
        $diseases = $user->table("alldiseases")->where("pid = $id")->field("diseases")->select();


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


        /* 发送整理过后的数据到前端 */
        $this->assign('arrival', $arrival);
        $this->assign('notArrival', $notArrival);
        $this->assign('dataCount', $dataCount);
        $this->assign('pageIndex', $pageIndex);
        $this->assign('total_pages', $total_pages);
        $this->assign('pageSize', $pageSize);
        $this->assign('pageIndex', $pageIndex);
        $this->assign('next', $next);
        $this->assign('prev', $prev);
        $this->assign('home', $home);
        $this->assign('last_page', $last_page);
        $this->assign('data', $data);
        $this->display();

    }

    /*
    *  添加信息
    *  @param int $id 当前选择的医院对应下标
    *  $this->display();
    */

    public function insertShow ($id = null)
    {

        /* 传入js/css资源文件路径 */
        $staticPath = C(STATIC_PATH);
        $this->assign('staticPath', $staticPath);

        /* 判断添加预约信息传值是否为空 */
        if (is_null($id)) return false;

        $user = M('alldiseases');
        // 查询对应的病种字段
        $diseases = $user->where("pid = $id")->field("diseases")->select();

        // 查询来源下拉列表
        $address = $user->table('fromaddress')->select();

        // 查询状态下拉列表
        $status = $user->table('status')->select();

        // 把字段发送到前端
        $this->assign('diseases', $diseases);
        $this->assign('address', $address);
        $this->assign('status', $status);

        /* 把获取到的数据添加依据发送前端 */
        $this->assign('id', $id);


        switch ($id) {
            case 1:
                $this->assign('item', '广元协和医院男科预约信息添加');
                break;
            case 2:
                $this->assign('item', '广元协和医院妇科预约信息添加');
                break;
            case 3:
                $this->assign('item', '广元协和不孕不育科预约信息添加');
                break;
            case 4:
                $this->assign('item', '广元协和医院其他预约信息添加');
                break;
            case 5:
                $this->assign('item', '广元协和医院计划生育科预约信息添加');
                break;
            case 6:
                $this->assign('item', '广元协和医院肛肠科预约信息添加');
                break;
            case 7:
                $this->assign('item', '广元协和医院微创外科预约信息添加');
                break;
            case 8:
                $this->assign('item', '广元协和医院乳腺科预约信息添加');
                break;
            default:
                $this->assign('item', '未选择医院');
                $this->display();
                break;
        }

        $this->display();
    }


    /*
    *
    *  @param null
    *  注销当前用户，删除cookie 跳转至登录页
    *
    */

    public function loginOut ()
    {
        $cookieVal = cookie('username');

        // 删除当前用户的cookie
        cookie('username', null);
        $cookieVal = cookie('username');
        if ($cookieVal == null) {
            echo 1;
        } else {
            echo 0;
        }
    }

    /*
    *
    *   预约病人搜索
    *   @parma int $id 要查询的科室下标
    */

    public function search ($id)
    {
        /* 传入js/css资源文件路径 */
        $staticPath = C(STATIC_PATH);
        $this->assign("staticPath", $staticPath);

        // 根据发送的id选择表实例化
        switch ($id) {
            case 1:

                $this->assign('table', 'nk');
                $this->assign('tableFont', '广元协和医院男科');
                break;

            case 2:

                $this->assign('table', 'fk');
                $this->assign('tableFont', '广元协和医院妇科');
                break;

            case 3:

                $this->assign('table', 'byby');
                $this->assign('tableFont', '广元协和医院不孕不育');
                break;

            case 4:

                $this->assign('table', 'other');
                $this->assign('tableFont', '广元协和医院其他');
                break;

            case 5:

                $this->assign('table', 'jhsy');
                $this->assign('tableFont', '广元协和医院计划生育');
                break;

            case 6:

                $this->assign('table', 'gck');
                $this->assign('tableFont', '广元协和医院肛肠科');
                break;

            case 7:

                $this->assign('table', 'wcwk');
                $this->assign('tableFont', '广元协和医院微创外科');
                break;

            case 8:

                $this->assign('table', 'rxk');
                $this->assign('tableFont', '广元协和医院乳腺科');
                break;

            default:
                echo "找不到表格,可能是表格id未找到";
                break;

        }

        /* id还是要传过去后面搜索功能病种查询要用到 */

        $this->assign('id', $id);
        $this->display();
    }


    /*
    *
    *   搜索病人信息，重复病人查询
    *   @param string $table 要查询的表格
    *   @parma int $id 科室下标对应的病种
    *   @param string $field 第一次为post表单提交,分页中为get请求提交作为参数
    *   @param int $pageIndex 当前页
    *   return 指定条件的分页
    * */

    public function checkPeople ($field = null, $table, $id = null, $pageIndex = 1)
    {

        // 判断是否为post提交请求
        if (IS_POST) {
            $field = $_POST['name'];
        }

        if (is_null($id)) return false;

        // 根据字段值查询数据
        if (is_string($field)) {
            $user = M($table);

            $staticPath = C(STATIC_PATH);
            $this->assign('staticPath', $staticPath);
        }

        /* 分页查询详情表数据 */
        $pageSize = 50;
        $result = $user->where("name = '$field'")->limit(($pageIndex - 1) * $pageSize, $pageSize)->order('id desc')->select();


        /* 查询符合要求的总数 */
        $dataCount = $user->where("name = '$field'")->count();
        $total_pages = ceil($dataCount/$pageSize);


        /* 读取分页配置信息 */
        /* PAGE_SELF => 'http://localhost/ThinkPHP/index.php/Home/Index/showTab' config 定义 */
        $pagePath = C(PAGE_SEARCH);

        /* 分页逻辑 */
        if ($pageIndex > 1) {
            $prev = "<a href=". $pagePath . '/field/' . $field . '/table/' . $table . '/id/' . $id . '/pageIndex/' . ($pageIndex - 1) .">上一页</a>";
            $home = "<a href=". $pagePath . '/field/' . $field . '/table/' . $table . '/id/' . $id . "/pageIndex/1>首页</a>";
        }

        if ($pageIndex < $total_pages) {
            $next = "<a href=". $pagePath . '/field/' . $field . '/table/' . $table . '/id/' . $id . '/pageIndex/' . ($pageIndex + 1) .">下一页</a>";
            $last_page = "<a href=" . $pagePath . '/field/' . $field . '/table/' . $table . '/id/' . $id . '/pageIndex/' . $total_pages .">尾页</a>";
        }


        /* 查询符合要求的已到数量 */
        $arrival = $user->where("name = '$field' and status = 1")->count();

        /* 查询未到的数量 */
        $notArrival = $user->where("name = '$field' and status != 1")->count();


        /* 查询id对应的病种表单 */
        $diseases = $user->table("alldiseases")->where("pid = $id")->field("diseases")->select();


        /* 遍历数据替换数组中的数字发送到前端 */
        for ($i = 0; $i < count($result); $i ++) {

            /* 查询id对应的表单 */
            $address = $user->table("fromaddress")->where("pid = {$result[$i]['fromAddress']}")->select();
            $status = $user->table("status")->where("pid = {$result[$i]['status']}")->select();

            /* 替换以数字表示的病种数据 */
            $result[$i]['diseases'] = $diseases[$result[$i]['diseases']]['diseases'];

            /* 替换以数字表示的来源数据 */
            $result[$i]['fromAddress'] = $address[0]['fromaddress'];

            /* 替换以数字表示的状态数据 */
            $result[$i]['status'] = $status[0]['status'];

            /* 替换是否为本市的switch字符 */
            if ($result[$i]['switch'] == 'on') {
                $result[$i]['switch'] = '本市';
            } else {
                $result[$i]['switch'] = '其他';
            }
        }

        /* 发送最新信息到前端 */
        $this->assign('dataCount', $dataCount);
        $this->assign('pageIndex', $pageIndex);
        $this->assign('total_pages', $total_pages);
        $this->assign('pageSize', $pageSize);
        $this->assign('pageIndex', $pageIndex);
        $this->assign('next', $next);
        $this->assign('prev', $prev);
        $this->assign('home', $home);
        $this->assign('last_page', $last_page);
        $this->assign('arrival', $arrival);
        $this->assign('notArrival', $notArrival);
        $this->assign('result', $result);
        $this->assign('field', $field);
        $this->assign('table', $table);
        $this->display();
    }

    /*
    *
    *   月趋势报表，自定义图像报表
    *
    **/

    public function monthData ()
    {
        /* 传入js/css资源文件路径 */
        $staticPath = C(STATIC_PATH);
        $this->assign('staticPath', $staticPath);
        $this->display();
    }

    /*
    *
    *   首页信息展示封装
    *   @param string $table 要查询的表 default null
    *   return array $dataCount 二维数组
    **/

    public function checkCountData ($table = null)
    {
        if (is_null($table)) return false;
        /* 声明一个数组接收值 */
        $dataCount = [];

        /* 实例化一个空的Model对象 */
        $Model = new \Think\Model();

        /* 获取今天的信息 */
        // 今日总共
        $terday = $Model->query("SELECT COUNT(*) as count FROM $table WHERE to_days(oldDate) = to_days(now())");
        // 今日已到
        $terdayArrived = $Model->query("SELECT COUNT(*) as count FROM $table WHERE to_days(oldDate) = to_days(now()) AND status = 1");
        // 今日未到
        $terdayOutArrived = $Model->query("SELECT COUNT(*) as count FROM $table WHERE to_days(oldDate) = to_days(now()) AND status != 1");


        /* 获取昨天的信息 */
        // 昨天总共
        $yesterday = $Model->query("SELECT COUNT(*) as count FROM $table WHERE to_days(NOW()) - TO_DAYS(oldDate) = 1");
        // 昨天已到
        $yesterdayArrived = $Model->query("SELECT COUNT(*) as count FROM $table WHERE to_days(NOW()) - TO_DAYS(oldDate) = 1 AND status = 1");
        // 昨日未到
        $yesterdayOutArrived = $Model->query("SELECT COUNT(*) as count FROM $table WHERE to_days(NOW()) - TO_DAYS(oldDate) = 1 AND status != 1");


        /* 获取明天的信息 */
        // 明天预计
        $tommorday = $Model->query("SELECT COUNT(*) as count FROM $table WHERE TO_DAYS(oldDate) - TO_DAYS(NOW()) = 1");

        /* 获取本月信息 */
        // 本月总共
        $currMonth = $Model->query("SELECT COUNT(*) as count FROM $table WHERE DATE_FORMAT(oldDate, '%Y%m') = DATE_FORMAT(CURDATE(), '%Y%m')");
        // 本月已到
        $currMonthArrived = $Model->query("SELECT COUNT(*) as count FROM $table WHERE DATE_FORMAT(oldDate, '%Y%m') = DATE_FORMAT(CURDATE(), '%Y%m') AND status = 1");
        // 本月未到
        $currMonthOutArrived = $Model->query("SELECT COUNT(*) as count FROM $table WHERE DATE_FORMAT(oldDate, '%Y%m') = DATE_FORMAT(CURDATE(), '%Y%m') AND status != 1");

        /* 查询上月信息 */
        // 上月总共
        $yesterMonth = $Model->query("SELECT COUNT(*) as count FROM $table WHERE PERIOD_DIFF(DATE_FORMAT(NOW(),'%Y%m'), DATE_FORMAT(oldDate,'%Y%m')) = 1");
        // 上月已到
        $yesterMonthArrived = $Model->query("SELECT COUNT(*) as count FROM $table WHERE PERIOD_DIFF(DATE_FORMAT(NOW(), '%Y%m'), DATE_FORMAT(oldDate, '%Y%m')) = 1 AND status = 1");
        // 上月未到
        $yesterMonthOutArrived = $Model->query("SELECT COUNT(*) as count FROM $table WHERE PERIOD_DIFF(DATE_FORMAT(NOW(), '%Y%m'), DATE_FORMAT(oldDate, '%Y%m')) = 1 AND status != 1");

        // 整理数据到数组
        $dataCount['terday'] = $terday;
        $dataCount['terdayArrived'] = $terdayArrived;
        $dataCount['terdayOutArrived'] = $terdayOutArrived;
        $dataCount['yesterday'] = $yesterday;
        $dataCount['yesterdayArrived'] = $yesterdayArrived;
        $dataCount['yesterdayOutArrived'] = $yesterdayOutArrived;
        $dataCount['currMonth'] = $currMonth;
        $dataCount['currMonthArrived'] = $currMonthArrived;
        $dataCount['currMonthOutArrived'] = $currMonthOutArrived;
        $dataCount['yesterMonth'] = $yesterMonth;
        $dataCount['yesterMonthArrived'] = $yesterMonthArrived;
        $dataCount['yesterMonthOutArrived'] = $yesterMonthOutArrived;

        if ($dataCount) return $dataCount;

    }
}
