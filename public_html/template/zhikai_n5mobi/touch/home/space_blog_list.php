<?php echo '';exit;?>
{eval
	$_G[home_tpl_spacemenus][] = "<a href=\"home.php?mod=space&uid=$space[uid]&do=blog&view=me\">{lang they_blog}</a>";
	$friendsname = array(1 => '{lang friendname_1}',2 => '{lang friendname_2}',3 => '{lang friendname_3}',4 => '{lang friendname_4}');
}

<!--{template common/header}-->
<div class="n5_tbys cl">
    <a href="javascript:void(0);" onclick="return window.history.go(-1);" class="fhan">����</a>
	<span class="dqym">��־</span>
	<a class="kjcd">�˵�</a>
	<ul id="demo_ul_2" class="n5_kjtcnr">
            <!--{if empty($personalnv['banitems']['profile'])}-->
		<li><a href="home.php?mod=space&uid=$space[uid]&do=profile" class="kjcdsy">��ҳ</a></li>
		<!--{/if}-->
		<!--{if $_G['setting']['allowviewuserthread'] !== false && (empty($personalnv['banitems']['topic']))}-->
		<li><a href="home.php?mod=space&uid=$space[uid]&do=thread&view=me&from=space" class="kjcdzt">����</a></li>
		<!--{/if}-->
		<!--{if empty($personalnv['banitems']['blog']) && helper_access::check_module('blog')}-->
		<li><a href="home.php?mod=space&uid=$space[uid]&do=blog&view=me&from=space" class="kjcdrz">��־</a></li>
		<!--{/if}-->
		<!--{if empty($personalnv['banitems']['album']) && helper_access::check_module('album')}-->
		<li><a href="home.php?mod=space&uid=$space[uid]&do=album&view=me&from=space" class="kjcdxc">���</a></li>
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

<!--{if $count}-->
<div class="n5_biognr">
	<!--{loop $list $k $value}-->
	<dl>
		<dt><a href="home.php?mod=space&uid=$value[uid]&do=blog&id=$value[blogid]">$value[subject]</a></h2></dt>
		<i>$value[dateline]</i>
		<dd>$value[message]</dd>
	</dl>
	<!--{/loop}-->
</div>
<!--{else}-->
	<div class="n5_wnrts">
        $space[username]��û��д��־
    </div>
<!--{/if}-->

<script type="text/javascript">
	function fuidgoto(fuid) {
		var parameter = fuid != '' ? '&fuid='+fuid : '';
		window.location.href = 'home.php?mod=space&do=blog&view=we'+parameter;
	}
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
	<a href="portal.php?mod=index" class="bottom_index">�۽�</a>
	<a href="forum.php?mod=guide&view=hot" class="bottom_history">����</a>
	<a onClick="toshare()" class="bottom_tansuo"><span></span></a>
	<a href="forum.php?mod=misc&action=nav" class="bottom_post">����</a>
	<a href="<!--{if $_G[uid]}-->home.php?mod=space&uid=$_G[uid]&do=profile&mycenter=1<!--{else}-->member.php?mod=logging&action=login<!--{/if}-->" class="<!--{if $space[self]}-->bottom_member_on<!--{else}-->bottom_member<!--{/if}-->">�ҵ�<!--{if $_G[member][newprompt]}--><i>&nbsp;</i><!--{/if}--></a>
</div>
<div class="n5_dbcdy"></div>
<div class="n5_dbtstc">
    <!--{template common/n5_ts}-->
</div>
<div class="n5_ssymdb">
</div>
<!--{eval $nofooter = true;}-->
<!--{template common/footer}-->