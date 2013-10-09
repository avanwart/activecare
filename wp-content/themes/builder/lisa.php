<?php
/**
 *  Lisa Page
 *
   Template Name: Lisa
 *
 */
   ?>
   <?php get_header(); ?>
   <?php global $more; $more = 0; ?>

   <div class="container">

   	<div id="content">

   		<div id="inner-content" class="wrap clearfix">

   			<div id="main" class="content-main clearfix" role="main">
   				
   				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


   					<header class="article-header">

   						<h1 class="h1"><?php the_title(); ?></h1>

   					</header> <!-- end article header -->
                  
                  <div id="myCarousel" class="carousel slide">
                     <div class="carousel-inner">
                        <div class="item">
                           <img src="<?php the_field('photo_1'); ?>" alt="">
                           <div class="carousel-caption">
                              <h2><?php the_field('headline_1'); ?></h2>
                              <p><?php the_field('paragraph_1'); ?></p>
                           </div>
                        </div>
                        <div class="item">
                           <img src="<?php the_field('photo_2'); ?>" alt="">
                           <div class="carousel-caption">
                              <h2><?php the_field('headline_1'); ?></h2>
                              <p><?php the_field('paragraph_2'); ?></p>
                           </div>
                        </div>
                        <div class="item active">
                           <img src="<?php the_field('photo_2'); ?>" alt="">
                           <div class="carousel-caption">
                              <h2><?php the_field('headline_1'); ?></h2>
                              <p><?php the_field('paragraph_3'); ?></p>
                           </div>
                        </div>
                     </div>
                     <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
                     <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
                  </div>
   					
   			<?php endwhile; ?>

   	<?php endif; ?>

   </div> <!-- end #main -->

   <?php get_sidebar(); ?>

</div> <!-- end #inner-content -->

</div> <!-- end #content -->

</div> <!-- end .container -->

<?php get_footer('lean'); ?>
