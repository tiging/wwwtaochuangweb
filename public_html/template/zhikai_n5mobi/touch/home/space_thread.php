<?php echo '';exit;?>
<!--{eval $_G['home_tpl_titles'] = array('{lang message}');}-->
<!--{template common/header}-->
<div class="n5_tbys cl">
    <a href="javascript:void(0);" onclick="return window.history.go(-1);" class="fhan">返回</a>
	<span class="dqym">主题/回复</span>
	<a class="kjcd">菜单</a>
	<ul id="demo_ul_2" class="n5_kjtcnr">
            <!--{if empty($personalnv['banitems']['profile'])}-->
		<li><a href="home.php?mod=space&uid=$space[uid]&do=profile" class="kjcdsy">首页</a></li>
		<!--{/if}-->
		<!--{if $_G['setting']['allowviewuserthread'] !== false && (empty($personalnv['banitems']['topic']))}-->
		<li><a href="home.php?mod=space&uid=$space[uid]&do=thread&view=me&from=space" class="kjcdzt">主题</a></li>
		<!--{/if}-->
		<!--{if empty($personalnv['banitems']['blog']) && helper_access::check_module('blog')}-->
		<li><a href="home.php?mod=space&uid=$space[uid]&do=blog&view=me&from=space" class="kjcdrz">日志</a></li>
		<!--{/if}-->
		<!--{if empty($personalnv['banitems']['album']) && helper_access::check_module('album')}-->
		<li><a href="home.php?mod=space&uid=$space[uid]&do=album&view=me&from=space" class="kjcdxc">相册</a></li>
		<!--{/if}-->
    </ul>
</div>
<script src="template/zhikai_n5mobi/touch/style/js/jquery.popmenu.js"></script>
    <script>
        $(function(){
            $('.n5_tbys').popmenu({'background':'rgba(0,0,0,0.8)','focusColor':'#fff','borderRadius':'0'});
        })
    </script>
<div class="n5_tbxj"></div>

<div class="n5_wdscxz cl">
    <div class="n5_wdscys cl">
    <ul id="n5_wdscgl">
        <li><a href="home.php?mod=space&uid=$space[uid]&do=thread&view=me&from=space">发布主题</a></li>
	    <li><a href="home.php?mod=space&do=thread&view=me&type=reply&uid=$space[uid]&from=space">参与回复</a></li>
	</ul>
	</div>
</div>

<script type="text/javascript" language="javascript">
var nav = document.getElementById("n5_wdscgl");
var links = nav.getElementsByTagName("li");
var lilen = nav.getElementsByTagName("a"); //判断地址
var currenturl = document.location.href;
var last = 0;
for (var i=0;i<links.length;i++)
{
   var linkurl =  lilen[i].getAttribute("href");
     if(currenturl.indexOf(linkurl)!=-1)
        {
         last = i;
        }
}
         links[last].className = "a";  //高亮代码样式
</script>

<!-- main threadlist start -->
<!--{if $list}-->
<div class="threadlist n5_wdztnr cl">
	<ul>
		<!--{loop $list $thread}-->
			<li>
			<!--{if $viewtype == 'reply' || $viewtype == 'postcomment'}-->
			<a href="forum.php?mod=redirect&goto=findpost&ptid=$thread[tid]&pid=$thread[pid]">$thread[subject]</a>
			<!--{else}-->
			<a href="forum.php?mod=viewthread&tid=$thread[tid]" {if $thread['displayorder'] == -1}class="grey"{/if}>$thread[subject]</a>
			<!--{/if}-->
			<span class="num">{$thread[replies]}</span>
			<!--{if in_array($thread['displayorder'], array(1, 2, 3, 4))}-->
				<span class="icon_top"><img src="template/zhikai_n5mobi/touch/style/ding.png" width="25"></span>
			<!--{elseif $thread['attachment'] == 2}-->
				<span class="icon_tu"><img src="template/zhikai_n5mobi/touch/style/tu.png" width="25"></span>
			<!--{/if}-->
			</li>
		<!--{/loop}-->
	</ul>
	$multi
</div>
	<!--{else}-->
		<div class="n5_wnrts">
            没有主题
        </div>
	<!--{/if}-->
<!-- main threadlist end -->

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
	<a href="<!--{if $_G[uid]}-->home.php?mod=space&uid=$_G[uid]&do=profile&mycenter=1<!--{else}-->member.php?mod=logging&action=login<!--{/if}-->" class="<!--{if $space[self]}-->bottom_member_on<!--{else}-->bottom_member<!--{/if}-->">我的<!--{if $_G[member][newprompt]}--><i>&nbsp;</i><!--{/if}--></a>
</div>
<div class="n5_dbcdy"></div>
<div class="n5_dbtstc">
    <!--{template common/n5_ts}-->
</div>
<div class="n5_ssymdb">
</div>
<!--{eval $nofooter = true;}-->
<!--{template common/footer}-->