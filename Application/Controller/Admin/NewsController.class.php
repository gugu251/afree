<?php

//图文类别

class NewsController extends AdminController {

    /**
     * 图文首页
     */
    public function index() {
        $items = (new NewsModel)->getList(1);

        $this->assign('title', '图文首页');
        $this->assign('news', $items);
        $this->display('Admin/index.html');
    }
    
    /**
     * 图文管理列表
     */
    public function newslist() {
        $items = (new NewsModel)->getList(1);

        $this->assign('title', '图文管理列表');
        $this->assign('news', $items);
        $this->display('Admin/index.html');
    }
    
    /**
     * 图文栏目管理列表
     */
    public function cate() {
        $items = (new NewsModel)->getList(1);

        $this->assign('title', '图文栏目管理列表');
        $this->assign('news', $items);
        $this->display('Admin/index.html');
    }

    
    /**
     * 图文评论管理列表
     */
    public function comment() {
        $items = (new NewsModel)->getList(1);

        $this->assign('title', '图文评论管理列表');
        $this->assign('news', $items);
        $this->display('Admin/index.html');
    }


}
