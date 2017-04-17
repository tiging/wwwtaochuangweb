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
<title><!--{if !empty($navtitle)}-->$space[username]的二维码 - <!--{/if}--><!--{if empty($nobbname)}--> $_G['setting']['bbname'] - <!--{/if}--> {lang waptitle} - Powered by Discuz!</title>
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
.bg {background: #4b5053;}
</style>

<div class="n5_tbys cl">
    <a href="javascript:void(0);" onclick="return window.history.go(-1);" class="fhan">返回</a>
	<span class="dqym">TA的二维码</span>
</div>
<div class="n5_tbxj"></div>

<div class="n5_wdewm cl">
    <div class="ewmyh cl">
	    <div class="ewmtx cl"><!--{avatar($space[uid],middle)}--></div>
		<div class="ewmmc cl">$space[username]<p>扫扫二维码，查看我的主页</p></div>
	</div>
	<div class="wemtp cl"><img src="http://qr.liantu.com/api.php?w=800&m=0&el=q&text=$_G['setting'][siteurl]/home.php?mod=space%26uid=$space[uid]%26do=profile%26view=me%26mobile=2"></div>
</div>

<!--{eval $nofooter = true;}-->
<!--{template common/footer}-->