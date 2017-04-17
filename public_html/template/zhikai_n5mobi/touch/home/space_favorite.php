<?php echo '';exit;?>
<!--{template common/header}-->

<div class="n5_tbys cl">
    <a href="javascript:void(0);" onclick="return window.history.go(-1);" class="fhan">返回</a>
	<span class="dqym">收藏/关注</span>
</div>
<div class="n5_tbxj"></div>


<div class="n5_wdscxz cl">
    <div class="n5_wdscys cl">
    <ul id="n5_wdscgl">
        <li><a href="home.php?mod=space&uid={$_G[uid]}&do=favorite&view=me&type=thread">主题收藏</a></li>
	    <li><a href="home.php?mod=space&uid={$_G[uid]}&do=favorite&view=me&type=forum">关注版块</a></li>
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

<div class="n5_wdscgd">
<!-- main collectlist start -->
<!--{if $_GET['type'] == 'forum'}-->

<!--{if $list}-->
<div class="coll_list b_radius n5_wdscbk">
	<ul>
		<!--{loop $list $k $value}-->
		<li><a class="y dialog blue" href="home.php?mod=spacecp&ac=favorite&op=delete&favid=$k">移除</a><a href="$value[url]">$value[title]</a></li>
		<!--{/loop}-->
	</ul>
</div>
<!--{else}-->
<div class="n5_wnrts">
没有关注版块
</div>
<!--{/if}-->
<!--{else}-->
<!--{if $list}-->
<div class="threadlist n5_wdsctz">
	<ul>
		<!--{loop $list $k $value}-->
		<li><a href="$value[url]">$value[title]</a></li>
		<!--{/loop}-->
	</ul>
</div>
<!--{else}-->
<div class="n5_wnrts">
没有收藏主题
</div>
<!--{/if}-->
<!--{/if}-->
<!-- main collectlist end -->
</div>
$multi

<script type="text/javascript">
	$('.favbtn').on('click', function() {
		var obj = $(this);
		$.ajax({
			type:'POST',
			url:obj.attr('href') + '&handlekey=favbtn&inajax=1',
			data:{'favoritesubmit':'true', 'formhash':'{FORMHASH}'},
			dataType:'xml',
		})
		.success(function(s) {
			popup.open(s.lastChild.firstChild.nodeValue);
			evalscript(s.lastChild.firstChild.nodeValue);
		})
		.error(function() {
			window.location.href = obj.attr('href');
			popup.close();
		});
		return false;
	});
</script>

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