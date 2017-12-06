<?php
/**
 * Created by PhpStorm.
 * User: afree
 * Date: 17/12/4
 * Time: 下午9:30
 */

class BaseController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $cate = (new NewsCateModel)->getAll();
        $this->assign('newscate',$cate);
    }

}
