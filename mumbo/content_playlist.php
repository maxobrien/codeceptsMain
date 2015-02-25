
<?php
if (!isset($_GET['id'])) {
	$playlist_id = "default";
} else {
	$playlist_id = $_GET['id'];
}

if ($playlist_id == "default") {
	//Adds the page with all the lessons on it
	
} else {
//$context  = stream_context_create(array('http' => array('header' => 'Accept: application/xml')));
//$url = 'https://gdata.youtube.com/feeds/api/users/divisioncrobey/uploads?v=2';

//$xml = file_get_contents($url, false, $context);
//$feedcrobey = simplexml_load_string($url);
//print_r($feedcrobey);
	if ($playlist_id == "hermitcraft") {
		define('YT_API_URL', 'http://gdata.youtube.com/feeds/api/playlists/PLFm1tTY1NA4d4xMGQ0IOembHDW8MbOR7n?max-results=50');
		echo '<h2>Hermitcraft Season III Playlist</h2>';
	}
	elseif ($playlist_id == "tutorials") {
		define('YT_API_URL', 'http://gdata.youtube.com/feeds/api/playlists/PLFm1tTY1NA4cFes8tk7XgrxaMTuApEUxz?max-results=50');
		echo '<h2>Tutorial Playlist</h2>';
	}
	elseif ($playlist_id == "bestofminecraft") {
		define('YT_API_URL', 'http://gdata.youtube.com/feeds/api/playlists/PLFm1tTY1NA4dcjM3bo2X7mQa-meY1p_b4?max-results=50');
		echo '<h2>Best of Minecraft Playlist</h2>';
	}
	elseif ($playlist_id == "modsauce") {
		define('YT_API_URL', 'http://gdata.youtube.com/feeds/api/playlists/PLFm1tTY1NA4c7bAgdtYyvQS0HsVm2orvT?max-results=50');
		echo '<h2>Modsauce Playlist</h2>';
	}
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, YT_API_URL);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//$feed holds a rss feed xml returned by youtube API
	$feed = curl_exec($ch);
	curl_close($ch); 

	$xml = simplexml_load_string($feed);
//print_r($xml);

	foreach ($xml->entry as $entry)
	{   
		$media = $entry->children('media', true);
		$group = $media->group;
		$thumb = $group->thumbnail[0];

		list($thumb_url, $thumb_width, $thumb_height, $thumb_time) = $thumb->attributes();
		$content_attributes = $group->content->attributes();
		$yt = $media->children('http://gdata.youtube.com/schemas/2007');
                //$id = $yt->videoid;
  //$video_id = $entry->{'media_group'}->{'yt_videoid'};
  //echo $video_id;
                //echo "<h1>" . $entry->title . "</h1>";
		$thumb_url_replace = str_replace('/0.jpg', '', $thumb_url);
		$id = str_replace('http://i.ytimg.com/vi/', '', $thumb_url_replace);
		echo '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mumbo_thumbnail_h">';
		echo '<div id="thumbnail_crop">';
		echo '<a href="video.php?id=' . $id . '">';
		echo '<img src="' . $thumb_url . '" class="thumb img-responsive">';
		echo '</a>'; 
		echo '</div>';
		echo '</div>';
    //$attr = $xml->Var[0]->attribu tes();
    //$thumnail_url = 'https://i.ytimg.com/vi/' .  . '/default.jpg';
    //$thumnail_url = $entry->{'media:group'}->{'media:thumbnail'}->attributes();
    //echo $thumnail_url[url];
	}  
}
?>
