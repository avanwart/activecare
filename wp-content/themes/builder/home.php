<?php 
/*
Use this page if you want to create a custom homepage for 
your site. WordPress will look for home.php before index.php. If
you end up using a custom home.php page you can also use the 
blog.php page to display your blog posts. Simply rename or delete
this page template and the latest blog posts(index.php) will be the
homepage of your website. 
*/
?>
<?php get_header(); ?>

<section id="hero">
	
</section>
<div id="banner" class="home-page">
	<div id="myCarousel" class="carousel slide">
		<div class="carousel-inner">
			<div class="item active sports">
				<div class="jumbotron">
					<div class="container">
						<div class="row">
							<div class="col-lg-12 stage light">
								<h1>Sports</h1>
							</div>
							<div class="col-lg-5">
								
							</div>
						</div><!-- end .row-->
					</div> <!-- end .container-->
				</div> <!-- end .jumbotron-->
			</div>
		</div>
		<a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
		<a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
	</div><!-- end of carousel -->
</div> <!-- end #banner-->

<div class="container home-three">
	<div class="row">
		<div class="col-lg-4">
			<img class="" src="http://placehold.it/320x240">
			<h2>Compelling Headline 1</h2>
			<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
			<p><a class="btn btn-success" href="#">View details <span class="glyphicon glyphicon-chevron-right"></span></a></p>
		</div><!-- /.col-lg-4 -->
		<div class="col-lg-4">
			<img class="" src="http://placehold.it/320x240">
			<h2>Compelling Headline 2</h2>
			<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
			<p><a class="btn btn-success" href="#">View details <span class="glyphicon glyphicon-chevron-right"></span></a></p>
		</div><!-- /.col-lg-4 -->
		<div class="col-lg-4">
			<img class="" src="http://placehold.it/320x240">
			<h2>Compelling Headline 3</h2>
			<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
			<p><a class="btn btn-success" href="#">View details <span class="glyphicon glyphicon-chevron-right"></span></a></p>
		</div><!-- /.col-lg-4 -->
	</div> <!-- end .row-->
</div> <!-- end .container-->

<?php get_footer(); ?>
