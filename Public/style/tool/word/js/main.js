function isIE() { //ie?
 if (!!window.ActiveXObject || "ActiveXObject" in window){
	 	layer.msg('<span style="font-size:16px;">您在使用IE内核,如果您确定浏览器不是IE 请将网址栏右侧"兼容模式"改成"急速模式".<br/>IE请更换浏览器!</span>', {time:32000});
 }
}
isIE();
//编辑器
ue = UE.getEditor('container', {
initialFrameHeight: 696
});
var editor = UE.getEditor('container', {});
editor.addListener('ready', function() {
editor.setContent('', true);
});
$(function() {
    //一级菜单
    $('.tab-wrap dl').not('.edit-partner').find('dt').click(function() {
        if ($(this).hasClass('wdl2')) {
            return;
        }
        $(this).closest('dl').addClass('active').siblings().removeClass('active');
        $('.tab-wrap dd').removeClass('active');
        $(this).next('dd').addClass('active').closest('dl').addClass('active').siblings().removeClass('active');
        if ($(this).next('dd').length) {
            menu($(this).next('dd'));
        } else {
            bar($(this), '');
        }
    });
    //二级菜单
    $('.tab-wrap dl').not('.edit-partner').find('dd').click(function() {
        $(this).addClass('active').siblings().removeClass('active');
        menu($(this));
    });
    //筛选
    $(document).on('click', '.wheres', function(event) {
        if ($(this).attr('type') == 'button') {
            var func = eval($(this).attr('do'));
            func();
        } else {
            //加载数据
            bar($(this), $(this).attr("data"));
            //筛选状态显示
            $('.screen-box .wheres').removeClass('active');
            if ($(this).context.nodeName == 'LI') {
                $(this).addClass('active').find('.down-list span:first').addClass('active');
            } else {
                $(this).addClass('active').closest('li').addClass('active');
                event.stopPropagation();
            }
        }
    });
    //默认加载列表
    menu($('.tab-wrap dd.active'));
    //调取筛选条件并刷新列表
    function menu(_this) {
        $('.screen-box').remove();
        $.get("/tool/word/getwxwordcate", {
            pid: _this.attr("data"),
            type: _this.attr("type")
        }, function(result) {
            //是否有筛选
            if (result.data) {
                //获取数据
                var dataMenu = result.data.menu;
                var dataItem = result.data.item;
                dataFirst = dataMenu[0].id;
                //加载列表
                bar(_this, dataFirst);
                //添加新的筛选
                $('.tab-item').prepend('<ul class="screen-box clearfix"></ul>');
                //循环一级菜单
                for (id in dataMenu) {
                    var menu = dataMenu[id];
                    //循环一级筛选生成li
					var $html = '<li class="wheres menu' + menu.id + '" data="' + menu.id + '" type="' + menu.type +'"';
					if(typeof(menu.do)!='undefined'){
						$html+=' do="' + menu.do+'"';
					}
					$html +=' name="' + name + '">' + menu.tname + '</li>';
                    $('.screen-box').append($html);
                    //获取最后一个li
                    var $li = $('.screen-box').find('li:last');
                }
                //是否有二级菜单
                if (dataItem) {
                    for (mid in dataItem) {
                        //若有数据则添加下拉结构进对应li
                        var $select = '<div class="down-list"><p><span class="wheres" data="' + mid + '" type="' + dataItem[mid][0].type + '" name="' + name + '">全部</span></p></div>';
                        $('.menu' + mid).append($select);
                        //循环二级菜单进对应的下拉
                        for (iid in dataItem[mid]) {
                            var $item = '<span class="wheres" data="' + dataItem[mid][iid].id + '" type="' + dataItem[mid][iid].type + '" name="' + name + '">' + dataItem[mid][iid].tname + '</span>';
                            if (dataItem[mid][iid].top == mid) {
                                $('.menu' + mid).addClass('menuSelect').find('p').append($item);
                            }
                        }
                    }
                }
                //給第一个li和第一个span加样式
                if ($('.screen-box').find('li:first').attr('do') != 'showXiuxiu') {
                    $('.screen-box').find('li:first').addClass('active').find('p span:first').addClass('active');
                }
                //根据不同筛选重新设置列表外框高度
                var filterHeight = $('.screen-box').height();
                $('#choice').height(795 - filterHeight);
            } else {
                bar(_this, '');
                $('#choice').height('');
            }
        });
    }
    //调取列表接口
    function bar(_this, Tid) {
        $('.wait-box').show();
        name = _this.attr('name') || '';
        var type = _this.attr('type');
        if (name == 'my-favor') {
            //我的收藏
            var url = "/index/favor/";
        } else if (name == 'my-save') {
            //我的保存
            var url = "/index/my/";
        } else if (name == 'onekey') {
            //排版
			
            var url = "/index/quick/";
            $('#choice').height('');
        }  else if (name == 'my-fonts') {
            //排版
            var url = "/index/font/";
            $('#choice').height('');
        }  else if (name == 'my-design') {
            //排版
            var url = "/index/design/";
            $('#choice').height('');
        } 
		else {
            var url = "/tool/word/getwxword";
        }
		if(url!='/tool/word/getwxword' &&  url!="/index/quick/"){
        $.post(url, {
            Tid: Tid,
            type: type
        }, function(data) {
            $("#choice").html(data);
            //素材模板去掉所有按钮
            if (name == '') {
                $('.con-list .iconfont').remove();
            }
            //我的收藏去掉删除按钮
            if (name == 'my-favor') {
                $('.con-list .icon-shanchu').remove();
            }
            //一键排版去掉筛选
            if (name == 'onekey') {
                $('.screen-box').remove();
            }
			 if (name == 'my-fonts' || name == 'my-design') {
                $('.screen-box').remove();
            }
            //我的保存去掉取消收藏按钮
            if (name == 'my-save') {
                $('.con-list .icon-aixin1').remove();
                type == 3 && $('.con-text-list').removeClass('to-editor');
            }
            $('.wait-box').hide();
        });
		}else{
		 $.get(url, {
            Tid: Tid,
            type: type
        }, function(data) {
            $("#choice").html(data);
            //素材模板去掉所有按钮
            if (name == '') {
                $('.con-list .iconfont').remove();
            }
            //我的收藏去掉删除按钮
            if (name == 'my-favor') {
                $('.con-list .icon-shanchu').remove();
            }
            //一键排版去掉筛选
            if (name == 'onekey') {
                $('.screen-box').remove();
            }
			 if (name == 'fonts') {
                $('.screen-box').remove();
            }
            //我的保存去掉取消收藏按钮
            if (name == 'my-save') {
                $('.con-list .icon-aixin1').remove();
                type == 3 && $('.con-text-list').removeClass('to-editor');
            }
            $('.wait-box').hide();
        });	
		}
    }
   
    //点击添加数据进编辑框
    issign = false;
    $(document).on("click", '.to-editor li', function() {

        //若是图片替换路径，其他正常
        if ($(this).closest('ul').hasClass('con-pic-list')) {
            var url = $(this).find('.editor img').attr('original'),
                html = '<img src="'+ url +'">'; 

        }else{
            var html = $(this).find('.editor').html();
        }

        //模板的话替换编辑框内容
        if ($('.con-list').hasClass('con-tpl-list')) {
			
            editor.setContent(html,true);
        }
        //普通情况添加在在鼠标焦点处
        else{
            editor.focus();
            editor.execCommand('inserthtml', '<section class="editor">' + html + '</section>');
        }
    });
	$(document).on("click", '.sc-to-editor li', function() {
		var range = editor.selection.getRange();
			range.select();
			var s = range.extractContents();
			var html = $(this).find('.editor').html();
			if(s!=null){
				var span = document.createElement('SPAN');
				var img_ret;
				var img_arr=[];
				var rep_arr=[];
				span.appendChild(s);
				s = $(span).html();
				//图片处理
				var re = / src=['|"]?([^"|^'|^>]*)['|"]?/g;
				while( tempR = re.exec(s)){
				  img_arr.push(tempR[1]);
				}
				while( tempR = re.exec(html)){
				  rep_arr.push(tempR[1]);
				}
				var re = /url\(('|"|&quot;)?([^'|^"|^\)|]*)('|"|&quot;)?\)/g;
				while( tempR = re.exec(html)){
				  rep_arr.push(tempR[2].replace('&quot;',''));
				}
				
				if(rep_arr.length>0 && img_arr.length>0){
					for(var i=0;i<rep_arr.length;i++){
						if(typeof(img_arr[i]) == 'undefined') break;
						html=html.replace(rep_arr[i],img_arr[i]);
					}
				}
			
				//文字处理
				var txt_replace=s.replace(/<\/?span[^>]*>/g,'').replace(/<\/?a[^>]*>/g,'').replace(/<\/?strong[^>]*>/g,'').replace(/<.*?>/g, '#_#_').split('#_#_');
				txt_replace=$.grep(txt_replace, function(n) {return $.trim(n).length > 0;});
				var txt=html.replace(/<[^>]*>/g, '#_#_').split('#_#_');
				var ret=/.*[\u4e00-\u9fa5]{3,}.*/;	
				for(var i=0; i<txt.length;i++){
					if(ret.test(txt[i]) || txt[i].length>4 ||txt[i]=='标题' || txt[i]=='内容')  {
					}else{
						txt[i]='';
					}
				}
				txt=$.grep(txt, function(n) {return $.trim(n).length > 0;});
				if(txt.length >= txt_replace.length){
					for(var i=0; i<txt.length;i++){
						if(typeof(txt_replace[i]) == 'undefined') continue;
						
						html=html.replace(txt[i],txt_replace[i]);
					}
				}else{
					if(txt.length==1){
						var txt_str='';
						for(var i=0;i<txt_replace.length;i++){
							if(txt[0].length>10 || txt[0].indexOf('内容')!=-1)
							{
								txt_str+=txt_replace[i]+'<br/>';
							}else{
								txt_str+=txt_replace[i];
							}
						}
						html=html.replace(txt[0],txt_str);
					}else if(txt.length>1){
						var e=[],f=[];
						f[0]=0,f[1]=max=txt[0];
						
						for(var i=1;i<txt.length;i++){ 
						  if(max.length<txt[i].length) {
							  max=txt[i];
							  f[0]=i;
							  f[1]=max;
							}
						}
						if(f[1].length>10 || f[1].indexOf('内容')!=-1){
							for(var i=0; i<txt_replace.length;i++){
								if(i<f[0]){
									e[i]=txt_replace[i];
								}else{
									if(typeof e[f[0]]=='undefined') e[f[0]]=txt_replace[i];
									else e[f[0]]+='<br />'+txt_replace[i];
								}
							}
						}else{
							for(var i=0; i<txt_replace.length;i++){
								if(i<f[0]){
									
									e[i]=txt_replace[i];
								}else{
									if(typeof e[f[0]]=='undefined') e[f[0]]=txt_replace[i];
									else e[f[0]]+=txt_replace[i];
								}
							}
						}
						for(var i=0; i<txt.length;i++){
							if(typeof(e[i]) == 'undefined') continue;
							html=html.replace(txt[i],e[i]);
						}
					}
				}
			}
			editor.focus();
			editor.execCommand('inserthtml', '<section class="editor">' + html + '</section>');
    });
    //一键排版
    $(document).on("click", '#key li', function() {
        if (editor.getContentTxt().length == 0 && editor.getContent() == '') {
            layer.msg('编辑器内容为空，请填入内容后排版');
        } else {
            //缓存内容
            window.localStorage.setItem("96editor", editor.getContent());
        }
    });
	 // 导出长图
 $("._createimage").click(function() {
			floatartimage(editor.getContent());
    });
	var floatartimage = function(html) {
		var htmlObj = $('<div>' + html + '</div>');
		htmlObj.find('.tool-border').remove();
		layer.open({
			type: 1,
			area: ['640px'],
			shade: 0.4,
			skin: 'float-artimage',
			btn: false,
			title: '生成图片',
			content: '<div class="rich_media_inner rich_media_artimage"><div class="rich_media_content"><div id="create_img_set_style">' + htmlObj.html() + '</div></div></div><form class="layui-form layui-form-pane"id="form_artimage"action=""><label style="margin-top:10px">图片宽度</label><div class="radio radio-group-style"><label class="radio-inline font-radio"><input type="radio"name="width"id=""value="400"checked="">400px</label><label class="radio-inline font-radio"><input type="radio"name="width"id=""value="480">480px</label><label class="radio-inline font-radio"><input type="radio"name="width"id=""value="640">640px</label><label class="radio-inline font-radio"><input type="radio"name="width"id=""value="720">720px</label></div><label style="margin-top:10px">字体选择</label><div class="radio radio-group-style"><label class="radio-inline font-radio"><input type="radio"name="font"id=""value="1"checked="">微软雅黑</label><label class="radio-inline font-radio"><input type="radio"name="font"id=""value="2">宋体</label><label class="radio-inline font-radio"><input type="radio"name="font"id=""value="3">黑体</label><label class="radio-inline font-radio"><input type="radio"name="font"id=""value="4">楷体</label></div><label style=margin-top:10px>左右间距</label><div class="radio radio-group-style"><label class="radio-inline font-radio"><input type=radio name=mlr value=5 checked>5</label><label class="radio-inline font-radio"><input type=radio name=mlr value="10">10</label><label class="radio-inline font-radio"><input type=radio name=mlr value="15">15</label><label class="radio-inline font-radio"><input type=radio name=mlr value="20">20</label><label class="radio-inline font-radio"><input type=radio name=mlr value="25">25</label><label class="radio-inline font-radio"><input type=radio name=mlr value="30">30</label></div><label style=margin-top:10px>左右间距</label><div class="radio radio-group-style"><label class="radio-inline font-radio"><input type=radio name=mtb value=5 checked>5</label><label class="radio-inline font-radio"><input type=radio name=mtb value="10">10</label><label class="radio-inline font-radio"><input type=radio name=mtb value="15">15</label><label class="radio-inline font-radio"><input type=radio name=mtb value="20">20</label><label class="radio-inline font-radio"><input type=radio name=mtb value="25">25</label><label class="radio-inline font-radio"><input type=radio name=mtb value="30">30</label></div><label>选择背景样式</label><div class="ld-bg-style"><div class="ld-bg-module"><div class="ld-relative"><div class="ld-bg-img ld-choose-bg-img ld-default" data-bg-id="0"></div></div><span>无</span></div><div class="ld-bg-module"><div class="ld-relative"><img class="ld-bg-img" data-bg-id="2" src="/assets/index/img/ld-choose-img-4.png"></div><span>运动</span></div><div class="ld-bg-module"><div class="ld-relative"><img class="ld-bg-img" data-bg-id="3" src="/assets/index/img/ld-choose-img-5.png"></div><span>水纹</span></div><div class="ld-bg-module"><div class="ld-relative"><img class="ld-bg-img" data-bg-id="4" src="/assets/index/img/ld-choose-img-6.png"></div><span>十字纹</span></div></div><input value="" id="create_bgid" name="bgid" type="hidden" /><div class="layui-form-item"><div class="layui-btn layui-btn-normal"  id="artimage">生成图片</div></div><div class="layui-form-item"><div class="layui-form-mid layui-word-aux">温馨提示：(虚线内为图片可是区域)<br/>1.暂不支持动态样式、滑动样式；<br/>2.暂不支持视频、GIF图；<br/>3.少量样式渲染支持不是很完美。</div></div></form>',
			success: function(layero, index){ 
				$("input[name='width']").click(function(){
					$('.float-artimage').css("left",(($(window).width()-parseInt($(this).val())-300)/2) + "px");
					$('.float-artimage').width(parseInt($(this).val())+300);
					$('.float-artimage .rich_media_artimage').width(parseInt($(this).val())+5);
				});
				$("input[name='font']").click(function(){
					switch(parseInt($(this).val())){
						case 2:
							$('.rich_media_artimage').css("font-family",'宋体, SimSun');
						break;
						case 3:
							$('.rich_media_artimage').css("font-family",'黑体, SimHei');
						break;
						case 4:
							$('.rich_media_artimage').css("font-family",'楷体, 楷体_GB2312, SimKai');
						break;
						default:
							$('.rich_media_artimage').css("font-family",'"Microsoft YaHei"');
					}
				});
				$("input[name='mlr']").click(function(){
					$('.rich_media_artimage .rich_media_content').css("padding-left",parseInt($(this).val()));
					$('.rich_media_artimage .rich_media_content').css("padding-right",parseInt($(this).val()));
				});
				$("input[name='mtb']").click(function(){
					$('.rich_media_artimage .rich_media_content').css("padding-top",parseInt($(this).val()));
					$('.rich_media_artimage .rich_media_content').css("padding-bottom",parseInt($(this).val()));
				});
				$(document).on('click','.ld-bg-img',function(){
					$('#create_img_set_style').removeClass("create_img_set_style");
					$('#create_img_set_style').attr("style","");
					$('.rich_media_artimage').css('background-image','none');
					
					var bgid = parseInt($(this).data('bg-id'));
					$("#create_bgid").val(bgid);
					switch(bgid){
						case 1:
							$('#create_img_set_style').css("border",'1px solid #cfcece').css("padding",'10px');  
							$('#create_img_set_style').addClass('create_img_set_style');
						break;
						case 2:
						case 3:
						case 4:
							$('.rich_media_artimage').css('background-image','url(assets/index/img/style-'+bgid+'.png)').css('background-repeat','repeat');
						break;
						default:
							
					}
				});
				
				$('#artimage').click(function(){
					$("#form_artimage").attr('action','/create/');  
					$("#form_artimage").attr('method','post');  
					$("#form_artimage").attr('target','_blank');
					$("#form_artimage").append("<textarea name='content' class='none'>"+editor.getContent()+"</textarea>");
					console.log($("#form_artimage"));
					$("#form_artimage").submit();
					layer.closeAll();
					return !1;
				});
			}
		});
	}
		 // 清空
    $("._mess").click(function() {
		layer.open({
			type: 2,
			title: '96微信问题反馈',
			shadeClose: true,
			shade: 0,
			area: ['710px', '555px'],
			content: '/message/' //iframe的url
		}); 
    });
    // 清空
    $("._empoty").click(function() {
        if (editor.getContentTxt().length == 0 && editor.getContent() == '') {
            layer.msg('没有需要清空的内容');
            return;
        }
        layer.confirm('确定要清空编辑器的内容吗？', {
            btn: ['确定', '取消'] //按钮
        }, function() {
            editor.setContent('');
            layer.msg('已经清空', {
                icon: 1
            });
            editor.setContent('');
        }, function() {
            ""
        });
    });
		$("._synch").click(function() {
		if($('.layui-layer-iframe').length >0){
			 layer.closeAll();
		}else{
			layer.open({
			type: 2,
			title: '图文同步',
			shadeClose: true,
			shade: 0,
			area: ['680px', '690px'],
			content: '/synch/' //iframe的url
			}); 
		}	
    });
	$("._cloud").click(function() {
		if($('.layui-layer-iframe').length >0){
			 layer.closeAll();
		}else{
			layer.open({
			type: 2,
			title: '云端草稿',
			shadeClose: true,
			shade: 0,
			area: ['780px', '690px'],
			content: '/cloud/dom/' //iframe的url
			}); 
		}	
	});
		function usemusic() {
		if($('.layui-layer-iframe').length >0){
			 layer.closeAll();
		}else{
			layer.open({
			type: 2,
			title: '搜索QQ音乐',
			shadeClose: true,
			shade: 0,
			area: ['500px', '446px'],
			content: '/music/' //iframe的url

			,btn: ['确定', '关闭']
			,yes: function(index, layero){
				var e =  document.getElementById("layui-layer-iframe"+index).contentWindow.music.exec();
				if(e['error']==0){
					var str  = '<iframe class="res_iframe qqmusic_iframe js_editor_qqmusic" style="height:64px;" scrolling="no" frameborder="0" musicid="'+e['musicid']+'" mid="'+e['mid']+'" albumurl="'+e['albumurl']+'" audiourl="'+e['audiourl']+'" music_name="'+e['music_name']+'" commentid="443066293" singer="'+e['singer']+'" play_length=""  src="https://mp.weixin.qq.com/cgi-bin/readtemplate?t=tmpl/qqmusic_tmpl&singer='+e['singer']+'&music_name='+e['music_name']+'"></iframe>';
					
					
					editor.focus();
					//editor.execCommand('inserthtml', str);
					editor.execCommand('inserthtml','<section class="editor">' + str + '</section>');
					
				}
			}
			,btn2: function(index, layero){
				layer.close(index);
			}
			}); 
		}	
		
    }
		function usevideo() {
		if($('.layui-layer-page').length >0){
			 layer.closeAll();
		}else{
			layer.open({
			type: 1,
			title: '查找QQ视频',
			shadeClose: true,
			shift: 7,
			shade: 1,
			area: ['600px', '480px'],
			content: "<div class='modal-body'><input class='videourl' type='text' name='content' placeholder='请复制腾讯视频地址，例：https://v.qq.com/x/page/i0024y3eloa.html'><div class='bottom'></div><div class='preview' style='border: 1px dashed rgb(204, 204, 204);'>视频地址</div></div>" //iframe的url
			,btn: ['确定', '关闭']
			,yes: function(index, layero){
					var str = $(".modal-body .preview").html();
					editor.focus();
					editor.execCommand('inserthtml','<section class="editor">' + str + '</section>');
					layer.close(index);
			}
			,btn2: function(index, layero){
				layer.close(index);
			}
			}); 
		}	
		
    }

	$(document).on("input",".videourl",
    function() {
        var a = $(".modal-body input[name=content]").val();
		$.post("/index/video", {
            url: a,
        }, function(d) {
            if (d == "1" || d=='0') {
                layer.msg('链接不正确');
            } else {
                a= d;
				"" == a ? ($(".modal-body .preview").css("border", "1px dashed #ccc"), $(".modal-body .preview").html("\u89c6\u9891\u9884\u89c8")) : ($(".modal-body .preview").css("border", "none"), -1 != a.indexOf("vid\x3d") ? a = a.substr(a.length - 11) : (a = a.split("/"), a = a[a.length - 1], a = a.replace(".html", "")), a = '\x3ciframe class\x3d"video_iframe" height\x3d"310" width\x3d"100%" frameborder\x3d"0" src\x3d"https://v.qq.com/iframe/preview.html?vid\x3d' + a + '\x26width\x3d540\x26height\x3d320\x26auto\x3d0" allowfullscreen\x3d""\x3e\x3c/iframe\x3e', $(".modal-body .preview").html(a))
            }
        })
        
    });
	$.getScript(UEDITOR_CONFIG.UEDITOR_HOME_URL + 'third-party/zeroclipboard/ZeroClipboard.min.js',function(){
		ZeroClipboard.config({cacheBust:false,swfPath:UEDITOR_CONFIG.UEDITOR_HOME_URL + 'third-party/zeroclipboard/ZeroClipboard.swf'});
		var client = new ZeroClipboard($('._copyTo'));
		client.on('ready',function(event){
		}).on('error',function(event){
			layer.msg("复制Flash初始化失败，无法使用复制按钮，请查看帮助或者全选后“Ctrl+C”复制")
		}).on('copy', function(event){
			var html = getEditorHtml(false);
			event.clipboardData.setData('text/html',html );
			layer.msg("内容已经复制,试试Ctrl+V粘贴",{icon:1})
		});
	});
    //恢复
    $('._back').on('click', function() {
        if (editor.getContent() == '') {
            return;
        }
        editor.execCommand("undo");
    });
    // 预览
    //编辑器预览
    $('._look').on('click', function() {
        if (editor.getContent().length == 0) {
            layer.msg('没有可预览的内容');
        } else {
            var html = editor.getContent();
            $('.preview-content').html(html);
            $('.phone-view').show();
        }
    });
    //我的保存预览
    $(document).on('click', '.list_look', function(event) {
        event.stopPropagation();
        var html = $(this).closest('li').find('.editor').html();
        $('.preview-content').html(html);
        $('.phone-view').show();
    });
    //关闭预览
    $('#phone-close').on('click', function() {
        $('.phone-view').hide();
    });
    //日期函数
    function CurentTime() {
        var now = new Date();
        var year = now.getFullYear(); //年
        var month = now.getMonth() + 1; //月
        var day = now.getDate(); //日
        var hh = now.getHours(); //时
        var mm = now.getMinutes(); //分
        var clock = year + "-";
        if (month < 10) clock += "0";
        clock += month + "-";
        if (day < 10) clock += "0";
        clock += day + " ";
        if (hh < 10) clock += "0";
        clock += hh + ":";
        if (mm < 10) clock += '0';
        clock += mm;
        return (clock);
    }
    $('.now-time').text(CurentTime());
    //颜色列表
    $(document).on('click', '.colors-list li', function() {
        $(this).addClass('active').siblings().removeClass('active');
        var val = $('#colorCheck').find('span.checked').attr('data-value');
        var $topBd,
            $iframeBd = $(document.getElementById('ueditor_1').contentWindow.document.body);
        if($('#mci').hasClass('checked')){
            $topBd = $(".content-l-box .con-box");
            parseObject($topBd, $(this).attr('color'), "#fff"); 
        }
        if($('#sci').hasClass('checked')){
            $topBd = $iframeBd.find(".editor.selected");
            parseObject($topBd, $(this).attr('color'), "#fff");         
        }
        if($('#eci').hasClass('checked')){
            $topBd = $iframeBd;
            parseObject($topBd, $(this).attr('color'), "#fff");        
        }
    });
    //手动输入颜色
    $(document).on('blur', '.colorPicker', function() {
        var valrgb = $('.colorPicker').prop('value').colorRgb();
        $('.colorPicker').css({'background-color': valrgb});
        // alert(valrgb);
        var $topBd,
            $iframeBd = $(document.getElementById('ueditor_1').contentWindow.document.body);
        if($('#mci').hasClass('checked')){
            $topBd = $(".content-l-box .con-box");
            parseObject($topBd, valrgb, "#fff"); 
        }
        if($('#sci').hasClass('checked')){
            $topBd = $iframeBd.find(".editor.selected");
            parseObject($topBd, valrgb, "#fff");         
        }
        if($('#eci').hasClass('checked')){
            $topBd = $iframeBd;
            parseObject($topBd, valrgb, "#fff");        
        }
    });

    //保存文章
    $('.content-r-nav ._save').click(function() {
        $('#save-wrap').show();
    });
    //关闭
    $(document).on('click', '#save-wrap .save-top .close', function() {
        $('#save-wrap').hide();
    });
    //选择储存模式
    $('.choose .one span').click(function() {
        $(this).addClass('active').siblings().removeClass('active');
    });
    //保存提交
    function save(el) {
        this.el = el;
        var val = $.trim($('.choose-inp').val());
        if (val == '') {
            layer.tips('标题不能为空', el);
            $('.choose-inp').focus();
            return false;
        } else {
            return true;
        }
    }
    $('.sub-btn button').on('click', function() {
        if (save($('.choose-inp'))) {
            $('#save-wrap').hide();
        } else {
            return;
        }
    });
    ////////////////////////////////////////////////
    var cur_plen = 0;
    var cur_slen = 0;
    var cur_prefix = "";
    var cur_suffix = "";
    var gprefix = "";
    var gsuffix = "";
    //var issign = false;
    //
    $('#synwx').on('click', function() {
        if ($(this).is(":checked")) {
            $('.wx-select').removeAttr('disabled').css('background', "");
        } else {
            $('.wx-select').attr('disabled', true).css('background', "#F5F5F5");
        }
    });
    //上传图片
    var set2 = new uploadPreview({
        UpBtn: "pic2",
        ImgShow: "img-show"
    });
    $('#pic2').bind('change', function() {
      
        var formData = new FormData($("#uploadform")[0]);
        $.ajax({
            url: "/upload/wximage/",
            type: 'POST',
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(data) {
                if (data.state == 'SUCCESS') {
                    $('.fm-inp').val(data.url);
                    $('#thumb').val(data.url);
                    $('.wpic').val(data.url);
                    layer.msg('封面图片上传成功！');
                } else {
                    layer.msg(data.state);
                }
            }
        });
    });
    //缓存编辑器内容 
    function save() {
        var cur_editor = null;
        var html;
        cur_editor = UE.getEditor("container");
        cur_editor.addListener("selectionChange", function() {
            if (window.localStorage) {
                var tag = $(document.getElementById('ueditor_1').contentWindow.document.body);
				
                tag.find(".editor").each(function(index, el) {
                    if ($(el).html() == "") {
                        $(el).remove();
                    }
                });
                window.localStorage.setItem("96editor", cur_editor.getContent());
            }
        });
		
        cur_editor.addListener("ready", function() {
            var val = cur_editor.getContent();
            html = window.localStorage.getItem("96editor");
            cur_editor.setContent(html);
        });
    }
    save();
    //
    $('.wdl2').click(function() {
        layer.msg('必须登录后才能执行该操作', {
            offset: ['200px', ''],
            time: 1000,
            shift: 6
        }, function() {
            $('.login-motal-box').show();
        });
        return;
    });
    //素材城
    $('.zs').each(function(index, el) {
        $(el).on('click', function() {
            var id = $(el).attr("alt");
            var val = $(".C" + id).html();
            UE.getEditor('container').setContent(val, true);
        });
    });
    //采集提取
    $(".tq").click(function() { 
        var urls = $.trim($(".urls").val());
		var type = $('input:radio[name="cjtype"]:checked').val();
        var strRegex = /^((https|http|ftp|rtsp|mms)?:\/\/)[^\s]+/;
        if (urls == "") {
            layer.tips('内容不能为空', '.urls', {
                tips: [1, '#3595CC']
            });
        } else if (!strRegex.test(urls)) {
            layer.tips('链接不正确,链接以：http://mp.weixin.qq.com/s?src=开头', '.urls', {
                tips: [1, '#3595CC']
            });
            show('.article-motal');
        } else {
            var index = layer.load(1, {
                shade: [0.1, '#fff'] //0.1透明度的白色背景
            });
            $.post("/index/urls", {
				type: type,
                urls: urls,
            }, function(json) {
				$(".article-motal").hide();
				$(".urls").val("");
				$('.layui-layer-loading,.layui-layer-shade').hide();
				if (json.sta == 'limited') {
					layer.msg('采集次数已经超过VIP授权');
				}else if(json.sta=='nomusic'){
					layer.msg('文章未检测到音频');
				}else if(json.sta=='novideo'){
					
					layer.msg('文章未检测到视频');
				}
				else if(json.sta=='mpvoice'){
					
					layer.open({
					  type: 1,
					  skin: 'layui-layer-rim', //加上边框
					  area: ['420px', '240px'], //宽高
					  content: '<div style="padding:20px;"><span style="color:blue">检测到您采集的是别人上传的音频，因微信公众号限制无法直接使用别人上传的音频，需自己下载后上传到微信公众号！</span><br/><br/>[<a href="http://faq.96weixin.com/shuoming/182.html" target="_blank" style="text-decoration:underline;color:red">点击查看微信公众号音频上传流程</a>]<br/><br/><a target="_blank" href="'+json.res+'" style="color:red;font-weight:bold;">音频下载地址</a>[请右键另存为]</div>'
					});
				}else if(json.sta=='qqmusic') {
					ue.focus();
					ue.execCommand('inserthtml',json.res);
				}else if(json.sta=='video'){
					var array=json.res.match(/<iframe class="video_iframe"[^<]*<\/iframe>/g);
					var video='';
					for (var k = 0, length = array.length; k < length; k++) {
					   video+='<section class="editor">'+array[k]+'</section><p><br/></p>';
					}
					ue.focus();
					ue.execCommand('inserthtml',video);
				}else{
					ue.setContent(json.res,true);
				}
            });
        }
    });
    //批量删除
    $(document).on('click', '.qx-input', function() {
        $(this).closest('.mybox').find('.fuck-box').find('.del-inp').prop('checked', $(this).prop("checked"));
    });
    //签名
    $('#qianming dt').on('click', function() {
        $(this).closest('dl').toggleClass('open');
    });
    $('body').on('click', function(evt) {
        if($(evt.target).parents('#qianming').length!=1){
            $('#qianming').removeClass('open');
        }
    });
    // 使用签名
    $('#qianming dd .sign-item').on('click', function() {
        //删除原有签名
        $(document.getElementById('ueditor_1').contentWindow.document.body).find('.editor_sign').remove();
        //获取当前点击的签名
        var prefix = $(this).find('.prefix').html();
        var suffix = $(this).find('.suffix').html();
        var content = editor.getContent();
        //加入签名
        editor.setContent('<section class="editor editor_sign">' + prefix + '</section>' + content + '<section class="editor editor_sign">' + suffix + '</section>');
    });
    // 删除签名
    $('#qianming dd .no-sign').on('click', function() {
        $(document.getElementById('ueditor_1').contentWindow.document.body).find('.editor_sign').remove();
    });
	if($('._cloud').attr('id')==1){
		setTimeout("cloud()",180000);   
	}
});
//删除
$(document).on('click', '.del', function(event) {
    var $this = $(this);
    var id = $(this).attr("alt1");
    var mydel = $(this).attr("alt2");
    event.stopPropagation();
    layer.confirm('确定要删除吗？', {
        btn: ['删除', '取消'] //按钮
    }, function() {
        $.post("/index/del", {
            id: id,
            mydel: mydel,
        }, function(a) {
            if (a == "yes") {
                $this.closest('li').remove();
                layer.msg('已删除', {
                    icon: 1
                });
                $('.con-list').masonry();
            } else {
                layer.msg('删除失败！');
            }
        })
    }, function() {
        ""
    });
});
//删除照片
$(document).on('click', '.pdel', function(event) {
    var $this = $(this);
    var id = $(this).attr("alt1");
    var mydel = $(this).attr("alt2");
    event.stopPropagation();
    layer.confirm('删除影响文章对应图片显示,确定要删除', {
        btn: ['删除', '取消'] //按钮
    }, function() {
        $.post("/index/del", {
            id: id,
            mydel: mydel,
        }, function(a) {
            if (a == "yes") {
                $this.closest('li').remove();
                layer.msg('已删除', {
                    icon: 1
                });
                $('.con-list').masonry();
            } else {
                layer.msg('删除失败！');
            }
        })
    }, function() {
        ""
    });
});

