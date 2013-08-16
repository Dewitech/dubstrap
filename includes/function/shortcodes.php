<?php
/* Clean up Shortcodes */
function parse_shortcode_content( $content ) {

   /* Parse nested shortcodes and add formatting. */
    $content = trim( do_shortcode( shortcode_unautop( $content ) ) );

    /* Remove '' from the start of the string. */
    if ( substr( $content, 0, 4 ) == '' )
        $content = substr( $content, 4 );

    /* Remove '' from the end of the string. */
    if ( substr( $content, -3, 3 ) == '' )
        $content = substr( $content, 0, -3 );

    /* Remove any instances of ''. */
    $content = str_replace( array( '<p></p>' ), '', $content );
    $content = str_replace( array( '<p>  </p>' ), '', $content );

    return $content;
}

//move wpautop filter to AFTER shortcode is processed
remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'wpautop' , 99);
add_filter( 'the_content', 'shortcode_unautop',100 );

// Enable shortcodes in widget areas
add_filter('widget_text', 'do_shortcode');


/*Button
/*---------------------------------------------------------------------------------------------*/
function dubstrap_button( $atts, $content = null ) {
	
	extract(shortcode_atts(array(
		'url'     	 => '#',
		'target'     => '_self',
		'style'   => 'default',
		'size'	=> 'small',
		'title'	=>  $content,
		'type' => ''
    ), $atts));
	
	if($style =='readmore'){
	   return '<a href="'. $url.'" target="'.$target.'" class="read-more" title="'.$title.'">'.$content.'</a>';
	}
	elseif($style =='button'){
	   return '<a href="'. $url.'" target="'.$target.'" class="btn btn-'.$size.'" title="'.$title.'">'.$content.'</a>';
	}
	elseif($style =='primary'){
	   return '<a href="'. $url.'" target="'.$target.'" class="btn btn-primary btn-'.$size.'" title="'.$title.'">'.$content.'</a>';
	}
	else{
		return '<a class="btn btn-'.$size.' btn-'.$type.' btn-'.$style.'" target="'.$target.'" href="'.$url.'" title="'.$title.'">' .do_shortcode($content). '</a>';
	}
}

add_shortcode('button', 'dubstrap_button');


/*Columns
/*---------------------------------------------------------------------------------------------*/  
// Row Open
function dubstrap_row_open( $atts, $content = null ) {
	return '<div class="row">';
}
add_shortcode('row_open', 'dubstrap_row_open');

// Row-Fluid Open
function dubstrap_row_fluid_open( $atts, $content = null ) {
	return '<div class="row-fluid">';
}
add_shortcode('row_fluid_open', 'dubstrap_row_fluid_open');

// Row Close
function dubstrap_row_close( $atts, $content = null ) {
	return '</div>';
}
add_shortcode('row_close', 'dubstrap_row_close');

// Span1
function dubstrap_span1( $atts, $content = null ) {
	return '<div class="span1">'. do_shortcode($content) . '</div>';
}
add_shortcode('span1', 'dubstrap_span1');

// span2
function dubstrap_span2( $atts, $content = null ) {
	return '<div class="span2">'. do_shortcode($content) . '</div>';
}
add_shortcode('span2', 'dubstrap_span2');

// span3
function dubstrap_span3( $atts, $content = null ) {
	return '<div class="span3">'. do_shortcode($content) . '</div>';
}
add_shortcode('span3', 'dubstrap_span3');

// span4
function dubstrap_span4( $atts, $content = null ) {
	return '<div class="span4">'. do_shortcode($content) . '</div>';
}
add_shortcode('span4', 'dubstrap_span4');

// span5
function dubstrap_span5( $atts, $content = null ) {
	return '<div class="span5">'. do_shortcode($content) . '</div>';
}
add_shortcode('span5', 'dubstrap_span5');

// span6
function dubstrap_span6( $atts, $content = null ) {
	return '<div class="span6">'. do_shortcode($content) . '</div>';
}
add_shortcode('span6', 'dubstrap_span6');

// span7
function dubstrap_span7( $atts, $content = null ) {
	return '<div class="span7">'. do_shortcode($content) . '</div>';
}
add_shortcode('span7', 'dubstrap_span7');

// span8
function dubstrap_span8( $atts, $content = null ) {
	return '<div class="span8">'. do_shortcode($content) . '</div>';
}
add_shortcode('span8', 'dubstrap_span8');

// span9
function dubstrap_span9( $atts, $content = null ) {
	return '<div class="span9">'. do_shortcode($content) . '</div>';
}
add_shortcode('span9', 'dubstrap_span9');

