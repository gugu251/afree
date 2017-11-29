<?php

class IndexController extends Controller
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
    public function news(){
        $items = (new NewsModel)->getList(1);

        $this->assign('title', '图文列表页');
        $this->assign('news', $items);
//      exit;
        $this->display('Index/news.html');
    }
 }