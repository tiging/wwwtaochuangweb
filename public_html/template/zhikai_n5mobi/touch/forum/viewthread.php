<?php echo '';exit;?>
<!--{eval $threadsort = $threadsorts = null;}-->
<!--{eval $postcount=0;}-->
<!--{template common/header}-->
<script type='text/javascript' src='template/zhikai_n5mobi/touch/style/js/bootstrap.min.js'></script>
<link href="template/zhikai_n5mobi/touch/style/fl/mbflnr.css" type="text/css" rel="stylesheet">
<div class="n5_tbys cl">
    <a href="javascript:void(0);" onclick="return window.history.go(-1);" class="fhan">����</a>
	<span class="dqym">$_G['forum'][name]</span>
	<a href="<!--{if $_G[uid]}-->home.php?mod=space&uid=$_G[uid]&do=profile&mycenter=1<!--{else}-->member.php?mod=logging&action=login<!--{/if}-->" class="txbz">��������<!--{if $_G[member][newprompt]}--><b>&nbsp;</b><!--{/if}--></a>
</div>
<div class="n5_tbxj"></div>
<!--{hook/viewthread_top_mobile}-->
<!-- main postlist start -->
<div class="postlist n5-bbsnr">
	<h2 class="n5_bbsnrbt">
        	<!--{if $_G['forum_thread']['typeid'] && $_G['forum']['threadtypes']['types'][$_G['forum_thread']['typeid']]}-->
				[{$_G['forum']['threadtypes']['types'][$_G['forum_thread']['typeid']]}]
            <!--{/if}-->
            <!--{if $threadsorts && $_G['forum_thread']['sortid']}-->
                [{$_G['forum']['threadsorts']['types'][$_G['forum_thread']['sortid']]}]
			<!--{/if}-->
			$_G[forum_thread][subject]
            <!--{if $_G['forum_thread'][displayorder] == -2}--> <span>({lang moderating})</span>
            <!--{elseif $_G['forum_thread'][displayorder] == -3}--> <span>({lang have_ignored})</span>
            <!--{elseif $_G['forum_thread'][displayorder] == -4}--> <span>({lang draft})</span>
            <!--{/if}-->
	</h2>

	<!--{loop $postlist $post}-->
	<!--{eval $needhiddenreply = ($hiddenreplies && $_G['uid'] != $post['authorid'] && $_G['uid'] != $_G['forum_thread']['authorid'] && !$post['first'] && !$_G['forum']['ismoderator']);}-->
	<!--{hook/viewthread_posttop_mobile $postcount}-->
   <div class="plc cl">
       <div class="display pi" href="#replybtn_$post[pid]">
	       <!--{if $post[first]}--><div class="n5_jyxxyclz"><!--{/if}-->
		   <ul class="authi">
		        <div class="n5_nrytb cl">
				<!--{if $post['authorid'] && $post['username'] && !$post['anonymous']}-->
		            <div class="n5_nrhytx cl">
					    <a href="home.php?mod=space&uid=$post[authorid]&do=profile&view=me&mobile=2"><img src="<!--{if !$post['authorid'] || $post['anonymous']}--><!--{avatar(0, small, true)}--><!--{else}--><!--{avatar($post[authorid], small, true)}--><!--{/if}-->"></a>
					</div>
					<div class="n5_nrhyxx cl">
					    <div class="n5_yhmhdj cl">
					        <h3 class="z cl"><a href="home.php?mod=space&uid=$post[authorid]&do=profile&view=me&mobile=2">$post[author]</a></h3>
							<!--{eval $thread['groupid'] = DB::result_first("SELECT groupid FROM ".DB::table('common_member')." WHERE uid = ".$post['authorid'] );}--> 
							<!--{eval $_self = $thread['author'] && $post['author'] == $thread['author'] && $post['position'] !== '1';}--> 
							<!--{if $thread['groupid'] == 1}--><em class="g1">����Ա</em><!--{elseif $thread['groupid'] == 2}--><em class="g1">����</em><!--{elseif $thread['groupid'] == 3}--><em class="g1">����</em><!--{elseif $thread['groupid'] == 16}--><em class="g1">����</em><!--{elseif $thread['groupid'] == 17}--><em class="g1">�༭</em><!--{elseif $thread['groupid'] == 18}--><em class="g1">�༭</em><!--{elseif $thread['groupid'] == 18}--><em class="g1">�༭</em> 
						    <!--{elseif $thread['groupid'] == 10}--><em class="y1">LV.1</em><!--{elseif $thread['groupid'] == 21}--><em class="y1">LV.2</em><!--{elseif $thread['groupid'] == 22}--><em class="y1">LV.3</em><!--{elseif $thread['groupid'] == 23}--><em class="y1">LV.4</em><!--{elseif $thread['groupid'] == 24}--><em class="y1">LV.5</em><!--{elseif $thread['groupid'] == 25}--><em class="y1">LV.6</em><!--{/if}--><!--{if $_self }--><em class="l1">¥��</em><!--{/if}-->
					<div class="n5_nrlcbz cl">
					    <em class="n5_nrylc">
						<!--{if isset($post[isstick])}-->
							<img src ="{IMGDIR}/settop.png" title="{lang replystick}" class="vm" /> {lang from} {$post[number]}{$postnostick}
						<!--{elseif $post[number] == -1}-->
							{lang recommend_post}
						<!--{else}-->
							<!--{if !empty($postno[$post[number]])}-->$postno[$post[number]]<!--{else}-->{$post[number]}{$postno[0]}<!--{/if}-->
						<!--{/if}-->
					    </em>
					
					</div>
					    </div>

						<div class="n5_sjydhf">
						<dt class="z cl">$post[dateline]
						<!--{if $_G['forum']['ismoderator']}-->
					<!-- manage start -->
					<!--{if $post[first]}-->
						<em><a href="#moption_$post[pid]" class="popup blue">{lang manage}</a></em>
						<div id="moption_$post[pid]" popup="true" class="manage" style="display:none;">
							<!--{if !$_G['forum_thread']['special']}-->
							<input type="button" value="{lang edit}" class="redirect button" href="forum.php?mod=post&action=edit&fid=$_G[fid]&tid=$_G[tid]&pid=$post[pid]<!--{if $_G[forum_thread][sortid]}--><!--{if $post[first]}-->&sortid={$_G[forum_thread][sortid]}<!--{/if}--><!--{/if}-->{if !empty($_GET[modthreadkey])}&modthreadkey=$_GET[modthreadkey]{/if}&page=$page">
							<!--{/if}-->
							<input type="button" value="{lang delete}" class="dialog button" href="forum.php?mod=topicadmin&action=moderate&fid={$_G[fid]}&moderate[]={$_G[tid]}&operation=delete&optgroup=3&from={$_G[tid]}">
							<input type="button" value="{lang close}" class="dialog button" href="forum.php?mod=topicadmin&action=moderate&fid={$_G[fid]}&moderate[]={$_G[tid]}&from={$_G[tid]}&optgroup=4">
							<input type="button" value="{lang admin_banpost}" class="dialog button" href="forum.php?mod=topicadmin&action=banpost&fid={$_G[fid]}&tid={$_G[tid]}&topiclist[]={$_G[forum_firstpid]}">
							<input type="button" value="{lang topicadmin_warn_add}" class="dialog button" href="forum.php?mod=topicadmin&action=warn&fid={$_G[fid]}&tid={$_G[tid]}&topiclist[]={$_G[forum_firstpid]}">
						</div>
					<!--{else}-->
						<em><a href="#moption_$post[pid]" class="popup blue">{lang manage}</a></em>
						<div id="moption_$post[pid]" popup="true" class="manage" style="display:none;">
							<input type="button" value="{lang edit}" class="redirect button" href="forum.php?mod=post&action=edit&fid=$_G[fid]&tid=$_G[tid]&pid=$post[pid]{if !empty($_GET[modthreadkey])}&modthreadkey=$_GET[modthreadkey]{/if}&page=$page">
							<!--{if $_G['group']['allowdelpost']}--><input type="button" value="{lang modmenu_deletepost}" class="dialog button" href="forum.php?mod=topicadmin&action=delpost&fid={$_G[fid]}&tid={$_G[tid]}&operation=&optgroup=&page=&topiclist[]={$post[pid]}"><!--{/if}-->
							<!--{if $_G['group']['allowbanpost']}--><input type="button" value="{lang modmenu_banpost}" class="dialog button" href="forum.php?mod=topicadmin&action=banpost&fid={$_G[fid]}&tid={$_G[tid]}&operation=&optgroup=&page=&topiclist[]={$post[pid]}"><!--{/if}-->
							<!--{if $_G['group']['allowwarnpost']}--><input type="button" value="{lang modmenu_warn}" class="dialog button" href="forum.php?mod=topicadmin&action=warn&fid={$_G[fid]}&tid={$_G[tid]}&operation=&optgroup=&page=&topiclist[]={$post[pid]}"><!--{/if}-->
						</div>
					<!--{/if}-->
					<!-- manage end -->
					<!--{/if}--></dt>
					    <!--{if $post[first]}-->
	                     <div class="n5_nrydhf y cl"><span class="null">$thread[views]</span><span class="num">$_G[forum_thread][allreplies]</span></div>
	                    <!--{/if}-->
	                </div>
					
					</div>
					<!--{else}-->
					    <div class="n5_nrhytx cl">
					        <img src="template/zhikai_n5mobi/touch/style/nmyk.png">
					    </div>
						<div class="n5_nrhyxx cl">
						    <div class="n5_yhmhdj cl">
							<h3 class="z cl">
							<!--{if !$post['authorid']}-->
							<a href="javascript:;">{lang guest} <em>$post[useip]</em></a>
							<!--{elseif $post['authorid'] && $post['username'] && $post['anonymous']}-->
							<!--{if $_G['forum']['ismoderator']}--><a>{lang anonymous}</a><!--{else}--><a>{lang anonymous}</a><!--{/if}-->
							<!--{else}-->
							$post[author] <em>{lang member_deleted}</em>
							<!--{/if}-->
							</h3>
								<div class="n5_nrlcbz cl">
								<em class="n5_nrylc">
									<!--{if isset($post[isstick])}-->
									<img src ="{IMGDIR}/settop.png" title="{lang replystick}" class="vm" /> {lang from} {$post[number]}{$postnostick}
									<!--{elseif $post[number] == -1}-->
									{lang recommend_post}
									<!--{else}-->
									<!--{if !empty($postno[$post[number]])}-->$postno[$post[number]]<!--{else}-->{$post[number]}{$postno[0]}<!--{/if}-->
									<!--{/if}-->
								</em>
								</div>
							</div>
													<div class="n5_sjydhf">
						<dt class="z cl">$post[dateline]
						<!--{if $_G['forum']['ismoderator']}-->
					<!-- manage start -->
					<!--{if $post[first]}-->
						<em><a href="#moption_$post[pid]" class="popup blue">{lang manage}</a></em>
						<div id="moption_$post[pid]" popup="true" class="manage" style="display:none;">
							<!--{if !$_G['forum_thread']['special']}-->
							<input type="button" value="{lang edit}" class="redirect button" href="forum.php?mod=post&action=edit&fid=$_G[fid]&tid=$_G[tid]&pid=$post[pid]<!--{if $_G[forum_thread][sortid]}--><!--{if $post[first]}-->&sortid={$_G[forum_thread][sortid]}<!--{/if}--><!--{/if}-->{if !empty($_GET[modthreadkey])}&modthreadkey=$_GET[modthreadkey]{/if}&page=$page">
							<!--{/if}-->
							<input type="button" value="{lang delete}" class="dialog button" href="forum.php?mod=topicadmin&action=moderate&fid={$_G[fid]}&moderate[]={$_G[tid]}&operation=delete&optgroup=3&from={$_G[tid]}">
							<input type="button" value="{lang close}" class="dialog button" href="forum.php?mod=topicadmin&action=moderate&fid={$_G[fid]}&moderate[]={$_G[tid]}&from={$_G[tid]}&optgroup=4">
							<input type="button" value="{lang admin_banpost}" class="dialog button" href="forum.php?mod=topicadmin&action=banpost&fid={$_G[fid]}&tid={$_G[tid]}&topiclist[]={$_G[forum_firstpid]}">
							<input type="button" value="{lang topicadmin_warn_add}" class="dialog button" href="forum.php?mod=topicadmin&action=warn&fid={$_G[fid]}&tid={$_G[tid]}&topiclist[]={$_G[forum_firstpid]}">
						</div>
					<!--{else}-->
						<em><a href="#moption_$post[pid]" class="popup blue">{lang manage}</a></em>
						<div id="moption_$post[pid]" popup="true" class="manage" style="display:none;">
							<input type="button" value="{lang edit}" class="redirect button" href="forum.php?mod=post&action=edit&fid=$_G[fid]&tid=$_G[tid]&pid=$post[pid]{if !empty($_GET[modthreadkey])}&modthreadkey=$_GET[modthreadkey]{/if}&page=$page">
							<!--{if $_G['group']['allowdelpost']}--><input type="button" value="{lang modmenu_deletepost}" class="dialog button" href="forum.php?mod=topicadmin&action=delpost&fid={$_G[fid]}&tid={$_G[tid]}&operation=&optgroup=&page=&topiclist[]={$post[pid]}"><!--{/if}-->
							<!--{if $_G['group']['allowbanpost']}--><input type="button" value="{lang modmenu_banpost}" class="dialog button" href="forum.php?mod=topicadmin&action=banpost&fid={$_G[fid]}&tid={$_G[tid]}&operation=&optgroup=&page=&topiclist[]={$post[pid]}"><!--{/if}-->
							<!--{if $_G['group']['allowwarnpost']}--><input type="button" value="{lang modmenu_warn}" class="dialog button" href="forum.php?mod=topicadmin&action=warn&fid={$_G[fid]}&tid={$_G[tid]}&operation=&optgroup=&page=&topiclist[]={$post[pid]}"><!--{/if}-->
						</div>
					<!--{/if}-->
					<!-- manage end -->
					<!--{/if}--></dt>
					    <!--{if $post[first]}-->
	                     <div class="n5_nrydhf y cl"><span class="null">$thread[views]</span><span class="num">$_G[forum_thread][allreplies]</span></div>
	                    <!--{/if}-->
	                </div>
						</div>
					<!--{/if}-->
		        </div>
            </ul>
			<!--{if $post[first]}--></div><!--{/if}-->
			<div class="message">
                	<!--{if $post['warned']}-->
                        <span class="lcsdjg">{lang warn_get}</span>
                    <!--{/if}-->
                    <!--{if !$post['first'] && !empty($post[subject])}-->
                        <h2><strong>$post[subject]</strong></h2>
                    <!--{/if}-->
                    <!--{if $_G['adminid'] != 1 && $_G['setting']['bannedmessages'] & 1 && (($post['authorid'] && !$post['username']) || ($post['groupid'] == 4 || $post['groupid'] == 5) || $post['status'] == -1 || $post['memberstatus'])}-->
                        <div class="grey quote">{lang message_banned}</div>
                    <!--{elseif $_G['adminid'] != 1 && $post['status'] & 1}-->
                        <div class="grey quote">{lang message_single_banned}</div>
                    <!--{elseif $needhiddenreply}-->
                        <div class="grey quote">{lang message_ishidden_hiddenreplies}</div>
                    <!--{elseif $post['first'] && $_G['forum_threadpay']}-->
						<!--{template forum/viewthread_pay}-->
					<!--{else}-->

                    	<!--{if $_G['setting']['bannedmessages'] & 1 && (($post['authorid'] && !$post['username']) || ($post['groupid'] == 4 || $post['groupid'] == 5))}-->
                            <div class="grey quote">{lang admin_message_banned}</div>
                        <!--{elseif $post['status'] & 1}-->
                            <div class="grey quote">{lang admin_message_single_banned}</div>
                        <!--{/if}-->
                        <!--{if $_G['forum_thread']['price'] > 0 && $_G['forum_thread']['special'] == 0}-->
                            {lang pay_threads}: <strong>$_G[forum_thread][price] {$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][unit]}{$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][title]} </strong> <a href="forum.php?mod=misc&action=viewpayments&tid=$_G[tid]" >{lang pay_view}</a>
                        <!--{/if}-->
						
                        <!--{if $post['first']  && $threadsortshow}-->
                        	<!--{if $threadsortshow['optionlist'] && !($post['status'] & 1) && !$_G['forum_threadpay']}-->
                                <!--{if $threadsortshow['optionlist'] == 'expire'}-->
                                    {lang has_expired}
                                <!--{else}-->
                                    <div class="box_ex2 viewsort">
                                     <!--{if $threadsortshow['typetemplate']}-->$threadsortshow[typetemplate]<!--{/if}-->
                                    </div>
                                <!--{/if}-->
                            <!--{/if}-->
                        <!--{/if}-->

                        <!--{if $post['first']}-->
						
                            <!--{if !$_G[forum_thread][special]}-->
                                $post[message]
                            <!--{elseif $_G[forum_thread][special] == 1}-->
                                <!--{template forum/viewthread_poll}-->
                            <!--{elseif $_G[forum_thread][special] == 2}-->
                                <!--{template forum/viewthread_trade}-->
                            <!--{elseif $_G[forum_thread][special] == 3}-->
                                <!--{template forum/viewthread_reward}-->
                            <!--{elseif $_G[forum_thread][special] == 4}-->
                                <!--{template forum/viewthread_activity}-->
                            <!--{elseif $_G[forum_thread][special] == 5}-->
                                <!--{template forum/viewthread_debate}-->
                            <!--{elseif $threadplughtml}-->
                                $threadplughtml
                                $post[message]
                            <!--{else}-->
                            	$post[message]
                            <!--{/if}-->
                        <!--{else}-->
                            $post[message]
                        <!--{/if}-->
						

					<!--{/if}-->
			</div>
			<!--{if $_G['setting']['mobile']['mobilesimpletype'] == 0}-->
			<!--{if $post['attachment']}-->
               <div class="grey quote n5_ykckfj">
               <!--{if $_G['uid']}-->{lang attach_nopermission}<!--{else}-->{lang attach_nopermission_login}<!--{/if}-->
               </div>
            <!--{elseif $post['imagelist'] || $post['attachlist']}-->
               <!--{if $post['imagelist']}-->
				<!--{if count($post['imagelist']) == 1}-->
				<ul class="img_one">{echo showattach($post, 1)}</ul>
				<!--{else}-->
				<ul class="img_list cl vm">{echo showattach($post, 1)}</ul>
				<!--{/if}-->
				<!--{/if}-->
                <!--{if $post['attachlist']}-->
				<ul>{echo showattach($post)}</ul>
				<!--{/if}-->
			<!--{/if}-->
			<!--{/if}-->

			<!--{if $post[first]}--><div class="n5_pbyldp"><!--{/if}-->
			<!--{if $_GET['from'] != 'preview' && $_G['setting']['commentnumber'] && !empty($comments[$post[pid]])}-->
			<div id="comment_$post[pid]" class="n5_ztnrdp">
			<!--{loop $comments[$post[pid]] $comment}-->
				<div class="pstl xs1 cl">
					<div class="psta vm">
						<!--{if $comment['authorid']}-->
							<a href="home.php?mod=space&uid=$comment[authorid]" class="xi2 xw1">$comment[author] : </a>
							<!--{else}-->
							{lang guest}
						<!--{/if}-->


						$comment[comment]&nbsp;
					</div>
				</div>
			<!--{/loop}-->
			</div>
			<!--{/if}-->
			<div class="n5_zthfcz">    
				<ul>
					<li>
						<a href="#" class="n5_hfczgd" data-toggle="dropdown"></a>
						<ul class="dropdown-menu">
							<li><a href="forum.php?mod=misc&action=comment&tid=$post[tid]&pid=$post[pid]&extra=$_GET[extra]&page=$page{if $_G['forum_thread']['special'] == 127}&special=$specialextra{/if}&hash={FORMHASH}&hash={FORMHASH}" {if $_G['uid']}class="favbtn"{/if}>����</a></li>
							<li><a href="forum.php?mod=post&action=reply&fid=$_G[fid]&tid=$_G[tid]&repquote=$post[pid]&extra=$_GET[extra]&page=$page">�ظ�</a></li>
							<li><a href="<!--{if $_G[uid]}-->forum.php?mod=misc&action=rate&tid=$_G[tid]&pid=$post[pid]<!--{else}-->member.php?mod=logging&action=login<!--{/if}-->">����</a></li>
							<li><a href="misc.php?mod=report&rtype=post&rid=$post[pid]&tid=$_G[tid]&fid=$_G[fid]" {if $_G['uid']}class="favbtn"{/if}>�ٱ�</a></li>
						</ul>
					</li>
					<li><a class="n5_hfczdz {if $_G['uid']}favbtn{/if}" href="forum.php?mod=misc&action=postreview&do=support&tid=$_G[tid]&pid=$post[pid]&hash={FORMHASH}" {if $_G['uid']}onclick="ajaxmenu(this, 3000, 1, 0, '43', '');return false;"{else} onclick="showWindow('login', this.href)"{/if} id="review_support_$post[pid]">$post[postreview][support]</a></li>
				</ul>
			</div>
			
			<!--{if $post[first]}--></div><!--{/if}-->
        </div>
	    <!--{if $post[first]}-->
		
		<!--{if $post['first'] && ($post[tags] || $relatedkeywords) && $_GET['from'] != 'preview'}-->
			<div class="n5_ztnrbq cl">
				<!--{if $post[tags]}-->
					<!--{eval $tagi = 0;}-->
					<!--{loop $post[tags] $var}-->
						<a title="$var[1]" href="misc.php?mod=tag&id=$var[0]">$var[1]</a>
						<!--{eval $tagi++;}-->
					<!--{/loop}-->
				<!--{/if}-->
				<!--{if $relatedkeywords}--><span>$relatedkeywords</span><!--{/if}-->
			</div>
		<!--{/if}-->
		
		<div class="n5_ztdsys cl">
			<a href="<!--{if $_G[uid]}-->forum.php?mod=misc&action=rate&tid=$_G[tid]&pid=$post[pid]<!--{else}-->member.php?mod=logging&action=login<!--{/if}-->" class="n5_ztdstb">����</a>
			<p><i><!--{echo count($postlist[$post[pid]][totalrate]);}--></i>�˴���</p>
		</div>
		
	    <!--{if $post['relateitem']}-->
	        <div class="n5_nrxgzt cl">
                <div class="nrxgys cl">
			        ��Ҷ��ڿ�
			    </div>
				<div class="xgztnr cl">
				    <ul>
					    <!--{loop $post['relateitem'] $var}-->
					    <li><a href="forum.php?mod=viewthread&tid=$var[tid]" title="$var[subject]">$var[subject]</a></li>
					    <!--{/loop}-->
				    </ul>
				</div>
			</div>
	    <!--{/if}-->
	    <!--{/if}-->
    </div>
	<!--{if $post[first]}-->
    <div class="n5_nrnrxz">
	    <ul id="n5_nrxzgl">
		    <li><a href="forum.php?mod=viewthread&tid=$_G[tid]&page=$page" rel="nofollow">���ѻظ���$_G[forum_thread][allreplies]����</a></li>
			<li><a href="forum.php?mod=viewthread&tid=$_G[tid]&page=$page&authorid=$_G[forum_thread][authorid]" rel="nofollow">{lang viewonlyauthorid}</a></li>
		</ul>
	</div>
	<!--{/if}-->
    <script type="text/javascript" language="javascript">
				var nav = document.getElementById("n5_nrxzgl");
				var links = nav.getElementsByTagName("li");
				var lilen = nav.getElementsByTagName("a"); //�жϵ�ַ
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
				         links[last].className = "a";  //����������ʽ
				</script>	
		
   <!--{hook/viewthread_postbottom_mobile $postcount}-->
   <!--{eval $postcount++;}-->
   <!--{/loop}-->

    <!--{if $_G[forum_thread][allreplies] == 0 }-->
        <div class="n5_nrqsf cl">
           <a href="forum.php?mod=post&action=reply&fid=$_G[fid]&tid=$_G[tid]&reppost=$_G[forum_firstpid]&page=$page">ɳ���ܼ�į...</a>
		</div>
  <!--{/if}--> 
   
