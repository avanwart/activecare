<?php
/**
 * Home Page Template
 *
   Template Name:  Home Page Template
 *
 */
?>

<?php get_header(); ?>

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
			<div class="item life">
				<div class="jumbotron">
					<div class="container">
						<div class="row">
							<div class="col-lg-12 stage light">
								<h1>Life</h1>
							</div>
							<div class="col-lg-5">
								
							</div>
						</div><!-- end .row-->
					</div> <!-- end .container-->
				</div> <!-- end .jumbotron-->
			</div>
			<div class="item dance">
				<div class="jumbotron">
					<div class="container">
						<div class="row">
							<div class="col-lg-12 stage light">
								<h1>Dance</h1>
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
			<h2><?php the_field('headline_1'); ?></h2>
			<img class="thumbnail" src="<?php the_field('founder'); ?>">
			<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
			<p><a class="btn btn-success" href="#">View details <span class="glyphicon glyphicon-chevron-right"></span></a></p>
		</div><!-- /.col-lg-4 -->
		<div class="col-lg-4">
			<h2><?php the_field('headline_2'); ?></h2>
			<img class="thumbnail" src="<?php the_field('philosophy'); ?>">
			<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
			<p><a class="btn btn-success" href="#">View details <span class="glyphicon glyphicon-chevron-right"></span></a></p>
		</div><!-- /.col-lg-4 -->
		<div class="col-lg-4">
			<h2><?php the_field('headline_3'); ?></h2>
			<img class="thumbnail" src="<?php the_field('facility'); ?>">
			<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
			<p><a class="btn btn-success" href="#">View details <span class="glyphicon glyphicon-chevron-right"></span></a></p>
		</div><!-- /.col-lg-4 -->
	</div> <!-- end .row-->
</div> <!-- end .container-->

<?php get_footer(); ?>
