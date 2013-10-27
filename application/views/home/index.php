<span class="clear upperframe"><span></span></span>
<div class="roundframe">
<?php
$array = ssi_boardNews(7, 5, null, 5000, 'array');
	
	foreach ($array as $news)
	{
		echo '	<div class="cat_bar"><h3 class="catbg"><a href="', $news['href'], '">', $news['subject'], '</a></h3></div>
				<p>', $news['time'], ' ', $txt['by'], ' ', $news['poster']['link'], ' | ', $news['link'] , ' | ', $news['new_comment'],
				'</p><hr><p>', $news['body'], '</p>';
	}
?>
</div>
<span class="lowerframe"><span></span></span>