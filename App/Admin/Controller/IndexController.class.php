<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {

    /*
    *
    * 数据添加到指定表格
    * @param $id 要添加的表格 default null
    * return 是否添加成功
    * */
    public function index ($id = null)
    {
        if (is_null($id)) return false;

        /* 根据前端发送的值选择表单添加数据 */
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

        
    }
}
