<?php
/* Smarty version 3.1.32-dev-38, created on 2017-11-28 16:22:26
  from 'D:\GIT\afree\Application\View\Tool\Translate\fyhtml.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_5a1d1cc20ef900_30852775',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5a99dfc0082d4e2e9481058762adbc1848383a2f' => 
    array (
      0 => 'D:\\GIT\\afree\\Application\\View\\Tool\\Translate\\fyhtml.html',
      1 => 1511857319,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a1d1cc20ef900_30852775 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
</head>
<body>
<form action="" method="post">
    <div class="">语言：
        <select name="language">
            <option selected="selected" value="en">英文</option>
            <option value="ja">日文</option>
            <option value="ko">韩文</option>
            <option value="fr">法语</option>
            <option value="zh_Hant">繁体</option>
        </select></div>
    <br/>
    <textarea class="" rows="10" name="content" placeholder="输入翻译内容"><?php echo $_smarty_tpl->tpl_vars['postcontent']->value;?>
</textarea><br/>
    <input type="submit" name=""><br/>
    <br/>
    <br/>
    <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

</form>
</body>
</html><?php }
}
