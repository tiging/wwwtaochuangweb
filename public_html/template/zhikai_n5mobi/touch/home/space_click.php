<?php echo '';exit;?>
<table cellpadding="0" cellspacing="0" class="atd">
	<tr>
	<!--{eval $clicknum = 0;}-->
	<!--{loop $clicks $key $value}-->
	<!--{eval $clicknum = $clicknum + $value['clicknum'];}-->
	<!--{eval $value['height'] = $maxclicknum?intval($value['clicknum']*50/$maxclicknum):0;}-->
		<td>
			<a href="home.php?mod=spacecp&ac=click&op=add&clickid=$key&idtype=$idtype&id=$id&hash=$hash&handlekey=clickhandle" id="click_{$idtype}_{$id}_{$key}" onclick="{if $_G[uid]}ajaxmenu(this);{else}showWindow(this.id, this.href);{/if}doane(event);">
				<!--{if $value[clicknum]}-->
				<div class="atdc">
					<div class="ac{$value[classid]}" style="height:{$value[height]}px;"></div>
				</div>
				<!--{/if}-->
				<img src="{STATICURL}image/click/$value[icon]" alt="" /><br />$value[name]
			</a>
		</td>
	<!--{/loop}-->
	</tr>
</table>
<script type="text/javascript">
	function errorhandle_clickhandle(message, values) {
		if(values['id']) {
			showCreditPrompt();
			show_click(values['idtype'], values['id'], values['clickid']);
		}
	}
</script>

<!--{if $click_multi}--><div class="pgs cl mtm">$click_multi</div><!--{/if}-->