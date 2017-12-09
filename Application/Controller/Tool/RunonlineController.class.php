<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/9
 * Time: 15:33
 */
class RunonlineController extends Controller
{
	/**
	 * html 在线运行
	 */
	public function html(){
		$this->assign('title', '微信编辑器');
		$this->display('Tool/runonline/htmlonline.html');
	}
}