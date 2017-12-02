<?php

class AdminmenuModel extends Model
{
	// 表名
	protected $_table = DB_FN . 'adminmenu';

    /* 业务逻辑层实现 */

    /**
     * 获取后台栏目列表
     * @return type
     */
    public function getMenuList()
    {
        $list = $this->selectAll();
        $menus = array();
        foreach ($list as $key => $value) {
            if ($value['pid'] > 0) {
                $menus[$value['pid']]['son'][] = $value;
            } else {
                $menus[$value['id']] = $value;
                $menus[$value['id']]['son'] = array();
            }
        }
//        var_dump($menus);
        return $menus;
    }

}
