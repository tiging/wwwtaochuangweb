<?php echo '';exit;?>
<!--{template common/header}-->
<script type="text/javascript" src="{$_G[setting][jspath]}common.js?{VERHASH}"></script>
<script type="text/javascript" src="{$_G['setting']['jspath']}forum_viewthread.js?{VERHASH}"></script>
<script type="text/javascript">zoomstatus = parseInt($_G['setting']['zoomstatus']);var imagemaxwidth = '{$_G['setting']['imagemaxwidth']}';</script>
<div class="n5_tbys cl">
    <a href="javascript:void(0);" onclick="return window.history.go(-1);" class="fhan">返回</a>
	<span class="dqym">公告</span>
</div>
<div class="n5_tbxj"></div>

<div class="n5_ggsx cl">
    <div class="n5_ggsxg">
	    <ul id="annonav">
		    <li class="cl{if empty($_GET[m])} a{/if}"><a href="forum.php?mod=announcement">{lang all}</a></li>
			<!--{loop $months $month}-->
		    <li class="cl{if $_GET[m] == $month[0].$month[1]} a{/if}"><a href="forum.php?mod=announcement&m=$month[0].$month[1]">$month[0] {lang year} $month[1] {lang month}</a></li>
			<!--{/loop}-->
		</ul>
	</div>
</div>
<script type="text/javascript">
<!--{if !empty($annid)}-->
	toggle_collapse('announce$annid', 1, 1);
<!--{/if}-->
	var a = $('annonav').getElementsByTagName('li');
	for(var i = 0, len = a.length; i < len; i++) {
		if(a[i].className.indexOf(' a') != -1) {
			var str = a[i].innerText || a[i].textContent;
			$('annofilter').innerHTML = '<h1 class="mt">' + str + '</h1>';
			break;
		}
	}
</script>

<div class="n5_ggnr cl">
<!--{loop $announcelist $ann}-->
<div class="n5_ggnb cl">
	<div id="announce$ann[id]_c" class="umh{if $messageid != $ann[id]} umn{/if}">
		<i>$ann[starttime]</i><h3 onclick="toggle_collapse('announce$ann[id]', 1, 1);">$ann[subject]</h3>
	</div>
	<div id="announce$ann[id]" class="um" style="display: none">
		<p class="mbn">{lang author}: <a href="home.php?mod=space&username=$ann[authorenc]" class="xi2">$ann[author]</a></p>
		$ann[message]
	</div>
</div>
<!--{/loop}-->
</div>

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