<?php echo '';exit;?>
<div class="n5_tsztys cl">
	<!--{if $_GET[action] == 'newthread'}-->
		<label for="rewardprice">{lang reward_price}: </label>
		<input type="text" name="rewardprice" id="rewardprice" class="px pxs" size="6" onkeyup="getrealprice(this.value)" value="{$_G['group']['minrewardprice']}" tabindex="1" />
		<p class="mtn xg1">
			{lang reward_price_min} {$_G['group']['minrewardprice']} {$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][2]][unit]}
			<!--{if $_G['group']['maxrewardprice'] > 0}-->, {lang reward_price_max} {$_G['group']['maxrewardprice']} {$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][2]][unit]}<!--{/if}-->
			, {lang you_have} <!--{echo getuserprofile('extcredits'.$_G['setting']['creditstransextra'][2]);}--> {$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][2]][unit]}{$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][2]][title]}
		</p>
	<!--{elseif $_GET[action] == 'edit'}-->
		<!--{if $isorigauthor}-->
			<!--{if $thread['price'] > 0}-->
				<label for="rewardprice">{lang reward_price}:</label>
				<input type="text" name="rewardprice" id="rewardprice" class="px pxs" onkeyup="getrealprice(this.value)" size="6" value="$rewardprice" tabindex="1" />
				{$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][2]][title]}
				, {lang reward_tax_add} <strong id="realprice">0</strong> {$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][2]][unit]}{$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][2]][title]}
				<p class="mtn xg1">
					{lang reward_price_min} {$_G['group']['minrewardprice']} {$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][2]][unit]}
					<!--{if $_G['group']['maxrewardprice'] > 0}-->, {lang reward_price_max} {$_G['group']['maxrewardprice']} {$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][2]][unit]}<!--{/if}-->
					, {lang you_have} <!--{echo getuserprofile('extcredits'.$_G['setting']['creditstransextra'][2]);}--> {$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][2]][unit]}{$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][2]][title]}
				</p>
			<!--{else}-->
				{lang post_reward_resolved}
				<input type="hidden" name="rewardprice" value="$rewardprice" tabindex="1" />
			<!--{/if}-->
		<!--{else}-->
			<!--{if $thread['price'] > 0}-->
				{lang reward_price}: $rewardprice {$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][2]][unit]}{$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][2]][title]}
			<!--{else}-->
				{lang post_reward_resolved}
			<!--{/if}-->
		<!--{/if}-->
	<!--{/if}-->
	<!--{hook/post_reward_extra}-->
</div>