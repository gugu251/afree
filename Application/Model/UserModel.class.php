<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/5
 * Time: 12:13
 */
class UserModel extends Model
{
	// 表名
	protected $_table = DB_FN . 'user';

	/**
	 * 获取用户组
	 * @param $uids
	 * @return mixed
	 */
	public function getArrByIds($uids)
	{
		$userArr = $this->wherein('user_id', $uids)->selectAll();
		$reArr = array();
		foreach ($userArr as $key => $value) {
			$user_id = $value['user_id'];
			$reArr[$user_id] = $value;
		}
		return $reArr;
	}

	/**
	 *获取单个用户信息
	 *
	 */
	public function getOne($user_id)
	{
		$where['user_id'] = $user_id;
		$info = (new UserModel)->where($where)->find();
		return $info;
	}

	/**
	 * 获取一个用户
	 */
	public function getOneByMobile($mobile)
	{
		$where['user_name'] = $mobile;
		$info = $this->where($where)->find();
		return $info;
	}

	/**
	 * 注册用户
	 * @param $mobile
	 * @param $password
	 * @return mixed
	 */
	public function register($mobile, $password, $user_source = 1)
	{
		$time = time();
		$data['password'] = md5($password);
		$data['user_name'] = $mobile;
		$data['user_login_ip'] = $_SERVER["REMOTE_ADDR"];
		$data['user_source'] = $user_source;
		$data['update_time'] = $time;
		$data['create_time'] = $time;
		$re = $this->add($data);
		return $re;
	}


	/**
	 * 验证用户是否存在
	 */
	public function verify($mobile, $password, $type = 1)
	{
		$where['user_name'] = $mobile;
		$info = $this->where($where)->find();
		if ($type == 1) {
			if (!$info['user_id']) {
				error('用户不存在');
			}
			if ($info['password'] != md5($password)) {
				error('密码错误');
			}
			return $info;
		} else {
			if ($info['user_id']) {
				error('用户已存在');
			}
			return true;
		}
	}
}