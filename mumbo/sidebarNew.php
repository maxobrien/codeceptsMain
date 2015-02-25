
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 column mumbo_twitch">
		<div id="mumbo_twitch">
			
			<?php 
			$json = file_get_contents('https://api.twitch.tv/kraken/streams/monstercat');
			$data = json_decode($json,true);
			if (!isset($data['stream'])) {
				echo '<p ><img src="imgs/twitch_logo.png" class="mumbo_twitch_small img-responsive"></p>';
				echo '<p><a href="http://www.twitch.tv/ThatMumboJumbo" target="_blank">Follow on twitch</p></a>';

			}
			else {
				echo '<p ><img src="imgs/twitch_logo.png" class="mumbo_twitch_large img-responsive"></p>';
				echo '<h4>' . $data['stream']['channel']['status'] . '</h4>';
				echo 'Playing <b>' . $data['stream']['channel']['game'] . '</b>' . ' at <a target="_blank" href="' . $data['stream']['channel']['url'] . '">' . $data['stream']['channel']['url'] . '</a>';
				
			}
			?>
		</div>
	</div>  
</div> 
<br>
<div id="mumbo_twitter">
	<a position="absolute"  data-tweet-limit="5" border-radius="0px" padding="25px" class="twitter-timeline" href="https://twitter.com/ThatMumboJumbo" data-widget-id="566593606774194176">Tweets by @ThatMumboJumbo</a>
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	<script>
	$(window).load(function()
	{
 
// Apply the styles
$("iframe").contents().find('head').append('<style>.timeline{border-radius:0px;}</style>');
});
	</script>
</div>