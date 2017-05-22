<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('guide');?><?php include template('common/header'); ?><script src="template/zhikai_n5mobi/touch/style/js/TouchSlide.1.1.source.js" type="text/javascript"></script>
<script src="template/zhikai_n5mobi/touch/style/js/modernizr.custom.js" type="text/javascript"></script>	
<div class="n5_tbys cl">
    <a href="javascript:void(0);" onclick="return window.history.go(-1);" class="fhan">返回</a>
<span class="n5_tbqh"><ul><li class="a"><a href="">话题</a></li><li><a href="forum.php?forumlist=1">版块</a></li></ul></span>
<a href="search.php?mod=forum&amp;mobile=2" class="ssan"></a>
</div>
<div class="n5_tbxj"></div>

<?php if(!empty($_G['setting']['pluginhooks']['guide_top_mobile'])) echo $_G['setting']['pluginhooks']['guide_top_mobile'];?>

<div class="n5_sqhtcd cl">
    <ul id="thread_types">
<li <?php echo $currentview['hot'];?>><a href="forum.php?mod=guide&amp;view=hot">最新热门</a></li>
<li <?php echo $currentview['digest'];?>><a href="forum.php?mod=guide&amp;view=digest">最新精华</a></li>
<li <?php echo $currentview['newthread'];?>><a href="forum.php?mod=guide&amp;view=newthread">最新发表</a></li>
<li <?php echo $currentview['my'];?>><a id="filter_special" href="forum.php?mod=guide&amp;view=my" onmouseover="showMenu(this.id)">我的话题</a></li>
</ul>
</div>

