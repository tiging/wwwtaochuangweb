<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('discuz');?>
<?php if($_G['setting']['mobile']['mobilehotthread'] && $_GET['forumlist'] != 1) { dheader('Location:portal.php?mod=index');exit;?><?php } include template('common/header'); ?><script type="text/javascript">
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

<?php if($_GET['visitclient']) { ?>

<header class="header">
    <div class="nav">
<span>温馨提示</span>
    </div>
</header>
<div class="cl">
<div class="clew_con">
<h2 class="tit">掌上论坛手机客户端</h2>
<p>随时随地上论坛<input class="redirect button" id="visitclientid" type="button" value="点击下载" href="" /></p>
<h2 class="tit">iPhone,Andriod等智能手机</h2>
<p>直接登录手机版，阅读体验更佳<input class="redirect button" type="button" value="访问手机版" href="<?php echo $_GET['visitclient'];?>" /></p>
</div>
</div>
<script type="text/javascript">
var visitclienthref = getvisitclienthref();
if(visitclienthref) {
$('#visitclientid').attr('href', visitclienthref);
} else {
window.location.href = '<?php echo $_GET['visitclient'];?>';
}
</script>

<?php } else { ?>
<div class="n5_tbys cl">
    <a href="javascript:void(0);" onclick="return window.history.go(-1);" class="fhan">返回</a>
<span class="n5_tbqh"><ul><li><a href="forum.php?mod=guide&amp;view=hot">话题</a></li><li class="a"><a href="">版块</a></li></ul></span>
<a href="search.php?mod=forum&amp;mobile=2" class="ssan"></a>
</div>
<div class="n5_tbxj"></div>
<?php if(!empty($_G['setting']['pluginhooks']['index_top_mobile'])) echo $_G['setting']['pluginhooks']['index_top_mobile'];?>

<div class="n5_bbszt cl">
    <div class="n5_bbsfq">
    <ul class="tabs">
    <?php if(empty($gid) && !empty($forum_favlist)) { ?><li><a href="#tabdingyue">我的关注</a></li><?php } ?>
    <?php if(is_array($catlist)) foreach($catlist as $key => $cat) { ?><li><a href="#tab<?php echo $cat['fid'];?>"><?php echo $cat['name'];?></a></li>
<?php } ?>
        </ul>
</div>
<div class="n5_bbsbk">
    <?php if(empty($gid) && !empty($forum_favlist)) { ?>
    <div id="tabdingyue" class="tab_content" style="display: block; ">
<?php if(!empty($_G['setting']['pluginhooks']['index_bkwdgz_mobile'])) echo $_G['setting']['pluginhooks']['index_bkwdgz_mobile'];?>
<div id="sub_forum_dingyue" class="sub_forum bm_c">
<ul><?php $favorderid = 0;?>            <?php if(is_array($forum_favlist)) foreach($forum_favlist as $key => $favorite) { ?><li>
<?php if($favforumlist[$favorite['id']]) { $forum=$favforumlist[$favorite[id]];?><?php $forumurl = !empty($forum['domain']) && !empty($_G['setting']['domain']['root']['forum']) ? 'http://'.$forum['domain'].'.'.$_G['setting']['domain']['root']['forum'] : 'forum.php?mod=forumdisplay&fid='.$forum['fid'];?><?php if($forum['icon']) { ?>
<?php echo $forum['icon'];?>
<?php } else { ?>
<a href="<?php echo $forumurl;?>"<?php if($forum['redirect']) { ?> <?php } ?>><img src="template/zhikai_n5mobi/touch/style/forum.png"></a>
<?php } ?>
<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $forum['fid'];?>" class="btdb"><?php if($forum['todayposts'] > 0) { ?><span class="num"><?php echo $forum['todayposts'];?></span><?php } ?><?php echo $forum['name'];?></a>
<?php } ?>
<i><?php if(empty($forum['redirect'])) { ?>主题:<?php echo dnumber($forum['threads']); ?> 帖数:<?php echo dnumber($forum['posts']); } ?></i>
</li>
<?php } ?>
</ul>
<div class="n5_glwddy">
<a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>&amp;do=favorite&amp;view=me&amp;type=forum">管理关注的版块</a>
</div>
</div>
        </div>
<?php } ?>
    <?php if(is_array($catlist)) foreach($catlist as $key => $cat) { ?>        <div id="tab<?php echo $cat['fid'];?>" class="tab_content" style="display: block; ">
<div id="sub_forum_<?php echo $cat['fid'];?>" class="sub_forum bm_c">
<ul><?php if(is_array($cat['forums'])) foreach($cat['forums'] as $forumid) { $forum=$forumlist[$forumid];?><li>
<?php if($forum['icon']) { ?>
<?php echo $forum['icon'];?>
<?php } else { ?>
<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $forum['fid'];?>"><img src="template/zhikai_n5mobi/touch/style/forum.png" align="left" alt="<?php echo $forum['name'];?>" /></a>
<?php } ?>
<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $forum['fid'];?>" class="btdb"><?php if($forum['todayposts'] > 0) { ?><span class="num"><?php echo $forum['todayposts'];?></span><?php } ?><?php echo $forum['name'];?></a>
<i><?php if(empty($forum['redirect'])) { ?>主题:<?php echo dnumber($forum['threads']); ?> 帖数:<?php echo dnumber($forum['posts']); } ?></i>
</li>
<?php } ?>
</ul>
</div>
        </div>
        <?php } ?>
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

<?php if(!empty($_G['setting']['pluginhooks']['index_middle_mobile'])) echo $_G['setting']['pluginhooks']['index_middle_mobile'];?>
<?php } ?>

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
<div class="n5_ssymdb">
</div><?php $nofooter = true;?><?php include template('common/footer'); ?>