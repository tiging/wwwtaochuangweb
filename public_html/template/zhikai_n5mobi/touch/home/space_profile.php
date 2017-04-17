<?php echo '';exit;?>
<!--{if $_GET['mycenter'] && !$_G['uid']}-->
	<!--{eval dheader('Location:member.php?mod=logging&action=login');exit;}-->
<!--{/if}-->
<!--{template common/header}-->
<!--{if !$_GET['mycenter']}-->

<style type="text/css">
.n5_tbys {background: rgba(0,0,0,0.1);}
</style>

<div class="n5_hykj <!--{if $space[self]}-->n5_hykjw<!--{else}-->n5_hykjb<!--{/if}-->">
	<div class="n5_tbys cl">
        <a href="javascript:void(0);" onclick="return window.history.go(-1);" class="fhan">返回</a>
		<div class="kjcd">菜单</div>
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

	<div class="n5_txdh cl">
	    <div class="n5_txdhb cl">
		    <div class="n5_kjtx z cl">
				<!--{avatar($space[uid],middle)}-->
			</div>
			<div class="n5_kjdh z cl">
			    <h2>$space[username] <!--{if $space['gender'] == 1}--><span class="n5_nan">&nbsp;</span><!--{elseif $space['gender'] == 2}--><span class="n5_nv">&nbsp;</span><!--{else}--><!--{/if}--></h2>
				<p><!--{if $sightml = strip_tags($space['sightml'])}-->{$sightml}<!--{else}-->该用户懒到没有签名！<!--{/if}--></p>
			</div>
		</div>
	</div>
</div>
<!--{hook/global_kongjian_mobile}-->
<div class="n5_wdkjzt cl">
	<div class="n5_hykjzl cl">
	    <ul>
		<li><i class="n5_fbztlj"><a href="home.php?mod=space&uid=$space[uid]&do=thread&view=me&from=space">$space[threads]个</a></i><a>发布主题</a></li>
		<li><i>{$space[group][grouptitle]}<!--{if !empty($space['groupexpiry'])}-->&nbsp;{lang group_useful_life}&nbsp;<!--{date($space[groupexpiry], 'Y-m-d H:i')}--><!--{/if}--></i><a>当前等级</a></li>
		<li><i class="n5_fbztlj"><a href="home.php?mod=space&uid=$space[uid]&do=share&view=me&from=space" class="hyewm">&nbsp;</a></i><a>二维码</a></li>
		<li><i>$space[oltime] {lang hours}</i><a>累计在线</a></li>
		<li><i>$space[lastvisit]</i><a>{lang last_visit}</a></li>
		<li class="wdwdx"><i>$space[regdate]</i><a>{lang regdate}</a></li>
        </ul>
	</div>
	<div class="n5_hyzlcz cl">
	    <ul>
			<!--{if $space[self]}-->
			<li class="n5_hyzlly"><a href="home.php?mod=spacecp&ac=profile">编辑资料</a></li>
			<!--{else}-->
			<!--{if $space[uid] != $_G[uid]}--><li class="n5_hyzlhy"><a href="home.php?mod=spacecp&ac=pm&touid={$space[uid]}">{lang send_pm}</a></li><!--{/if}-->
		    <li class="n5_hyzlly"><a href="home.php?mod=spacecp&ac=friend&op=add&uid=$space[uid]&handlekey=addfriendhk_{$space[uid]}" id="a_friend_li_{$space[uid]}" onclick="showWindow(this.id, this.href, 'get', 0);">{lang add_friend}</a></li>
			<!--{/if}-->
		</ul>
	</div>
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
	<a href="forum.php?mod=guide&view=hot" class="bottom_history">话题</a>
	<a onClick="toshare()" class="bottom_tansuo"><span></span></a>
	<a href="forum.php?mod=misc&action=nav" class="bottom_post">发布</a>
	<a href="<!--{if $_G[uid]}-->home.php?mod=space&uid=$_G[uid]&do=profile&mycenter=1<!--{else}-->member.php?mod=logging&action=login<!--{/if}-->" class="<!--{if $space[self]}-->bottom_member_on<!--{else}-->bottom_member<!--{/if}-->">我的<!--{if $_G[member][newprompt]}--><i>&nbsp;</i><!--{/if}--></a>
