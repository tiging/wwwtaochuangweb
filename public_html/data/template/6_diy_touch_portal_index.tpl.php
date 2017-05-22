<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('index');?><?php include template('common/header'); ?><script src="template/zhikai_n5mobi/touch/style/js/jquery1.42.min.js" type="text/javascript"></script>
<script src="template/zhikai_n5mobi/touch/style/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>

<div class="n5_tbys cl">
    <a class="txan" href="<?php if($_G['uid']) { ?>home.php?mod=space&uid=<?php echo $_G['uid'];?>&do=profile&mycenter=1<?php } else { ?>member.php?mod=logging&action=login<?php } ?>"><div class="txxz cl"><?php echo avatar($_G[uid]);?></div></a>
<span class="logo"><img src="<?php echo $_G['style']['logo地址'];?>" alt="<?php echo $_G['setting']['sitename'];?>"></span>
<a href="search.php?mod=forum&amp;mobile=2" class="ssan"></a>
</div>
<div class="n5_tbxj"></div>
<?php if(!empty($_G['setting']['pluginhooks']['global_jujiao_top_mobile'])) echo $_G['setting']['pluginhooks']['global_jujiao_top_mobile'];?>

<div class="n5_jujiao">
<!--
* 门户模块调用内容请粘贴至说明下方
* 模块可以随意排序、不调用、重复调用（后台门户中重复创建模块），以满足运营需求
* 如没有进行二次修改，之后更新只需要把这个文件备份，更新完毕后再覆盖这个文件就OK，除非更新涉及到了这个文件
-->

<script src="http://www.taochuangweb.com/api.php?mod=js&bid=73" type="text/javascript"></script>
<!--<script src="http://www.taochuangweb.com/api.php?mod=js&bid=76" type="text/javascript"></script>-->
<script src="http://www.taochuangweb.com/api.php?mod=js&bid=72" type="text/javascript"></script>
<script src="http://www.taochuangweb.com/api.php?mod=js&bid=75" type="text/javascript"></script>
<!--<script src="http://www.taochuangweb.com/api.php?mod=js&bid=74" type="text/javascript"></script>-->
<script src="http://www.taochuangweb.com/api.php?mod=js&bid=81" type="text/javascript"></script>
<script src="http://www.taochuangweb.com/api.php?mod=js&bid=80" type="text/javascript"></script>
<script src="http://www.taochuangweb.com/api.php?mod=js&bid=79" type="text/javascript"></script>
<!--<script src="http://www.taochuangweb.com/api.php?mod=js&bid=77" type="text/javascript"></script>-->
<script src="http://www.taochuangweb.com/api.php?mod=js&bid=78" type="text/javascript"></script>

</div>

<?php if(!empty($_G['setting']['pluginhooks']['global_jujiao_bottom_mobile'])) echo $_G['setting']['pluginhooks']['global_jujiao_bottom_mobile'];?>
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
<a href="portal.php?mod=index" class="bottom_index_on">聚焦</a>
<a href="forum.php?mod=guide&amp;view=hot" class="bottom_history">话题</a>
<a onClick="toshare()" class="bottom_tansuo"><span></span></a>
<a href="forum.php?mod=misc&amp;action=nav" class="bottom_post">发布</a>
<a href="<?php if($_G['uid']) { ?>home.php?mod=space&uid=<?php echo $_G['uid'];?>&do=profile&mycenter=1<?php } else { ?>member.php?mod=logging&action=login<?php } ?>" class="bottom_member">我的<?php if($_G['member']['newprompt']) { ?><i>&nbsp;</i><?php } ?></a>
</div>
<div class="n5_dbcdy"></div>
<div class="n5_dbtstc">
    <?php include template('common/n5_ts'); ?></div><?php include template('common/footer'); ?>