<?php
add_action('wp_enqueue_scripts', 'enqueue_parent_styles');
add_action('wp_enqueue_scripts', 'enqueue_override_styles', 99);
add_action('after_setup_theme', 'wpc_theme_support');
add_action( 'init', 'syndicats_menu' );


function wpc_theme_support()
{
    add_theme_support('custom-logo', array(
        'flex-height' => true,
        'flex-width'  => true,
    ));
}

function enqueue_parent_styles()
{
		wp_enqueue_style('parent-style', get_template_directory_uri().'/style.css');
}
function enqueue_override_styles()
{
		wp_enqueue_style( 'twentytwenty-child-override-styles', get_theme_file_uri( '/assets/css/override.css'), array(), wp_get_theme()->get( 'Version' ));
}

function syndicats_menu() {
    register_nav_menu('syndicats-menu', __( 'Menu syndicats' ));
}

add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);

function my_wp_nav_menu_objects( $items, $args ) {
	
	// loop
	foreach( $items as &$item ) {
		
		// vars
		$description = get_field('description', $item);
		
		
		// append icon
		if( $description ) {
			
			$item->title .= ' <br /><p>'.$description.'</p>';
			
		}
		
	}
	
	// return
	return $items;
	
}

wp_enqueue_script( 'twentytwenty-child-swiper', get_stylesheet_directory_uri() . '/assets/js/swiper.js', array( 'jquery' ), wp_get_theme()->get( 'Version' ), false );
wp_enqueue_style( 'twentytwenty-child-swiper-styles', get_theme_file_uri( '/assets/css/swiper.css'), array(), wp_get_theme()->get( 'Version' ), 'all' );
