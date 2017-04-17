<?php echo '';exit;?>
<!--{template common/header}-->
<style type="text/css">
.bg {background: #fff;}
</style>
<div class="n5_tbys cl">
    <a href="javascript:void(0);" onclick="return window.history.go(-1);" class="fhan">返回</a>
	<span class="dqym">购买附件</span>
</div>
<div class="n5_tbxj"></div>
<!--{if empty($_GET['infloat'])}-->
<div id="ct" class="n5_gmfjym cl">
	<div class="mn">
		<div class="bm bw0">
<!--{/if}-->

<form id="attachpayform" method="post" autocomplete="off" action="forum.php?mod=misc&action=attachpay&tid={$_G[tid]}{if !empty($_GET['infloat'])}&paysubmit=yes&infloat=yes" onsubmit="ajaxpost('attachpayform', 'return_$_GET['handlekey']', 'return_$_GET['handlekey']', 'onerror');return false;"{else}"{/if}>
	<div class="f_c">
		<input type="hidden" name="formhash" value="{FORMHASH}" />
		<input type="hidden" name="referer" value="{echo dreferer()}" />
		<input type="hidden" name="aid" value="$aid" />
		<!--{if !empty($_GET['infloat'])}--><input type="hidden" name="handlekey" value="$_GET['handlekey']" /><!--{/if}-->
		<div class="c">
			<table class="list" cellspacing="0" cellpadding="0" style="width: 400px">
				<tr>
					<td>{lang author}</td>
					<td><a href="home.php?mod=space&uid=$attach[uid]">$attach[author]</a></td>
				</tr>
				<tr>
					<td>{lang attachment}</td>
					<td><div style="overflow:hidden">$attach[filename] <!--{if $attach['description']}-->($attach[description])<!--{/if}--></div></td>
				</tr>
				<tr>
					<td>{lang price}({$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][title]})</td>
					<td>$attach[price] {$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][unit]}</td>
				</tr>
				<!--{if $status != 1}-->
				<tr>
					<td>{lang pay_author_income}({$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][title]})</td>
					<td>$attach[netprice] {$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][unit]}</td>
				</tr>
				<tr>
					<td>{lang pay_balance}({$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][title]})</td>
					<td>$balance {$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][unit]}</td>
				</tr>
				<!--{/if}-->
				<!--{if $status == 1}-->
				<tr>
					<td>&nbsp;</td>
					<td>{lang status_insufficient}</td>
				</tr>
				<!--{elseif $status == 2}-->
				<tr>
					<td>&nbsp;</td>
					<td>{lang status_download}, <a href="forum.php?mod=attachment&aid=$aidencode" target="_blank">{lang download}</a></td>
				</tr>
				<!--{/if}-->
			</table>
		</div>
		<div class="o pns">
			<!--{if $status != 1}-->
				<label><input name="buyall" type="checkbox" class="pc" value="yes" />{lang buy_all_attch}</label>
				<button class="pn pnc" type="submit" name="paysubmit" value="true"><span><!--{if $status == 0}-->{lang pay_attachment}<!--{else}-->{lang free_buy}<!--{/if}--></span></button>
			<!--{/if}-->
		</div>
	</div>
</form>

<!--{if !empty($_GET['infloat'])}-->
<script type="text/javascript" reload="1">
function succeedhandle_$_GET['handlekey'](locationhref) {
	ajaxget('forum.php?mod=viewthread&tid=$attach[tid]&viewpid=$attach[pid]', 'post_$attach[pid]');
	hideWindow('$_GET['handlekey']');
	showCreditPrompt();
}
</script>
<!--{/if}-->

<!--{if empty($_GET['infloat'])}-->
		</div>
	</div>
</div>
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