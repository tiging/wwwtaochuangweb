<?php echo '';exit;?>
<!--{template common/header}-->
<!--[name]{lang portalcategory_listtplname}[/name]-->
<!--{eval $list = array();}-->
<!--{eval $wheresql = category_get_wheresql($cat);}-->
<!--{eval $list = category_get_list($cat, $wheresql, $page);}-->

<div class="n5_tbys cl">
    <a href="javascript:void(0);" onclick="return window.history.go(-1);" class="fhan">返回</a>
	<span class="dqym">$cat[catname]</span>
	<a href="search.php?mod=portal&mobile=2" class="ssan">搜索</a>
</div>
<div class="n5_tbxj"></div>

<div class="n5_xwpd cl">
    <!--{if $cat[subs]}-->
    <div class="n5_pddh">
		<em>{lang sub_category}：</em>
	    <!--{eval $i = 1;}-->
			<!--{loop $cat[subs] $value}-->
			<a href="{$portalcategory[$value['catid']]['caturl']}" class="xi2">$value[catname]</a>
		    <!--{/loop}-->
	</div>
	<!--{/if}-->
	<div class="n5_xwlb">
	    <!--{loop $list['list'] $value}-->
		<!--{eval $highlight = article_title_style($value);}-->
		<!--{eval $article_url = fetch_article_url($value);}-->
        <li class="cl">
            <!--{if $value[pic]}--><div class="n5_xwtp"><a href="$article_url"><img src="$value[pic]" alt="$value[title]"/></a></div><!--{/if}-->
            <h3><a href="$article_url" title="$value[title]">$value[title]</a></h3>
            <p>$value[summary]</p>
        </li>
		<!--{/loop}-->
    </div>
</div>

<!--{if $list['multi']}--><div class="pgs cl">{$list['multi']}</div><!--{/if}-->

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
