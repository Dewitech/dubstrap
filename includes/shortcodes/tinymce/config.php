<?php

/*-----------------------------------------------------------------------------------*/
/*	Columns Config
/*-----------------------------------------------------------------------------------*/

$dewitech_shortcodes['columns'] = array(
	'params' => array(),
	'shortcode' => ' {{child_shortcode}} ', // as there is no wrapper shortcode
	'popup_title' => __('Insert Columns Shortcode', 'dewitech'),
	'no_preview' => true,
	
	// child shortcode is clonable & sortable
	'child_shortcode' => array(
		'params' => array(
			'column' => array(
				'type' => 'select',
				'label' => __('Column Type', 'dewitech'),
				'desc' => __('Select the type, ie width of the column.', 'dewitech'),
				'options' => array(
				
					'row_open'				=> __('Start Row','dewitech'),
					
					'row_fluid_open'		=> __('Start Row Fluid','dewitech'),
					
					'row_close'				=> __('End Row','dewitech'),
					
					'span1' 				=> __('span1','dewitech'),
					
					'span2' 				=> __('span2','dewitech'),
				
					'span3' 				=> __('span3','dewitech'),
					
					'span4' 				=> __('span4','dewitech'),
					
					'span5' 				=> __('span5','dewitech'),
					
					'span6' 				=> __('span6','dewitech'),
					
					'span7' 				=> __('span7','dewitech'),
					
					'span8' 				=> __('span8','dewitech'),
					
					'span9' 				=> __('span9','dewitech'),
					
					'span10' 				=> __('span10','dewitech'),
					
					'span11' 				=> __('span11','dewitech'),
					
					'span12' 				=> __('span12','dewitech'),
				)
			),
			'content' => array(
				'std' => '',
				'type' => 'textarea',
				'label' => __('Column Content', 'dewitech'),
				'desc' => __('Add the column content.', 'dewitech'),
			)
		),
		'shortcode' => '[{{column}}]{{content}}[/{{column}}]',
		'clone_button' => __('Add Column', 'dewitech')
	)
);


/*-----------------------------------------------------------------------------------*/
/*	Button Config
/*-----------------------------------------------------------------------------------*/

$dewitech_shortcodes['button'] = array(
	'no_preview' => true,
	'params' => array(
		'content' => array(
			'std' => 'Button Text',
			'type' => 'text',
			'label' => __('Button\'s Text', 'dewitech'),
			'desc' => __('Add the button\'s text', 'dewitech'),
		),
		'url' => array(
			'std' => '#',
			'type' => 'text',
			'label' => __('Button URL', 'dewitech'),
			'desc' => __('Add the button\'s url eg http://example.com', 'dewitech')
		),
		'style' => array(
			'type' => 'select',
			'label' => __('Button Style', 'dewitech'),
			'desc' => __('Select the button\'s style, ie the button\'s colour', 'dewitech'),
			'options' => array(
				'default' => __('Default','dewitech'),
				'primary' => __('Primary','dewitech'),
				'info' => __('Info','dewitech'),
				'success' => __('Success','dewitech'),
				'warning' => __('Warning','dewitech'),
				'danger' => __('Danger','dewitech'),
				'inverse' => __('Inverse','dewitech'),
				
			)
		),
		'size' => array(
			'type' => 'select',
			'label' => __('Button Size', 'dewitech'),
			'desc' => __('Select the button\'s size', 'dewitech'),
			'options' => array(
				'mini' => __('Mini','dewitech'),
				'small' => __('Small','dewitech'),
				'' => __('Medium','dewitech'),
				'large' => __('Large','dewitech'),
				'block' => __('Block','dewitech')
			)
		),
		'type' => array(
			'type' => 'select',
			'label' => __('Button Type', 'dewitech'),
			'desc' => __('Select the button\'s type', 'dewitech'),
			'options' => array(
				'' => __('default','dewitech'),
				'rounded' => __('Rounded','dewitech')
			)
		),
		'target' => array(
			'type' => 'select',
			'label' => __('Button Target', 'dewitech'),
			'desc' => __('_self = open in same window. _blank = open in new window', 'dewitech'),
			'options' => array(
				'_self' => '_self',
				'_blank' => '_blank'
			)
		)
	),
	'shortcode' => '[button url="{{url}}" style="{{style}}" size="{{size}}" type="{{type}}" target="{{target}}"]{{content}}[/button]',
	'popup_title' => __('Insert Button Shortcode', 'dewitech')
);



