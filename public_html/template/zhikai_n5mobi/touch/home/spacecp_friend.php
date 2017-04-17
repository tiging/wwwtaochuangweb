<?php echo '';exit;?>
<!--{template common/header}-->
<div class="n5_tbys cl">
    <a href="javascript:void(0);" onclick="return window.history.go(-1);" class="fhan">返回</a>
	<span class="dqym">好友请求</span>
</div>
<div class="n5_tbxj"></div>

<!--{if $op =='ignore'}-->
<div class="n5_hyjjqq">
<h3 class="flb">
	<em id="return_$_GET[handlekey]">拒绝好友</em>
	<!--{if $_G[inajax]}--><span><a href="javascript:;" onclick="hideWindow('$_GET[handlekey]');" class="flbc" title="{lang close}">{lang close}</a></span><!--{/if}-->
</h3>
<form method="post" class="n5_hyjjts" autocomplete="off" id="friendform_{$uid}" name="friendform_{$uid}" action="home.php?mod=spacecp&ac=friend&op=ignore&uid=$uid&confirm=1" {if $_G[inajax]}onsubmit="ajaxpost(this.id, 'return_$_GET[handlekey]');"{/if}>
	<input type="hidden" name="referer" value="{echo dreferer()}">
	<input type="hidden" name="friendsubmit" value="true" />
	<input type="hidden" name="formhash" value="{FORMHASH}" />
	<input type="hidden" name="from" value="$_GET[from]" />
	<!--{if $_G[inajax]}--><input type="hidden" name="handlekey" value="$_GET[handlekey]" /><!--{/if}-->
	<div class="c">确定拒绝好友请求吗？</div>
	<p class="o pns">
		<button type="submit" name="friendsubmit_btn" class="pn pnc" value="true"><strong>{lang determine}</strong></button>
	</p>
</form>
</div>
<script type="text/javascript">
	function succeedhandle_{$_GET[handlekey]}(url, msg, values) {
		if(values['from'] == 'notice') {
			deleteQueryNotice(values['uid'], 'pendingFriend');
		} else if(typeof friend_delete == 'function') {
			friend_delete(values['uid']);
			}
		}
</script>

<!--{elseif $op=='request'}-->

<div class="n5_hyqqcd cl">
	<!--{if $list}-->
	<a href="home.php?mod=spacecp&ac=friend&op=addconfirm&key=$space[key]">全部通过</a><a href="home.php?mod=spacecp&ac=friend&op=ignore&confirm=1&key=$space[key]" onclick="return confirm('{lang determine_ignore_all_friends_application}');">拒绝所有</a>
	<!--{/if}-->
</div>
<!--{if $list}-->
	<div class="n5_hyqqlb cl">
		<!--{loop $list $key $value}-->
		<div class="n5_hyqqlx cl">
			<div class="n5_hyqqtx cl"><a href="home.php?mod=space&uid=$value[fuid]" c="1"><!--{avatar($value[fuid],middle)}--></a></div>
			<div class="n5_hyqqmc cl">
				<a href="home.php?mod=space&uid=$value[fuid]">$value[fusername]</a>
				<!--{if $ols[$value[fuid]]}--><img src="{IMGDIR}/ol.gif" alt="online" title="{lang online}" class="vm" /> <!--{/if}-->
				<!--{if $value['videostatus']}-->
				<img src="{IMGDIR}/videophoto.gif" alt="videophoto" class="vm" /> <span class="xg1">{lang certified_by_video}</span>
				<!--{/if}-->
				<p><!--{date($value[dateline], 'n-j H:i')}--></p>
		    </div>
			<div class="n5_hyqqnn y cl">
				<a href="home.php?mod=spacecp&ac=friend&op=add&uid=$value[fuid]&handlekey=afrfriendhk_{$value[uid]}">通过</a>
				<a href="home.php?mod=spacecp&ac=friend&op=ignore&uid=$value[fuid]&confirm=1&handlekey=afifriendhk_{$value[uid]}">拒绝</a>
				<!--{if $value[note]}--><p>$value[note]</p><!--{/if}-->
			</div>
		</div>
		<!--{/loop}-->
	</div>
	<!--{else}-->
	<div class="n5_hyqqmy">还没有人请求加你为好友</div>
<!--{/if}-->

