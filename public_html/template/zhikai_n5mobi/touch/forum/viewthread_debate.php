<?php echo '';exit;?>
<!--{if $debate[umpire]}-->
	<!--{if $debate['umpirepoint']}-->
	<div>
		<p>
			<!--{if $debate[winner]}-->
			<!--{if $debate[winner] == 1}-->
			<label><strong>{lang debate_square}</strong>{lang debate_winner}</label>
			<!--{elseif $debate[winner] == 2}-->
			<label><strong>{lang debate_opponent}</strong>{lang debate_winner}</label>
			<!--{else}-->
			<label><strong>{lang debate_draw}</strong></label>
			<!--{/if}-->
			<!--{/if}-->
			<em>{lang debate_comment_dateline}: $debate[endtime]</em>
		</p>
		<!--{if $debate[umpirepoint]}--><p><strong>{lang debate_umpirepoint}</strong>: $debate[umpirepoint]</p><!--{/if}-->
		<!--{if $debate[bestdebater]}--><p><strong>{lang debate_bestdebater}</strong>: $debate[bestdebater]</p><!--{/if}-->
	</div>
	<!--{/if}-->
<!--{/if}-->

<div id="postmessage_$post[pid]" class="postmessage">$post[message]</div>



<div class="mbn n5_blztlf cl">
    <div class="mbn pbn bbn n5_blztzf n5_blztfz">
        <strong>{lang debate_square_point}</strong>
		<p class="xg1">支持：$debate[affirmvotes] {lang debater}：$debate[affirmdebaters]</p>
        <p class="xg2">$debate[affirmpoint]</p>
        <p class="xg4"><!--{if !$_G['forum_thread']['is_archived']}--><a href="forum.php?mod=misc&action=debatevote&tid=$_G[tid]&stand=1" id="affirmbutton" >支持正方</a><!--{/if}--></p>
    </div>
    <div class="mbn n5_blztff n5_blztfz">
        <strong>{lang debate_opponent_point}</strong>
		<p class="xg1 xg3">支持：$debate[negavotes] {lang debater}：$debate[negadebaters]</p>
        <p class="xg2">$debate[negapoint]</p>
        <p class="xg4 xg5"><a href="forum.php?mod=misc&action=debatevote&tid=$_G[tid]&stand=2" id="negabutton" >支持反方</a></p>
    </div>
</div>

<div>
<!--{if $debate[endtime]}-->
	<p class="n5_blztjs">{lang endtime}: $debate[endtime] <!--{if $debate[umpire]}-->{lang debate_umpire}: $debate[umpire]<!--{/if}--></p>
<!--{/if}-->
</div>