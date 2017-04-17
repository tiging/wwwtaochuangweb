<?php echo '';exit;?>
<!--{if $_G['setting']['mobile']['mobilehotthread'] && $_GET['forumlist'] != 1}-->
	<!--{eval dheader('Location:portal.php?mod=index');exit;}-->
<!--{/if}-->
<!--{template common/header}-->

<script type="text/javascript">
	function getvisitclienthref() {
		var visitclienthref = '';
		if(ios) {
			visitclienthref = 'https://itunes.apple.com/cn/app/zhang-shang-lun-tan/id489399408?mt=8';
		} else if(andriod) {
			visitclienthref = 'http://www.discuz.net/mobile.php?platform=android';
		}
		return visitclienthref;
	}
</script>

<!--{if $_GET['visitclient']}-->

<header class="header">
    <div class="nav">
		<span>{lang warmtip}</span>
    </div>
</header>
<div class="cl">
	<div class="clew_con">
		<h2 class="tit">{lang zsltmobileclient}</h2>
		<p>{lang visitbbsanytime}<input class="redirect button" id="visitclientid" type="button" value="{lang clicktodownload}" href="" /></p>
		<h2 class="tit">{lang iphoneandriodmobile}</h2>
		<p>{lang visitwapmobile}<input class="redirect button" type="button" value="{lang clicktovisitwapmobile}" href="$_GET[visitclient]" /></p>
	</div>
</div>
<script type="text/javascript">
	var visitclienthref = getvisitclienthref();
	if(visitclienthref) {
		$('#visitclientid').attr('href', visitclienthref);
	} else {
		window.location.href = '$_GET[visitclient]';
	}
</script>

<!--{else}-->
<div class="n5_tbys cl">
    <a href="javascript:void(0);" onclick="return window.history.go(-1);" class="fhan">返回</a>
	<span class="n5_tbqh"><ul><li><a href="forum.php?mod=guide&view=hot">话题</a></li><li class="a"><a href="">版块</a></li></ul></span>
	<a href="search.php?mod=forum&mobile=2" class="ssan"></a>
</div>
<div class="n5_tbxj"></div>
<!--{hook/index_top_mobile}-->
							
<div class="n5_bbszt cl">
    <div class="n5_bbsfq">
	    <ul class="tabs">
		    <!--{if empty($gid) && !empty($forum_favlist)}--><li><a href="#tabdingyue">我的关注</a></li><!--{/if}-->
		    <!--{loop $catlist $key $cat}-->
			<li><a href="#tab$cat[fid]">$cat[name]</a></li>
			<!--{/loop}-->
        </ul>
	</div>
	<div class="n5_bbsbk">
	    <!--{if empty($gid) && !empty($forum_favlist)}-->
	    <div id="tabdingyue" class="tab_content" style="display: block; ">
			<!--{hook/index_bkwdgz_mobile}-->
				<div id="sub_forum_dingyue" class="sub_forum bm_c">
					<ul>
					<!--{eval $favorderid = 0;}-->
		            <!--{loop $forum_favlist $key $favorite}-->
						<li>
							<!--{if $favforumlist[$favorite[id]]}-->
							<!--{eval $forum=$favforumlist[$favorite[id]];}-->
							<!--{eval $forumurl = !empty($forum['domain']) && !empty($_G['setting']['domain']['root']['forum']) ? 'http://'.$forum['domain'].'.'.$_G['setting']['domain']['root']['forum'] : 'forum.php?mod=forumdisplay&fid='.$forum['fid'];}-->
							<!--{if $forum[icon]}-->
							$forum[icon]
							<!--{else}-->
							<a href="$forumurl"{if $forum[redirect]} {/if}><img src="template/zhikai_n5mobi/touch/style/forum.png"></a>
							<!--{/if}-->
							<a href="forum.php?mod=forumdisplay&fid={$forum['fid']}" class="btdb"><!--{if $forum[todayposts] > 0}--><span class="num">$forum[todayposts]</span><!--{/if}-->{$forum[name]}</a>
							<!--{/if}-->
							<i><!--{if empty($forum[redirect])}-->主题:<!--{echo dnumber($forum[threads])}--> 帖数:<!--{echo dnumber($forum[posts])}--><!--{/if}--></i>
						</li>
					<!--{/loop}-->
					</ul>
					<div class="n5_glwddy">
						<a href="home.php?mod=space&uid={$_G[uid]}&do=favorite&view=me&type=forum">管理关注的版块</a>
					</div>
				</div>
        </div>
		<!--{/if}-->
	    <!--{loop $catlist $key $cat}-->
        <div id="tab$cat[fid]" class="tab_content" style="display: block; ">
				<div id="sub_forum_$cat[fid]" class="sub_forum bm_c">
					<ul>
					<!--{loop $cat[forums] $forumid}-->
					<!--{eval $forum=$forumlist[$forumid];}-->
						<li>
							<!--{if $forum[icon]}-->
							$forum[icon]
							<!--{else}-->
							<a href="forum.php?mod=forumdisplay&fid={$forum['fid']}"><img src="template/zhikai_n5mobi/touch/style/forum.png" align="left" alt="$forum[name]" /></a>
							<!--{/if}-->
							<a href="forum.php?mod=forumdisplay&fid={$forum['fid']}" class="btdb"><!--{if $forum[todayposts] > 0}--><span class="num">$forum[todayposts]</span><!--{/if}-->{$forum[name]}</a>
							<i><!--{if empty($forum[redirect])}-->主题:<!--{echo dnumber($forum[threads])}--> 帖数:<!--{echo dnumber($forum[posts])}--><!--{/if}--></i>
						</li>
					<!--{/loop}-->
					</ul>
				</div>
        </div>
        <!--{/loop}-->
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {

	//Default Action
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content
	
	//On Click Event
	$("ul.tabs li").click(function() {
		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content
		var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active content
		return false;
	});

});
</script>

<!--{hook/index_middle_mobile}-->
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
	<a href="forum.php?mod=guide&view=hot" class="bottom_history_on">话题</a>
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