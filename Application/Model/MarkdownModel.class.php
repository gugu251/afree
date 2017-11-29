<?php

class MarkdownModel extends Model
{
	/* 业务逻辑层实现 */
	public function getlist($where)
	{
		$list = $this->where($where)->selectAll();
		return $list;
	}

	public function getOne($id)
	{
		$where['id'] = $id;
		$list = $this->where($where)->find();
		return $list;
	}

}