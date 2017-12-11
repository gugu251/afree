<?php

class NewsModel extends Model
{
	// 表名
	protected $_table = DB_FN . 'news';

	/**
	 * @return string
	 */
	public function getOne($id)
	{
		$info = $this->select($id);
		$user = (new UserModel)->getOne($info['user_id']);
		$info['user_name'] = $user['user_name'];
		$info['user_avatar'] = $user['user_avatar'];
		$info['user_nickname'] = $user['user_nickname'];
		$info['date_time'] = date('Y-m-d H:i:s', $info['create_time']);
		return $info;
	}

	/* 业务逻辑层实现 */
	public function getList($where, $page = 1, $limit = 10)
	{
		$list = $this->where($where)->selectAll();
		$uids = array();
		foreach ($list as $value) {
			$uids[] = $value['user_id'];
		}
		//用户组
		$uids = array_unique($uids);
		$userArr = (new UserModel)->getArrByIds($uids);
		$NewsCateMM = new NewsCateModel();
		foreach ($list as $kk => $vv) {
			$list[$kk]['user_nickname'] = $userArr[$vv['user_id']]['user_nickname'];
			$list[$kk]['user_avatar'] = $userArr[$vv['user_id']]['user_avatar'];
			$list[$kk]['cate_name'] = $NewsCateMM->getNameById($vv['cate_id']);
			$list[$kk]['date_time'] = date('Y-m-d H:i:s', $vv['create_time']);
			$list[$kk]['desc'] = $vv['desc'] ? $vv['desc'] : cutArticle($vv['content']);
		}
		return $list;
	}

	/**
	 * 添加图文
	 * @param $title
	 * @param $content
	 * @param $user_id
	 * @param $cid
	 * @return mixed
	 */
	public function addInfo($title, $content, $user_id, $cid, $thumb, $desc)
	{
		$data['title'] = $title;
		$data['content'] = addslashes($content);
		$data['thumb'] = $thumb;
		$data['desc'] = $desc ? $desc : cutArticle($content);
		$data['user_id'] = $user_id;
		$data['cate_id'] = $cid;
		$data['create_time'] = time();
		$data['update_time'] = time();
		$re = $this->add($data);
		return $re;
	}

	/**
	 * 修改图文
	 * @return string
	 */
	public function upInfo($id, $title, $content, $cid, $thumb, $desc)
	{
		$data['title'] = $title;
		$data['content'] = addslashes($content);
		$data['thumb'] = $thumb;
		$data['cate_id'] = $cid;
		$data['desc'] = $desc ? $desc : cutArticle($content);
		$data['update_time'] = time();
		return $this->update($id, $data);
	}
}