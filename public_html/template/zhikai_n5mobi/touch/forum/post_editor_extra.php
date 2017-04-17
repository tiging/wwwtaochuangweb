<?php echo '';exit;?>
<script type="text/javascript" src="template/zhikai_n5mobi/touch/style/js/supload.js"></script>
<div class="cl"> 
  <!--{if $sortid}-->
  <input type="hidden" name="sortid" value="$sortid" />
  <!--{/if}--> 
  <!--{if $isfirstpost && !empty($_G['forum'][threadtypes][types])}-->
  <div class="inbox mtm">
    <div class="selectbox" style="display: block;">
    <select name="typeid" id="typeid" style="width: 100%;">
      <option value="0">{lang select_thread_catgory}</option>
      <!--{loop $_G['forum'][threadtypes][types] $typeid $name}--> 
      <!--{if empty($_G['forum']['threadtypes']['moderators'][$typeid]) || $_G['forum']['ismoderator']}-->
      <option value="$typeid"{if $thread['typeid'] == $typeid || $_GET['typeid'] == $typeid} selected="selected"{/if}>
      <!--{echo strip_tags($name);}-->
      </option>
      <!--{/if}--> 
      <!--{/loop}-->
    </select>
    </div>
  </div>
  <!--{/if}-->
  
  <div class="n5_fbztbt inbox<!--{if $_GET['action'] != 'reply'}--> bt mtm<!--{/if}-->"> 
    <!--{if $_GET['action'] != 'reply'}-->
    
    <input type="text" name="subject" value="$postinfo[subject]" id="needsubject" placeholder="{lang thread_subject}" class="txt px"/>
    <!--{else}-->
    <div>
    RE: $thread['subject']<!--{if $quotemessage}-->$quotemessage <!--{/if}--> 
    </div>
    <!--{/if}--> 
  </div>
  
  <!--{if $_GET[action] == 'newthread' && $modnewthreads}--> <span class="xg1 xw0">({lang approve})</span><!--{/if}--> 
  <!--{if $_GET[action] == 'reply' && $modnewreplies}--> <span class="xg1 xw0">({lang approve})</span><!--{/if}--> 
  <!--{if $_GET[action] == 'edit' && $isfirstpost && $thread['displayorder'] == -4}--> <span class="xg1 xw0">({lang draft})</span><!--{/if}--> 
  
</div>


<!--{if $showthreadsorts}-->
<div class="n5_tsztys cl"> 
  <!--{template forum/post_sortoption}--> 
</div>
<!--{elseif $adveditor}--> 
<!--{if $special == 1}--><!--{template forum/post_poll}--> 
<!--{elseif $special == 2 && ($_GET[action] != 'edit' || ($_GET[action] == 'edit' && ($thread['authorid'] == $_G['uid'] && $_G['group']['allowposttrade'] || $_G['group']['allowedittrade'])))}-->
<!--{template forum/post_trade}--> 
<!--{elseif $special == 3}--><!--{template forum/post_reward}--> 
<!--{elseif $special == 4}--><!--{template forum/post_activity}--> 
<!--{elseif $special == 5}--><!--{template forum/post_debate}--> 
<!--{elseif $specialextra}-->
<div class="specialpost s_clear">$threadplughtml</div>
<!--{/if}--> 
<!--{/if}--> 

