<?php echo '';exit;?>
	<div class="n5_ztxszt">{lang thread_reward}<strong> <span class="xi1 xs3">$rewardprice</span> </strong>{$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][2]][unit]}{$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][2]][title]} {if $_G['forum_thread']['price'] > 0}<span class="xi1">{lang unresolved}</span>{elseif $_G['forum_thread']['price'] < 0}<span class="xg1">{lang resolved}</span>{/if}</div>
	<div id="postmessage_$post[pid]" class="postmessage">$post[message]</div>


<!--{if $post['attachment']}-->
	<div class="warning">{lang attachment}: <em><!--{if $_G['uid']}-->{lang attach_nopermission}<!--{else}-->{lang attach_nopermission_login}<!--{/if}--></em></div>
<!--{elseif $post['imagelist'] || $post['attachlist']}-->
    <!--{if $post['imagelist']}-->
         {echo showattach($post, 1)}
    <!--{/if}-->
    <!--{if $post['attachlist']}-->
         {echo showattach($post)}
    <!--{/if}-->
<!--{/if}-->
<!--{eval $post['attachment'] = $post['imagelist'] = $post['attachlist'] = '';}-->

<!--{if $bestpost}-->
	<div class="rwdbst n5_ztxszj cl">
		<h3 class="psth">{lang reward_bestanswer}</h3>
		<div class="pstl cl">
			<div class="psta">$bestpost[avatar]</div>
			<div class="psti">
				<p class="xi2"><a href="home.php?mod=space&uid=$bestpost[authorid]" class="xw1">$bestpost[author]</a></p>
				<div>$bestpost[message]</div>
			</div>
		</div>
	</div>
<!--{/if}-->