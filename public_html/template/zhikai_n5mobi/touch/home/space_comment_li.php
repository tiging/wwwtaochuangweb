<?php echo '';exit;?>
<a name="comment_anchor_$value[cid]"></a>
<!--{if empty($ajax_edit)}--><dl id="comment_$value[cid]_li" class="bbda cl"><!--{/if}-->
	<!--{if $value[author]}-->
	<dd class="m avt z"><a href="home.php?mod=space&uid=$value[authorid]" c="1"><!--{avatar($value[authorid],small)}--></a></dd>
	<!--{else}-->
	<dd class="m avt z"><img src="{STATICURL}image/magic/hidden.gif" alt="hidden" /></dd>
	<!--{/if}-->
	<dt>
		<!--{if $value[author]}-->
		<a href="home.php?mod=space&uid=$value[authorid]" id="author_$value[cid]">{$value[author]}</a>
		<!--{else}-->
		$_G[setting][anonymoustext]
		<!--{/if}-->
		<span class="xg1 xw0"><!--{date($value[dateline])}--></span>
		<!--{if $value[status] == 1}--><b>({lang moderate_need})</b><!--{/if}-->
	</dt>

	<dd id="comment_$value[cid]"{if $value[magicflicker]} class="magicflicker"{/if}><!--{if $value[status] == 0 || $value[authorid] == $_G[uid] || $_G[adminid] == 1}-->$value[message]<!--{else}--> {lang moderate_not_validate} <!--{/if}--></dd>
	<!--{hook/global_comment_bottom}-->

<!--{if empty($ajax_edit)}--></dl><!--{/if}-->