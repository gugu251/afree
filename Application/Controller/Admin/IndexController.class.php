<?php

//namespace Admin;
//use Admin\AdminController;

class IndexController extends AdminController {

    /**
     * 后台管理首页
     */
    public function index() {

        $items = (new NewsModel)->getList($where);

        $this->assign('title', '这是首页');
        $this->assign('news', $items);
        $this->display('Admin/News/list.html');
    }

}
