<?php
if( !function_exists( 'roneous_child_enqueue_styles' ) ) {
	function roneous_child_enqueue_styles() {
	    $parent_style = 'roneous-style';
	    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css', 
	    	array( 'roneous-libs', 'roneous-theme-styles' ) 
	    );
	    wp_enqueue_style( 'roneous-child-style', get_stylesheet_directory_uri() . '/style.css',
	        array( $parent_style )
	    );
		wp_register_script( 'trinity-child-scripts', get_stylesheet_directory_uri() . '/assets/js/childscripts.js', array('jquery'), '1.1', false );
		wp_enqueue_script('trinity-child-scripts');
		wp_register_script( 'coates-header-scripts', get_stylesheet_directory_uri() . '/assets/js/coatesheader.js', array('jquery'), '1.1', false );
		wp_enqueue_script('coates-header-scripts');
	}
	add_action( 'wp_enqueue_scripts', 'roneous_child_enqueue_styles' );
}

add_filter( 'black_studio_touch_dropdown_menu_force_ios5', 'my_force_ios5' );
function my_force_ios5( $force ) {
    return true;
	
}

if( !function_exists( 'roneous_child_language_setup' ) ) {
	function roneous_child_language_setup() {
		load_child_theme_textdomain( 'roneous', get_stylesheet_directory() . '/languages' );
	}
	add_action( 'after_setup_theme', 'roneous_child_language_setup' );
}