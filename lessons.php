<h1>All Lessons</h1>
<div id="divider"></div>
<br>
<?php
include_once('Resources/php/Parsedown.php');
$Parsedown = new Parsedown();

echo '<table>';

$lesson_dir         = scandir("lessons/", 1);
$lesson_dir_reverse = array_reverse($lesson_dir, true);
foreach ($lesson_dir_reverse as $part) {
	$this_lesson = $part;
	if ($this_lesson != "." && $this_lesson != "..") {
		echo '<tr id="row' . $this_lesson . 'Title">';
		echo '<td id="cell' . $this_lesson . '">';
		echo $Parsedown->parse(file_get_contents('lessons/' . $this_lesson . '/00.txt'));
		echo '</td>';
		echo '</tr>';
		echo '<tr id="row' . $this_lesson . 'Button">';
		echo '<td id="cell' . $this_lesson . '">';
		echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".lessonModal' . $this_lesson . '">See More...</button>

<div class="modal fade lessonModal' . $this_lesson . '" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
		<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        	<h4 class="modal-title" id="myModalLabel">' . $Parsedown->parse(file_get_contents('lessons/' . $this_lesson . '/00.txt')) . '</h4>
      	</div>
		<div class="modal-body">';
		
		$modaltext = $Parsedown->parse(file_get_contents('lessons/' . $this_lesson . '/description.txt'));
		echo $modaltext;
		echo '</div>
	  <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		<a href="http://www.codecepts.net/lesson/' . $this_lesson . '">
        <button type="button" class="btn btn-primary">Start Lesson...</button></a>
      </div>
    </div>
  </div>
</div>';
	echo '</td>';
	echo '</tr>';
	echo '<tr><td></td></tr>';
	echo '<tr><td></td></tr>';
		
	}
	
}
echo '</table>';

?>