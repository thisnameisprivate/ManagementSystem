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

    public function showTab ($id = null)
    {
        /* 传入js/css资源文件路径 */
        $staticPath = C(STATIC_PATH);
        $this->assign('staticPath', $staticPath);


        /* 根据发送的id查询表单 */
        switch ($id) {
            case 1:
                $user = M('nk');
                break;
            case 2:
                $user = M('fk');
                break;
            case 3:
                $user = M('byby');
                break;
            case 4:
                $user = M('other');
                break;
            case 5:
                $user = M('jhsy');
                break;
            case 6:
                $user = M('gck');
                break;
            case 7:
                $user = M('wcwk');
                break;
            case 8:
                $user = M('rxk');
                break;
            default:
                echo "找不到表格,可能是表格id未找到";
                break;
        }

        /* 查询详情表数据 */
        $data = $user->order('id desc')->select();


        /* 查询id对应的病种表单 */
        $diseases = $user->table("alldiseases")->where("pid = $id")->field("diseases")->select();

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
