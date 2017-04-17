<?php echo '';exit;?>
<!--{eval $_G['home_tpl_titles'] = array('{lang pm}');}-->
<!--{template common/header}-->
<div class="n5_tbys cl">
    <a href="javascript:void(0);" onclick="return window.history.go(-1);" class="fhan">返回</a>
	<span class="dqym">我的消息</span>
	<a href="home.php?mod=space&do=pm&subop=setting" class="qtqh">设置</a>
</div>
<div class="n5_tbxj"></div>

<div class="n5_wdxxlb cl">
    <div class="n5_wdxxcd cl">
	    <div class="n5_xxcdys cl">
		<ul>
			<li$actives[privatepm] $actives[newpm]><a href="home.php?mod=space&do=pm&filter=privatepm">{lang private_pm}</a></li>
			<li$actives[announcepm] class="fxx"><a href="home.php?mod=space&do=pm&filter=announcepm">{lang announce_pm}</a></li>
			<li class="fxx"><a href="home.php?mod=spacecp&ac=pm">{lang send_pm}</a></li>
		</ul>
		</div>
	</div>
	
	        <!--消息内容-->

			<!--{if $_GET['subop'] == 'view'}-->



				<!--{if $list && $daterange && !$touid}-->
					<!--{if empty($lastanchor)}--><a name="last"></a><!--{eval $lastanchor=1;}--><!--{/if}-->
					<div class="pm_g cl">
						<h2 class="mbm xs2"><span class="xi1">$membernum</span> {lang pm_members_message} : <span class="xi2">$subject</span></h2>
						<div class="pm_sd">
							<ul class="pm_mem_l{if $authorid == $_G['uid']} pm_admin{/if}">
							<!--{loop $chatpmmemberlist $key $value}-->
								<li><a href="home.php?mod=space&uid=$value[uid]" target="_blank" {if $ols[$value[uid]]} class="xi2" title="{lang online}"{else} class="xg1"{/if}>$value[username]</a></li>
							<!--{/loop}-->
							</ul>
							<!--{if $authorid == $_G['uid']}-->
								<div class="pm_add cl">
									<input type="text" name="username" id="username" class="px z" value="" />
									<span class="z">&nbsp;</span>
									<a href="home.php?mod=spacecp&ac=pm&op=appendmember&plid=$plid" id="a_appendmember" class="pn z" title="{lang appendchatpmmember_comment}" onclick="getchatpmappendmember();"><span>+</span></a>
								</div>
							<!--{/if}-->
						</div>
						<div class="pm_mn">
							<div id="msglist" class="pm_b">
							<!--{loop $list $key $value}-->
								<p class="xg1 mbn"><a href="home.php?mod=space&uid=$value[authorid]" target="_blank" class="xi2">$value[author]</a> &nbsp; <!--{date($value[dateline], 'u')}--></p>
								<p class="mbm">$value[message]</p>
							<!--{/loop}-->
							</div>
							<script type="text/javascript">
							var refresh = true;
							var refreshHandle = -1;
							var autorefresh = {$refreshtime};
							</script>
							<script type="text/javascript">var forumallowhtml = 0,allowhtml = 0,allowsmilies = true,allowbbcode = parseInt('{$_G[group][allowsigbbcode]}'),allowimgcode = parseInt('{$_G[group][allowsigimgcode]}');var DISCUZCODE = [];DISCUZCODE['num'] = '-1';DISCUZCODE['html'] = [];</script>
							<script type="text/javascript" src="{$_G[setting][jspath]}bbcode.js?{VERHASH}"></script>
							<script type="text/javascript">
								var msgListObj = $('msglist');
								msgListObj.scrollTop = msgListObj.scrollHeight;
								function succeedhandle_pmsend(url, msg, values) {
									var pObj = document.createElement("p");
									pObj.className = 'xg1 mbn';
									pObj.innerHTML = '<a href="home.php?mod=space&uid=$_G[uid]" target="_blank" class="xi2">$_G[username]</a> &nbsp;'+ "{lang just_now}";
									var pObjmsg = document.createElement("p");
									pObjmsg.className = 'mbm';
									var pmMsg = $('replymessage');
									pObjmsg.innerHTML = bbcode2html(parseurl(pmMsg.value));
									msgListObj.appendChild(pObj);
									msgListObj.appendChild(pObjmsg);
									msgListObj.scrollTop = msgListObj.scrollHeight;
									pmMsg.value = "";
									showCreditPrompt();
								}

								function refreshMsg(refreshnow) {
									if(refresh) {
										if(autorefresh <= 0 || refreshnow){
											var x = new Ajax();
											x.get('home.php?mod=spacecp&ac=pm&op=showchatmsg&inajax=1&daterange=$daterange&plid=$plid', function(s){
												msgListObj.innerHTML = s;
												msgListObj.scrollTop = msgListObj.scrollHeight;
											});
											autorefresh = {$refreshtime};
										}
										<!--{if $refreshtime}-->
										$('refreshtip').innerHTML = autorefresh + ' {lang next_refresh}';
										<!--{/if}-->
										autorefresh -= 2;
									} else {
										window.clearInterval(refreshHandle);
									}
								}
								<!--{if $refreshtime}-->
								refreshHandle = window.setInterval('refreshMsg(0);', 2000);
								<!--{/if}-->
								hideMenu();
							</script>
						<!--/div/div-->
				<!--{elseif $list && !$daterange}-->
					<div id="pm_ul" class="n5_wdxxnr">
						<!--{loop $list $key $value}-->
							<!--{subtemplate home/space_pm_node}-->
						<!--{/loop}-->
						<div id="pm_append" style="display: none"></div>
					</div>
					<!--{if $multi}--><div class="pbm bbda cl">$multi</div><!--{/if}-->
				<!--{elseif $chatpmmemberlist}-->
					<!--{if $authorid == $_G['uid']}-->
						<div class="tbmu mtn tfm pmform cl">
							<script type="text/javascript" src="{$_G[setting][jspath]}home_friendselector.js?{VERHASH}"></script>
							<script type="text/javascript">
								var fs;
								var clearlist = 0;
							</script>
							<div class="cl">
								<div class="un_selector px z cl" onclick="$('username').focus();">
									<input type="text" name="username" id="username" autocomplete="off" />
								</div>
								<a href="home.php?mod=spacecp&ac=pm&op=appendmember&plid=$plid" id="a_appendmember" class="pn appendmb z" title="{lang appendchatpmmember_comment}" onclick="getchatpmappendmember();"><span class="z">{lang appendchatpmmember}</span></a>
								<a href="javascript:;" id="showSelectBox" class="z mtn showmenu" onclick="showMenu({'showid':this.id, 'duration':3, 'pos':'34!'});fs.showPMFriend('showSelectBox_menu','selectorBox', this);" title="{lang selectfromfriendlist}">{lang select_friend}</a>
							</div>
							<p class="d">{lang sendpm_tip}</p>
						</div>
						<div id="username_menu" style="display: none;">
							<ul id="friends" class="pmfrndl"></ul>
						</div>
						<div class="p_pof" id="showSelectBox_menu" unselectable="on" style="display:none;">
							<div class="pbm">
								<select class="ps" onchange="clearlist=1;getUser(1, this.value)">
									<option value="-1">{lang invite_all_friend}</option>
									<!--{loop $friendgrouplist $groupid $group}-->
										<option value="$groupid">$group</option>
									<!--{/loop}-->
								</select>
							</div>
							<div id="selBox" class="ptn pbn">
								<ul id="selectorBox" class="xl xl2 cl"></ul>
							</div>
							<div class="cl">
								<button type="button" class="y pn" onclick="fs.showPMFriend('showSelectBox_menu','selectorBox', $('showSelectBox'));doane(event)"><span>{lang close}</span></button>
							</div>
						</div>

						<script type="text/javascript">

							var page = 1;
							var gid = -1;
							var showNum = 0;
							var haveFriend = true;
							function getUser(pageId, gid) {
								page = parseInt(pageId);
								gid = isUndefined(gid) ? -1 : parseInt(gid);
								var x = new Ajax();
								x.get('home.php?mod=spacecp&ac=friend&op=getinviteuser&inajax=1&page='+ page + '&gid=' + gid + '&' + Math.random(), function(s) {
									var data = eval('('+s+')');
									var singlenum = parseInt(data['singlenum']);
									var maxfriendnum = parseInt(data['maxfriendnum']);
									fs.addDataSource(data, clearlist);
									haveFriend = singlenum && singlenum == 20 ? true : false;
									if(singlenum && fs.allNumber < 20 && fs.allNumber < maxfriendnum && maxfriendnum > 20 && haveFriend) {
										page++;
										getUser(page);
									}
								});
							}
							function selector() {
								var parameter = {'searchId':'username', 'showId':'friends', 'formId':'', 'showType':3, 'handleKey':'fs', 'selBox':'selectorBox', 'selBoxMenu':'showSelectBox_menu', 'maxSelectNumber':'20', 'selectTabId':'selectNum', 'unSelectTabId':'unSelectTab', 'maxSelectTabId':'remainNum'};
								fs = new friendSelector(parameter);
								var listObj = $('selBox');
								listObj.onscroll = function() {
									clearlist = 0;
									if(this.scrollTop >= this.scrollHeight/5) {
										page++;
										gid = isUndefined(gid) ? 0 : parseInt(gid);
										if(haveFriend) {
											getUser(page, gid);
										}
									}
								}
								getUser(page);
							}
							selector();
						</script>

					<!--{/if}-->
					<ul class="buddy cl">
						<li>
							<div class="avt"><a href="home.php?mod=space&uid=$authorid" title="$chatpmmemberlist[$authorid][username]" target="_blank" c="1"><em class="gm"></em><!--{avatar($authorid,small)}--></a></div>
							<h4><a href="home.php?mod=space&uid=$authorid" title="$chatpmmemberlist[$authorid][username]">$chatpmmemberlist[$authorid][username]</a></h4>
							<p class="maxh">$chatpmmemberlist[$authorid][recentnote]</p>
						</li>
					<!--{eval unset($chatpmmemberlist[$authorid]);}-->
					<!--{loop $chatpmmemberlist $key $value}-->
						<li>
							<div class="avt"><a href="home.php?mod=space&uid=$value[uid]" title="$value[username]" target="_blank" c="1"><!--{avatar($value[uid],small)}--></a></div>
							<h4><a href="home.php?mod=space&uid=$value[uid]" title="$value[username]">$value[username]</a></h4>
							<p class="maxh">$value[recentnote]</p>
							<!--{if $authorid == $_G['uid']}-->
								<p class="xg1"><a href="home.php?mod=spacecp&ac=pm&op=kickmember&memberuid=$key&plid=$plid" id="a_kickmmeber_$key" title="{lang kickmemberwho}" onclick="showWindow(this.id, this.href, 'get', 0);">{lang kickmember}</a></p>
							<!--{/if}-->
						</li>
					<!--{/loop}-->
					</ul>
				<!--{else}-->
					<div class="n5_wnrts">
						已经发送，点击上方“私人消息”查看
					</div>
				<!--{/if}-->

				
				
				<!--发布框-->

			<script src="template/zhikai_n5mobi/touch/style/js/jquery.emoticons.js" type="text/javascript"></script>
			<div id="n5_fbxxsr">
			    <div id="fbxxbqxs"></div>
			    <!--{if ($touid || $plid) && $list}-->
				<!--{if empty($lastanchor)}--><a name="last"></a><!--{/if}-->
				<form id="pmform" name="pmform" method="post" action="home.php?mod=spacecp&ac=pm&op=send&pmid=$pmid&daterange=$daterange&pmsubmit=yes&mobile=2" >
				<input type="hidden" name="formhash" value="{FORMHASH}" />
			    <!--{if !$touid}-->
			    <input type="hidden" name="plid" value="$plid" />
			    <!--{else}-->
			    <input type="hidden" name="touid" value="$touid" />
			    <!--{/if}-->
				<div class="n5_fxxbq"><a href="JavaScript:void(0)" id="message_face" class="n5_fxxbqa">&nbsp;</a></div>
				<div class="n5_fxxsr"><input type="text" value="" class="n5_fxxsrk" autocomplete="off" id="needmessage" name="message"></div>
				<div class="n5_fxxfb"><input type="button" name="pmsubmit" id="pmsubmit" class="formdialog button2" value="{lang reply}" /></div>
				</form>
			</div>
			<script type="text/javascript">
                $("#message_face").jqfaceedit({txtAreaObj:$("#needmessage"),containerObj:$('#fbxxbqxs')});
            </script>
				<!--{/if}-->
				<!--{if $list && $daterange && !$touid}-->
						</div>
					</div>
				<!--{/if}-->

				
			<!--公共消息阅读-->
			<!--{elseif $_GET['subop'] == 'viewg'}-->
				<!--{if $grouppm}-->
					<div id="pm_ul" class="n5_gzxxyd">
						<div class="bbda cl">
							<dd class="m z avt">
								<!--{if $grouppm[author]}-->
									<img src="template/zhikai_n5mobi/touch/style/glfbxx.png" alt="" />
								<!--{else}-->
									<img src="template/zhikai_n5mobi/touch/style/xtfbxx.png" alt="" />
								<!--{/if}-->
							</dd>
							<dd class="ptm z">
								<span class="xg2"><!--{if $grouppm['author']}-->{lang sendmultipmwho}<!--{else}-->{lang sendmultipmsystem}<!--{/if}--></span>
								<span class="xg1"><!--{date($grouppm[dateline], 'u')}--></span>
							</dd>
						</div>
						<div class="bbdb cl">
							<dd>
								<p class="pm_smry">$grouppm[message]</p>
							</dd>
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
				<!--{else}-->
					<div class="n5_wnrts">
						没有消息
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
				<!--{/if}-->

				
			<!--消息设置-->
			<!--{elseif $_GET['subop'] == 'setting'}-->
                <div class="n5_wdxxsz">
				<form id="pmsettingform" name="pmsettingform" method="post" autocomplete="off" action="home.php?mod=spacecp&ac=pm&op=setting">
					<table cellspacing="0" cellpadding="0" class="tfm mtm">
						<div class="sfjsxx">
							<div class="sfjsa">{lang pm_onlyacceptfriendpm}</div>
							<div class="sfjsb">
								<label class="lb"><input type="radio" name="onlyacceptfriendpm" class="pr" value="1"{if $acceptfriendpmstatus == 1} checked="checked"{/if} />{lang yes}</label>
								<label class="lb"><input type="radio" name="onlyacceptfriendpm" class="pr" value="2"{if $acceptfriendpmstatus == 2} checked="checked"{/if} />{lang no}</label>
							</div>
						</div>
						<div class="jjjsxx">
							<div class="jjjsa">{lang ignore_list}</div>
							<div class="jjjsb">
								<textarea id="ignorelist" name="ignorelist" cols="40" rows="3" class="pt" onkeydown="ctrlEnter(event, 'ignoresubmit');">$ignorelist</textarea>
								<div class="d">{lang ignore_member_pm_message}</div>
							</div>
						</div>
						<tr>
							<th></th>
							<td><button type="submit" name="settingsubmit" value="true" class="pn">{lang save}</button></td>
						</tr>
					</table>
					<input type="hidden" name="formhash" value="{FORMHASH}" />
				</form>
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
			<!--{else}-->

			    <!--消息列表-->
				<!--{if $count || $grouppms}-->
					<div class="n5_srxxlb">
						<ul>
							<!--{if $grouppms}-->
							<!--{loop $grouppms $grouppm}-->	
								<li>
									<div class="avatar_img z cl"><a href="home.php?mod=space&do=pm&subop=viewg&pmid=$grouppm[id]"><!--{if $grouppm[author]}--><img src="template/zhikai_n5mobi/touch/style/glfbxx.png" alt="" /><!--{else}--><img src="template/zhikai_n5mobi/touch/style/xtfbxx.png" alt="" /><!--{/if}--></a></div>
									<div class="wdxxlb cl">
									<span class="y"><!--{date($grouppm[dateline], 'u')}--></span>
									<!--{if $grouppm[author]}-->
										<a href="home.php?mod=space&do=pm&subop=viewg&pmid=$grouppm[id]">$grouppm[author]</a>
									<!--{else}-->
										<a href="home.php?mod=space&do=pm&subop=viewg&pmid=$grouppm[id]">$_G['setting']['sitename']</a>
									<!--{/if}-->
									<p>
										<span><a href="home.php?mod=space&do=pm&subop=viewg&pmid=$grouppm[id]">$grouppm[message]</a></span>
									</p>
									</div>
								</li>	
								
							<!--{/loop}-->
							<!--{/if}-->
							<!--{loop $list $key $value}-->
								<li>
									<div class="avatar_img z cl"><a href="{if $value[touid]}home.php?mod=space&do=pm&subop=view&touid=$value[touid]{else}home.php?mod=space&do=pm&subop=view&plid={$value['plid']}&type=1{/if}"><img src="<!--{if $value[pmtype] == 2}-->{STATICURL}image/common/grouppm.png<!--{else}--><!--{avatar($value[touid] ? $value[touid] : ($value[lastauthorid] ? $value[lastauthorid] : $value[authorid]), small, true)}--><!--{/if}-->" /></a></div>
									<div class="wdxxlb cl">
									<span class="y"><!--{date($value[dateline], 'u')}--></span>
									<!--{if $value[new]}--><span class="num">&nbsp;</span><!--{/if}-->
									<!--{if $value[touid]}-->
										<a href="{if $value[touid]}home.php?mod=space&do=pm&subop=view&touid=$value[touid]{else}home.php?mod=space&do=pm&subop=view&plid={$value['plid']}&type=1{/if}">{$value[tousername]}</span></a>
									<!--{elseif $value['pmtype'] == 2}-->
										<a href="{if $value[touid]}home.php?mod=space&do=pm&subop=view&touid=$value[touid]{else}home.php?mod=space&do=pm&subop=view&plid={$value['plid']}&type=1{/if}">{lang chatpm_author}:$value['firstauthor']</span></a>
									<!--{/if}-->
									<p>
										<span><a href="{if $value[touid]}home.php?mod=space&do=pm&subop=view&touid=$value[touid]{else}home.php?mod=space&do=pm&subop=view&plid={$value['plid']}&type=1{/if}"><!--{if $value['pmtype'] == 2}-->[{lang chatpm}]<!--{if $value[subject]}-->$value[subject]<br><!--{/if}--><!--{/if}--><!--{if $value['pmtype'] == 2 && $value['lastauthor']}--><div style="padding:0 0 0 20px;">......<br>$value['lastauthor'] : $value[message]</div><!--{else}-->$value[message]<!--{/if}--></a></span>
									</p>
									</div>
								</li>
							<!--{/loop}-->
						</ul>
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
				<!--{else}-->
					<div class="n5_wnrts">
						没有消息
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
				<!--{/if}-->

			<!--{/if}-->

		</div>

<div class="n5_ssymdb">
</div>
<!--{eval $nofooter = true;}-->
<!--{template common/footer}-->