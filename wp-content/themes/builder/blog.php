<?php
/**
 * Blog Template
 *
   Template Name: Blog 
 *
 */
   ?>
   <?php get_header(); ?>
   <?php global $more; $more = 0; ?>

   <div class="container">

   	<div id="content">

   		<div id="inner-content" class="wrap clearfix">

   			<div id="main" class="content-main clearfix" role="main">

   				<?php
   				$limit = get_option('posts_per_page');
   				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
   				query_posts('showposts=' . $limit . '&paged=' . $paged);
   				$wp_query->is_archive = true; $wp_query->is_home = false;
   				?>  

   				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

   				<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article">

   					<header class="article-header">

   						<h1 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
   						<p class="byline vcard"><?php
   						printf( __( 'Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span> <span class="amp">&</span> filed under %4$s.', 'bonestheme' ), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), the_author_meta(), get_the_category_list(', '));
   						?></p>

   					</header> <!-- end article header -->

   					<section class="entry-content blog-content clearfix">
   						<?php the_content(__($more_link, 'bonestheme')); ?>
   					</section> <!-- end article section -->

   					<footer class="article-footer">
   						<!--<p class="tags"><?php the_tags( '<span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ' ', '' ); ?></p>-->

   					</footer> <!-- end article footer -->

   					<?php // comments_template(); // uncomment if you want to use them ?>
   					
   				</article> <!-- end article -->

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

<?php get_footer('lean'); ?>
