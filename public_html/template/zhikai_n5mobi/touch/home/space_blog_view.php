<?php echo '';exit;?>
{eval
	$_G['home_tpl_titles'] = array($blog['subject'], '{lang blog}');
	$_G['home_tpl_spacemenus'][] = "<a href=\"home.php?mod=space&uid=$space[uid]&do=$do&view=me\">{lang they_blog}</a>";
	$_G['home_tpl_spacemenus'][] = "<a href=\"home.php?mod=space&uid=$space[uid]&do=blog&id=$blog[blogid]\">{lang view_blog}</a>";
	$friendsname = array(1 => '{lang friendname_1}',2 => '{lang friendname_2}',3 => '{lang friendname_3}',4 => '{lang friendname_4}');
}
<!--{template common/header}-->
<div class="n5_tbys cl">
    <a href="javascript:void(0);" onclick="return window.history.go(-1);" class="fhan">返回</a>
	<span class="dqym">详情</span>
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


<div class="n5_biogxx">

					<div class="vw mbm">
						<div class="h pbm">
							<h1 class="ph" {if $blog[magiccolor]} style="color: {$_G[colorarray][$blog[magiccolor]]}"{/if}>
								$blog[subject]
								<!--{if $blog[status] == 1}-->
									<span class="xi1">({lang pending})</span>
								<!--{/if}-->
							</h1>
							<p class="xg2">
								<!--{if $blog[viewnum]}--><span class="xg1">{lang have_read_blog}</span><!--{/if}-->
								<span class="xg1"><!--{date($blog[dateline])}--></span>
							</p>
							<!--{hook/space_blog_title}-->
						</div>
		
						<div id="blog_article" class="d cl">
							<!--{ad/blog/a_b}-->
							$blog[message]
						</div>
						<!--{if $blog[friend] != 3 && !$blog[noreply]}-->
						<div id="click_div">
							<!--{template home/space_click}-->
						</div>
						<!--{/if}-->
		
						<!--{if !empty($_G['setting']['pluginhooks']['space_blog_share_method'])}-->
							<div class="tshare cl">
								<strong>{lang viewthread_share_to}:</strong>
								<!--{hook/space_blog_share_method}-->
							</div>
						<!--{/if}-->
					</div>

					<div class="ct_vw cl">
						<div class="ct_vw_mn">
							<div id="div_main_content" class="mbm">
								<h3 class="ptn pbn bbs">
									{lang comment} <i>($blog[replynum])</i>
								</h3>
								<!--{if $cid}-->
								<div class="i">
									{lang current_blog_replay}<a href="home.php?mod=space&uid=$blog[uid]&do=blog&id=$blog[blogid]">{lang click_view_all}</a>
								</div>
								<!--{/if}-->
								<div id="comment_ul" class="xld xlda">
								<!--{loop $list $k $value}-->
									<!--{template home/space_comment_li}-->
								<!--{/loop}-->
								</div>
							</div>
							<!--{if $multi}--><div class="pgs cl mbm">$multi</div><!--{/if}-->
			
						<!--{if !$blog[noreply] && helper_access::check_module('blog')}-->
						<form id="quickcommentform_{$id}" action="home.php?mod=spacecp&ac=comment" method="post" autocomplete="off" onsubmit="ajaxpost('quickcommentform_{$id}', 'return_qcblog_$id');doane(event);">
							<div class="tedt mtn mbn">
								<div class="area">
									<!--{if $_G['uid'] || $_G['group']['allowcomment']}-->
										<textarea id="comment_message" onkeydown="ctrlEnter(event, 'commentsubmit_btn');" name="message" rows="3" class="pt"></textarea>
									<!--{else}-->
										<div class="pt hm">{lang login_to_comment} <a href="member.php?mod=logging&action=login" onclick="showWindow('login', this.href)" class="xi2">{lang login}</a> | <a href="member.php?mod={$_G[setting][regname]}" class="xi2">$_G['setting']['reglinkname']</a></div>
									<!--{/if}-->
								</div>
							</div>
							<!--{if $secqaacheck || $seccodecheck}-->
								<!--{block sectpl}--><sec> <span id="sec<hash>" onclick="showMenu(this.id);"><sec></span><div id="sec<hash>_menu" class="p_pop p_opt" style="display:none"><sec></div><!--{/block}-->
								<div class="mtm mbm sec"><!--{subtemplate common/seccheck}--></div>
							<!--{/if}-->
							<p class="pns">
								<input type="hidden" name="referer" value="home.php?mod=space&uid=$blog[uid]&do=$do&id=$id" />
								<input type="hidden" name="id" value="$id" />
								<input type="hidden" name="idtype" value="blogid" />
								<input type="hidden" name="handlekey" value="qcblog_{$id}" />
								<input type="hidden" name="commentsubmit" value="true" />
								<input type="hidden" name="quickcomment" value="true" />
								<button type="submit" name="commentsubmit_btn"value="true" id="commentsubmit_btn" class="pn"{if !$_G[uid]&&!$_G['group']['allowcomment']} onclick="showWindow(this.id, this.form.action);return false;"{/if}><strong>{lang comment}</strong></button>
								<span id="return_qcblog_{$id}"></span>
							</p>
							<input type="hidden" name="formhash" value="{FORMHASH}" />
						</form>
						<script type="text/javascript">
							function succeedhandle_qcblog_$id(url, msg, values) {
								if(values['cid']) {
									comment_add(values['cid']);
								} else {
									$('return_qcblog_{$id}').innerHTML = msg;
								}
								<!--{if $sechash}-->
									<!--{if $secqaacheck}-->
									updatesecqaa('$sechash');
									<!--{/if}-->
									<!--{if $seccodecheck}-->
									updateseccode('$sechash');
									<!--{/if}-->
								<!--{/if}-->
							}
						</script>
						<!--{/if}-->
			
						<script type="text/javascript">
						function addFriendCall(){
							var el = $('friendinput');
							if(!el || el.value == "")	return;
							var s = '<input type="checkbox" name="fusername[]" class="pc" value="'+el.value+'" id="'+el.value+'" checked="checked">';
							s += '<label for="'+el.value+'">'+el.value+'</label>';
							s += '<br />';
							$('friendscall').innerHTML += s;
							el.value = '';
						}
						resizeImg('div_main_content','450');
			
						var elems = selector('dd[class~=magicflicker]');
						for(var i=0; i<elems.length; i++){
							magicColor(elems[i]);
						}
						</script>
			
						</div>
					</div>
</div>



<!--{if $_G['relatedlinks']}-->
	<script type="text/javascript">
		var relatedlink = [];
		<!--{loop $_G['relatedlinks'] $key $link}-->
		relatedlink[$key] = {'sname':'$link[name]', 'surl':'$link[url]'};
		<!--{/loop}-->
		relatedlinks('blog_article');
	</script>
<!--{/if}-->

<!--{if !empty($_G['cookie']['clearUserdata']) && $_G['cookie']['clearUserdata'] == 'home'}-->
	<script type="text/javascript">saveUserdata('home', '')</script>
<!--{/if}-->

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
