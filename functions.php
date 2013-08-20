<?php
/*
Author: Dewitech
URL: htp://dewitech.com

*/
// register an action (can be any suitable action)

// Set content width
if ( ! isset( $content_width ) ) $content_width = 1170;

function dubstrap_setup() {
	/*
	 * Makes dubstrap available for translation.
	 * Translations can be added to the /lang/ directory.
	 */
	load_theme_textdomain( 'dubstrap', get_template_directory() . '/lang' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', 'fonts/genericons.css') );

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// Switches default core markup for search form, comment form, and comments
	// to output valid HTML5.
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

	/*
	 * This theme supports all available post formats by default.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'gallery', 'image'

	) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Navigation Menu', 'dubstrap' ) );

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
	
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 604, 270, true );
}
add_action( 'after_setup_theme', 'dubstrap_setup' );

/* Disable WordPress Admin Bar for all users. */
  show_admin_bar(false);

/* Adds JS and CSS enqueue */
require get_template_directory() . '/includes/css-enqueue.php';
require get_template_directory() . '/includes/js-enqueue.php';
require get_template_directory() . '/includes/thumbnail-size.php';
require get_template_directory() . '/includes/admin/dubstrap-admin-functions.php';
require get_template_directory() . '/includes/admin/dubstrap-theme-settings.php';
require get_template_directory() . '/includes/shortcodes.php';
require get_template_directory() . '/includes/function/shortcodes.php';
require(get_template_directory() . '/includes/custom-widget/ds-search.php');
require(get_template_directory() . '/includes/custom-widget/ds-quote.php');
require(get_template_directory() . '/includes/custom-widget/ds-tabbed.php');
require(get_template_directory() . '/includes/custom-widget/ds-carousel.php');
require(get_template_directory() . '/includes/custom-widget/ds-accordion.php');
require(get_template_directory() . '/includes/custom-widget/ds-skills.php');



/* Nav Menu Walker */
function dubstrap_main_nav() {
	// display the wp3 menu if available
    wp_nav_menu( 
    	array( 
    		'menu' => '', /* menu name */
    		'menu_class' => 'nav navbar-nav',
    		'theme_location' => '', /* where in the theme it's assigned */
    		'container' => 'false', /* container class */
    		'fallback_cb' => '', /* menu fallback */
    		'depth' => '2', /* suppress lower levels for now */
    		'walker' => new description_walker()
    	)
    );
}

// Menu output mods
class description_walker extends Walker_Nav_Menu
{
      function start_el(&$output, $item, $depth, $args)
      {
			global $wp_query;
			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
			
			$class_names = $value = '';
			$class_names = in_array("current_page_item",$item->classes) ? 'active ' : '';
			// If the item has children, add the dropdown class for bootstrap
			if ( $args->has_children ) {
				$class_names = "dropdown ";
			}
			
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$class_names .= join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
			$class_names = ' class="'. esc_attr( $class_names ) . '"';
           
           	$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

           	$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
           	$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
           	$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
           	$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
           	// if the item has children add these two attributes to the anchor tag
           	if ( $args->has_children ) {
				$attributes .= ' class="dropdown-toggle" data-toggle="dropdown"';
			}

            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'>';
            $item_output .= $args->link_before .apply_filters( 'the_title', $item->title, $item->ID );
            $item_output .= $args->link_after;
            // if the item has children add the caret just before closing the anchor tag
            if ( $args->has_children ) {
            	$item_output .= '<b class="caret"></b></a>';
            }
            else{
            	$item_output .= '</a>';
            }
            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
            }
            
        function start_lvl(&$output, $depth) {
            $indent = str_repeat("\t", $depth);
            $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
        }
            
      	function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output )
      	    {
      	        $id_field = $this->db_fields['id'];
      	        if ( is_object( $args[0] ) ) {
      	            $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
      	        }
      	        return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
      	    }
      	
            
}

/*
Registering Widget Sections
------------------------------------------------------------------- */
function dubstrap_widgets_init() {
	register_sidebar( array(
		'name' => 'Page Sidebar',
		'id' => 'sidebar-page',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));

/*	register_sidebar( array(
		'name' => 'About Page Left',
		'id' => 'about-page-left',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));
	
	register_sidebar( array(
		'name' => 'About Page Center',
		'id' => 'about-page-center',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));
	
	register_sidebar( array(
		'name' => 'About Page Right',
		'id' => 'about-page-right',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));
*/
	
	register_sidebar( array(
		'name' => 'Footer Sidebar Left',
		'id' => 'footer-sidebar-left',
		'before_widget' => '<div id="%1$s" class="span3 %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));
	
	register_sidebar( array(
		'name' => 'Footer Sidebar Center 1',
		'id' => 'footer-sidebar-center1',
		'before_widget' => '<div id="%1$s" class="span3 %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));
	
	register_sidebar( array(
		'name' => 'Footer Sidebar Center 2',
		'id' => 'footer-sidebar-center2',
		'before_widget' => '<div id="%1$s" class="span3 %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));
	
	register_sidebar( array(
		'name' => 'Footer Sidebar Right',
		'id' => 'footer-sidebar-right',
		'before_widget' => '<div id="%1$s" class="span3 %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));


}


// Numeric Page Navi
function page_navi($before = '', $after = '') {
	global $wpdb, $wp_query;
	$request = $wp_query->request;
	$posts_per_page = intval(get_query_var('posts_per_page'));
	$paged = intval(get_query_var('paged'));
	$numposts = $wp_query->found_posts;
	$max_page = $wp_query->max_num_pages;
	if ( $numposts <= $posts_per_page ) { return; }
	if(empty($paged) || $paged == 0) {
		$paged = 1;
	}
	$pages_to_show = 7;
	$pages_to_show_minus_1 = $pages_to_show-1;
	$half_page_start = floor($pages_to_show_minus_1/2);
	$half_page_end = ceil($pages_to_show_minus_1/2);
	$start_page = $paged - $half_page_start;
	if($start_page <= 0) {
		$start_page = 1;
	}
	$end_page = $paged + $half_page_end;
	if(($end_page - $start_page) != $pages_to_show_minus_1) {
		$end_page = $start_page + $pages_to_show_minus_1;
	}
	if($end_page > $max_page) {
		$start_page = $max_page - $pages_to_show_minus_1;
		$end_page = $max_page;
	}
	if($start_page <= 0) {
		$start_page = 1;
	}
		
	echo $before.'<div class="pagination"><ul>'."";
	if ($paged > 1) {
		$first_page_text = "<";
		echo '<li class="prev"><a href="'.get_pagenum_link().'" title="First">'.$first_page_text.'</a></li>';
	}
		
	$prevposts = get_previous_posts_link('Previous');
	if($prevposts) { echo '<li>' . $prevposts  . '</li>'; }
	else { echo '<li class="disabled"><a href="#">Previous</a></li>'; }
	
	for($i = $start_page; $i  <= $end_page; $i++) {
		if($i == $paged) {
			echo '<li class="active"><a href="#">'.$i.'</a></li>';
		} else {
			echo '<li><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
		}
	}
	echo '<li class="">';
	next_posts_link('Next');
	echo '</li>';
	if ($end_page < $max_page) {
		$last_page_text = ">";
		echo '<li class="next"><a href="'.get_pagenum_link($max_page).'" title="Last">'.$last_page_text.'</a></li>';
	}
	echo '</ul></div>'.$after."";
}

?>