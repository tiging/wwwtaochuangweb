<?php echo '';exit;?>
<!--{template common/header}-->
<div class="n5_tbys cl">
    <a href="javascript:void(0);" onclick="return window.history.go(-1);" class="fhan">����</a>
	<span class="dqym">{lang shield_notice}</span>
</div>

<div class="n5_tbxj"></div>
<!--{if !$_G[inajax]}-->

<div id="ct" class="n5_grkjtzz wp cl">
		<div class="mn">
			<div class="bm bw0">
<!--{/if}-->

<!--{if $_GET['op'] == 'ignore'}-->

	<form method="post" autocomplete="off" id="ignoreform_{$formid}" name="ignoreform_{$formid}" action="home.php?mod=spacecp&ac=common&op=ignore&type=$type" {if $_G[inajax]}onsubmit="ajaxpost(this.id, 'return_$_GET[handlekey]');"{/if}>
		<!--{if $_G[inajax]}--><input type="hidden" name="handlekey" value="$_GET[handlekey]" /><!--{/if}-->
		<input type="hidden" name="ignoresubmit" value="true" />
		<input type="hidden" name="formhash" value="{FORMHASH}" />
		<input type="hidden" name="referer" value="{echo dreferer()}">
		<div class="c altw">
			<p>{lang no_view_notice_next}</p>
			<p class="ptn"><label><input type="radio" name="authorid" id="authorid1" value="$_GET[authorid]" checked="checked" />{lang shield_this_friend}</label></p>
			<p class="ptn"><label><input type="radio" name="authorid" id="authorid0" value="0" />{lang shield_all_friend}</label></p>
		</div>
		<p class="o pns">
			<button type="submit" name="feedignoresubmit" value="true" class="pn pnc"><strong>{lang determine}</strong></button>
		</p>
	</form>

<!--{elseif $_GET['op'] == 'getuserapp'}-->

	<!--{loop $my_userapp $value}-->
	<!--{if $value['allowsidenav']}-->
	<li><!--{if $value[appstatus]}--><span class="{if $value[appstatus]==1}appnew{else}apphot{/if}"></span><!--{/if}--><a href="userapp.php?mod=app&id=$value[appid]"><img {if $value[icon]}src="$value[icon]" onerror="this.onerror=null;this.src='http://appicon.manyou.com/icons/$value[appid]'"{else} src="http://appicon.manyou.com/icons/$value[appid]"{/if}>$value[appname]</a></li>
	<!--{/if}-->
	<!--{/loop}-->
<!--{elseif $_GET['op']=='modifyunitprice'}-->

	<h3 class="flb">
		<em id="return_$_GET[handlekey]">{lang modify_unitprice}</em>
		<!--{if $_G[inajax]}--><span><a href="javascript:;" onclick="hideWindow('$_GET[handlekey]');" class="flbc" title="{lang close}">{lang close}</a></span><!--{/if}-->
	</h3>
	<form method="post" autocomplete="off" id="ignoreform_{$formid}" name="ignoreform_{$formid}" action="home.php?mod=spacecp&ac=common&op=modifyunitprice" {if $_G[inajax]}onsubmit="ajaxpost(this.id, 'return_$_GET[handlekey]');"{/if}>
		<!--{if $_G[inajax]}--><input type="hidden" name="handlekey" value="$_GET[handlekey]" /><!--{/if}-->
		<input type="hidden" name="modifysubmit" value="true" />
		<input type="hidden" name="formhash" value="{FORMHASH}" />
		<input type="hidden" name="referer" value="{echo dreferer()}">
		<div class="c altw">
			<p>{lang modify_unitprice_note}</p>
			<p class="ptn"><label>{lang bid_single_price}: <input type="text" name="unitprice" class="px" value="$showinfo[unitprice]" /></label></p>
		</div>
		<p class="o pns">
			<button type="submit" name="unitpriceysubmit" value="true" class="pn pnc"><strong>{lang determine}</strong></button>
		</p>
	</form>
	<script type="text/javascript">
		function succeedhandle_$_GET['handlekey'] (url, message, values) {
			var priceObj = $('show_unitprice');
			if(priceObj) {
				priceObj.innerHTML = values['unitprice'];
			}

		}
	</script>
<!--{/if}-->

<!--{if !$_G[inajax]}-->
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
	<a href="portal.php?mod=index" class="bottom_index">�۽�</a>
	<a href="forum.php?mod=guide&view=hot" class="bottom_history">����</a>
	<a onClick="toshare()" class="bottom_tansuo"><span></span></a>
	<a href="forum.php?mod=misc&action=nav" class="bottom_post">����</a>
	<a href="<!--{if $_G[uid]}-->home.php?mod=space&uid=$_G[uid]&do=profile&mycenter=1<!--{else}-->member.php?mod=logging&action=login<!--{/if}-->" class="bottom_member_on">�ҵ�<!--{if $_G[member][newprompt]}--><i>&nbsp;</i><!--{/if}--></a>
</div>
<div class="n5_dbcdy"></div>
<div class="n5_dbtstc">
    <!--{template common/n5_ts}-->
</div>
<div class="n5_ssymdb">
</div>
<!--{eval $nofooter = true;}-->
<!--{template common/footer}-->