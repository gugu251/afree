<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/2
 * Time: 15:13
 */
class MarkdowncateModel extends Model
{
	//表名
	protected $_table = DB_FN . 'markdown_cate';

	public function getAll()
	{
		$list = $this->selectAll();
		return $list;
	}
}