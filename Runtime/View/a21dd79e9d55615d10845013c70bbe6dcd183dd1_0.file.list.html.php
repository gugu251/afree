<?php
/* Smarty version 3.1.32-dev-38, created on 2017-11-29 18:44:05
  from 'D:\GIT\afree\Application\View\Tool\Markdown\list.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_5a1e8f756299c6_21149691',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a21dd79e9d55615d10845013c70bbe6dcd183dd1' => 
    array (
      0 => 'D:\\GIT\\afree\\Application\\View\\Tool\\Markdown\\list.html',
      1 => 1511952207,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Public/header.html' => 1,
    'file:Public/footer.html' => 1,
  ),
),false)) {
function content_5a1e8f756299c6_21149691 (Smarty_Internal_Template $_smarty_tpl) {
?><!--网页头部 start-->
<?php $_smarty_tpl->_subTemplateRender('file:Public/header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<!--网页头部 end-->


<div data-am-widget="tabs" class="am-tabs am-tabs-d2 am_news_tab">
    <ul class="am-tabs-nav am-cf am_cf">
        <li class="am-active">
            <a href="[data-tab-panel-0]">全部</a>
        </li>
        <li class="">
            <a href="[data-tab-panel-1]">新鲜事</a>
        </li>
        <li class="">
            <a href="[data-tab-panel-2]">涨知识</a>
        </li>

    </ul>
    <div class="am-tabs-bd">
        <div data-tab-panel-0 class="am-tab-panel am-active">
            <div class="am-list-news-bd am_news_list_all">
                <ul class="am-list">
                    <!--缩略图在标题左边-->
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['markdown']->value, 'list');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['list']->value) {
?>
                    <li class="am-g am-list-item-desced am_list_li">
                        <div class=" am-list-main">
                            <h3 class="am-list-item-hd am_list_title am_list_title_s">
                                <a href="/tool/markdown/detail?id=<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
" class=""><?php echo $_smarty_tpl->tpl_vars['list']->value['title'];?>
</a>
                            </h3>
                            <div class="am_list_author"><a href="javascript:void(0)"><span class="am_list_author_ico"
                                                                                           style="background-image: url(img/tx.jpg);"></span><span
                                    class="name">Okaeri</span></a><span class="am_news_time">&nbsp;•&nbsp;<time
                                    class="timeago" title="2015-08-13 08:02:40 +0800"
                                    datetime="2015-08-13 08:02:40 +0800"> 2 小时前</time></span></div>

                            <div class="am-list-item-text am_list_item_text">
                                <?php echo $_smarty_tpl->tpl_vars['list']->value['title'];?>

                            </div>
                        </div>
                    </li>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </ul>
                <div class="am_news_load"><span><i class="am-icon-spinner am-icon-spin"></i> 更多萌宠照片</span></div>
            </div>
        </div>
        <div data-tab-panel-1 class="am-tab-panel ">


            <div class="am-list-news-bd am_news_list_all">
                <ul class="am-list">
                    <!--缩略图在标题左边-->
                    <li class="am-g am-list-item-desced am_list_li">
                        <div class=" am-list-main">
                            <h3 class="am-list-item-hd am_list_title am_list_title_s">
                                <a href="###" class="">“你的旅行，是什么颜色？” 晒照片，换北欧梦幻极光之旅！</a>
                            </h3>
                            <div class="am_list_author"><a href="javascript:void(0)"><span class="am_list_author_ico"
                                                                                           style="background-image: url(img/tx.jpg);"></span><span
                                    class="name">Okaeri</span></a><span class="am_news_time">&nbsp;•&nbsp;<time
                                    class="timeago" title="2015-08-13 08:02:40 +0800"
                                    datetime="2015-08-13 08:02:40 +0800"> 2 小时前</time></span></div>

                            <div class="am-list-item-text am_list_item_text">
                                还在苦恼圣诞礼物再也玩儿不出新意？快来抢2013最炫彩的跨国圣诞礼物！【参与方式】1.关注“UniqueWay无二之旅”豆瓣品牌小站http://brand.douban.com/uniqueway/2.上传一张**本人**在旅行中色彩最浓郁、最丰富的照片（色彩包含取景地、周边事物、服装饰品、女生彩妆等等，发挥你们无穷的创意想象力哦！^^）一定要有本人出现喔！3.
                                在照片下方，附上一句旅行宣言作为照片说明。 成功参与活动！* 听他们刚才说，上传照片的次
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="am_news_load"><span><i class="am-icon-spinner am-icon-spin"></i> 更多萌宠照片</span></div>
            </div>


        </div>
        <div data-tab-panel-2 class="am-tab-panel ">


            <div class="am-list-news-bd am_news_list_all">
                <ul class="am-list">
                    <!--缩略图在标题左边-->
                    <li class="am-g am-list-item-desced am_list_li">
                        <div class=" am-list-main">
                            <h3 class="am-list-item-hd am_list_title am_list_title_s">
                                <a href="###" class="">“你的旅行，是什么颜色？” 晒照片，换北欧梦幻极光之旅！</a>
                            </h3>
                            <div class="am_list_author"><a href="javascript:void(0)"><span class="am_list_author_ico"
                                                                                           style="background-image: url(img/tx.jpg);"></span><span
                                    class="name">Okaeri</span></a><span class="am_news_time">&nbsp;•&nbsp;<time
                                    class="timeago" title="2015-08-13 08:02:40 +0800"
                                    datetime="2015-08-13 08:02:40 +0800"> 2 小时前</time></span></div>

                            <div class="am-list-item-text am_list_item_text">
                                还在苦恼圣诞礼物再也玩儿不出新意？快来抢2013最炫彩的跨国圣诞礼物！【参与方式】1.关注“UniqueWay无二之旅”豆瓣品牌小站http://brand.douban.com/uniqueway/2.上传一张**本人**在旅行中色彩最浓郁、最丰富的照片（色彩包含取景地、周边事物、服装饰品、女生彩妆等等，发挥你们无穷的创意想象力哦！^^）一定要有本人出现喔！3.
                                在照片下方，附上一句旅行宣言作为照片说明。 成功参与活动！* 听他们刚才说，上传照片的次
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="am_news_load"><span><i class="am-icon-spinner am-icon-spin"></i> 更多萌宠照片</span></div>
            </div>

        </div>
    </div>

</div>


<!--网页头部 start-->
<?php $_smarty_tpl->_subTemplateRender('file:Public/footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<!--网页头部 end--><?php }
}
