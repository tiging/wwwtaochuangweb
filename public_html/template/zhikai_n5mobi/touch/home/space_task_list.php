<?php echo '';exit;?>
<!--{if $tasklist}-->
<!--{loop $tasklist $task}-->
<div class="n5_rwlb cl">
    <div class="n5_rwhx cl">
		<div class="rwtb z cl"><a href="home.php?mod=task&do=view&id=$task[taskid]"><img src="$task[icon]" width="55" height="55" alt="$task[name]" /></a></div>
		<div class="rwmc z cl"><h2><a href="home.php?mod=task&do=view&id=$task[taskid]">$task[name]</a><!--{if $_GET['item'] == 'doing'}--><i>已完成：$task[csc]%</i><!--{/if}--></h2><p><!--{echo cutstr($task[description],30)}--></p></div>
		<div class="rwjl y cl">
		<!--{if $task['reward'] == 'credit'}-->
			$_G['setting']['extcredits'][$task[prize]][title] $task[bonus] $_G['setting']['extcredits'][$task[prize]][unit]
		<!--{elseif $task['reward'] == 'magic'}-->
			$listdata[$task[prize]] $task[bonus] {lang magics_unit}
		<!--{elseif $task['reward'] == 'medal'}-->
			$listdata[$task[prize]] <!--{if $task['bonus']}-->{lang expire} $task[bonus] {lang days} <!--{/if}-->
		<!--{elseif $task['reward'] == 'invite'}-->
			$task[prize] {lang expire} $task[bonus] {lang days}
		<!--{elseif $task['reward'] == 'group'}-->
			$listdata[$task[prize]]<!--{if $task['bonus']}--><p>$task[bonus] {lang days}</p><!--{/if}-->
		<!--{/if}-->
		</div>
	</div>
</div>
<!--{/loop}-->
<!--{else}-->
<div class="n5_wnrts"><!--{if $_GET['item'] == 'new'}-->没有新任务<!--{elseif $_GET['item'] == 'doing'}-->没有申请任务<!--{else}-->没有任务<!--{/if}--></div>
<!--{/if}-->