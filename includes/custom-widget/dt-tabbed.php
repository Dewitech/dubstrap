<?php

function dt_tabbed() {
	register_widget( 'dt_tabbed' );
}
add_action( 'widgets_init', 'dt_tabbed' );

class dt_tabbed extends WP_Widget
{
    function dt_tabbed() 
    {
		$widget_ops = array( 
            'classname' => 'dt_tabbed', 
            'description' => __( 'Widget with a simple dt_tabbed information.', 'dewitech' )
        );

		$control_ops = array( 'id_base' => 'dt_tabbed' );

		$this->WP_Widget( 'dt_tabbed', __( 'DT Tabbed', 'dewitech' ), $widget_ops, $control_ops );   
	}
	
	function form( $instance )
	{
		global $icons_name;
				$defaults = array( 
            'title' => __( 'Tab Widget', 'dewitech' ),
            'numpop' => '5',
			'numrec' => '5',)
        ;
        
		$instance = wp_parse_args( (array) $instance, $defaults );
		?>
		
		<p>
			<label>
				<strong><?php _e( 'Number of Popular Post', 'dewitech' ) ?>:</strong><br />
				<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'numpop' ); ?>" name="<?php echo $this->get_field_name( 'numpop' ); ?>" value="<?php echo $instance['numpop']; ?>" />
			</label>
			<label>
				<strong><?php _e( 'Number of Recent Post', 'dewitech' ) ?>:</strong><br />
				<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'numrec' ); ?>" name="<?php echo $this->get_field_name( 'numrec' ); ?>" value="<?php echo $instance['numrec']; ?>" />
			</label>
        </p>    
   
		<?php
	}
	
	function widget( $args, $instance )
	{
		extract($args);
		$numpop = $instance['numpop'];
		$numrec = $instance['numrec'];
		$title = $instance['title'];
		if(isset ($instance['categories'])) $categories = $instance['categories'];;
		if(isset ($instance['type'])) $type = $instance['type'];
		$posts = isset($posts);
		echo $before_widget;
			$posts_query_pop = 'numberposts='. $numpop .'&orderby=comment_count';
			$posts_query = 'numberposts='. $numrec .'&category=';
		
		global $post;
		$poppost = get_posts($posts_query_pop);	
		$myposts = get_posts($posts_query);
		?>
		
	<section class="widget tabable-widget">	
			<ul class="nav nav-tabs" id="tabable">
				<li class="active"><a href="#tab1"><i class="icon-bookmark"></i><p>Popular</p></a></li>
				<li><a href="#tab2"><i class="icon-certificate"></i><p>Recents</p></a></li>
				<li><a href="#tab3"><i class="icon-sitemap"></i><p>Categories</p></a></li>
			</ul><!-- /.nav-tabs -->
		<div class="tab-content">
			<div class="tab-pane active" id="tab1">										
				<ul class="nav nav-list listy">
					<li class="nav-header">Popular Posts</li>
						<?php foreach($poppost as $post) : ?>
						<li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" ><i class="icon-ok"></i><?php the_title(); ?></a></li>		
						<?php endforeach; ?>
				</ul>
			</div>
			<div class="tab-pane" id="tab2">
				<ul class="nav nav-list listy">
					<li class="nav-header">Recent Posts</li>
						<?php foreach($myposts as $post) : ?>
						<li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" ><i class="icon-ok"></i><?php the_title(); ?></a></li>		
						<?php endforeach; ?>
				</ul>
			</div>
			<div class="tab-pane" id="tab3">
				<?php
				$categories = get_categories();
				foreach ($categories as $cat) {
				echo '<span class="label">'. $cat->cat_name .'</span> ';
				}
				?>
											
			</div>
		</div><!-- /.tab-content -->
	</section><!-- /.tabable-widget -->
			
			
			
			
			
		<?php

		echo $after_widget;
	}
    function update( $new_instance, $old_instance ) 
    {
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'] ;
		$instance['numpop'] = $new_instance['numpop'] ;
		$instance['numrec'] = $new_instance['numrec'] ;
		return $instance;
	}
	
}     
?>