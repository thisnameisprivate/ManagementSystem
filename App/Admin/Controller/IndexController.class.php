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
        $newData = $_POST;

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

        // 从cookie中读取当前客服(用户)
        if (cookie('username') != null) {
            $newData['custService'] = cookie('username');
        } else {
            $this->error("请先登录", U("Home/Index/login"), 1);
        }


        $result = $user->add($newData);
        if ($result) {
            echo "<p style='color:red;'>添加成功</p>";
        } else {
            echo "<p style='color:red;'>添加失败</p>";
        }
    }
}
