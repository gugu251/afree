<?php
/* Smarty version 3.1.32-dev-38, created on 2017-12-01 15:52:07
  from 'D:\GIT\afree\Application\View\Tool\Markdown\detail.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_5a210a27ef7211_62436152',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '72aad94ad8078a38a5dfd73d13901e2d4e21466d' => 
    array (
      0 => 'D:\\GIT\\afree\\Application\\View\\Tool\\Markdown\\detail.html',
      1 => 1512004310,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Public/header.html' => 1,
    'file:Public/footer.html' => 1,
  ),
),false)) {
function content_5a210a27ef7211_62436152 (Smarty_Internal_Template $_smarty_tpl) {
?><!--网页头部 start-->
<?php $_smarty_tpl->_subTemplateRender('file:Public/header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<!--网页头部 end-->


<article data-am-widget="paragraph" class="am-paragraph am-paragraph-default article_nr"
         data-am-paragraph="{ tableScrollable: true, pureview: true }">
    <h1 class="article_nr_title"><?php echo $_smarty_tpl->tpl_vars['markdown']->value['title'];?>
</h1>
    <div class="am_list_author"><a href="javascript:void(0)"><span class="am_list_author_ico"
                                                                   style="background-image: url(img/tx.jpg);"></span><span
            class="name">Okaeri</span></a><span class="am_news_time">&nbsp;•&nbsp;<time class="timeago"
                                                                                        title="2015-08-13 08:02:40 +0800"
                                                                                        datetime="2015-08-13 08:02:40 +0800"> 2 小时前</time></span>
    </div>
    <div class="article_nr_content">
        <div id="layout">
            <div id="test-editormd-view">
                <textarea id="append-test" style="display:none;">
                    <?php echo $_smarty_tpl->tpl_vars['markdown']->value['content'];?>

                </textarea>

            </div>
        </div>

    </div>
    <div class="article_nr_more">
        <div class="article_nr_l">
            <a href=""><i class="am-icon-btn am-icon-thumbs-o-up"></i></a>
            <span>16</span>
        </div>
        <div class="article_nr_more_r">
            <span>分享 </span>
            <span class="article_nr_more_ico ">
  <a href="###" class="am-icon-btn am-secondary am-icon-qq"></a>
  <a href="###" class="am-icon-btn am-success am-icon-weixin"></a>
  <a href="###" class="am-icon-btn am-danger am-icon-weibo"></a>
</span>
        </div>
    </div>
</article>

<div class="am_tjgd">
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
                            class="name">Okaeri</span></a><span class="am_news_time">&nbsp;•&nbsp;<time class="timeago"
                                                                                                        title="2015-08-13 08:02:40 +0800"
                                                                                                        datetime="2015-08-13 08:02:40 +0800"> 2 小时前</time></span>
                    </div>

                    <div class="am-list-item-text am_list_item_text">
                        还在苦恼圣诞礼物再也玩儿不出新意？快来抢2013最炫彩的跨国圣诞礼物！【参与方式】1.关注“UniqueWay无二之旅”豆瓣品牌小站http://brand.douban.com/uniqueway/2.上传一张**本人**在旅行中色彩最浓郁、最丰富的照片（色彩包含取景地、周边事物、服装饰品、女生彩妆等等，发挥你们无穷的创意想象力哦！^^）一定要有本人出现喔！3.
                        在照片下方，附上一句旅行宣言作为照片说明。 成功参与活动！* 听他们刚才说，上传照片的次
                    </div>
                </div>
            </li>
        </ul>
        <div class="am_news_load"><span><i class="am-icon-spinner am-icon-spin"></i> 更多相关文章</span></div>
    </div>
</div>

<?php echo '<script'; ?>
 src="/Public/style/mark/js/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/Public/style/mark/lib/marked.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/Public/style/mark/lib/prettify.min.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="/Public/style/mark/lib/raphael.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/Public/style/mark/lib/underscore.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/Public/style/mark/lib/sequence-diagram.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/Public/style/mark/lib/flowchart.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/Public/style/mark/lib/jquery.flowchart.min.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="/Public/style/mark/js/editormd.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
    $(function() {
        var testEditormdView, testEditormdView;
        testEditormdView2 = editormd.markdownToHTML("test-editormd-view", {
            htmlDecode      : "style,script,iframe",  // you can filter tags decode
            emoji           : true,
            taskList        : true,
            tex             : true,  // 默认不解析
            flowChart       : true,  // 默认不解析
            sequenceDiagram : true,  // 默认不解析
        });
    });
<?php echo '</script'; ?>
>

<!--网页头部 start-->
<?php $_smarty_tpl->_subTemplateRender('file:Public/footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<!--网页头部 end--><?php }
}
