<?php  
/** 
* General Theme Functions for Wario Land 4 Mods Site 
* 
* 
**/

remove_action('wp_head', 'wp_generator');

function setup_menus() {

	$locations = array(
        'main_menu' => __('Main Menu','warioland4mods'),
        'footer_links' => __('Footer Links', 'warioland4mods')
	);
	register_nav_menus( $locations );

}

// Hook into the 'init' action

add_action( 'init', 'setup_menus' );

/** Setup Theme Support **/

add_theme_support( 'automatic-feed-links' );
add_theme_support( 'custom-background' );
add_theme_support( 'custom-header' );
add_theme_support('html5', array('gallery','search-form','comment-form','comment-list','caption','widgets'));
add_theme_support('logo');
add_theme_support( 'post-thumbnails' );
add_theme_support( 'title-tag' );


set_post_thumbnail_size( 240, 160, true ); // Normal post thumbnails

function load_styles () {
	wp_register_style( 'wariostyle',  get_template_directory_uri().'/style.css', false, false );
	wp_enqueue_style( 'wariostyle' );

}

// Hook into the 'wp_enqueue_scripts' action
add_action( 'wp_enqueue_scripts', 'load_styles' );

function load_scripts(){
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', array(), true);
}

add_action('wp_enqueue_scripts', 'load_scripts');

/* Add Levels to Home Loop **/

function custom_posts_in_home_loop( $query ) { 
	if ( is_home() && $query->is_main_query() ) $query->set( 'post_type', array( 'mod') ); return $query; 
} 

add_filter( 'pre_get_posts', 'custom_posts_in_home_loop' );

function wpa_cpt_tags( $query ) {
    if ( $query->is_tag() || $query->is_category() && $query->is_main_query() ) {
        $query->set( 'post_type', array( 'post', 'mod' ) );
    }
}
add_action( 'pre_get_posts', 'wpa_cpt_tags' );

// We'll also add categories to the post class

function category_id_class($classes) {
	global $post;
	if(isset($post->ID) &&!empty($post->ID)){
		foreach((get_the_category($post->ID)) as $category)
		$classes [] = 'cat-' . $category->cat_ID . '-id';
	}
		if(is_single()){
			$classes [] = 'clearfix';
		}
		return $classes;
}
add_filter('post_class', 'category_id_class');
add_filter('body_class', 'category_id_class');

/* Youtube Embed Wrap */

function youtube_embedWrapper($html, $url, $attr, $post_id) {

    if (strpos($html, 'youtube') !== false) {
        return '<div class="embed-responsive embed-responsive-16by9">' . $html . '</div>';
    }

    return $html;
}

add_filter('embed_oembed_html', 'youtube_embedWrapper', 10, 4);

function cpg_remove_dashicon() {
    if (current_user_can('update_core') != 'false') { 
        wp_deregister_style('dashicons'); 
    } else { 
        return;
    }
}

add_action( 'wp_enqueue_scripts', 'cpg_remove_dashicon');

// Allow IPS and BPS Files

add_filter( 'upload_mimes', 'my_mime_types', 1, 1 );
function my_mime_types( $mime_types ) {
  $mime_types['ips'] = 'application/octet-stream';     // Adding .ips extension
  $mime_types['bps'] = 'application/octet-stream'; // Adding .bps extension
  return $mime_types;
}