<!--{elseif $op=='add'}-->
<div class="n5_qqjwhy">
	<form method="post" autocomplete="off" id="addform_{$tospace[uid]}" name="addform_{$tospace[uid]}" action="home.php?mod=spacecp&ac=friend&op=add&uid=$tospace[uid]" {if $_G[inajax]}onsubmit="ajaxpost(this.id, 'return_$_GET[handlekey]');"{/if}>
		<input type="hidden" name="referer" value="{echo dreferer()}" />
		<input type="hidden" name="addsubmit" value="true" />
		<!--{if $_G[inajax]}--><input type="hidden" name="handlekey" value="$_GET[handlekey]" /><!--{/if}-->
		<input type="hidden" name="formhash" value="{FORMHASH}" />
		<div class="c">
			<table>
				<tr>
					<th valign="top" width="60" class="avt"><a href="home.php?mod=space&uid=$tospace[uid]"><!--{avatar($tospace[uid],small)}--></th>
					<td valign="top" class="hyqqnr">{lang add}<strong>{$tospace[username]}</strong>为好友，留言:<br />
						<input type="text" name="note" value="" size="35" class="px"  onkeydown="ctrlEnter(event, 'addsubmit_btn', 1);" />
						<p class="mtm">
							{lang friend_group}: <select name="gid" class="ps">
							<!--{loop $groups $key $value}-->
							<option value="$key" {if empty($space['privacy']['groupname']) && $key==1} selected="selected"{/if}>$value</option>
							<!--{/loop}-->
							</select>
						</p>
					</td>
				</tr>
			</table>
		</div>
		<p class="o pns">
			<button type="submit" name="addsubmit_btn" id="addsubmit_btn" value="true" class="pn pnc"><strong>{lang determine}</strong></button>
		</p>
	</form>
</div>
<!--{elseif $op=='add2'}-->
<div class="n5_hytgqq">
<h3 class="flb">
	<em id="return_$_GET[handlekey]">{lang approval_the_request}</em>
	<!--{if $_G[inajax]}--><span><a href="javascript:;" onclick="hideWindow('$_GET[handlekey]');" class="flbc" title="{lang close}">{lang close}</a></span><!--{/if}-->
</h3>
<form method="post" class="n5_hytgts" autocomplete="off" id="addratifyform_{$tospace[uid]}" name="addratifyform_{$tospace[uid]}" action="home.php?mod=spacecp&ac=friend&op=add&uid=$tospace[uid]" {if $_G[inajax]}onsubmit="ajaxpost(this.id, 'return_$_GET[handlekey]');"{/if}>
	<input type="hidden" name="referer" value="{echo dreferer()}" />
	<input type="hidden" name="add2submit" value="true" />
	<input type="hidden" name="from" value="$_GET[from]" />
	<!--{if $_G[inajax]}--><input type="hidden" name="handlekey" value="$_GET[handlekey]" /><!--{/if}-->
	<input type="hidden" name="formhash" value="{FORMHASH}" />
	<div class="c">
		<table cellspacing="0" cellpadding="0">
			<tr>
				<th valign="top" width="60" class="avt"><a href="home.php?mod=space&uid=$tospace[uid]"><!--{avatar($tospace[uid],small)}--></th>
				<td valign="top">
					<p class="n5_tgqqhy">{lang approval_the_request_group}:</p>
					<table><tr>
					<!--{eval $i=0;}-->
					<!--{loop $groups $key $value}-->
					<td class="n5_tgqqxm"><label for="group_$key"><input type="radio" name="gid" id="group_$key" value="$key"$groupselect[$key] />$value</label></td>
					<!--{if $i%2==1}--></tr><tr><!--{/if}-->
					<!--{eval $i++;}-->
					<!--{/loop}-->
					</tr></table>
				</td>
			</tr>
		</table>
	</div>
    <p class="o pns">
		<button type="submit" name="add2submit_btn" value="true" class="pn pnc"><strong>{lang approval}</strong></button>
	</p>
</form>
</div>
<script type="text/javascript">
	function succeedhandle_$_GET[handlekey](url, msg, values) {
		if(values['from'] == 'notice') {
			deleteQueryNotice(values['uid'], 'pendingFriend');
		} else {
			myfriend_post(values['uid']);
		}
	}
</script>
<!--{elseif $op=='getinviteuser'}-->
$jsstr
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
