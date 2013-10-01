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

<section id="social-proof">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h3>Hear what our clients have to say</h3>
				<ul class="testimonials unstyled">
				<?php
                   global $post;
                   $args = array( 'posts_per_page' => 2, 'category' => 'Testimonials' );
                   $myposts = get_posts( $args );
                   foreach( $myposts as $post ) :  setup_postdata($post); 
                 ?>
					<li style="display: none;">
						<blockquote><?php the_field('quote'); ?> <small><?php the_field('name'); ?></small></blockquote>
					</li>
				<?php endforeach; ?>
				</ul>
				<p class="right"><a href="/testimonials">View more testimonials &raquo;</a></p>
			</div>
		</div>
	</div>
</section>

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
			<img class="thumbnail" src="<?php the_field('annexe'); ?>">
			<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
			<p><a class="btn btn-success" href="#">View details <span class="glyphicon glyphicon-chevron-right"></span></a></p>
		</div><!-- /.col-lg-4 -->
	</div> <!-- end .row-->
</div> <!-- end .container-->

<script>
	jQuery(document).ready(function($){
		$(function(){
			var list = $("ul.testimonials li").toArray();
			var elemlength = list.length;
			var randomnum = Math.floor(Math.random()*elemlength);
			var randomitem = list[randomnum];
			$(randomitem).css("display", "block");
		});
	});
</script>

<?php get_footer(); ?>
