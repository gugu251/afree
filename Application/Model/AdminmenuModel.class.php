<?php

class AdminmenuModel extends Model {
    /* 业务逻辑层实现 */

    /**
     * 获取后台栏目列表
     * @return type
     */
    public function getMenuList() {
        $list  = $this->selectAll();
        $menus = array();
        foreach ($list as $key => $value) {
            if ($value['adminmenu_pid'] > 0) {
                $menus[$value['adminmenu_pid']]['son'][] = $value;
            } else {
                $menus[$value['adminmenu_id']] = $value;
                $menus[$value['adminmenu_id']]['son'] = array();
            }
        }
//        var_dump($menus);
        return $menus;
    }

}
