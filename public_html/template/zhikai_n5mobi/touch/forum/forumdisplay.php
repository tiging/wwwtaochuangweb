<?php echo '';exit;?>
<!--{template common/header}-->
<link href="template/zhikai_n5mobi/touch/style/fl/mbfllb.css" type="text/css" rel="stylesheet">

<style type="text/css">
* { padding: 0; margin: 0; }
.am-shares { top: 0; left: 0; position: fixed; -webkit-transform: translateY(-100%); -ms-transform: translateY(-100%); transform: translateY(-100%); -webkit-transition: -webkit-transform 300ms; transition: transform 300ms ; width: 100%; z-index: 1110; }
.am-modal-actives { transform: translateY(0px);  -webkit-transform: translateY(0); -ms-transform: translateY(0); transform: translateY(0) }
.am-modal-out { z-index: 1109; -webkit-transform: translateY(-100%); -ms-transform: translateY(-100%); transform: translateY(-100%) }
.sharebgs { background-color: rgba(0, 0, 0, 0.6); bottom: 0; height: 100%; left: 0; opacity: 0; position: fixed; right: 0; top: 0; width: 100%; z-index: 1100; display:none; }
.sharebgs-active { opacity: 1; display:block; }

.n5_bkdbtc {background-color: #f8f8f8;border-radius: 0 0 2px 2px;padding: 20px 0;}
.n5_bkdbtc .n5_dbtczb {padding-bottom:20px;}
.n5_bkdbtc .n5_dbtczb h3 {border-bottom: 1px solid #fff;color: #555;font-weight: 400;margin-top: -20px;margin-bottom:10px;padding-top: 10px;background: #ECECEC;font-size: 16px;text-align: center;}
.n5_bkdbtc .n5_dbtczb h3::after {border-bottom: 1px solid #dfdfdf;content: "";display: block;height: 0;margin-top: 8px;width: 100%;}
.n5_bkdbtc .n5_dbtczb li {float: left;width: 50%;padding: 10px 0;overflow: hidden;}
.n5_bkdbtc .n5_dbtczb li .n5_dbbktp {position: relative;}
.n5_bkdbtc .n5_dbtczb li .n5_dbbktp img {margin: 0 10px;width: 45px;height: 45px;border-radius: 4px;}
.n5_bkdbtc .n5_dbtczb li .n5_dbbktp em {color: #fff;font-size: 9px;position: absolute;height: 14px;line-height: 16px;padding: 0 4px;-moz-border-radius: 8px;-webkit-border-radius: 8px;border-radius: 8px;top: -5px;left: -20px;}
.n5_bkdbtc .n5_dbtczb li h4 {font-size: 16px;font-weight: 400;}
.n5_bkdbtc .n5_dbtczb li p {font-size: 12px;color: #999;}
</style>

<script type="text/javascript">
	function toshare(){
		$(".am-shares").addClass("am-modal-actives");	
		if($(".sharebgs").length>0){
			$(".sharebgs").addClass("sharebgs-active");
		}else{
			$("body").append('<div class="sharebgs"></div>');
			$(".sharebgs").addClass("sharebgs-active");
		}
		$(".sharebgs-active,.share_btn").click(function(){
			$(".am-shares").removeClass("am-modal-actives");	
			setTimeout(function(){
				$(".sharebgs-active").removeClass("sharebgs-active");	
				$(".sharebgs").remove();	
			},300);
		})
	}	
</script>
<div class="n5_tbys cl">
    <a href="javascript:void(0);" onclick="return window.history.go(-1);" class="fhan">返回</a>
	<span class="dqym n5_zbkpdc" onClick="toshare()">$_G['forum'][name]</span>
	<a onclick="location.reload();" class="lbsx">刷新</a>
</div>
<div class="n5_tbxj"></div>
<!--{hook/forumdisplay_top_mobile}-->
<div class="am-shares">
    <div class="n5_bkdbtc cl">
	    <!--{if $subexists && $_G['page'] == 1}-->
	    <div class="n5_dbtczb cl">
		    <h3>下级版块</h3>
			<ul>
			    <!--{loop $sublist $sub}-->
				<!--{eval $forumurl = !empty($sub['domain']) && !empty($_G['setting']['domain']['root']['forum']) ? 'http://'.$sub['domain'].'.'.$_G['setting']['domain']['root']['forum'] : 'forum.php?mod=forumdisplay&fid='.$sub['fid'];}-->
			    <li>
				    <i class="n5_dbbktp"><!--{if $sub[icon]}-->$sub[icon]<!--{else}--><a href="$forumurl"><img src="template/zhikai_n5mobi/touch/style/bkbg.png" align="left"></a><!--{/if}--><!--{if $sub[todayposts] && !$sub['redirect']}--><em>$sub[todayposts]</em><!--{/if}--></i>
					<h4><a href="$forumurl"><!--{echo cutstr($sub[name],10)}--></a></h4>
					<p>主题:$sub[threads] 帖子:<!--{echo dnumber($sub[posts])}--></p>
				</li>
				<!--{/loop}-->
			</ul>	
        </div>
		<!--{/if}-->
		<div class="n5_ztsxn cl">
		    <ul>
		        <li {if !$_GET['filter']}class="a"{/if}><a href="forum.php?mod=forumdisplay&fid={$_G[fid]}">默认</a></li>
				<li {if  $_GET['filter'] && $_GET['orderby'] == 'dateline' && $_GET['filter'] != 'digest' }class="a"{/if}><a href="forum.php?mod=forumdisplay&fid={$_G[fid]}&filter=author&orderby=dateline" class="n5_ztsxns">新帖</a></li> 
				<li class="{if $_GET['filter'] == 'heat'}a{/if}"><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=heat&orderby=heats$forumdisplayadd[heat]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" class="n5_ztsxns">{lang order_heats}</a></li> 
				<li class="{if $_GET['filter'] == 'digest'} a{/if}"><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=digest&digest=1$forumdisplayadd[digest]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" class="n5_ztsxns">{lang digest_posts}</a></li>
		    </ul>
		</div>
	</div>
</div>



<div id="n5_bkxq" class="cl">
    <div class="bkxqbg"><img src="<!--{if $_G['forum'][icon]}-->data/attachment/common/$_G['forum'][icon]<!--{else}-->template/zhikai_n5mobi/touch/style/bkbg.jpg<!--{/if}-->" zsrc="<!--{if $_G['forum'][icon]}-->data/attachment/common/$_G['forum'][icon]<!--{else}-->template/zhikai_n5mobi/touch/style/bkbg.jpg<!--{/if}-->" style="display: inline; visibility: visible;"></div>
    <div class="bkxqnr">
	    <div class="bkxqtb"><img alt="$_G['forum'][name]" src="<!--{if $_G['forum'][icon]}-->data/attachment/common/$_G['forum'][icon]<!--{else}-->template/zhikai_n5mobi/touch/style/bkbg.png<!--{/if}-->"></div>
		<div class="bkxqsj">
		    <h3>$_G['forum'][name]<!--{if $_G[forum][rank]}--><span class="bkphxx">$_G[forum][rank]</span><!--{/if}--></h3>
		    <i>主题:$_G[forum][threads] 关注:$_G[forum][favtimes]</i>
			<p><!--{echo cutstr($_G['forum'][description],24)}--></p>

		</div>
		<div class="bkxqdy">
		    <!--{eval $xlmmlk=DB::fetch_first("SELECT * FROM  ".DB::table('home_favorite')." WHERE  uid=".$_G[uid]." and `idtype`='fid' and id=".$_G[fid]."");}--> 
            <!--{if $xlmmlk[id]}--><a class="bkxqan bkxqans" href="home.php?mod=space&uid={$_G[uid]}&do=favorite&view=me&type=forum">已关注</a><!--{else}--><a class="bkxqan dialog blue" href="home.php?mod=spacecp&ac=favorite&type=forum&id=$_G[fid]&handlekey=favoriteforum&formhash={FORMHASH}">关注</a><!--{/if}-->
		</div>
	</div>
</div>

<!--{if $_GET[filter] === 'sortid'}-->
<script src="template/zhikai_n5mobi/touch/style/js/popup_layer.js" type="text/javascript" language="javascript"></script>
<script language="javascript">
	$(document).ready(function() {
		new PopupLayer({trigger:"#ele6",popupBlk:"#blk6",closeBtn:"#close6",useOverlay:true});	
	});
</script>
<!--{/if}-->

<!--{if $_GET[filter] === 'sortid'}-->
<div class="n5_ztsxy cl"> <a href="javascript:;" class="sxysx" id="ele6" >信息筛选</a> 
<!--{if $_GET[orderby] === 'dateline'}--> 
<a href="forum.php?mod=forumdisplay&fid={$_G[fid]}&filter=sortid&sortid=$_GET['sortid']&orderby=lastpost" class="sxyzx">最新回复</a> 
<!--{else}--> 
<a href="forum.php?mod=forumdisplay&fid={$_G[fid]}&filter=sortid&sortid=$_GET['sortid']&orderby=dateline" class="sxyzx">最新发布</a> 
<!--{/if}--> 
</div>
<!--{else}-->

<!--{/if}-->

<!--{if $_GET[filter] === 'sortid'}-->
<div id="blk6" class="n5_sxysxtc" style="display:none;margin-top: -40px;">
<div class="n5_ztsxy cl"> <a href="javascript:void(0)" id="close6" class="sxysg" >信息筛选</a> 
<!--{if $_GET[orderby] === 'dateline'}--> 
<a href="forum.php?mod=forumdisplay&fid={$_G[fid]}&filter=sortid&sortid=$_GET['sortid']&orderby=lastpost" class="sxyzx">最新回复</a> 
<!--{else}--> 
<a href="forum.php?mod=forumdisplay&fid={$_G[fid]}&filter=sortid&sortid=$_GET['sortid']&orderby=dateline" class="sxyzx">最新发布</a> 
<!--{/if}--> 
</div>
<!--{subtemplate forum/search_sortoption}-->
</div>
<!--{/if}-->

<!--{if $quicksearchlist && !$_GET['archiveid']}-->
	<!--{/if}-->
    <!--{if ($_G['forum']['threadtypes'] && $_G['forum']['threadtypes']['listable']) || $_G['forum']['threadsorts']}-->
	    <!--{if $_G['forum']['threadtypes']}-->    
            <div class="n5_ztflsx cl">
			<div class="n5_ztflss cl">
            <ul>			
            <li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" class="<!--{if $_GET['filter'] != 'typeid'}-->a<!--{/if}-->">{lang forum_viewall}</a></li>
            <!--{loop $_G['forum']['threadtypes']['types'] $id $name}-->
                 <li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=typeid&typeid=$id$forumdisplayadd[typeid]" {if $_GET['filter'] == 'typeid' && $_GET['typeid'] == $id} class="a"{/if}>$name</a></li>
            <!--{/loop}-->
			</ul>
			</div>
			<div class="n5_lbhhjt"><span></span></div>
			</div>
        <!--{/if}-->
<!--{/if}-->
	
<!--{if $quicksearchlist && !$_GET['archiveid']}-->
	<!--{/if}-->
    <!--{if ($_G['forum']['threadtypes'] && $_G['forum']['threadtypes']['listable']) || $_G['forum']['threadsorts']}-->
        <!--{if $_G['forum']['threadsorts']}-->
			<div class="n5-ztfl cl">
			<ul>
            <!--{loop $_G['forum']['threadsorts']['types'] $id $name}-->
                <li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=sortid&sortid=$id$forumdisplayadd[sortid]" class="<!--{if $_GET[sortid] == $id}-->a<!--{/if}-->">$name</a></li>
            <!--{/loop}--> 
			</ul>
            </div>			
        <!--{/if}-->
<!--{/if}-->

<!--{if $livethread}-->
<div class="n5_ztlbzb">
    <h2><a href="forum.php?mod=viewthread&tid=$livethread[tid]">$livethread[subject]</a></h2>
	<p>$livemessage</p>
	<div class="n5_lbzbcy">
	    <a class="cyrs z">$livethread[replies]人参与直播</a>
	    <a href="forum.php?mod=viewthread&tid=$livethread[tid]" class="cyzb y">参与直播</a>
	</div>
</div>
<!--{/if}-->

<!-- main threadlist start -->
<!--{if !$subforumonly}-->
	
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

	<!--{if empty($_G['forum']['sortmode'])}-->
	<!--{if empty($_G['forum']['picstyle']) || $_G['cookie']['forumdefstyle']}-->
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
        <!--{hook/forumdisplay_thread_mobile $key}-->
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
        本版块或指定的范围内无主题
    </div>
	<!--{/if}-->
	$multipage
	<!--底部菜单-->
    <div id="n5_fbhfcd">
		<a href="forum.php?mod=post&action=newthread&fid=$_G[fid]" class="n5_lbdbfb">发布主题</a>
		<a href="forum.php?forumlist=1" class="n5_lbdbfh">社区版块</a>
    </div>
    <!--{else}-->

	<div class="n5_tpbk cl">
	<!--{loop $_G['forum_threadlist'] $key $thread}-->
	    <div class="n5_tpbkn cl">
		    <a href="forum.php?mod=viewthread&tid=$thread[tid]&extra=$extra" class="n5_tpbki">
			    <!--{if $thread['cover']}-->
                <img src="$thread[coverpath]" alt="$thread[subject]" />
                <!--{else}-->
                <img  src="template/zhikai_n5mobi/touch/style/n5_mytp.jpg" class=""/>
                <!--{/if}-->
			</a>
			<div class="n5_tpbks cl">$thread[cover]<p>照片</p></div>
			<div class="n5_tpbky cl">
			    <div class="n5_tpbkw z cl">
			        <div class="n5_tpbkt cl"><img src="uc_server/avatar.php?uid=$thread[authorid]&size=small"></div>
				</div>
				<div class="n5_tpbkd z cl">
				    <i><!--{echo cutstr({$thread[subject]},22)}--></i>
					<div class="n5_tpbkz"><div class="y cl"><span class="dianzan">$thread[recommend_add]</span><span class="huifu">{$thread[replies]}</span></div><div class="z cl">$thread[author]</div></div>
				</div>
			</div>
		</div>
	<!--{/loop}-->
	</div>
	$multipage
	<!--底部菜单-->
	<div id="n5_tpbkcd">
        <a href="home.php?mod=spacecp&ac=favorite&type=forum&id=$_G[fid]&handlekey=favoriteforum&formhash={FORMHASH}" class="n5_tpbksc">订阅</a>
		<a href="forum.php?mod=post&action=newthread&fid=$_G[fid]" class="n5_tpbkfb">发布</a>
		<a href="forum.php?forumlist=1" class="n5_tpbkfh">返回</a>
	</div>
	<div class="n5_ssymdb">
    </div>
	<!--{eval $nofooter = true;}-->
    <!--{/if}-->
	<!--{else}-->
	<!--{subtemplate forum/forumdisplay_sort}-->
	<!--底部菜单-->
	$multipage
	<div id="n5_fbhfcd">
		<a href="forum.php?mod=post&action=newthread&fid=$_G[fid]" class="n5_lbdbfb">发布信息</a>
		<a href="forum.php?forumlist=1" class="n5_lbdbfh">社区版块</a>
	</div>
	<!--{/if}-->
	
<!--{/if}-->
<!-- main threadlist end -->
<!--{hook/forumdisplay_bottom_mobile}-->
<a href="javascript:;" title="{lang scrolltop}" class="scrolltop bottom"></a>
<div class="n5_ssymdb">
</div>
<!--{eval $nofooter = true;}-->
<!--{template common/footer}-->