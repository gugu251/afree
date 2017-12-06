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
		var_dump($_FILES);exit;
		$picname = $_FILES['mypic']['name'];
		$picsize = $_FILES['mypic']['size'];
		if ($picname != "") {
			if ($picsize > 1024000) {
				echo '图片大小不能超过1M';
				exit;
			}
			$type = strstr($picname, '.');
			if ($type != ".gif" && $type != ".jpg") {
				echo '图片格式不对！';
				exit;
			}
			$rand = rand(100, 999);
			$pics = date("YmdHis") . $rand . $type;
			//上传路径
			$pic_path = "files/" . $pics;
			move_uploaded_file($_FILES['mypic']['tmp_name'], $pic_path);
		}
		$size = round($picsize / 1024, 2);
		$arr = array(
			'name' => $picname,
			'pic'  => $pics,
			'size' => $size
		);
		echo json_encode($arr);
	}
}