/*-----------------------------------------------------------------------------------*/
/*	List
/*-----------------------------------------------------------------------------------*/

$dewitech_shortcodes['list'] = array(
	'no_preview' => true,
	'shortcode' => '[list type="{{type}}"]{{child_shortcode}}[/list]',
	'params' => array(
		'type' => array(
			'type' => 'select',
			'label' => __('List Style', 'dewitech'),
			'desc' => __('Select the List style', 'dewitech'),
			'options' => array(
				'' => __('Default (no icon)','dewitech'),
				'arrow' => __('Arrow','dewitech'),
				'bubble' => __('Bubble','dewitech'),
				'bullet' => __('Bullet','dewitech'),
				'cross' => __('Cross','dewitech'),
				'doc' => __('Document','dewitech'),
				'info' => __('Info','dewitech'),
				'plus' => __('Plus','dewitech'),
				'star' => __('Star','dewitech'),
				'tick' => __('Tick','dewitech')
			)
		)
		
		
	),
	'child_shortcode' => array(
        'params' => array(
            'content' => array(
                'std' => 'Element Content',
                'type' => 'text',
                'label' => __('Element Content', 'dewitech'),
                'desc' => __('Add the Element content', 'dewitech')
            )
        ),
        'shortcode' => '[li]{{content}}[/li]',
        'clone_button' => __('Add element', 'dewitech')
    ),
	'popup_title' => __('Insert List Shortcode', 'dewitech'),
	
);

/*-----------------------------------------------------------------------------------*/
/*	Notification Config
/*-----------------------------------------------------------------------------------*/

$dewitech_shortcodes['notification'] = array(
	'no_preview' => true,
	'params' => array(
		'style' => array(
			'type' => 'select',
			'label' => __('Notification Style', 'dewitech'),
			'desc' => __('Select the notification\'s style, ie the alert colour', 'dewitech'),
			'options' => array(
				'light' => __('Default (Light)','dewitech'),
				'blue' => __('Information (Blue)','dewitech'),
				'yellow' => __('Attention (Yellow)','dewitech'),
				'green' => __('Success (Green)','dewitech'),
				'red' => __('Error (Red)','dewitech')
			)
		),
		'content' => array(
			'std' => __('Your Alert!','dewitech'),
			'type' => 'textarea',
			'label' => __('Alert Text', 'dewitech'),
			'desc' => __('Add the alert\'s text', 'dewitech'),
		),
		'close' => array(
			'type' => 'select',
			'options' => array(
				'true'=> __('True','dewitech'),
				'false' => __('False','dewitech')
			
			),
			'label' => __('Allow closing', 'dewitech'),
			'std' => '','desc' => __('Check this if you want to enable close button', 'dewitech'),
		)
		
	),
	'shortcode' => '[notification close="{{close}}" style="{{style}}"]{{content}}[/notification]',
	'popup_title' => __('Insert Notification Shortcode', 'dewitech')
);



/*-----------------------------------------------------------------------------------*/
/*	Contact form
/*-----------------------------------------------------------------------------------*/

$dewitech_shortcodes['contactform'] = array(
	'no_preview' => true,
	'params' => array(
		'email' => array(
			'type' => 'text',
			'label' => __('Email to send form to', 'dewitech'),
			'desc' => __('Defaults to the Contact Form E-mail setting under Theme Options if not set here', 'dewitech'),
			'std' => ''
		),
		'subject' => array(
			'std' => '1',
			'type' => 'text',
			'label' => __('Dropcap\'s Letter: ', 'dewitech'),
			'desc' => __('Defaults to "Message from the contact form" if not set here', 'dewitech'),
		),
		
	),
	'shortcode' => '[contact_form email="{{email}}" subject="{{subject}}"]',
	'popup_title' => __('Insert Contact Form Shortcode', 'dewitech')
);

