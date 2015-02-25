<!DOCTYPE html>
<html>
<head>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<script src="//code.jquery.com/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

	<link rel="stylesheet" type="text/css" href="mumbo.css">
	<link rel="icon" type="image/ico" href="favicon.ico">
	<meta charset="utf-8">
	<title>Mumbo Jumbo - Official Website</title>

</head>
<body>
	<div class="container">
		<div class="row clearfix">
			
			<div class="col-md-12 column">
				<div id="HEAD">
					<!--Includes the header from php file-->
					<?php
					include('header.php');
					?>
				</div>
			</div>
			<div class="col-md-12 column">
				<div id="NAVBAR">
					<!--Includes the header from php file-->
					<ul class="nav nav-pills nav-justified">
						<li role="presentation" class="active"><a href="mumbo.php">Latest Videos</a></li>
						<li role="presentation" class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
								Playlists <span class="caret"></span>
							</a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="">Hermitcraft</a></li>
								<li><a href="">Tutorials</a></li>
								<li><a href="">Best of Minecraft</a></li>
								<li><a href="">Modsauce</a></li>
							</ul>
						</li>
						<li role="presentation" class="mumbo_nav"><a href="#" class="mumbo_nav_a">World Downloads</a></li>
					</ul>
				</div>
				<br>
			</div>
			
		</div>
		<div class="row clearfix">
			<div class="col-md-8 column mumbo_feed">
				<!--Includes the feed from php file-->
				<?php
				include('feed.php');
				?>
			</div>
			<div class="col-md-4 column mumbo_sidebar">
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