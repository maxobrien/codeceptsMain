<?php
include_once('parsedown.php');
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
echo '<br>';

?>