<?php

/**
 * 视图基类
 */
class View {

    protected $variables = array();
    protected $_controller;
    protected $_action;

    public function __construct($controller, $action) {
        $this->_controller = $controller;
        $this->_action     = $action;
    }

    // 分配变量
    public function assign($name, $value) {
        $this->variables[$name] = $value;
    }

    // 渲染显示
    public function render() {
        
    }

}
