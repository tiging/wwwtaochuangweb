<?php echo '';exit;?>
<!--{template common/header}-->
<div class="n5_tbys cl">
    <a href="javascript:void(0);" onclick="return window.history.go(-1);" class="fhan">返回</a>
	<span class="dqym">我的群组</span>
	<a href="forum.php?mod=group&action=create" class="cjqz">创建</a>
</div>
<div class="n5_tbxj"></div>

<div class="n5_wdscxz cl">
<div class="n5_wdscys cl">
	<ul>
        <li $actives[join]><a href="group.php?mod=my&view=join">{lang my_join}</a></li>
		<li $actives[manager]><a href="group.php?mod=my&view=manager">{lang my_manage}</a></li>
				<script language="javascript">
					function succeedhandle_attentiongroup(locationhref) {
						hideWindow('attentiongroup');
						location.href = locationhref;
					} 
				</script>
	</ul>
</div>
</div>
	<!--{if $view == 'groupthread' || $view == 'mythread'}-->
	<!--{elseif $view == 'manager' || $view == 'join'}-->
		<!--{if $grouplist}-->
			<div class="n5_wcydqz cl">
				<ul>
					<!--{loop $grouplist $groupid $group}-->
					<li>
						<a href="forum.php?mod=forumdisplay&action=list&fid=$groupid" title="$group[name]" class="avt"><img src="$group[icon]" alt="$group[name]" /></a>
						<p><!--{if $group['flevel'] == '-1'}-->({lang group_wait_mod})<!--{/if}--><a href="forum.php?mod=forumdisplay&action=list&fid=$groupid" title="$group[name]">$group[name]</a></p>
					</li>
					<!--{/loop}-->
				</ul>
			</div>
			<!--{if $multipage}--><div class="pgs">$multipage</div><!--{/if}-->
		<!--{else}-->
			<div class="n5_wnrts"><!--{if $view == 'manager'}-->{lang no_group_create_now} <!--{elseif $view == 'join'}-->{lang no_group_join} <!--{/if}--></div>
		<!--{/if}-->
	<!--{/if}-->

<script type="text/javascript">
	function toshare(){
		$(".n5_dbtstc").addClass("am-modal-active");	
		if($(".sharebg").length>0){
			$(".sharebg").addClass("sharebg-active");
		}else{
			$("body").append('<div class="sharebg"></div>');
			$(".sharebg").addClass("sharebg-active");
		}
		$(".sharebg-active,.share_btn").click(function(){
			$(".n5_dbtstc").removeClass("am-modal-active");	
			setTimeout(function(){
				$(".sharebg-active").removeClass("sharebg-active");	
				$(".sharebg").remove();	
			},300);
		})
	}	
</script>
<div id="n5_dbcd">
	<a href="portal.php?mod=index" class="bottom_index">聚焦</a>
	<a href="forum.php?mod=guide&view=hot" class="bottom_history">话题</a>
	<a onClick="toshare()" class="bottom_tansuo"><span></span></a>
	<a href="forum.php?mod=misc&action=nav" class="bottom_post">发布</a>
	<a href="<!--{if $_G[uid]}-->home.php?mod=space&uid=$_G[uid]&do=profile&mycenter=1<!--{else}-->member.php?mod=logging&action=login<!--{/if}-->" class="bottom_member_on">我的<!--{if $_G[member][newprompt]}--><i>&nbsp;</i><!--{/if}--></a>
</div>
<div class="n5_dbcdy"></div>
<div class="n5_dbtstc">
    <!--{template common/n5_ts}-->
</div>
<div class="n5_ssymdb">
</div>
<!--{eval $nofooter = true;}-->
<!--{template common/footer}-->