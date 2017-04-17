<?php echo '';exit;?>
<!--{template common/header}-->
<div class="n5_tbys cl">
    <a href="javascript:void(0);" onclick="return window.history.go(-1);" class="fhan">返回</a>
	<span class="dqym">标签</span>
</div>
<div class="n5_tbxj"></div>
<style type="text/css">
.bg {background: #fff;}
</style>

<!--{if $type != 'countitem'}-->
<div id="ct" class="n5_bqzty cl">
	<form method="post" action="misc.php?mod=tag" class="pns">
		<input type="text" name="name" class="px vm" size="30" />
		<button type="submit" class="pn vm">{lang search}</button>
	</form>
    <script type="text/javascript">
      $(document).ready(function() {
         var tags_a = $(".n5_bqgglb a");
         tags_a.each(function(){
             var x = 9;
             var y = 0;
             var rand = parseInt(Math.random() * (x - y + 1) + y);
             $(this).addClass("tags"+rand);
          });
      })   
    </script>
	<div class="n5_bqgglb">
		<!--{if $tagarray}-->
			<!--{loop $tagarray $tag}-->
				<a href="misc.php?mod=tag&id=$tag[tagid]">$tag[tagname]</a>
			<!--{/loop}-->
		<!--{else}-->
			<div class="n5_wnrts">{lang no_tag}</div>
		<!--{/if}-->
	</div>
</div>
<!--{else}-->
$num
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
<!--{template common/footer}-->
