<?php echo '';exit;?>
<!--{template common/header}-->
<div class="n5_tbys cl">
    <a href="javascript:void(0);" onclick="return window.history.go(-1);" class="fhan">返回</a>
	<span class="dqym">任务中心</span>
</div>
<div class="n5_tbxj"></div>
<div class="n5_wdscxz cl">
    <div class="n5_wdscys n5_rwqhysb cl">
    <ul>
        <li$actives[new]><a href="home.php?mod=task&item=new">新任务</a></li>
		<li$actives[doing]><a href="home.php?mod=task&item=doing" class="kjqhjg">进行中</a></li>
		<li$actives[done]><a href="home.php?mod=task&item=done" class="kjqhjg">已完成</a></li>
		<li$actives[failed]><a href="home.php?mod=task&item=failed" class="kjqhjg">失败的</a></li>
	</ul>
	</div>
</div>

<div id="ct" class="n5_rwzx cl">
	<!--{if empty($do)}-->
		<!--{subtemplate home/space_task_list}-->
	<!--{elseif $do == 'view'}-->
		<!--{subtemplate home/space_task_detail}-->
	<!--{/if}-->
</div>

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
	<a href="<!--{if $_G[uid]}-->home.php?mod=space&uid=$_G[uid]&do=profile&mycenter=1<!--{else}-->member.php?mod=logging&action=login<!--{/if}-->" class="bottom_member">我的<!--{if $_G[member][newprompt]}--><i>&nbsp;</i><!--{/if}--></a>
</div>
<div class="n5_dbcdy"></div>
<div class="n5_dbtstc">
    <!--{template common/n5_ts}-->
</div>
<div class="n5_ssymdb">
</div>
<!--{eval $nofooter = true;}-->
<!--{template common/footer}-->