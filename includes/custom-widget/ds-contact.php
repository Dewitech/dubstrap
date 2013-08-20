<?php

function ds_contact() {
	register_widget( 'ds_contact' );
}
add_action( 'widgets_init', 'ds_contact' );

class ds_contact extends WP_Widget
{
    function ds_contact() 
    {
		$widget_ops = array( 
            'classname' => 'ds_contact', 
            'description' => __( 'Widget with a simple ds_contact information.', 'dubstrap' )
        );

		$control_ops = array( 'id_base' => 'ds_contact' );

		$this->WP_Widget( 'ds_contact', __( 'DS Contact', 'dubstrap' ), $widget_ops, $control_ops );   
	}
	
	function form( $instance )
	{
		global $icons_name;
		
		$defaults = array( 
            'title' => __( 'Contact', 'dubstrap' ),
            'contact' => __( 'Jl Terusan Jakarta no 101, Bandung, Indonesia', 'dubstrap' ),
            'email' => __( 'info@dubstrap.com', 'dubstrap' ),
            'phone' => __( '+628123456789', 'dubstrap' ),
        );
        
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		
		<p>
			<label>
				<strong><?php _e( 'Title', 'dubstrap' ) ?>:</strong><br />
				<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
			</label>
			<label>
				<strong><?php _e( 'Address', 'dubstrap' ) ?>:</strong><br />
				<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'contact' ); ?>" name="<?php echo $this->get_field_name( 'contact' ); ?>" value="<?php echo $instance['contact']; ?>" />
			</label>
			<label>
				<strong><?php _e( 'Email', 'dubstrap' ) ?>:</strong><br />
				<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" value="<?php echo $instance['email']; ?>" />
			</label>
			<label>
				<strong><?php _e( 'Phone', 'dubstrap' ) ?>:</strong><br />
				<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'phone' ); ?>" name="<?php echo $this->get_field_name( 'phone' ); ?>" value="<?php echo $instance['phone']; ?>" />
			</label>
        </p>    
   
		<?php
	}
	
	function widget( $args, $instance )
	{
		extract( $args );
		$title = $instance['title'];
		$contact = $instance['contact'];
		$email = $instance['email'];
		$phone = $instance['phone'];
		
		echo $before_widget;                
		
		?>

        <div class="widget-tweet">
			<h4><?php echo $title ?></h4>
			<ul class="contact-widget">
				<?php if ($contact) { ?>
							<li><i class="icon-map-marker"></i><?php echo $contact; ?></li>
				<?php } ?>
				<?php if ($email) { ?>
							<li><i class="icon-envelope"></i> <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></li>
				<?php } ?>
				<?php if ($phone) { ?>
							<li><i class="icon-phone"></i> <?php echo $phone; ?></li>
				<?php } ?>
			</ul>
		</div>
				
		<?php
		echo $after_widget;
	}                     

    function update( $new_instance, $old_instance ) 
    {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );;
		$instance['contact'] = strip_tags( $new_instance['contact'] );;
		$instance['email'] = strip_tags( $new_instance['email'] );;
		$instance['phone'] = strip_tags( $new_instance['phone'] );;
		return $instance;
	}
	
}     
?>