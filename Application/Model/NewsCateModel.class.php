<?php

class NewsCateModel extends Model
{
	// 表名
	protected $_table = DB_FN . 'news_cate';

	/* 业务逻辑层实现 */
	public function getList($where, $page = 1, $limit = 10)
	{

		$item = $this->where($where)->selectAll();
		return $item;
	}

	/* 业务逻辑层实现 */
	public function getAll()
	{

		$item = $this->selectAll();
		return $item;
	}
}