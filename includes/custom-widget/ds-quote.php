<?php

function ds_quote() {
	register_widget( 'ds_quote' );
}
add_action( 'widgets_init', 'ds_quote' );

class ds_quote extends WP_Widget
{
    function ds_quote() 
    {
		$widget_ops = array( 
            'classname' => 'ds_quote', 
            'description' => __( 'Widget with a simple ds_quote information.', 'dubstrap' )
        );

		$control_ops = array( 'id_base' => 'ds_quote' );

		$this->WP_Widget( 'ds_quote', __( 'DS Quote', 'dubstrap' ), $widget_ops, $control_ops );   
	}
	
	function form( $instance )
	{
		global $icons_name;
		
		$defaults = array( 
            'quote' => __( 'You dont take a photograph, you make it ', 'dubstrap' ),
			'author' => __( 'Ansel Adams', 'dubstrap' ),
        );
        
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		
		<p>
			<label>
				<strong><?php _e( 'Quote', 'dubstrap' ) ?>:</strong><br />
				<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'quote' ); ?>" name="<?php echo $this->get_field_name( 'quote' ); ?>" value="<?php echo $instance['quote']; ?>" />
			</label>
			<label>
				<strong><?php _e( 'Author', 'dubstrap' ) ?>:</strong><br />
				<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'author' ); ?>" name="<?php echo $this->get_field_name( 'author' ); ?>" value="<?php echo $instance['author']; ?>" />
			</label>
        </p>    
   
		<?php
	}
	
	function widget( $args, $instance )
	{
		extract( $args );
		$quote = $instance['quote'];
		$author = $instance['author'];
		
		echo $before_widget;                
		
		?>

        <section class="widget blockquote-widget">
			<blockquote>
				<p><?php echo $quote ?><small><?php echo $author ?></small></p>
			</blockquote>
		</section>

		<?php
		echo $after_widget;
	}                     

    function update( $new_instance, $old_instance ) 
    {
		$instance = $old_instance;
		$instance['quote'] = strip_tags( $new_instance['quote'] );
		$instance['author'] = strip_tags( $new_instance['author'] );
		return $instance;
	}
	
}     
?>