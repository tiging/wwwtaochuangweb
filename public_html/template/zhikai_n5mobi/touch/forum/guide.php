<?php echo '';exit;?>
<!--{template common/header}-->
<script src="template/zhikai_n5mobi/touch/style/js/TouchSlide.1.1.source.js"></script>
<script src="template/zhikai_n5mobi/touch/style/js/modernizr.custom.js"></script>	
<div class="n5_tbys cl">
    <a href="javascript:void(0);" onclick="return window.history.go(-1);" class="fhan">����</a>
	<span class="n5_tbqh"><ul><li class="a"><a href="">����</a></li><li><a href="forum.php?forumlist=1">���</a></li></ul></span>
	<a href="search.php?mod=forum&mobile=2" class="ssan"></a>
</div>
<div class="n5_tbxj"></div>

<!--{hook/guide_top_mobile}-->

<div class="n5_sqhtcd cl">
    <ul id="thread_types">
		<li $currentview['hot']><a href="forum.php?mod=guide&view=hot">{lang guide_hot}</a></li>
		<li $currentview['digest']><a href="forum.php?mod=guide&view=digest">{lang guide_digest}</a></li>
		<li $currentview['newthread']><a href="forum.php?mod=guide&view=newthread">{lang guide_newthread}</a></li>
		<li $currentview['my']><a id="filter_special" href="forum.php?mod=guide&view=my" onmouseover="showMenu(this.id)">�ҵĻ���</a></li>
	</ul>
</div>

