<?php echo '';exit;?>
<!--{template common/header}-->
<script src="template/zhikai_n5mobi/touch/style/js/TouchSlide.1.1.source.js"></script>
<div class="n5_tbys cl">
    <a href="javascript:void(0);" onclick="return window.history.go(-1);" class="fhan">返回</a>
	<span class="dqym">群组</span>
	<a href="forum.php?mod=group&action=create" class="cjqz">创建</a>
</div>
<div class="n5_tbxj"></div>
<!--{hook/global_qunzu_top_mobile}-->

<div class="n5_blsskk cl">
<form class="blssys" method="post" autocomplete="off" action="search.php?mod=group" onsubmit="if($('scform_srchtxt')) searchFocus($('scform_srchtxt'));">
		<input type="hidden" name="formhash" value="{FORMHASH}" />
		<input type="hidden" name="srchfid" value="$srchfid" />
		<!--{template search/pubsearch}-->
		<!--{hook/group_top}-->
</form>
</div>

<style>
#owl-demo { width: 100%; margin-left: auto; margin-right: auto;}
#owl-demo .item{ display: block;}
#owl-demo img { display: block; width: 100%;}
</style>
<link href="template/zhikai_n5mobi/touch/style/css/owl.carousel.css" rel="stylesheet">
<link href="template/zhikai_n5mobi/touch/style/css/owl.theme.css" rel="stylesheet">
<script src="template/zhikai_n5mobi/touch/style/js/jquery-1.8.3.min.js"></script>
<script src="template/zhikai_n5mobi/touch/style/js/owl.carousel.js"></script>
<script>
$(function(){
	$('#owl-demo').owlCarousel({
		items: 1,
		autoPlay: 3000,
		autoHeight: true,
		transitionStyle: 'fade'
	});
});
</script>
<div id="owl-demo" class="owl-carousel">
	<a href="$_G['style']['部落图片1链接']" class="item"><img src="$_G['style']['部落图片1']" alt=""></a>
	<a href="$_G['style']['部落图片2链接']" class="item"><img src="$_G['style']['部落图片2']" alt=""></a>
	<a href="$_G['style']['部落图片3链接']" class="item"><img src="$_G['style']['部落图片3']" alt=""></a>
	<a href="$_G['style']['部落图片4链接']" class="item"><img src="$_G['style']['部落图片4']" alt=""></a>
</div>

<div class="n5_bllbqh cl">
    <div class="n5_bllbhh">
	    <ul>
		    <li><a href="group.php?mod=index&mobile=2" class="tjyss">推荐</a></li>
			<!--{loop $first $groupid $group}-->
		    <li><a href="group.php?gid=$groupid">$group[name]</a><!--{if $group[groupnum]}--><span class="xg1">($group[groupnum])</span><!--{/if}--></li>
			<!--{/loop}-->
		</ul>
	</div>
	<div class="n5_lbhhjt">
	    <span></span>
	</div>
</div>

<div class="n5_bllbtj cl">
<!--{loop dunserialize($_G['setting']['group_recommend']) $val}-->
    <div class="n5_bllbdg cl">
	    <div class="bllbjr y cl">
		    <a href="forum.php?mod=forumdisplay&action=list&fid=$val[fid]">进入$val[name]</a>
		</div>
	    <div class="bllbtb cl">
		    <a href="forum.php?mod=forumdisplay&action=list&fid=$val[fid]"><img src="$val[icon]" alt="$val[name]" /></a>
		</div>
		<div class="bllbjs cl">
		    <h2><a href="forum.php?mod=forumdisplay&action=list&fid=$val[fid]">$val[name]</a></h2>
			<p>$val[description]</p>
		</div>
	</div>
<!--{/loop}-->
</div>
<!--{hook/global_qunzu_bottom_mobile}-->

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
	<a href="<!--{if $_G[uid]}-->home.php?mod=space&uid=$_G[uid]&do=profile&mycenter=1<!--{else}-->member.php?mod=logging&action=login<!--{/if}-->" class="bottom_member">我的<!--{if $_G[member][newprompt]}--><i>&nbsp;</i><!--{/if}--></a>
</div>
<div class="n5_dbcdy"></div>
<div class="n5_dbtstc">
    <!--{template common/n5_ts}-->
</div>
<div class="n5_ssymdb">
</div>
<!--{eval $nofooter = true;}-->
<!--{template common/footer}-->