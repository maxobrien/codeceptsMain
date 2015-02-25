<?php
/*include_once('parsedown.php');
$table = file('downloads.csv');
echo '<br>';
echo '<h2>World Downloads</h2>';
echo '<div class="downloads_table">';
echo '<table class="">';
$t = 0; 
foreach ($table as $row) {
              // Turn blank lines in the CSV file into a border between rows: turn double blank lines into a second table
  if (trim(trim($row),',') == '') {
    if (!isset($linebreak)) { $linebreak = 1; }
    else { $t = 0; unset($linebreak); echo "</table>\n<table>"; }
  }  
  else {
                // Because the original file is comma-delimited, we need to stop commas within cells being read as cell breaks
                // If there are commas within a cell, the cell will be wrapped in quotes. Need to identify these cells and lift out their data - but also avoid cells that have quotes within them.
    $row = trim($row).',';
    preg_match_all('/(?<!")"(.+?)",/',$row,$escapes);
    $escapes = $escapes[0];
    $e = 0; foreach ($escapes as $escape) {
      $escape = rtrim($escape,',');
      $row = str_replace($escape,'~E'.$e.'~',$row);
      $e++;
    }
                // Now that the commas we want to keep are preserved, the others can be converted into a more unique string for later breaking apart.
    $row = str_replace(',','~BR~',$row); 
    $e = 0; foreach ($escapes as $escape) {
      $escape = trim(rtrim($escape,','),'"'); 
      $row = str_replace('~E'.$e.'~',$escape,$row);
      $e++;
    }
    echo '<tr';
    if ($t % 2 == 0) { if (isset($rowclass)) { echo ' alt'; } else { echo ' class="alt'; $rowclass = 1; } }
    if (isset($linebreak)) { if (isset($rowclass)) { echo ' breakrow'; } else { echo ' class="breakrow'; $rowclass = 1; } }
    if (isset($rowclass)) { echo '"'; }
    echo '>';
    $cells = explode('~BR~',$row);
    foreach ($cells as $cell) {
      if ($t == 0) { echo "<th>"; } else { echo "<td>"; }
      $cell = str_replace('""','"',$cell);
      // echo Parsedown::instance()->parse($cell);
      if (strpos($cell,'https://www.youtube.com') !== false) {
        echo '<a target="_blank" href="' . $cell . '"><img class="mumbo_icon" src="imgs/youtube_logo.png"></a>';
      }
      elseif (strpos($cell,'http://www.mediafire.com') !== false) {
        echo '<a target="_blank" href="' . $cell . '"><img class="mumbo_icon" src="imgs/download.png"></a>';
      }
      else {echo Parsedown::instance()->parse($cell);}
      if ($t == 0) { echo "</th>"; } else { echo "</td>"; }
    }
    echo "</tr>";
    $t++; unset($linebreak,$rowclass);
  }
}
echo "</table>";
echo '</div>';
echo '<br>';*/

$sheet_url = 'https://spreadsheets.google.com/feeds/list/1pc9yjycNX5jZzju5cjISs1irxciTRAXzBa2Jv7rI3yA/od6/public/basic?alt=json';
$json = file_get_contents($sheet_url);
$data = json_decode($json,true);
echo '<br>';
echo '<h2>World Downloads</h2>';
echo '<div class="downloads_table">';
echo '<table>';

echo '<tr class="alt">';
echo '<th><p>Name</p></th><th><p>Video</p></th><th><p>Link</p></th></tr>';
$t = 1;
foreach($data['feed']['entry'] as $part)
{ 
  echo '<tr';
  if ($t % 2 == 0) {
    echo ' class="alt"';
  } 
  echo '>';
  echo '<td>';
  echo $part['title']['$t'] . "\n";
  echo '</td>';
  $content_array = explode(',',$part['content']['$t']);
  foreach($content_array as $cell){
    echo '<td>';
    if (strpos($cell,'video:') !== false) {
      $cell_replace = str_replace('video: ', '', $cell);
      echo '<a target="_blank" href="' . $cell_replace . '"><img class="mumbo_icon" src="imgs/youtube_logo.png"></a>';
    }
    if (strpos($cell,'link:') !== false) {
      $cell_replace = str_replace('link: ', '', $cell);
      echo '<a target="_blank" href="' . $cell_replace . '"><img class="mumbo_icon" src="imgs/download.png"></a>';
    }
    echo '</td>';
  }
  echo '</tr>';
  $t++;
}  

echo '</table>'; 
echo '</div>';
?>