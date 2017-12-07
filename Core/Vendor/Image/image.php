<?PHP
/**
 * 图片锐化处理
 */
$red= imagecolorallocate($img, 255, 0, 0);

imageline($img, 0, 0, 100, 100, $red);
imageellipse($img, 200, 100, 100, 100, $red);
imagegif($img, "./images/map2.gif");
imagedestroy($img);
图片普通缩放
 代码如下:

 $filename="./images/hee.jpg";
 $per=0.3;
 list($width, $height)=getimagesize($filename);
 $n_w=$width*$per;
 $n_h=$width*$per;
 $new=imagecreatetruecolor($n_w, $n_h);
 $img=imagecreatefromjpeg($filename);
 //拷贝部分图像并调整
 imagecopyresized($new, $img,0, 0,0, 0,$n_w, $n_h, $width, $height);
 //图像输出新图片、另存为
 imagejpeg($new, "./images/hee2.jpg");
 imagedestroy($new);
 imagedestroy($img);


/**
 * 图片等比例缩放、没处理透明色
 * thumn("images/hee.jpg", 200, 200, "./images/hee3.jpg");
 * @param $background
 * @param $width
 * @param $height
 * @param $newfile
 */
 function thumn($background, $width, $height, $newfile) {
	 list($s_w, $s_h)=getimagesize($background);//获取原图片高度、宽度
	 if ($width && ($s_w < $s_h)) {
		 $width = ($height / $s_h) * $s_w;
	 } else {
		 $height = ($width / $s_w) * $s_h;
	 }
	 $new=imagecreatetruecolor($width, $height);
	 $img=imagecreatefromjpeg($background);
	 imagecopyresampled($new, $img, 0, 0, 0, 0, $width, $height, $s_w, $s_h);
	 imagejpeg($new, $newfile);
	 imagedestroy($new);
	 imagedestroy($img);
 }



/**
 *  gif透明色处理
 *  thumn("images/map.gif", 200, 200, "./images/map3.gif");
 * @param $background
 * @param $width
 * @param $height
 * @param $newfile
 */
 function thumn($background, $width, $height, $newfile) {
	 list($s_w, $s_h)=getimagesize($background);
	 if ($width && ($s_w < $s_h)) {
		 $width = ($height / $s_h) * $s_w;
	 } else {
		 $height = ($width / $s_w) * $s_h;
	 }
	 $new=imagecreatetruecolor($width, $height);
	 $img=imagecreatefromgif($background);
	 $otsc=imagecolortransparent($img);
	 if($otsc >=0 && $otst < imagecolorstotal($img)){//判断索引色
		 $tran=imagecolorsforindex($img, $otsc);//索引颜色值
		 $newt=imagecolorallocate($new, $tran["red"], $tran["green"], $tran["blue"]);
		 imagefill($new, 0, 0, $newt);
		 imagecolortransparent($new, $newt);
	 }
	 imagecopyresized($new, $img, 0, 0, 0, 0, $width, $height, $s_w, $s_h);
	 imagegif($new, $newfile);
	 imagedestroy($new);
	 imagedestroy($img);
 }
