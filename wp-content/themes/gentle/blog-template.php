<?php

/**
* Home
*
* Template Name: Blog
* @package WordPress
* @subpackage Gentle
*/

get_header();
global $more;
global $query;

$mp_option = gentle_get_global_options();
$page_id = $wp_query->get_queried_object_id();

$post_values = get_post_custom($page_id);
if( isset($post_values['blog_type'][0]) )
	$blogType = $post_values['blog_type'][0];
else
	$blogType = 'blog1';

$sidebar_position = '';

if(isset($mp_option['gentle_sidebar']) && isset($mp_option['gentle_sidebar']['radio_sb_' .$page_id])) {
	$sidebar_position = $mp_option['gentle_sidebar']['radio_sb_' .$page_id];
}

if($sidebar_position == '')
	$sidebar_position = 'right';

$postNumber = 0;

if($blogType == 'masonry' || $blogType == 'stacked')
	$blogWidth = 'full';
else
	$blogWidth = '';

?>

<script>
// mpc-page-content
	jQuery(document).ready(function($) {
		var $window = $(window);

		if( '<?php echo $blogType ?>' == 'stacked' || '<?php echo $blogType ?>' == 'masonry') {
			var $container = $('#mpc-page-content'),
				have_sidebar = !$('#mpc-page-wrap').is('.sidebar-none'),
				is_stacked = '<?php echo $blogType ?>' == 'stacked',
				use_masonry = true,
				externalMargin = 10,
				cwidth = $container.width(),
				maxColWidth = 500,
				minColWidth = 275,
				colNum = 0,
				colWidth = 0,
				blogType = '<?php echo $blogType; ?>',
				refreshTimer;

			function window_resize () {
				$('#mpc-page-wrap.full #mpc-page-content.blog.sidebar-right')
					.css( { 'width': $window.width() - 328 });
				$('#mpc-page-wrap.full #mpc-page-content.blog.sidebar-left')
					.css( { 'width': $window.width() - 323 });

				$('#mpc-page-wrap.full #mpc-page-content.blog.stacked.sidebar-right')
					.css( { 'width': $window.width() - 309 });
				$('#mpc-page-wrap.full #mpc-page-content.blog.stacked.sidebar-left')
					.css( { 'width': $window.width() - 306 });
			}

			function column_width () {
				cwidth = $container.width();

				if($window.width() == 1024 && have_sidebar) {
					colNum = 1;
					colWidth = cwidth;
					use_masonry = false;
				} else if($window.width() == 1024 && !have_sidebar) {
					colNum = 2;
					colWidth = cwidth / 2 >> 0;
					use_masonry = true;
				} else if($window.width() < 1024) {
					colNum = 1;
					colWidth = cwidth;
					use_masonry = false;
				} else {
					colNum = 0;
					use_masonry = true;

					for (var i = 10; i > 0; i--) {
						if(cwidth / i <= maxColWidth && cwidth / i >= minColWidth) {
							colNum = i;
						}
					}

					if(blogType == 'stacked')
						colWidth = Math.floor(cwidth / colNum) - 3;
					else
						colWidth = (cwidth - 20) / colNum >> 0;

					$('#mpc-page-content .post').each(function() {
						var $this = $(this);
						$this.css( { 'width' : colWidth + 'px' } );
					});
				}

				var dif = cwidth - (colNum * colWidth) - colNum * 2;
				if(blogType == 'stacked') {
					$('#gentle-aside.sidebar-left, #gentle-aside.sidebar-right').css({
						'width' : $window.width() - cwidth - 53 + dif + colNum * 2
					});

					$('#mpc-page-wrap.full.sidebar-left #mpc-page-content, #mpc-page-wrap.full.sidebar-right #mpc-page-content').css({
						'width' : cwidth - dif - colNum * 2
					});
				}
			}

			window_resize();
			column_width();

			if(use_masonry) {
				$container.imagesLoaded( function() {
					$container.isotope({
						masonry: { columnWidth: colWidth }
					});
				});
			} else {
				if($container.is('.isotope')) {
					$container.isotope('destroy');
					$('#mpc-page-content .post').css({'width' : ''});
				}
			}

			$window.resize(function(){
				if(refreshTimer != null)
					clearTimeout(refreshTimer);

				refreshTimer = setTimeout(function() {
					window_resize();
					column_width();

					if(use_masonry) {
						$container.isotope({ masonry: { columnWidth: colWidth } });
					} else {
						if($container.is('.isotope')) {
							$container.isotope('destroy');
							$('#mpc-page-content .post').css({'width' : ''});
						}
					}
				}, 200);
			});
		}
	});
</script>