// span10
function dubstrap_span10( $atts, $content = null ) {
	return '<div class="span10">'. do_shortcode($content) . '</div>';
}
add_shortcode('span10', 'dubstrap_span10');

// span11
function dubstrap_span11( $atts, $content = null ) {
	return '<div class="span11">'. do_shortcode($content) . '</div>';
}
add_shortcode('span11', 'dubstrap_span11');

// span12
function dubstrap_span12( $atts, $content = null ) {
	return '<div class="span12">'. do_shortcode($content) . '</div>';
}
add_shortcode('span12', 'dubstrap_span12');

/*Separator
/*---------------------------------------------------------------------------------------------*/

function dubstrap_divider( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'type' => ''
	),$atts));
	
	if($type =='clear'){
		return '<hr class="divider">';
	}
	else{
		return '<div class="sp '. $type .'"></div>';	
	}
	
}
add_shortcode('divider', 'dubstrap_divider');


/*Tooltip
/*---------------------------------------------------------------------------------------------*/

//Tooltip Top
function dubstrap_tooltiptop( $atts, $content = null ) {
	return '<a href="#" data-toggle="tooltip" rel="tooltip" data-placement="top" title="" data-original-title="'. do_shortcode($content) .'">'. do_shortcode($content) . '</a>';
	}
add_shortcode('tooltiptop', 'dubstrap_tooltiptop');

//Tooltip Right
function dubstrap_tooltipright( $atts, $content = null ) {
	return '<a href="#" data-toggle="tooltip" rel="tooltip" data-placement="right" title="" data-original-title="'. do_shortcode($content) .'">'. do_shortcode($content) . '</a>';
	}
add_shortcode('tooltipright', 'dubstrap_tooltipright');

//Tooltip Bottom
function dubstrap_tooltipbottom( $atts, $content = null ) {
	return '<a href="#" data-toggle="tooltip" rel="tooltip" data-placement="bottom" title="" data-original-title="'. do_shortcode($content) .'">'. do_shortcode($content) . '</a>';
	}
add_shortcode('tooltipbottom', 'dubstrap_tooltipbottom');

//Tooltip Bottom
function dubstrap_tooltipleft( $atts, $content = null ) {
	return '<a href="#" data-toggle="tooltip" rel="tooltip" data-placement="left" title="" data-original-title="'. do_shortcode($content) .'">'. do_shortcode($content) . '</a>';
	}
add_shortcode('tooltipleft', 'dubstrap_tooltipleft');
	

/*Drop cap
/*---------------------------------------------------------------------------------------------*/

function dubstrap_dropcap( $atts, $content = null ) {
	
	extract(shortcode_atts(array(
		'type' => ''
	),$atts));
	if($type == 'quote'){
		return '<span class="quote"></span>';
	}
	if($type == 'circleprimary'){
		return '<span class="drop-cap circle primary">' . $content . '</span>';
	}
	else{
   		return '<span class="drop-cap '. $type .' ">' . $content . '</span>';
	}
}
add_shortcode('dropcap', 'dubstrap_dropcap');

/*Block quote
/*---------------------------------------------------------------------------------------------*/

function dubstrap_blockquote( $atts, $content = null) {
	return '<blockquote>' . do_shortcode($content) . '</blockquote>';
}
add_shortcode('blockquote', 'dubstrap_blockquote');

/*List
/*---------------------------------------------------------------------------------------------*/

function dubstrap_list( $atts, $content = null ) {
	
	extract(shortcode_atts(array(
		'type' => ''
	),$atts));
   return '<ul class="dubstrap-list  '. $type .' ">' .do_shortcode($content). '</ul>';
}


function dubstrap_list_li( $atts, $content = null ) {

   return '<li>' .$content. '</li>';
}
add_shortcode('list', 'dubstrap_list');
add_shortcode('li', 'dubstrap_list_li');



/*Notification Boxes
/*---------------------------------------------------------------------------------------------*/
function dubstrap_notification( $atts, $content = null ) {
	
	extract(shortcode_atts(array(
		'style'   => 'light',
		'close' => 'true'
    ), $atts));
	
	if($close != 'true'){
		return '<div class="dubstrap-notification '.$style.'">' . $content . '</div>';
		
		
	}else {return '<div class="dubstrap-notification '.$style.'">' . $content . '<a href="#" class="close" title="Close this">Close</a></div>';}
}

add_shortcode('notification', 'dubstrap_notification');





