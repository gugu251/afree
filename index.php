<?php

//PRC  中华人民共和国  上海的时区
date_default_timezone_set("Asia/Shanghai");

//网站目录
define('APP_PATH', dirname($_SERVER['SCRIPT_FILENAME']) . '/');

// 开启调试模式
define('APP_DEBUG', true);

//默认访问目录
//define('APP_NAME', 'index');

// 网站根URL
define('APP_URL', 'http://www.bbb.com');

//核心框架目录
define('CORE_PATH', APP_PATH . 'Core/');

//公共样式目录
define('APP_PUBLIC', APP_PATH . 'Public/');

//公共函数目录
define('APP_COMMON', CORE_PATH . 'Common/');

// 加载框架
require CORE_PATH . 'AfreePHP.php';


