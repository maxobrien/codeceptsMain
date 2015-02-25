<?php
$json = file_get_contents('https://api.twitch.tv/kraken/streams/ThatMumboJumbo'); 
$data = json_decode($json,true);
if (!isset($data['stream'])) {
	echo '<p ><a href="http://www.twitch.tv/ThatMumboJumbo" target="_blank"><img src="imgs/twitch_logo.png" class="mumbo_twitch_page  img-responsive"></a></p>';
	echo '<h2 class="text-center">Not currently live</h2>';
	echo '<h4 class="text-center">Follow at <b><a href="http://www.twitch.tv/ThatMumboJumbo" target="_blank">http://www.twitch.tv/ThatMumboJumbo</a></h4>';
	echo '<br>';
}
else {
	echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mumbo_video_embed">';
	echo '<br>';
	echo '<div class="embed-responsive embed-responsive-16by9" >';
	echo '<iframe src="http://www.twitch.tv/thatmumbojumbo/embed" frameborder="0" scrolling="no" height="378" width="620"></iframe><a href="http://www.twitch.tv/thatmumbojumbo?tt_medium=live_embed&tt_content=text_link" style="padding:2px 0px 4px; display:block; width:345px; font-weight:normal; font-size:10px;text-decoration:underline;">Watch live video from ThatMumboJumbo on www.twitch.tv</a>';
	echo '</div>'; 
	echo '<div class="mumbo_twitch_info">';
	echo '<h1 class="text-center">' . $data['stream']['channel']['status'] . '</h1>';
	echo '<h3 class="text-center">Playing <b>' . $data['stream']['channel']['game'] . '</b>' . ' for <b>' . $data['stream']['viewers'] . '</b> viewers!</h3>';
	echo '<h4 class="text-center"><a href="http://www.twitch.tv/ThatMumboJumbo" target="_blank">Open in Twitch</a></h4>';
	echo '<br>';
	echo '</div>';
	echo '</div>';
}
?> 