<?php

/*-----------------------------------------------------------------------------------*/
/*	MassivePixelCreation Theme Widgets
/*
/*	1. Recent Posts
/*	2. Twitter
/*
/*-----------------------------------------------------------------------------------*/


/*-----------------------------------------------------------------------------------*/
/*	1. Recent Posts
/*-----------------------------------------------------------------------------------*/

class MPC_RecentPosts extends WP_Widget {

	/* Init function (constructor) */
	function MPC_RecentPosts() {
		$widget_ops = array( 'classname' => 'recentPosts_widget', 'description' => 'Show recet posts from your blog!' );
		$this->WP_Widget( 'recentPosts_widget', 'MPC - Recent Posts', $widget_ops);
	}

	/* Form displayed on the widget page */
	function form($instance) {
		
		$instance = wp_parse_args( (array) $instance, array('title' => 'Latest News', 'number' => 4));
		$title = esc_attr($instance['title']);
		$number = absint($instance['number']);
	?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">
				<?php _e('Title:', 'gentle'); ?>
			</label>
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('number'); ?>">
				<?php _e('Number of Posts:', 'gentle'); ?>
			</label>
				<input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" />
		</p>
<?php
	}
	
	/* Update the widget settings */
	function update($new_instance, $old_instance) {
		$instance=$old_instance;
	   
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number']=$new_instance['number'];
		
		return $instance;
	}

	function widget($args, $instance) {
		global $post;
		extract($args);
		

		$title = $instance['title']; 
		$number = absint($instance['number']); // Number of Posts
	   
		// Output
		echo $before_widget;
			if($title) 
				echo '<h5 class="widget_title">' . $title .'</h5>' ; 
			
			$pq = new WP_Query(array( 'post_type' => 'post', 'showposts' => $number ));
			
			if( $pq->have_posts()) :
			?>
			<ul class="mpc_latest_news_list">
				<?php 
				$index = 0;
				while($pq->have_posts()) : $pq->the_post(); 
				$index++; 
					if($index > 1) { ?>
						<li class="mpc-recent-post">
					<?php } else { ?>
						<li class="mpc-recent-post first">
					<?php } ?>
						<a href="<?php the_permalink(); ?>" class="recent-post-title"><?php the_title(); ?></a>
						<span class="latest_posts_data"><?php the_time('M d, Y');?> &middot; <?php the_category(', ');?></span>	
					</li>
				<?php wp_reset_query();
				endwhile; ?>
			</ul>
			<?php endif; ?>		
		<?php
		// echo widget closing tag
		echo $after_widget;
		echo '<span class="widget-clearboth"></span>';
		
	}
}

	
/*--------------------------- END Recent Posts -------------------------------- */


/*-----------------------------------------------------------------------------------*/
/*	2. Twitter
/*-----------------------------------------------------------------------------------*/

class MPC_Twitter extends WP_Widget {

	/* Init function (constructor) */
	function MPC_Twitter() {
		$widget_ops = array( 'classname' => 'mpcth-twitter-widget', 'description' => __('Display your latest tweets.', 'gentle') );
		$this->WP_Widget( 'twitter_widget', __('MPC - Latest Tweets', 'gentle'), $widget_ops);
	}

	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array('title' => __('Latest Tweets', 'gentle'), 'number' => 2, 'id' => ''));
		$title = esc_attr($instance['title']);
		$id = esc_attr($instance['id']);
		$number = absint($instance['number']);
	?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">
				<?php _e('Title:', 'gentle'); ?>
			</label>
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('id'); ?>">
				<?php _e('Twitter Widget ID:', 'gentle'); ?>
			</label>
				<input class="widefat" id="<?php echo $this->get_field_id('id'); ?>" name="<?php echo $this->get_field_name('id'); ?>" type="text" value="<?php echo $id; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('number'); ?>">
				<?php _e('Number of Tweets:', 'gentle'); ?>
			</label>
				<input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" />
		</p>
	<?php

	}

	function update($new_instance, $old_instance) {
		$instance=$old_instance;
	   
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['id']= $new_instance['id'];
		$instance['number']= $new_instance['number'];
		
		return $instance;
	}

	function widget($args, $instance) {
		extract($args);
		global $shortname; 
		global $mpcth_options;

		$title = $instance['title']; 
		$id = $instance['id'];
		$number = absint($instance['number']); // Number of Tweets
		$unique = mpcth_random_ID(10);

		$tweets = get_transient('mpcth_twitter_' . $id . '_' . $number);
		$is_cached = $tweets !== false;

		echo $before_widget; ?>
		<h5 class="widget_title"><?php echo $title; ?></h5>
		<ul id="mpcth_twitter_<?php echo $unique ?>" class="mpcth-twitter-wrap<?php echo $is_cached ? ' mpcth-twitter-cached' : ''; ?>" data-number="<?php echo $number; ?>" data-id="<?php echo $id; ?>" data-unique="<?php echo $unique; ?>">
			<?php if($is_cached) echo urldecode($tweets); ?>
		</ul>
		<?php
		echo $after_widget;
	}
}


/*--------------------------- END Twitter -------------------------------- */


/*-----------------------------------------------------------------------------------*/
/*	X. Widget Skeleton
/*-----------------------------------------------------------------------------------*/

/*class MPC_WidgetName extends WP_Widget {

	/* Init function (constructor) */
/*	function MPC_WidgetName() {
		$widget_ops = array( 'classname' => 'widgetName_widget', 'description' => 'Widget description!' );
		$this->WP_Widget( 'widgetName_widget', 'Recent Posts', $widget_ops);
	}

	function form($instance) {
	
	}

	function update($new_instance, $old_instance) {
	
	}

	function widget($args, $instance) {
	
	}

}

/* Add and register the widget */
/*add_action( 'widgets_init', 'mpc_load_widgets' );

function mpc_load_widgets() {
	register_widget('MPC_WidgetName');	
}*/


/*--------------------------- END Widget Skeleton -------------------------------- */


/*-----------------------------------------------------------------------------------*/
/*	Register Widgets
/*-----------------------------------------------------------------------------------*/

function mpc_load_widgets() {
	register_widget('MPC_RecentPosts');	
	register_widget('MPC_Twitter');	
}

add_action( 'widgets_init', 'mpc_load_widgets' );

/*--------------------------- END Register Widgets -------------------------------- */
?>