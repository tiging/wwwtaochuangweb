<?php echo '';exit;?>
<!--{if $thread['freemessage']}-->
	<div id="postmessage_$pid" class="t_f">$thread[freemessage]</div>
<!--{/if}-->
<!--{if empty($_GET['archiver'])}-->
	<div class="locked">
			<em class="right">
				<!--{if $thread[payers]}-->{lang have} $thread[payers] {lang people_buy}&nbsp; <!--{/if}-->
			</em>
			<!--{if $_G[forum_thread][price] > 0}-->{lang pay_comment}<!--{/if}-->
			<!--{if $thread[endtime]}--><br />{lang pay_free_time}<!--{/if}-->
			<br /><br />ÈçĞè¹ºÂòÇëÇĞ»»ÖÁµçÄÔ°æ¹ºÂò
		</div>
	</div>
<!--{else}-->
	<!--{if $thread[payers]}-->{lang have} $thread[payers] {lang people_buy}&nbsp; <!--{/if}-->
	<!--{if $_G[forum_thread][price] > 0}-->{lang pay_comment}<!--{/if}-->
	<!--{if $thread[endtime]}--><br />{lang pay_free_time}<!--{/if}-->
<!--{/if}-->