//颜色更换
$('#colorCheck label').click(function() {
    $(this).find('span').toggleClass('checked');
    $(this).find('i').toggleClass('active');
});
//颜色拾取器
$('.colorPicker').colorPicker({});

$(function() {
    //保存提交
    function save(el) {
        this.el = el;
        var val = $.trim($('.choose-inp').val());
        var descs = $.trim($('.descs').val());
        if (val == '') {
            layer.tips('标题不能为空', el);
            $('.choose-inp').focus();
            return false;
        } else if (descs == "") {
            layer.tips('内容不能为空', '.descs');
            return false;
        } else {
            return true;
        }
    }
    //编辑文章
    $(document).on("click", ".bg", function() {
        id2 = $(this).attr("data-id");
        title2 = $(this).attr("data-title");
        descs2 = $(this).attr("data-descs");
        pic2 = $(this).attr("data-pic");
        $(".title").val(title2);
        $(".descs").val(descs2);
        $(".bgid").val(id2);
        $(".wpic").val(pic2);
        time = $(this).attr("data-time");
        var val = $(this).closest('li').find('.editor').html();
        var nowCon = ue;
        UE.getEditor('container').setContent(val);
        $(".tbbox1").show();
        $(".tbbox2").show();
        $(".urlbox").hide();
        $(".uppic").val(pic2);
    })
    //添加
    $(document).on("click", ".add", function() {
        if (save($('.choose-inp'))) {
            $('#save-wrap').hide();
        } else {
            return;
        }
        var wxids = "";
        $(".wxid").each(function() {
            if ($(this).is(":checked")) {
                wxids = wxids + $(this).val() + ",";
            }
        });
        var pic = $(".wpic").val();
        var type = $(this).attr("alt");
        var bc = $(".tbbox1 .one .active").attr('alt');
        var title = $.trim($('.choose-inp').val());
        var descs = $.trim($('.descs').val());
        var synwx = $("#synwx").is(":checked") ? 1 : 0;
        var content = UE.getEditor('container').getContent(); //获取ue编辑器内容
        var id = $(".bgid").val();
        var wxurl = $(".wxurl").val();

        if ($(".wxid").is(":checked") && pic == "") {
            layer.msg('请上传图片！');
        } else {
            var index = layer.msg('保存中...', {
				icon: 16,
				shade: 0.01,
				time:200000
			});
			$.post("/index/addsave", {
				id: id,
				type: type,
				bc: bc,
				title: title,
				descs: descs,
				content: content,
				wxids: wxids,
				pic: pic,
				wxurl: wxurl,
			}, function(val) {
				var val = eval("(" + val + ")");
				if (val["sta"] == '1') {
					layer.close(index);
					layer.msg('保存成功！点击左侧我的保存查看', {
						icon: 1,
						time: 1000
					});
					if($(".wxid").is(":checked")){
						var index = layer.msg('同步中...', {
							icon: 16,
							shade: 0.01,
							time:200000
						});
						$.post("/synch/tb/", {
								idstr: val['aid'],
								wxid : wxids,
								vid  : val['vid'],
							}, function(val) {
								layer.close(index);
								if(val["state"]=='1'){
									layer.open({
										type: 2,
										title: '同步成功,查看链接',
										shadeClose: true,
										shade: 0,
										area: ['400px', '400px'],
										content: "/synch/weixin/t/1/media_id/"+val.media_id+"/wxid/"+val.wxid,
									}); 
								}else if(val["state"]=='-1'){
									layer.alert('<strong>'+val.title+'</strong>同步出错<br/>'+val["errmsg"]);
								}else if(val["state"]=='-2'){
									layer.alert('<strong>'+val.title+'</strong>封面图出错<br/>'+val["errmsg"]);
								}else{
									layer.alert('同步出错,未知原因');
								}
							}
						);
					}else if (val["sta"] == "") {
						layer.msg('文章保存失败！！');
						return;
					}
				
				}
			});
        
    }
	});

});


