<?php echo '';exit;?>
<!--{template common/header}-->

<div class="n5_tbys cl">
    <a href="javascript:void(0);" onclick="return window.history.go(-1);" class="fhan">返回</a>
	<span class="dqym">搜索文章</span>
	<a href="search.php?mod=forum&mobile=2" class="qtqh">搜索主题</a>
</div>
<div class="n5_tbxj"></div>
<style type="text/css">
.bg {background: #fff;}
</style>

<form class="searchform n5_ssymsr" method="post" autocomplete="off" action="search.php?mod=portal&mobile=2" onsubmit="if($('scform_srchtxt')) searchFocus($('scform_srchtxt'));">
	<input type="hidden" name="formhash" value="{FORMHASH}" />
	<!--{subtemplate search/pubsearch}-->
</form>
<!--{if !empty($searchid) && submitcheck('searchsubmit', 1)}-->
<!--{subtemplate search/portal_list}-->
<!--{/if}-->

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
<!--{subtemplate common/footer}-->