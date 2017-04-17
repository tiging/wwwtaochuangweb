<?php echo '';exit;?>
<!--{template common/header}-->
<script type="text/javascript" src="{$_G[setting][jspath]}common.js?{VERHASH}"></script>	
<div class="n5_tbys cl">
    <a href="javascript:void(0);" onclick="return window.history.go(-1);" class="fhan">返回</a>
	<span class="dqym">发布</span>
	<a href="search.php?mod=forum&mobile=2" class="ssan">搜索</a>
</div>
<div class="n5_tbxj"></div>
<!--{hook/misc_kuaifa_top_mobile}-->

<div class="n5-xs">
	<ul id="fs_group">$grouplist</ul>
	<ul id="fs_forum_common">$commonlist</ul>
	<!--{loop $forumlist $forumid $forum}-->
		<ul id="fs_forum_$forumid">$forum</ul>
	<!--{/loop}-->
	<!--{loop $subforumlist $forumid $forum}-->
		<ul id="fs_subforum_$forumid">$forum</ul>
	<!--{/loop}-->
</div>
<div class="n5-ksft">
	<ul class="pbl cl">
		<li id="block_group"></li>
		<li id="block_forum"></li>
		<li id="block_subforum"></li>
	</ul>
	<p class="cl n5_fbanjz">
		<!--{if $_G['group']['allowpost'] || !$_G['uid']}-->
			<!--{if $special === null}-->
				<button id="postbtn" class="n5-qh n5-fq" onclick="hideWindow('nav');showWindow('newthread', 'forum.php?mod=post&action=newthread&fid=' + selectfid)" disabled="disabled"><span>发布主题</span></button>
			<!--{else}-->
				<button id="postbtn" class="n5-qh n5-bk" onclick="hideWindow('nav');window.location.href='forum.php?mod=post&action=newthread&fid=' + selectfid + '&special=$special'" disabled="disabled"><span>$actiontitle</span></button>
			<!--{/if}-->
		<!--{/if}-->
		<span class="n5-xs"><span id="pbnv"></span> <a id="enterbtn" class="xg1" href="javascript:;" onclick="locationforums(currentblock, currentfid)">[{lang nav_forum}]</a></span>
	</p>
</div>
<!--{hook/misc_kuaifa_bottom_mobile}-->

<script type="text/javascript" reload="1">
var s = '<!--{if $commonfids}--><p><a id="commonforum" href="javascript:;" onclick="switchforums(this, 1, \'common\')" class="pbsb lightlink">{lang nav_forum_frequently}</a></p><!--{/if}-->';
var lis = $('fs_group').getElementsByTagName('LI');
for(i = 0;i < lis.length;i++) {
	var gid = lis[i].getAttribute('fid');
	if($('fs_forum_' + gid)) {
		s += '<p><a href="javascript:;" ondblclick="locationforums(1, ' + gid + ')" onclick="switchforums(this, 1, ' + gid + ')" class="pbsb">' + lis[i].innerHTML + '</a></p>';
	}

}
$('block_group').innerHTML = s;
var lastswitchobj = null;
var selectfid = 0;
var switchforum = switchsubforum = '';

switchforums($('commonforum'), 1, 'common');

function switchforums(obj, block, fid) {
	if(lastswitchobj != obj) {
		if(lastswitchobj) {
			lastswitchobj.parentNode.className = '';
		}
		obj.parentNode.className = 'pbls';
	}
	var s = '';
	if(fid != 'common') {
		$('enterbtn').className = 'xi2';
		currentblock = block;
		currentfid = fid;
	} else {
		$('enterbtn').className = 'xg1';
	}
	if(block == 1) {
		var lis = $('fs_forum_' + fid).getElementsByTagName('LI');
		for(i = 0;i < lis.length;i++) {
			fid = lis[i].getAttribute('fid');
			if(fid != '') {
				s += '<p><a href="javascript:;" ondblclick="locationforums(2, ' + fid + '\)" onclick="switchforums(this, 2, ' + fid + ')"' + ($('fs_subforum_' + fid) ?  ' class="pbsb"' : '') + '>' + lis[i].innerHTML + '</a></p>';
			}
		}
		$('block_forum').innerHTML = s;
		$('block_subforum').innerHTML = '';
		switchforum = switchsubforum = '';
		selectfid = 0;
		$('postbtn').setAttribute("disabled", "disabled");
		$('postbtn').className = 'n5-qh n5-bk';
	} else if(block == 2) {
		selectfid = fid;
		if($('fs_subforum_' + fid)) {
			var lis = $('fs_subforum_' + fid).getElementsByTagName('LI');
			for(i = 0;i < lis.length;i++) {
				fid = lis[i].getAttribute('fid');
				s += '<p><a href="javascript:;" ondblclick="locationforums(3, ' + fid + ')" onclick="switchforums(this, 3, ' + fid + ')">' + lis[i].innerHTML + '</a></p>';
			}
			$('block_subforum').innerHTML = s;
		} else {
			$('block_subforum').innerHTML = '';
		}
		switchforum = obj.innerHTML;
		switchsubforum = '';
		$('postbtn').removeAttribute("disabled");
		$('postbtn').className = 'n5-qh n5-fq';
	} else {
		selectfid = fid;
		switchsubforum = obj.innerHTML;
		$('postbtn').removeAttribute("disabled");
		$('postbtn').className = 'n5-qh n5-fq';
	}
	lastswitchobj = obj;
	$('pbnv').innerHTML = switchforum ? '&nbsp;&gt;&nbsp;' + switchforum + (switchsubforum ? '&nbsp;&gt;&nbsp;' + switchsubforum : '') : '';
}

function locationforums(block, fid) {
	location.href = block == 1 ? 'forum.php?gid=' + fid : 'forum.php?mod=forumdisplay&fid=' + fid;
}

</script>

<script type="text/javascript">
    var jq = jQuery.noConflict(); 
	function toshare(){
		jq(".n5_dbtstc").addClass("am-modal-active");	
		if(jq(".sharebg").length>0){
			jq(".sharebg").addClass("sharebg-active");
		}else{
			jq("body").append('<div class="sharebg"></div>');
			jq(".sharebg").addClass("sharebg-active");
		}
		jq(".sharebg-active,.share_btn").click(function(){
			jq(".n5_dbtstc").removeClass("am-modal-active");	
			setTimeout(function(){
				jq(".sharebg-active").removeClass("sharebg-active");	
				jq(".sharebg").remove();	
			},300);
		})
	}	
</script>
<div id="n5_dbcd">
	<a href="portal.php?mod=index" class="bottom_index">聚焦</a>
	<a href="forum.php?mod=guide&view=hot" class="bottom_history">话题</a>
	<a onClick="toshare()" class="bottom_tansuo"><span></span></a>
	<a href="forum.php?mod=misc&action=nav" class="bottom_post_on">发布</a>
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