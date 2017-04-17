<?php echo '';exit;?>
<!--{eval $friendsname = array(1 => '{lang friendname_1}',2 => '{lang friendname_2}',3 => '{lang friendname_3}',4 => '{lang friendname_4}');}-->
<!--{template common/header}-->
<div class="n5_tbys cl">
    <a href="javascript:void(0);" onclick="return window.history.go(-1);" class="fhan">返回</a>
	<span class="dqym">相册</span>
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

		            <div class="n5_hyxczy">
						<!--{if $count}-->
						<ul>
							<!--{loop $list $key $value}-->
							<!--{eval $pwdkey = 'view_pwd_album_'.$value['albumid'];}-->
							<li>
								<div class="c">
									<a href="home.php?mod=space&uid=$value[uid]&do=album&id=$value[albumid]" {if $_G['adminid'] != 1 && $value[uid]!=$_G[uid] && $value[friend]=='4' && $value[password] && empty($_G[cookie][$pwdkey])} onclick="showWindow('list_album_$value[albumid]', this.href, 'get', 0);"{/if}><!--{if $value[pic]}--><img src="$value[pic]" alt="$value[albumname]" /><!--{/if}--></a>
								</div>
								<p class="ptn"><a href="home.php?mod=space&uid=$value[uid]&do=album&id=$value[albumid]" {if $_G['adminid'] != 1 && $value[uid]!=$_G[uid] && $value[friend]=='4' && $value[password] && empty($_G[cookie][$pwdkey])} onclick="showWindow('list_album_$value[albumid]', this.href, 'get', 0);"{/if} class="xi2"><!--{if $value[albumname]}-->$value[albumname]<!--{else}-->{lang default_album}<!--{/if}--></a><!--{if $value[picnum]}--> ($value[picnum]) <!--{/if}--></p>
								<!--{if $value[uid]==$_G[uid]}-->
								<!--{else}-->
									<p><a href="home.php?mod=space&uid=$value[uid]" >$value[username]</a></p>
								<!--{/if}-->
								<!--{if $_GET[view]!='me'}--><span>{lang update} <!--{date($value[updatetime], 'n-j H:i')}--></span><!--{/if}-->
							</li>
							<!--{/loop}-->
							<!--{if $space[self] && $_GET['view']=='me'}-->
							<li>
								<div class="c">
									<a href="home.php?mod=space&uid=$value[uid]&do=album&id=-1"><img src="{IMGDIR}/nophoto.gif" alt="{lang default_album}" /></a>
								</div>
								<p class="ptn xi2"><a href="home.php?mod=space&uid=$value[uid]&do=album&id=-1">{lang default_album}</a></p>
							</li>
							<!--{/if}-->
						</ul>
						<!--{if $multi}--><div class="pgs cl mtm">$multi</div><!--{/if}-->
						<!--{else}-->
							<!--{if $space[self] && $_GET['view']=='me'}-->
								<ul class="ml mla cl">
									<li>
										<div class="c">
											<a href="home.php?mod=space&uid=$value[uid]&do=album&id=-1"><img src="{IMGDIR}/nophoto.gif" alt="{lang default_album}" /></a>
										</div>
										<p class="ptn xi2"><a href="home.php?mod=space&uid=$value[uid]&do=album&id=-1">{lang default_album}</a></p>
									</li>
								</ul>
							<!--{else}-->
								<div class="n5_wnrts"><!--{if $space[self]}-->你<!--{else}-->$space[username]<!--{/if}-->还没有上传相片</div>
							<!--{/if}-->
			            <!--{/if}-->
		            </div>

<script type="text/javascript">
function fuidgoto(fuid) {
	var parameter = fuid != '' ? '&fuid='+fuid : '';
	window.location.href = 'home.php?mod=space&do=album&view=we'+parameter;
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