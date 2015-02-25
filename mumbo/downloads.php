<!DOCTYPE html>
<html>
<head>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<script src="//code.jquery.com/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="mumbo.css">
	
	<meta charset="utf-8">
	<title>Mumbo Jumbo - Downloads</title>
</head>
<body>
	<div class="container">
		<div class="row clearfix">
			
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 column">
				<div id="HEAD">
					<!--Includes the header from php file-->
					<?php
					include('header.php');
					?>
				</div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 column"> 
				<div id="NAVBAR">
					<!--Includes the header from php file-->
					<ul class="nav nav-pills nav-justified">
						<li role="presentation" class="mumbo_nav"><a href="index.php" class="mumbo_nav_a">Latest Videos</a></li>
						<li role="presentation" class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
								Playlists <span class="caret"></span>
							</a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="playlist.php?id=hermitcraft">Hermitcraft</a></li>
								<li><a href="playlist.php?id=tutorials">Tutorials</a></li>
								<li><a href="playlist.php?id=bestofminecraft">Best of Minecraft</a></li>
								<li><a href="playlist.php?id=modsauce">Modsauce</a></li>
							</ul>
						</li>
						<li role="presentation" class=" active"><a href="downloads.php" class="mumbo_nav_a">World Downloads</a></li>
					</ul>
				</div>
				<br>
			</div>
			
		</div>
		<div class="row clearfix">
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 column mumbo_feed">
				<!--Includes the feed from php file-->
				<?php
				include('content_downloads.php');
				?>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 column mumbo_sidebar">
				<!--Includes the sidebar from php file-->
				<?php
				include('sidebar.php');
				?>
			</div>

		</div>
		<br>
	</div>
</div>
</body>
</html>
