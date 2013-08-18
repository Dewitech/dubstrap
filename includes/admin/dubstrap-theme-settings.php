<?php
add_action('init','of_options');

if (!function_exists('of_options')) {
function of_options(){

//Theme Shortname
$shortname = "dt";


//Populate the options array
global $dt_options;
$dt_options = get_option('of_options');


//Access the WordPress Pages via an Array
$dt_pages = array();
$dt_pages_obj = get_pages('sort_column=post_parent,menu_order');    
foreach ($dt_pages_obj as $dt_page) {
$dt_pages[$dt_page->ID] = $dt_page->post_name; }
$dt_pages_tmp = array_unshift($dt_pages, "Select a page:"); 
$dt_pagerep = str_replace("-", " ",  $dt_pages);

//Access the WordPress Categories via an Array
$dt_slug = array();  
$dt_categories_obj = get_categories('hide_empty=0');
foreach ($dt_categories_obj as $dt_cat) {
$dt_slug[$dt_cat->cat_ID] = $dt_cat->slug;}
$categories_tmp = array_unshift($dt_slug, "Select a category:");

/*
 * Site Options Panel
 */
$options = array(); // do not delete this line - sky will fall

//Map type
$tt_maptype = array (
'TERRAIN',
'HYBRID',
'SATELLITE',
'ROADMAP'
);

$tt_zoom = range(1,50);

//Theme Color
$tt_themecol = array (
'green',
'blue',
'orange',
'red',
'rose',
'yellow',
'light-green',
'light-blue',
'light-orange',
'light-red',
'light-rose',
'light-yellow',

);

/* Google webfont array list */
require 'googlewebfont.php';

/* Option Page - General */	
$options[] = array( "name" => __('General','dubstrap'),
			"type" => "heading");

$options[] = array("name" => __('Homepage Style','dubstrap'),
			"desc" => "Which style would you like for homepage?",
			"id" => $shortname."_fcat",
			"type" => "select",
			"options" => $dt_slug);
			
$options[] = array("name" => __('Homepage Style','dubstrap'),
			"desc" => "Which style would you like for homepage?",
			"id" => $shortname."_fcat2",
			"type" => "select",
			"options" => $dt_slug);
			
$options[] = array("name" => __('Homepage Style','dubstrap'),
			"desc" => "Which style would you like for homepage?",
			"id" => $shortname."_flat",
			"type" => "radio",
			"std" => "normal",
			"options" => array("normal" => "Normal", "flat" => "Flat"));
			
/* Option Page - General */	
$options[] = array( "name" => __('Typhography','dubstrap'),
			"type" => "heading");
			
$options[] = array("name" => __('Heading Fonts','dubstrap'),
			"desc" => "Which style would you like for homepage?",
			"id" => $shortname."_heading",
			"type" => "select",
			"std" => "Raleway",
			"options" => $tt_fonts);
			
$options[] = array("name" => __('Heading Letter Spacing','dubstrap'),
			"desc" => "Which style would you like for homepage?",
			"id" => $shortname."_hlspacing",
			"type" => "text",
			"std" => "0px");
			
$options[] = array("name" => __('Navigation Menu Fonts','dubstrap'),
			"desc" => "Which style would you like for homepage?",
			"id" => $shortname."_navfont",
			"type" => "select",
			"std" => "Raleway",
			"options" => $tt_fonts);
			
$options[] = array("name" => __('Heading Letter Spacing','dubstrap'),
			"desc" => "Which style would you like for homepage?",
			"id" => $shortname."_navspacing",
			"type" => "text",
			"std" => "0px");
			
$options[] = array("name" => __('Paragraph/Body Fonts','dubstrap'),
			"desc" => "Which style would you like for homepage?",
			"id" => $shortname."_par",
			"type" => "select",
			"std" => "Lato",
			"options" => $tt_fonts);
			
$options[] = array("name" => __('Paragraph/Body Spacing','dubstrap'),
			"desc" => "Which style would you like for homepage?",
			"id" => $shortname."_pbspacing",
			"type" => "text",
			"std" => "0px");
						


/* Option Page - Image Thumbnail Size*/	
$options[] = array( "name" => __('Image Thumbnails','dubstrap'),
			"type" => "heading");	
			
$options[] = array("name" => __('Paragraph/Body Spacing','dubstrap'),
			"desc" => "Which style would you like for homepage?",
			"id" => $shortname."_pbspacing",
			"type" => "text",
			"std" => "0px");
			
/*			
$options[] = array("name" => __('Homepage Style','dubstrap'),
			"desc" => "Which style would you like for homepage?",
			"id" => $shortname."_homestyle",
			"type" => "radio",
			"std" => "hstyle1",
			"options" => array("hstyle1" => "Style 1", "hstyle2" => "Style 2", "hstyle3" => "Style 3", "hstyle4" => "Style 4", "hstyle5" => "Style 5"));
			
$options[] = array("name" => __('Theme Color','dubstrap'),
			"desc" => "",
			"id" => $shortname."_themecolor",
			"type" => "select",
			"std" => "green",
			"options" => $tt_themecol);
			
$options[] = array( "name" => __('Website Logo','dubstrap'),
			"desc" => __('Upload a custom logo for your Website.','dubstrap'),
			"id" => $shortname."_sitelogo",
			"std" => $sitelogo =  get_template_directory_uri() . '/img/logo.png',
			"type" => "upload");

$options[] = array( "name" => __('Favicon','dubstrap'),
			"desc" => __('Upload a 16px x 16px image that will represent your website\'s favicon.<br /><br /><em>To ensure cross-browser compatibility, we recommend converting the favicon into .ico format before uploading. (<a href="http://www.favicon.cc/">www.favicon.cc</a>)</em>','dubstrap'),
			"id" => $shortname."_favicon",
			"std" => $favicon =  get_template_directory_uri() . '/ico/favicon.ico',
			"type" => "upload");

$options[] = array( "name" => __('Login Logo','dubstrap'),
			"desc" => __('Upload a custom login logo for your Website.','dubstrap'),
			"id" => $shortname."_loglogo",
			"std" => $loglogo =  get_template_directory_uri() . '/img/logo.png',
			"type" => "upload");
			
			
/* Option Page - Slogan and Text */	
/*
$options[] = array( "name" => __('Slogan','dubstrap'),
			"type" => "heading");
			
$options[] = array( "name" => __('Slogan for Homepage Style 1','dubstrap'),
			"desc" => __('Slogan Header','dubstrap'),
			"id" => $shortname."_shs1",
			"std" => "About Our Business",
			"type" => "text");
			
$options[] = array( "name" => __('Slogan Text for Homepage Style 1','dubstrap'),
			"desc" => __('Slogan Text','dubstrap'),
			"id" => $shortname."_ths1",
			"std" => "We made Murky09 stand out from the crowd. We used monotone color schemes with plane background, we used scalable vector icons and we blended it all with a unique touch of perfection.",
			"type" => "textarea");
			
			
$options[] = array( "name" => __('Tagline for Homepage Style 2','dubstrap'),
			"desc" => __('Tagline Description','dubstrap'),
			"id" => $shortname."_taghs2",
			"std" => "We briefly summarize to our lovely template",
			"type" => "text");
			
$options[] = array( "name" => __('Slogan Header for Homepage Style 2','dubstrap'),
			"desc" => __('Slogan Header','dubstrap'),
			"id" => $shortname."_shs2",
			"std" => "This template is for",
			"type" => "text");
			
$options[] = array( "name" => __('Subheading for Homepage Style 2','dubstrap'),
			"desc" => __('Subheading','dubstrap'),
			"id" => $shortname."_sbhs2",
			"std" => "showing your work to the world!",
			"type" => "text");
			
$options[] = array( "name" => __('Slogan Text for Homepage Style 2','dubstrap'),
			"desc" => __('Slogan Text','dubstrap'),
			"id" => $shortname."_ths2",
			"std" => "Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum.",
			"type" => "textarea");
		
/* Option Page  - Featured Section */	
/*
$options[] = array( "name" => __('Featured Content','dubstrap'),
			"type" => "heading");
			
$options[] = array( "name" => __('Featured Content Title','dubstrap'),
			"desc" => __('','dubstrap'),
			"id" => $shortname."_fct",
			"std" => "What we've got?",
			"type" => "text");
			
$options[] = array( "name" => __('Feature Icon 1','dubstrap'),
			"desc" => __('','dubstrap'),
			"id" => $shortname."_fi1",
			"std" => "camera",
			"type" => "text");
			
$options[] = array( "name" => __('Feature Title 1','dubstrap'),
			"desc" => __('','dubstrap'),
			"id" => $shortname."_ft1",
			"std" => "Mobile Site Design",
			"type" => "text");
			
$options[] = array( "name" => __('Feature Text Content 1','dubstrap'),
			"desc" => __('','dubstrap'),
			"id" => $shortname."_ftc1",
			"std" => "Vodio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos quas molestias excepturi sint occaecati cupiditate non provident. Dignissimos ducimus qui blanditiis praesentium voluptatum",
			"type" => "textarea");

			
$options[] = array( "name" => __('Feature Icon 2','dubstrap'),
			"desc" => __('','dubstrap'),
			"id" => $shortname."_fi2",
			"std" => "picture",
			"type" => "text");
			
$options[] = array( "name" => __('Feature Title 2','dubstrap'),
			"desc" => __('','dubstrap'),
			"id" => $shortname."_ft2",
			"std" => "Responsive Web Design",
			"type" => "text");
			
$options[] = array( "name" => __('Feature Text Content 2','dubstrap'),
			"desc" => __('','dubstrap'),
			"id" => $shortname."_ftc2",
			"std" => "Vodio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos quas molestias excepturi sint occaecati cupiditate non provident. Dignissimos ducimus qui blanditiis praesentium voluptatum",
			"type" => "textarea");
			
			
$options[] = array( "name" => __('Feature Icon 3','dubstrap'),
			"desc" => __('','dubstrap'),
			"id" => $shortname."_fi3",
			"std" => "github",
			"type" => "text");
			
$options[] = array( "name" => __('Feature Title 3','dubstrap'),
			"desc" => __('','dubstrap'),
			"id" => $shortname."_ft3",
			"std" => "Web App Development",
			"type" => "text");
			
$options[] = array( "name" => __('Feature Text Content 3','dubstrap'),
			"desc" => __('','dubstrap'),
			"id" => $shortname."_ftc3",
			"std" => "Vodio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos quas molestias excepturi sint occaecati cupiditate non provident. Dignissimos ducimus qui blanditiis praesentium voluptatum",
			"type" => "textarea");
			
$options[] = array( "name" => __('Feature Icon 4','dubstrap'),
			"desc" => __('','dubstrap'),
			"id" => $shortname."_fi4",
			"std" => "refresh",
			"type" => "text");
			
$options[] = array( "name" => __('Feature Title 4','dubstrap'),
			"desc" => __('','dubstrap'),
			"id" => $shortname."_ft4",
			"std" => "Mobile Site Design",
			"type" => "text");
			
$options[] = array( "name" => __('Feature Text Content 4','dubstrap'),
			"desc" => __('','dubstrap'),
			"id" => $shortname."_ftc4",
			"std" => "Vodio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos quas molestias excepturi sint occaecati cupiditate non provident. Dignissimos ducimus qui blanditiis praesentium voluptatum",
			"type" => "textarea");
			
$options[] = array( "name" => __('Feature Icon 5','dubstrap'),
			"desc" => __('','dubstrap'),
			"id" => $shortname."_fi5",
			"std" => "picture",
			"type" => "text");
			
$options[] = array( "name" => __('Feature Title 5','dubstrap'),
			"desc" => __('','dubstrap'),
			"id" => $shortname."_ft5",
			"std" => "Responsive Web Design",
			"type" => "text");
			
$options[] = array( "name" => __('Feature Text Content 5','dubstrap'),
			"desc" => __('','dubstrap'),
			"id" => $shortname."_ftc5",
			"std" => "Vodio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos quas molestias excepturi sint occaecati cupiditate non provident. Dignissimos ducimus qui blanditiis praesentium voluptatum",
			"type" => "textarea");
			
$options[] = array( "name" => __('Feature Icon 6','dubstrap'),
			"desc" => __('','dubstrap'),
			"id" => $shortname."_fi6",
			"std" => "beaker",
			"type" => "text");
			
$options[] = array( "name" => __('Feature Title 6','dubstrap'),
			"desc" => __('','dubstrap'),
			"id" => $shortname."_ft6",
			"std" => "Web App Development",
			"type" => "text");
			
$options[] = array( "name" => __('Feature Text Content 6','dubstrap'),
			"desc" => __('','dubstrap'),
			"id" => $shortname."_ftc6",
			"std" => "Vodio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos quas molestias excepturi sint occaecati cupiditate non provident. Dignissimos ducimus qui blanditiis praesentium voluptatum",
			"type" => "textarea");
		
/* Option Page  - About Page */	
/*
$options[] = array( "name" => __('About Page','dubstrap'),
			"type" => "heading");
		
$options[] = array( "name" => __('Slogan for About Page','dubstrap'),
			"desc" => __('Page Slogan','dubstrap'),
			"id" => $shortname."_sabout",
			"std" => "What Makes Us Magnificent",
			"type" => "text");
		
$options[] = array( "name" => __('Team Member 1 Photo','dubstrap'),
			"desc" => __('','dubstrap'),
			"id" => $shortname."_team1",
			"std" => get_template_directory_uri() . '/img/icon/pic1.png',
			"type" => "upload");
$options[] = array( "name" => __('Team Member 1 Name','dubstrap'),
			"desc" => __('','dubstrap'),
			"id" => $shortname."_name1",
			"std" => 'John Smith Sr',
			"type" => "text");	
$options[] = array( 
			"id" => $shortname."_dsc1",
			"std" => 'Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum.',
			"type" => "textarea");
$options[] = array( 
			"desc" => __('facebook link','dubstrap'),
			"id" => $shortname."_fb1",
			"std" => "http://facebook.com",
			"type" => "text");
$options[] = array( 
			"desc" => __('twitter link','dubstrap'),
			"id" => $shortname."_twitter1",
			"std" => "http://twitter.com",
			"type" => "text");
$options[] = array( 
			"desc" => __('google plus link','dubstrap'),
			"id" => $shortname."_gp1",
			"std" => "http://plus.google.com",
			"type" => "text");
$options[] = array( 
			"desc" => __('email','dubstrap'),
			"id" => $shortname."_mail1",
			"std" => "name@email.com",
			"type" => "text");
			
$options[] = array( "name" => __('Team Member 2 Photo','dubstrap'),
			"desc" => __('','dubstrap'),
			"id" => $shortname."_team2",
			"std" => get_template_directory_uri() . '/img/icon/pic2.png',
			"type" => "upload");
$options[] = array( "name" => __('Team Member 2 Name','dubstrap'),
			"desc" => __('','dubstrap'),
			"id" => $shortname."_name2",
			"std" => 'John Smith Jr',
			"type" => "text");
$options[] = array( 
			"id" => $shortname."_dsc2",
			"std" => 'Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum.',
			"type" => "textarea");
$options[] = array( 
			"desc" => __('facebook link','dubstrap'),
			"id" => $shortname."_fb2",
			"std" => "http://facebook.com",
			"type" => "text");
$options[] = array( 
			"desc" => __('twitter link','dubstrap'),
			"id" => $shortname."_twitter2",
			"std" => "http://twitter.com",
			"type" => "text");
$options[] = array( 
			"desc" => __('google plus link','dubstrap'),
			"id" => $shortname."_gp2",
			"std" => "http://plus.google.com",
			"type" => "text");
$options[] = array( 
			"desc" => __('email','dubstrap'),
			"id" => $shortname."_mail2",
			"std" => "name@email.com",
			"type" => "text");
			
$options[] = array( "name" => __('Team Member 3 Photo','dubstrap'),
			"desc" => __('','dubstrap'),
			"id" => $shortname."_team3",
			"std" => get_template_directory_uri() . '/img/icon/pic3.png',
			"type" => "upload");
$options[] = array( "name" => __('Team Member 3 Name','dubstrap'),
			"desc" => __('','dubstrap'),
			"id" => $shortname."_name3",
			"std" => 'John Doe',
			"type" => "text");
$options[] = array( 
			"id" => $shortname."_dsc3",
			"std" => 'Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum.',
			"type" => "textarea");
$options[] = array( 
			"desc" => __('facebook link','dubstrap'),
			"id" => $shortname."_fb3",
			"std" => "http://facebook.com",
			"type" => "text");
$options[] = array( 
			"desc" => __('twitter link','dubstrap'),
			"id" => $shortname."_twitter3",
			"std" => "http://twitter.com",
			"type" => "text");
$options[] = array( 
			"desc" => __('google plus link','dubstrap'),
			"id" => $shortname."_gp3",
			"std" => "http://plus.google.com",
			"type" => "text");
$options[] = array( 
			"desc" => __('email','dubstrap'),
			"id" => $shortname."_mail3",
			"std" => "name@email.com",
			"type" => "text");
			
$options[] = array( "name" => __('Team Member 4 Photo','dubstrap'),
			"desc" => __('','dubstrap'),
			"id" => $shortname."_team4",
			"std" => get_template_directory_uri() . '/img/icon/pic4.png',
			"type" => "upload");
$options[] = array( "name" => __('Team Member 4 Name','dubstrap'),
			"desc" => __('','dubstrap'),
			"id" => $shortname."_name4",
			"std" => 'Mrs Smith',
			"type" => "text");
$options[] = array( 
			"id" => $shortname."_dsc4",
			"std" => 'Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum.',
			"type" => "textarea");
$options[] = array( 
			"desc" => __('facebook link','dubstrap'),
			"id" => $shortname."_fb4",
			"std" => "http://facebook.com",
			"type" => "text");
$options[] = array( 
			"desc" => __('twitter link','dubstrap'),
			"id" => $shortname."_twitter4",
			"std" => "http://twitter.com",
			"type" => "text");
$options[] = array( 
			"desc" => __('google plus link','dubstrap'),
			"id" => $shortname."_gp4",
			"std" => "http://plus.google.com",
			"type" => "text");
$options[] = array( 
			"desc" => __('email','dubstrap'),
			"id" => $shortname."_mail4",
			"std" => "name@email.com",
			"type" => "text");
		
/* Option Page  - Social Icons */	
/*
$options[] = array( "name" => __('Social Media','dubstrap'),
			"type" => "heading");
			
$options[] = array( "name" => __('Facebook Profile/Page','dubstrap'),
			"desc" => __('input your facebook url profile/page','dubstrap'),
			"id" => $shortname."_socfb",
			"std" => "http://facebook.com/dubstrap",
			"type" => "text");	

$options[] = array( "name" => __('Twitter Profile/Page','dubstrap'),
			"desc" => __('input your twitter name profile/page','dubstrap'),
			"id" => $shortname."_soctwit",
			"std" => "dubstrap",
			"type" => "text");

$options[] = array( "name" => __('Google Plus Profile/Page','dubstrap'),
			"desc" => __('input your google plus url profile/page','dubstrap'),
			"id" => $shortname."_gplus",
			"std" => "",
			"type" => "text");

$options[] = array( "name" => __('Pinterest Profile/Page','dubstrap'),
			"desc" => __('input your pinterest url profile/page','dubstrap'),
			"id" => $shortname."_pinterest",
			"std" => "http://pinterest.com",
			"type" => "text");		

$options[] = array( "name" => __('Linkedin Profile/Page','dubstrap'),
			"desc" => __('input your linkedin url profile/page','dubstrap'),
			"id" => $shortname."_linkedin",
			"std" => "http://linkedin.com",
			"type" => "text");			

			
/* Option Page  - Contact */	
/*
$options[] = array( "name" => __('Contact & Map','dubstrap'),
			"type" => "heading");
			
$options[] = array( "name" => __('Address','dubstrap'),
			"desc" => __('','dubstrap'),
			"id" => $shortname."_mapaddr",
			"std" => "13/2 Elizabeth Street",
			"type" => "text");
			
$options[] = array( "name" => __('Province/State/City','dubstrap'),
			"desc" => __('','dubstrap'),
			"id" => $shortname."_mapprov",
			"std" => "Melbourne VIC 3000",
			"type" => "text");
			
$options[] = array( "name" => __('Country','dubstrap'),
			"desc" => __('','dubstrap'),
			"id" => $shortname."_mapcountry",
			"std" => "Australia",
			"type" => "text");

$options[] = array( "name" => __('Map Style','dubstrap'),
			"desc" => __('','dubstrap'),
			"id" => $shortname."_maptype",
			"std" => "TERRAIN",		
			"type" => "select",
			"options" => $tt_maptype);
			
$options[] = array( "name" => __('Map Zoom Level','dubstrap'),
			"desc" => __('inpute numbers from 1-50','dubstrap'),
			"id" => $shortname."_mapzoom",
			"std" => "18",
			"type" => "select",
			"options" => $tt_zoom);
			 
$options[] = array( "name" => __('Email','dubstrap'),
			"desc" => __('email','dubstrap'),
			"id" => $shortname."_footmail",
			"std" => "your@email.com",
			"type" => "text");
			
$options[] = array( "name" => __('Phone','dubstrap'),
			"desc" => __('phone','dubstrap'),
			"id" => $shortname."_footphone",
			"std" => "+62 (0) 1234 56789",
			"type" => "text");
			
			
/* Option Page  - Footer */	

$options[] = array( "name" => __('Footer','dubstrap'),
			"type" => "heading");
						
$options[] = array( "name" => __('Adress','dubstrap'),
			"desc" => __('Adress','dubstrap'),
			"id" => $shortname."_addr",
			"std" => "PO Box 0000 Proxy, North Pole",
			"type" => "text");
			
			
$options[] = array( "name" => __('Flickr Photo','dubstrap'),
			"desc" => __('input your flickr ID, try to use <a href="http://idgettr.com/">idgettr.com</a> to get your ID','dubstrap'),
			"id" => $shortname."_flickrstr",
			"std" => "52617155@N08",
			"type" => "text");
			
$options[] = array( "name" => __('Footer Copyright Text','dubstrap'),
			"desc" => __('text on footer copyright','dubstrap'),
			"id" => $shortname."_footcopy",
			"std" => "Developed by <a href='http://twitter.com/ryanhidajat'>Ryan Hidajat</a> and <a href='http://dewitech.com'>Dewitech</a> Team",
			"type" => "textarea");


update_option('of_template',$options); 					  
update_option('of_shortname',$shortname);

}
}
?>