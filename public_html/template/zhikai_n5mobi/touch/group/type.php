<?php echo '';exit;?>
<!--{template common/header}-->
<div class="n5_tbys cl">
    <a href="javascript:void(0);" onclick="return window.history.go(-1);" class="fhan">返回</a>
	<span class="dqym">$curtype[name]</span>
	<a href="forum.php?mod=group&action=create" class="cjqz">创建</a>
</div>
<div class="n5_tbxj"></div>

			<!--{if $list}-->
				<div class="n5_qzflsx">
					<span class="y">
					<select title="{lang orderby}" onchange="location.href=this.value" class="ps">
						<option value="$url" $selectorder[default]>{lang orderby_default}</option>
						<option value="$url&orderby=thread" $selectorder[thread]>{lang stats_main_threads_count}</option>
						<option value="$url&orderby=membernum" $selectorder[membernum]>{lang group_member_count}</option>
						<option value="$url&orderby=dateline" $selectorder[dateline]>{lang group_create_time}</option>
						<option value="$url&orderby=activity" $selectorder[activity]>{lang group_activities}</option>
					</select>
					</span>
					<h2>{lang group_total_numbers}</h2>
				</div>
				<!--{if $curtype['forumcolumns'] > 1}-->
					<div class="n5_blfllb">
						<table cellspacing="0" cellpadding="0" class="fl_tb">
						<!--{loop $list $fid $val}-->
							<tr class="fl_row">
								<td class="fl_icn"><a href="forum.php?mod=forumdisplay&action=list&fid=$fid" title="$val[name]"><img width="48" height="48" src="$val[icon]" alt="$val[name]" /></a></td>
								<td>
									<!--{hook/index_grouplist $fid}-->
									<h2><a href="forum.php?mod=forumdisplay&action=list&fid=$fid" title="$val[name]">$val[name]</a></h2>
									<p class="xg1">$val[description]</p>
								</td>
							</tr>
						<!--{/loop}-->
						</table>
					</div>
				<!--{else}-->
					<div class="n5_blfllb">
						<table cellspacing="0" cellpadding="0" class="fl_tb">
						<!--{loop $list $fid $val}-->
							<tr class="fl_row">
								<td class="fl_icn"><a href="forum.php?mod=forumdisplay&action=list&fid=$fid" title="$val[name]"><img width="48" height="48" src="$val[icon]" alt="$val[name]" /></a></td>
								<td>
									<!--{hook/index_grouplist $fid}-->
									<h2><a href="forum.php?mod=forumdisplay&action=list&fid=$fid" title="$val[name]">$val[name]</a><i>成员：$val[membernum]</i></h2>
									<p class="xg1">$val[description]</p>
								</td>
							</tr>
						<!--{/loop}-->
						</table>
					</div>
				<!--{/if}-->
			<!--{else}-->
				<div class="n5_wnrts">
					还没有部落，点击 ＋ 按钮创建一个
				</div>
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