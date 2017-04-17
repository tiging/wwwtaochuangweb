<?php echo '';exit;?>
<!--{template common/header}-->
<script type="text/javascript" src="{$_G[setting][jspath]}common.js?{VERHASH}"></script>
<div class="n5_tbys cl">
    <a href="javascript:void(0);" onclick="return window.history.go(-1);" class="fhan">返回</a>
	<span class="dqym">我的积分</span>
	<!--{if $_G[setting][transferstatus] && $_G['group']['allowtransfer']}-->
	<a href="home.php?mod=spacecp&ac=credit&op=transfer" class="qtqh">{lang transfer_credits}</a>
	<!--{/if}-->
</div>
<div class="n5_tbxj"></div>

<div class="n5_wdscxz cl">
    <div class="n5_wdscys n5_rwqhays <!--{if $_G[setting][exchangestatus]}-->n5_rwqhys<!--{/if}--> cl">
    <ul>
        <li $opactives[base]><a href="home.php?mod=spacecp&ac=credit&op=base">{lang my_credits}</a></li>
		<!--{if $_G[setting][exchangestatus]}-->
	    <li $opactives[exchange]><a href="home.php?mod=spacecp&ac=credit&op=exchange" class="kjqhjg">积分{lang exchange_credits}</a></li>
	    <!--{/if}-->
	</ul>
	</div>
</div>