</div>
<!-- main postlist end -->

$multipage

<!--{hook/viewthread_bottom_mobile}-->

<a href="javascript:;" title="{lang scrolltop}" class="scrolltop bottom"></a>

<script type="text/javascript">
	function toshare(){
		$(".n5_nrfxzt").addClass("am-modal-active");	
		if($(".sharebg").length>0){
			$(".sharebg").addClass("sharebg-active");
		}else{
			$("body").append('<div class="sharebg"></div>');
			$(".sharebg").addClass("sharebg-active");
		}
		$(".sharebg-active,.share_btn").click(function(){
			$(".n5_nrfxzt").removeClass("am-modal-active");	
			setTimeout(function(){
				$(".sharebg-active").removeClass("sharebg-active");	
				$(".sharebg").remove();	
			},300);
		})
	}	
</script>
<!--�ײ��˵�-->
<div id="n5_nrdbcd">
	<a href="forum.php?mod=post&action=reply&fid=$_G[fid]&tid=$_G[tid]&reppost=$_G[forum_firstpid]&page=$page" class="n5_nrdbhf">����ظ�</a>
	<a class="{if $_G['uid']}favbtn {/if} n5_nrdbdz" href="forum.php?mod=misc&action=recommend&do=add&tid=$_G[tid]&hash={FORMHASH}">����<em id="recommendv_add"{if !$_G['forum_thread']['recommend_add']} style="display:none"{/if}>$_G[forum_thread][recommend_add]</em></a>
	<a href="home.php?mod=spacecp&ac=favorite&type=thread&id=$_G[tid]&formhash={FORMHASH}" id="k_favorite" onclick="showWindow(this.id, this.href, 'get', 0);" onmouseover="this.title = $('favoritenumber').innerHTML + ' {lang activity_member_unit}{lang thread_favorite}'" class="{if $_G['uid']}favbtn {/if} n5_nrdbsc">�ղ�<em id="favoritenumber"{if !$_G['forum_thread']['favtimes']} style="display:none"{/if}>{$_G['forum_thread']['favtimes']}</em></a>
	<a class="n5_nrdbfh" onClick="toshare()">����</a>
	<a href="<!--{if $_GET[fromguid] == 'hot'}-->forum.php?mod=guide&view=hot&page=$_GET[page]<!--{else}-->forum.php?mod=forumdisplay&fid=$_G[fid]&<!--{eval echo rawurldecode($_GET[extra]);}--><!--{/if}-->" class="n5_nrdbfhs">�ϼ�</a>