<div class="n5_daodu cl"><?php if(is_array($data)) foreach($data as $key => $list) { if($list['threadcount']) { if(is_array($list['threadlist'])) foreach($list['threadlist'] as $key => $thread) { if($thread['moved']) { $thread[tid]=$thread[closed];?><?php } include_once libfile('function/post');
include_once libfile('function/attachment');
$thread['post'] = C::t('forum_post')->fetch_all_by_tid_position($thread['posttableid'],$thread['tid'],1);
$thread['post'] = array_shift($thread['post']);
$xlmm_tp = C::t('forum_attachment_n')->count_image_by_id('tid:'.$thread['post']['tid'], 'pid', $thread['post']['pid']);?><?php if($xlmm_tp ==1) { require_once libfile('function/post');$post = C::t('forum_post')->fetch_threadpost_by_tid_invisible($thread['tid']);$post['message'] = trim(messagecutstr($post['message'], 95));?> <?php } if($xlmm_tp ==0 || $xlmm_tp >=2) { require_once libfile('function/post');$post = C::t('forum_post')->fetch_threadpost_by_tid_invisible($thread['tid']);$post['message'] = trim(messagecutstr($post['message'], 82));?> <?php } ?> 
<?php if($xlmm_tp ==1) { $threadtable =  DB::fetch_all('SELECT * FROM '.DB::table('forum_attachment').' WHERE tid = '. $thread['tid'].' AND uid = '.$thread['authorid'] .' LIMIT  0 ,'. 1 );?> <?php } if($xlmm_tp ==2) { $threadtable =  DB::fetch_all('SELECT * FROM '.DB::table('forum_attachment').' WHERE tid = '. $thread['tid'].' AND uid = '.$thread['authorid'] .' LIMIT  0 ,'. 2 );?> <?php } if($xlmm_tp >=3) { $threadtable =  DB::fetch_all('SELECT * FROM '.DB::table('forum_attachment').' WHERE tid = '. $thread['tid'].' AND uid = '.$thread['authorid'] .' LIMIT  0 ,'. 3 );?> <?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['guide_list_mobile'][$key])) echo $_G['setting']['pluginhooks']['guide_list_mobile'][$key];?>
<div class="n5_htmk cl">
<div class="n5_htmktb cl">
    <div class="n5_mktbys cl">
    <div class="n5_mktbtx cl">
<?php if($thread['authorid'] && $thread['author']) { ?><a href="home.php?mod=space&amp;uid=<?php echo $thread['authorid'];?>"><?php echo avatar($thread[authorid],small);?></a><?php } else { ?><img src="template/zhikai_n5mobi/touch/style/nmyk.png"><?php } ?>
</div>
<span class="n5_mktbmc cl">
<span class="n5_mktbhy"><?php if($thread['authorid'] && $thread['author']) { ?><a href="home.php?mod=space&amp;uid=<?php echo $thread['authorid'];?>"><?php echo $thread['author'];?></a><?php } else { ?><?php echo $_G['setting']['anonymoustext'];?><?php } ?></span><?php $thread['groupid'] = DB::result_first('SELECT groupid FROM '.DB::table('common_member').' WHERE uid = '.$thread['authorid'] );?><?php if($thread['authorid'] && $thread['author']) { ?>
<span class="n5_hydj">
<?php if($thread['groupid'] == 1) { ?><em class="g1">管理员</em><?php } elseif($thread['groupid'] == 2) { ?><em class="g1">版主</em><?php } elseif($thread['groupid'] == 3) { ?><em class="g1">版主</em><?php } elseif($thread['groupid'] == 16) { ?><em class="g1">版主</em><?php } elseif($thread['groupid'] == 17) { ?><em class="g1">编辑</em><?php } elseif($thread['groupid'] == 18) { ?><em class="g1">编辑</em><?php } elseif($thread['groupid'] == 18) { ?><em class="g1">编辑</em> 
<?php } elseif($thread['groupid'] == 10) { ?><em class="y1">LV.1</em><?php } elseif($thread['groupid'] == 21) { ?><em class="y1">LV.2</em><?php } elseif($thread['groupid'] == 22) { ?><em class="y1">LV.3</em><?php } elseif($thread['groupid'] == 23) { ?><em class="y1">LV.4</em><?php } elseif($thread['groupid'] == 24) { ?><em class="y1">LV.5</em><?php } elseif($thread['groupid'] == 25) { ?><em class="y1">LV.6</em><?php } ?>
</span>
<?php } else { } ?>
</span>
<span class="n5_mktbsj cl"><?php echo $thread['dateline'];?>发布</span>
<div class="n5_mktbyd cl">
<span class="n5_mktbbk"><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $thread['fid'];?>">#<?php echo $list['forumnames'][$thread['fid']]['name'];?>#</a></span>
</div>
</div>
</div>
<div class="n5_htnrys cl">
    <div class="n5_htnrwz <?php if($xlmm_tp ==1) { ?>n5_htnrwa<?php } ?> cl">
    <?php if($xlmm_tp ==0 || $xlmm_tp >=2) { ?><p class="n5_htnrbt cl"><a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;fromguid=hot&amp;<?php if($_GET['archiveid']) { ?>archiveid=<?php echo $_GET['archiveid'];?>&amp;<?php } ?>extra=<?php echo $extra;?>"><?php echo $thread['subject'];?></a></p>
<p class="n5_htnrjj cl"><a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;fromguid=hot&amp;<?php if($_GET['archiveid']) { ?>archiveid=<?php echo $_GET['archiveid'];?>&amp;<?php } ?>extra=<?php echo $extra;?>"><?php echo $post['message'];?></a></p><?php } ?>
</div>
<?php if($thread['attachment'] == 2) { ?>
<div class="n5_htnrtp <?php if($xlmm_tp ==1) { ?>style1<?php } elseif($xlmm_tp ==2) { ?>style2<?php } elseif($xlmm_tp >=3) { ?>style3<?php } ?> cl">
    <?php if($xlmm_tp >=4) { ?><div class="zttpsl cl"><span class="zttpsz"><?php echo $xlmm_tp?></span></div><?php } if(is_array($threadtable)) foreach($threadtable as $value) { ?> <?php $imagelistkey = getforumimg($value[aid], 0, 250, 250);?><a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;fromguid=hot&amp;<?php if($_GET['archiveid']) { ?>archiveid=<?php echo $_GET['archiveid'];?>&amp;<?php } ?>extra=<?php echo $extra;?>"><img src="<?php echo $imagelistkey;?>" class="imagelist"/></a>
<?php } ?> 
<?php if($xlmm_tp ==1) { ?>
<div class="ztyzjj cl">
<h1><a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;fromguid=hot&amp;<?php if($_GET['archiveid']) { ?>archiveid=<?php echo $_GET['archiveid'];?>&amp;<?php } ?>extra=<?php echo $extra;?>"><?php echo $thread['subject'];?></a></h1>
<p><a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;fromguid=hot&amp;<?php if($_GET['archiveid']) { ?>archiveid=<?php echo $_GET['archiveid'];?>&amp;<?php } ?>extra=<?php echo $extra;?>"><?php echo $post['message'];?></a></p>
</div>
<?php } ?>
</div>
<?php } ?>
<div class="n5_htnrxx cl">
    <div class="n5_hthfcs n5_htnrsj cl"><a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;fromguid=hot&amp;<?php if($_GET['archiveid']) { ?>archiveid=<?php echo $_GET['archiveid'];?>&amp;<?php } ?>extra=<?php echo $extra;?>"><?php echo $thread['replies'];?></a></div>
<div class="n5_htdzcs n5_htnrsj cl"><a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;fromguid=hot&amp;<?php if($_GET['archiveid']) { ?>archiveid=<?php echo $_GET['archiveid'];?>&amp;<?php } ?>extra=<?php echo $extra;?>"><?php echo $thread['recommend_add'];?></a></div>
<div class="n5_htsccs n5_htnrsj cl"><a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;fromguid=hot&amp;<?php if($_GET['archiveid']) { ?>archiveid=<?php echo $_GET['archiveid'];?>&amp;<?php } ?>extra=<?php echo $extra;?>"><?php echo $thread['views'];?></a></div>
</div>
</div>
 
</div>  
<?php } } else { ?>
<div class="n5_wnrts">
还没有话题
</div>
<?php } } ?>

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
<a href="portal.php?mod=index" class="bottom_index">聚焦</a>
<a href="forum.php?mod=guide&amp;view=hot" class="bottom_history_on">话题</a>
<a onClick="toshare()" class="bottom_tansuo"><span></span></a>
<a href="forum.php?mod=misc&amp;action=nav" class="bottom_post">发布</a>
<a href="<?php if($_G['uid']) { ?>home.php?mod=space&uid=<?php echo $_G['uid'];?>&do=profile&mycenter=1<?php } else { ?>member.php?mod=logging&action=login<?php } ?>" class="bottom_member">我的<?php if($_G['member']['newprompt']) { ?><i>&nbsp;</i><?php } ?></a>
</div>
<div class="n5_dbcdy"></div>
<div class="n5_dbtstc">
    <?php include template('common/n5_ts'); ?></div>
<a href="javascript:;" title="返回顶部" class="scrolltop bottom"></a>
<div class="n5_ssymdb">
</div><?php $nofooter = true;?><?php include template('common/footer'); ?>