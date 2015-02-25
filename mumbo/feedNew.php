<?php
//$context  = stream_context_create(array('http' => array('header' => 'Accept: application/xml')));
//$url = 'https://gdata.youtube.com/feeds/api/users/divisioncrobey/uploads?v=2';

//$xml = file_get_contents($url, false, $context);
//$feedcrobey = simplexml_load_string($url);
//print_r($feedcrobey);
define('YT_API_URL', 'https://gdata.youtube.com/feeds/api/users/thatmumbojumbo/uploads?v=2&max-results=20');


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, YT_API_URL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//$feed holds a rss feed xml returned by youtube API
$feed = curl_exec($ch);
curl_close($ch);

$xml = simplexml_load_string($feed);
//print_r($xml);
$count = 0;
$row_pos = rand(2,6);
$row_pos_double = $row_pos * 2 + 1;
$row_pos_1 = $row_pos_double;
$row_pos_2 = $row_pos_1 + 1;
$row_pos_3 = $row_pos_2 + 1;
$row_pos_4 = $row_pos_3 + 1;
foreach ($xml->entry as $entry)
{  
  $media = $entry->children('media', true);
  $group = $media->group;
  $thumb = $group->thumbnail[1];
  $desc = $group->description;
  $date = $entry->published;
  list($thumb_url, $thumb_width, $thumb_height, $thumb_time) = $thumb->attributes();
  $content_attributes = $group->content->attributes();
  $yt = $media->children('http://gdata.youtube.com/schemas/2007');
  $id = $yt->videoid;
  //$video_id = $entry->{'media_group'}->{'yt_videoid'};
  //echo $video_id;
                //echo "<h1>" . $entry->title . "</h1>";
  if ($count == 0) {
    echo '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">';
    echo '<a href="video.php?id=' . $id . '">';
    echo '<img src="' . $thumb_url . '" class="img-responsive mumbo_thumbnail">';
    echo '</a>';
    echo '</div>';
    echo '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mumbo_feed_desc">';
    echo '<a href="video.php?id=' . $id . '">';
    echo '<h2>' . $entry->title . '</h2>';
    echo '</a>';
    $date_cut = substr($date, 0, strpos($date, "T"));
    
    $date_array = explode('-',$date_cut);
    $date_array_reverse = array_reverse($date_array);
    $date_count = 0;
    echo '<h5>Published:';
    foreach ($date_array_reverse as $part) {

      if ($date_count == 0) {
        if ($part == '1 ' || $part == '21 ' || $part == '31 ') {
          $date_print = $part . 'st';
        }
        elseif ($part == 2 || $part == 22) {
          $date_print = $part . 'nd';
        } 
        elseif ($part == 3 || $part == 23) {
          $date_print = $part . 'rd';
        } 
        else {
          $date_print = $part . 'th';
        }
        echo $date_print;
      }
      if ($date_count == 1) {
        if ($part == '01') {
          $month_print = ' January ';
        }
        if ($part == '02') {
          $month_print = ' February ';
        }
        if ($part == '03') {
          $month_print = ' March ';
        }
        if ($part == '04') {
          $month_print = ' April ';
        }
        if ($part == '05') {
          $month_print = ' May ';
        }
        if ($part == '06') {
          $month_print = ' June ';
        }
        if ($part == '07') {
          $month_print = ' July ';
        }
        if ($part == '08') {
          $month_print = ' August ';
        }
        if ($part == '09') {
          $month_print = ' September ';
        }
        if ($part == '10') {
          $month_print = ' October ';
        }
        if ($part == '11') {
          $month_print = ' November ';
        }
        if ($part == '12') {
          $month_print = ' December ';
        }
        echo $month_print;
      }
      if ($date_count == 2) {
        echo $part;
      }
      $date_count = $date_count + 1;
    }
    
    $desc_cut = substr($desc,0,190).'...';
    echo '<p class="mumbo_feed_description_text">' . $desc_cut . '</p>'; 
    echo '</div>'; 
  }
  elseif ($count == $row_pos_1 || $count == $row_pos_2 || $count == $row_pos_3 || $count == $row_pos_4) {
    echo '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">';
    echo '<a href="video.php?id=' . $id . '">';
    echo '<img src="' . $thumb_url . '" class="img-responsive mumbo_thumbnail_small">';
    echo '</a>';
    echo '</div>';
  }
  else {
    echo '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">';
    echo '<a href="video.php?id=' . $id . '">';
    echo '<img src="' . $thumb_url . '" class="img-responsive mumbo_thumbnail">';
    echo '</a>';
    echo '</div>';
  }
  $count = $count + 1;
    //$attr = $xml->Var[0]->attributes();
    //$thumnail_url = 'https://i.ytimg.com/vi/' .  . '/default.jpg';
    //$thumnail_url = $entry->{'media:group'}->{'media:thumbnail'}->attributes();
    //echo $thumnail_url[url];
}  

?>