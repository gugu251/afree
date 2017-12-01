<?php

//获取主控制目录
function getAppName()
{
	if (!empty($_SERVER['PATH_INFO'])) {

		$url = $_SERVER['PATH_INFO'];

		// 使用“/”分割字符串，并保存在数组中
		$urlArray = explode('/', $url);

		// 删除空的数组元素
		$urlArray = array_values(array_filter($urlArray));

		// 目录名
		$fileName = ucfirst($urlArray[0]);
		if ($fileName) {
			define('APP_NAME', $fileName);
		}
	} else {
		define('APP_NAME', 'index');
	}
}

/**
 * 加载第三方扩展类
 * $path 路径
 * $phpName 引入php名
 */
function vendor($path, $phpName)
{
	require CORE_PATH . 'Vendor/' . $path . '/' . $phpName;
}

/**
 * 实例化一个没有模型文件的Model
 * @param string $name Model名称 支持指定基础模型 例如 MongoModel:User
 * @param string $tablePrefix 表前缀
 * @param mixed $connection 数据库连接信息
 * @return Think\Model
 */
function M($name = '')
{
	$mm = new $name();
	return $mm;
}


/**
 * 解析一个数组变量,将其各键值定义为常量
 * @param type $conf
 */
function compileConf($conf)
{
	foreach ($conf as $key => $val) {
		if (is_array($val)) {
			compileConf($val);
		} else {
			define($key, $val);
		}
	}
}

//检查文件夹是否存在  没有并创建
function build()
{
	if (file_exists(RUNTIME_PATH . 'build.lock')) {
		return true;
	}
	if (!defined('APP_NAME') || !defined('APP_PATH')) {
		return false;
	}
	$path = str_replace("\\", '/', realpath(str_replace("\\", '/', APP_PATH)));
	if (!$path) {
		return false;
	}
	$ret = true;
	if (!is_dir($path . '/' . APP_NAME . '/Common')) {
		$ret = mkdirs($path . '/' . APP_NAME . '/Common');
	}
	if (!$ret) {
		return false;
	}

	if (!is_dir($path . '/Runtime/Cache/' . APP_NAME)) {
		$ret = mkdirs($path . '/Runtime/Cache/' . APP_NAME);
	}
	if (!$ret)
		return false;
	if (!is_dir($path . '/Runtime/Data/' . APP_NAME))
		$ret = mkdirs($path . '/Runtime/Data/' . APP_NAME);

	file_put_contents(RUNTIME_PATH . 'build.lock', '');
	return true;
}

//安全模式
function safe()
{
	if (!OPEN_SAFE_MODEL)
		return;
	if (is_array($_REQUEST) && !empty($_REQUEST)) {
		foreach ($_REQUEST as $k => $v) {
			$is_get = isset($_GET[$k]) ? true : false;
			$is_post = isset($_POST[$k]) ? true : false;
			$v = trim($v);
			unset($_REQUEST[$k], $_GET[$k], $_POST[$k]);
			$k = trim($k);
			$k = urldecode($k);
			$v = urldecode($v);

			if ($k != addslashes($k) || $k != strip_tags($k) || htmlspecialchars($k) != $k || (strpos($k, '%') !== false))
				die('you are too young too simple, you ip:' . getIp());
			//integer value
			if (stripos($k, 'i_') === 0)
				$v = intval($v);
			//float value
			elseif (stripos($k, 'f_') === 0)
				$v = floatval($v);
			//double value
			elseif (stripos($k, 'd_') === 0)
				$v = doubleval($v);
			//text value
			elseif (stripos($k, 't_') === 0)
				$v = trim(strip_tags($v));
			//html value
			elseif (stripos($k, 'h_') === 0)
				$v = '<pre>' . trim(htmlspecialchars($v)) . '</pre>';
			if ($is_get)
				$_GET[$k] = $v;
			if ($is_post)
				$_POST[$k] = $v;
			$_REQUEST[$k] = $v;
		}
	}

	if (is_array($_SERVER) && !empty($_SERVER)) {
		foreach ($_SERVER as $k => $v) {
			if (is_array($v))
				continue;
			$v = trim($v);
			$k = trim($k);

			if ($k != addslashes($k) || $k != strip_tags($k) || htmlspecialchars($k) != $k || (strpos($k, '%') !== false))
				die('you are too young too simple, you ip:' . getIp());
		}
	}

	if (is_array($_COOKIE) && !empty($_COOKIE)) {
		foreach ($_COOKIE as $k => $v) {
			$v = trim($v);
			unset($_COOKIE[$k]);
			$k = trim($k);
			$k = urldecode($k);
			$v = urldecode($v);

			if ($k != addslashes($k) || $k != strip_tags($k) || htmlspecialchars($k) != $k || (strpos($k, '%') !== false))
				die('you are too young too simple, you ip:' . getIp());
			//integer value
			if (stripos($k, 'i_') === 0)
				$v = intval($v);
			//float value
			elseif (stripos($k, 'f_') === 0)
				$v = floatval($v);
			//double value
			elseif (stripos($k, 'd_') === 0)
				$v = doubleval($v);
			//text value
			elseif (stripos($k, 't_') === 0)
				$v = trim(strip_tags($v));
			//html value
			elseif (stripos($k, 'h_') === 0)
				$v = trim(htmlspecialchars($v));
			$_COOKIE[$k] = $v;
		}
	}
}
