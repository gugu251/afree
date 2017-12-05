<?php

/**
 * markdown 编辑模块
 * User: Administrator
 * Date: 2017/11/29
 * Time: 17:49
 */
class MarkdownController extends Controller
{
	public function __construct()
	{
		parent::__construct();
		$menus = (new MarkdowncateModel)->getAll();
		$this->assign('menus', $menus);
	}

	/**
	 * 首页
	 *
	 */
	public function index()
	{
		$this->assign('title', 'Markdown列表');
		$this->display('Tool/Markdown/list.html');

	}

	public function marklist()
	{
		$cate_id = $_POST['cate_id'] ? $_POST['cate_id'] : 1;
		$page = $_POST['page'] ? $_POST['page'] : 1;
		$list = (new MarkdownModel)->getList($cate_id, $page);

		$this->assign('markdown', $list);
		$this->display('Tool/Markdown/marklist.html');
	}

	/**
	 * 详细页
	 */
	public function detail()
	{
		$id = $_GET['id'];
		$info = (new MarkdownModel)->getOne($id);
		$this->assign('title', 'Markdown列表');
		$this->assign('markdown', $info);
		$this->display('Tool/Markdown/detail.html');

	}


}


