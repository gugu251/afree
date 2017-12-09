<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/8
 * Time: 10:49
 * 文字管理处理
 */
class WordController extends Controller
{
	/**
	 * pdf 在线阅读
	 * 安卓手机浏览器无法在线阅读
	 */
	public function pdfOnline()
	{
		$pdf = $_GET['file'] ? $_GET['file'] : '111.pdf';
		$url = 'http://www.ccc.com/Public/upload/word/pdf/' . $pdf;
		$this->assign('title', 'pdf在线阅读');
		$this->assign('pdf', $url);
		$this->display('Tool/Word/pdfOnline.html');
	}

	/**
	 * 微信编辑器
	 */
	public function wxword()
	{
		$this->assign('title', '微信编辑器');
		$this->display('Tool/Word/wxword.html');
	}

	/**
	 * 获取word
	 * http://www.ccc.com/tool/word/getwxword?Tid=&type=98
	 */
	public function getwxword()
	{
		$cate_id = $_GET['Tid'] ? $_GET['Tid'] : 262;
		$info = (new WxwordModel)->getOne($cate_id);
		echo $info['text'] ? $info['text'] : $info['content'];
	}

	/**
	 * 获取wordcate
	 * http://bj.96weixin.com/index/option/?pid=100&type=96
	 */
	public function getwxwordcate()
	{
		$pid = $_GET['pid'] ? $_GET['pid'] : 1;
		$info = (new WxwordCateModel)->getOne($pid);
		echo $info['content'];
	}

	/**
	 * 获取内容
	 */
	public function getdataTid()
	{
		set_time_limit(0);
		$wxwordMM = new WxwordModel();
		for ($i = 1; $i < 1000; $i++) {
			$url = "http://bj.96weixin.com/index/choice/?Tid={$i}&type=1";
			$re = getCurl($url);
			if ($re) {
				$n = $wxwordMM->addinfo($i, $re);
				var_dump($n);
			}
		}
	}

	/**
	 * 获取内容
	 */
	public function getdataPid()
	{
		set_time_limit(0);
		$wxwordMM = new WxwordCateModel();
		for ($i = 1; $i < 1000; $i++) {
			$url = "http://bj.96weixin.com/index/option/?pid={$i}&type=1";
			$re = getCurl($url);
			if ($re) {
				$n = $wxwordMM->addinfo($i, $re);
				var_dump($n);
			}
		}
	}

	public function ff()
	{
		set_time_limit(0);
//		$cate_id = $_GET['cate_id'] ? $_GET['cate_id'] : 5;
		$wxwordMM = new WxwordModel();
		$info = $wxwordMM->getAll();
		foreach ($info as $kk => $vv) {
			$match = '';
			preg_match_all('/<img[^>]*src\s?=\s?[\'|"]([^\'|"]*)[\'|"]/is', $vv['content'], $match);
			$urlArr = array();
			if (count($match[1]) > 0) {
				foreach ($match[1] as $key => $val) {
					$urlArr[] = imgSavefile($val, $vv['cate_id']);
				}
				$html = str_replace($match[1], $urlArr, $vv['content']);

				$re = $wxwordMM->upInfo($vv['id'], $html);
			}
		}
	}

	public function dd()
	{
		set_time_limit(0);
		$cate_id = $_GET['cate_id'] ? $_GET['cate_id'] : 6;
		$wxwordMM = new WxwordModel();
		$info = $wxwordMM->getOne($cate_id);

		preg_match_all('/<img[^>]*src\s?=\s?[\'|"]([^\'|"]*)[\'|"]/is', $info['content'], $match);
		var_dump($match);
		exit;
		$urlArr = array();
		foreach ($match[1] as $key => $val) {
			$urlArr[] = imgSavefile($val, $info['cate_id']);
		}
		var_dump($info['content']);
		$html = str_replace($match[1], $urlArr, $vv['content']);
		$re = $wxwordMM->upInfo($vv['cate_id'], $html);
		var_dump($re);
		exit;
	}
}