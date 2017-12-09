<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/8
 * Time: 15:25
 */
class WxwordModel extends Model
{
	//表名
	protected $_table = DB_FN . 'wxword';

	/**
	 * @return string
	 */
	public function addinfo($cate_id, $content)
	{

		$data['cate_id'] = $cate_id;
		$data['content'] = addslashes(sprintf("%s", $content));
		$data['type'] = 1;
		$data['create_time'] = time();
		$re = $this->add($data);
		return $re;
	}
	/*
	 *
	 */
	public function getAll()
	{
		$re = $this->selectAll();
		return $re;
	}

	/*
	 *
	 */
	public function getOne($cate_id)
	{
		$where['cate_id'] = $cate_id;
		$re = $this->where($where)->find();
		return $re;
	}

	/**
	 * @return string
	 */
	public function upInfo($id, $content)
	{
		$data['text'] = $content;
		return $this->update($id, $data);
	}

}