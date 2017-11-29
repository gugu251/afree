<?php

/**
 * markdown 编辑模块
 * User: Administrator
 * Date: 2017/11/29
 * Time: 17:49
 */
class MarkdownController extends Controller
{
	/**
	 * 首页
	 */
	public function index()
	{
		$mark = (new MarkdownModel);

		$list = $mark->getList(1);
//		var_dump($list);
		$this->assign('title', 'Markdown列表');
		$this->assign('markdown', $list);
		$this->display('Tool/Markdown/list.html');

	}

	/**
	 * 详细页
	 */
	public function detail()
	{
		$mark = (new MarkdownModel);
		$id =
		$list = $mark->getOne(1);
//		var_dump($list);
		$this->assign('title', 'Markdown列表');
		$this->assign('markdown', $list);
		$this->display('Tool/Markdown/detail.html');

	}
}


