<?php

class AdminController extends Controller {

    /**
     * 后台管理首页
     */
    public function __construct() {
        parent::__construct();
        $menus = (new AdminmenuModel)->getMenuList();
        $this->assign('menus', $menus);

    }

}
