<?php echo '';exit;?>
<!--{template common/header}-->
<div class="n5_tbys cl">
    <a href="javascript:void(0);" onclick="return window.history.go(-1);" class="fhan">返回</a>
	<span class="dqym">输入密码</span>
</div>
<div class="n5_tbxj"></div>

<div class="n5_hyysmm">
			<form method="post" autocomplete="off"  id="invalueform" name="invalueform" action="home.php?mod=misc&ac=inputpwd" {if $_G[inajax]}onsubmit="ajaxpost(this.id, 'return_$_GET[handlekey]');"{/if}>
				<!--{if $_G[inajax]}--><input type="hidden" name="handlekey" value="$_GET[handlekey]" /><!--{/if}-->
				<input type="hidden" name="refer" value="$_SERVER[REQUEST_URI]" />
				<input type="hidden" name="blogid" value="$invalue[blogid]" />
				<input type="hidden" name="albumid" value="$invalue[albumid]" />
				<input type="hidden" name="pwdsubmit" value="true" />
				<input type="hidden" name="formhash" value="{FORMHASH}" />
				<div class="c mbn">
					{lang enter_password} <br />
					<input type="password" name="viewpwd" value="" class="px mtn" />
				</div>
				<p class="o pns">
					<button type="submit" name="submit" value="true" class="pn pnc"><strong>{lang submit}</strong></button>
				</p>
			</form>
			<!--{if $_G[inajax]}-->
			<script type="text/javascript">
				function succeedhandle_$_GET[handlekey](url, msg, values) {
					if(values['succeed'] == 1) {
						window.location.href = url;
					}
				}
			</script>
			<!--{/if}-->
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