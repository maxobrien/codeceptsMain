<?php
#A list of useful lines of code that we do not need to use:
//echo"<script type='text/javascript'>alert('This is an alert');</script>"

#INCLUDES:
	#Include Parsedown
		include_once('Resources/php/Parsedown.php');

#CODE START
#=============================================================#
#=============================================================#

//Adds header to top of page
include('header.php');
echo '<br><br><br><br>';
if (!isset($_GET['lesson'])) {
	$lesson = "default";
} else {
	$lesson = $_GET['lesson'];
}

if ($lesson == "default") {
	//Adds the page with all the lessons on it
	include('lessons.php');
} else {

	$dir    = 'lessons/' . $lesson . '/';
	$lesson_1 = scandir($dir, 1);

	#Sets parsedown
	$Parsedown = new Parsedown();

	#This will reverse the array so it appears in the correct order on the website
	$lesson_reverse = array_reverse($lesson_1, true);
	$paranum        = 1;
	foreach ($lesson_reverse as $part) {
		if ($part != "." && $part != ".." && $part != "description.txt") {
			
    			$txt = "";

			#This is the parsedown section that will format the text
			
			#This will print out the content to the screen
			echo '<div id=paragraph' . $paranum++ . '>';
			if (strpos($part,'.txt') !== false) {
				$txt = $Parsedown->parse(file_get_contents($dir . '/' . $part));
				echo $txt;
			}
			if (strpos($part,'.png') !== false) {
				echo '<p>';
				echo '<img src="http://www.codecepts.net/lessons/' . $lesson . '/' . $part . '""></img>';
				$part_caption = str_replace("-", "", $part);
				$part_caption = str_replace(".png", "", $part_caption);
				$part_caption = str_replace("_", " ", $part_caption);
				for ($x = 0; $x <= 9; $x++) {
					$part_caption = str_replace($x, "", $part_caption);
				}
				echo $part_caption;
				echo '</p>';
			}
			
			#This hides all the paragrahs on page load except for the title
			echo '<script type="text/javascript"> $( document ).ready(function() {$("#paragraph' . $paranum . '").hide() });</script>';
			echo '</div>';
			#echo <hr>;
			
			
		}

	}
	echo '<button id="moveonbutton" type="button" class="btn btn-primary" onclick="moveon()">Go on...</button>';
	echo '<a id="nextlessonbutton" type="button" class="btn btn-success" href="http://www.codecepts.net/c/lessons">Find another Lesson</a>';
}
#This section is the code to make the next paragraph slide down when the button is clicked
	$paralength = sizeof($lesson_1) - 3;
	
	echo '
		
		<script type="text/javascript">
			$( document ).ready(function() {$("#nextlessonbutton").hide();
				$("#paragraph2").show()

			 });
			var paranum = 3;
			function moveon(){
	  			$("#paragraph" + paranum).slideDown();
	  			if (paranum == ' . $paralength . ') {
					$("#moveonbutton").slideUp(500);
					$("#nextlessonbutton").delay(500).slideDown(500);
				};
	  			paranum = paranum + 1;
			};
		</script>';
#This is one of the most important lines of code ever, this will stop the content from dissapearing behind the footer
echo '<hr class="clear">';

//Adds footer to bottom of page
include('footer.php');

?>