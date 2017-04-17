<?php echo '';exit;?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Cache-control" content="{if $_G['setting']['mobile'][mobilecachetime] > 0}{$_G['setting']['mobile'][mobilecachetime]}{else}no-cache{/if}" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
<meta name="format-detection" content="telephone=no" />
<meta name="keywords" content="{if !empty($metakeywords)}{echo dhtmlspecialchars($metakeywords)}{/if}" />
<meta name="description" content="{if !empty($metadescription)}{echo dhtmlspecialchars($metadescription)} {/if},$_G['setting']['bbname']" />
<meta name="wap-font-scale" content="no">
<meta name="full-screen" content="yes" />
<meta name="x5-fullscreen" content="true">
<title><!--{if !empty($navtitle)}-->关于我们 - <!--{/if}--><!--{if empty($nobbname)}--> $_G['setting']['bbname'] - <!--{/if}--> {lang waptitle} - Powered by Discuz!</title>
<link rel="stylesheet" href="{STATICURL}image/mobile/style.css" type="text/css" media="all">
<script src="{STATICURL}js/mobile/jquery-1.8.3.min.js?{VERHASH}"></script>
<script type="text/javascript">var STYLEID = '{STYLEID}', STATICURL = '{STATICURL}', IMGDIR = '{IMGDIR}', VERHASH = '{VERHASH}', charset = '{CHARSET}', discuz_uid = '$_G[uid]', cookiepre = '{$_G[config][cookie][cookiepre]}', cookiedomain = '{$_G[config][cookie][cookiedomain]}', cookiepath = '{$_G[config][cookie][cookiepath]}', showusercard = '{$_G[setting][showusercard]}', attackevasive = '{$_G[config][security][attackevasive]}', disallowfloat = '{$_G[setting][disallowfloat]}', creditnotice = '<!--{if $_G['setting']['creditnotice']}-->$_G['setting']['creditnames']<!--{/if}-->', defaultstyle = '$_G[style][defaultextstyle]', REPORTURL = '$_G[currenturl_encode]', SITEURL = '$_G[siteurl]', JSPATH = '$_G[setting][jspath]';</script>
<script src="template/zhikai_n5mobi/touch/style/js/TouchSlide.1.1.source.js"></script>
<script src="template/zhikai_n5mobi/touch/style/js/mobi.js?{VERHASH}" charset="{CHARSET}"></script>
<link href="template/zhikai_n5mobi/touch/style/n5mobi.css" type="text/css" rel="stylesheet">
<!--{csstemplate}-->
</head>

<body class="bg">
<div id="upfile"></div>
<!--{hook/global_header_mobile}-->
<style type="text/css">
.n5_tbys {background: rgba(0,0,0,0.1);}
</style>
<div class="n5_gywmtb">
    <div class="n5_tbys cl">
	    <a href="javascript:void(0);" onclick="return window.history.go(-1);" class="fhan">返回</a>
	    <span class="dqym">关于我们</span>
    </div>
	<div class="n5_wmlogo">
	    <img src="$_G['style']['logo地址']" alt="$_G['setting']['sitename']" width="50%">
	</div>
</div>

<div class="n5_gywmxm">
    <ul>
	    <li><a class="n5_gywmwx"><i>$_G['style']['微信公众号']</i>微信公众号</a></li>
		<li><a href="http://wpa.qq.com/msgrd?V=3&Uin=$_G['setting']['site_qq']&Site=$_G['setting']['bbname']&Menu=yes&from=discuz" target="_blank" class="n5_gywmqq"><i>$_G['setting']['site_qq']</i>客服QQ</a></li>
		<li><a href="mailto:$_G['style']['客服邮箱']" class="n5_gywmyx"><i>$_G['style']['客服邮箱']</i>客服邮箱</a></li>
		<li><a href="tel:$_G['style']['客服电话']" class="n5_gywmdh"><i>$_G['style']['客服电话']</i>客服电话</a></li>
		<li><a class="n5_gywmsj"><i>$_G['style']['工作时间']</i>工作时间</a></li>
		<li class="wdwdx"><a class="n5_gywmdz"><i>$_G['style']['公司地址']</i>公司地址</a></li>
	</ul>
</div>

<div class="n5_gywmxm">
    <ul>
		<li class="wdwdx"><a class="n5_gywmbb"><i>4.0</i>当前版本</a></li>
	</ul>
</div>

<script type="text/javascript">
	function toshare(){
		$(".n5_dbtstc").addClass("am-modal-active");	
		if($(".sharebg").length>0){
			$(".sharebg").addClass("sharebg-active");
		}else{
			$("body").append('<div class="sharebg"></div>');
			$(".sharebg").addClass("sharebg-active");
		}
		$(".sharebg-active,.share_btn").click(function(){
			$(".n5_dbtstc").removeClass("am-modal-active");	
			setTimeout(function(){
				$(".sharebg-active").removeClass("sharebg-active");	
				$(".sharebg").remove();	
			},300);
		})
	}	
</script>
<div id="n5_dbcd">
	<a href="portal.php?mod=index" class="bottom_index">聚焦</a>
	<a href="forum.php?mod=guide&view=hot" class="bottom_history">话题</a>
	<a onClick="toshare()" class="bottom_tansuo"><span></span></a>
	<a href="forum.php?mod=misc&action=nav" class="bottom_post">发布</a>
	<a href="<!--{if $_G[uid]}-->home.php?mod=space&uid=$_G[uid]&do=profile&mycenter=1<!--{else}-->member.php?mod=logging&action=login<!--{/if}-->" class="bottom_member_on">我的<!--{if $_G[member][newprompt]}--><i>&nbsp;</i><!--{/if}--></a>
</div>
<div class="n5_dbcdy"></div>
<div class="n5_dbtstc">
    <!--{template common/n5_ts}-->
</div>
<div class="n5_ssymdb">
</div>
<!--{eval $nofooter = true;}-->
<!--{template common/footer}-->