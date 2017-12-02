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

		$markdownModel = new MarkdownModel();

		if ($_POST) {
			$title = $_POST['title'];
			$content = $_POST['content'];
			$cid = $_POST['cid'];
			$id = $_POST['id'];
			if ($id) {
				$re = $markdownModel->upInfo($id, $title, $content, $cid);
			} else {
				$re = $markdownModel->addInfo($title, $content, 1, $cid);
			}
			var_dump($re);

		}
		$id = $_GET['id'];
		if ($id) {
			$info = $markdownModel->getOne($id);
		}
		$cate = (new MarkdowncateModel)->getAll();
		$this->assign('title', 'Markdown编辑页');
		$this->assign('markdown', $info);
		$this->assign('cate', $cate);
		$this->display('Admin/Mark/edit.html');
	}

}