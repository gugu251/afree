<?php

class IndexController extends Controller
{
    public function index()
    {
    	$items = (new NewsModel)->getList(1);
    	
        $this->assign('title', '这是首页');
        $this->assign('news', $items);
//      exit;
        $this->display('Index/index.html');
    }
 }