<?php echo '';exit;?>
<!--{template common/header}-->
<script type="text/javascript" src="template/zhikai_n5mobi/touch/style/js/jquery1.42.min.js"></script>
<script type="text/javascript" src="template/zhikai_n5mobi/touch/style/js/jquery.SuperSlide.2.1.1.js"></script>

<div class="n5_tbys cl">
    <a class="txan" href="<!--{if $_G[uid]}-->home.php?mod=space&uid=$_G[uid]&do=profile&mycenter=1<!--{else}-->member.php?mod=logging&action=login<!--{/if}-->"><div class="txxz cl"><!--{avatar($_G[uid])}--></div></a>
	<span class="logo"><img src="$_G['style']['logo��ַ']" alt="$_G['setting']['sitename']"></span>
	<a href="search.php?mod=forum&mobile=2" class="ssan"></a>
</div>
<div class="n5_tbxj"></div>
<!--{hook/global_jujiao_top_mobile}-->

<div class="n5_jujiao">
<!--
* �Ż�ģ�����������ճ����˵���·�
* ģ������������򡢲����á��ظ����ã���̨�Ż����ظ�����ģ�飩����������Ӫ����
* ��û�н��ж����޸ģ�֮�����ֻ��Ҫ������ļ����ݣ�������Ϻ��ٸ�������ļ���OK�����Ǹ����漰��������ļ�
-->

<script type="text/javascript" src="http://www.nvbing5.net/demo/nvbing5_n5mobi/api.php?mod=js&bid=4"></script>
<script type="text/javascript" src="http://www.nvbing5.net/demo/nvbing5_n5mobi/api.php?mod=js&bid=16"></script>
<script type="text/javascript" src="http://www.nvbing5.net/demo/nvbing5_n5mobi/api.php?mod=js&bid=15"></script>
<script type="text/javascript" src="http://www.nvbing5.net/demo/nvbing5_n5mobi/api.php?mod=js&bid=13"></script>
<script type="text/javascript" src="http://www.nvbing5.net/demo/nvbing5_n5mobi/api.php?mod=js&bid=17"></script>
<script type="text/javascript" src="http://www.nvbing5.net/demo/nvbing5_n5mobi/api.php?mod=js&bid=18"></script>
<script type="text/javascript" src="http://www.nvbing5.net/demo/nvbing5_n5mobi/api.php?mod=js&bid=19"></script>
<script type="text/javascript" src="http://www.nvbing5.net/demo/nvbing5_n5mobi/api.php?mod=js&bid=20"></script>
<script type="text/javascript" src="http://www.nvbing5.net/demo/nvbing5_n5mobi/api.php?mod=js&bid=21"></script>
<script type="text/javascript" src="http://www.nvbing5.net/demo/nvbing5_n5mobi/api.php?mod=js&bid=22"></script>
</div>

<!--{hook/global_jujiao_bottom_mobile}-->
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
	<a href="portal.php?mod=index" class="bottom_index_on">�۽�</a>
	<a href="forum.php?mod=guide&view=hot" class="bottom_history">����</a>
	<a onClick="toshare()" class="bottom_tansuo"><span></span></a>
	<a href="forum.php?mod=misc&action=nav" class="bottom_post">����</a>
	<a href="<!--{if $_G[uid]}-->home.php?mod=space&uid=$_G[uid]&do=profile&mycenter=1<!--{else}-->member.php?mod=logging&action=login<!--{/if}-->" class="bottom_member">�ҵ�<!--{if $_G[member][newprompt]}--><i>&nbsp;</i><!--{/if}--></a>
</div>
<div class="n5_dbcdy"></div>
<div class="n5_dbtstc">
    <!--{template common/n5_ts}-->
</div>

<!--{template common/footer}-->