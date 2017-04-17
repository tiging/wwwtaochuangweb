<?php echo '';exit;?>
<div class="n5_qzsydh cl">
    <ul>
	    <li><a href="group.php">首页</a></li>
	    <li><a href="forum.php?mod=forumdisplay&action=list&fid=$_G[fid]">列表</a></li>
		<li class="a"><a href="forum.php?mod=group&action=memberlist&fid=$_G[fid]">成员</a></li>
		<!--{if helper_access::check_module('group') && $status != 'isgroupuser'}-->
		<li><a href="forum.php?mod=group&amp;action=join&amp;fid=$_G[fid]">加入</a></li>
		<!--{else}-->
		<li><a href="forum.php?mod=group&amp;action=out&amp;fid=$_G[fid]">退出</a></li>
		<!--{/if}-->
		<li><a href="group.php?mod=my&view=join">我的</a></li>
	</ul>
</div>

<!--{if $op == 'alluser'}-->
	<!--{if $adminuserlist}-->
		<div class="n5_qclbgl">
			<div class="n5_qclbbt">
				<h2>{lang group_admin_member}</h2>
			</div>
			<div class="n5_qclbnr">
				<ul class="ml mls cl">
					<!--{loop $adminuserlist $user}-->
					<li>
						<a href="home.php?mod=space&uid=$user[uid]" title="{if $user['level'] == 1}{lang group_moderator_title}{elseif $user['level'] == 2}{lang group_moderator_vice_title}{/if}{if $user['online']} {lang login_normal_mode}{/if}" class="avt" c="1">
						<!--{if $user['level'] == 1}-->
							<em class="gm"></em>
						<!--{elseif $user['level'] == 2}-->
							<em class="gm" style="filter:alpha(opacity=50); opacity: 0.5"></em>
						<!--{/if}-->
						<!--{if $user['online']}-->
							<em class="gol" style="margin-top: 15px;"></em>
						<!--{/if}-->
							<!--{echo avatar($user[uid], 'small')}-->
						</a>
						<p><a href="home.php?mod=space&uid=$user[uid]">$user[username]</a></p>
					</li>
					<!--{/loop}-->
				</ul>
			</div>
		</div>
	<!--{/if}-->
	<!--{if $staruserlist || $alluserlist}-->
		<div class="n5_qclbgl">
			<div class="n5_qclbbt">
				<h2>{lang member}</h2>
			</div>
			<div class="n5_qclbnr">
				<!--{if $staruserlist}-->
					<ul class="ml mls cl">
						<!--{loop $staruserlist $user}-->
						<li>
							<a href="home.php?mod=space&uid=$user[uid]" title="{lang group_star_member_title}{if $user['online']} {lang login_normal_mode}{/if}" class="avt" c="1">
							<em class="gs"></em>
							<!--{if $user['online']}-->
								<em class="gol"{if $user['level'] <= 3} style="margin-top: 15px;"{/if} title="{lang login_normal_mode}"></em>
							<!--{/if}-->
							<!--{echo avatar($user[uid], 'small')}-->
							</a>
							<p><a href="home.php?mod=space&uid=$user[uid]">$user[username]</a></p>
						</li>
						<!--{/loop}-->
					</ul>
				<!--{/if}-->
				<!--{if $alluserlist}-->
					<ul class="ml mls cl">
						<!--{loop $alluserlist $user}-->
						<li>
							<a href="home.php?mod=space&uid=$user[uid]" class="avt" c="1"><!--{echo avatar($user[uid], 'small')}--></a>
							<p><a href="home.php?mod=space&uid=$user[uid]">$user[username]</a></p>
						</li>
						<!--{/loop}-->
					</ul>
				<!--{/if}-->
			</div>
		</div>
	<!--{/if}-->
	<!--{if $multipage}--><div class="pgs cl">$multipage</div><!--{/if}-->
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