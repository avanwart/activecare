<?php 

/**
 * @package WordPress
 * @subpackage Gentle
 */
 
 global $shortname;
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<?php $mp_option = gentle_get_global_options(); ?> 
		<?php 
		if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
		wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<div id="mpc-main-container">
			<div id="mpc-header-container">
				<div id="mpc-header">
					
					<div id="gentle-logo">
						<a href="<?php echo home_url(); ?>"><img src="<?php echo $mp_option[$shortname.'_image_logo']; ?>"></a>
					</div>
					
					<?php if(has_nav_menu('main')) { 
	   					wp_nav_menu(array( 
	   								'theme_location' => 'main', 
	   								'container' => '', 
	   								'menu_id' => 'mpc-nav',
	   								'after'	=>	'')); 
					} else {
						echo '<ul id="nav">';
							wp_list_pages('title_li='); 
						echo '</ul>';
					} ?> <!-- end menu --> 
					
	
	   			</div> <!-- end header -->
			</div> <!-- end header-container -->