$(".closemt").click(function() {
 $(".meitubox").hide();
    $('body').css({
        overflow: 'inherit'
    });
});
function saveMaterial(content) {
    $.post("/index/addsave", {
        type: 1,
        content: content
    }, function(data) {
        if (data.res == "-1") {
            layer.msg('已超出VIP授权数量!', {
                icon: 1,
                time: 1000
            });
            return false;
        } else {
            if (data.res == 0) {
                layer.msg('素材已保存成功！');
            } else {
                layer.msg('素材保存失败！');
            }
        }
    }, 'JSON');
}

/*美图*/
var xiuxiuUrl = 'http://' + window.location.host;
/*美图上传*/
function setXiuxiu(a) {
	var base64;
	$.post('/c/meitu/', {
		url: a,
	}, function(e) {
		if(e.sta=='0'){
			layer.msg('您未登录!');
			$(".meitubox").hide();
			$('body').css({
				overflow: 'inherit'
			});
			return;
		}
		if(e.sta=='-1'){
			layer.msg('格式不支持!');
			$(".meitubox").hide();
			$('body').css({
				overflow: 'inherit'
			});
			return;
		}if(e.sta=='1'){
			$('#showXiuxiu_box').show();
			xiuxiu.embedSWF("showXiuxiu", 1, "100%", "100%");
			$('body').css({overflow: 'hidden'});
			xiuxiu.setUploadURL( xiuxiuUrl +"/upload/wximage");
			xiuxiu.onInit = function (){
				base64=e.str;
				xiuxiu.loadPhoto(base64,true);
			}	
			xiuxiu.onUploadResponse = function(data) {
				$('.meitubox').hide(); //弹窗关闭
				$('body').css({overflow: 'inherit'}); //body恢复滚动
				data = JSON.parse(data); // 返回值
				//图片插入编辑框
				var editor = UE.getEditor('container', {});
				editor.execCommand('insertimage', {
					 src:data.url,
				 });
			}
		}
	}); 
    
}
function upload_meitu(){
	$('#meitu_box').show();
	xiuxiu.embedSWF("meitu_id_3", 3, "100%", "100%");
	$('body').css({overflow: 'hidden'});
	xiuxiu.setUploadURL( xiuxiuUrl +"/upload/wximage");	
	xiuxiu.onUploadResponse = function(data) {
		$('.meitubox').hide(); //弹窗关闭
		$('body').css({overflow: 'inherit'}); //body恢复滚动
		data = JSON.parse(data); // 返回值
		if(data.state=='SUCCESS'){
			//图片插入编辑框
			var editor = UE.getEditor('container', {});
			editor.execCommand('insertimage', {
				 src:data.url,
			 });
		}else{
			layer.msg(data.state);
		}
	}
}
function showXiuxiu() {
    $('#showXiuxiu_box').show();
    xiuxiu.embedSWF("showXiuxiu", 1, "100%", "100%");
    showXiuxiuDo();
}
/*简易拼图*/
function showMosaic() {
    $('#showMosaic_box').show();
    xiuxiu.embedSWF("showMosaic", 2, "100%", "100%");
    showXiuxiuDo();
}
/*上传成功后操作*/
function showXiuxiuDo() {
    $('body').css({overflow: 'hidden'});
    xiuxiu.setUploadURL( xiuxiuUrl +"/upload/wximage");
    xiuxiu.onUploadResponse = function(data) {
        $('.meitubox').hide(); //弹窗关闭
        $('body').css({overflow: 'inherit'}); //body恢复滚动
        data = JSON.parse(data); // 返回值
        //刷新图片列表
        picPost();
        //图片插入编辑框
        var editorXiuxiu = UE.getEditor('container', {});
        editorXiuxiu.focus();
        editorXiuxiu.execCommand('inserthtml', '<section class="editor"><img src="' + data.url + ' "></section>');
    }
}

