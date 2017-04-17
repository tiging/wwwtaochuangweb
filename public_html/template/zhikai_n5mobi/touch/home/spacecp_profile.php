<?php echo '';exit;?>
<!--{template common/header}-->
<script type="text/javascript" src="{$_G[setting][jspath]}common.js?{VERHASH}"></script>
<div class="n5_tbys cl">
    <a href="javascript:void(0);" onclick="return window.history.go(-1);" class="fhan">返回</a>
	<span class="dqym"><!--{if $operation == 'password'}-->密码安全<!--{else}-->编辑资料<!--{/if}--></span>
</div>
<div class="n5_tbxj"></div>
<!--{if $operation == 'password'}-->

<div class="n5_grmmaq">
<script type="text/javascript" src="{$_G[setting][jspath]}register.js?{VERHASH}"></script>
			<div class="n5_mmaqts">
				<!--{if !$_G['member']['freeze']}-->
					<p><!--{if !$_G['setting']['connect']['allow'] || !$conisregister}-->{lang old_password_comment}<!--{elseif $wechatuser}-->{lang wechat_config_newpassword_comment}<!--{else}-->{lang connect_config_newpassword_comment}<!--{/if}--></p>
				<!--{elseif $_G['member']['freeze'] == 1}-->
					<p>{lang freeze_pw_tips}</p>
				<!--{elseif $_G['member']['freeze'] == 2}-->
					<p>{lang freeze_email_tips}</p>
				<!--{/if}-->
				<p>如无需修改密码请勿填写<b>新密码</b></p>
			</div>
			<div class="n5_mmaqnr">
			<form action="home.php?mod=spacecp&ac=profile" method="post" autocomplete="off">
				<input type="hidden" value="{FORMHASH}" name="formhash" />
				<table summary="{lang memcp_profile}" cellspacing="0" cellpadding="0" class="tfm">
					<!--{if !$_G['setting']['connect']['allow'] || !$conisregister}-->
						<tr>
							<th>{lang old_password}<span class="rq" title="{lang required}">*</span></th>
							<td><input type="password" name="oldpassword" id="oldpassword" class="px" /></td>
						</tr>
					<!--{/if}-->
					<tr>
						<th>{lang new_password}</th>
						<td>
							<input type="password" name="newpassword" id="newpassword" class="px" />
						</td>
					</tr>
					<tr>
						<th>{lang new_password_confirm}</th>
						<td>
							<input type="password" name="newpassword2" id="newpassword2"class="px" />
						</td>
					</tr>
					<tr id="contact"{if $_GET[from] == 'contact'} style="background-color: {$_G['style']['specialbg']};"{/if}>
						<th>{lang email}</th>
						<td>
							<input type="text" name="emailnew" id="emailnew" value="$space[email]" class="px" />
							<p class="d">
								<!--{if empty($space['newemail'])}-->
									{lang email_been_active}
								<!--{else}-->
									$acitvemessage
								<!--{/if}-->
							</p>
							<!--{if $_G['setting']['regverify'] == 1 && (($_G['group']['grouptype'] == 'member' && $_G['adminid'] == 0) || $_G['groupid'] == 8) || $_G['member']['freeze']}--><p class="d">{lang memcp_profile_email_comment}</p><!--{/if}-->
						</td>
					</tr>

					<!--{if $_G['member']['freeze'] == 2}-->
					<tr>
						<th>{lang freeze_reason}</th>
						<td>
							<textarea rows="3" cols="80" name="freezereson" class="pt">$space[freezereson]</textarea>
							<p class="d" id="chk_newpassword2">{lang freeze_reason_comment}</p>
						</td>
					</tr>
					<!--{/if}-->

					<tr>
						<th>{lang security_question}</th>
						<td>
							<select name="questionidnew" id="questionidnew">
								<option value="" selected>{lang memcp_profile_security_keep}</option>
								<option value="0">{lang security_question_0}</option>
								<option value="1">{lang security_question_1}</option>
								<option value="2">{lang security_question_2}</option>
								<option value="3">{lang security_question_3}</option>
								<option value="4">{lang security_question_4}</option>
								<option value="5">{lang security_question_5}</option>
								<option value="6">{lang security_question_6}</option>
								<option value="7">{lang security_question_7}</option>
							</select>
							<p class="d">{lang memcp_profile_security_comment}</p>
						</td>
					</tr>

					<tr>
						<th>{lang security_answer}</th>
						<td>
							<input type="text" name="answernew" id="answernew" class="px" />
							<p class="d">{lang memcp_profile_security_answer_comment}</p>
						</td>
					</tr>
					<!--{if $secqaacheck || $seccodecheck}-->
					</table>
						<!--{eval $sectpl = '<table cellspacing="0" cellpadding="0" class="tfm"><tr><th><sec></th><td><sec><p class="d"><sec></p></td></tr></table>';}-->
						<!--{subtemplate common/seccheck}-->
					<table summary="{lang memcp_profile}" cellspacing="0" cellpadding="0" class="tfm">
					<!--{/if}-->
					<tr>
						<button type="submit" name="pwdsubmit" value="true" class="pn pnc" />{lang save}</button>
					</tr>
				</table>
				<input type="hidden" name="passwordsubmit" value="true" />
			</form>
			<script type="text/javascript">
				var strongpw = new Array();
				<!--{if $_G['setting']['strongpw']}-->
					<!--{loop $_G['setting']['strongpw'] $key $val}-->
					strongpw[$key] = $val;
					<!--{/loop}-->
				<!--{/if}-->
				var pwlength = <!--{if $_G['setting']['pwlength']}-->$_G['setting']['pwlength']<!--{else}-->0<!--{/if}-->;
				checkPwdComplexity($('newpassword'), $('newpassword2'), true);
			</script>
			</div>
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
	<a href="<!--{if $_G[uid]}-->home.php?mod=space&uid=$_G[uid]&do=profile&mycenter=1<!--{else}-->member.php?mod=logging&action=login<!--{/if}-->" class="bottom_member_on">我的<!--{if $_G[member][newprompt]}--><i>&nbsp;</i><!--{/if}--></a>