/*Table
/*---------------------------------------------------------------------------------------------*/
function dubstrap_table( $atts, $content = null ) {	
	return '<table class="table table-bordered">'. do_shortcode($content) . '</table>';
}
function dubstrap_table_thead( $atts, $content = null ) {
	return '<thead>'. do_shortcode($content) . '</thead>';
}
function dubstrap_table_tbody( $atts, $content = null ) {
	return '<tbody>'. do_shortcode($content) . '</tbody>';
}
function dubstrap_table_tr( $atts, $content = null ) {
	return '<tr>'. do_shortcode($content) . '</tr>';
}
function dubstrap_table_th( $atts, $content = null ) {
	return '<th>'. do_shortcode($content) . '</th>';
}
function dubstrap_table_td( $atts, $content = null ) {
	return '<td>'. do_shortcode($content) . '</td>';
}
add_shortcode('table', 'dubstrap_table');
add_shortcode('thead', 'dubstrap_table_thead');
add_shortcode('tbody', 'dubstrap_table_tbody');
add_shortcode('tr', 'dubstrap_table_tr');
add_shortcode('th', 'dubstrap_table_th');
add_shortcode('td', 'dubstrap_table_td');



/* Contact form Shortcode
/*-----------------------------------------------------------------------------------*/
/*

Optional arguments:
 - email: The e-mail address to which the form will send
 - subject: The subject of the e-mail (defaults to "Message via the contact form".
 - button_text: Optionally change the text of the "submit" button.

 - Advanced form fields functionality, for creating dynamic form fields:
 --- Text Input: text_fieldname="Text Field Label|Optional Default Text"
 --- Select Box: select_fieldname="Select Box Label|key=value,key=value,key=value"
 --- Textarea Input: textarea_fieldname="Textarea Field Label|Optional Default Text|Optional Number of Rows|Optional Number of Columns"
 --- Checkbox Input: checkbox_fieldname="Checkbox Field Label|Value of the Checkbox|Checked By Default"
 --- Radio Button Input: radio_fieldname="Radio Field Label|key=value,key=value,key=value|Optional Default Value"

*/

