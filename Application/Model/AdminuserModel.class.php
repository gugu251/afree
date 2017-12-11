<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/11
 * Time: 18:27
 */
class AdminuserModel extends Model
{
	// 表名
	protected $_table = DB_FN . 'adminuser';

	public function getOne($id)
	{
		$info = $this->select($id);
		return $info;
	}

	/**
	 * 验证用户是否存在
	 */
	public function verify($name, $password)
	{
		$where['name'] = $name;
		$where['password'] = md5($password);
		$info = $this->where($where)->find();
		if (!$info['id']) {
			error('用户不存在');
		}
		if ($info['password'] != md5($password)) {
			error('密码错误');
		}
		return $info;
	}
}