<div class="n5_wdjf cl">
        <!--积分数据-->
		<!--{if in_array($_GET['op'], array('base', 'buy', 'transfer', 'exchange'))}-->
		<div class="jflb cl">
			<ul>
			<!--{loop $_G['setting']['extcredits'] $id $credit}-->
				<!--{if $id!=$creditid}-->
				<li><em>{$credit[title]}</em><p><!--{echo getuserprofile('extcredits'.$id);}--></p></li>
				<!--{/if}-->
			<!--{/loop}-->
			<!--{hook/spacecp_credit_extra}-->
			</ul>
		</div>
		<!--{/if}-->
		
		<!--{if $_GET['op'] == 'base'}-->
		<!--{if $loglist}-->
		<div class="jfjl cl">
		    <h2>积分变更记录</h2>
			<div class="jlnr cl">
			    <!--{loop $loglist $value}-->
				<!--{eval $value = makecreditlog($value, $otherinfo);}-->
				<ul>
				    <li><i>$value['credit']</i><!--{if $value['operation']}-->$value['opinfo']<!--{else}-->$value['text']<!--{/if}--></li>
				</ul>
				<!--{/loop}-->
			</div>
		</div>
		<!--{else}-->
		<div class="n5_wnrts">没有积分交易记录</div>
		<!--{/if}-->

		
		<!--转账-->
		<!--{elseif $_GET['op'] == 'transfer'}-->

			<!--{if $_G[setting][transferstatus] && $_G['group']['allowtransfer']}-->
			<form id="transferform" name="transferform" method="post" autocomplete="off" action="home.php?mod=spacecp&ac=credit&op=transfer" onsubmit="ajaxpost(this.id, 'return_transfercredit');">
				<input type="hidden" name="formhash" value="{FORMHASH}" />
				<input type="hidden" name="transfersubmit" value="true" />
				<input type="hidden" name="handlekey" value="transfercredit" />
				<div class="jfzz cl">
				    <div class="zzsl cl">
					    转账 <input type="text" name="transferamount" id="transferamount" class="px" size="5" style="width: auto;" value="0" />
						&nbsp;{$_G[setting][extcredits][$_G[setting][creditstransextra][9]][title]}&nbsp;
						{lang credits_give}&nbsp;
						<input type="text" name="to" id="to" class="px" size="15" style="width: auto;" />
					</div>
					<div class="zzts cl">
					    {lang memcp_credits_transfer_min_balance} $_G[setting][transfermincredits] {$_G[setting][extcredits][$_G[setting][creditstransextra][9]][unit]}<!--{if intval($taxpercent) > 0}-->，{lang credits_tax} $taxpercent<!--{/if}-->
					</div>
					<div class="zzmm"><span class="rq">*</span>{lang transfer_login_password}</div>
					<div class="zzsr"><input type="password" name="password" class="px" value="" /></div>
					<div class="zzmm">{lang credits_transfer_message}</div>
					<div class="zzsr"><input type="text" name="transfermessage" class="px" size="40" /></div>
					<button type="submit" name="transfersubmit_btn" id="transfersubmit_btn" class="pn pnd" value="true"><em>{lang memcp_credits_transfer}</em></button>
					<span style="display: none" id="return_transfercredit"></span>
				</div>
			</form>
			<!--{/if}-->

			
			
		<!--兑换-->
		<!--{elseif $_GET['op'] == 'exchange'}-->
            <div class="jfdh cl">
			<!--{if $_G[setting][exchangestatus] && ($_G[setting][extcredits] || $_CACHE['creditsettings'])}-->
			<form id="exchangeform" name="exchangeform" method="post" autocomplete="off" action="home.php?mod=spacecp&ac=credit&op=exchange&handlekey=credit" onsubmit="showWindow('credit', 'exchangeform', 'post');">
				<input type="hidden" name="formhash" value="{FORMHASH}" />
				<input type="hidden" name="operation" value="exchange" />
				<input type="hidden" name="exchangesubmit" value="true" />
				<input type="hidden" name="outi" value="" />
				
				<div class="dhnr cl">
				    <div class="dhbt cl">{lang memcp_credits_exchange}</div>
				    <div class="cl">
					    <input type="text" id="exchangeamount" name="exchangeamount" class="px" size="5" style="width: auto;" value="0" onkeyup="exchangecalcredit()" />
						<select name="tocredits" id="tocredits" class="ps" onChange="exchangecalcredit()">
						<!--{loop $_G[setting][extcredits] $id $ecredits}-->
							<!--{if $ecredits[allowexchangein] && $ecredits[ratio]}-->
								<option value="$id" unit="$ecredits[unit]" title="$ecredits[title]" ratio="$ecredits[ratio]">$ecredits[title]</option>
							<!--{/if}-->
						<!--{/loop}-->
						<!--{eval $i=0;}-->

						<!--{loop $_CACHE['creditsettings'] $id $data}--><!--{eval $i++;}-->
							<!--{if $data[title]}-->
							<option value="$id" outi="$i">$data[title]</option>
							<!--{/if}-->
						<!--{/loop}-->
						</select>
						&nbsp;{lang credits_need}&nbsp;
						<input type="text" id="exchangedesamount" class="px" size="5" style="width: auto;" value="0" disabled="disabled" />
						<select name="fromcredits" id="fromcredits_0" class="ps" style="display: none" onChange="exchangecalcredit();">
						<!--{loop $_G[setting][extcredits] $id $credit}-->
							<!--{if $credit[allowexchangeout] && $credit[ratio]}-->
								<option value="$id" unit="$credit[unit]" title="$credit[title]" ratio="$credit[ratio]">$credit[title]</option>
							<!--{/if}-->
						<!--{/loop}-->
						</select>
						<!--{eval $i=0;}-->
						<!--{loop $_CACHE['creditsettings'] $id $data}--><!--{eval $i++;}-->
							<select name="fromcredits_$i" id="fromcredits_$i" class="ps" style="display: none" onChange="exchangecalcredit()">
							<!--{loop $data[creditsrc] $id $ratio}-->
								<option value="$id" unit="$_G['setting']['extcredits'][$id][unit]" title="$_G['setting']['extcredits'][$id][title]" ratiosrc="$data[ratiosrc][$id]" ratiodesc="$data[ratiodesc][$id]">$_G['setting']['extcredits'][$id][title]</option>
							<!--{/loop}-->
						    </select>
						<!--{/loop}-->
						<script type="text/javascript">
							var tocredits = $('tocredits');
							var fromcredits = $('fromcredits_0');
							if(fromcredits.length > 1 && tocredits.value == fromcredits.value) {
								fromcredits.selectedIndex = tocredits.selectedIndex + 1;
							}
						</script>
					</div>
					<div class="dhtx cl">
					    <!--{if $_G[setting][exchangemincredits]}-->
						{lang memcp_credits_exchange_min_balance} $_G[setting][exchangemincredits]
						<!--{/if}-->
						<span id="taxpercent">
						<!--{if intval($taxpercent) > 0}-->
						，{lang credits_tax} $taxpercent
						<!--{/if}-->
						</span>
					</div>
				</div>
				<div class="dhmm cl">
				    <div class="dhbt cl"><span class="rq">*</span> {lang transfer_login_password}</div>
					<input type="password" name="password" class="px" value="" size="20" />
				</div>
				<button type="submit" name="exchangesubmit_btn" id="exchangesubmit_btn" class="pn" value="true" tabindex="2"><em>{lang memcp_credits_exchange}</em></button>
			</form>
			<script type="text/javascript">
				function exchangecalcredit() {
					with($('exchangeform')) {
						tocredit = tocredits[tocredits.selectedIndex];
						if(!tocredit) {
							return;
						}
						<!--{eval $i=0;}-->
						<!--{loop $_CACHE['creditsettings'] $id $data}--><!--{eval $i++;}-->
							$('fromcredits_$i').style.display = 'none';
						<!--{/loop}-->
						if(tocredit.getAttribute('outi')) {
							outi.value = tocredit.getAttribute('outi');
							fromcredit = $('fromcredits_' + tocredit.getAttribute('outi'));
							$('taxpercent').style.display = $('fromcredits_0').style.display = 'none';
							fromcredit.style.display = '';
							fromcredit = fromcredit[fromcredit.selectedIndex];
							$('exchangeamount').value = $('exchangeamount').value.toInt();
							if($('exchangeamount').value != 0) {
								$('exchangedesamount').value = Math.floor( fromcredit.getAttribute('ratiosrc') / fromcredit.getAttribute('ratiodesc') * $('exchangeamount').value);
							} else {
								$('exchangedesamount').value = '';
							}
						} else {
							outi.value = 0;
							$('taxpercent').style.display = $('fromcredits_0').style.display = '';
							fromcredit = fromcredits[fromcredits.selectedIndex];
							$('exchangeamount').value = $('exchangeamount').value.toInt();
							if(fromcredit.getAttribute('title') != tocredit.getAttribute('title') && $('exchangeamount').value != 0) {
								if(tocredit.getAttribute('ratio') < fromcredit.getAttribute('ratio')) {
									$('exchangedesamount').value = Math.ceil( tocredit.getAttribute('ratio') / fromcredit.getAttribute('ratio') * $('exchangeamount').value * (1 + $_G[setting][creditstax]));
								} else {
									$('exchangedesamount').value = Math.floor( tocredit.getAttribute('ratio') / fromcredit.getAttribute('ratio') * $('exchangeamount').value * (1 + $_G[setting][creditstax]));
								}
							} else {
								$('exchangedesamount').value = '';
							}
						}
					}
				}
				String.prototype.toInt = function() {
					var s = parseInt(this);
					return isNaN(s) ? 0 : s;
				}
				exchangecalcredit();
			</script>
			<!--{/if}-->

		<!--{else}-->
		<div class="n5_wnrts">具体积分规则请至电脑版查看</div>
		<!--{/if}-->
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
<!--{eval $nofooter = true;}-->
<!--{template common/footer}-->