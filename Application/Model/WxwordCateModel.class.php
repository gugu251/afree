<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/8
 * Time: 15:54
 */

class WxwordCateModel extends Model
{
	//表名
	protected $_table = DB_FN . 'wxword_cate';

	/**
	 * @param string $table
	 */
	public function addinfo($pid, $content)
	{
		$data['pid'] = $pid;
		$data['content'] = $content;
		$re = $this->add($data);
		return $re;
	}

	/*
	 *
	 */
	public function getOne($pid){
		$where['pid'] = $pid;
		$re = $this->where($where)->find();
		return $re;
	}
}