<?php echo '';exit;?>
<!--{eval $_G['home_tpl_titles'] = array('{lang remind}');}-->
<!--{template common/header}-->

<div style="position: relative; overflow: hidden;">
<!--{template common/n5mobi_cbl}-->

<style type="text/css">
.n5_tbys {background: none;}
</style>

<div class="n5_hykj">
    <div class="n5_tbys cl">
	    <a href="javascript:void(0);" onclick="return window.history.go(-1);" class="fhan">����</a>
	    <span class="dqym">��˽��ʾ</span>
    </div>
	<div class="n5_txdh cl">
	    <div class="n5_kjdh z cl">
		    <ul>
			    <!--{if empty($personalnv['banitems']['profile'])}-->
			    <li><a href="home.php?mod=space&uid=$space[uid]&do=profile">����</a></li>
				<!--{/if}-->
			    <!--{if $_G['setting']['allowviewuserthread'] !== false && (empty($personalnv['banitems']['topic']))}-->
			    <li><a href="home.php?mod=space&uid=$space[uid]&do=thread&view=me&from=space">����</a></li>
				<!--{/if}-->
				<!--{if empty($personalnv['banitems']['blog']) && helper_access::check_module('blog')}-->
				<li><a href="home.php?mod=space&uid=$space[uid]&do=blog&view=me&from=space">��־</a></li>
				<!--{/if}-->
				<!--{if empty($personalnv['banitems']['album']) && helper_access::check_module('album')}-->
				<li><a href="home.php?mod=space&uid=$space[uid]&do=album&view=me&from=space">���</a></li>
				<!--{/if}-->
				<!--{if empty($personalnv['banitems']['wall']) && helper_access::check_module('wall')}-->
				<!--{if helper_access::check_module('wall')}--><li><a href="home.php?mod=space&uid=$space[uid]&do=wall">����</a></li><!--{/if}-->
				<!--{/if}-->
			</ul>
		</div>
		<div class="n5_kjtx y cl">
	        <!--{avatar($space[uid],middle)}-->
		</div>
	</div>
</div>

<div class="n5_hyyssz">
��Ǹ�����ڸ��û�����˽���ã�����ʱ���ܲ鿴�����ݣ�������ѡ��
<a href="home.php?mod=spacecp&ac=friend&op=add&uid=$space[uid]&handlekey=addfriendhk_{$space[uid]}" id="a_friend_li_{$space[uid]}" onclick="showWindow(this.id, this.href, 'get', 0);">��$space[username]Ϊ����</a> <!--{if empty($personalnv['banitems']['wall']) && helper_access::check_module('wall')}--><!--{if helper_access::check_module('wall')}--><a href="home.php?mod=space&uid=$space[uid]&do=wall">���߸�$space[username]����</a><!--{/if}--><!--{/if}--> 
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
	<a href="portal.php?mod=index" class="bottom_index">�۽�</a>
	<a href="forum.php?mod=guide&view=hot" class="bottom_history">����</a>
	<a onClick="toshare()" class="bottom_tansuo"><span></span></a>
	<a href="forum.php?mod=misc&action=nav" class="bottom_post">����</a>
	<a href="<!--{if $_G[uid]}-->home.php?mod=space&uid=$_G[uid]&do=profile&mycenter=1<!--{else}-->member.php?mod=logging&action=login<!--{/if}-->" class="bottom_member_on">�ҵ�<!--{if $_G[member][newprompt]}--><i>&nbsp;</i><!--{/if}--></a>
</div>
<div class="n5_dbcdy"></div>
<div class="n5_dbtstc">
    <!--{template common/n5_ts}-->
</div>
<div class="n5_ssymdb">
</div>
<!--{template common/footer}-->
