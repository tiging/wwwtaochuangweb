<?php echo '';exit;?>
<div class="n5_tsztys n5_hdztys cl"> 
  <table cellspacing="0" cellpadding="0">
    <tr>
      <th>{lang post_event_time}</th>
      <td><div id="certainstarttime" {if $activity['starttimeto']}style="display: none"{/if}>
          <input type="text" name="starttimefrom[0]" id="starttimefrom_0" class="px datetime" autocomplete="off" value="$activity[starttimefrom]" tabindex="1" />
        </div>
        <div id="uncertainstarttime" {if !$activity['starttimeto']}style="display: none"{/if}>
          <input type="text" name="starttimefrom[1]" id="starttimefrom_1" class="px mbn datetime" autocomplete="off" value="$activity[starttimefrom]" tabindex="1" />
          <em> ~ </em>
          <input type="text" autocomplete="off" id="starttimeto" name="starttimeto" class="px datetime" value="{if $activity['starttimeto']}$activity[starttimeto]{/if}" tabindex="1" />
        </div>
        <span class="cl">
        <label for="activitytime">
          <input type="checkbox" id="activitytime" name="activitytime" class="pc" onclick="if(this.checked) {$('#certainstarttime').hide();$('#uncertainstarttime').show();} else {$('#certainstarttime').show();$('#uncertainstarttime').hide();}" value="1" {if $activity['starttimeto']}checked{/if} tabindex="1" />
          {lang activity_starttime_endtime}</label>
        </span>
		<p class="redc">时间格式：2015-05-05</p>
		</td>
    </tr>
    <tr>
      <th>
        <label for="activityplace">{lang activity_space}:</label></th>
      <td><input type="text" name="activityplace" id="activityplace" class="px" value="$activity[place]" tabindex="1" /></td>
    </tr>
    
    <!--{if $_GET[action] == 'newthread'}-->
    <tr>
      <th><label for="activitycity">{lang activity_city}:</label></th>
      <td><input name="activitycity" id="activitycity" class="px" type="text" tabindex="1" /></td>
    </tr>
    
    <!--{/if}-->
    <tr>
      <th>
        <label for="activityclass">{lang activiy_sort}:</label></th>
      <td class="hasd cl"><select id="activityclass" name="activityclass" value="$activity[class]" >
          <!--{if $activitytypelist}--> 
          <!--{loop $activitytypelist $type}-->
          <option value="$type">$type</option>
          <!--{/loop}--> 
          <!--{/if}-->
        </select></td>
    </tr>
    <tr>
      <th><label for="activitynumber">{lang activity_need_member}:</label></th>
      <td><input type="text" name="activitynumber" id="activitynumber" class="px z" style="width:55px;" onkeyup="checkvalue(this.value, 'activitynumbermessage')" value="$activity[number]" tabindex="1" />
        <em>
        <select name="gender" id="gender" width="38" class="ps">
          <option value="0" {if !$activity['gender']}selected="selected"{/if}>{lang unlimited}</option>
          <option value="1" {if $activity['gender'] == 1}selected="selected"{/if}>{lang male}</option>
          <option value="2" {if $activity['gender'] == 2}selected="selected"{/if}>{lang female}</option>
        </select>
        </em> <span id="activitynumbermessage"></span></td>
    </tr>
    
    <!--{if $_G['setting']['activityfield']}-->
    <tr>
      <th>{lang optional_data}:</th>
      <td><ul class="xl2 cl">
          <!--{loop $_G['setting']['activityfield'] $key $val}-->
          <li>
            <label for="userfield_$key">
              <input type="checkbox" name="userfield[]" id="userfield_$key" class="pc" value="$key"{if $activity['ufield']['userfield'] && in_array($key, $activity['ufield']['userfield'])} checked="checked"{/if} />
              $val</label>
          </li>
          <!--{/loop}-->
        </ul></td>
    </tr>
    
    <!--{/if}--> 
    <!--{if $_G['setting']['activityextnum']}-->
    <tr>
      <th><label for="extfield">{lang other_data}:</label></th>
      <td><textarea name="extfield" id="extfield" class="pt" cols="50" style="width: 270px;"><!--{if $activity['ufield']['extfield']}-->$activity[ufield][extfield]<!--{/if}--></textarea>
        <br />
        {lang post_activity_message} $_G['setting']['activityextnum'] {lang post_option} </td>
    </tr>
    
    <!--{/if}--> 
    
    <!--{if $_G['setting']['activitycredit']}-->
    <tr>
      <th><label for="activitycredit">{lang consumption_credit}:</label></th>
      <td><input type="text" name="activitycredit" id="activitycredit" class="px" value="$activity[credit]" />
        {$_G['setting']['extcredits'][$_G['setting']['activitycredit']][title]}
        <p class="xg1">{lang user_consumption_money}</p></td>
    </tr>
    
    <!--{/if}-->
    <tr>
      <th><label for="cost">{lang activity_payment}:</label></th>
      <td><input type="text" name="cost" id="cost" class="px" onkeyup="checkvalue(this.value, 'costmessage')" value="$activity[cost]" tabindex="1" />
        {lang payment_unit} <span id="costmessage"></span></td>
    </tr>
    <tr>
      <th><label for="activityexpiration">{lang post_closing}:</label></th>
      <td class="hasd cl"><span>
        <input type="text" name="activityexpiration" id="activityexpiration" class="px datetime" autocomplete="off" value="$activity[expiration]" tabindex="1" />
        </span><p class="redc">时间格式：2015-05-05</p></td>
    </tr>
    
    <!--{if $allowpostimg}-->
    <tr>
      <th>{lang post_topic_image}:</th>
      <td class="pns">
          <button type="button" class="pn blue_btn" onclick="uploadWindow($_G['fid'],function (aid, url){activityaid_upload(aid, url)})"><!--{if $activityattach[attachment]}-->{lang update}<!--{else}-->{lang upload}<!--{/if}--></button>
          <input type="hidden" name="activityaid" id="activityaid" {if $activityattach[attachment]}value="$activityattach[aid]" {/if}/>
          <input type="hidden" name="activityaid_url" id="activityaid_url" />
        <div id="activityattach_image" class="n5_flsctp mtn"> 
          <!--{if $activityattach[attachment]}--> 
          <a href="$activityattach[url]/$activityattach[attachment]" target="_blank"><img class="spimg" src="$activityattach[url]/{if $activityattach['thumb']}{eval echo getimgthumbname($activityattach['attachment']);}{else}$activityattach[attachment]{/if}" alt="" /></a> 
          <!--{/if}--> 
        </div></td>
    </tr>
    
    <!--{/if}--> 
    <!--{hook/post_activity_extra}-->
    
  </table>
</div>
<script type="text/javascript">
		function activityaid_upload(aid, url) {
	Scratching('activityaid_url').value = url;
	updateactivityattach(aid, url, '{$_G['setting']['attachurl']}forum');
}
</script> 
