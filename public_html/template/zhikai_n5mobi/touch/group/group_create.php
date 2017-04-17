<?php echo '';exit;?>
<script type="text/javascript" src="{$_G[setting][jspath]}common.js?{VERHASH}"></script>
<div class="n5_tbys cl">
    <a href="javascript:void(0);" onclick="return window.history.go(-1);" class="fhan">返回</a>
	<span class="dqym">新建群组</span>
</div>
<div class="n5_tbxj"></div>

	<div class="n5_blcjym">
		<form method="post" autocomplete="off" name="groupform" id="groupform" class="s_clear" onsubmit="checkCategory();ajaxpost('groupform', 'returnmessage4', 'returnmessage4', 'onerror');return false;" action="forum.php?mod=group&action=create">
			<input type="hidden" name="formhash" value="{FORMHASH}" />
			<input type="hidden" name="referer" value="{echo dreferer()}" />
			<input type="hidden" name="handlekey" value="creategroup" />
			<table cellspacing="0" cellpadding="0" class="tfm" summary="{lang group_create}">
				<tbody>
					<tr>
						<th>&nbsp;</th>
						<td>
							<style type="text/css">
								#returnmessage4 { display: none; color: {NOTICETEXT}; font-weight: bold; }
								#returnmessage4.onerror { display: block; }
							</style>
							<p id="returnmessage4"></p>
						</td>
					</tr>
					
					
					
					<!--群组名称-->
					<tr>
						<th><strong class="rq y">*</strong>{lang group_name}</th>
						<td>
							<input type="text" name="name" id="name" class="px" size="36" tabindex="1" value="" autocomplete="off" onBlur="checkgroupname()" tabindex="1" />
						</td>
					</tr>
					
					
					<!--群组分类-->
					<tr>
						<th><strong class="rq y">*</strong>{lang group_category}</th>
						<td>
							<select name="parentid" tabindex="2" class="ps" onchange="ajaxget('forum.php?mod=ajax&action=secondgroup&fupid='+ this.value, 'secondgroup');">
								<option value="0">{lang choose_please}</option>
								$groupselect[first]
							</select>
							<em id="secondgroup"></em>
							<span id="groupcategorycheck" class="xi1"></span>
						</td>
					</tr>
					
					
					
					<!--群组简介-->
					<tr>
						<th>{lang group_description}</th>
						<td>
							<textarea id="descriptionmessage" name="descriptionnew" tabindex="3" class="pt" rows="8"></textarea>
						</td>
					</tr>
					
					
					
					<!--浏览权限-->
					<tr>
						<th><strong class="rq y">*</strong>{lang group_perm_visit}</th>
						<td>
							<label class="lb"><input type="radio" name="gviewperm" class="pr" tabindex="4" value="1" checked="checked" />{lang group_perm_all_user}</label>
							<label class="lb"><input type="radio" name="gviewperm" class="pr" value="0" />{lang group_perm_member_only}</label>
						</td>
					</tr>
					
					
					<!--加入方式-->
					<tr>
						<th><strong class="rq y">*</strong>{lang group_join_type}</th>
						<td>
							<label class="lb"><input type="radio" name="jointype" class="pr" tabindex="5" value="0" checked="checked" />{lang group_join_type_free}</label>
							<label class="lb"><input type="radio" name="jointype" class="pr" value="2" />{lang group_join_type_moderate}</label>
							<label class="lb"><input type="radio" name="jointype" class="pr" value="1" />{lang group_join_type_invite}</label>
						</td>
					</tr>
					
					
					
					<!--保存-->
					<tr>
						<th>&nbsp;</th>
						<td>
							<input type="hidden" name="createsubmit" value="true"><button type="submit" class="pn pnc" tabindex="6">{lang create}</button>
							<!--{if $_G['group']['buildgroupcredits']}-->&nbsp;&nbsp;&nbsp;(<strong class="rq">{lang group_create_buildcredits} $_G['group']['buildgroupcredits'] $_G['setting']['extcredits'][$creditstransextra]['unit']{$_G['setting']['extcredits'][$creditstransextra]['title']}</strong>)<!--{/if}-->
						</td>
					</tr>
					
				</tbody>
			</table>
		</form>
	</div>

<script type="text/javascript">
	function checkgroupname() {
		var groupname = trim($('name').value);
		ajaxget('forum.php?mod=ajax&forumcheck=1&infloat=creategroup&handlekey=creategroup&action=checkgroupname&groupname=' + (BROWSER.ie && document.charset == 'utf-8' ? encodeURIComponent(groupname) : groupname), 'groupnamecheck');
	}
	function checkCategory(){
		var groupcategory = trim($('fup').value);
		if(groupcategory == ''){
			$('groupcategorycheck').innerHTML = '{lang group_create_selete_categroy}';
			return false;
		} else {
			$('groupcategorycheck').innerHTML = '';
		}
	}
	<!--{if $_GET['fupid']}-->
			ajaxget('forum.php?mod=ajax&action=secondgroup&fupid=$_GET[fupid]<!--{if $_GET[groupid]}-->&groupid=$_GET[groupid]<!--{/if}-->', 'secondgroup');
	<!--{/if}-->
	if($('name')) {
		$('name').focus();
	}
</script>