<?php echo '';exit;?>
<!--{if $post['first']  && $threadsortshow}-->
    <!--{if $threadsortshow['optionlist'] && !($post['status'] & 1) && !$_G['forum_threadpay']}-->
        <!--{if $threadsortshow['optionlist'] == 'expire'}-->
            {lang has_expired}
        <!--{else}-->
            <div class="box_ex2 viewsort n5-flxx">
				<h4>$_G[forum][threadsorts][types][$_G[forum_thread][sortid]]</h4>
				<ul class="cl">
                    <!--{loop $threadsortshow['optionlist'] $option}--><li><!--{if $option['type'] != 'info'}--><span>$option[title]</span><!--{if $option['value']}--><!--{eval preg_match("/(".str_replace("/",'\/',$_G['setting']['attachurl']).")(.*?)((.gif)|(.jpg)|(.jpeg)|(.bmp)|(.png))/",strtolower($option['value']),$dzlab_match);}--><!--{if count($dzlab_match)}--><img src='$dzlab_match[0]' /><!--{else}-->$option[value]<!--{/if}--> $option[unit]<!--{else}--><span class="xg1">--</span><!--{/if}--></li><!--{/if}--><!--{/loop}-->
                </ul>
            </div>
        <!--{/if}-->
    <!--{/if}-->
<!--{/if}-->