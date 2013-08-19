<?php
/*
Theme Name: Chloe
Theme URI: http://dewitech.com
Description: Photography portofolio theme for wordpress, with unique  page templates for photo, powered with full background image, 500+ google fonts, and unlimited color theme..
Version: 1.0.1
Author: Dewitech
Author URI: http://dewitech.com
Tags: responsive, photography, portofolio
*/


function recent_popular_post_widget() {
	register_widget( 'Recent_Popular_Post_Widget' );
}
add_action( 'widgets_init', 'recent_popular_post_widget' );


class Recent_Popular_Post_Widget extends WP_Widget {


function Recent_Popular_Post_Widget() {
	
	$widget_ops = array( 'classname' => 'recent_popular_post_widget', 'description' => __("Display Recent/Popular Posts from blog.", 'Dewitech') );

	$control_ops = array( 'id_base' => 'recent_popular_post_widget' );

	$this->WP_Widget( 'recent_popular_post_widget', __('Recent Posts/Popular Posts', 'Dewitech'), $widget_ops, $control_ops );
}


function widget($args, $instance)
	{
		
		
		extract($args);

		$title = $instance['title'];
		$categories = $instance['categories'];
		$posts = $instance['posts'];
		$type = $instance['type'];
		
		echo $before_widget;

		if($title) {
			echo $before_title.$title.$after_title;
		}

		
		if($type === 'popular'){
			$posts_query = 'numberposts='.$posts.'&orderby=comment_count&category='.$categories;
		}
		else{
			$posts_query = 'numberposts='.$posts.'&category='.$categories;
		}
		
		global $post;
		$myposts = get_posts($posts_query);	
		?>
		<ul class="list-news">
		<?php foreach($myposts as $post) : ?>
		<li>			
			<p><strong><a href='<?php the_permalink(); ?>' title='<?php the_title(); ?>'><?php the_title(); ?></a></strong></p>
			<p><?php the_time('F jS, Y'); ?> - <?php the_time('g:i a'); ?></p>			
		</li>
		<?php endforeach; ?>
		</ul>
		<?php

		echo $after_widget;
	}


function form( $instance ) {

	$defaults = array(
		'title' => 'Recent Posts', 
		'categories' => 'all', 
		'posts' => 5,
		'type' => 'recent'
	);
	$instance = wp_parse_args((array) $instance, $defaults); ?>

	<p>
        <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title','Dewitech')?></label>
        <input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
    </p>
    
    <p>
        <label for="<?php echo $this->get_field_id('type'); ?>"><?php _e('Type','Dewitech')?></label> 
        <select id="<?php echo $this->get_field_id('type'); ?>" name="<?php echo $this->get_field_name('type'); ?>" class="widefat" style="width:100%;">
            <option <?php if ( 'recent' == $instance['type'] ) echo 'selected="selected"'; ?>><?php _e('recent','Dewitech')?></option>
			<option <?php if ( 'popular' == $instance['type'] ) echo 'selected="selected"'; ?>><?php _e('popular','Dewitech')?></option>
        </select>
    </p>
    
    <p>
        <label for="<?php echo $this->get_field_id('categories'); ?>"><?php _e('Filter by Category','Dewitech')?></label> 
        <select id="<?php echo $this->get_field_id('categories'); ?>" name="<?php echo $this->get_field_name('categories'); ?>" class="widefat categories" style="width:100%;">
            <option value='all' <?php if ('all' == $instance['categories']) echo 'selected="selected"'; ?>><?php _e('All categories','Dewitech')?></option>
            <?php $categories = get_categories('hide_empty=0&depth=1&type=post'); ?>
            <?php foreach($categories as $category) { ?>
            <option value='<?php echo $category->term_id; ?>' <?php if ($category->term_id == $instance['categories']) echo 'selected="selected"'; ?>><?php echo $category->cat_name; ?></option>
            <?php } ?>
        </select>
    </p>
    
    <p>
        <label for="<?php echo $this->get_field_id('posts'); ?>"><?php _e('Number of posts','Dewitech')?></label>
        <input class="widefat" style="width: 30px;" id="<?php echo $this->get_field_id('posts'); ?>" name="<?php echo $this->get_field_name('posts'); ?>" value="<?php echo $instance['posts']; ?>" />
    </p>
		
<?php
}


function update($new_instance, $old_instance)
{
	$instance = $old_instance;

	$instance['title'] = strip_tags( $new_instance['title'] );

	$instance['categories'] = $new_instance['categories'];
	$instance['posts'] = $new_instance['posts'];
	$instance['type'] = $new_instance['type'];
	
	return $instance;
}

}