<div id="mpc-content" role="main">
	<div id="mpc-page-wrap" class="<?php echo $blogWidth; ?> sidebar-<?php echo $sidebar_position; ?> <?php echo $blogType; ?>">
		<div id="mpc-page-content"  class="blog sidebar-<?php echo $sidebar_position; ?> <?php echo $blogType; ?>">
		<?php

			$blog_category = get_option('gentle_blog_category');
			global $query;
			if(get_query_var('page') != '')
				$paged = get_query_var('page');
			else
				$paged = get_query_var('paged');

			$paged = $paged > 1 ? $paged : 1;
			$query = new WP_Query('post_type=post&category_name='.$blog_category.'&paged=' . $paged);

			if ( $query->have_posts()) {
				 while ( $query->have_posts() ) {
					$query->the_post();

					global $more;
					$more = 0;
					$post_meta = '';
					$page_data = '';

					$post_meta = get_post_custom($post->ID);

					/* Get post data */
					if(isset($post_meta['post_shortcode'][0]))
						$page_data['sh'] = $post_meta['post_shortcode'][0];

					/* lightbox parameters */
					if(isset($post_meta['lightbox_enable'][0]))
						$page_data['lb'] = $post_meta['lightbox_enable'][0];

					if(isset($post_meta['caption'][0]))
						$page_data['lb_caption'] = $post_meta['caption'][0];

					if(isset($post_meta['lightbox_src'][0]))
						$page_data['lb_src'] = $post_meta['lightbox_src'][0];

					?>

					<div id="post-<?php the_ID(); ?>"  <?php post_class('blog-post'); ?> >
						<div class="mpc-post-wrap">
							<?php if($blogType == "blog3" || $blogType == "blog4") { ?>
								<h4 class="mpc-page-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
									<?php the_title(); ?>
								</a></h4>
								<small>
									<a href="<?php echo get_month_link(get_the_time('Y'), get_the_time('m')); ?>"><?php the_time('M d Y');?></a>
								&middot;
								<?php comments_number('0 comments','1 comment','% comments'); ?>
								&middot;
								<?php the_category(', '); ?>

								<?php  if( function_exists('zilla_likes') ){
									echo '&middot;';
									zilla_likes();
								} ?>
								</small>
							<?php } ?>

							<div class="mpc-post-thumbnail<?php echo empty($page_data['sh']) && !has_post_thumbnail() ? ' mpc-thumbnail-empty' : ''; ?>">
								<!-- Insert LightBox -->
								<?php

								if(isset($page_data['lb']) && $page_data['lb'] != 'off' ) {
									mpc_gentle_add_lightbox($page_data);
									?>
									<span class="mpc-gentle-post-hover"></span>
								<?php } ?>
								<?php if( isset($page_data['sh']) && $page_data['sh'] != '') {
									$sh = $page_data['sh'];
									$search = substr($sh, 0, 1);
									$is_embed = strpos($sh, 'iframe') !== false || strpos($sh, 'embed') !== false || strpos($sh, '[vimeo') !== false || strpos($sh, '[youtube') !== false;

									if($is_embed !== false)
										echo '<div class="mpc-gentle-embed-wrap">';

									if($search == '[')
										echo do_shortcode($sh);
									else
										echo $sh;

									if($is_embed !== false)
										echo '</div>';

								} elseif(has_post_thumbnail()) {
									if(($blogType == "blog2" && $sidebar_position == 'none') || ($blogType == "blog3" && $sidebar_position == 'none') || ($blogType == "blog4" && $sidebar_position == 'none'))
										the_post_thumbnail('blog_classic');
									elseif($blogType == "blog2" || $blogType == "blog3" || $blogType == "blog4")
										the_post_thumbnail('blog_classic_small');
									elseif($blogType == "blog5" && $sidebar_position == "none")
										the_post_thumbnail('blog_classic_square');
									elseif($blogType == "blog5")
										the_post_thumbnail('blog_classic_square_small');
									else
										the_post_thumbnail();
								} ?>
							</div>

							<?php if($blogType != "blog3" && $blogType != "blog4" ){?>
								<h4 class="mpc-page-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
									<?php the_title(); ?>
								</a></h4>
								<small>
									<a href="<?php echo get_month_link(get_the_time('Y'), get_the_time('m')); ?>"><?php the_time('M d Y');?></a>
								&middot;
								<?php comments_number('0 comments','1 comment','% comments'); ?>
								&middot;
								<?php the_category(', '); ?>
								<?php  if( function_exists('zilla_likes') ){
									echo '&middot;';
									zilla_likes();
								} ?>
								</small>
							<?php } ?>
							<?php
								ob_start();
								the_content('',true,'');
								$postOutput = preg_replace('/<img[^>]+./','', ob_get_contents());
								ob_end_clean();
								echo $postOutput;
							?>
							<?php //the_content('', TRUE, ''); ?>
							<?php if ($pos=strpos($post->post_content, '<!--more-->')) { ?>
							<!-- Read More -->
							<a href="<?php the_permalink();?>" class="mpc-read-more" title="Read More">
								<span class="plus gentle-icon-right-open"></span>
							</a>

							<?php } ?>
							<span class="gentle-deco-line"></span>
						</div>
					</div><!-- end blog-post -->
				<?php } ?>
			 <?php } else { ?>
				<article id="post-0" class="post no-results not-found">
					<header class="entry-header search-result">
						<h3 class="entry-title"><?php _e( 'Nothing Found', 'agera' ); ?></h3>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'agera' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->
			<?php } ?>

		</div>	<!-- end mpc-page-content-->
		<?php do_action('mpc_post_loop', $query); ?>

		<div id="mpc-gentle-nav">
			<div class="mpc-next-page"><?php next_posts_link(); ?></div>
			<div class="mpc-previous-page"><?php previous_posts_link(); ?></div>
		</div>
	   <?php if($sidebar_position != 'none')
			get_sidebar(); ?>
	</div>  <!-- end mpc-page-wrap -->
	<div id="gentle-load-more">
			<span id="gentle-lm-button"><?php _e('Load More', 'gentle'); ?></span>
			<span id="gentle-lm-info"></span>

	</div>
</div><!-- end mpc-content -->

<?php get_footer(); ?>