<?php
add_action( 'wp_enqueue_scripts', 'markethon_enqueue_styles' ,99);

function markethon_enqueue_styles() {
	    $parent_style = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
    wp_enqueue_style( 'parent-style', get_stylesheet_directory_uri() . '/style.css'); 
    wp_enqueue_style( 'child-style',get_stylesheet_directory_uri() . '/style.css');
}

/**
  * Set up My Child Theme's textdomain.
  *
  * Declare textdomain for this child theme.
  * Translations can be added to the /languages/ directory.
  */
function markethon_theme_setup() {
    load_child_theme_textdomain( 'markethon', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'markethon_theme_setup' );
?>