<?php

class IndexController extends BaseController
{
    /**
     * 首页
     */
    public function index()
    {
    	$items = (new NewsModel)->getList(1);
    	
        $this->assign('title', '这是首页');
        $this->assign('news', $items);
//      exit;
        $this->display('Index/index.html');
    }

    /**
     * 图文列表
     */
    public function newslist(){
        $items = (new NewsModel)->getList(1);

        $this->assign('title', '图文列表页');
        $this->assign('news', $items);
//      exit;
        $this->display('Index/newslist.html');
    }

	/**
	 * 登陆
	 */
    public function login(){
		$this->display('Public/login.html');
	}
 }