<?php echo '';exit;?>
<!--{template common/header}-->
<div class="n5_tbys cl">
    <a href="javascript:void(0);" onclick="return window.history.go(-1);" class="fhan">返回</a>
	<span class="dqym">版块加密</span>
</div>
<div class="n5_tbxj"></div>
<style type="text/css">
.bg {background: #fff;}
.n5_hyysmm {margin: 40px 0;padding:70px 20px;}
.n5_hyysmm .srmmtsy {font-size: 16px;}
.n5_hyysmm .srmmsrk {margin-top: 15px;}
.n5_hyysmm .srmmsrk .px {height: 30px;width: 50%;}
.n5_hyysmm .srmmsrk .pn {height: 37px;border: 0;font-size: 14px;}
</style>


<div id="ct" class="n5_hyysmm">
	<div class="mn">
		<div class="nfl">
			<div class="f_c">
				<span class="srmmtsy">这个版块需要输入密码后才可以访问</span>
				<div class="srmmsrk">
					<form method="post" autocomplete="off" action="forum.php?mod=forumdisplay&fid=$_G[fid]&action=pwverify">
						<input type="hidden" name="formhash" value="{FORMHASH}" />
						<input type="password" name="pw" class="px vm" size="25" />
						&nbsp;<button class="pn pnc vm" type="submit" name="loginsubmit" value="true">{lang submit}</button>
					</form>
				</div>
			</div>
		</div>
	</div>
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
	<a href="forum.php?mod=guide&view=hot" class="bottom_history_on">话题</a>
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