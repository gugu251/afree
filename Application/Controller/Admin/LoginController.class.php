<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/11
 * Time: 18:24
 */
class LoginController extends Controller
{
	/**
	 * 登陆
	 */
	public function login()
	{
		$this->display('Admin/Public/login.html');
	}

	/**
	 * 注册
	 */
	public function register()
	{
		$this->display('Admin/Public/register.html');
	}

	/**
	 * ajax
	 * 登录注册
	 */
	public function postLogin()
	{
		if ($_POST['name'] && $_POST['password']) {
			$name = $_POST['name'];
			$password = $_POST['password'];
			$re = (new AdminuserModel)->verify($name, $password);
		}
		if ($re) {
			$_SESSION['admin_name'] = $re['id'];
			$_SESSION['admin_uid'] = $re['name'];
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