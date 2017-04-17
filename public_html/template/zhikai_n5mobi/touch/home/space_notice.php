<?php echo '';exit;?>
<!--{eval $_G['home_tpl_titles'] = array('{lang remind}');}-->
<!--{template common/header}-->
<div class="n5_tbys cl">
    <a href="javascript:void(0);" onclick="return window.history.go(-1);" class="fhan">返回</a>
	<span class="dqym">互动/提醒</span>
</div>
<div class="n5_tbxj"></div>

<div class="n5_kjhdtx cl">
	<div class="appl">
		<!--{subtemplate home/space_prompt_nav}-->
	</div>
	<div class="mn">
	    <div class="hdtxxcd cl">
			<ul>
				<!--{if $_G['notice_structure'][$view] && ($view == 'mypost' || $view == 'interactive')}-->
					<!--{loop $_G['notice_structure'][$view] $subtype}-->
						<li$readtag[$subtype]><a href="home.php?mod=space&do=notice&view=$view&type=$subtype"><!--{eval echo lang('template', 'notice_'.$view.'_'.$subtype)}--><!--{if $_G['member']['newprompt_num'][$subtype]}--><i>($_G['member']['newprompt_num'][$subtype])</i><!--{/if}--></a></li>
					<!--{/loop}-->
				<!--{else}-->
					<li class="a"><a href="home.php?mod=space&do=notice&view=$view"><!--{eval echo lang('template', 'notice_'.$view)}--></a></li>
				<!--{/if}-->
			</ul>
		</div>

		<!--{if $view=='userapp'}-->

			<script type="text/javascript">
				function manyou_add_userapp(hash, url) {
					if(isUndefined(url)) {
						$(hash).innerHTML = "<tr><td colspan=\"2\">{lang successfully_ignored_information}</td></tr>";
					} else {
						$(hash).innerHTML = "<tr><td colspan=\"2\">{lang is_guide_you_in}</td></tr>";
					}
					var x = new Ajax();
					x.get('home.php?mod=misc&ac=ajax&op=deluserapp&hash='+hash, function(s){
						if(!isUndefined(url)) {
							location.href = url;
						}
					});
				}
			</script>

			<div class="ct_vw cl">
				<div class="ct_vw_sd">
					<ul class="mtw">
						<!--{if $list}--><li><a href="home.php?mod=space&do=notice&view=userapp">{lang all_applications_news}</a></li><!--{/if}-->
						<!--{loop $apparr $type $val}-->
						<li class="mtn">
							<a href="home.php?mod=userapp&id=$val[0][appid]&uid=$space[uid]" title="$val[0][typename]"><img src="http://appicon.manyou.com/icons/$val[0][appid]" alt="$val[0][typename]" class="vm" /></a>
							<a href="home.php?mod=space&do=notice&view=userapp&type=$val[0][appid]"> <!--{eval echo count($val);}--> {lang unit} $val[0][typename] <!--{if $val[0][type]}-->{lang request}<!--{else}-->{lang invite}<!--{/if}--></a>
						</li>
						<!--{/loop}-->
					</ul>
				</div>
				<div class="ct_vw_mn">
					<!--{if $list}-->
						<!--{loop $list $key $invite}-->
							<h4 class="mtw mbm">
								<a href="home.php?mod=space&do=notice&view=userapp&op=del&appid=$invite[0][appid]" class="y xg1">{lang ignore_invitations_application}</a>
								<a href="home.php?mod=userapp&id=$invite[0][appid]&uid=$space[uid]" title="$apparr[$invite[0][appid]]"><img src="http://appicon.manyou.com/icons/$invite[0][appid]" alt="$apparr[$invite[0][appid]]" class="vm" /></a>
								{lang notice_you_have} <!--{eval echo count($invite);}--> {lang unit} $invite[0][typename] <!--{if $invite[0][type]}-->{lang request}<!--{else}-->{lang invite}<!--{/if}-->
							</h4>
							<div class="xld xlda">
							<!--{loop $invite $value}-->
								<dl class="bbda cl">
									<dd class="m avt mbn">
										<a href="home.php?mod=space&uid=$value[fromuid]"><!--{avatar($value[fromuid],small)}--></a>
									</dd>
									<dt id="$value[hash]">
										<div class="xw0 xi3">$value[myml]</div>
									</dt>
								</dl>
							<!--{/loop}-->
							</div>
						<!--{/loop}-->
						<!--{if $multi}--><div class="pgs cl">$multi</div><!--{/if}-->
					<!--{else}-->
						<div class="emp">{lang no_request_applications_invite}</div>
					<!--{/if}-->
				</div>
			</div>

		<!--{else}-->
			<!--{if empty($list)}-->
			<div class="n5_wnrts">
                没有提醒
            </div>
			<!--{/if}-->

			<script type="text/javascript">

				function deleteQueryNotice(uid, type) {
					var dlObj = $(type + '_' + uid);
					if(dlObj != null) {
						var id = dlObj.getAttribute('notice');
						var x = new Ajax();
						x.get('home.php?mod=misc&ac=ajax&op=delnotice&inajax=1&id='+id, function(s){
							dlObj.parentNode.removeChild(dlObj);
						});
					}
				}

				function errorhandle_pokeignore(msg, values) {
					deleteQueryNotice(values['uid'], 'pokeQuery');
				}
			</script>

			<!--{if $list}-->
				<div class="hdtxnr cl">
						<!--{loop $list $key $value}-->
							<dl class="cl {if $key==1}bw0{/if}" $value[rowid] notice="$value[id]">
								<div class="hdtxnrtx cl">
									<!--{if $value[authorid]}-->
									<a href="home.php?mod=space&uid=$value[authorid]"><!--{avatar($value[authorid],small)}--></a>
									<!--{else}-->
									<img src="{IMGDIR}/systempm.png" alt="systempm" />
									<!--{/if}-->
								</div>
								<div class="hdtxnryc cl">
									<dt class="hdtxnrsj cl">
										<span class="y"><a href="home.php?mod=spacecp&ac=common&op=ignore&authorid=$value[authorid]&type=$value[type]&handlekey=addfriendhk_{$value[authorid]}" id="a_note_$value[id]" onclick="showWindow(this.id, this.href, 'get', 0);" title="{lang shield}" class="hdtxpban">&nbsp;</a></span>
										<span class="sj"><!--{date($value[dateline], 'u')}--></span>
									</dt>
									<dd class="hdtxnrzw cl" style="$value[style]">
										$value[note]
									</dd>

									<!--{if $value[from_num]}-->
									<dd class="xg1 xw0">{lang ignore_same_notice_message}</dd>
									<!--{/if}-->
								</div>
							</dl>
						<!--{/loop}-->
				</div>

				<!--{if $view!='userapp' && $space[notifications]}-->
				<div class="mtm mbm"><a href="home.php?mod=space&do=notice&ignore=all">{lang ignore_same_notice_message} <em>&rsaquo;</em></a></div>
				<!--{/if}-->

				<!--{if $multi}--><div class="pgs cl">$multi</div><!--{/if}-->
			<!--{/if}-->

		<!--{/if}-->
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