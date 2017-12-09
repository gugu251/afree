$(function() {
    // 头部下拉菜单
    $('.logined-list li').hover(function() {
        $(this).find('.user-down-list').stop().slideToggle();
    });
    //登录
    $('.login-btn').bind('click', function() {
        $('.login-motal-box').show();
    });
    $(document).on('click', '.login-motal-box .close', function() {
        $('.login-motal-box').hide();
    });
    //登录验证
    function longin() {
        var userName = $.trim($('.user-inp').val()); //用户名
        var $this = $(this);
        var pass = $.trim($('.pass-inp').val());
        var email = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/; //邮箱
        var phone = /^1\d{10}$/; //手机号
        if (userName == '') {
            layer.tips('账号不能为空', '.user-inp');
        } else if (userName == '') {
            layer.tips('用户名不能为空', '.user-inp');
        } else if (pass == '') {
            layer.tips('密码不能为空', '.pass-inp');
        }
    }
    $('.user-inp').blur(function() {
        /* Act on the event */
        longin();
    });
    $('.submit').click(function() {
        longin();
    });
    //文章提取弹出
    function show(el) {
        $(el).show();
    };

    function hide(el) {
        $(el).hide();
    }
    //文章提取
    $('._form').on('click', function() {
        show('.article-motal');
    });


    //关闭
    $('.article-top .close').on('click', function() {
        hide('.article-motal');
    });
    //微信短连接
    $('._attachment').on('click', function() {
        show('.wx-line-motal');
    });
    $('.wx-line-motal .close').on('click', function() {
        hide('.wx-line-motal');
    });
    //提取验证
    function tiqu() {
        var val = $('#wx-adress').val();
        // var reg =/^http://[a-zA-Z0-9]+.[a-zA-Z0-9]+[/=?%-&_~`@[]':+!]*([^<>""])*$/;
        var strRegex = '^((https|http|ftp|rtsp|mms)?:\/\/)[^\s]+';
        var re = new RegExp(strRegex);
        if (val == '') {
            layer.tips('内容不能为空', '#wx-adress', {
                tips: [1, '#3595CC']
            });
        } else if (!re.test(val)) {
            layer.tips('链接不正确,链接以：http://mp.weixin.qq.com/s?src=开头', '#wx-adress', {
                tips: [1, '#3595CC']
            });
        } else {
            layer.msg('提取成功', {
                icon: 1
            });
            hide('.article-motal');
        }
    }
    $('#we-tq').on('click', function() {
        tiqu();
    });
});