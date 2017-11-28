<?php
/* Smarty version 3.1.32-dev-38, created on 2017-11-27 14:27:21
  from 'D:\web\newcore\Application\View\Index\index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_5a1bb04920ad62_91996746',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '31ac569a4ce0c76f37a48ccfa325332aa362ffcf' => 
    array (
      0 => 'D:\\web\\newcore\\Application\\View\\Index\\index.html',
      1 => 1511509312,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Public/header.html' => 1,
  ),
),false)) {
function content_5a1bb04920ad62_91996746 (Smarty_Internal_Template $_smarty_tpl) {
?><!--网页头部 start-->
<?php $_smarty_tpl->_subTemplateRender('file:Public/header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<!--网页头部 end-->
<div class="get">
    <div class="am-g">
        <div class="am-u-lg-12">
            <div class="get-title">
                <div class="get_font_left">
                    <img alt="" src="/Public/style/home/img/font_yjy.png"/>
                </div>
                <div class="get_font_center" id="banner_num">
                </div>
                <div class="get_font_rigth">
                    <img alt="" src="/Public/style/home/img/font_zty.png"/>
                </div>
            </div>
            <div class="font_line">
                <img alt="" src="/Public/style/home/img/font_line.png"/>
            </div>
            <p>
                <a class="am-btn am-btn-sm get-btn am-radius banner_ios am-icon-apple" href="###">
                    App store
                </a>
                <a class="am-btn am-btn-sm am-radius get-btn banner_android am-icon-android" href="###">
                    Android
                </a>
            </p>
        </div>
    </div>
</div>
<div class="banner_navbg">
    <div class="am-g">
        <div class="banner_nav">
            <span class="am-icon-caret-right">
                筛选：
            </span>
            <a href="###">
                人气最高
            </a>
            <a class="banner_hover" href="###">
                编辑推荐
            </a>
            <a href="###">
                最新萌宠
            </a>
            <a href="###">
                语言涂鸦
            </a>
        </div>
    </div>
</div>
<div class="am-g am-imglist">
    <ul class="am-gallery am-avg-sm-2 am-avg-md-3 am-avg-lg-6 am-gallery-default" data-am-widget="gallery">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['news']->value, 'list');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['list']->value) {
?>
        <li>
            <div class="am-gallery-item am_list_block">
                <a class="am_img_bg" href="###">
                    <img alt="" class="am_img animated" data-original="<?php echo $_smarty_tpl->tpl_vars['list']->value['news_thumb'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['list']->value['news_thumb'];?>
"/>
                </a>
                <div class="am_listimg_info">
                    <span class="am-icon-heart">
                        132
                    </span>
                    <span class="am-icon-comments">
                        67
                    </span>
                    <span class="am_imglist_time">
                        15分钟前
                    </span>
                </div>
            </div>
            <a class="am_imglist_user">
                <span class="am_imglist_user_ico">
                    <img alt="" src="/Public/style/home/img/tx.jpg"/>
                </span>
                <span class="am_imglist_user_font">
                    <?php echo $_smarty_tpl->tpl_vars['list']->value['news_title'];?>

                </span>
            </a>
        </li>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </ul>
</div>
<?php }
}
