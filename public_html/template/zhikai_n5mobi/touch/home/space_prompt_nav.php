<?php echo '';exit;?>
	<ul>
		<!--{loop $_G['notice_structure'] $key $type}-->
		<li $opactives[$key]><em class="notice_$key"></em><a href="home.php?mod=space&do=notice&view=$key"><!--{eval echo lang('template', 'notice_'.$key)}--><!--{if $_G['member']['category_num'][$key]}--><i>($_G['member']['category_num'][$key])</i><!--{/if}--></a></li>
		<!--{/loop}-->
		<!--{if $_G['setting']['my_app_status']}-->
		<li$actives[userapp]><em class="notice_userapp"></em><a href="home.php?mod=space&do=notice&view=userapp">{lang applications_news}{if $mynotice}($mynotice){/if}</a></li>
		<!--{/if}-->
	</ul>