</div>
<div class="n5_dbcdy"></div>
<div class="n5_dbtstc">
    <!--{template common/n5_ts}-->
</div>
<div class="n5_ssymdb">
</div>

<!--{else}-->
<div class="n5_grbjzl cl">
          <iframe id="frame_profile" name="frame_profile" style="display: none"></iframe>
			<form action="{if $operation != 'plugin'}home.php?mod=spacecp&ac=profile&op=$operation{else}home.php?mod=spacecp&ac=plugin&op=profile&id=$_GET[id]{/if}" method="post" enctype="multipart/form-data" autocomplete="off"{if $operation != 'plugin'} target="frame_profile"{/if} onsubmit="clearErrorInfo();">
				<input type="hidden" value="{FORMHASH}" name="formhash" />
				<table cellspacing="0" cellpadding="0" class="tfm" id="profilelist">
                <!--{if in_array('zhikai_avatar',$_G['setting']['plugins']['available'])}-->
				<tr class="n5_zlbjxm">
					<th id="th_sightml" class="bjxma">修改头像</th>
					<td id="td_sightml" class="bjxmb">
						<a href="plugin.php?id=zhikai_avatar"><!--{avatar($_G[uid])}--></a>
					</td>
				</tr>
				<!--{/if}-->
				
				<!--{loop $settings $key $value}-->
					<tr id="tr_$key" class="n5_zlbjxm">
						<th id="th_$key" class="bjxma">$value[title]</th>
						<td id="td_$key" class="bjxmb">
							$htmls[$key]
						</td>
					</tr>
				<!--{/loop}-->

				<!--签名-->

				<tr class="n5_zlbjxm">
					<th id="th_sightml" class="bjxma">{lang personal_signature}</th>
					<td id="td_sightml" class="bjxmb">
						<textarea rows="3" cols="80" name="sightml" id="sightmlmessage" class="pt" onkeydown="ctrlEnter(event, 'profilesubmitbtn');">$space[sightml]</textarea>
					</td>
				</tr>
				
				<script type="text/javascript" src="template/zhikai_n5mobi/touch/style/js/ziliaotishi.js"></script>
					<script>
					function clickhide(){
						ZENG.msgbox._hide();
					}
					function clickautohide(i){
						var tip = "";
						switch(i){
							case 4:
								tip = "资料更新成功";
							break;
						}
						ZENG.msgbox.show(tip, i, 2000);
					}
					</script>
				<!--保存按钮-->
				<!--{if $showbtn}-->
				<td colspan="2">
					<input type="hidden" name="profilesubmit" value="true" />
					<button type="submit" name="profilesubmitbtn" id="profilesubmitbtn" value="true" class="pn" onclick="clickautohide(4)" />{lang save}</button>
					<span id="submit_result" class="rq"></span>
				</td>
				<!--{/if}-->
				</table>
			</form>
</div>
<!--{/if}-->

<!--{eval $nofooter = true;}-->
<!--{template common/footer}-->

