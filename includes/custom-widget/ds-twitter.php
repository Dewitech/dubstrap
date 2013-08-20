<?php

function ds_twitter() {
	register_widget( 'ds_twitter' );
}
add_action( 'widgets_init', 'ds_twitter' );

class ds_twitter extends WP_Widget
{
    function ds_twitter() 
    {
		$widget_ops = array( 
            'classname' => 'ds_twitter', 
            'description' => __( 'Widget with a simple ds_twitter information.', 'dubstrap' )
        );

		$control_ops = array( 'id_base' => 'ds_twitter' );

		$this->WP_Widget( 'ds_twitter', __( 'DS Twitter', 'dubstrap' ), $widget_ops, $control_ops );   
	}
	
	function form( $instance )
	{
		global $icons_name;
		
		$defaults = array( 
            'title' => __( 'Recent Tweets', 'dubstrap' ),
        );
        
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		
		<p>
			<label>
				<strong><?php _e( 'Title', 'dubstrap' ) ?>:</strong><br />
				<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
			</label>
        </p>    
   
		<?php
	}
	
	function widget( $args, $instance )
	{
		extract( $args );
		$title = $instance['title'];
		
		echo $before_widget;                
		
		?>

        <div class="widget-tweet">
			<h4><?php echo $title ?></h4>
			<div class="timeline"></div>
		</div>
				
		<?php
		echo $after_widget;
	}                     

    function update( $new_instance, $old_instance ) 
    {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );;
		return $instance;
	}
	
}     
?>