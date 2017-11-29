<?php
/* Smarty version 3.1.32-dev-38, created on 2017-11-29 18:29:09
  from 'D:\GIT\afree\Application\View\Public\footer.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_5a1e8bf5827c77_53958182',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9828521a049195246ebae397c66c42510112d16a' => 
    array (
      0 => 'D:\\GIT\\afree\\Application\\View\\Public\\footer.html',
      1 => 1511950133,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a1e8bf5827c77_53958182 (Smarty_Internal_Template $_smarty_tpl) {
?><footer class="am_footer">
    <div class="am_footer_con">
        <div class="am_footer_link">
            <span>关于宠物秀</span>
            <ul>
                <li><a href="###">关于我们</a></li>
                <li><a href="###">发展历程</a></li>
                <li><a href="###">友情链接</a></li>
            </ul>
        </div>


        <div class="am_footer_don">
            <span>宠物秀</span>
            <dl>
                <dt><img src="/Public/style/home/img/footdon.png?1" alt=""></dt>
                <dd>一起Show我们的爱宠吧！宠物秀是图片配文字、涂鸦、COSPLAY的移动手机社区，这里有猫狗鱼龟兔子仓鼠龙猫等各种萌图。
                    <a href="###" class="footdon_pg ">
                        <div class="foot_d_pg am-icon-apple "> App store</div>
                    </a><a href="###" class="footdon_az animated">
                        <div class="foot_d_az am-icon-android "> Android</div>
                    </a></dd>

            </dl>
        </div>

        <div class="am_footer_erweima">
            <div class="am_footer_weixin"><img src="/Public/style/home/img/wx.jpg" alt="">

                <div class="am_footer_d_gzwx am-icon-weixin"> 关注微信</div>
            </div>
            <div class="am_footer_ddon"><img src="/Public/style/home/img/wx.jpg" alt="">

                <div class="am_footer_d_dxz am-icon-cloud-download"> 扫码下载</div>
            </div>

        </div>

    </div>
    <div class="am_info_line">Copyright(c)2015 <span>PetShow</span> All Rights Reserved</div>
</footer>
<?php echo '<script'; ?>
 src="/Public/style/home/js/petshow.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    $(function () {
        $('.am_news_tab').css('min-height', $(window).height() - 52 - 220);
        if ($(window).width() < 600) {
            $('.am_list_item_text').each(
                function () {
                    if ($(this).text().length >= 26) {
                        $(this).html($(this).text().substr(0, 26) + '...');
                    }
                });
        }

    });

<?php echo '</script'; ?>
>
</body>
</html><?php }
}
