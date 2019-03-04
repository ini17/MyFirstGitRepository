<?php 
add_action( 'wp_enqueue_scripts', 'buildoor_theme_css',20);
function buildoor_theme_css() {
	wp_enqueue_style( 'buildoor-parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'buildoor-style',get_stylesheet_directory_uri() . '/css/buildoor.css');
  
}