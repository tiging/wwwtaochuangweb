<?php echo '';exit;?>
<!--{if empty($diymode)}-->
<!--{template common/header}-->
<div class="n5_tbys cl">
    <a href="javascript:void(0);" onclick="return window.history.go(-1);" class="fhan">返回</a>
	<span class="dqym">我的好友</span>
</div>
<div class="n5_tbxj"></div>

<div class="n5_wdscxz cl">
    <div class="n5_wdscys cl">
    <ul id="n5_wdscgl">
        <li{$a_actives[me]}><a href="home.php?mod=space&do=friend">全部好友</a></li>
	    <!--{if empty($_G['setting']['sessionclose'])}-->
		<li{$a_actives[onlinefriend]}><a href="home.php?mod=space&do=friend&view=online&type=friend">在线好友</a></li>
		<!--{/if}-->
	</ul>
	</div>
</div>
<script type="text/javascript" language="javascript">
				var nav = document.getElementById("n5_wdscgl");
				var links = nav.getElementsByTagName("li");
				var lilen = nav.getElementsByTagName("a"); //判断地址
				var currenturl = document.location.href;
				var last = 0;
				for (var i=0;i<links.length;i++)
				{
				   var linkurl =  lilen[i].getAttribute("href");
				     if(currenturl.indexOf(linkurl)!=-1)
				        {
				         last = i;
				        }
				}
				         links[last].className = "a";  //高亮代码样式
</script>

			<!--{if $space[self]}-->
			<!--{/if}-->
            <!--{else}-->
            <!--{/if}-->
			<!--{if $space[self]}-->
						<!--{if $list}-->
							<div class="n5_wdhylb">
								<ul class="cl">
								<!--{loop $list $key $value}-->
									<li id="friend_{$value[uid]}_li">
										<div class="avt">
											<a href="home.php?mod=space&uid=$value[uid]&do=profile&view=me&mobile=2">
												<!--{if $ols[$value[uid]]}--><em class="gol" title="{lang online} {date($ols[$value[uid]], 'H:i')}"></em><!--{/if}-->
												<!--{avatar($value[uid],middle)}-->
											</a>
										</div>
										<div class="ydb">
										<h4>
											<a href="home.php?mod=space&uid=$value[uid]&do=profile&view=me&mobile=2">$value[username]</a>
										</h4>
										<div class="xg1 stan">
										    <a href="home.php?mod=spacecp&ac=pm&touid=$value[uid]">发消息</a>
											<a href="home.php?mod=space&uid=$value[uid]&do=thread&view=me&from=space&mobile=2">主题</a>
										</div>
										</div>
									</li>
								<!--{/loop}-->
								</ul>
							</div>
							<!--{if $multi}--><div class="pgs cl mtm">$multi</div><!--{/if}-->
						<!--{else}-->
		                	<div class="n5_wnrts">
								没有好友
							</div>
						<!--{/if}-->
						<script type="text/javascript">
							function succeedhandle_followmod(url, msg, values) {
								var fObj = $(values['from']+values['fuid']);
								if(values['type'] == 'add') {
									fObj.innerHTML = '{lang follow_del}';
									fObj.className = 'flw_btn_unfo';
									fObj.href = 'home.php?mod=spacecp&ac=follow&op=del&fuid='+values['fuid']+'&from='+values['from'];
								} else if(values['type'] == 'del') {
									fObj.innerHTML = '{lang follow_add}TA';
									fObj.className = 'flw_btn_fo';
									fObj.href = 'home.php?mod=spacecp&ac=follow&op=add&hash={FORMHASH}&fuid='+values['fuid']+'&from='+values['from'];
								}
							}
						</script>
				<!--{if $groups}-->
				<!--{/if}-->
<!--{else}-->
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
	<a href="<!--{if $_G[uid]}-->home.php?mod=space&uid=$_G[uid]&do=profile&mycenter=1<!--{else}-->member.php?mod=logging&action=login<!--{/if}-->" class="bottom_member_on">我的<!--{if $_G[member][newprompt]}--><i>&nbsp;</i><!--{/if}--></a>
</div>
<div class="n5_dbcdy"></div>
<div class="n5_dbtstc">
    <!--{template common/n5_ts}-->
</div>
<div class="n5_ssymdb">
</div>
<!--{eval $nofooter = true;}-->
<!--{template common/footer}-->