/*-----------------------------------------------------------------------------------*/
/*	Video embed shortcode
/*-----------------------------------------------------------------------------------*/

$dewitech_shortcodes['video'] = array(
	'no_preview' => false,
	'params' => array(
		'type' => array(
			'type' => 'select',
			'label' => __('Video type', 'dewitech'),
			'options' => array(
				'youtube' => 'Youtube',
				'vimeo' => 'Vimeo'
			)
		),
		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Video code ', 'dewitech'),
			'desc' => __('Paste the ID of the video is hosted on, such as Youtube and Vimeo. you want to show <br>E.g. http://www.youtube.com/watch?v=<strong>tbPhf_KXNZI</strong><br>http://vimeo.com/<strong>6428069</strong>', 'dewitech'),
		),
		'height' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Video Height', 'dewitech'),
			'desc' => __('Default 300', 'dewitech'),
		)
		
	),
	'shortcode' => '[video type="{{type}}" height="{{height}}" id="{{id}}"]',
	'popup_title' => __('Insert Video Shortcode', 'dewitech')
);


/*-----------------------------------------------------------------------------------*/
/*	Pricing table
/*-----------------------------------------------------------------------------------*/
//Pricing container
$dewitech_shortcodes['pricingtable'] = array(
    'params' => array(
		'columns' => array(
			'type' => 'select',
			'label' => __('Select number columns', 'dewitech'),
			'options' => array(
				'three' => __('Three Columns','dewitech'),
				'four' => __('Four Columns','dewitech'),
				'five' => __('Five Columns','dewitech'),
				'six' => __('Six Columns','dewitech')
			)
		)
	),
    'no_preview' => true,
    'shortcode' => '[pricing_table columns="{{columns}}"][/pricing_table]',
    'popup_title' => __('Insert Pricing Table', 'dewitech')
    
);

//Pricing Plan
$dewitech_shortcodes['pricingplan'] = array(
    'params' => array(
		'name' => array(
			'std' => __('Plan\'s name','dewitech'),
			'type' => 'text',
			'label' => __('Plan\'s Name', 'dewitech')
		
		),
		'price' => array(
			'std' => '0$',
			'type' => 'text',
			'label' => __('Plan\'s price', 'dewitech')
			
		),
		'type' => array(
			'type' => 'select',
			'label' => __('Type of plan', 'dewitech'),
			'options' => array(
				'normal' => __('Normal','dewitech'),
				'featured' => __('Featured','dewitech')
			)
		),
		'period' => array(
			'std' => __('Month','dewitech'),
			'type' => 'text',
			'label' => __('Period', 'dewitech'),
			'desc' => __('E.g: week, month, year', 'dewitech')
		
		),
		'color' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Custom Heading color', 'dewitech')
			
		)
	),
    'no_preview' => true,
    'shortcode' => '[pt_plan type="{{type}}" name="{{name}}" price="{{price}}" period="{{period}}" color="{{color}}"][/pt_plan]',
    'popup_title' => __('Insert Pricing Plan', 'dewitech')
    
);

//Pricing Features
$dewitech_shortcodes['pricingfeatures'] = array(
    'params' => array(
		'heading' => array(
			'std' => __('Choose your plan','dewitech'),
			'type' => 'text',
			'label' => __('Heading', 'dewitech')
		
		),
		'description' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Short description', 'dewitech')
			
		)
	),
    'no_preview' => true,
    'shortcode' => '[pt_features heading="{{heading}}" description="{{description}}"][/pt_features]',
    'popup_title' => __('Insert Pricing Features', 'dewitech')
    
);

//feature list
$dewitech_shortcodes['ptli'] = array(
    'params' => '',
    'no_preview' => true,
    'shortcode' => '{{child_shortcode}}',
    'popup_title' => __('Insert Testimonial Shortcode', 'dewitech'),
    
    'child_shortcode' => array(
        'params' => array(
			'content' => array(
                'std' => '',
                'type' => 'text',
                'label' => __('Content', 'dewitech')
            )
        ),
        'shortcode' => '[pt_li]{{content}}[/pt_li]',
        'clone_button' => __('Add more features', 'dewitech')
    )
);
?>