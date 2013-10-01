<?php
/**
 * FAQ Template
 *
   Template Name: FAQ 
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

   						<h1 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>

   					</header> <!-- end article header -->

                  <div class="accordion" id="faq">
                     <?php
                       global $post;
                       $args = array( 'numberposts' => 20, 'category' => '3' );
                       $myposts = get_posts( $args );
                       foreach( $myposts as $post ) :  setup_postdata($post); 
                     ?>
                     <div class="accordion-group">
                        <div class="accordion-heading">
                           <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="" href="#collapse<?php the_ID(); ?>">
                              <h3><i></i><?php the_title(); ?></h3>
                           </a>
                        </div>
                        <div id="collapse<?php the_ID(); ?>" class="accordion-body collapse">
                           <div class="accordion-inner">
                              <section class="entry-content clearfix">
                                 <?php the_content(__($more_link, 'bonestheme')); ?>
                              </section> <!-- end article section -->
                           </div>
                        </div>
                     </div>
                     <?php endforeach; ?>
                  </div>

   					<?php // comments_template(); // uncomment if you want to use them ?>
   					
   			<?php endwhile; ?>

   			<?php if (function_exists("builder_numbered_pages")) { ?>
   			<?php builder_numbered_pages(); ?>

   			<?php } else { ?>
   			<nav>
   				<ul class="pager">
   					<li class="previous"><?php next_posts_link( __( '&laquo; Older Entries', 'bonestheme' ) ); ?></li>
   					<li class="next"><?php previous_posts_link( __( 'Newer Entries &raquo;', 'bonestheme' ) ); ?></li>
   				</ul><!-- end of .pager -->
   			</nav>

   			<?php } ?>

   		<?php else : ?>

   		<article id="post-not-found" class="hentry clearfix">
   			<header class="article-header">
   				<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
   			</header>
   			<section class="entry-content">
   				<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
   			</section>
   			<footer class="article-footer">
   				<p><?php _e( 'This is the error message in the index.php template.', 'bonestheme' ); ?></p>
   			</footer>
   		</article>

   	<?php endif; ?>

   </div> <!-- end #main -->

   <?php get_sidebar(); ?>

</div> <!-- end #inner-content -->

</div> <!-- end #content -->

</div> <!-- end .container -->

<?php get_footer(); ?>
