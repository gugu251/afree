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
		$reArr= array();
		foreach ($userArr as $key => $value){
			$user_id = $value['user_id'];
			$reArr[$user_id] = $value;
		}
		return $reArr;
	}

	/**
	 *获取单个用户信息
	 */
	public function getOne($user_id)
	{
		$where['user_id'] = $user_id;
		$info = (new UserModel)->where($where)->find();
		return $info;
	}
}