<div class="n5_daodu cl">
<!--{loop $data $key $list}-->
<!--{if $list['threadcount']}-->
<!--{loop $list['threadlist'] $key $thread}-->
<!--{if $thread['moved']}--><!--{eval $thread[tid]=$thread[closed];}--><!--{/if}-->
{eval include_once libfile('function/post');
include_once libfile('function/attachment');
$thread['post'] = C::t('forum_post')->fetch_all_by_tid_position($thread['posttableid'],$thread['tid'],1);
$thread['post'] = array_shift($thread['post']);
$xlmm_tp = C::t('forum_attachment_n')->count_image_by_id('tid:'.$thread['post']['tid'], 'pid', $thread['post']['pid']);
}
{if $xlmm_tp ==1}<!--{eval require_once libfile('function/post');$post = C::t('forum_post')->fetch_threadpost_by_tid_invisible($thread['tid']);$post['message'] = trim(messagecutstr($post['message'], 95));}--> {/if}
{if $xlmm_tp ==0 || $xlmm_tp >=2}<!--{eval require_once libfile('function/post');$post = C::t('forum_post')->fetch_threadpost_by_tid_invisible($thread['tid']);$post['message'] = trim(messagecutstr($post['message'], 82));}--> {/if} 
{if $xlmm_tp ==1}<!--{eval  $threadtable =  DB::fetch_all('SELECT * FROM '.DB::table('forum_attachment').' WHERE tid = '. $thread['tid'].' AND uid = '.$thread['authorid'] .' LIMIT  0 ,'. 1 );}--> {/if}
{if $xlmm_tp ==2}<!--{eval  $threadtable =  DB::fetch_all('SELECT * FROM '.DB::table('forum_attachment').' WHERE tid = '. $thread['tid'].' AND uid = '.$thread['authorid'] .' LIMIT  0 ,'. 2 );}--> {/if}
{if $xlmm_tp >=3}<!--{eval  $threadtable =  DB::fetch_all('SELECT * FROM '.DB::table('forum_attachment').' WHERE tid = '. $thread['tid'].' AND uid = '.$thread['authorid'] .' LIMIT  0 ,'. 3 );}--> {/if}
<!--{hook/guide_list_mobile $key}-->
<div class="n5_htmk cl">
	<div class="n5_htmktb cl">
	    <div class="n5_mktbys cl">
		    <div class="n5_mktbtx cl">
				<!--{if $thread['authorid'] && $thread['author']}--><a href="home.php?mod=space&uid=$thread[authorid]"><!--{avatar($thread[authorid],small)}--></a><!--{else}--><img src="template/zhikai_n5mobi/touch/style/nmyk.png"><!--{/if}-->
			</div>
			<span class="n5_mktbmc cl">
				<span class="n5_mktbhy"><!--{if $thread['authorid'] && $thread['author']}--><a href="home.php?mod=space&uid=$thread[authorid]">$thread[author]</a><!--{else}-->$_G[setting][anonymoustext]<!--{/if}--></span>
				<!--{eval $thread['groupid'] = DB::result_first('SELECT groupid FROM '.DB::table('common_member').' WHERE uid = '.$thread['authorid'] );}-->
				<!--{if $thread['authorid'] && $thread['author']}-->
				<span class="n5_hydj">
				<!--{if $thread['groupid'] == 1}--><em class="g1">����Ա</em><!--{elseif $thread['groupid'] == 2}--><em class="g1">����</em><!--{elseif $thread['groupid'] == 3}--><em class="g1">����</em><!--{elseif $thread['groupid'] == 16}--><em class="g1">����</em><!--{elseif $thread['groupid'] == 17}--><em class="g1">�༭</em><!--{elseif $thread['groupid'] == 18}--><em class="g1">�༭</em><!--{elseif $thread['groupid'] == 18}--><em class="g1">�༭</em> 
				<!--{elseif $thread['groupid'] == 10}--><em class="y1">LV.1</em><!--{elseif $thread['groupid'] == 21}--><em class="y1">LV.2</em><!--{elseif $thread['groupid'] == 22}--><em class="y1">LV.3</em><!--{elseif $thread['groupid'] == 23}--><em class="y1">LV.4</em><!--{elseif $thread['groupid'] == 24}--><em class="y1">LV.5</em><!--{elseif $thread['groupid'] == 25}--><em class="y1">LV.6</em><!--{/if}-->
				</span>
				<!--{else}--><!--{/if}-->
			</span>
			<span class="n5_mktbsj cl">$thread[dateline]����</span>
			<div class="n5_mktbyd cl">
				<span class="n5_mktbbk"><a href="forum.php?mod=forumdisplay&fid=$thread[fid]">#$list['forumnames'][$thread[fid]]['name']#</a></span>
			</div>
		</div>
	</div>
	<div class="n5_htnrys cl">
	    <div class="n5_htnrwz {if $xlmm_tp ==1}n5_htnrwa{/if} cl">
		    {if $xlmm_tp ==0 || $xlmm_tp >=2}<p class="n5_htnrbt cl"><a href="forum.php?mod=viewthread&tid=$thread[tid]&fromguid=hot&{if $_GET['archiveid']}archiveid={$_GET['archiveid']}&{/if}extra=$extra">{$thread[subject]}</a></p>
			<p class="n5_htnrjj cl"><a href="forum.php?mod=viewthread&tid=$thread[tid]&fromguid=hot&{if $_GET['archiveid']}archiveid={$_GET['archiveid']}&{/if}extra=$extra">$post['message']</a></p>{/if}
		</div>
		<!--{if $thread['attachment'] == 2}-->
		<div class="n5_htnrtp {if $xlmm_tp ==1}style1{elseif $xlmm_tp ==2}style2{elseif $xlmm_tp >=3}style3{/if} cl">
		    {if $xlmm_tp >=4}<div class="zttpsl cl"><span class="zttpsz">{eval echo $xlmm_tp}</span></div>{/if}
			<!--{loop $threadtable $value}--> 
				<!--{eval $imagelistkey = getforumimg($value[aid], 0, 250, 250); }--><a href="forum.php?mod=viewthread&tid=$thread[tid]&fromguid=hot&{if $_GET['archiveid']}archiveid={$_GET['archiveid']}&{/if}extra=$extra"><img src="$imagelistkey" class="imagelist"/></a>
			<!--{/loop}--> 
			{if $xlmm_tp ==1}
				<div class="ztyzjj cl">
					<h1><a href="forum.php?mod=viewthread&tid=$thread[tid]&fromguid=hot&{if $_GET['archiveid']}archiveid={$_GET['archiveid']}&{/if}extra=$extra">{$thread[subject]}</a></h1>
					<p><a href="forum.php?mod=viewthread&tid=$thread[tid]&fromguid=hot&{if $_GET['archiveid']}archiveid={$_GET['archiveid']}&{/if}extra=$extra">$post['message']</a></p>
				</div>
			{/if}
		</div>
		<!--{/if}-->
		<div class="n5_htnrxx cl">
		    <div class="n5_hthfcs n5_htnrsj cl"><a href="forum.php?mod=viewthread&tid=$thread[tid]&fromguid=hot&{if $_GET['archiveid']}archiveid={$_GET['archiveid']}&{/if}extra=$extra">{$thread[replies]}</a></div>
			<div class="n5_htdzcs n5_htnrsj cl"><a href="forum.php?mod=viewthread&tid=$thread[tid]&fromguid=hot&{if $_GET['archiveid']}archiveid={$_GET['archiveid']}&{/if}extra=$extra">{$thread[recommend_add]}</a></div>
			<div class="n5_htsccs n5_htnrsj cl"><a href="forum.php?mod=viewthread&tid=$thread[tid]&fromguid=hot&{if $_GET['archiveid']}archiveid={$_GET['archiveid']}&{/if}extra=$extra">$thread[views]</a></div>
		</div>
	</div>
	 
</div>  
<!--{/loop}-->
<!--{else}-->
<div class="n5_wnrts">
��û�л���
</div>
<!--{/if}-->
<!--{/loop}-->

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
	<a href="portal.php?mod=index" class="bottom_index">�۽�</a>
	<a href="forum.php?mod=guide&view=hot" class="bottom_history_on">����</a>
	<a onClick="toshare()" class="bottom_tansuo"><span></span></a>
	<a href="forum.php?mod=misc&action=nav" class="bottom_post">����</a>
	<a href="<!--{if $_G[uid]}-->home.php?mod=space&uid=$_G[uid]&do=profile&mycenter=1<!--{else}-->member.php?mod=logging&action=login<!--{/if}-->" class="bottom_member">�ҵ�<!--{if $_G[member][newprompt]}--><i>&nbsp;</i><!--{/if}--></a>
</div>
<div class="n5_dbcdy"></div>
<div class="n5_dbtstc">
    <!--{template common/n5_ts}-->
</div>
<a href="javascript:;" title="{lang scrolltop}" class="scrolltop bottom"></a>
<div class="n5_ssymdb">
</div>
<!--{eval $nofooter = true;}-->
<!--{template common/footer}-->