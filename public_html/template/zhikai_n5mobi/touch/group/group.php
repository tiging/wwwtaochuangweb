<?php echo '';exit;?>
<!--{template common/header}-->
	<div id="ct" class="ct2 wp cl">
		<div class="mn">
			<!--{if $action != 'create'}-->
				<!--{if $_G['forum']['banner']}-->
				    <div class="n5_qzyttbs">
				        <img src="$_G[forum][banner]" alt="" />
					</div>
					<div class="n5_tbys n5_qzyttb">
                        <a href="javascript:void(0);" onclick="return window.history.go(-1);" class="fhan">返回</a>
						<span class="dqym">$_G[forum][name]</span>
						<!--{if $_G['forum']['ismoderator']}--><a href="forum.php?mod=group&action=manage&fid=$_G[fid]" class="czgl">管理</a><!--{/if}-->
					</div>
				<!--{else}-->
				
				
					<!--群组头部-->
					<div class="n5_tbys cl">
						<a href="javascript:void(0);" onclick="return window.history.go(-1);" class="fhan">返回</a>
						<span class="dqym">$_G[forum][name]</span>
						<!--{if $_G['forum']['ismoderator']}--><a href="forum.php?mod=group&action=manage&fid=$_G[fid]" class="czgl">管理</a><!--{/if}-->
					</div>
					<div class="n5_tbxj"></div>
				<!--{/if}-->
				<!--{if CURMODULE == 'group'}--><!--{hook/group_top}--><!--{else}--><!--{hook/forumdisplay_top}--><!--{/if}-->
			<!--{/if}-->
			<!--{if $action == 'index' && $status != 2 && $status != 3}-->
				<!--{template group/group_index}-->
			<!--{elseif $action == 'list'}-->
				<!--{template group/group_list}-->
			<!--{elseif $action == 'memberlist'}-->
				<!--{template group/group_memberlist}-->
			<!--{elseif $action == 'create'}-->
				<!--{template group/group_create}-->
			<!--{elseif $action == 'invite'}-->
				<!--{template group/group_invite}-->
			<!--{elseif $action == 'manage'}-->
				<!--{template group/group_manage}-->
			<!--{/if}-->
			<!--{if CURMODULE == 'group'}--><!--{hook/group_bottom}--><!--{else}--><!--{hook/forumdisplay_bottom}--><!--{/if}-->
		</div>
	</div>
<!--{eval $nofooter = true;}-->
<!--{template common/footer}-->