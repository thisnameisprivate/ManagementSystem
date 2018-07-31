<?php
namespace Home\Controller;
use Org\Util\Date;
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
        $this->access();
        /* 传入js/css资源文件路径 */
        $staticPath = C(STATIC_PATH);
        $this->assign('staticPath', $staticPath);

        $this->assign('id', $id);

        /* 判断当前选择的医院 */
        switch ($id) {
            case 1:
                $result = $this->checkCountData('nk');
                $nameList = $this->checkCountMonth('nk');
                $userSort = $this->currUserSort('nk', $nameList);
                $currUserSortRese = $this->currUserSortRese('nk', $nameList);
                $yesterUserSortArrival = $this->yesterUserSortRese('nk', $nameList);
                $yesterUserSortRese = $this->yesterUserSortRese('nk', $nameList);
                $checkCountRese = $this->checkCountRese('nk');
                $this->assign('item', '/ 广元协和医院男科');
                break;
            case 2:
                $result = $this->checkCountData('fk');
                $nameList = $this->checkCountMonth('fk');
                $userSort = $this->currUserSort('fk', $nameList);
                $currUserSortRese = $this->currUserSortRese('fk', $nameList);
                $yesterUserSortArrival = $this->yesterUserSortArrival('fk', $nameList);
                $yesterUserSortRese = $this->yesterUserSortRese('fk', $nameList);
                $checkCountRese = $this->checkCountRese('fk');
                $this->assign('item', '/ 广元协和医院妇科');
                break;
            case 3:
                $result = $this->checkCountData('byby');
                $nameList = $this->checkCountMonth('byby');
                $userSort = $this->currUserSort('byby', $nameList);
                $currUserSortRese = $this->currUserSortRese('byby', $nameList);
                $yesterUserSortArrival = $this->yesterUserSortArrival('byby', $nameList);
                $yesterUserSortRese = $this->yesterUserSortRese('byby', $nameList);
                $checkCountRese = $this->checkCountRese('byby');
                $this->assign('item', '/ 广元协和不孕不育科');
                break;
            case 4:
                $result = $this->checkCountData('other');
                $nameList = $this->checkCountMonth('other');
                $userSort = $this->currUserSort('other', $nameList);
                $currUserSortRese = $this->currUserSortRese('other', $nameList);
                $yesterUserSortArrival = $this->yesterUserSortArrival('other', $nameList);
                $yesterUserSortRese = $this->yesterUserSortRese('other', $nameList);
                $checkCountRese = $this->checkCountRese('other');
                $this->assign('item', '/ 广元协和医院其他');
                break;
            case 5:
                $result = $this->checkCountData('jhsy');
                $nameList = $this->checkCountMonth('jhsy');
                $userSort = $this->currUserSort('jhsy', $nameList);
                $currUserSortRese = $this->currUserSortRese('jhsy', $nameList);
                $yesterUserSortArrival = $this->yesterUserSortArrival('jhsy', $nameList);
                $yesterUserSortRese = $this->yesterUserSortRese('jhsy', $nameList);
                $checkCountRese = $this->checkCountRese('jhsy');
                $this->assign('item', '/ 广元协和医院计划生育科');
                break;
            case 6:
                $result = $this->checkCountData('gck');
                $nameList = $this->checkCountMonth('gck');
                $userSort = $this->currUserSort('gck', $nameList);
                $currUserSortRese = $this->currUserSortRese('gck', $nameList);
                $yesterUserSortArrival = $this->yesterUserSortArrival('gck', $nameList);
                $yesterUserSortRese = $this->yesterUserSortRese('gck', $nameList);
                $checkCountRese = $this->checkCountRese('gck');
                $this->assign('item', '/ 广元协和医院肛肠科');
                break;
            case 7:
                $result = $this->checkCountData('wcwk');
                $nameList = $this->checkCountMonth('wcwk');
                $userSort = $this->currUserSort('wcwk', $nameList);
                $currUserSortRese = $this->currUserSortRese('wcwk', $nameList);
                $yesterUserSortArrival = $this->yesterUserSortArrival('wcwk', $nameList);
                $yesterUserSortRese = $this->yesterUserSortRese('wcwk', $nameList);
                $checkCountRese = $this->checkCountRese('wcwk');
                $this->assign('item', '/ 广元协和医院微创外科');
                break;
            case 8:
                $result = $this->checkCountData('rxk');
                $nameList = $this->checkCountMonth('rxk');
                $userSort = $this->currUserSort('rxk', $nameList);
                $currUserSortRese = $this->currUserSortRese('rxk', $nameList);
                $yesterUserSortArrival = $this->yesterUserSortArrival('rxk', $nameList);
                $yesterUserSortRese = $this->yesterUserSortRese('rxk', $nameList);
                $checkCountRese = $this->checkCountRese('rxk');
                $this->assign('item', '/ 广元协和医院乳腺科');
                break;
            default:
                $this->assign('item', '/ 未选择医院');
                $this->display();
                break;
        }


        if ($id) {
            $this->assign('result', $result);
            $this->assign('nameList', $nameList);
            $this->assign('userSort', $userSort);
            $this->assign('currUserSortRese', $currUserSortRese);
            $this->assign('yesterUserSortArrival', $yesterUserSortArrival);
            $this->assign('yesterUserSortRese', $yesterUserSortRese);
            $this->assign('checkCountRese', $checkCountRese);
            
            $this->display();
        } else {
            return false;
        }
    }


    /*
     *   本月到院排行方法
     *  @param string $table
     *  @param array $user
     *  return 二维数组
     * */

    private function currUserSort ($table, $user)
    {
        $Model = new \Think\Model();
        for ($i = 0; $i < count($user); $i ++) {
            $countMonth[$user[$i]['username']] = $Model->query("SELECT COUNT(*) AS count, expert FROM $table WHERE expert = '{$user[$i]['username']}' AND status = 1 AND  DATE_FORMAT(oldDate, '%Y%m') = DATE_FORMAT(CURDATE(), '%Y%m')");
        }
        // 遍历查询的数据  是个多维维数组
        foreach ($countMonth as $key => $val) {
            foreach ($val as $k => $v) {
                $userSort[] = $v;
            }
        }



        array_multisort(array_column($userSort, 'count'), SORT_DESC, $userSort);

        return $userSort;
    }

    /*
     *  本月预约未定
     *  @param string $table
     *  @param array $user
     *  return 二维数组
     * */

    private function currUserSortRese  ($table, $user)
    {

        $Model = new \Think\Model();
        for ($i = 0; $i < count($user); $i ++) {
            $countMonth[$user[$i]['username']] = $Model->query("SELECT COUNT(*) AS count, expert FROM $table WHERE expert = '{$user[$i]['username']}' AND status = 3 AND  DATE_FORMAT(oldDate, '%Y%m') = DATE_FORMAT(CURDATE(), '%Y%m')");
        }
        // 遍历查询的数据  是个多维维数组
        foreach ($countMonth as $key => $val) {
            foreach ($val as $k => $v) {
                $currUserSortRese[] = $v;
            }
        }


        array_multisort(array_column($currUserSortRese, 'count'), SORT_DESC, $currUserSortRese);

        return $currUserSortRese;
    }


    /*
     *  上月到院排行
     *  @param string $table
     *  @param array $user
     *  return 二维数组
     * */

    private function yesterUserSortArrival ($table, $user)
    {
        $Model = new \Think\Model();
        for ($i = 0; $i < count($user); $i ++) {
            $countMonth[$user[$i]['username']] = $Model->query("SELECT COUNT(*) AS count, expert FROM $table WHERE expert = '{$user[$i]['username']}' AND status = 1 AND PERIOD_DIFF(DATE_FORMAT(NOW(),'%Y%m'), DATE_FORMAT(oldDate,'%Y%m')) = 1");
        }
        // 遍历查询的数据  是个多维维数组
        foreach ($countMonth as $key => $val) {
            foreach ($val as $k => $v) {
                $yesterUserSortArrival[] = $v;
            }
        }


        array_multisort(array_column($yesterUserSortArrival, 'count'), SORT_DESC, $yesterUserSortArrival);

        return $yesterUserSortArrival;
    }

    /*
     *
     *  上月预约排行
     *  @param string $table
     *  @param array $user
     *  return 二位数组
     * */

    private function yesterUserSortRese ($table, $user)
    {
        $Model = new \Think\Model();
        for ($i = 0; $i < count($user); $i ++) {
            $countMonth[$user[$i]['username']] = $Model->query("SELECT COUNT(*) AS count, expert FROM $table WHERE expert = '{$user[$i]['username']}' AND status = 3 AND PERIOD_DIFF(DATE_FORMAT(NOW(),'%Y%m'), DATE_FORMAT(oldDate,'%Y%m')) = 1");
        }
        // 遍历查询的数据  是个多维维数组
        foreach ($countMonth as $key => $val) {
            foreach ($val as $k => $v) {
                $yesterUserSortRese[] = $v;
            }
        }


        array_multisort(array_column($yesterUserSortRese, 'count'), SORT_DESC, $yesterUserSortRese);

        return $yesterUserSortRese;
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
        $this->access();
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
        $this->access();

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
        $this->access();
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
        $this->access();

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
        $this->access();
        /* 传入js/css资源文件路径 */
        $staticPath = C(STATIC_PATH);
        $this->assign('staticPath', $staticPath);
        $this->display();
    }

    /*
    *
    *   首页信息展示封装[到院信息统计]
    *   @param string $table 要查询的表 default null
    *   return array $dataCount 二维数组
    **/

    private function checkCountData ($table = null)
    {
        $this->access();
        if (is_null($table)) return false;
        /* 声明一个数组接收值 */
        $dataCount = [];

        /* 实例化一个空的Model对象 */
        $Model = new \Think\Model();

        /* 获取今天的信息 */
        // 今日总共
        $terday = $Model->query("SELECT COUNT(*) AS count FROM $table WHERE to_days(oldDate) = to_days(now())");
        // 今日已到
        $terdayArrived = $Model->query("SELECT COUNT(*) AS count FROM $table WHERE to_days(oldDate) = to_days(now()) AND status = 1");
        // 今日未到
        $terdayOutArrived = $Model->query("SELECT COUNT(*) AS count FROM $table WHERE to_days(oldDate) = to_days(now()) AND status != 1");


        /* 获取昨天的信息 */
        // 昨天总共
        $yesterday = $Model->query("SELECT COUNT(*) AS count FROM $table WHERE to_days(NOW()) - TO_DAYS(oldDate) = 1");
        // 昨天已到
        $yesterdayArrived = $Model->query("SELECT COUNT(*) AS count FROM $table WHERE to_days(NOW()) - TO_DAYS(oldDate) = 1 AND status = 1");
        // 昨日未到
        $yesterdayOutArrived = $Model->query("SELECT COUNT(*) AS count FROM $table WHERE to_days(NOW()) - TO_DAYS(oldDate) = 1 AND status != 1");


        /* 获取明天的信息 */
        // 明天预计
        $tommorday = $Model->query("SELECT COUNT(*) AS count FROM $table WHERE TO_DAYS(oldDate) - TO_DAYS(NOW()) = 1");

        /* 获取本月信息 */
        // 本月总共
        $currMonth = $Model->query("SELECT COUNT(*) AS count FROM $table WHERE DATE_FORMAT(oldDate, '%Y%m') = DATE_FORMAT(CURDATE(), '%Y%m')");
        // 本月已到
        $currMonthArrived = $Model->query("SELECT COUNT(*) AS count FROM $table WHERE DATE_FORMAT(oldDate, '%Y%m') = DATE_FORMAT(CURDATE(), '%Y%m') AND status = 1");
        // 本月未到
        $currMonthOutArrived = $Model->query("SELECT COUNT(*) AS count FROM $table WHERE DATE_FORMAT(oldDate, '%Y%m') = DATE_FORMAT(CURDATE(), '%Y%m') AND status != 1");

        /* 查询上月信息 */
        // 上月总共
        $yesterMonth = $Model->query("SELECT COUNT(*) AS count FROM $table WHERE PERIOD_DIFF(DATE_FORMAT(NOW(),'%Y%m'), DATE_FORMAT(oldDate,'%Y%m')) = 1");
        // 上月已到
        $yesterMonthArrived = $Model->query("SELECT COUNT(*) AS count FROM $table WHERE PERIOD_DIFF(DATE_FORMAT(NOW(), '%Y%m'), DATE_FORMAT(oldDate, '%Y%m')) = 1 AND status = 1");
        // 上月未到
        $yesterMonthOutArrived = $Model->query("SELECT COUNT(*) AS count FROM $table WHERE PERIOD_DIFF(DATE_FORMAT(NOW(), '%Y%m'), DATE_FORMAT(oldDate, '%Y%m')) = 1 AND status != 1");

        // 整理数据到数组
        $dataCount['terday'] = $terday;
        $dataCount['terdayArrived'] = $terdayArrived;
        $dataCount['terdayOutArrived'] = $terdayOutArrived;
        $dataCount['tommorday'] = $tommorday;
        $dataCount['yesterday'] = $yesterday;
        $dataCount['yesterdayArrived'] = $yesterdayArrived;
        $dataCount['yesterdayOutArrived'] = $yesterdayOutArrived;
        $dataCount['currMonth'] = $currMonth;
        $dataCount['currMonthArrived'] = $currMonthArrived;
        $dataCount['currMonthOutArrived'] = $currMonthOutArrived;
        $dataCount['yesterMonth'] = $yesterMonth;
        $dataCount['yesterMonthArrived'] = $yesterMonthArrived;
        $dataCount['yesterMonthOutArrived'] = $yesterMonthOutArrived;

        // 数据->数组 :)  返回二维数组
        if ($dataCount) return $dataCount;
    }

    /*
    *
    *   首页信息展示封装[预约信息统计]
    *   @param string $table 要查询的表 default null
    *   return array $dataCount 二维数组
    **/

    private function checkCountRese ($table = null)
    {
        $this->access();
        if (is_null($table)) return false;

        /* 声明一个数组接收值 */
        $dataCount = [];

        /* 实例化一个空的Model对象 */
        $Model = new \Think\Model();

        /* 获取今天的信息 */
        $todayRese = $Model->query("SELECT COUNT(*) AS count FROM $table WHERE status = 3 AND to_days(oldDate) = to_days(now())");
        /* 获取昨天的信息 */
        $terdayRese = $Model->query("SELECT COUNT(*) AS count FROM $table WHERE status = 3 AND to_days(now()) - to_days(oldDate) = 1");
        /* 获取明天的信息 */
        $tommodayRese = $Model->query("SELECT COUNT(*) AS count FROM $table WHERE status = 3 AND to_days(oldDate) - to_days(now()) = 1");
        /* 获取本月的信息 */
        $currMonthRese = $Model->query("SELECT COUNT(*) AS count FROM $table WHERE status = 3 AND DATE_FORMAT(oldDate, '%Y%m') = DATE_FORMAT(CURDATE(), '%Y%m')");
        /* 获取上月信息 */
        $yseterMonthRese = $Model->query("SELECT COUNT(*) AS count FROM $table WHERE status = 3 AND PERIOD_DIFF(DATE_FORMAT(NOW(), '%Y%m'), DATE_FORMAT(oldDate, '%Y%m')) = 1");


        // 整理数据到数组
        $dataCount['todayRese'] = $todayRese;
        $dataCount['terdayRese'] = $terdayRese;
        $dataCount['tommodayRese'] = $tommodayRese;
        $dataCount['currMonthRese'] = $currMonthRese;
        $dataCount['yesterMonthRese'] = $yseterMonthRese;


        if ($dataCount) return $dataCount;
    }

    /**
     *  安全设置
     *
     *
     */

    public function systeminfo ()
    {
        $this->access();
        /* 传入js/css资源文件路径 */
        $staticPath = C(STATIC_PATH);
        $this->assign("staticPath", $staticPath);

        /* 读取cookie */
        $username = cookie('username');
        if ($username) {
            $this->assign('username', $username);
            $this->display();
        } else {
            // 跳转至登录页面
            $this->error("请先登录", U("Home/Index/login"), 1);
        }
    }

    /*
     *  修改个人资料
     *
     * */

    public function changePass ()
    {
        $this->access();
        if (is_null($_POST)) return false;

        // 实例化表
        $user = M('user');
        // 读取cookie
        $username = cookie('username');

        if ( ! $username) {
            // 跳转至登录页面
            $this->error("请重新登录，cookie过期", U("Home/Index/login"), 1);
        }
        // 查询cookie对应的账号信息
        $result = $user->where("username = '$username'")->find();

        // 判断是否查询到该用户的值
        if ($result) {
            $data['password'] = md5($_POST['password']);
            $result = $user->where("username = '$username'")->save($data);

            if ($result) {
                $this->success("修改成功", U("Home/Index/systeminfo"), 1);
            }

        } else {
            $this->error("修改失败", U("Home/Index/systeminfo"), 1);
        }
    }

    /*
     *
     *  人员管理
     *  @param int $pageindex default 1
     */

    public function systemPeople ()
    {
        $this->access();

        /* 传入js/css资源文件路径 */
        $staticPath = C(STATIC_PATH);
        $this->assign("staticPath", $staticPath);
        /* 读取当前用户 */
        $username = cookie('username');

        /*
         * if (is_null($username)) {
            // 跳转至登录页面
            $this->error("请重新登录", U("Home/Index/login"), 3);
        }
         * */


        /* 查询所有用户 */
        $user = M('user');
        $system = $user->where("username = '$username'")->field("updateuser")->select();
        // 判断是否有权限查看所有成员
        if ($system[0]['updateuser'] == 1) {
            $result = $user->select();
            $this->assign('result', $result);
            $this->assign('username', $username);
            $this->display();
        } else {
            // 跳转至错误登录页
            $this->display("notSystemAccess");
        }

    }

    /*
     *   修改人员信息显示页, 默认查询表格为user
     *
     *   @param int id 要删除的id default null
     * */

    public function updatePeople ($id = null)
    {
        $this->access();
        if(is_null($id)) return false;

        // 传入js/css资源文件
        $staticPath = C(STATIC_PATH);
        $this->assign('staticPath', $staticPath);

        // 实例化表
        $user = M('user');
        $result = $user->where("id = '$id'")->select();
        // 读取当前用户cookie
        $username = cookie('username');
        $this->assign('username', $username);
        $this->assign('id', $id);

        if ($result) {
            $this->assign('result', $result);
        }

        $this->display();
    }

    /*
     *
     *  修改信息执行逻辑
     *  @param int id  要修改的ID default null
     * */

    public function updateSoure ($id = null)
    {
        $this->access();
        if ( ! $_POST) return false;
        if (is_null($id)) return false;


        $userData = $_POST;

        // 替换复选项框的字母为数字方便储存
        for ($i = 0; $i < count($userData['like']); $i ++) {
            if ($userData['like'][$i] == 'on') {
                $userData['like'][$i] = 1;
            } else {
                $userData['like'][$i] = 0;
            }
        }

        //  储存数据准备
        $data['username'] = $userData['username'];
        $data['password'] = md5($userData['password']);
        $data['deletedata'] = $userData['like'][0];
        $data['updatedata'] = $userData['like'][1];
        $data['updateuser'] = $userData['like'][2];


        // 实例化表
        $user = M('user');
//        $result = $user->where("id = '$id'")->select();
        $result = $user->where("id = '$id'")->save($data);
        if ($result) {
            $this->success("修改成功", U("Home/Index/updatePeople/id/$id"));
        }
    }


    /*
     *
     *  删除成员信息
     *  @param id int default null 删除成员信息的id
     */
    public function deletePeople ($id = null)
    {
        $this->access();
        if (is_null($id)) return false;

        // 实例化表
        $user = M('user');
        $result = $user->where("id = '$id'")->delete();
        if ($result) return ture;
    }


    /*
     *
     *  登录成员添加页面显示
     */

    public function systeminsert ()
    {
        $this->access();
        // 传入js/css资源文件路径
        $staticPath = C(STATIC_PATH);
        $this->assign('staticPath', $staticPath);
        // 读取cookie并判断
        $username = cookie('username');
        if (is_null($username)) {
            $this->assign('请先登录.cookie时效过期', U("Home/Index/login"), 1);
        } else {
            $this->assign('username', $username);
        }
        $this->display();
    }

    /*
     *
     * 人员信息添加逻辑处理
     */

    public function peopleInsert ()
    {
        $this->access();
        if ( ! $_POST) return false;
        // 实例化表
        $user = M('user');


        // 数据储存准备
        $data['username'] = $_POST['username'];
        $data['password'] = md5($_POST['password']);
        $result = $user->add($data);
        if ($result) {
            $this->success("添加成员成功，默认权限仅为登录", U("Home/Index/systeminsert"));
        }
    }


    /*
     *   导出病人信息页面
     *   @param int id
     * */

    public function  exportData($id = null)
    {
        // 传入js/css资源文件
        $staticPath = C(STATIC_PATH);
        $this->assign('staticPath', $staticPath);

        if (is_null($id)) return false;

        // 读取当前登录用户
        $username = cookie('username');
        $user = M('user');
        $result = $user->where("username = '$username'")->select();


        // 检查当前用户权限
        if ($result[0]['exportdata'] != 1) {
//            redirect("Home/Index/notSystemAccess");
            $this->display('notSystemAccess');
        } else {
            $this->assign('id', $id);

            $this->display();
        }

    }

    /**
     *
     * 导出病人信息逻辑操作
     */

    public function exportCheck ($id = null)
    {
        $this->access();


        if (is_null($id)) return false;
        $data = $_POST;

        // 0 不限
        // 1 已到
        // 2 未到
        // 字符串拼接要查询的字段
        $field = ($data['name']=='on'?'name,': null). ' ' .($data['sex']=='on'?'sex,' : null) . ' ' . ($data['old']=='on'?'old,':null) . ' ' . ($data['phone']?'phone,' : null) . '  ' . ($data['expert']?'expert,' : null) . ' ' . ($data['diseases']?'diseases,' : null) . '  ' . ($data['desc1']?'desc1,' : null) . ' ' . ($data['fromAddress']?'fromAddress,' : null) . ' ' . ($data['desc2']?'desc2,' : null) . ' ' . ($data['custService']?'custService,' : null) . ' ' . ($data['oldDate']?'oldDate,' : null) . ' ' . ($data['currentTime']?'currentTime,' : null);
        // 选择表格
        $tableName = $this->selectTableName($id);
        // 时间
        $startTime = $data['startDate'];
        $endTime = $data['endDate'];
        // 已到未到
        $arrived = $data['arrival'];


        // 实例化Model();
        $Model = new \Think\Model();
        // 按到院时间查询
        if ($data['date'] == 1) {

            // 不限制状态查询
            if ($arrived == 0) {
                $sql = "SELECT $field currentTime FROM $tableName WHERE unix_timestamp(currentTime) > unix_timestamp('{$startTime}') AND unix_timestamp(currentTime) < unix_timestamp('{$endTime}')";
            }
            // 查询已到
            if ($arrived == 1) {
                $sql = "SELECT $field currentTime FROM $tableName WHERE status = 1 AND unix_timestamp(currentTime) > unix_timestamp('{$startTime}') AND unix_timestamp(currentTime) < unix_timestamp('{$endTime}')";
            }
            // 查询未到
            if ($arrived == 2) {
                $sql = "SELECT $field currentTime FROM $tableName WHERE status != 1 AND unix_timestamp(currentTime) > unix_timestamp('{$startTime}') AND unix_timestamp(currentTime) < unix_timestamp('{$endTime}')";
            }

        }

        // 按添加时间查询
        if ($data['date'] == 0) {

            // 不限制查询
            if ($arrived == 0) {
                $sql = "SELECT $field currentTime FROM $tableName WHERE unix_timestamp(currentTime) > unix_timestamp('{$startTime}') AND unix_timestamp(currentTime) < unix_timestamp('{$endTime}')";
            }
            // 查询已到
            if ($arrived == 1) {
                $sql = "SELECT $field currentTime FROM $tableName WHERE status = 1 AND unix_timestamp(currentTime) > unix_timestamp('{$startTime}') AND unix_timestamp(currentTime) < unix_timestamp('{$endTime}')";
            }
            // 查询未到
            if ($arrived == 2) {
                $sql = "SELECT $field currentTime FROM $tableName WHERE status != 1 AND unix_timestamp(currentTime) > unix_timestamp('{$startTime}') AND unix_timestamp(currentTime) < unix_timestamp('{$endTime}')";
            }

        }

        // 执行sql
        $result = $Model->query($sql);
        if ($result) $this->assign('result', $result);

        $this->display();
    }

    /**
     *
     * 表格选择封装
     * @param int id 根据id 选择表格
     * return string 表格名字
     */

    public function selectTableName ($id = null)
    {
        $this->access();
        if (is_null($id)) return false;

        /* 根据id 返回对应的表格名 */
        switch ($id) {
            case 1:
                return 'nk';
            case 2:
                return 'fk';
            case 3:
                return 'byby';
            case 4:
                return 'other';
            case 5:
                return 'jhsy';
            case 6:
                return 'gck';
            case 7:
                return 'wcwk';
            case 8:
                return 'rxk';
            default:
                echo "找不到表格,可能是表格id未找到";
                break;
        }
    }

    /*
     *
     *  数据横向对比页
     *  查询近6个月的数据
     * */

    public function contrast ()
    {
        // 传入js/css资源文件
        $staticPath = C(STATIC_PATH);
        $this->assign('staticPath', $staticPath);

        // 这他妈这个页面为什么是权限不足的gif???谁改了老子代码。
        $this->display('notSystemAccess');
    }

    /*
     *
     *   数据总体报表
     *   @param int id 根据id选择要查询的表格 default null
     * */

    public function allTable ($id = null)
    {

        $this->access();

        if (is_null($id)) return false;

        // 调用表格选择方法
        $tableName = $this->selectTableName($id);
        $tableFont = $this->selectFont($id);

        // 声明数组接收
        $data = array();
        $month = array();

        // 实例化Model()
        $Model = new \Think\Model();
        // 查询今年预约
        $currYearReser = $Model->query("SELECT COUNT(*) AS count FROM $tableName WHERE status = 3 AND YEAR(currentTime) = YEAR(NOW())");
        // 查询今年预到
        $currYearAdvan = $Model->query("SELECT COUNT(*) AS count FROM $tableName WHERE status = 0 AND YEAR(currentTime) = YEAR(NOW())");
        // 查询今年已到
        $currYearArrival = $Model->query("SELECT COUNT(*) AS count FROM $tableName WHERE status = 1 AND YEAR(currentTime) = YEAR(NOW())");
        // 查询今年未到
        $currYearOutArrival = $Model->query("SELECT COUNT(*) AS count FROM $tableName WHERE status = 2 AND YEAR(currentTime) = YEAR(NOW())");
        // 到院比例

        // 查询去年预约
        $lastYearReser = $Model->query("SELECT COUNT(*) AS count FROM $tableName WHERE status = 3 AND YEAR(currentTime) = YEAR(date_sub(now(), interval 1 year))");
        // 查询去年预到
        $lastYearAdvan = $Model->query("SELECT COUNT(*) AS count FROM $tableName WHERE status = 0 AND YEAR(currentTime) = YEAR(date_sub(now(), interval 1 year))");
        // 查询去年已到
        $lastYearArrival = $Model->query("SELECT COUNT(*) AS count FROM $tableName WHERE status = 1 AND YEAR(currentTime) = YEAR(date_sub(now(), interval 1 year))");
        // 查询去年未到
        $lastYEarOutArrival = $Model->query("SELECT COUNT(*) AS count FROM $tableName WHERE status = 2 AND YEAR(currentTime) = YEAR(date_sub(now(), interval 1 year))");

        // 查询前年预约
        $beforeYearReser = $Model->query("SELECT COUNT(*) AS count FROM $tableName WHERE status = 3 AND YEAR(currentTime) = YEAR(date_sub(now(), interval 2 year))");
        // 查询前年预到
        $beforeYearAdvan = $Model->query("SELECT COUNT(*) AS count FROM $tableName WHERE status = 0 AND YEAR(currentTime) = YEAR(date_sub(now(), interval 2 year))");
        // 查询前年已到
        $beforeYearArrival = $Model->query("SELECT COUNT(*) AS count FROM $tableName WHERE status = 1 AND YEAR(currentTime) = YEAR(date_sub(now(), interval 2 year))");
        // 查询前年已到
        $beforeYearOutArrival = $Model->query("SELECT COUNT(*) AS count FROM $tableName WHERE status = 2 AND YEAR(currentTime) = YEAR(date_sub(now(), interval 2 year))");


        /* 查询数据按月份查询 */
        // 查询本月数据
        // 本月预约
        $currMonthReser = $Model->query("SELECT COUNT(*) AS count FROM $tableName WHERE status = 3 AND date_format(currentTime, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m')");
        // 本月预到
        $currMonthAdvan = $Model->query("SELECT COUNT(*) AS count FROM $tableName WHERE status = 0 AND date_format(currentTime, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m')");
        // 本月已到
        $currMonthArrival = $Model->query("SELECT COUNT(*) AS count FROM $tableName WHERE status = 1 AND date_format(currentTime, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m')");
        // 本月未到
        $currMonthOutArrival = $Model->query("SELECT COUNT(*) AS count FROM $tableName WHERE status = 2 AND date_format(currentTime, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m')");


        // 第1个月预约
        $oneMonthReser =  $this->monthSelect(3, 1, $tableName);
        $oneMonthAdvan = $this->monthSelect(0, 1, $tableName);
        $oneMonthArrival = $this->monthSelect(1, 1, $tableName);
        $oneMonthOutArrival = $this->monthSelect(2, 1, $tableName);

        // 第2个月预约
        $twoMonthReser =  $this->monthSelect(3, 2, $tableName);
        $twoMonthAdvan = $this->monthSelect(0, 2, $tableName);
        $twoMonthArrival = $this->monthSelect(1, 2, $tableName);
        $twoMonthOutArrival = $this->monthSelect(2, 2, $tableName);

        // 第3个月预约
        $threeMonthReser =  $this->monthSelect(3, 3, $tableName);
        $threeMonthAdvan = $this->monthSelect(0, 3, $tableName);
        $threeMonthArrival = $this->monthSelect(1, 3, $tableName);
        $threeMonthOutArrival = $this->monthSelect(2, 3, $tableName);

        // 第4个月预约
        $fourMonthReser =  $this->monthSelect(3, 4, $tableName);
        $fourMonthAdvan = $this->monthSelect(0, 4, $tableName);
        $fourMonthArrival = $this->monthSelect(1, 4, $tableName);
        $fourMonthOutArrival = $this->monthSelect(2, 4, $tableName);

        // 第5个月预约
        $fiveMonthReser =  $this->monthSelect(3, 5, $tableName);
        $fiveMonthAdvan = $this->monthSelect(0, 5, $tableName);
        $fiveMonthArrival = $this->monthSelect(1, 5, $tableName);
        $fiveMonthOutArrival = $this->monthSelect(2, 5, $tableName);

        // 第6个月预约
        $sixMonthReser =  $this->monthSelect(3, 6, $tableName);
        $sixMonthAdvan = $this->monthSelect(0, 6, $tableName);
        $sixMonthArrival = $this->monthSelect(1, 6, $tableName);
        $sixMonthOutArrival = $this->monthSelect(2, 6, $tableName);



        // 今年信息
        $data['currYearReser'] = $currYearReser;
        $data['currYearAdvan'] = $currYearAdvan;
        $data['currYearArrival'] = $currYearArrival;
        $data['currYearOutArrival'] = $currYearOutArrival;
        $data['currYear'] = "今年";
        // 去年信息
        $data['lastYearReser'] = $lastYearReser;
        $data['lastYearAdvan'] = $lastYearAdvan;
        $data['lastYearArrival'] = $lastYearArrival;
        $data['lastYearOutArrival'] = $lastYEarOutArrival;
        $data['lastYear'] = "去年";
        // 前年信息
        $data['beforeYearReser'] = $beforeYearReser;
        $data['beforeYearAdvan'] = $beforeYearAdvan;
        $data['beforeYearArrival'] = $beforeYearArrival;
        $data['beforeYearOutArrival'] = $beforeYearOutArrival;
        $data['beforeYear'] = "前年";


        // 月份信息
        $month['currMonthReser'] = $currMonthReser;
        $month['currMonthAdvan'] = $currMonthAdvan;
        $month['currMonthArrival'] = $currMonthArrival;
        $month['currMonthOutArrival'] = $currMonthOutArrival;
        $month['currMonth'] = \date('Y-m');

        $month['oneMonthReser'] = $oneMonthReser;
        $month['oneMonthAdvan'] = $oneMonthAdvan;
        $month['oneMonthArrival'] = $oneMonthArrival;
        $month['oneMonthOutArrival'] = $oneMonthOutArrival;
        $month['oneMonth'] = \date('Y-m', strtotime('-1 month'));

        $month['twoMonthReser'] = $twoMonthReser;
        $month['twoMonthAdvan'] = $twoMonthAdvan;
        $month['twoMonthArrival'] = $twoMonthArrival;
        $month['twoMonthOutArrival'] = $twoMonthOutArrival;
        $month['twoMonth'] = \date('Y-m', strtotime('-2 month'));

        $month['threeMonthReser'] = $threeMonthReser;
        $month['threeMonthAdvan'] = $threeMonthAdvan;
        $month['threeMonthArrival'] = $threeMonthArrival;
        $month['threeMonthOutArrival'] = $threeMonthOutArrival;
        $month['threeMonth'] = \date('Y-m', strtotime('-3 month'));

        $month['fourMonthReser'] = $fourMonthReser;
        $month['fourMonthAdvan'] = $fourMonthAdvan;
        $month['fourMonthArrival'] = $fourMonthArrival;
        $month['fourMonthOutArrival'] = $fourMonthOutArrival;
        $month['fourMonth'] = \date('Y-m', strtotime('-4 month'));


        $month['fiveMonthReser'] = $fiveMonthReser;
        $month['fiveMonthAdvan'] = $fiveMonthAdvan;
        $month['fiveMonthArrival'] = $fiveMonthArrival;
        $month['fiveMonthOutArrival'] = $fiveMonthOutArrival;
        $month['fiveMonth'] = \date('Y-m', strtotime('-5 month'));


        $month['sixMonthReser'] = $sixMonthReser;
        $month['sixMonthAdvan'] = $sixMonthAdvan;
        $month['sixMonthArrival'] = $sixMonthArrival;
        $month['sixMonthOutArrival'] = $sixMonthOutArrival;
        $month['sixMonth'] = \date('Y-m', strtotime('-6 month'));



        $this->assign('month', $month);

        $this->assign('tableFont', $tableFont);
        $this->assign('data', $data);
        $this->display();
    }


    /*
     *
     *   权限不足打开的模板
     */

    private function notSystemAccess ()
    {
        $this->display();
    }

    /*
     *
     *  cookie验证防止直接访问模板文件
     */

    private function access ()
    {
        $cookieUsername = cookie('username');
        if ( ! $cookieUsername) {
            $this->error('请先登录', U("Home/Index/login"));
        }
    }

    /*
     *  返回医院名称
     *  @param int id 选择表单的依据 default null
     * */

    private function selectFont ($id = null)
    {
        if (is_null($id)) return false;


        /* 根据id 返回对应的表格名 */
        switch ($id) {
            case 1:
                return '广元协和医院男科';
            case 2:
                return '广元协和医院妇科';
            case 3:
                return '广元协和医院不孕不育';
            case 4:
                return '广元协和医院其他';
            case 5:
                return '广元协和医院计划生育';
            case 6:
                return '广元协和医院肛肠科';
            case 7:
                return '广元协和医院微创外科';
            case 8:
                return '广元协和医院乳腺科';
            default:
                echo "找不到表格,可能是表格id未找到";
                break;
        }
    }


    /*
     *   按月份查询数据
     *   @param int status default null
     *   @param int month default null
     *   return array result
     * */

    private function monthSelect ($status = null, $month = null, $tableName)
    {
        if (is_null($status)) return false;
        if (is_null($month)) return false;

        $Model = new \Think\Model();

        $monthdata = $Model->query("SELECT COUNT(*) AS count FROM $tableName WHERE status = '{$status}' AND date_format(currentTime, '%Y-%m') = date_format(DATE_SUB(curdate(), INTERVAL {$month} MONTH), '%Y-%m')");

        return $monthdata;
    }


    /*
     *  科室病种添加
     *  @param int id default null
     * */

    public function diseases ($id = null)
    {
        if (is_null($id)) return false;

        // 传入js/css资源文件路径
        $staticPath = C(STATIC_PATH);
        $this->assign('staticPath', $staticPath);

        // 获取表名
        $tableFont = $this->selectFont($id);

        // 实例化表
        $user = M('alldiseases');

        $result = $user->where("pid = $id")->field(array('id', 'diseases', 'currTime'))->select();

        if ($result) $this->assign('result', $result);

        $this->access();

        // 读取cookie
        $username = cookie('username');
        $this->assign('username', $username);
        $this->assign('tableFont', $tableFont);

        $this->display();
    }

    /*
     *  删除疾病选项
     *  @param int id default null
     *  code ing ...
     * */


    public function diseasesDelete ($id = null)
    {
        // 传入js/css资源文件路径
        $staticPath = C(STATIC_PATH);
        $this->assign('staticPath', $staticPath);


        $this->access();
        if (is_null($id)) return false;

        $user = M('alldiseases');
        $result = $user->where("id = $id")->delete();
        print_r($result);
    }


    /*
     *   修改疾病选项
     *   @param int id default null
     *   code ing ...
     * */

    public function diseasesUpdate ($id = null)
    {
        /// 传入js/css资源文件路径
        $staticPath = C(STATIC_PATH);
        $this->assign('staticPath', $staticPath);

        $this->access();
        $username = cookie('username');
        $this->assign('username', $username);
        if (is_null($id)) return false;

        $this->assign();
        // 实例化表
        $user = M('alldiseases');
        $result = $user->where("id = '$id'")->field('diseases')->select();

        $this->assign('result', $result);
        $this->assign('id', $id);
        $this->display();
    }


    /*
     *   疾病修改确认逻辑
     *   @param int id default null
     * */

    public function diseaseSource ()
    {
        $diseases['diseases'] = $_POST['diseases'];
        $id = $_GET['id'];

        $user = M('alldiseases');
        $result = $user->where("id = $id")->save($diseases);

        if ($result) {
            echo "<p style='color:green;'>修改成功</p>";
        } else {
            echo "<p style='color:red;'>修改失败</p>";
        }

    }

    /*
     *  疾病选项添加
     * */

    public function diseasesadd ($id = null)
    {
        // 传入js/cs资源文件
        $staticPath = C(STATIC_PATH);
        $this->assign('staticPath', $staticPath);

        $this->access();

        if (is_null($id)) return false;
        $username = cookie('username');
        $this->assign('username', $username);
        $this->assign('id', $id);
        $this->display();

    }

    /*
     *  疾病选项添加确认
     * */

    public function diseaseaddSource ($id = null)
    {
        if (is_null($id)) return false;

        $diseases['diseases'] = $_POST['diseases'];
        $diseases['pid'] = $id;

        // 实例化表
        $user = M('alldiseases');
        $result = $user->add($diseases);
        if ($result) {
            echo "<p style='color:green;'>添加成功</p>";
        } else {
            echo "<p style='color:red;'>添加失败</p>";
        }
    }


    /*
     *  就诊来源页面
     *
     * */

    public function fromaddress ()
    {
        $this->access();
        // 传入js/css资源文件
        $staticPath = C(STATIC_PATH);
        $this->assign('staticPath', $staticPath);

        // 读取cookie
        $username = cookie('username');
        $this->assign('username', $username);

        // 查询就诊来源信息表
        $user = M('fromaddress');
        $result = $user->select();

        $this->assign('result', $result);
        $this->display();
    }

    /*
     *  就诊来源修改页面显示
     *  @param int $id default null
     * */

    public function fromaddressUpdate ($id = null)
    {
        $this->access();
        if (is_null($id)) return false;
        // 传入js/css资源文件
        $staticPath = C(STATIC_PATH);
        $this->assign('staticPath', $staticPath);

        $username = cookie('username');

        $user = M('fromaddress');
        $result = $user->where("id = $id")->field('fromaddress')->select();

        $this->assign('id', $id);
        $this->assign('username', $username);
        $this->assign('result', $result);

        $this->display();
    }


    /*
     *  就诊来源修改逻辑
     *  @param int $id default null
     * */

    public function fromaddressSource ($id = null)
    {
        $this->access();
        if (is_null($id)) return false;

        $fromaddress['fromaddress'] = $_POST['fromaddress'];
        $user = M('fromaddress');
        $result = $user->where("id = $id")->save($fromaddress);
        if ($result) {
            echo "<p style='color:green;'>修改成功</p>";
        } else {
            echo "<p style='color:red;'>修改失败</p>";
        }

    }


    /*
     *  就诊来源删除逻辑
     *  @param int id default null
     * */

    public function fromaddressDelete ($id = null)
    {
        $this->access();
        if (is_null($id)) return false;

        $user = M('fromaddress');
        $result = $user->where("id = $id")->delete();
        print_r($result);
    }

    /*
     *
     *   增加来源信息页面
     *   @param int id default null
     * */

    public function fromaddressadd ($id = null)
    {
        $this->access();
        if (is_null($id)) return false;

        // 传入js/css资源文件
        $staticPath = C(STATIC_PATH);
        $this->assign('staticPath', $staticPath);

        $username = cookie('username');
        $this->assign('username', $username);
        $this->assign('id', $id);
        $this->display();
    }

    /*
     *  增加来源信息逻辑
     *
     * */

    public function fromaddressaddSource ()
    {
        $this->assign();
        $fromaddress['fromaddress'] = $_POST['fromaddress'];
        $user = M('fromaddress');
        $result = $user->add($fromaddress);
        if ($result) {
            echo "<p style='color:green;'>添加成功</p>";
        } else {
            echo "<p style='color:red;'>添加失败</p>";
        }
    }


    /*
     *  按性别查询
     *  @param $id default null
     * */

    public function sex ($id = null)
    {
        $this->access();
        if (is_null($id)) return false;
        // 传入js/css资源文件
        $staticPath = C(STATIC_PATH);
        $this->assign('staticPath', $staticPath);


        $this->display();
    }

    /*
     *  查询user表
     *
     * */

    private function checkCountMonth ($table)
    {
        $this->access();
        // 查询客服表
        $user = M('user');
        $nameList = $user->field('username')->select();
        return $nameList;
    }
}