function dubstrap_shortcode_contactform ( $atts, $content = null ) {
		
		global $data;
		
		$defaults = array(
						'email' => $data['dubstrap_contact_form_email'],
						'subject' => __( 'Message via the contact form', 'framework' ),
						'button_text' => __( 'Send message', 'framework' ), 
						'show_default_fields' => 'yes'
						);

		extract( shortcode_atts( $defaults, $atts ) );
		
		
		
					
		// Extract the dynamic fields as well, if they don't have a value in $defaults.
		if($email == ''){
			$email = $data['dubstrap_contact_form_email'];
		}
		$html = '';
		$dynamic_atts = array();
		$formatted_dynamic_atts = array();
		$error_messages = array();

		if ( is_array( $atts ) ) {

			foreach ( $atts as $k => $v ) {

				${$k} = $v;

				$dynamic_atts[$k] = ${$k};

			} // End FOREACH Loop

		} // End IF Statement

		// Parse dynamic fields.

		if ( count( $dynamic_atts ) ) {

			foreach ( $dynamic_atts as $k => $v ) {

				/* Parse the radio buttons.
				--------------------------------------------------*/

				if ( substr( $k, 0, 6 ) == 'radio_' ) {

					// Separate the parameters.
					$params = explode( '|', $v );

					// The title.
					if ( array_key_exists( 0, $params ) ) { $label = $params[0]; } else { $label = $k; } // End IF Statement

					// The options.
					if ( array_key_exists( 1, $params ) ) { $options_string = $params[1]; } else { $options_string = ''; } // End IF Statement

					// The default value.
					if ( array_key_exists( 2, $params ) ) { $default_value = $params[2]; } else { $default_value = ''; } // End IF Statement

					// Format the options.
					$options = array();

					if ( $options_string ) {

						$options_raw = explode( ',', $options_string );

						if ( count( $options_raw ) ) {

							foreach ( $options_raw as $o ) {

								$o = trim( $o );

								$is_formatted = strpos( $o, '=' );

								// It's not formatted how we'd like it, so just add the value is both the value and label.
								if ( $is_formatted === false ) {

									$options[$o] = $o;

								// That's more like it. A separate value and label.
								} else {

									$option_data = explode( '=', $o );

									$options[$option_data[0]] = $option_data[1];

								} // End IF Statement

							} // End FOREACH Loop

						} // End IF Statement

					} // End IF Statement

					// Remove this field from the array, as we're done with it.
					unset( $dynamic_atts[$k] );

					$formatted_dynamic_atts[$k] = array( 'label' => $label, 'options' => $options, 'default_value' => $default_value );

				} // End IF Statement

				/* Parse the radio buttons.
				--------------------------------------------------*/

				if ( substr( $k, 0, 6 ) == 'radio_' ) {

					// Separate the parameters.
					$params = explode( '|', $v );

					// The title.
					if ( array_key_exists( 0, $params ) ) { $label = $params[0]; } else { $label = $k; } // End IF Statement

					// The options.
					if ( array_key_exists( 1, $params ) ) { $options_string = $params[1]; } else { $options_string = ''; } // End IF Statement

					// The default value.
					if ( array_key_exists( 2, $params ) ) { $default_value = $params[2]; } else { $default_value = ''; } // End IF Statement

					// Format the options.
					$options = array();

					if ( $options_string ) {

						$options_raw = explode( ',', $options_string );

						if ( count( $options_raw ) ) {

							foreach ( $options_raw as $o ) {

								$o = trim( $o );

								$is_formatted = strpos( $o, '=' );

								// It's not formatted how we'd like it, so just add the value is both the value and label.
								if ( $is_formatted === false ) {

									$options[$o] = $o;

								// That's more like it. A separate value and label.
								} else {

									$option_data = explode( '=', $o );

									$options[$option_data[0]] = $option_data[1];

								} // End IF Statement

							} // End FOREACH Loop

						} // End IF Statement

					} // End IF Statement

					// Remove this field from the array, as we're done with it.
					unset( $dynamic_atts[$k] );

					$formatted_dynamic_atts[$k] = array( 'label' => $label, 'options' => $options, 'default_value' => $default_value );

				} // End IF Statement

				/* Parse the checkbox inputs.
				--------------------------------------------------*/

				if ( substr( $k, 0, 9 ) == 'checkbox_' ) {

					// Separate the parameters.
					$params = explode( '|', $v );

					// The title.
					if ( array_key_exists( 0, $params ) ) { $label = $params[0]; } else { $label = $k; } // End IF Statement

					// The value of the checkbox.
					if ( array_key_exists( 1, $params ) ) { $value = $params[1]; } else { $value = ''; } // End IF Statement

					// Checked by default?
					if ( array_key_exists( 1, $params ) ) { $checked = $params[2]; } else { $checked = ''; } // End IF Statement

					// Remove this field from the array, as we're done with it.
					unset( $dynamic_atts[$k] );

					$formatted_dynamic_atts[$k] = array( 'label' => $label, 'value' => $value, 'checked' => $checked );

				} // End IF Statement

				/* Parse the text inputs.
				--------------------------------------------------*/

				if ( substr( $k, 0, 5 ) == 'text_' ) {

					// Separate the parameters.
					$params = explode( '|', $v );

					// The title.
					if ( array_key_exists( 0, $params ) ) { $label = $params[0]; } else { $label = $k; } // End IF Statement

					// The default text.
					if ( array_key_exists( 1, $params ) ) { $default_text = $params[1]; } else { $default_text = ''; } // End IF Statement

					// Remove this field from the array, as we're done with it.
					unset( $dynamic_atts[$k] );

					$formatted_dynamic_atts[$k] = array( 'label' => $label, 'default_text' => $default_text );

				} // End IF Statement

				/* Parse the select boxes.
				--------------------------------------------------*/

				if ( substr( $k, 0, 7 ) == 'select_' ) {

					// Separate the parameters.
					$params = explode( '|', $v );

					// The title.
					if ( array_key_exists( 0, $params ) ) { $label = $params[0]; } else { $label = $k; } // End IF Statement

					// The options.
					if ( array_key_exists( 1, $params ) ) { $options_string = $params[1]; } else { $options_string = ''; } // End IF Statement

					// Format the options.
					$options = array();

					if ( $options_string ) {

						$options_raw = explode( ',', $options_string );

						if ( count( $options_raw ) ) {

							foreach ( $options_raw as $o ) {

								$o = trim( $o );

								$is_formatted = strpos( $o, '=' );

								// It's not formatted how we'd like it, so just add the value is both the value and label.
								if ( $is_formatted === false ) {

									$options[$o] = $o;

								// That's more like it. A separate value and label.
								} else {

									$option_data = explode( '=', $o );

									$options[$option_data[0]] = $option_data[1];

								} // End IF Statement

							} // End FOREACH Loop

						} // End IF Statement

					} // End IF Statement

					// Remove this field from the array, as we're done with it.
					unset( $dynamic_atts[$k] );

					$formatted_dynamic_atts[$k] = array( 'label' => $label, 'options' => $options );

				} // End IF Statement

				/* Parse the textarea inputs.
				--------------------------------------------------*/

				if ( substr( $k, 0, 9 ) == 'textarea_' ) {

					// Separate the parameters.
					$params = explode( '|', $v );

					// The title.
					if ( array_key_exists( 0, $params ) ) { $label = $params[0]; } else { $label = $k; } // End IF Statement

					// The default text.
					if ( array_key_exists( 1, $params ) ) { $default_text = $params[1]; } else { $default_text = ''; } // End IF Statement

					// The number of rows.
					if ( array_key_exists( 2, $params ) ) { $number_of_rows = $params[2]; } else { $number_of_rows = 10; } // End IF Statement

					// The number of columns.
					if ( array_key_exists( 3, $params ) ) { $number_of_columns = $params[3]; } else { $number_of_columns = 10; } // End IF Statement

					// Remove this field from the array, as we're done with it.
					unset( $dynamic_atts[$k] );

					$formatted_dynamic_atts[$k] = array( 'label' => $label, 'default_text' => $default_text, 'number_of_rows' => $number_of_rows, 'number_of_columns' => $number_of_columns );

				} // End IF Statement

			} // End FOREACH Loop

		} // End IF Statement

		/*--------------------------------------------------
		 * Form Processing.
		 *
		 * Here is where we validate the POST'ed data and
		 * format it for sending in an e-mail.
		 *
		 * We then send the e-mail and notify the user.
		--------------------------------------------------*/

		$emailSent = false;

		if ( ( count( $_POST ) > 2 ) && isset( $_POST['submitted'] ) ) {

			$fields_to_skip = array( 'checking', 'submitted');
			$default_fields = array( 'contactName' => '', 'contactEmail' => '', 'contactMessage' => '' );
			$error_responses = array(
									'contactName' => __( 'Please enter your name', 'framework' ),
									'contactEmail' => __( 'Please enter your email address (and please make sure it\'s valid)', 'framework' ),
									'contactMessage' => __( 'Please enter your message', 'framework' )
									);

			$posted_data = $_POST;

			// Check if we're using the default fields.
			if ( $show_default_fields != 'no' ) {
				// Check for errors.
				foreach ( array_keys( $default_fields ) as $d ) {
					if ( !isset ( $_POST[$d] ) || $_POST[$d] == '' || ( $d == 'contactEmail' && ! is_email( $_POST[$d] ) ) ) {
						$error_messages[$d] = $error_responses[$d];
					} // End IF Statement
				} // End FOREACH Loop
			} else {
				$default_fields = array( 'contactName' => get_bloginfo( 'name' ), 'contactEmail' => get_bloginfo( 'admin_email' ), 'contactMessage' => '' );
			}

			// If we have errors, don't do anything. Otherwise, run the processing code.

			if ( count( $error_messages ) ) {} else {
				// Setup e-mail variables.
				$message_fromname = $default_fields['contactName'];
				$message_fromemail = strtolower( $default_fields['contactEmail'] );
				$message_subject = $subject;
				$message_body = $default_fields['contactMessage'] . "\n\r\n\r";

				// Filter out skipped fields and assign default fields.
				foreach ( $posted_data as $k => $v ) {
					if ( in_array( $k, $fields_to_skip ) ) {
						unset( $posted_data[$k] );
					} // End IF Statement

					if ( in_array( $k, array_keys( $default_fields ) ) ) {
						$default_fields[$k] = $v;

						unset( $posted_data[$k] );
					} // End IF Statement
				} // End FOREACH Loop

				// Okay, so now we're left with only the dynamic fields. Assign to a fresh variable.
				$dynamic_fields = $posted_data;

				// Format the default fields into the $message_body.

				foreach ( $default_fields as $k => $v ) {
					if ( $v == '' ) {} else {
						$message_body .= str_replace( 'contact', '', $k ) . ': ' . $v . "\n\r";
					} // End IF Statement
				} // End FOREACH Loop

				// Format the dynamic fields into the $message_body.

				foreach ( $dynamic_fields as $k => $v ) {
					if ( $v == '' ) {} else {
						$value = '';

						if ( substr( $k, 0, 7 ) == 'select_' || substr( $k, 0, 6 ) == 'radio_' ) {
							$message_body .= $formatted_dynamic_atts[$k]['label'] . ': ' . $formatted_dynamic_atts[$k]['options'][$v] . "\n\r";
						} else {
							$message_body .= $formatted_dynamic_atts[$k]['label'] . ': ' . $v . "\n\r";
						} // End IF Statement
					} // End IF Statement
				} // End FOREACH Loop

				// Send the e-mail.
				$headers = __( 'From: ', 'framework') . $default_fields['contactName'] . ' <' . $default_fields['contactEmail'] . '>' . "\r\n" . __( 'Reply-To: ', 'framework' ) . $default_fields['contactEmail'];

				$emailSent = wp_mail($email, $subject, $message_body, $headers);

				
			} // End IF Statement ( count( $error_messages ) )

		} // End IF Statement

		/* Generate the form HTML.
		--------------------------------------------------*/

		$html .= '<div class="post contact-form">' . "\n";

		/* Display message HTML if necessary.
		--------------------------------------------------*/
		
		$id = rand(0,999);
		// Success messages
		if( isset( $emailSent ) && $emailSent == true ) {
			$html .= _e( 'Your email was successfully sent.', 'framework' );
			$html .= '<span class="has_sent hide"></span>' . "\n";
		}

		// Error messages
		if( count( $error_messages ) ) {
			$html .= _e( 'There were one or more errors while submitting the form.', 'framework' ) ;
		}

        // No e-mail address supplied.
        if( $email == '' ) {
			$html .= _e( 'E-mail has not been setup properly. Please add your contact e-mail!', 'framework' );
		}

		if ( $email == '' ) {} else {
			$html .= '<form action="" class="contact-form" id="contact-form-'.$id.'" method="post">' . "\n";
				$html .= '<ul class="widget-contact"><fieldset class="forms">' . "\n";

			/* Parse the "static" form fields.
			--------------------------------------------------*/
			if ( $show_default_fields != 'no' ) {
				$contactName = '';
				if( isset( $_POST['contactName'] ) ) { $contactName = $_POST['contactName']; }

				$contactEmail = '';
				if( isset( $_POST['contactEmail'] ) ) { $contactEmail = $_POST['contactEmail']; }

				$contactMessage = '';
				if( isset( $_POST['contactMessage'] ) ) { $contactMessage = stripslashes( $_POST['contactMessage'] ); }

				$html .= '<li><label for="contactName">' . __( 'Name', 'framework' ) . '</label>' . "\n";
				$html .= '<input type="text" name="contactName" id="contactName" value="' . esc_attr( $contactName ) . '" class="txt requiredField" />' . "\n";

				if( array_key_exists( 'contactName', $error_messages ) ) {
					$html .= '<span class="error">' . $error_messages['contactName'] . '</span>' . "\n";
				}

				$html .= '</li>' . "\n";

				$html .= '<li><label for="contactEmail">' . __( 'Email', 'framework' ) . '</label>' . "\n";
				$html .= '<input type="text" name="contactEmail" id="contactEmail" value="' . esc_attr( $contactEmail ) . '" class="txt requiredField email" />' . "\n";

				if( array_key_exists( 'contactEmail', $error_messages ) ) {
					$html .= '<span class="error">' . $error_messages['contactEmail'] . '</span>' . "\n";
				}

				$html .= '</li>' . "\n";

				$html .= '<li><label for="contactMessage">' . __( 'Message', 'framework' ) . '</label>' . "\n";

				$html .= '<textarea name="contactMessage" id="contactMessage" rows="10" cols="30" class="textarea requiredField">' . esc_textarea( $contactMessage ) . '</textarea>' . "\n";

				if( array_key_exists( 'contactMessage', $error_messages ) ) {
					$html .= '<span class="error">' . $error_messages['contactMessage'] . '</span>' . "\n";
				}

				$html .= '</li>' . "\n";
				
				?>
                <script type="text/javascript">
				jQuery(document).ready(function() {
					jQuery('form#contact-form-<?php echo $id;?>').submit(function() {
						jQuery('form#contact-form-<?php echo $id;?> .error').remove();
						var hasError = false;
						jQuery('form#contact-form-<?php echo $id;?> .requiredField').each(function() {
							if(jQuery.trim(jQuery(this).val()) == '') {
								var labelText = jQuery(this).prev().text();
								jQuery(this).parent().append('<div class="clear"></div><span class="error"><?php _e('You forgot to enter your', 'framework'); ?> '+labelText+'</span>');
								jQuery(this).addClass('inputError');
								hasError = true;
							} else if(jQuery(this).hasClass('email')) {
								var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
								if(!emailReg.test(jQuery.trim(jQuery(this).val()))) {
									var labelText = jQuery(this).prev().text();
									jQuery(this).parent().append('<div class="clear"></div><span class="error"><?php _e('You entered an invalid', 'framework'); ?> '+labelText+'</span>');
									jQuery(this).addClass('inputError');
									hasError = true;
								}
							}
						});
						if(!hasError) {
							var formInput = jQuery(this).serialize();
							jQuery.post(jQuery(this).attr('action'),formInput, function(data){
								jQuery('form#contact-form-<?php echo $id;?>').slideUp("fast", function() {				   
									jQuery(this).before('<?php _e('Your email was successfully sent.', 'framework');  ?>');
								});
							});
						}
						
						return false;
						
					});
				});
				</script>
                <?php
			} // End static fields check

			/* Parse dynamic fields into HTML.
			--------------------------------------------------*/

			if ( count( $formatted_dynamic_atts ) ) {

				foreach ( $formatted_dynamic_atts as $k => $v ) {

					/* Parse the radio buttons.
					--------------------------------------------------*/

					if ( substr( $k, 0, 6 ) == 'radio_' ) {
						/* Generate Select Box Field HTML.
						----------------------------------------------*/

						${$k} = $v['default_value'];
						if ( isset( $_POST[$k] ) ) { ${$k} = trim( strip_tags( $_POST[$k] ) ); } // End IF Statement

						$html .= '<p><label for="' . $k . '">' . $v['label'] . '</label>' . "\n";

							$html .= '<span class="dubstrap-radio-container fl">' . "\n";

							foreach ( $v['options'] as $value => $label ) {
								$html .= '<input type="radio" name="' . $k . '" class="radio-button dubstrap-input-radio" value="' . $value . '"' . checked( $value, ${$k}, false ) . ' />&nbsp;' . $label . '<br />' . "\n";
							}

							$html .= '</span><!--/.dubstrap-radio-container-->' . "\n";
					}

					/* Parse the checkbox inputs.
					--------------------------------------------------*/

					if ( substr( $k, 0, 9 ) == 'checkbox_' ) {
						/* Generate Checkbox Input Field HTML.
						----------------------------------------------*/

						${$k} = $v['value'];
						if ( isset( $_POST[$k] ) ) { ${$k} = trim( strip_tags( $_POST[$k] ) ); } // End IF Statement

						$checked = 0;
						if ( array_key_exists( 'checked', $v ) && $v['checked'] == 'yes' ) { $checked = ${$k}; }

						$html .= '<p class="inline">' . "\n";
						$html .= '<input type="checkbox" value="' . ${$k} . '" name="' . $k . '" id="' . $k . '" class="checkbox input-checkbox dubstrap-input-checkbox"' . checked( $checked, ${$k}, false ) . ' />' . "\n";
						$html .= '<label for="' . $k . '">' . $v['label'] . '</label></p>' . "\n";
					}

					/* Parse the text inputs.
					--------------------------------------------------*/

					if ( substr( $k, 0, 5 ) == 'text_' ) {
						/* Generate Text Input Field HTML.
						----------------------------------------------*/

						${$k} = $v['default_text'];
						if ( isset( $_POST[$k] ) ) { ${$k} = trim( strip_tags( $_POST[$k] ) ); } // End IF Statement

						$html .= '<p><label for="' . $k . '">' . $v['label'] . '</label>' . "\n";
						$html .= '<input type="text" value="' . esc_attr( ${$k} ) . '" name="' . $k . '" id="' . $k . '" class="txt input-text textfield dubstrap-input-text" /></p>' . "\n";
					}

					/* Parse the select boxes.
					--------------------------------------------------*/

					if ( substr( $k, 0, 7 ) == 'select_' ) {
						/* Generate Select Box Field HTML.
						----------------------------------------------*/

						${$k} = '';
						if ( isset( $_POST[$k] ) ) { ${$k} = trim( strip_tags( $_POST[$k] ) ); } // End IF Statement

						$html .= '<p><label for="' . $k . '">' . $v['label'] . '</label>' . "\n";
						$html .= '<select name="' . $k . '" id="' . $k . '" class="select selectfield dubstrap-select">' . "\n";

							foreach ( $v['options'] as $value => $label ) {
								$selected = '';
								if ( $value == ${$k} ) { $selected = ' selected="selected"'; } // End IF Statement

								$html .= '<option value="' . esc_attr( $value ) . '"' . $selected . '>' . $label . '</option>' . "\n";
							}

						$html .= '</select></p>' . "\n";
					}

					/* Parse the textarea inputs.
					--------------------------------------------------*/

					if ( substr( $k, 0, 9 ) == 'textarea_' ) {
						/* Generate Textarea Input Field HTML.
						----------------------------------------------*/

						${$k} = $v['default_text'];
						if ( isset( $_POST[$k] ) ) { ${$k} = trim( strip_tags( $_POST[$k] ) ); } // End IF Statement

						$html .= '<p><label for="' . $k . '">' . $v['label'] . '</label>' . "\n";
						$html .= '<textarea rows="' . $v['number_of_rows'] . '" cols="' . $v['number_of_columns'] . '" name="' . $k . '" id="' . $k . '" class="input-textarea textarea dubstrap-textarea">' . $v['default_text'] . '</textarea></p>' . "\n";

					}
				} // End FOREACH Loop
			} // End IF Statement

			/* The end of the form.
			----------------------------------------------*/



			$checking = '';
			if(isset($_POST['checking'])) {
				$checking = $_POST['checking'];
			}

			$html .= '<li style="display:none !important"><p class="screenReader"><label for="checking" class="screenReader">' . __('If you want to submit this form, do not enter anything in this field', 'framework') . '</label><input type="text" name="checking" id="checking" class="screenReader" value="' . esc_attr( $checking ) . '" /></p></li>' ;
			$html .= '<p class="buttons"><input type="hidden" name="submitted" id="submitted" value="true" /><input class="submit button" type="submit" value="' . $button_text . '" /></p>';
				$html .= '</fieldset>' . "\n";
			$html .= '</form>' . "\n";
			$html .= '</div><!--/.post .contact-form-->' . "\n";
			$html .= '<div class="fix"></div>' . "\n";
		} // End IF Statement ( $email == '' )

		return $html;
} // End dubstrap_shortcode_contactform()

