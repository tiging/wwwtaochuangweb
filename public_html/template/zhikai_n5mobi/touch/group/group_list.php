<?php echo '';exit;?>
<!--{if $_G['forum']['ismoderator']}-->
	<script type="text/javascript" src="{$_G[setting][jspath]}forum_moderate.js?{VERHASH}"></script>
<!--{/if}-->

<div class="n5_qzsydh cl">
    <ul>
	    <li><a href="group.php">首页</a></li>
	    <li class="a"><a href="forum.php?mod=forumdisplay&action=list&fid=$_G[fid]">列表</a></li>
		<li><a href="forum.php?mod=group&action=memberlist&fid=$_G[fid]">成员</a></li>
		<!--{if helper_access::check_module('group') && $status != 'isgroupuser'}-->
		<li><a href="forum.php?mod=group&amp;action=join&amp;fid=$_G[fid]">加入</a></li>
		<!--{else}-->
		<li><a href="forum.php?mod=group&amp;action=out&amp;fid=$_G[fid]">退出</a></li>
		<!--{/if}-->
		<li><a href="group.php?mod=my&view=join">我的</a></li>
	</ul>
</div>
<!--{hook/global_qzlb_mobile}-->

<!--群组主题分类-->
<!--{if $_G['forum']['threadtypes']}-->
<div class="n5-ztfls">
	<ul class="ttp bm cl">
		<li id="ttp_all"{if !$_GET['typeid']} class="xw1 a"{/if}><a href="forum.php?mod=forumdisplay&action=list&fid=$_G[fid]">{lang forum_viewall}</a></li>
		<!--{if $_G['forum']['threadtypes']}-->
			<!--{loop $_G['forum']['threadtypes']['types'] $id $name}-->
				<li{if $_GET['typeid'] == $id} class="xw1 a"{/if}><a href="forum.php?mod=forumdisplay&action=list&fid=$_G[fid]{if $_GET['typeid'] != $id}&filter=typeid&typeid=$id$forumdisplayadd[typeid]{/if}">$name</a>
			<!--{/loop}-->
		<!--{/if}-->
		<!--{hook/forumdisplay_filter_extra}-->
	</ul>
