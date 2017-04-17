<?php echo '';exit;?>
<div class="threadlist n5_ssnrys">
	<div class="thread_tit">
		<h2><!--{if $keyword}-->{lang search_result_keyword}<!--{else}-->{lang search_result}<!--{/if}--></h2>
	</div>
	<!--{if empty($articlelist)}-->
		<ul><li><a>{lang search_nomatch}</a></li></ul>
	<!--{else}-->
		<ul>
			<!--{loop $articlelist $article}-->
			<li>
				<a href="{echo fetch_article_url($article);}">$article[title]</a>
			</li>
			<!--{/loop}-->
		</ul>
	<!--{/if}-->
	<!--{if !empty($multipage)}-->$multipage<!--{/if}-->
</div>