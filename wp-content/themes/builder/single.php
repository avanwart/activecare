<?php get_header(); ?>

<div class="container">

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

					<div id="main" class="clearfix" role="main">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<?php if (function_exists("builder_breadcrumb_lists")) { ?>
							<?php builder_breadcrumb_lists(); ?>
							<?php } ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">
									<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
								</header> <!-- end article header -->

								<section class="entry-content" itemprop="articleBody">
									<div class="team-member">
										<?php 
										if ( in_category( array( 'Physical Therapists', 'Trainers' ) )) {  ?>
											<?php the_post_thumbnail('large'); ?>
											<h3>Education</h3>
											<?php the_field('education'); ?>
											<h3>Credentials</h3>
											<?php the_field('credentials'); ?>
											<h3>Activities</h3>
											<?php the_field('activities'); ?>
											<h3>Favorite Quote</h3>
											<?php the_field('quote'); ?>
											<div class="clearfix"></div>
											<h3>Bio</h3>
											<?php the_field('bio'); ?>
										<?php } else {
											the_content();
										}
										?>
									</div>
								</section> <!-- end article section -->

								<footer class="article-footer">
									<?php the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ' ', '</p>' ); ?>

								</footer> <!-- end article footer -->

								

							</article> <!-- end article -->

						<?php endwhile; ?>

						<?php else : ?>

							<article id="post-not-found" class="hentry clearfix">
									<header class="article-header">
										<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
									</header>
									<section class="entry-content">
										<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
									</section>
									<footer class="article-footer">
											<p><?php _e( 'This is the error message in the single.php template.', 'bonestheme' ); ?></p>
									</footer>
							</article>

						<?php endif; ?>

					</div> <!-- end #main -->

					<?php get_sidebar(); ?>

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

		</div> <!-- end .container -->

<?php get_footer(); ?>
