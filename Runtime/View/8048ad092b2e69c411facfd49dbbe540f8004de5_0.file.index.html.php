<?php
/* Smarty version 3.1.32-dev-38, created on 2017-11-28 12:38:06
  from 'D:\GIT\afree\Application\View\Admin\index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_5a1ce82e76c350_05956999',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8048ad092b2e69c411facfd49dbbe540f8004de5' => 
    array (
      0 => 'D:\\GIT\\afree\\Application\\View\\Admin\\index.html',
      1 => 1511843882,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Admin/Public/header.html' => 1,
    'file:Admin/Public/footer.html' => 1,
  ),
),false)) {
function content_5a1ce82e76c350_05956999 (Smarty_Internal_Template $_smarty_tpl) {
?><!--头部 start-->
<?php $_smarty_tpl->_subTemplateRender('file:Admin/Public/header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<!--头部 end-->

<div class="tpl-content-wrapper">
    <div class="tpl-content-page-title">
        Amaze UI 文字列表
    </div>
    <ol class="am-breadcrumb">
        <li><a href="#" class="am-icon-home">首页</a></li>
        <li><a href="#">Amaze UI CSS</a></li>
        <li class="am-active">文字列表</li>
    </ol>
    <div class="tpl-portlet-components">
        <div class="portlet-title">
            <div class="caption font-green bold">
                <span class="am-icon-code"></span> 列表
            </div>
            <div class="tpl-portlet-input tpl-fz-ml">
                <div class="portlet-input input-small input-inline">
                    <div class="input-icon right">
                        <i class="am-icon-search"></i>
                        <input type="text" class="form-control form-control-solid" placeholder="搜索..."></div>
                </div>
            </div>


        </div>
        <div class="tpl-block">
            <div class="am-g">
                <div class="am-u-sm-12 am-u-md-6">
                    <div class="am-btn-toolbar">
                        <div class="am-btn-group am-btn-group-xs">
                            <button type="button" class="am-btn am-btn-default am-btn-success"><span
                                    class="am-icon-plus"></span> 新增
                            </button>
                            <button type="button" class="am-btn am-btn-default am-btn-secondary"><span
                                    class="am-icon-save"></span> 保存
                            </button>
                            <button type="button" class="am-btn am-btn-default am-btn-warning"><span
                                    class="am-icon-archive"></span> 审核
                            </button>
                            <button type="button" class="am-btn am-btn-default am-btn-danger"><span
                                    class="am-icon-trash-o"></span> 删除
                            </button>
                        </div>
                    </div>
                </div>
                <div class="am-u-sm-12 am-u-md-3">
                    <div class="am-form-group">
                        <select data-am-selected="{btnSize: 'sm'}">
                            <option value="option1">所有类别</option>
                            <option value="option2">IT业界</option>
                            <option value="option3">数码产品</option>
                            <option value="option3">笔记本电脑</option>
                            <option value="option3">平板电脑</option>
                            <option value="option3">只能手机</option>
                            <option value="option3">超极本</option>
                        </select>
                    </div>
                </div>
                <div class="am-u-sm-12 am-u-md-3">
                    <div class="am-input-group am-input-group-sm">
                        <input type="text" class="am-form-field">
                        <span class="am-input-group-btn">
                                <button class="am-btn  am-btn-default am-btn-success tpl-am-btn-success am-icon-search"
                                        type="button"></button>
                            </span>
                    </div>
                </div>
            </div>
            <div class="am-g">
                <div class="tpl-table-images">
                    <div class="am-u-sm-12 am-u-md-6 am-u-lg-3">
                        <div class="tpl-table-images-content">
                            <div class="tpl-table-images-content-i-time">发布时间：2016-09-12</div>
                            <div class="tpl-i-title">
                                “你的旅行，是什么颜色？” 晒照片，换北欧梦幻极光之旅！
                            </div>
                            <a href="javascript:;" class="tpl-table-images-content-i">
                                <div class="tpl-table-images-content-i-info">
                                        <span class="ico">
                                            <img src="assets/img/user02.png" alt="">追逐
                                        </span>

                                </div>
                                <span class="tpl-table-images-content-i-shadow"></span>
                                <img src="assets/img/a1.png" alt="">
                            </a>
                            <div class="tpl-table-images-content-block">
                                <div class="tpl-i-font">
                                    你最喜欢的艺术作品，告诉大家它们的------名图画，色彩，交织，撞色，线条雕塑装置当代古代现代作品的照片。
                                </div>
                                <div class="tpl-i-more">
                                    <ul>
                                        <li><span class="am-icon-qq am-text-warning"> 100+</span></li>
                                        <li><span class="am-icon-weixin am-text-success"> 235+</span></li>
                                        <li><span class="am-icon-github font-green"> 600+</span></li>
                                    </ul>
                                </div>
                                <div class="am-btn-toolbar">
                                    <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                        <button type="button" class="am-btn am-btn-default am-btn-success"><span
                                                class="am-icon-plus"></span> 新增
                                        </button>
                                        <button type="button" class="am-btn am-btn-default am-btn-secondary"><span
                                                class="am-icon-edit"></span> 编辑
                                        </button>
                                        <button type="button" class="am-btn am-btn-default am-btn-warning"><span
                                                class="am-icon-archive"></span> 审核
                                        </button>
                                        <button type="button" class="am-btn am-btn-default am-btn-danger"><span
                                                class="am-icon-trash-o"></span> 删除
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="am-u-sm-12 am-u-md-6 am-u-lg-3">
                        <div class="tpl-table-images-content">
                            <div class="tpl-table-images-content-i-time">发布时间：2016-09-12</div>
                            <div class="tpl-i-title">
                                “你的旅行，是什么颜色？” 晒照片，换北欧梦幻极光之旅！
                            </div>
                            <a href="javascript:;" class="tpl-table-images-content-i">
                                <div class="tpl-table-images-content-i-info">
                                        <span class="ico">
                                            <img src="assets/img/user02.png" alt="">追逐
                                        </span>

                                </div>
                                <span class="tpl-table-images-content-i-shadow"></span>
                                <img src="assets/img/a1.png" alt="">
                            </a>
                            <div class="tpl-table-images-content-block">
                                <div class="tpl-i-font">
                                    你最喜欢的艺术作品，告诉大家它们的------名图画，色彩，交织，撞色，线条雕塑装置当代古代现代作品的照片。
                                </div>
                                <div class="tpl-i-more">
                                    <ul>
                                        <li><span class="am-icon-qq am-text-warning"> 100+</span></li>
                                        <li><span class="am-icon-weixin am-text-success"> 235+</span></li>
                                        <li><span class="am-icon-github font-green"> 600+</span></li>
                                    </ul>
                                </div>
                                <div class="am-btn-toolbar">
                                    <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                        <button type="button" class="am-btn am-btn-default am-btn-success"><span
                                                class="am-icon-plus"></span> 新增
                                        </button>
                                        <button type="button" class="am-btn am-btn-default am-btn-secondary"><span
                                                class="am-icon-edit"></span> 编辑
                                        </button>
                                        <button type="button" class="am-btn am-btn-default am-btn-warning"><span
                                                class="am-icon-archive"></span> 审核
                                        </button>
                                        <button type="button" class="am-btn am-btn-default am-btn-danger"><span
                                                class="am-icon-trash-o"></span> 删除
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="am-u-sm-12 am-u-md-6 am-u-lg-3">
                        <div class="tpl-table-images-content">
                            <div class="tpl-table-images-content-i-time">发布时间：2016-09-12</div>
                            <div class="tpl-i-title">
                                “你的旅行，是什么颜色？” 晒照片，换北欧梦幻极光之旅！
                            </div>
                            <a href="javascript:;" class="tpl-table-images-content-i">
                                <div class="tpl-table-images-content-i-info">
                                        <span class="ico">
                                            <img src="assets/img/user02.png" alt="">追逐
                                        </span>

                                </div>
                                <span class="tpl-table-images-content-i-shadow"></span>
                                <img src="assets/img/a1.png" alt="">
                            </a>
                            <div class="tpl-table-images-content-block">
                                <div class="tpl-i-font">
                                    你最喜欢的艺术作品，告诉大家它们的------名图画，色彩，交织，撞色，线条雕塑装置当代古代现代作品的照片。
                                </div>
                                <div class="tpl-i-more">
                                    <ul>
                                        <li><span class="am-icon-qq am-text-warning"> 100+</span></li>
                                        <li><span class="am-icon-weixin am-text-success"> 235+</span></li>
                                        <li><span class="am-icon-github font-green"> 600+</span></li>
                                    </ul>
                                </div>
                                <div class="am-btn-toolbar">
                                    <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                        <button type="button" class="am-btn am-btn-default am-btn-success"><span
                                                class="am-icon-plus"></span> 新增
                                        </button>
                                        <button type="button" class="am-btn am-btn-default am-btn-secondary"><span
                                                class="am-icon-edit"></span> 编辑
                                        </button>
                                        <button type="button" class="am-btn am-btn-default am-btn-warning"><span
                                                class="am-icon-archive"></span> 审核
                                        </button>
                                        <button type="button" class="am-btn am-btn-default am-btn-danger"><span
                                                class="am-icon-trash-o"></span> 删除
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="am-u-sm-12 am-u-md-6 am-u-lg-3">
                        <div class="tpl-table-images-content">
                            <div class="tpl-table-images-content-i-time">发布时间：2016-09-12</div>
                            <div class="tpl-i-title">
                                “你的旅行，是什么颜色？” 晒照片，换北欧梦幻极光之旅！
                            </div>
                            <a href="javascript:;" class="tpl-table-images-content-i">
                                <div class="tpl-table-images-content-i-info">
                                        <span class="ico">
                                            <img src="assets/img/user02.png" alt="">追逐
                                        </span>

                                </div>
                                <span class="tpl-table-images-content-i-shadow"></span>
                                <img src="assets/img/a1.png" alt="">
                            </a>
                            <div class="tpl-table-images-content-block">
                                <div class="tpl-i-font">
                                    你最喜欢的艺术作品，告诉大家它们的------名图画，色彩，交织，撞色，线条雕塑装置当代古代现代作品的照片。
                                </div>
                                <div class="tpl-i-more">
                                    <ul>
                                        <li><span class="am-icon-qq am-text-warning"> 100+</span></li>
                                        <li><span class="am-icon-weixin am-text-success"> 235+</span></li>
                                        <li><span class="am-icon-github font-green"> 600+</span></li>
                                    </ul>
                                </div>
                                <div class="am-btn-toolbar">
                                    <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                        <button type="button" class="am-btn am-btn-default am-btn-success"><span
                                                class="am-icon-plus"></span> 新增
                                        </button>
                                        <button type="button" class="am-btn am-btn-default am-btn-secondary"><span
                                                class="am-icon-edit"></span> 编辑
                                        </button>
                                        <button type="button" class="am-btn am-btn-default am-btn-warning"><span
                                                class="am-icon-archive"></span> 审核
                                        </button>
                                        <button type="button" class="am-btn am-btn-default am-btn-danger"><span
                                                class="am-icon-trash-o"></span> 删除
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="am-u-sm-12 am-u-md-6 am-u-lg-3">
                        <div class="tpl-table-images-content">
                            <div class="tpl-table-images-content-i-time">发布时间：2016-09-12</div>
                            <div class="tpl-i-title">
                                “你的旅行，是什么颜色？” 晒照片，换北欧梦幻极光之旅！
                            </div>
                            <a href="javascript:;" class="tpl-table-images-content-i">
                                <div class="tpl-table-images-content-i-info">
                                        <span class="ico">
                                            <img src="assets/img/user02.png" alt="">追逐
                                        </span>

                                </div>
                                <span class="tpl-table-images-content-i-shadow"></span>
                                <img src="assets/img/a1.png" alt="">
                            </a>
                            <div class="tpl-table-images-content-block">
                                <div class="tpl-i-font">
                                    你最喜欢的艺术作品，告诉大家它们的------名图画，色彩，交织，撞色，线条雕塑装置当代古代现代作品的照片。
                                </div>
                                <div class="tpl-i-more">
                                    <ul>
                                        <li><span class="am-icon-qq am-text-warning"> 100+</span></li>
                                        <li><span class="am-icon-weixin am-text-success"> 235+</span></li>
                                        <li><span class="am-icon-github font-green"> 600+</span></li>
                                    </ul>
                                </div>
                                <div class="am-btn-toolbar">
                                    <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                        <button type="button" class="am-btn am-btn-default am-btn-success"><span
                                                class="am-icon-plus"></span> 新增
                                        </button>
                                        <button type="button" class="am-btn am-btn-default am-btn-secondary"><span
                                                class="am-icon-edit"></span> 编辑
                                        </button>
                                        <button type="button" class="am-btn am-btn-default am-btn-warning"><span
                                                class="am-icon-archive"></span> 审核
                                        </button>
                                        <button type="button" class="am-btn am-btn-default am-btn-danger"><span
                                                class="am-icon-trash-o"></span> 删除
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="am-u-sm-12 am-u-md-6 am-u-lg-3">
                        <div class="tpl-table-images-content">
                            <div class="tpl-table-images-content-i-time">发布时间：2016-09-12</div>
                            <div class="tpl-i-title">
                                “你的旅行，是什么颜色？” 晒照片，换北欧梦幻极光之旅！
                            </div>
                            <a href="javascript:;" class="tpl-table-images-content-i">
                                <div class="tpl-table-images-content-i-info">
                                        <span class="ico">
                                            <img src="assets/img/user02.png" alt="">追逐
                                        </span>

                                </div>
                                <span class="tpl-table-images-content-i-shadow"></span>
                                <img src="assets/img/a1.png" alt="">
                            </a>
                            <div class="tpl-table-images-content-block">
                                <div class="tpl-i-font">
                                    你最喜欢的艺术作品，告诉大家它们的------名图画，色彩，交织，撞色，线条雕塑装置当代古代现代作品的照片。
                                </div>
                                <div class="tpl-i-more">
                                    <ul>
                                        <li><span class="am-icon-qq am-text-warning"> 100+</span></li>
                                        <li><span class="am-icon-weixin am-text-success"> 235+</span></li>
                                        <li><span class="am-icon-github font-green"> 600+</span></li>
                                    </ul>
                                </div>
                                <div class="am-btn-toolbar">
                                    <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                        <button type="button" class="am-btn am-btn-default am-btn-success"><span
                                                class="am-icon-plus"></span> 新增
                                        </button>
                                        <button type="button" class="am-btn am-btn-default am-btn-secondary"><span
                                                class="am-icon-edit"></span> 编辑
                                        </button>
                                        <button type="button" class="am-btn am-btn-default am-btn-warning"><span
                                                class="am-icon-archive"></span> 审核
                                        </button>
                                        <button type="button" class="am-btn am-btn-default am-btn-danger"><span
                                                class="am-icon-trash-o"></span> 删除
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="am-u-sm-12 am-u-md-6 am-u-lg-3">
                        <div class="tpl-table-images-content">
                            <div class="tpl-table-images-content-i-time">发布时间：2016-09-12</div>
                            <div class="tpl-i-title">
                                “你的旅行，是什么颜色？” 晒照片，换北欧梦幻极光之旅！
                            </div>
                            <a href="javascript:;" class="tpl-table-images-content-i">
                                <div class="tpl-table-images-content-i-info">
                                        <span class="ico">
                                            <img src="assets/img/user02.png" alt="">追逐
                                        </span>

                                </div>
                                <span class="tpl-table-images-content-i-shadow"></span>
                                <img src="assets/img/a1.png" alt="">
                            </a>
                            <div class="tpl-table-images-content-block">
                                <div class="tpl-i-font">
                                    你最喜欢的艺术作品，告诉大家它们的------名图画，色彩，交织，撞色，线条雕塑装置当代古代现代作品的照片。
                                </div>
                                <div class="tpl-i-more">
                                    <ul>
                                        <li><span class="am-icon-qq am-text-warning"> 100+</span></li>
                                        <li><span class="am-icon-weixin am-text-success"> 235+</span></li>
                                        <li><span class="am-icon-github font-green"> 600+</span></li>
                                    </ul>
                                </div>
                                <div class="am-btn-toolbar">
                                    <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                        <button type="button" class="am-btn am-btn-default am-btn-success"><span
                                                class="am-icon-plus"></span> 新增
                                        </button>
                                        <button type="button" class="am-btn am-btn-default am-btn-secondary"><span
                                                class="am-icon-edit"></span> 编辑
                                        </button>
                                        <button type="button" class="am-btn am-btn-default am-btn-warning"><span
                                                class="am-icon-archive"></span> 审核
                                        </button>
                                        <button type="button" class="am-btn am-btn-default am-btn-danger"><span
                                                class="am-icon-trash-o"></span> 删除
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="am-u-sm-12 am-u-md-6 am-u-lg-3">
                        <div class="tpl-table-images-content">
                            <div class="tpl-table-images-content-i-time">发布时间：2016-09-12</div>
                            <div class="tpl-i-title">
                                “你的旅行，是什么颜色？” 晒照片，换北欧梦幻极光之旅！
                            </div>
                            <a href="javascript:;" class="tpl-table-images-content-i">
                                <div class="tpl-table-images-content-i-info">
                                        <span class="ico">
                                            <img src="assets/img/user02.png" alt="">追逐
                                        </span>

                                </div>
                                <span class="tpl-table-images-content-i-shadow"></span>
                                <img src="assets/img/a1.png" alt="">
                            </a>
                            <div class="tpl-table-images-content-block">
                                <div class="tpl-i-font">
                                    你最喜欢的艺术作品，告诉大家它们的------名图画，色彩，交织，撞色，线条雕塑装置当代古代现代作品的照片。
                                </div>
                                <div class="tpl-i-more">
                                    <ul>
                                        <li><span class="am-icon-qq am-text-warning"> 100+</span></li>
                                        <li><span class="am-icon-weixin am-text-success"> 235+</span></li>
                                        <li><span class="am-icon-github font-green"> 600+</span></li>
                                    </ul>
                                </div>
                                <div class="am-btn-toolbar">
                                    <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                        <button type="button" class="am-btn am-btn-default am-btn-success"><span
                                                class="am-icon-plus"></span> 新增
                                        </button>
                                        <button type="button" class="am-btn am-btn-default am-btn-secondary"><span
                                                class="am-icon-edit"></span> 编辑
                                        </button>
                                        <button type="button" class="am-btn am-btn-default am-btn-warning"><span
                                                class="am-icon-archive"></span> 审核
                                        </button>
                                        <button type="button" class="am-btn am-btn-default am-btn-danger"><span
                                                class="am-icon-trash-o"></span> 删除
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="am-u-sm-12 am-u-md-6 am-u-lg-3">
                        <div class="tpl-table-images-content">
                            <div class="tpl-table-images-content-i-time">发布时间：2016-09-12</div>
                            <div class="tpl-i-title">
                                “你的旅行，是什么颜色？” 晒照片，换北欧梦幻极光之旅！
                            </div>
                            <a href="javascript:;" class="tpl-table-images-content-i">
                                <div class="tpl-table-images-content-i-info">
                                        <span class="ico">
                                            <img src="assets/img/user02.png" alt="">追逐
                                        </span>

                                </div>
                                <span class="tpl-table-images-content-i-shadow"></span>
                                <img src="assets/img/a1.png" alt="">
                            </a>
                            <div class="tpl-table-images-content-block">
                                <div class="tpl-i-font">
                                    你最喜欢的艺术作品，告诉大家它们的------名图画，色彩，交织，撞色，线条雕塑装置当代古代现代作品的照片。
                                </div>
                                <div class="tpl-i-more">
                                    <ul>
                                        <li><span class="am-icon-qq am-text-warning"> 100+</span></li>
                                        <li><span class="am-icon-weixin am-text-success"> 235+</span></li>
                                        <li><span class="am-icon-github font-green"> 600+</span></li>
                                    </ul>
                                </div>
                                <div class="am-btn-toolbar">
                                    <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                        <button type="button" class="am-btn am-btn-default am-btn-success"><span
                                                class="am-icon-plus"></span> 新增
                                        </button>
                                        <button type="button" class="am-btn am-btn-default am-btn-secondary"><span
                                                class="am-icon-edit"></span> 编辑
                                        </button>
                                        <button type="button" class="am-btn am-btn-default am-btn-warning"><span
                                                class="am-icon-archive"></span> 审核
                                        </button>
                                        <button type="button" class="am-btn am-btn-default am-btn-danger"><span
                                                class="am-icon-trash-o"></span> 删除
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="am-u-sm-12 am-u-md-6 am-u-lg-3">
                        <div class="tpl-table-images-content">
                            <div class="tpl-table-images-content-i-time">发布时间：2016-09-12</div>
                            <div class="tpl-i-title">
                                “你的旅行，是什么颜色？” 晒照片，换北欧梦幻极光之旅！
                            </div>
                            <a href="javascript:;" class="tpl-table-images-content-i">
                                <div class="tpl-table-images-content-i-info">
                                        <span class="ico">
                                            <img src="assets/img/user02.png" alt="">追逐
                                        </span>

                                </div>
                                <span class="tpl-table-images-content-i-shadow"></span>
                                <img src="assets/img/a1.png" alt="">
                            </a>
                            <div class="tpl-table-images-content-block">
                                <div class="tpl-i-font">
                                    你最喜欢的艺术作品，告诉大家它们的------名图画，色彩，交织，撞色，线条雕塑装置当代古代现代作品的照片。
                                </div>
                                <div class="tpl-i-more">
                                    <ul>
                                        <li><span class="am-icon-qq am-text-warning"> 100+</span></li>
                                        <li><span class="am-icon-weixin am-text-success"> 235+</span></li>
                                        <li><span class="am-icon-github font-green"> 600+</span></li>
                                    </ul>
                                </div>
                                <div class="am-btn-toolbar">
                                    <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                        <button type="button" class="am-btn am-btn-default am-btn-success"><span
                                                class="am-icon-plus"></span> 新增
                                        </button>
                                        <button type="button" class="am-btn am-btn-default am-btn-secondary"><span
                                                class="am-icon-edit"></span> 编辑
                                        </button>
                                        <button type="button" class="am-btn am-btn-default am-btn-warning"><span
                                                class="am-icon-archive"></span> 审核
                                        </button>
                                        <button type="button" class="am-btn am-btn-default am-btn-danger"><span
                                                class="am-icon-trash-o"></span> 删除
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="am-u-sm-12 am-u-md-6 am-u-lg-3">
                        <div class="tpl-table-images-content">
                            <div class="tpl-table-images-content-i-time">发布时间：2016-09-12</div>
                            <div class="tpl-i-title">
                                “你的旅行，是什么颜色？” 晒照片，换北欧梦幻极光之旅！
                            </div>
                            <a href="javascript:;" class="tpl-table-images-content-i">
                                <div class="tpl-table-images-content-i-info">
                                        <span class="ico">
                                            <img src="assets/img/user02.png" alt="">追逐
                                        </span>

                                </div>
                                <span class="tpl-table-images-content-i-shadow"></span>
                                <img src="assets/img/a1.png" alt="">
                            </a>
                            <div class="tpl-table-images-content-block">
                                <div class="tpl-i-font">
                                    你最喜欢的艺术作品，告诉大家它们的------名图画，色彩，交织，撞色，线条雕塑装置当代古代现代作品的照片。
                                </div>
                                <div class="tpl-i-more">
                                    <ul>
                                        <li><span class="am-icon-qq am-text-warning"> 100+</span></li>
                                        <li><span class="am-icon-weixin am-text-success"> 235+</span></li>
                                        <li><span class="am-icon-github font-green"> 600+</span></li>
                                    </ul>
                                </div>
                                <div class="am-btn-toolbar">
                                    <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                        <button type="button" class="am-btn am-btn-default am-btn-success"><span
                                                class="am-icon-plus"></span> 新增
                                        </button>
                                        <button type="button" class="am-btn am-btn-default am-btn-secondary"><span
                                                class="am-icon-edit"></span> 编辑
                                        </button>
                                        <button type="button" class="am-btn am-btn-default am-btn-warning"><span
                                                class="am-icon-archive"></span> 审核
                                        </button>
                                        <button type="button" class="am-btn am-btn-default am-btn-danger"><span
                                                class="am-icon-trash-o"></span> 删除
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="am-u-sm-12 am-u-md-6 am-u-lg-3">
                        <div class="tpl-table-images-content">
                            <div class="tpl-table-images-content-i-time">发布时间：2016-09-12</div>
                            <div class="tpl-i-title">
                                “你的旅行，是什么颜色？” 晒照片，换北欧梦幻极光之旅！
                            </div>
                            <a href="javascript:;" class="tpl-table-images-content-i">
                                <div class="tpl-table-images-content-i-info">
                                        <span class="ico">
                                            <img src="assets/img/user02.png" alt="">追逐
                                        </span>

                                </div>
                                <span class="tpl-table-images-content-i-shadow"></span>
                                <img src="assets/img/a1.png" alt="">
                            </a>
                            <div class="tpl-table-images-content-block">
                                <div class="tpl-i-font">
                                    你最喜欢的艺术作品，告诉大家它们的------名图画，色彩，交织，撞色，线条雕塑装置当代古代现代作品的照片。
                                </div>
                                <div class="tpl-i-more">
                                    <ul>
                                        <li><span class="am-icon-qq am-text-warning"> 100+</span></li>
                                        <li><span class="am-icon-weixin am-text-success"> 235+</span></li>
                                        <li><span class="am-icon-github font-green"> 600+</span></li>
                                    </ul>
                                </div>
                                <div class="am-btn-toolbar">
                                    <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                        <button type="button" class="am-btn am-btn-default am-btn-success"><span
                                                class="am-icon-plus"></span> 新增
                                        </button>
                                        <button type="button" class="am-btn am-btn-default am-btn-secondary"><span
                                                class="am-icon-edit"></span> 编辑
                                        </button>
                                        <button type="button" class="am-btn am-btn-default am-btn-warning"><span
                                                class="am-icon-archive"></span> 审核
                                        </button>
                                        <button type="button" class="am-btn am-btn-default am-btn-danger"><span
                                                class="am-icon-trash-o"></span> 删除
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="am-u-lg-12">
                        <div class="am-cf">

                            <div class="am-fr">
                                <ul class="am-pagination tpl-pagination">
                                    <li class="am-disabled"><a href="#">«</a></li>
                                    <li class="am-active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#">»</a></li>
                                </ul>
                            </div>
                        </div>
                        <hr>
                    </div>

                </div>

            </div>
        </div>
        <div class="tpl-alert"></div>
    </div>

</div>

<!--底部 start-->
<?php $_smarty_tpl->_subTemplateRender('file:Admin/Public/footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<!--底部 end--><?php }
}
