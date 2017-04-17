<?php echo '';exit;?>
<a name="comment_anchor_$comment[cid]"></a>
<dl id="comment_{$comment[cid]}_li" class="n5_pllb">
	<dt class="mbm">
	<!--{if !empty($comment['uid'])}-->
		<a href="home.php?mod=space&uid=$comment[uid]&do=profile&view=me&mobile=2" class="xi2 xw1" c="1">$comment[username]</a>
	<!--{else}-->
		{lang guest}
	<!--{/if}-->
		<span class="xg1 xw0"><!--{date($comment[dateline])}--></span>
	<!--{if $comment[status] == 1}--><b>({lang moderate_need})</b><!--{/if}-->
	</dt>
	<dd><!--{if $_G[adminid] == 1 || $comment[uid] == $_G[uid] || $comment[status] != 1}-->$comment[message]<!--{else}--> {lang moderate_not_validate}<!--{/if}--></dd>
</dl>