</div>
<div class="n5_dbcdy"></div>
<div class="n5_dbtstc">
    <!--{template common/n5_ts}-->
</div>
<!--{else}-->
			
<div class="n5_tbys cl">
    <a href="javascript:void(0);" onclick="return window.history.go(-1);" class="fhan">返回</a>
	<span class="dqym">个人中心</span>
	<a href="home.php?mod=space&uid={$_G[uid]}&do=profile&view=me&mobile=2" class="grzy">空间首页</a>
</div>
<div class="n5_tbxj"></div>
<!--{hook/global_geren_top_mobile}-->

<div class="n5_wdkjzt cl">
    <div class="n5_wdkjxx cl">
	    <div class="grtx cl z"><a href="home.php?mod=space&uid={$_G[uid]}&do=profile&view=me&mobile=2"><!--{avatar($_G[uid])}--></a></div>
		<div class="grxx cl z"><a href="home.php?mod=space&uid={$_G[uid]}&do=profile&view=me&mobile=2"><h2>$_G[username] <!--{eval $gender = getuserprofile("gender")}--><!--{if $gender == 1}--><span class="n5_nan">&nbsp;</span><!--{elseif $gender == 2}--><span class="n5_nv">&nbsp;</span><!--{else}--><!--{/if}--></h2><p><!--{if $_G['uid']}--><!--{if $sightml = strip_tags($space['sightml'])}-->{$sightml}<!--{else}-->该用户懒到没有签名！<!--{/if}--><!--{/if}--></p></a></div>
		<div class="grewm cl y"><a href="home.php?mod=spacecp&ac=magic&mobile=2">&nbsp;</a></div>
    </div>
	<!--{hook/global_gerenzj_top_mobile}-->
	
	<div class="n5_wdkjgn cl">
	    <ul>
			<li><a href="home.php?mod=space&uid={$_G[uid]}&do=favorite&view=me&type=thread" class="n5_kjgnsc"><i>&nbsp;</i>收藏&关注</a></li>
			<li class="wdwdx"><a href="home.php?mod=space&do=notice&view=mypost" class="n5_kjgntx"><i>&nbsp;</i>互动&提醒<!--{if $_G[member][newprompt]}--><span>$_G[member][newprompt]</span><!--{/if}--></a></li>
		</ul>
	</div>
	<div class="n5_wdkjgn cl">
	    <ul>
		    <li><a href="group.php?mod=my&view=join" class="n5_kjgnqz"><i>&nbsp;</i>我的群组</a></li>
			<li><a href="home.php?mod=space&do=pm" class="n5_kjgnxx"><i>&nbsp;</i>我的消息<!--{if $_G[member][newpm]}--><span>$_G[member][newpm]</span><!--{/if}--></a></li>
			<li><a href="home.php?mod=space&do=friend&mobile=2" class="n5_kjgnhy"><i>&nbsp;</i>我的好友</a></li>
			<li class="wdwdx"><a href="home.php?mod=spacecp&ac=credit" class="n5_kjgnjf"><i>&nbsp;</i>我的积分</a></li>
		</ul>
	</div>
	<div class="n5_wdkjgn cl">
	    <ul>
			<li><a href="home.php?mod=spacecp&ac=profile&op=password&mobile=2" class="n5_kjgnmm"><i>&nbsp;</i>密码安全</a></li>
		    <li><a href="home.php?mod=spacecp&ac=promotion&mobile=2" class="n5_kjgnfg"><i>&nbsp;</i>风格设置</a></li>
		    <li><a href="home.php?mod=spacecp&ac=index&mobile=2" class="n5_kjgngy"><i>&nbsp;</i>关于我们</a></li>
			<li class="wdwdx"><a href="member.php?mod=logging&action=logout&formhash={FORMHASH}" class="n5_kjgntc"><i>&nbsp;</i>退出登录</a></li>
		</ul>
	</div>
</div>
<!--{hook/global_geren_bottom_mobile}-->

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
<!--{/if}-->
<div class="n5_ssymdb">
</div>
<!--{eval $nofooter = true;}-->
<!--{template common/footer}-->