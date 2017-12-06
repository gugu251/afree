<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/6
 * Time: 15:08
 */
class UserController extends LoginController
{
	public function index()
	{
		$this->assign('title', '这是个人用户首页');
		$this->display('Index/User/index.html');
	}

	public function newsList(){
		$this->assign('title', '图文管理列表');
		$this->assign('newslist', array());
		$this->display('Index/User/news_list.html');
	}

	public function newsEdit(){
		$this->assign('title', '图文编辑');
		$this->display('Index/User/news_edit.html');
	}
}