<?php

//图文类别

class NewsController extends AdminController
{

	/**
	 * 图文首页
	 */
	public function index()
	{
		$items = (new NewsModel)->getList($where, $page, $limit);
		$this->assign('title', '图文首页');
		$this->assign('newslist', $items);
		$this->display('Admin/News/list.html');
	}

	/**
	 * 图文管理列表
	 */
	public function newslist()
	{
		$items = (new NewsModel)->getList($where, $page, $limit);
		$this->assign('title', '图文管理列表');
		$this->assign('newslist', $items);
		$this->display('Admin/News/list.html');
	}

	/**
	 *
	 */

	/**
	 * 图文栏目管理列表
	 */
	public function cate()
	{
		$items = (new NewsModel)->getList(1);

		$this->assign('title', '图文栏目管理列表');
		$this->assign('news', $items);
		$this->display('Admin/News/list.html');
	}


	/**
	 * 图文评论管理列表
	 */
	public function comment()
	{
		$items = (new NewsModel)->getList(1);

		$this->assign('title', '图文评论管理列表');
		$this->assign('news', $items);
		$this->display('Admin/News/list.html');
	}

	/**
	 * 编辑页
	 */
	public function edit()
	{
		$NewsModel = new NewsModel();
		$id = $_GET['id'];
		if ($id) {
			$info = $NewsModel->getOne($id);
		}
		$cate = (new NewsCateModel)->getAll();
		$this->assign('title', '图文编辑页');
		$this->assign('news', $info);
		$this->assign('cate', $cate);
		$this->display('Admin/News/wedit.html');
	}

	/**
	 * 编辑
	 */
	public function postedit()
	{
		if ($_POST) {
			$NewsModel = new NewsModel();
			//标题
			$title = $_POST['title'];
			//描述
			$desc = $_POST['desc'];
			//图片
			$thumb = $_POST['thumb'];
			//内容
			$content = $_POST['content'];
			$cid = $_POST['cate_id'];
			$id = $_POST['id'];
			if ($id) {
				$re = $NewsModel->upInfo($id, $title, $content, $cid, $thumb, $desc);
			} else {
				$re = $NewsModel->addInfo($title, $content, 1, $cid, $thumb, $desc);
			}
		}
		if ($re) {
			success('编辑成功');
		} else {
			error('编辑失败');
		}
	}

}
