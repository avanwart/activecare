<?php
/**
 * Testimonials Template
 *
   Template Name: Testimonials 
 *
 */
   ?>
   <?php get_header(); ?>
   <?php global $more; $more = 0; ?>

   <div class="container">

   	<div id="content">

   		<div id="inner-content" class="wrap clearfix">

   			<div id="main" class="content-main clearfix" role="main">
               <?php if (function_exists("builder_breadcrumb_lists")) { ?>
                  <?php builder_breadcrumb_lists(); ?>
               <?php } ?>

               <h1>Hear what our members have to say about Active Care</h1>

               <?php
                   global $post;
                   $args = array( 'posts_per_page' => 10, 'category' => '136' );
                   $myposts = get_posts( $args );
                   foreach( $myposts as $post ) :  setup_postdata($post); 
                 ?>

   				<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article">
                  <div class="row">
                     <div class="col-lg-3">
                        <?php the_post_thumbnail('thumbnail'); ?>
                     </div>
                     <div class="col-lg-9">
                        <header class="article-header">

                           <h2 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

                        </header> <!-- end article header -->

                        <section class="entry-content clearfix testimonial">

                           <blockquote><?php the_field('quote'); ?></blockquote>

                        </section> <!-- end article section -->
                     </div>
                  </div>

               </article> <!-- end article -->

               <?php endforeach; ?>
               <?php wp_reset_postdata(); ?>


   </div> <!-- end #main -->

   <?php get_sidebar(); ?>

</div> <!-- end #inner-content -->

</div> <!-- end #content -->

</div> <!-- end .container -->

<?php get_footer('lean'); ?>
