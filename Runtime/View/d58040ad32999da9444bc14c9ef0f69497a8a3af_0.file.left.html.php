<?php
/* Smarty version 3.1.32-dev-38, created on 2017-11-28 12:28:54
  from 'D:\GIT\afree\Application\View\Admin\Public\left.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_5a1ce6069cfe26_22009078',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd58040ad32999da9444bc14c9ef0f69497a8a3af' => 
    array (
      0 => 'D:\\GIT\\afree\\Application\\View\\Admin\\Public\\left.html',
      1 => 1511843324,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a1ce6069cfe26_22009078 (Smarty_Internal_Template $_smarty_tpl) {
?>
    <div class="tpl-left-nav tpl-left-nav-hover">
        <div class="tpl-left-nav-title">
            管理栏目列表
        </div>
        <div class="tpl-left-nav-list">
            <ul class="tpl-left-nav-menu">
                
                <li class="tpl-left-nav-item">
                    <a class="nav-link active" href="/admin/index/index">
                        <i class="am-icon-home">
                        </i>
                        <span>
                            首页
                        </span>
                    </a>
                </li>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['menus']->value, 'menu');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['menu']->value) {
?>
                <li class="tpl-left-nav-item">
                    <a class="nav-link tpl-left-nav-link-list" href="javascript:;">
                        <i class="am-icon-table">
                        </i>
                        <span>
                            <?php echo $_smarty_tpl->tpl_vars['menu']->value['name'];?>

                        </span>
                        <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right">
                        </i>
                    </a>
                    <ul class="tpl-left-nav-sub-menu" >
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['menu']->value['son'], 'son');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['son']->value) {
?>
                        <li>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['son']->value['url'];?>
">
                                <i class="am-icon-angle-right">
                                </i>
                                <span>
                                    <?php echo $_smarty_tpl->tpl_vars['son']->value['name'];?>

                                </span>
                                <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right">
                                </i>
                            </a>
                        </li>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </ul>
                </li>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </ul>
        </div>
    </div><?php }
}
