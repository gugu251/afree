<?php
/**
 * Created by PhpStorm.
 * User: afree
 * Date: 17/12/4
 * Time: 下午9:30
 */

class LoginController extends Controller
{
	public function __construct()
	{
		parent::__construct();
		if(!$_SESSION['user_id']){
			header('Location: http://www.ccc.com/index/index/login');
		}
	}

}
