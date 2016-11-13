<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="style.css">

<html>
<title> Home : ScubaDiver</title>
<body>
	<?php include 'header.php';?>
	<?php include 'scripts/sessionStart.php';?>
	<h1>Home : Scubadiver</h1>
	<h2>Leading in selling scuba stuff</h2>
	
	<article>
	
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1"></li>
		<li data-target="#myCarousel" data-slide-to="2"></li>
		<li data-target="#myCarousel" data-slide-to="3"></li>
	</ol>

	<div class="carousel-inner" role="listbox">
		<div class="item active">
			<img src="backgrounds/c4d6ea76efbfb103f95bb156c711d41c.jpg" alt="Chania">
		</div>

		<div class="item">
			<img src="backgrounds/Recreational-Scuba-Diving-101-050.jpg" alt="Chania">
		</div>

		<div class="item">
			<img src="backgrounds/diving-with-whales.jpg" alt="Flower">
		</div>

		<div class="item">
			<img src="backgrounds/gVH1Jk.jpg" alt="Flower">
		</div>
	</div>

		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	
	
	</article>


	<?php include 'footer.php';?>

</body>

</html>
