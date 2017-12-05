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
		} else {
			define('APP_NAME', 'Index');
		}
	} else {
		define('APP_NAME', 'Index');
	}
}

/**
 *  获取文章的摘要
 *
 * @param string $data
 * @param int $cut 字数 自定义
 * @param string $str
 * @return type
 */
function cutArticle($data, $cut = 200, $str = "...")
{
	$data = strip_tags($data);
	$pattern = "/&[a-zA-Z]+;/";
	$data = preg_replace($pattern, '', $data);
	if (!is_numeric($cut)) {
		return $data;
	}
	if ($cut > 0) {
		$data = trim(mb_strimwidth($data, 0, $cut, $str));
	}
	return $data;
}

/**
 * 4      * 解密
 * 5      *
 * 6      * @param string $encryptedText 已加密字符串
 * 7      * @param string $key 密钥
 * @return string
 */
function decrypt($encryptedText, $key = '12306')
{
	$cryptText = base64_decode($encryptedText);
	$ivSize = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
	$iv = mcrypt_create_iv($ivSize, MCRYPT_RAND);
	$decryptText = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, $cryptText, MCRYPT_MODE_ECB, $iv);
	return trim($decryptText);
}

/**
 * 加密
 *
 * @param string $plainText 未加密字符串
 * @param string $key 密钥
 */
function encrypt($plainText, $key = '12306')
{
	$ivSize = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
	$iv = mcrypt_create_iv($ivSize, MCRYPT_RAND);
	$encryptText = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $plainText, MCRYPT_MODE_ECB, $iv);
	return trim(base64_encode($encryptText));
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
