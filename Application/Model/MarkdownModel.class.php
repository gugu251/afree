<?php

class MarkdownModel extends Model
{
	// 表名
	protected $_table = DB_FN . 'markdown';

	/* 业务逻辑层实现 */
	public function getlist($where)
	{
		$list = $this->where($where)->selectAll();
		return $list;
	}

	/**
	 * 获取一条数据
	 * @param $id
	 * @return mixed
	 */
	public function getOne($id)
	{
		$where['id'] = $id;
		$list = $this->where($where)->find();
		return $list;
	}

	/**
	 * 添加一条数据
	 * CREATE TABLE `fn_markdown` (
	 * `id` int(11) NOT NULL AUTO_INCREMENT,
	 * `cid` int(11) DEFAULT NULL COMMENT '分类id',
	 * `user_id` int(11) DEFAULT NULL COMMENT '用户uid',
	 * `title` varchar(255) DEFAULT NULL COMMENT '标题',
	 * `desc` varchar(255) DEFAULT NULL COMMENT '简介',
	 * `content` text COMMENT '内容',
	 * `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
	 * `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
	 * PRIMARY KEY (`id`) USING BTREE
	 * ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='markdown笔记列表';
	 */
	public function addInfo($title, $content, $user_id, $cid)
	{
		$data['title'] = $title;
		$data['content'] = $content;
		$data['user_id'] = $user_id;
		$data['cid'] = $cid;
		$data['create_time'] = time();
		$data['update_time'] = time();
		$re = $this->add($data);
		return $re;
	}

	/**
	 * @return string
	 */
	public function upInfo($id, $title, $content, $cid)
	{
		$data['title'] = $title;
		$data['content'] = $content;
		$data['cid'] = $cid;
		$data['update_time'] = time();
		return $this->update($id, $data);
	}

}