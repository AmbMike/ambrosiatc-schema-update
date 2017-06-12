<?php
function get_file_name(){
    $return = basename($_SERVER['PHP_SELF']);
    $return = preg_replace('/\\.[^.\\s]{3,4}$/', '', $return);
    str_replace('.js','',$return);
    return  $return;
}
/*  Site Constants */
define('IMG_PATH','/images/');
define('JS_PATH','/public/js/singles/');
define('TEMPLATE_NAME',get_file_name());

add_theme_support( 'post-thumbnails' );

add_image_size( 'home-review-thumb', 50, 50, true );
add_image_size( 'mid-sm-thumb', 75, 75, true );
add_image_size( 'sm-thumb', 60, 60, true );

add_action( 'init', 'cptui_register_my_cpts' );
function cptui_register_my_cpts() {
	$labels = array(
		"name" => "Our Team",
		"singular_name" => "Team Member",
		);

	$args = array(
		"labels" => $labels,
		"description" => "",
		"public" => false,
		"show_ui" => true,
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"rewrite" => array( "slug" => "our-team", "with_front" => true ),
		"query_var" => false,
		"menu_icon" => "dashicons-id-alt",
		'publicly_queryable' => false,
		"supports" => array( "title", "trackbacks", "revisions", "post-formats" ),
	);
	register_post_type( "staff", $args );

	$labels = array(
		"name" => "Locations",
		"singular_name" => "Location",
		);

	$args = array(
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"show_ui" => true,
		"has_archive" => true,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "page",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"rewrite" => array( "slug" => "locations", "with_front" => false ),
		"query_var" => true,
		"menu_icon" => "dashicons-location-alt",
		"supports" => array( "title", "trackbacks", "revisions", "post-formats" ),
	);
	register_post_type( "location", $args );

// End of cptui_register_my_cpts()
}

add_image_size( 'location_gallery', 465, 465, true );

function isAnyEmpty() {
	$total = 0;
	$args = func_get_args();
	foreach($args as $arg)
	{
		if(empty($arg)) {
			return true;
		}
	}

	return false;
}


function main_phone_plug($atts, $conent = NULL){
	global $PHONE;
	$atts = shortcode_atts(
		array(
			'number' => $PHONE
		),$atts
	);

	global $PHONE; $PHONE = $atts['number'];
	return $atts['number'];
}

add_shortcode('AMB_MAIN_PHONE','main_phone_plug');


/* Add the ability to paginate single posts by adding category's id */
add_filter('redirect_canonical','pif_disable_redirect_canonical');

function pif_disable_redirect_canonical($redirect_url) {


	if( is_singular() && in_category('news-source') ) {
		$redirect_url = false;
	}
	if( is_singular() && get_the_ID() == 320 ) {
		$redirect_url = false;
	}
	return $redirect_url;
}

function curPageURL() {
	$pageURL = 'http';
	if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	return $pageURL;
}
if (!function_exists('print_data')){
	$error_on = TRUE;
	function print_data($value){
		echo "<pre>";
		print_r($value);
		echo "</pre>";
	}
}
function inc_css(){
	global $custom_css;
	if(isset($custom_css)):
		return '<link rel="stylesheet" href="/css/'.$custom_css.'.css">';
	endif;
}
function page_css(){

	global $page_css;

	if(isset($page_css)):
		return '<link rel="stylesheet" type="text/css" media="all" href="/public/css/pages/'.$page_css.'.css">';
	endif;
}
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

function mg_redirect_attachment_page() {
    if ( is_attachment() ) {
        global $post;
        if ( $post && $post->post_parent ) {
            wp_redirect( esc_url( get_permalink( $post->post_parent ) ), 301 );
            exit;
        } else {
            wp_redirect( esc_url( home_url( '/' ) ), 301 );
            exit;
        }
    }
}
add_action( 'template_redirect', 'mg_redirect_attachment_page' );