/*关闭美图弹窗*/
xiuxiu._close = function() {
    $(".meitubox").hide();
    $('body').css({
        overflow: 'inherit'
    });
}

/*图表设计*/
function showChuangke(){
    chuangkitComplate = function(eve){
        $.post('/upload/wximage/',{url:eve.data},function(ret){
            //刷新图片列表
            $('.tab-wrap dl.active dd.active').click();
            //图片插入编辑框
            var editorXiuxiu = UE.getEditor('container', {});
            editorXiuxiu.focus();
            editorXiuxiu.execCommand('inserthtml', ret.url);
        },'JSON');
    };
}

function upload_ckt(s){
	(function(d,s,a){var w=d.createElement(s),s=d.getElementsByTagName(s)[0];w.src=a;s.parentNode.insertBefore(w,s);})(document,'script','https://www.chuangkit.com/api/v1.js');
	var chuangkeBtn = $('.ckt_box[do="showckt"]');
    chuangkeBtn.attr('id','chuangkit-design-button');
    chuangkeBtn.attr('data-kind',s);
    chuangkeBtn.attr('data-definition','hd');
    chuangkeBtn.attr('data-title','false');
	chuangkeBtn.attr('data-change','true');
    chuangkeBtn.attr('data-access','e406d9cdf6ed42e38ec8a9a3d7026685');
    chuangkeBtn.attr('data-imgkind','2');
	
	chuangkeBtn.click();
	chuangkitComplate = function(eve){
		console.log(eve);
		$.post('/upload/wximage/',{url:eve.data},function(ret){
			//图片插入编辑框
			var editor_ckt = UE.getEditor('container', {});
			editor_ckt.execCommand('insertimage', {
				 src:ret.url,
			 });
		},'JSON');
    };
}
/*普通上传图片*/
function showUpload() {
    UE.getEditor('container').getDialog("insertimage").open();
    //监听上传成功刷新图片列表
    UE.getEditor('container').addListener('beforeInsertImage',function(){
        picPost();
    });   
}
//刷新图片列表
function picPost(){
    $.post('/index/my/', {
        Tid: 'my',
        type: '4'
    }, function(data) {
        if ($('.con-pic-list').length != '0') {
            $("#choice").html(data);
        }
        
    });
}
   var clouds;
