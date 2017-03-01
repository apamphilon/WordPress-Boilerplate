<?php

// my custom functions

/*
 * Menu Classes
 * add first and last to menu items
 */
function wpdev_first_and_last_menu_class($items) {
    $items[1]->classes[] = 'first';
    $items[count($items)]->classes[] = 'last';
    return $items;
}
add_filter('wp_nav_menu_objects', 'wpdev_first_and_last_menu_class');

/*
 * Excerpt
 * this theme supports excerpts
 */
add_post_type_support( 'page', 'excerpt' );

function new_excerpt_more($more) {
     global $post;
   return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

function new_excerpt_length($length) {
  return 30;
}
add_filter('excerpt_length', 'new_excerpt_length');

// add options page for ACF
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Header',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings'
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings'
	));
}

// remove comments from backend
function remove_menus(){
  remove_menu_page( 'edit-comments.php' );          //Comments
}
add_action( 'admin_menu', 'remove_menus' );

// get parent page id
function get_parent_page_id() {
	global $post;

	if ($post->ancestors) {
		return end($post->ancestors);
	} else {
		return $post->ID;
	}
}

// print_a
function print_a($array) {
    echo '<pre class="debug">';
    print_r($array);
    echo '</pre>';
}

// allow svg support
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

// check for pagination
/**
 * If more than one page exists, return TRUE.
 */
function is_paginated() {
    global $wp_query;
    if ( $wp_query->max_num_pages > 1 ) {
        return true;
    } else {
        return false;
    }
}

/**
 * If last post in query, return TRUE.
 */
function is_last_post($wp_query) {
    $post_current = $wp_query->current_post + 1;
    $post_count = $wp_query->post_count;
    if ( $post_current == $post_count ) {
        return true;
    } else {
        return false;
    }
}

// remove p tag from images
function filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

add_filter('the_content', 'filter_ptags_on_images');

// change search url
function change_search_url_rewrite() {
    if ( is_search() && ! empty( $_GET['s'] ) ) {
        wp_redirect( home_url( "/search/" ) . urlencode( get_query_var( 's' ) ) );
        exit();
    }
}
add_action( 'template_redirect', 'change_search_url_rewrite' );

// acf maps api key
function my_acf_init() {
	acf_update_setting('google_api_key', 'APIKEYHERE');
}

add_action('acf/init', 'my_acf_init');

?>
