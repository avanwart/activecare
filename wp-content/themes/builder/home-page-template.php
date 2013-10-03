<?php
/**
 * Home Page Template
 *
   Template Name:  Home Page Template
 *
 */
?>

<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div id="banner" class="home-page">
	<div id="myCarousel" class="carousel slide">
		<div class="carousel-inner">
			<div class="item active sports" style="background: url('<?php the_field('photo_1');?>') 50% 50% no-repeat; background-size: cover;">
				<div class="jumbotron">
					<div class="container">
						<div class="row">
							<div class="col-lg-12 stage light">
								<h1><?php the_field('text_1'); ?></h1>
							</div>
							<div class="col-lg-5">
								
							</div>
						</div><!-- end .row-->
					</div> <!-- end .container-->
				</div> <!-- end .jumbotron-->
			</div>
			<div class="item life" style="background: url('<?php the_field('photo_2');?>') 50% 50% no-repeat; background-size: cover;">
				<div class="jumbotron">
					<div class="container">
						<div class="row">
							<div class="col-lg-12 stage light">
								<h1><?php the_field('text_2'); ?></h1>
							</div>
							<div class="col-lg-5">
								
							</div>
						</div><!-- end .row-->
					</div> <!-- end .container-->
				</div> <!-- end .jumbotron-->
			</div>
			<div class="item dance" style="background: url('<?php the_field('photo_3');?>') 10% 50% no-repeat; background-size: cover;">
				<div class="jumbotron">
					<div class="container">
						<div class="row">
							<div class="col-lg-12 stage light">
								<h1><?php the_field('text_3'); ?></h1>
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
				<h3><a href="<?php bloginfo('wpurl'); ?>/member-testimonials">What people are saying about us</a></h3>
				<ul class="testimonials unstyled">
				<?php
                   global $post;
                   $args = array( 'posts_per_page' => 2, 'category' => '136' );
                   $myposts = get_posts( $args );
                   foreach( $myposts as $post ) :  setup_postdata($post); 
                 ?>
					<li style="display: none;">
						<blockquote>&ldquo;<a href="<?php bloginfo('wpurl'); ?>/member-testimonials"><?php the_field('quote'); ?></a>&rdquo; <small><?php the_field('name'); ?></small></blockquote>
					</li>
				<?php endforeach; ?>
				<?php wp_reset_postdata(); ?>
				</ul>
			</div>
		</div>
	</div>
</section>

<div class="container home-three">
	<div class="row">
		<div class="col-lg-4">
			<h2><?php the_field('headline_1'); ?></h2>
			<img class="thumbnail" src="<?php the_field('founder'); ?>">
			<p><?php the_field('supporting_text_1'); ?></p>
			<p><a class="btn btn-success" href="<?php bloginfo('wpurl'); ?>/founder">Learn more <span class="glyphicon glyphicon-chevron-right"></span></a></p>
		</div><!-- /.col-lg-4 -->
		<div class="col-lg-4">
			<h2><?php the_field('headline_2'); ?></h2>
			<img class="thumbnail" src="<?php the_field('philosophy'); ?>">
			<p><?php the_field('supporting_text_2'); ?></p>
			<p><a class="btn btn-success" href="<?php bloginfo('wpurl'); ?>/philosophy">Learn more <span class="glyphicon glyphicon-chevron-right"></span></a></p>
		</div><!-- /.col-lg-4 -->
		<div class="col-lg-4">
			<h2><?php the_field('headline_3'); ?></h2>
			<img class="thumbnail" src="<?php the_field('annexe'); ?>">
			<p><?php the_field('supporting_text_3'); ?></p>
			<p><a class="btn btn-success" href="<?php bloginfo('wpurl'); ?>/performance-center">Learn more <span class="glyphicon glyphicon-chevron-right"></span></a></p>
		</div><!-- /.col-lg-4 -->
	</div> <!-- end .row-->
</div> <!-- end .container-->
<?php endwhile; endif; ?>
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
