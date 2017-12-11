<?php

class AdminController extends Controller {

    /**
     * 后台管理首页
     */
    public function __construct() {
        parent::__construct();
		if(!$_SESSION['admin_uid']){
			header('Location: http://www.ccc.com/admin/login/login');
		}
        $menus = (new AdminmenuModel)->getMenuList();
        $this->assign('menus', $menus);

    }

}
