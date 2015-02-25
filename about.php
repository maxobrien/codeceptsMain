<?php

include('header.php');
include_once('Resources/php/Parsedown.php');
$Parsedown = new Parsedown();
echo '<br><br><br><br>';
echo $Parsedown->parse(file_get_contents('pages/about.txt'));
include('footer.php');

?>