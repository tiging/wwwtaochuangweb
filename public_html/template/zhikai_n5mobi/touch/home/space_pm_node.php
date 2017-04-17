<?php echo '';exit;?>
<!--{if $value[msgfromid] != $_G['uid']}-->
<div class="friend_msg cl">
	<div class="avat z"><a href="home.php?mod=space&uid=$value[msgfromid]&do=profile&view=me&mobile=2"><img style="height:50px;width:50px;" src="<!--{avatar($value[msgfromid], small, true)}-->" /></a></div>
	<div class="dialog_green z">
		<div class="dialog_c">
			<div class="dialog_t">$value[message]</div>
		</div>
		<div class="dialog_b"></div>
		<div class="date"><!--{date($value[dateline], 'u')}--></div>
	</div>
</div>
<!--{else}-->
<div class="self_msg cl">
	<div class="avat y"><img style="height:50px;width:50px;" src="<!--{avatar($value[msgfromid], small, true)}-->" /></div>
	<div class="dialog_white y">			
		<div class="dialog_c">
			<div class="dialog_t">$value[message]</div>
		</div>
		<div class="dialog_b"></div>
		<div class="date"><!--{date($value[dateline], 'u')}--></div>
	</div>
</div>

<!--{/if}-->
