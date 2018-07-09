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
            $currentMoth = ['总共' => '41', '已到' => '20', '未到' => '21'];
            // 本月到院排行榜
            $nameList = ['邢艳梅' => '10', '周玉波' => '8', '王亚萍' => '3'];


            $this->assign('tommor', $tommor);
            $this->assign('toDay', $toDay);
            $this->assign('prevDay', $prevDay);
            $this->assign('currentMonth', $currentMoth);
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
        $this->display();
    }

    public function insertShow ($id = null) {

        /* 传入js/css资源文件路径 */
        $staticPath = C(STATIC_PATH);
        $this->assign('staticPath', $staticPath);

        /* 判断添加预约信息传值是否为空 */
        if (is_null($id)) return false;


        /* 把获取到的数据添加依据发送前端 */
        $this->assign('id', $id);


        switch ($id) {
            case 1:
                $this->assign('item', '/ 广元协和医院男科预约信息添加');
                break;
            case 2:
                $this->assign('item', '/ 广元协和医院妇科预约信息添加');
                break;
            case 3:
                $this->assign('item', '/ 广元协和不孕不育科预约信息添加');
                break;
            case 4:
                $this->assign('item', '/ 广元协和医院其他预约信息添加');
                break;
            case 5:
                $this->assign('item', '/ 广元协和医院计划生育科预约信息添加');
                break;
            case 6:
                $this->assign('item', '/ 广元协和医院肛肠科预约信息添加');
                break;
            case 7:
                $this->assign('item', '/ 广元协和医院微创外科预约信息添加');
                break;
            case 8:
                $this->assign('item', '/ 广元协和医院乳腺科预约信息添加');
                break;
            default:
                $this->assign('item', '/ 未选择医院');
                $this->display();
                break;
        }

        $this->display();
    }
}