</div>
<!--{/if}-->

	<!--{if $_G['forum_threadcount']}-->
	<div class="n5_zdtys">
	    <ul>
			    <!--{loop $_G['forum_threadlist'] $key $thread}-->
				    <!--{if in_array($thread['displayorder'], array(1, 2, 3, 4))}-->
					    <li>
						    <i>$thread[dateline]</i>
					        <a href="forum.php?mod=viewthread&tid=$thread[tid]&extra=$extra">{$thread[subject]}</a>
					    </li>
					<!--{/if}-->
				<!--{/loop}-->
		</ul>
	</div>
	<!--{/if}-->
	<!--{if $_G['forum_threadcount']}-->
    <div class="threadlist n5-ztlb n5_daodu">
		<!--{loop $_G['forum_threadlist'] $key $thread}-->
		<!--{if !$_G['setting']['mobile']['mobiledisplayorder3'] && $thread['displayorder'] > 0}-->
			{eval continue;}
		<!--{/if}-->
        <!--{if $thread['displayorder'] > 0 && !$displayorder_thread}-->
            {eval $displayorder_thread = 1;}
        <!--{/if}-->
		<!--{if $thread['moved']}-->
		<!--{eval $thread[tid]=$thread[closed];}-->
		<!--{/if}-->
		<!--{if !in_array($thread['displayorder'], array(1, 2, 3, 4))> 0 }-->
		<!--{if $thread['moved']}--><!--{eval $thread[tid]=$thread[closed];}--><!--{/if}-->
		{eval include_once libfile('function/post');
include_once libfile('function/attachment');
$thread['post'] = C::t('forum_post')->fetch_all_by_tid_position($thread['posttableid'],$thread['tid'],1);
$thread['post'] = array_shift($thread['post']);
$xlmm_tp = C::t('forum_attachment_n')->count_image_by_id('tid:'.$thread['post']['tid'], 'pid', $thread['post']['pid']);
}		
		<div class="n5_htmk cl">
			<div class="n5_htmktb cl">
	    		<div class="n5_mktbys cl">
		   		    <!--{if in_array($thread['displayorder'], array(1, 2, 3, 4))}-->
				    <!--{elseif $thread['digest'] > 0}-->
					<span class="n5_mkztjh"><i class="n5_jhzt"></i></span>
					<!--{/if}-->
		  		    <div class="n5_mktbtx cl">
						<!--{if $thread['authorid'] && $thread['author']}--><a href="home.php?mod=space&uid=$thread[authorid]"><!--{avatar($thread[authorid],small)}--></a><!--{else}--><img src="template/zhikai_n5mobi/touch/style/nmyk.png"><!--{/if}-->
					</div>
					<span class="n5_mktbmc cl">
						<span class="n5_mktbhy"><!--{if $thread['authorid'] && $thread['author']}--><a href="home.php?mod=space&uid=$thread[authorid]">$thread[author]</a><!--{else}-->$_G[setting][anonymoustext]<!--{/if}--></span>
						<!--{eval $thread['groupid'] = DB::result_first('SELECT groupid FROM '.DB::table('common_member').' WHERE uid = '.$thread['authorid'] );}-->
						<!--{if $thread['authorid'] && $thread['author']}-->
						<span class="n5_hydj">
						<!--{if $thread['groupid'] == 1}--><em class="g1">管理员</em><!--{elseif $thread['groupid'] == 2}--><em class="g1">版主</em><!--{elseif $thread['groupid'] == 3}--><em class="g1">版主</em><!--{elseif $thread['groupid'] == 16}--><em class="g1">版主</em><!--{elseif $thread['groupid'] == 17}--><em class="g1">编辑</em><!--{elseif $thread['groupid'] == 18}--><em class="g1">编辑</em><!--{elseif $thread['groupid'] == 18}--><em class="g1">编辑</em> 
						<!--{elseif $thread['groupid'] == 10}--><em class="y1">LV.1</em><!--{elseif $thread['groupid'] == 21}--><em class="y1">LV.2</em><!--{elseif $thread['groupid'] == 22}--><em class="y1">LV.3</em><!--{elseif $thread['groupid'] == 23}--><em class="y1">LV.4</em><!--{elseif $thread['groupid'] == 24}--><em class="y1">LV.5</em><!--{elseif $thread['groupid'] == 25}--><em class="y1">LV.6</em><!--{/if}-->
						</span>
						<!--{else}--><!--{/if}-->
					</span>
					<span class="n5_mktbsj cl">$thread[dateline]发布</span>
				</div>
			</div>
			<div class="n5_htnrys cl">
				{if $xlmm_tp ==1}<!--{eval require_once libfile('function/post');$post = C::t('forum_post')->fetch_threadpost_by_tid_invisible($thread['tid']);$post['message'] = trim(messagecutstr($post['message'], 95));}--> {/if}
				{if $xlmm_tp ==0 || $xlmm_tp >=2}<!--{eval require_once libfile('function/post');$post = C::t('forum_post')->fetch_threadpost_by_tid_invisible($thread['tid']);$post['message'] = trim(messagecutstr($post['message'], 82));}--> {/if}
				{if $xlmm_tp ==1}<!--{eval  $threadtable =  DB::fetch_all('SELECT * FROM '.DB::table('forum_attachment').' WHERE tid = '. $thread['tid'].' AND uid = '.$thread['authorid'] .' LIMIT  0 ,'. 1 );}--> {/if}
				{if $xlmm_tp ==2}<!--{eval  $threadtable =  DB::fetch_all('SELECT * FROM '.DB::table('forum_attachment').' WHERE tid = '. $thread['tid'].' AND uid = '.$thread['authorid'] .' LIMIT  0 ,'. 2 );}--> {/if}
				{if $xlmm_tp >=3}<!--{eval  $threadtable =  DB::fetch_all('SELECT * FROM '.DB::table('forum_attachment').' WHERE tid = '. $thread['tid'].' AND uid = '.$thread['authorid'] .' LIMIT  0 ,'. 3 );}--> {/if}
				<div class="n5_htnrwz {if $xlmm_tp ==1}n5_htnrwa{/if} cl">
                    {if $xlmm_tp ==0 || $xlmm_tp >=2}<p class="n5_htnrbt cl"><!--{if $thread[special] ==0}--><!--{elseif $thread[special] ==1}--><em class="ts1">&nbsp;</em><!--{elseif $thread[special] ==2}--><em class="ts2">&nbsp;</em><!--{elseif $thread[special] ==3}--><em class="ts3">&nbsp;</em><!--{elseif $thread[special] ==4}--><em class="ts4">&nbsp;</em><!--{elseif $thread[special] ==5}--><em class="ts5">&nbsp;</em><!--{/if}--><a href="forum.php?mod=viewthread&tid=$thread[tid]&fromguid=hot&{if $_GET['archiveid']}archiveid={$_GET['archiveid']}&{/if}extra=$extra">{$thread[subject]}</a></p>
					<p class="n5_htnrjj cl"><a href="forum.php?mod=viewthread&tid=$thread[tid]&fromguid=hot&{if $_GET['archiveid']}archiveid={$_GET['archiveid']}&{/if}extra=$extra">$post['message']</a></p>{/if}
				</div>
				<!--{if $thread['attachment'] == 2}-->
				<div class="n5_htnrtp {if $xlmm_tp ==1}style1{elseif $xlmm_tp ==2}style2{elseif $xlmm_tp >=3}style3{/if} cl">
				    {if $xlmm_tp >=4}<div class="zttpsl cl"><span class="zttpsz">{eval echo $xlmm_tp}</span></div>{/if}
					<!--{loop $threadtable $value}--> 
					<!--{eval $imagelistkey = getforumimg($value[aid], 0, 300, 300); }--><a href="forum.php?mod=viewthread&tid=$thread[tid]&fromguid=hot&{if $_GET['archiveid']}archiveid={$_GET['archiveid']}&{/if}extra=$extra"><img src="$imagelistkey" class="imagelist"/></a>
					<!--{/loop}--> 
					{if $xlmm_tp ==1}
					<div class="ztyzjj cl">
					    <h1><!--{if $thread[special] ==0}--><!--{elseif $thread[special] ==1}--><em class="ts1">&nbsp;</em><!--{elseif $thread[special] ==2}--><em class="ts2">&nbsp;</em><!--{elseif $thread[special] ==3}--><em class="ts3">&nbsp;</em><!--{elseif $thread[special] ==4}--><em class="ts4">&nbsp;</em><!--{elseif $thread[special] ==5}--><em class="ts5">&nbsp;</em><!--{/if}--><a href="forum.php?mod=viewthread&tid=$thread[tid]&fromguid=hot&{if $_GET['archiveid']}archiveid={$_GET['archiveid']}&{/if}extra=$extra">{$thread[subject]}</a></h1>
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
		
		<!--{/if}-->
        <!--{/loop}-->
    </div>
	<!--{else}-->
	<div class="n5_wnrts">
        本群组或指定的范围内无主题
    </div>
	<!--{/if}-->
    $multipage
	
<!--发布按钮-->
<div id="n5_qzfban">
	<a href="forum.php?mod=post&action=newthread&fid=$_G[fid]" class="n5_lbdbfb"></a>
</div>

<a href="javascript:;" title="{lang scrolltop}" class="scrolltop bottom"></a>