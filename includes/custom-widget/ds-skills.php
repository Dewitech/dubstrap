<?php

function ds_skills() {
	register_widget( 'ds_skills' );
}
add_action( 'widgets_init', 'ds_skills' );

class ds_skills extends WP_Widget
{
    function ds_skills() 
    {
		$widget_ops = array( 
            'classname' => 'ds_skills', 
            'description' => __( 'Widget to showoff skills information.', 'dewitech' )
        );

		$control_ops = array( 'id_base' => 'ds_skills' );

		$this->WP_Widget( 'ds_skills', __( 'DS Skills', 'dewitech' ), $widget_ops, $control_ops );   
	}
	
	function form( $instance )
	{
		global $icons_name;
		
		$defaults = array( 
            'skills' => __( 'Our Skills', 'dewitech' ),
			'skills1' => __( 'Web Design', 'dewitech' ),
			'amount1' => __( '90%', 'dewitech' ),
			'skills2' => __( 'Illustration', 'dewitech' ),
			'amount2' => __( '80%', 'dewitech' ),
			'skills3' => __( 'Graphic Design', 'dewitech' ),
			'amount3' => __( '65%', 'dewitech' ),
			'skills4' => __( 'Video Editing', 'dewitech' ),
			'amount4' => __( '55%', 'dewitech' ),
        );
        
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		
		<p>
			<label>
				<strong><?php _e( 'skills', 'dewitech' ) ?>:</strong><br />
				<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'skills' ); ?>" name="<?php echo $this->get_field_name( 'skills' ); ?>" value="<?php echo $instance['skills']; ?>" />
			</label>
			<label>	
				<strong><?php _e( 'Skills1', 'dewitech' ) ?>:</strong><br />
				<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'skills1' ); ?>" name="<?php echo $this->get_field_name( 'skills1' ); ?>" value="<?php echo $instance['skills1']; ?>" />
			</label>
			<label>	
				<strong><?php _e( 'Amount1', 'dewitech' ) ?>:</strong><br />
				<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'amount1' ); ?>" name="<?php echo $this->get_field_name( 'amount1' ); ?>" value="<?php echo $instance['amount1']; ?>" />
			</label>
			<label>	
				<strong><?php _e( 'Skills2', 'dewitech' ) ?>:</strong><br />
				<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'skills2' ); ?>" name="<?php echo $this->get_field_name( 'skills2' ); ?>" value="<?php echo $instance['skills2']; ?>" />
			</label>
			<label>	
				<strong><?php _e( 'Amount2', 'dewitech' ) ?>:</strong><br />
				<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'amount2' ); ?>" name="<?php echo $this->get_field_name( 'amount2' ); ?>" value="<?php echo $instance['amount2']; ?>" />
			</label>
			<label>	
				<strong><?php _e( 'Skills3', 'dewitech' ) ?>:</strong><br />
				<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'skills3' ); ?>" name="<?php echo $this->get_field_name( 'skills3' ); ?>" value="<?php echo $instance['skills3']; ?>" />
			</label>
			<label>	
				<strong><?php _e( 'Amount3', 'dewitech' ) ?>:</strong><br />
				<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'amount3' ); ?>" name="<?php echo $this->get_field_name( 'amount3' ); ?>" value="<?php echo $instance['amount3']; ?>" />
			</label>
			<label>	
				<strong><?php _e( 'Skills4', 'dewitech' ) ?>:</strong><br />
				<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'skills4' ); ?>" name="<?php echo $this->get_field_name( 'skills4' ); ?>" value="<?php echo $instance['skills4']; ?>" />
			</label>
			<label>	
				<strong><?php _e( 'Amount4', 'dewitech' ) ?>:</strong><br />
				<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'amount4' ); ?>" name="<?php echo $this->get_field_name( 'amount4' ); ?>" value="<?php echo $instance['amount4']; ?>" />
			</label>
        </p>    
   
		<?php
	}
	
	function widget( $args, $instance )
	{
		extract( $args );
		$text = isset($text);
		$skills = $instance['skills'];
		$skills1 = $instance['skills1'];
		$amount1 = $instance['amount1'];
		$skills2 = $instance['skills2'];
		$amount2 = $instance['amount2'];
		$skills3 = $instance['skills3'];
		$amount3 = $instance['amount3'];
		$skills4 = $instance['skills4'];
		$amount4 = $instance['amount4'];
		echo $before_widget;                
		


        $text .= '<h4>'. $skills .'</h4>
					<div class="progress progress-success progress-striped"><div style="width: '. $amount1 .'" class="bar">'. $skills1 .' ('. $amount1 .')</div></div>
					<div class="progress progress-success progress-striped"><div style="width: '. $amount2 .'" class="bar">'. $skills2 .' ('. $amount2 .')</div></div>
					<div class="progress progress-success progress-striped"><div style="width: '. $amount3 .'" class="bar">'. $skills3 .' ('. $amount3 .')</div></div>
					<div class="progress progress-success progress-striped"><div style="width: '. $amount4 .'" class="bar">'. $skills4 .' ('. $amount4 .')</div></div>
				';

		echo $text . $after_widget;
	}                     

    function update( $new_instance, $old_instance ) 
    {
		$instance = $old_instance;
		$instance['skills'] = strip_tags( $new_instance['skills'] );
		$instance['skills1'] = strip_tags( $new_instance['skills1'] );
		$instance['amount1'] = strip_tags( $new_instance['amount1'] );
		$instance['skills2'] = strip_tags( $new_instance['skills2'] );
		$instance['amount2'] = strip_tags( $new_instance['amount2'] );
		$instance['skills3'] = strip_tags( $new_instance['skills3'] );
		$instance['amount3'] = strip_tags( $new_instance['amount3'] );
		$instance['skills4'] = strip_tags( $new_instance['skills4'] );
		$instance['amount4'] = strip_tags( $new_instance['amount4'] );
		return $instance;
	}
	
}     
?>