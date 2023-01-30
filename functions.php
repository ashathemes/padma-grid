<?php
/**
 * Padma Grid functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Padma Grid
 */

if ( ! defined( 'PADMA_GRID_VERSION' ) ) {
	$padma_grid_theme = wp_get_theme();
	define( 'PADMA_GRID_VERSION', $padma_grid_theme->get( 'Version' ) );
}


/**
 * Enqueue scripts and styles.
 */
function padma_grid_scripts() {
    wp_enqueue_style( 'padma-grid-parent-style', get_template_directory_uri() . '/style.css',array('bootstrap','slicknav','padma-default-block','padma-style'), '', 'all');
    wp_enqueue_style( 'padma-grid-main-style',get_stylesheet_directory_uri() . '/assets/css/main-style.css',array(), PADMA_GRID_VERSION, 'all');
    wp_enqueue_script( 'masonry', get_stylesheet_directory_uri() . '/assets/js/masonry.pkgd.min.js',array('jquery'), PADMA_GRID_VERSION, true );
    wp_enqueue_script( 'padma-grid-main-js', get_stylesheet_directory_uri() . '/assets/js/padma-grid-main.js',array('jquery','padma-script'), PADMA_GRID_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'padma_grid_scripts' );

/**
 * Custom excerpt length.
 */
function padma_grid_excerpt_length( $length ) {
    if ( is_admin() ) return $length;
    return 19;
}
add_filter( 'excerpt_length', 'padma_grid_excerpt_length', 999 );

/**
 * Custom excerpt More.
 */
function padma_grid_excerpt_more( $more ) {
    if ( is_admin() ) return $more;
    return '.';
}
add_filter( 'excerpt_more', 'padma_grid_excerpt_more' );