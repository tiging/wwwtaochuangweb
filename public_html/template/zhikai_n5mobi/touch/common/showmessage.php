<?php echo '';exit;?>
<!--{if $param['login']}-->
<!--{if $_G['inajax']}-->
<!--{eval dheader('Location:member.php?mod=logging&action=login&inajax=1&infloat=1');exit;}-->
<!--{else}-->
<!--{eval dheader('Location:member.php?mod=logging&action=login');exit;}-->
<!--{/if}-->
<!--{/if}-->

<!--window.location.href='$url_forward'

<script type="text/javascript">
				setTimeout(function() {
					window.location.href = '$url_forward';
				}, '3000');
			</script>


-->

<!--{template common/header}-->
<!--{if $_G['inajax']}-->
<div class="tip" style="height:150px;">
	<dt id="messagetext">
		<p>$show_message</p>
        <!--{if $_G['forcemobilemessage']}-->
        	<p >
            	<a href="{$_G['setting']['mobile']['pageurl']}" class="mtn">{lang continue}</a><br />
                <a href="javascript:history.back();">{lang goback}</a>
            </p>
        <!--{/if}-->
		<!--{if $url_forward && !$_GET['loc']}-->
			<!--<p><a class="grey" href="$url_forward">{lang message_forward_mobile}</a></p>-->
			<script type="text/javascript">
				setTimeout(function() {
					window.location.href = '$url_forward';
				}, '3000');
			</script>
		<!--{elseif $allowreturn}-->
			<p><input type="button" class="button" onclick="window.location.href='$url_forward'" value="{lang close}"></p>
		<!--{/if}-->
	</dt>
</div>
<!--{else}-->

<div class="n5_tbys cl">
    <a href="javascript:void(0);" onclick="return window.history.go(-1);" class="fhan">����</a>
	<span class="dqym">��ʾ</span>
</div>
<div class="n5_tbxj"></div>

<!-- main jump start -->
<div class="jump_c n5_wxts">
    <div class="n5_wxtsbz"></div>
	<p>$show_message</p>
    <!--{if $_G['forcemobilemessage']}-->
		<p>
            <a href="{$_G['setting']['mobile']['pageurl']}" class="mtn">{lang continue}</a><br />
            <a href="javascript:history.back();">{lang goback}</a>
        </p>
    <!--{/if}-->
	<!--{if $url_forward}-->
		<p><a class="grey" href="$url_forward">{lang message_forward_mobile}</a></p>
	<!--{elseif $allowreturn}-->
		<p><a class="grey" href="javascript:history.back();">{lang message_go_back}</a></p>
	<!--{/if}-->
</div>
<!-- main jump end -->

<!--{/if}-->
<!--{eval $nofooter = true;}-->
<!--{template common/footer}-->
