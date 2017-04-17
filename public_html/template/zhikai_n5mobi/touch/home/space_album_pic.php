<?php echo '';exit;?>
<!--{eval $_G['home_tpl_titles'] = array(getstr($pic['title'], 60, 0, 0, 0, -1), $album['albumname'], '{lang album}');}-->
<!--{eval $friendsname = array(1 => '{lang friendname_1}',2 => '{lang friendname_2}',3 => '{lang friendname_3}',4 => '{lang friendname_4}');}-->
	<!--{template common/header}-->
	<div class="n5_tbys cl">
        <a href="javascript:void(0);" onclick="return window.history.go(-1);" class="fhan">返回</a>
		<a class="qtqh"><!--{if $album[picnum]}-->{lang current_pic}<!--{/if}--></a>
	</div>
								<div class="vw pic n5_hyxcxq">

									<div id="photo_pic" class="c{if $pic[magicframe]} magicframe magicframe$pic[magicframe]{/if}">
										<!--{if $pic[magicframe]}-->
										<div class="pic_lb1">
											<table cellpadding="0" cellspacing="0" class="">
												<tr>
													<td class="frame_jiao frame_top_left"></td>
													<td class="frame_x frame_top_middle"></td>
													<td class="frame_jiao frame_top_right"></td>
												</tr>
												<tr>
													<td class="frame_y frame_middle_left"></td>
													<td class="frame_middle_middle">
														<!--{/if}--><a href="home.php?mod=space&uid=$pic[uid]&do=$do&picid=$nextid&goto=down#pic_block"><img src="$pic[pic]" id="pic" alt="" /></a>
														<script type="text/javascript">
															function createElem(e){
																var obj = document.createElement(e);
																obj.style.position = 'absolute';
																obj.style.zIndex = '1';
																obj.style.cursor = 'pointer';
																obj.onmouseout = function(){ this.style.background = 'none';}
																return obj;
															}
															function viewPhoto(){
																var pager = createElem('div');
																var pre = createElem('div');
																var next = createElem('div');
																var cont = $('photo_pic');
																var tar = $('pic');
																var space = 0;
																var w = tar.width/2;
																if(!!window.ActiveXObject && !window.XMLHttpRequest){
																	space = -(cont.offsetWidth - tar.width)/2;
																}
																var objpos = fetchOffset(tar);

																pager.style.position = 'absolute';
																pager.style.top = '0';
																pager.style.left = objpos['left'] + 'px';
																pager.style.top = objpos['top'] + 'px';
																pager.style.width = tar.width + 'px';
																pager.style.height = tar.height + 'px';
																pre.style.left = 0;
																next.style.right = 0;
																pre.style.width = next.style.width = w + 'px';
																pre.style.height = next.style.height = tar.height + 'px';
																pre.innerHTML = next.innerHTML = '<img src="{IMGDIR}/emp.gif" width="' + w + '" height="' + tar.height + '" />';

																pre.onmouseover = function(){ this.style.background = 'url({IMGDIR}/pic-prev.png) no-repeat 0 100px'; }
																pre.onclick = function(){ window.location = 'home.php?mod=space&uid=$pic[uid]&do=$do&picid=$upid&goto=up#pic_block'; }

																next.onmouseover = function(){ this.style.background = 'url({IMGDIR}/pic-next.png) no-repeat 100% 100px'; }
																next.onclick = function(){ window.location = 'home.php?mod=space&uid=$pic[uid]&do=$do&picid=$nextid&goto=down#pic_block'; }

																//cont.style.position = 'relative';
																cont.appendChild(pager);
																pager.appendChild(pre);
																pager.appendChild(next);
															}
															$('pic').onload = function(){
																viewPhoto();
															}
														</script>
														<!--{if $pic[magicframe]}-->
													</td>
													<td class="frame_y frame_middle_right"></td>
												</tr>
												<tr>
													<td class="frame_jiao frame_bottom_left"></td>
													<td class="frame_x frame_bottom_middle"></td>
													<td class="frame_jiao frame_bottom_right"></td>
												</tr>
											</table>
										</div>
										<!--{/if}-->
									</div>

									<div class="dqxpxx">
										<p id="a_set_title" class="albim_pic_title"><!--{if $pic[title]}-->$pic[title]<!--{else}--><!--{eval echo substr($pic['filename'], 0, strrpos($pic['filename'], '.'));}--><!--{/if}--><!--{if $pic[status] == 1}--><b>({lang moderate_need})</b><!--{/if}--></p>
										<p class="xg1 xs1">
											<!--{if $pic[hot]}--><span class="hot">{lang hot} <em>$pic[hot]</em></span><!--{/if}-->
											<!--{if $do=='event'}--><a href="home.php?mod=space&uid=$pic[uid]" target="_blank">$pic[username]</a><!--{/if}-->
											{lang upload_at} <!--{date($pic[dateline])}--> ($pic[size])
										</p>
										<!--{if isset($_GET['exif'])}-->
											<!--{if $exifs}-->
												<!--{loop $exifs $key $value}-->
													<!--{if $value}--><p>$key : $value</p><!--{/if}-->
												<!--{/loop}-->
											<!--{else}-->
												<p>{lang no_exif}</p>
											<!--{/if}-->
										<!--{/if}-->
									</div>

								</div>
								<!--[diy=diyclicktop]--><div id="diyclicktop" class="area"></div><!--[/diy]-->
								<!--{if $album[friend] != 3}-->
								<div id="click_div">
									<!--{template home/space_click}-->
								</div>
								<!--{/if}-->
							<div class="grxcpl">
								<div id="pic_comment" class="bm bw0 mtm mbm">
									<h3 class="pbn bbs">
										{lang comment}
									</h3>
									<div id="comment">
										<!--{if $cid}-->
										<div class="i">
											{lang current_comment}
										</div>
										<!--{/if}-->

										<div id="comment_ul" class="xld xlda">
										<!--{loop $list $k $value}-->
											<!--{template home/space_comment_li}-->
										<!--{/loop}-->
										</div>
									</div>
									<!--{if $multi}--><div class="pgs cl mtm">$multi</div><!--{/if}-->
								</div>
								<!--{if helper_access::check_module('album')}-->
								<form id="quickcommentform_{$picid}" name="quickcommentform_{$picid}" action="home.php?mod=spacecp&ac=comment&handlekey=qcpic_{$picid}" method="post" autocomplete="off" onsubmit="ajaxpost('quickcommentform_{$picid}', 'return_qcpic_{$picid}');doane(event);" class="bm bw0">
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
										<input type="hidden" name="refer" value="$theurl" />
										<input type="hidden" name="id" value="$picid" />
										<input type="hidden" name="idtype" value="picid" />
										<input type="hidden" name="commentsubmit" value="true" />
										<input type="hidden" name="quickcomment" value="true" />
										<button type="submit" name="commentsubmit_btn" value="true" id="commentsubmit_btn" class="pn"{if !$_G[uid]&&!$_G['group']['allowcomment']} onclick="showWindow(this.id, this.form.action);return false;"{/if}><strong>{lang comment}</strong></button>
										<span id="__quickcommentform_{$picid}"></span>
										<span id="return_qcpic_{$picid}"></span>
										<input type="hidden" name="formhash" value="{FORMHASH}" />
									</p>
								</form>
								<!--{/if}-->
						</div>


						<script type="text/javascript">
							function succeedhandle_qcpic_{$picid}(url, msg, values) {
								if(values['cid']) {
									comment_add(values['cid']);
								} else {
									$('return_qcpic_{$picid}').innerHTML = msg;
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

						<script type="text/javascript">
							var interval = 5000;
							var timerId = -1;
							var derId = -1;
							var replay = false;
							var num = 0;
							var endPlay = false;
							function forward() {
								window.location.href = 'home.php?mod=space&uid=$pic[uid]&do=$do&picid=$nextid&goto=down&play=1#pic_block';
							}
							function derivativeNum() {
								num++;
								$('displayNum').innerHTML = '[' + (interval/1000 - num) + ']';
							}
							function playNextPic(stat) {
								if(stat || replay) {
									derId = window.setInterval('derivativeNum();', 1000);
									$('displayNum').innerHTML = '[' + (interval/1000 - num) + ']';
									$('playid').onclick = function (){replay = false;playNextPic(false);};
									$('playid').innerHTML = '{lang stop_playing}';
									timerId = window.setInterval('forward();', interval);
								} else {
									replay = true;
									num = 0;
									if(endPlay) {
										$('playid').innerHTML = '{lang restart}';
									} else {
										$('playid').innerHTML = '{lang start_playing}';
									}
									$('playid').onclick = function (){playNextPic(true);};
									$('displayNum').innerHTML = '';
									window.clearInterval(timerId);
									window.clearInterval(derId);
								}
							}
							<!--{if $_GET['play']}-->
							<!--{if $sequence && $album['picnum']}-->
							if($sequence == $album[picnum]) {
								endPlay = true;
								playNextPic(false);
							} else {
								playNextPic(true);
							}
							<!--{else}-->
							playNextPic(true);
							<!--{/if}-->
							<!--{/if}-->

							function update_title() {
								$('title_form').style.display='';
							}

							var elems = selector('dd[class~=magicflicker]');
							for(var i=0; i<elems.length; i++){
								magicColor(elems[i]);
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