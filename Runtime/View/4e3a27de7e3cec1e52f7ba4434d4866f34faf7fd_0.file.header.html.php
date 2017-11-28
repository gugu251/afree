<?php
/* Smarty version 3.1.32-dev-38, created on 2017-11-24 17:38:43
  from 'D:\web\mycore\Application\View\Admin\Public\header.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_5a17e8a3c71414_16064305',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4e3a27de7e3cec1e52f7ba4434d4866f34faf7fd' => 
    array (
      0 => 'D:\\web\\mycore\\Application\\View\\Admin\\Public\\header.html',
      1 => 1511514502,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a17e8a3c71414_16064305 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>阿飞后台管理平台</title>
        <meta name="description" content="这是一个 index 页面">
        <meta name="keywords" content="index">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="renderer" content="webkit">
        <meta http-equiv="Cache-Control" content="no-siteapp" />
        <link rel="icon" type="image/png" href="/Public/style/assets/i/favicon.png">
        <link rel="apple-touch-icon-precomposed" href="/Public/style/assets/i/app-icon72x72@2x.png">
        <meta name="apple-mobile-web-app-title" content="Amaze UI" />
        <link rel="stylesheet" href="/Public/style/assets/css/amazeui.min.css" />
        <link rel="stylesheet" href="/Public/style/assets/css/admin.css">
        <link rel="stylesheet" href="/Public/style/assets/css/app.css">
        <?php echo '<script'; ?>
 src="/Public/style/assets/js/echarts.min.js"><?php echo '</script'; ?>
>
    </head>

    <body data-type="index">


        <header class="am-topbar am-topbar-inverse admin-header">
            <div class="am-topbar-brand">
                <a href="javascript:;" class="tpl-logo">
                    <img src="/Public/style/assets/img/logo.png" alt="">
                </a>
            </div>
            <div class="am-icon-list tpl-header-nav-hover-ico am-fl am-margin-right">

            </div>

            <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

            <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

                <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list tpl-header-list">
                    <li class="am-dropdown" data-am-dropdown data-am-dropdown-toggle>
                        <a class="am-dropdown-toggle tpl-header-list-link" href="javascript:;">
                            <span class="am-icon-bell-o"></span> 提醒 <span class="am-badge tpl-badge-success am-round">5</span></span>
                        </a>
                        <ul class="am-dropdown-content tpl-dropdown-content">
                            <li class="tpl-dropdown-content-external">
                                <h3>你有 <span class="tpl-color-success">5</span> 条提醒</h3><a href="###">全部</a></li>
                            <li class="tpl-dropdown-list-bdbc"><a href="#" class="tpl-dropdown-list-fl"><span class="am-icon-btn am-icon-plus tpl-dropdown-ico-btn-size tpl-badge-success"></span> 【预览模块】移动端 查看时 手机、电脑框隐藏。</a>
                                <span class="tpl-dropdown-list-fr">3小时前</span>
                            </li>
                            <li class="tpl-dropdown-list-bdbc"><a href="#" class="tpl-dropdown-list-fl"><span class="am-icon-btn am-icon-check tpl-dropdown-ico-btn-size tpl-badge-danger"></span> 移动端，导航条下边距处理</a>
                                <span class="tpl-dropdown-list-fr">15分钟前</span>
                            </li>
                            <li class="tpl-dropdown-list-bdbc"><a href="#" class="tpl-dropdown-list-fl"><span class="am-icon-btn am-icon-bell-o tpl-dropdown-ico-btn-size tpl-badge-warning"></span> 追加统计代码</a>
                                <span class="tpl-dropdown-list-fr">2天前</span>
                            </li>
                        </ul>
                    </li>
                    <li class="am-dropdown" data-am-dropdown data-am-dropdown-toggle>
                        <a class="am-dropdown-toggle tpl-header-list-link" href="javascript:;">
                            <span class="am-icon-comment-o"></span> 消息 <span class="am-badge tpl-badge-danger am-round">9</span></span>
                        </a>
                        <ul class="am-dropdown-content tpl-dropdown-content">
                            <li class="tpl-dropdown-content-external">
                                <h3>你有 <span class="tpl-color-danger">9</span> 条新消息</h3><a href="###">全部</a></li>
                            <li>
                                <a href="#" class="tpl-dropdown-content-message">
                                    <span class="tpl-dropdown-content-photo">
                                        <img src="/Public/style/assets/img/user02.png" alt=""> </span>
                                    <span class="tpl-dropdown-content-subject">
                                        <span class="tpl-dropdown-content-from"> 禁言小张 </span>
                                        <span class="tpl-dropdown-content-time">10分钟前 </span>
                                    </span>
                                    <span class="tpl-dropdown-content-font"> Amaze UI 的诞生，依托于 GitHub 及其他技术社区上一些优秀的资源；Amaze UI 的成长，则离不开用户的支持。 </span>
                                </a>
                                <a href="#" class="tpl-dropdown-content-message">
                                    <span class="tpl-dropdown-content-photo">
                                        <img src="/Public/style/assets/img/user03.png" alt=""> </span>
                                    <span class="tpl-dropdown-content-subject">
                                        <span class="tpl-dropdown-content-from"> Steam </span>
                                        <span class="tpl-dropdown-content-time">18分钟前</span>
                                    </span>
                                    <span class="tpl-dropdown-content-font"> 为了能最准确的传达所描述的问题， 建议你在反馈时附上演示，方便我们理解。 </span>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="am-dropdown" data-am-dropdown data-am-dropdown-toggle>
                        <a class="am-dropdown-toggle tpl-header-list-link" href="javascript:;">
                            <span class="am-icon-calendar"></span> 进度 <span class="am-badge tpl-badge-primary am-round">4</span></span>
                        </a>
                        <ul class="am-dropdown-content tpl-dropdown-content">
                            <li class="tpl-dropdown-content-external">
                                <h3>你有 <span class="tpl-color-primary">4</span> 个任务进度</h3><a href="###">全部</a></li>
                            <li>
                                <a href="javascript:;" class="tpl-dropdown-content-progress">
                                    <span class="task">
                                        <span class="desc">Amaze UI 用户中心 v1.2 </span>
                                        <span class="percent">45%</span>
                                    </span>
                                    <span class="progress">
                                        <div class="am-progress tpl-progress am-progress-striped"><div class="am-progress-bar am-progress-bar-success" style="width:45%"></div></div>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" class="tpl-dropdown-content-progress">
                                    <span class="task">
                                        <span class="desc">新闻内容页 </span>
                                        <span class="percent">30%</span>
                                    </span>
                                    <span class="progress">
                                        <div class="am-progress tpl-progress am-progress-striped"><div class="am-progress-bar am-progress-bar-secondary" style="width:30%"></div></div>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" class="tpl-dropdown-content-progress">
                                    <span class="task">
                                        <span class="desc">管理中心 </span>
                                        <span class="percent">60%</span>
                                    </span>
                                    <span class="progress">
                                        <div class="am-progress tpl-progress am-progress-striped"><div class="am-progress-bar am-progress-bar-warning" style="width:60%"></div></div>
                                    </span>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="am-hide-sm-only"><a href="javascript:;" id="admin-fullscreen" class="tpl-header-list-link"><span class="am-icon-arrows-alt"></span> <span class="admin-fullText">开启全屏</span></a></li>

                    <li class="am-dropdown" data-am-dropdown data-am-dropdown-toggle>
                        <a class="am-dropdown-toggle tpl-header-list-link" href="javascript:;">
                            <span class="tpl-header-list-user-nick">禁言小张</span><span class="tpl-header-list-user-ico"> <img src="/Public/style/assets/img/user01.png"></span>
                        </a>
                        <ul class="am-dropdown-content">
                            <li><a href="#"><span class="am-icon-bell-o"></span> 资料</a></li>
                            <li><a href="#"><span class="am-icon-cog"></span> 设置</a></li>
                            <li><a href="#"><span class="am-icon-power-off"></span> 退出</a></li>
                        </ul>
                    </li>
                    <li><a href="###" class="tpl-header-list-link"><span class="am-icon-sign-out tpl-header-list-ico-out-size"></span></a></li>
                </ul>
            </div>
        </header><?php }
}
