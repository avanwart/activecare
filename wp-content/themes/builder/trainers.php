<?php
/**
 *  Trainers Page
 *
   Template Name: Trainers
 *
 */
   ?>
   <?php get_header(); ?>
   <?php global $more; $more = 0; ?>

   <div class="container">

   	<div id="content">

   		<div id="inner-content" class="wrap clearfix">

   			<div id="main" class="content-main clearfix" role="main">
               <?php /*if (function_exists("builder_breadcrumb_lists")) { ?>
                  <?php builder_breadcrumb_lists(); ?>
               <?php } */?>
   				

   				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


   					<header class="article-header">

   						<h1 class="h1"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>

   					</header> <!-- end article header -->
                  <div id="team">
                     <?php
                       global $post;
                       $args = array( 'numberposts' => 20, 'category' => '138' );
                       $myposts = get_posts( $args );
                       foreach( $myposts as $post ) :  setup_postdata($post); 
                     ?>
                     <div class="flip"> 
                        <div class="card"> 
                           <div class="face front"> 
                              <img src="<?php bloginfo('template_directory'); ?>/library/img/triangle.gif" alt="" class="triangle">
                              <?php the_post_thumbnail('thumbnail'); ?>
                              <h2><?php the_title(); ?></h2>
                           </div> 
                           <div class="face back"> 
                              <h3>Background</h3>
                              <?php the_field('education'); ?>
                              <div class="exit">
                                 <hr/>
                                 <p class="center"><a href="<?php the_permalink(); ?>">Read more &raquo;</a></p>
                              </div>
                           </div> 
                        </div> 
                     </div> 
                     <?php endforeach; ?>
                  </div>
                  <script>
                     jQuery(document).ready(function($){
                        $('.flip').click(function(){
                           $(this).find('.card').addClass('flipped').mouseleave(function(){
                              $(this).removeClass('flipped');
                           });
                          // return false;
                        });
                     });
                  </script>
   					
   			<?php endwhile; ?>

   	<?php endif; ?>

   </div> <!-- end #main -->

   <?php get_sidebar(); ?>

</div> <!-- end #inner-content -->

</div> <!-- end #content -->

</div> <!-- end .container -->

<?php get_footer('lean'); ?>
