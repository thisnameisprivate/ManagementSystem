<?php
namespace Home\Controller;
use Think\Controller;
class IndexControoler extends Controller {

    /*
    *
    * 数据添加到指定表格
    * @param $id 要添加的表格 default null
    * return 是否添加成功
    * */
    public function index ($id == null)
    {
        if (is_null($id)) return false;
        print_r($id);
        var_dump($_POST);
    }
}
