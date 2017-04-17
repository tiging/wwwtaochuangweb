<?php echo '';exit;?>
<div class="n5_tsztys n5_hdztys cl">
  <table cellspacing="0" cellpadding="0">
    <tr>
      <th><label for="item_name">{lang post_trade_name}</label>
        <i class="rq">*</i></th>
      <td><input type="text" name="item_name" id="item_name" class="px" value="$trade[subject]" tabindex="1" /></td>
    </tr>
    <tr>
      <th><label for="item_number">{lang post_trade_number}</label>
        <i class="rq">*</i></th>
      <td><div>
          <input type="text" name="item_number" id="item_number" class="px" value="$trade[amount]" tabindex="1" />
          <select id="item_quality" class="ps" width="108" name="item_quality" tabindex="1">
            <option value="1" {if $trade['quality'] == 1}selected="selected"{/if}>{lang trade_new}</option>
            <option value="2" {if $trade['quality'] == 2}selected="selected"{/if}>{lang trade_old}</option>
          </select>
        </div></td>
    </tr>
    <tr>
      <th><label for="transport">{lang post_trade_transport}</label></th>
      <td><span>
        <select name="transport" id="transport" width="108" change="$('logisticssetting').style.display = $('transport').value == 'virtual' ? 'none' : ''" class="ps">
          <option value="virtual" {if $trade['transport'] == 3}selected="selected"{/if}>{lang post_trade_transport_virtual}</option>
          <option value="seller" {if $trade['transport'] == 1}selected="selected"{/if}>{lang post_trade_transport_seller}</option>
          <option value="buyer" {if $trade['transport'] == 2}selected="selected"{/if}>{lang post_trade_transport_buyer}</option>
          <option value="logistics" {if $trade['transport'] == 4}selected="selected"{/if}>{lang trade_type_transport_physical}</option>
          <option value="offline" {if $trade['transport'] == 0}selected="selected"{/if}>{lang post_trade_transport_offline}</option>
        </select>
        </span></td>
    </tr>
    <tr>
      <th>{lang post_trade_price}<i class="rq">*</i></th>
      <td><div class="mbm">
          <input type="text" name="item_price" id="item_price" class="px mbn" value="$trade[price]" tabindex="1" />
          <label for="item_price">{lang post_current_price}</label>
          <input type="text" name="item_costprice" id="item_costprice" class="px mbn" value="$trade[costprice]" tabindex="1" />
          <label for="item_costprice">{lang post_original_price}</label>
        </div>
        
        <!--{if $_G['setting']['creditstransextra'][5] != -1}-->
        
        <div class="mbm">
          <input type="text" name="item_credit" id="item_credit" class="px  mbn" value="$trade[credit]" tabindex="1" />
          <label for="item_credit">{lang post_current_credit}({$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][5]][title]})</label>
          <input type="text" name="item_costcredit" id="item_costcredit" class="px  mbn" value="$trade[costcredit]" tabindex="1" />
          <label for="item_costcredit">{lang post_original_credit}({$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][5]][title]})</label>
        </div>
        
        <!--{/if}-->
        
        <div class="mbm" id="logisticssetting" style="display:{if !$trade['transport'] || $trade['transport'] == 3}none{/if}">
          <input type="text" name="postage_mail" id="postage_mail" class="px" value="$trade[ordinaryfee]" tabindex="1" />
          <label for="postage_mail">{lang post_trade_transport_mail}</label>
          <input type="text" name="postage_express" id="postage_express" class="px" value="$trade[expressfee]" tabindex="1" />
          <label for="postage_express">{lang post_trade_transport_express}</label>
          <input type="text" name="postage_ems" id="postage_ems" class="px" value="$trade[emsfee]" tabindex="1" />
          <label for="postage_ems">EMS</label>
        </div></td>
    </tr>
    <tr>
      <th><label for="paymethod">{lang post_trade_paymethod}</label></th>
      <td><span>
        <select name="paymethod" id="paymethod" width="108" change="display('tenpayseller')" class="ps" tabindex="1">
          <!--{if $_G[setting][ec_tenpay_opentrans_chnid]}-->
          <option value="0" {if $trade[tenpayaccount]}selected{/if}>{lang post_trade_paymethod_online}</option>
          <!--{/if}-->
          <option value="1" {if !$trade[tenpayaccount]}selected{/if}>{lang post_trade_paymethod_offline}</option>
        </select>
        </span></td>
    </tr>
    <tr id="tenpayseller" style="{if !$trade[tenpayaccount]}display:none{/if}">
      <th><label for="tenpay_account">{lang post_trade_tenpay_seller}</label></th>
      <td><input type="text" name="tenpay_account" id="tenpay_account" class="px" value="$trade[tenpayaccount]" tabindex="2" /></td>
    </tr>
    <tr class="cl">
      <th><label for="item_locus">{lang post_trade_locus}</label></th>
      <td><input type="text" name="item_locus" id="item_locus" class="px" value="$trade[locus]" tabindex="1" /></td>
    </tr>
    <tr>
      <th><label for="item_expiration">{lang valid_before}</label></th>
      <td class="hasd"><input type="text" name="item_expiration" id="item_expiration" class="px" autocomplete="off" tabindex="1" /><p class="redc">时间格式：2015-05-05</p></td>
    </tr>
    <!--{if $allowpostimg}-->
    <tr>
      <th>{lang post_trade_picture}</th>
      <td class="pns">
	    <button type="button" class="pn blue_btn" onclick="uploadWindow($_G['fid'],function (aid, url){tradeaid_upload(aid, url)})"><em><!--{if $tradeattach[attachment]}-->{lang update}<!--{else}-->{lang upload}<!--{/if}--></em></button>
        <input type="hidden" name="tradeaid" id="tradeaid" {if $tradeattach[attachment]}value="$tradeattach[aid]" {/if}/>
        <input type="hidden" name="tradeaid_url" id="tradeaid_url" />
        <div id="tradeattach_image" class="n5_flsctp mtn"> 
          <!--{if $tradeattach[attachment]}--> 
          <a href="$tradeattach[url]/$tradeattach[attachment]" target="_blank"><img class="spimg" src="$tradeattach[url]/{if $tradeattach['thumb']}{eval echo getimgthumbname($tradeattach['attachment']);}{else}$tradeattach[attachment]{/if}" alt="" /></a> 
          <!--{/if}--> 
        </div></td>
    </tr>
    <!--{/if}--> 
    <!--{hook/post_trade_extra}-->
    
  </table>
</div>

<script type="text/javascript" reload="1">
simulateSelect('item_quality');
simulateSelect('paymethod');
simulateSelect('transport');

//EXTRAFUNC['validator']['special'] = 'validateextra';
function validateextra() {
	if(Scratching('postform').item_name.value == '') {
		showDialog('{lang post_goods_error_message_1}', 'alert', '', function () { Scratching('postform').item_name.focus() });
		return false;
	}
	if(Scratching('postform').item_number.value == '') {
		showDialog('{lang post_goods_error_message_2}', 'alert', '', function () { Scratching('postform').item_number.focus() });
		return false;
	}
	if(Scratching('postform').item_price.value == '' && Scratching('postform').item_credit.value == '') {
		showDialog('{lang post_goods_error_message_3}', 'alert', '', function () { Scratching('postform').item_price.focus() });
		return false;
	}
	return true;
}

function tradeaid_upload(aid, url) {
	Scratching('tradeaid_url').value = url;
	updatetradeattach(aid, url, '{$_G['setting']['attachurl']}forum');
}


</script> 