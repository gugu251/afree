<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/1
 * Time: 16:43
 * markdown编辑功能
 */
class MarkController extends AdminController
{
	/**
	 * 首页
	 */
	public function index()
	{
		$this->assign('title', '笔记功能页面');
		$this->display('Admin/Mark/index.html');
	}

	/**
	 * 列表页
	 */
	public function marklist()
	{
		$list = (new MarkdownModel)->getlist($where);
		$this->assign('marklist', $list);
		$this->assign('title', '笔记列表页');
		$this->display('Admin/Mark/marklist.html');
	}

	/**
	 * 栏目列表页
	 */
	public function catelist()
	{
		$this->assign('title', '笔记栏目列表页');
		$this->display('Admin/Mark/catelist.html');
	}

	/**
	 * 编辑页
	 */
	public function edit()
	{
		$id = $_GET['id'];
		if($_POST['id']){

		}
		$info = (new MarkdownModel)->getOne($id);
		$this->assign('title', 'Markdown编辑页');
		$this->assign('markdown', $info);
		$this->display('Admin/Mark/edit.html');
	}

}