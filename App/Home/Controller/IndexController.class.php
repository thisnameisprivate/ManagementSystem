<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {

    /*
    *  @后台首页显示
    *  $this->display();
    *  Home/View/Index/index.html
    */
    public function index ()
    {
        /* 传入js/css资源文件路径 */
        $staticPath = C(STATIC_PATH);
        $this->assign('staticPath', $staticPath);
        $this->display();
    }

    /*
    *  @医院选择iframe显示
    *  param id int 1-8 default null
    *  Home/View/Index/ready.html
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
                $this->assign('item', '/ 广元协和医院男科');
                break;
            case 2:
                $this->assign('item', '/ 广元协和医院妇科');
                break;
            case 3:
                $this->assign('item', '/ 广元协和不孕不育科');
                break;
            case 4:
                $this->assign('item', '/ 广元协和医院其他');
                break;
            case 5:
                $this->assign('item', '/ 广元协和医院计划生育科');
                break;
            case 6:
                $this->assign('item', '/ 广元协和医院肛肠科');
                break;
            case 7:
                $this->assign('item', '/ 广元协和医院微创外科');
                break;
            case 8:
                $this->assign('item', '/ 广元协和医院乳腺科');
                break;
            default:
                $this->assign('item', '/ 未选择医院');
                $this->display();
                break;
        }

        /* 模拟数据 */
        if ($id) {
            $tommor = ['预计' => '2'];
            $toDay = ['总共' => '6', '已到' => '0', '未到' => '6'];
            $prevDay = ['总共' => '6', '已到' => '0', '未到' => '6'];
            $currentMonth = ['总共' => '41', '已到' => '20', '未到' => '21'];
            // 本月到院排行榜
            $nameList = ['邢艳梅' => '10', '周玉波' => '8', '王亚萍' => '3'];


            $this->assign('tommor', $tommor);
            $this->assign('toDay', $toDay);
            $this->assign('prevDay', $prevDay);
            $this->assign('currentMonth', $currentMonth);
            $this->assign('nameList', $nameList);
            $this->display();


        } else {

            return false;
        }
    }

    /*
    *  @预约详细页面显示
    *  comment表单查询
    *  param id int default null
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
                break;
            default:
                echo "找不到表格,可能是表格id未找到";
                break;
        }
        /* 查询已到和未到 */
        $arrival = $user->where("status = 1")->count('id');
        $notArrival = $user->where("status != 1")->count('id');

        /* 分页查询详情表数据 */
        $pageSize = 3;
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

}
