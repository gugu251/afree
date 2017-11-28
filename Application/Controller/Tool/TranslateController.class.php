<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/28
 * Time: 14:21
 */

use Stichoza\GoogleTranslate\TranslateClient;

class TranslateController extends Controller
{
    /**
     * 翻译功能列表
     */
    public function index(){

        $this->display('Tool/Translate/index.html');
    }
    /**
     * html源码翻译
     */
    public function fyHtml()
    {
        //引入文件
        require CORE_PATH . 'Vendor/Translate/autoload.php';
        //翻译数据
        $data = trim($_POST['content']);
        //语言
        $language = trim($_POST['language']);
        $data = trim($_POST['content']);
        if ($data) {
            //正则匹配所有中文 仅限中文
            $list = preg_match_all("#(?:(?![，。？])[\xC0-\xFF][\x80-\xBF]+)+#", $data, $arr, PREG_PATTERN_ORDER);
            $tmpArr = $arr[0];
            $len = count($tmpArr);

            //中文数组排序
            //该层循环控制 需要冒泡的轮数
            for ($i = 1; $i < $len; $i++) {
                //该层循环用来控制每轮 冒出一个数 需要比较的次数
                for ($k = 0; $k < $len - $i; $k++) {
                    if (mb_strlen($tmpArr[$k]) < mb_strlen($tmpArr[$k + 1])) {
                        $tmp = $tmpArr[$k + 1];
                        $tmpArr[$k + 1] = $tmpArr[$k];
                        $tmpArr[$k] = $tmp;
                    }
                }
            }
            //去除重复
            $uniqueArr = array_unique($tmpArr);


            //语言
//            $languageArr = array('en', 'ja', 'ko', 'fr', 'zh_Hant');
            $tr = new TranslateClient();
            $tr->setSource('zh'); // Translate from English

            $translate = array();
            $tr->setTarget($language);
            $tr->setUrlBase('http://translate.google.cn/translate_a/single');
            foreach ($uniqueArr as $key => $value) {
                $translate[] = trim($tr->translate($value));
            }
            $kk = str_replace($uniqueArr, $translate, $data);

        }
        $this->assign('postcontent', $data);
        $this->assign('title', 'html翻译');
        $this->assign('content', $kk);
        $this->display('Tool/Translate/fyhtml.html');

    }

    /**
     * 文字翻译
     */
    public function fyWord()
    {
        //引入文件
        require CORE_PATH . 'Vendor/Translate/autoload.php';
        //翻译数据
        $data = trim($_POST['content']);
        //语言
        $language = trim($_POST['language']);
        $data = trim($_POST['content']);
        if ($data) {

            $tr = new TranslateClient();
            $tr->setSource('zh');
            $tr->setTarget($language);
            $tr->setUrlBase('http://translate.google.cn/translate_a/single');
            $kk = trim($tr->translate($data));

        }
        $this->assign('postcontent', $data);
        $this->assign('title', 'html翻译');
        $this->assign('content', $kk);
        $this->display('Tool/Translate/fyhtml.html');

    }
}