add_shortcode( 'contact_form', 'dubstrap_shortcode_contactform' );




/*Video
/*---------------------------------------------------------------------------------------------*/

function dubstrap_video( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'height' => '300',
		'type' => 'youtube',
		'id' => ''
	),$atts));
	
	if($height == ''){
		$height = '300';
	}
	if($type == 'youtube'){
		return '<iframe class="video-shortcode" width="100%" height="'.$height.'" src="http://www.youtube.com/embed/'.$id.'?wmode=transparent" frameborder="0" allowfullscreen></iframe>';
	}
	else{
		return '<iframe class="video-shortcode" src="http://player.vimeo.com/video/'.$id.'" width="100%" height="'.$height.'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
	}
}
add_shortcode('video', 'dubstrap_video');



/*Pricing Table
/*---------------------------------------------------------------------------------------------*/

//table container
function dubstrap_pricing_table( $atts, $content = null ) {
	
	extract(shortcode_atts(array(
		'columns' => ''
		
    ), $atts));
	$id = rand(0,999);
	
	$str = '';
	$str .= '<div id="dubstrap-pricing-table-'.$id.'" class="dubstrap-pricing-table '.$columns.'-columns">' . do_shortcode($content) . '</div>';
	$str .= '<script type="text/javascript">jQuery(document).ready(function(){jQuery("#dubstrap-pricing-table-'.$id.' ul").each(function(){jQuery("li:even",this).addClass("odd");});})</script>';
	return $str;
}
add_shortcode('pricing_table', 'dubstrap_pricing_table');

