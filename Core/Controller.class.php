<?php

/**
 * 控制器基类
 */
class Controller {

    protected $_controller;
    protected $_action;
    protected $_view;
    protected $views;

    // 构造函数，初始化属性，并实例化对应模型
    public function __construct() {
        
        $this->views                  = new Smarty();
        $this->views->template_dir    = APP_PATH . 'Application/View/';
        $this->views->compile_dir     = APP_PATH . 'Runtime/View/';
        $this->views->config_dir      = APP_PATH . 'Core/Vendor/Smarty/configs/';
        $this->views->cache_dir       = APP_PATH . 'Runtime/Cache/';
        $this->views->left_delimiter  = '<!--{';
        $this->views->right_delimiter = '}-->';
    }

    // 分配变量
    public function assign($name, $value) {
        $this->views->assign($name, $value);
    }

    // 渲染视图
    public function render() {
        $this->_view->render();
    }

    // 渲染视图
    public function display($view) {
        $this->views->display($view);
    }

}