</div>

<style type="text/css">
.sharebg { background: rgba(0, 0, 0, 0.6);}
</style>

<div class="n5_nrfxzt">
	<h3 class="n5_nrfxbt">����</h3>
	{if strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'micromessenger')}
	<div class="n5_nrfxwx">������Ͻ�ͼ���������Ȧ����΢�ź���</div>
	{/if}
	<ul class="bdsharebuttonbox n5_nrfxlb" id="n5_nrfxan">
		<a href="#" class="bds_tsina" data-cmd="tsina">����΢��</a>
		<a href="#" class="bds_qzone" data-cmd="qzone">QQ�ռ�</a>
		<a href="#" class="bds_sqq" data-cmd="sqq">QQ����</a>
		<a href="#" class="bds_tqq" data-cmd="tqq">��Ѷ΢��</a>
		<a href="#" class="bds_copy" data-cmd="copy">������ַ</a>
		<a href="misc.php?mod=report&rtype=post&rid=$post[pid]&tid=$_G[tid]&fid=$_G[fid]" class="n5_xxjban n5_nrxfanx {if $_G['uid']}favbtn{/if} blue">��Ϣ�ٱ�</a>
	</ul>
	<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"32"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
	<div class="n5_nrfxqx"><button class="share_btn">ȡ��</button></div>
</div>

<script type="text/javascript">
	$('.favbtn').on('click', function() {
		var obj = $(this);
		$.ajax({
			type:'POST',
			url:obj.attr('href') + '&handlekey=favbtn&inajax=1',
			data:{'favoritesubmit':'true', 'formhash':'{FORMHASH}'},
			dataType:'xml',
		})
		.success(function(s) {
			popup.open(s.lastChild.firstChild.nodeValue);
			evalscript(s.lastChild.firstChild.nodeValue);
		})
		.error(function() {
			window.location.href = obj.attr('href');
			popup.close();
		});
		return false;
	});
</script>

<a name="bottem"></a>

<div class="n5_ssymdb">
</div>
<!--{eval $nofooter = true;}-->
<!--{template common/footer}-->