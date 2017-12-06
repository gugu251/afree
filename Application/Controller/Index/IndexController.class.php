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
	public function newslist()
	{
		$items = (new NewsModel)->getList(1);

		$this->assign('title', '图文列表页');
		$this->assign('news', $items);
//      exit;
		$this->display('Index/newslist.html');
	}

	/**
	 * 登陆
	 */
	public function login()
	{
		$this->display('Public/login.html');
	}

	/**
	 * 注册
	 */
	public function register()
	{
		$this->display('Public/register.html');
	}

	/**
	 * ajax
	 * 登录注册
	 */
	public function postLogin()
	{
		if ($_POST['mobile'] && $_POST['password']) {
			$mobile = $_POST['mobile'];
			$password = $_POST['password'];
			if (!preg_match("/^1[34578]\d{9}$/", $mobile)) {
				error('手机号错误!');
			}
			$re = (new UserModel)->verify($mobile, $password);

		}

		if ($re) {
			$_SESSION['user_id'] = $re['user_id'];
			$_SESSION['user_name'] = $re['user_name'];
			$_SESSION['user_avatar'] = $re['user_avatar'];
			success('登陆成功');
		} else {
			error('手机号或密码不存在!');
		}
	}

	/**
	 * ajax
	 * 登录注册
	 */
	public function postRegister()
	{
		if ($_POST['mobile'] && $_POST['password'] && $_POST['password2']) {
			if ($_POST['password'] != $_POST['password2']) {
				error('两次输入密码不同!');
			}
			$mobile = $_POST['mobile'];
			$password = $_POST['password'];
			if (!preg_match("/^1[34578]\d{9}$/", $mobile)) {
				error('手机号错误!');
			}
			$usermodel = new UserModel();
			$re = $usermodel->verify($mobile, $password, 2);
			if ($re) {
				$uid = $usermodel->register($mobile, $password);
			}
		}
		if ($uid) {
			$_SESSION['user_id'] = $uid;
			$_SESSION['user_name'] = $mobile;
			$_SESSION['user_avatar'] = '';
			success('注册成功');
		} else {
			error('手机号或密码不存在!');
		}
	}
}