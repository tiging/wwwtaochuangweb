<?php echo '';exit;?>
<!--{template common/header}-->
<style type="text/css">
.bg {background: #ef4d4a;}
</style>

<div class="n5_tbys cl">
    <a href="javascript:void(0);" onclick="return window.history.go(-1);" class="fhan">返回</a>
	<span class="dqym">打赏</span>
	<a href="<!--{if $_G[uid]}-->home.php?mod=spacecp&ac=credit&mobile=2<!--{else}-->member.php?mod=logging&action=login<!--{/if}-->" class="wdjf">我的积分</a>
</div>
<div class="n5_tbxj"></div>

<div class="n5_ztdshb cl">
<a href="home.php?mod=space&uid=$post[authorid]&do=profile&view=me&mobile=2"><img src="<!--{if !$post['authorid'] || $post['anonymous']}--><!--{avatar(0, small, true)}--><!--{else}--><!--{avatar($post[authorid], small, true)}--><!--{/if}-->"></a>
</div>
<!--{if $_GET[action] == 'rate'}-->
	<div class="n5_ztdstc b_p cl">
		<form id="rateform" method="post" autocomplete="off" action="forum.php?mod=misc&action=rate&ratesubmit=yes&mobile=2" onsubmit="ajaxpost('rateform', 'return_rate', 'return_rate', 'onerror');">
		<input type="hidden" name="formhash" value="{FORMHASH}" />
		<input type="hidden" name="tid" value="$_G[tid]" />
		<input type="hidden" name="pid" value="$_GET[pid]" />
		<input type="hidden" name="referer" value="$referer" />
			<table width="100%">
				<tr margin-bottom="20px">
					<th width="25%">&nbsp;</th>
					<th width="25%">&nbsp;</th>
					<th width="25%">打赏区间</th>
					<th width="25%">可用积分</th>
				</tr>
				<!--{eval $rateselfflag = 0;}-->
				<!--{loop $ratelist $id $options}-->
				<tr>
					<td style="font-size: 16px;">{$_G['setting']['extcredits'][$id][img]} {$_G['setting']['extcredits'][$id][title]}</td>
					<td><input type="text" name="score$id" id="score$id" class="px z" value="" /></td>
					<td>{$_G['group']['raterange'][$id]['min']} ~ {$_G['group']['raterange'][$id]['max']}</td>
					<!--{eval $rateselfflag = $_G['group']['raterange'][$id][isself] ? 1 : $rateselfflag;}-->
					<td>$maxratetoday[$id]</td>
				</tr>
				<!--{/loop}-->
			</table>
			<div class="n5_ztdsqd cl">
				<button name="ratesubmit" type="submit" value="true" class="button3">立即打赏</button>
			</div>
		</form>
	</div>
<!--{/if}-->
<!--{eval $nofooter = true;}-->
<!--{template common/footer}-->