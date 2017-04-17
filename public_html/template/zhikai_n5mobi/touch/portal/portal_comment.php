<?php echo '';exit;?>
<div class="n5_wzpl">
	<div class="n5_plbt cl">
        <a href="$common_url" class="y">已有$data[commentnum]人评论</a>
		<h3><a href="$common_url">查看评论</a></h3>
	</div>
	<div class="n5_plkj">
		<!--{if !$data[htmlmade]}-->
			<form id="cform" name="cform" action="$form_url" method="post" autocomplete="off">
				<div class="tedt">
					<div class="area">
						<textarea name="message" rows="3" class="pt" id="message" onkeydown="ctrlEnter(event, 'commentsubmit_btn');"></textarea>
					</div>
				</div>

				<!--{if $secqaacheck || $seccodecheck}-->
					<!--{block sectpl}--><sec> <span id="sec<hash>" onclick="showMenu(this.id);"><sec></span><div id="sec<hash>_menu" class="p_pop p_opt" style="display:none"><sec></div><!--{/block}-->
					<div class="mtm"><!--{subtemplate common/seccheck}--></div>
				<!--{/if}-->
				<!--{if !empty($topicid) }-->
					<input type="hidden" name="referer" value="$topicurl#comment" />
					<input type="hidden" name="topicid" value="$topicid">
				<!--{else}-->
					<input type="hidden" name="portal_referer" value="$viewurl#comment">
					<input type="hidden" name="referer" value="$viewurl#comment" />
					<input type="hidden" name="id" value="$data[id]" />
					<input type="hidden" name="idtype" value="$data[idtype]" />
					<input type="hidden" name="aid" value="$aid">
				<!--{/if}-->
				<input type="hidden" name="formhash" value="{FORMHASH}">
				<input type="hidden" name="replysubmit" value="true">
				<input type="hidden" name="commentsubmit" value="true" />
				<p class="ptn"><button type="submit" name="commentsubmit_btn" id="commentsubmit_btn" value="true" class="n5_plan">{lang comment}</button></p>
			</form>
		<!--{/if}-->
	</div>
</div>