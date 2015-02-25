<?php
if (!isset($_GET['id'])) {
	$id = "default";
} else {
	$id = $_GET['id'];
}

if ($id == "default") {
	//Adds the page with all the lessons on it
	
} else {
	include_once('parsedown.php');


//The Youtube's API url
//http://gdata.youtube.com/feeds/api/videos/s-Q83tuhzG0?v=2&prettyprint=true
	define('YT_API_URL', 'http://gdata.youtube.com/feeds/api/videos/' . $id . '?prettyprint=true');

//Change below the video id. 
	$video_id = $id;

//Using cURL php extension to make the request to youtube API
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, YT_API_URL);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//$feed holds a rss feed xml returned by youtube API
	$feed = curl_exec($ch);
	curl_close($ch);

//Using SimpleXML to parse youtube's feed
	$xml = simplexml_load_string($feed);
 

//print_r($xml);
	$entry = $xml->entry[0];
//If no entry whas found, then youtube didn't find any video with specified id
//if(!$entry) exit('Error: no video with id "' . $video_id . '" whas found. Please specify the id of a existing video.');

// $media = $entry->children('media', true);
// $group = $media->group;
// $title = $xml->title;

// $desc = $group->description;

////echoing the variables for testing purposes:
//echo '<h1>' . $title . '</h1><br />';

	echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mumbo_video_embed">';
	echo '<br>';
	echo '<div class="embed-responsive embed-responsive-16by9" >';

	echo '<iframe width="100%" height="auto" src="https://www.youtube.com/embed/' . $id . '?autoplay=1&showinfo=0" frameborder="0" allowfullscreen class="video"></iframe>';
	echo '</div>'; 
	echo '</div>';  
	echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mumbo_video_title">';
	echo '<h2>' . $xml->title . '</h2>';
	echo '</div>'; 
	echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mumbo_video_description">';

// $url = 'http://gdata.youtube.com/feeds/api/videos/' . $id . '?prettyprint=true&alt=json';
// $content = file_get_contents($url);
// $json = json_decode($content, true);
// echo $json[entry][media$group][media$description][$t];
	$txt_unparsed = $xml->content;
	echo Parsedown::instance()
   ->setBreaksEnabled(true) # enables automatic line breaks
   ->text($txt_unparsed); 

   echo '<p>' . $txt . '</p>';
   echo '<br>';
   echo '</div>'; 
//echo '<p>'  . $desc . '</p><br />';
//echo 'video keywords: ' . $vid_keywords . '<br />';
//echo 'thumbnail url: ' . $thumb_url . '<br />';
//echo 'thumbnail width: ' . $thumb_width . '<br />';
//echo 'thumbnail height: ' . $thumb_height . '<br />';
//echo 'thumbnail time: ' . $thumb_time . '<br />';
//echo 'video duration: ' . $vid_duration . '<br />';
//echo 'video duration formatted: ' . $duration_formatted;

}


?>