//Pricing plan
function dubstrap_pricing_table_plan( $atts, $content = null ) {
	
	extract(shortcode_atts(array(
		'name' => 'Plan\'s name',
		'price' => '$0',
		'type' => 'normal',
		'period' => 'per month',
		'color' => ''
	), $atts));
	
	$plan_type = '';
	if($type != 'normal'){
		$plan_type = 'pt-featured-col';
	}
	$style = '';
	if($color != ''){
		$style = ' style="background-color:'.$color.'"';
	}
	
	$str = '';
	$str .= '<div class="pt-column '.$plan_type.'">';
		$str .= '<div class="pt-heading">';
			$str .= '<h5 '.$style.'>'.$name.'</h5>';
			$str .= '<h1 '.$style.'>';
				$str .= '<strong class="cufon">'.$price.'</strong>';
				$str .= '<span>'.$period.'</span>';
			$str .= '</h1>';
		$str .= '</div>';
		$str .= do_shortcode($content);
	$str .= '</div>';
	return $str;
}
add_shortcode('pt_plan', 'dubstrap_pricing_table_plan');

//Pricing Feature list
function dubstrap_pricing_table_features_list( $atts, $content = null ) {
	
	extract(shortcode_atts(array(
		'heading' => 'Choose your plan',
		'description' => ''
	), $atts));
	
	$str = '';
	$str .= '<div class="pt-column pt-features-list">';
		$str .= '<div class="pt-heading">';
			$str .= '<h5>&nbsp;</h5>';
			$str .= '<h1>';
				$str .= '<strong class="cufon">'.$heading.'</strong>';
				$str .= '<span>'.$description.'</span>';
			$str .= '</h1>';
		$str .= '</div>';
		$str .= do_shortcode($content);
	$str .= '</div>';
	return $str;
}
add_shortcode('pt_features', 'dubstrap_pricing_table_features_list');


//Plan icon
function dubstrap_pricing_table_plan_icon_check( $atts, $content = null ) {

	return '<img src="'.get_template_directory_uri().'/img/list-tick.png">';
}
add_shortcode('pt_icon_check', 'dubstrap_pricing_table_plan_icon_check');

function dubstrap_pricing_table_plan_icon_cross( $atts, $content = null ) {

	return '<img src="'.get_template_directory_uri().'/img/list-cross.png">';
}
add_shortcode('pt_icon_cross', 'dubstrap_pricing_table_plan_icon_cross');


?>