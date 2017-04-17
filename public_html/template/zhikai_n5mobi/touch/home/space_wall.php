<?php echo '';exit;?>
<!--{eval $_G['home_tpl_titles'] = array('{lang message}');}-->
<!--{template common/header}-->
<script type="text/javascript" src="{$_G[setting][jspath]}home.js?{VERHASH}"></script>
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<div class="n5_tbys cl">
    <a href="javascript:void(0);" onclick="return window.history.go(-1);" class="fhan">返回</a>
	<span class="dqym">留言</span>
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
		<!--{if empty($personalnv['banitems']['wall']) && helper_access::check_module('wall')}-->
		<!--{if helper_access::check_module('wall')}--><li><a href="home.php?mod=space&uid=$space[uid]&do=wall" class="kjcdly">留言</a></li><!--{/if}-->
		<!--{/if}-->
    </ul>
</div>
<script src="template/zhikai_n5mobi/touch/style/js/jquery.popmenu.js"></script>
    <script>
	    var jq = jQuery.noConflict(); 
        jq(function(){
            jq('.n5_tbys').popmenu({'background':'rgba(0,0,0,0.8)','focusColor':'#fff','borderRadius':'0'});
        })
    </script>
<div class="n5_tbxj"></div>

    <div class="n5_grkjly">
		<!--{if helper_access::check_module('wall')}-->
		<form id="quickcommentform_{$space[uid]}" action="home.php?mod=spacecp&ac=comment" method="post" autocomplete="off" onsubmit="ajaxpost('quickcommentform_{$space[uid]}', 'return_qcwall_$space[uid]');doane(event);">
			<div class="n5_lysr">
				<textarea id="comment_message" onkeydown="ctrlEnter(event, 'commentsubmit_btn');" name="message" rows="5" class="pt"></textarea>
			</div>
			<p>
				<input type="hidden" name="referer" value="home.php?mod=space&uid=$wall[uid]&do=wall" />
				<input type="hidden" name="id" value="$space[uid]" />
				<input type="hidden" name="idtype" value="uid" />
				<input type="hidden" name="handlekey" value="qcwall_{$space[uid]}" />
				<input type="hidden" name="commentsubmit" value="true" />
				<input type="hidden" name="quickcomment" value="true" />
				<button type="submit" name="commentsubmit_btn"value="true" id="commentsubmit_btn" class="pn">{lang leave_comments}</button>
				<span id="return_qcwall_{$space[uid]}"></span>
			</p>
			<input type="hidden" name="formhash" value="{FORMHASH}" />
		</form>
		<!--{/if}-->
		<div id="div_main_content" class="n5_lylb">
			<div id="comment">
				<!--{if $cid}-->
				<div class="i">
					{lang view_one_operation_message},<a href="home.php?mod=space&uid=$space[uid]&do=wall">{lang click_view_message}</a>
				</div>
				<!--{/if}-->
				<div id="comment_ul" class="xld xlda">
				<!--{loop $list $k $value}-->
					<!--{template home/space_comment_li}-->
				<!--{/loop}-->
				</div>
			</div>
			<div class="pgs cl mtm">$multi</div>
		</div>
		<script type="text/javascript">
			var elems = selector('dd[class~=magicflicker]');
			for(var i=0; i<elems.length; i++){
				magicColor(elems[i]);
			}
			function succeedhandle_qcwall_{$space[uid]}(url, msg, values) {
				wall_add(values['cid']);
			}
		</script>
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