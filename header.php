<html>
    <head>
        <link href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.min.css" rel="stylesheet" type="text/css" />

<script src="//code.jquery.com/ui/1.11.2/jquery-ui.min.js"></script>
        <link rel="stylesheet" type="text/css" href="http://www.codecepts.net/Resources/css/ink.css">
        <title>Codecepts</title>
        <script src="http://www.codecepts.net/Resources/js/jquery.js"></script>
        <link href="http://www.codecepts.net/Resources/css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
        <link href='http://www.codecepts.net/Resources/css/main.css' rel='stylesheet' type='text/css'>
        <script src="http://www.codecepts.net/Resources/js/bootstrap.js"></script>
        <meta charset="utf-8">
        <meta name="description" content="Learn to Code - The easy way">
        <meta name="keywords" content="Codecepts,Codecept,code,concept,coding,programming,scripting">
        <meta name="author" content="Codecepts">
        <link href="Resources/Images/Codecepts_Logo.png">
        
    </head>
    <div class="container">
    <div class="row clearfix">
    <div class="col-12">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="http://www.codecepts.net">Codecepts</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Lessons<strong class="caret not-blue"></strong></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="http://www.codecepts.net/c/lessons">All Lessons</a>
                        </li>
                        <li class="divider"></li>
                        <?php
							#This PHP code will write out the lessons to the dropdown on the navbar
                            $lesson_dir = scandir("lessons/", 1);
                            for ($x = 0; $x <= 4; $x++) {
                            	$this_lesson = $lesson_dir[9 - $x];
                                    if ($this_lesson != "." && $this_lesson != "..") {
                                        
                                        $part_replace = str_replace("_"," ",$this_lesson);
                                        $part_replace1 = str_replace("-",", ",$part_replace);
                                        $part_replace2 = str_replace("0","",$part_replace1);

                                        echo '<li>';
                                        echo '<a href="http://www.codecepts.net/lesson/' . $this_lesson . '">' . $part_replace2 . '</a>';;
										
                                        echo '</li>';
                                        
                                    }
                                }
                            ?>
                    </ul>
                </li>
                <li>
                    <a href="http://www.codecepts.net/c/about">About</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Contact Us<strong class="caret not-blue"></strong></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="http://twitter.com/codecepts">Twitter</a>
                        </li>
                        <li>
                            <a href="https://www.facebook.com/pages/Codecepts/1560904414162093">Facebook</a>
                        </li>
                        <li>
                            <a href="mailto:info@codecepts.net">Email</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="mailto:bugs@codecepts.net?Subject=Bug%20Report">Submit a bug report</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="http://www.patreon.com/codecepts">Donate &nbsp &nbsp</a>
                </li>
            </ul>
        </div>
    </nav>
    
<body> 