function cloud(){
	setTimeout("cloud()",300000);
	var content=UE.getEditor('container').getContent();
	content=content.replace(' selected','');
	var wechat = getCookie('wechat');
	if(clouds!=content && content.length>60){
		$.ajax({  
			type:'post',  
			url : 'http://wechat.96weixin.com/cloud/',  
			dataType : 'json', 	
			data:{
				wechat  : wechat,
				content : content,
			},  
			success  : function(e) {  
				if(e['sta']== 1) {clouds=content;layer.tips('缓存成功', '._cloud');}
				if(e['sta']==-1) { layer.msg('失败');}
				if(e['sta']==-2) { layer.msg('未知');}
			},  
			error : function() {  
				 layer.msg('失败!'); 
			}  
		});
	}
}
function getCookie(name){
	var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
	if(arr=document.cookie.match(reg))
	return unescape(arr[2]);
	else
	return null;
}
window.layermsg = function(outer) {
	layer.msg("内容已经复制,试试Ctrl+V粘贴",{icon:1})
}

window.getSelectionHtml = function(outer){
	
	var range = editor.selection.getRange();
	if(range.startContainer.tagName=='BODY' && range.startContainer === range.endContainer && range.endOffset > 0 && range.endOffset === range.startContainer.childNodes.length){
		return getEditorHtml(outer);
	}else{
		range.select();
		var selectionObj = editor.selection.getNative();
		var rangeObj = selectionObj.getRangeAt(0);
		var docFragment = rangeObj.cloneContents();
		var testDiv = document.createElement("div");
		testDiv.appendChild(docFragment);
		var selectHtml = testDiv.innerHTML;
		if(selectHtml==""){
			return "";
		}else{
			return parseEditorHtml(selectHtml);
		}
	}
}
var getEditorHtml = function(outer) {
	
	$(editor.selection.document).find('p').each(function(){
		if($.trim(strip_tags($(this).html()))=="&nbsp;"){
			$(this).html('<br/>');
		}else if($.trim( strip_tags($(this).html()))==""){
			if($(this).find('img,audio,iframe,mpvoice,video').size() > 0){
				return;
			}
			if($(this).find('br').size() > 0) {
				$(this).html('<br/>');
			}else{
				if(!this.style.clear) $(this).remove();
			}
		}
	});
	
	var copyEditor = $(document.getElementById('ueditor_1').contentWindow.document.body).clone();
	var html = copyEditor.html().replace(/http:\/\/newcdn.96weixin.com\/c\//g,'https://').replace("selected", "");
	return $.trim(html);
}
var strip_tags = function(input,allowed){
	allowed = (((allowed||'')+'').toLowerCase().match(/<[a-z][a-z0-9]*>/g)||[]).join('');
	var tags = /<\/?([a-z][a-z0-9]*)\b[^>]*>/gi,commentsAndPhpTags = /<!--[\s\S]*?-->|<\?(?:php)?[\s\S]*?\?>/gi;
	return input.replace(commentsAndPhpTags,'').replace(tags,function($0,$1){return allowed.indexOf('<'+$1.toLowerCase()+'>')>-1?$0:'';});
}
var parseEditorHtml = function(html, outer_falg) {
	var htmlObj = $('<div>' + html + ' </div>');
	htmlObj.find('*').each(function() {
		if (this.style.transform) {
			setElementTransform(this, this.style.transform);
			return;
		}
		if (this.tagName == "SECTION") {
			var style = $(this).attr('style');
			if (style) {
				style = style.toLowerCase();
				if (style.indexOf('box-sizing') >= 0) {
					return;
				} else if (style.indexOf('padding') >= 0 || style.indexOf('border') >= 0) {
					$(this).css('box-sizing', 'border-box');
				}
			}
		} else if (this.tagName == "IMG" || this.tagName == "BR" || this.tagName == "TSPAN" || this.tagName == "TEXT" || this.tagName == "IMAGE") {
			return;
		} else if (this.tagName == "STRONG" || this.tagName == "SPAN" || this.tagName == "B" || this.tagName == "EM" || this.tagName == "I") {
			return;
		} else if (this.tagName == "P") {
			return;
		} else if (this.tagName == "H1" || this.tagName == "H2" || this.tagName == "H3" || this.tagName == "H4" || this.tagName == "H5" || this.tagName == "H6") {
			$(this).css('font-weight', 'bold');
			if (!this.style.fontSize) $(this).css({'font-size':'16px'});
			if (!this.style.lineHeight) $(this).css({'lineHeight':'1.6em'});
			return;
		} else if (this.tagName == "OL" || this.tagName == "UL" || this.tagName == "DL") {
			$(this).css({'margin': '0px','padding': '0 0 0 30px'});
			return;
		}
		if ((this.tagName == "TD" || this.tagName == "TH") && this.style.padding == "" && this.style.paddingLeft == "" && this.style.paddingRight == "" && this.style.paddingTop == "" && this.style.paddingBottom == "") $(this).css({'margin':'5px 10px'});
	});
	var html = $.trim(htmlObj.html());
	return html;
}
var setElementTransform = function(dom, transform) {
	if (transform == "none") return;
	var sty = $(dom).attr('style');
	sty = sty.replace('transform:', 'transform :');
	sty = sty.replace(/;\s*transform\s*:[A-Za-z0-9_%,.\-\(\)\s]*;/gim, ';');
	sty = sty.replace(/\s*\-[a-z]+\-transform\s*:[A-Za-z0-9_%,.\-\(\)\s]*;/gim, '');
	sty = sty.replace(/transform\s*:[A-Za-z0-9_%,.\-\(\)\s]*;/gim, '');
	sty = sty + ';transform: ' + transform + ';-webkit-transform: ' + transform + ';-moz-transform: ' + transform + ';-ms-transform: ' + transform + ';-o-transform: ' + transform + ';';
	$(dom).attr('style', sty.replace(';;', ';'));
}

