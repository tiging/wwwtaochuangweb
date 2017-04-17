<?php echo '';exit;?>
<!--{template common/header}-->
<!--[name]{lang portalcategory_viewtplname}[/name]-->
<script type="text/javascript" src="{$_G['setting']['jspath']}forum_viewthread.js?{VERHASH}"></script>
<script type="text/javascript">zoomstatus = parseInt($_G['setting']['zoomstatus']), imagemaxwidth = '{$_G['setting']['imagemaxwidth']}', aimgcount = new Array();</script>

<div class="n5_tbys cl">
    <a href="javascript:void(0);" onclick="return window.history.go(-1);" class="fhan">返回</a>
	<span class="dqym">详情</span>
	<a href="search.php?mod=portal&mobile=2" class="ssan">搜索</a>
</div>
<div class="n5_tbxj"></div>

<div id="ct" class="ct2 wp cl n5_zxnr">
	<div class="mn">
		<div class="bm vw">
			<div class="h hm n5_zxbt">
				<h1 class="ph">$article[title]</h1>
				<p class="xg1">
					<i>作者: $article[username]</i>
					<i>{lang view_views}: <!--{if $article[viewnum] > 0}-->$article[viewnum]<!--{else}-->0<!--{/if}--></i>
				</p>
			</div>
			<div class="n5_wznr cl">
			    <!--{if $article[summary] && empty($cat[notshowarticlesummay])}-->
			    <div class="n5_wzzy"><strong>文章摘要：</strong>$article[summary]</div>
				<!--{/if}-->
				<div class="d">
				<table cellpadding="0" cellspacing="0" class="vwtb"><tr><td id="article_content" class="n5_nrzt">
					<!--{if $content[title]}-->
					<div class="vm_pagetitle xw1">$content[title]</div>
					<!--{/if}-->
					$content[content]
				</td></tr></table>
				<!--{if $multi}--><div class="ptw pbw cl">$multi</div><!--{/if}-->
				<!--{if !empty($contents)}-->
				<div id="inner_nav" class="ptn xs1">
					<h3>{lang article_inner_navigation}</h3>
					<ul class="xl xl2 cl">
						<!--{loop $contents $key $value}-->
						<!--{eval $curpage = $key+1;}-->
						<!--{eval $inner_view_url = helper_page::mpurl($viewurl, '&page=', $curpage);}-->
						<li>&bull; <a href="$inner_view_url"{if $key === $start} class="xi1"{/if}>{lang article_inner_page_pre} {$curpage} {lang article_inner_page} $value[title]</a></li>
						<!--{/loop}-->
					</ul>
				</div>
				<!--{/if}-->
			</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="{$_G[setting][jspath]}home.js?{VERHASH}"></script>
<div id="click_div">
    <!--{template home/space_click}-->
</div>

<!--{if $article['allowcomment']==1}-->
	<!--{eval $data = &$article}-->
	<!--{subtemplate portal/portal_comment}-->
<!--{/if}-->

<!--{if $_G['relatedlinks']}-->
	<script type="text/javascript">
		var relatedlink = [];
		<!--{loop $_G['relatedlinks'] $key $link}-->
		relatedlink[$key] = {'sname':'$link[name]', 'surl':'$link[url]'};
		<!--{/loop}-->
		relatedlinks('article_content');
	</script>
<!--{/if}-->

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