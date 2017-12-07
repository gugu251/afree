<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/6
 * Time: 17:37
 */
class UploadController extends Controller
{
	public function imgUpload()
	{
		if (count($_FILES) > 0) {
			$urlArr = array();
			foreach ($_FILES as $key => $val) {
				$reArr = $this->imgtofile($val);
				if ($reArr['status'] == 1) {
					$urlArr[] = $reArr['message'];
				}
			}
		}

		$arr = array(
			'errno' => 0,
			'data'  => array_values($urlArr)
		);
		echo json_encode($arr);
	}

	/**
	 * 图片上传
	 * @param $data
	 * @param string $name
	 * @param int $size
	 * @return array|string
	 */
	public function imgtofile($data, $name = 'news', $size = 1024000)
	{
		$picname = $data['name'];
		$picsize = $data['size'];
		if (!$picname) {
			return array('status' => 2, 'message' => '图片不能为空！');
		}

		if ($picsize > $size) {
			return array('status' => 2, 'message' => '图片大小不能超过1M！');
		}

		$type = explode('.', $picname);
		$imgtype = $type['1'];

		$imgArr = array('jpg', 'png', 'gif');
		if (!in_array($imgtype, $imgArr)) {
			return array('status' => 2, 'message' => '图片格式不对！');
		}

		$path = APP_PUBLIC_UPLOAD . '/' . $name . '/' . date("Ymd");

		$rand = rand(100, 999);
		$pics = date("YmdHis") . $rand . '.' . $imgtype;
		$url = '/Public/upload/' . $name . '/' . date("Ymd") . '/' . $pics;

		move_uploaded_file($data['tmp_name'], $path . '/' . $pics);
		$size = round($picsize / 1024, 2);

		return array('status' => 1, 'message' => $url, 'size' => $size);

	}
}