<?php

class NewsModel extends Model
{
	// 表名
	protected $_table = DB_FN . 'news';

	/* 业务逻辑层实现 */
	public function getList($where, $page = 1, $limit = 10)
	{

		$item = $this->where($where)->selectAll();
		return $item;
	}
}