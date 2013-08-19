<?php

function dt_search() {
	register_widget( 'dt_search' );
}
add_action( 'widgets_init', 'dt_search' );

class dt_search extends WP_Widget
{
    function dt_search() 
    {
		$widget_ops = array( 
            'classname' => 'dt_search', 
            'description' => __( 'Widget with a simple dt_search information.', 'dewitech' )
        );

		$control_ops = array( 'id_base' => 'dt_search' );

		$this->WP_Widget( 'dt_search', __( 'DT Search', 'dewitech' ), $widget_ops, $control_ops );   
	}
	
	function form( $instance )
	{
		global $icons_name;
		
		$defaults = array( 
            'title' => __( 'Search...', 'dewitech' ),

        );
        
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		
		<p>
			<label>
				<strong><?php _e( 'Placeholder', 'dewitech' ) ?>:</strong><br />
				<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
			</label>
        </p>    
   
		<?php
	}
	
	function widget( $args, $instance )
	{
		extract( $args );
		$title = apply_filters('widget_title', $instance['title'] );
		$homeurl = home_url( '/' );
		
		echo $before_widget;                
		
		?>

        <form role="search" method="get" id="searchform" action="<?php echo $homeurl ?>">
			<div>
				<input type="text" value="" name="s" id="s" class="search" placeholder="<?php echo $title ?>" />
			</div>
		</form>
		
		<?php
		
		echo $after_widget;
	}                     

    function update( $new_instance, $old_instance ) 
    {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		return $instance;
	}
	
}     
?>