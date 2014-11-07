<?php
	
	// Add RSS links to <head> section
	add_theme_support( 'automatic-feed-links' );
	
	// Load jQuery
	function load_jQ() {
        wp_deregister_script('jquery');
        wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"), '', '', true);
        wp_enqueue_script('jquery');
    }    
    add_action('wp_enqueue_scripts', 'load_jQ');

	// Clean up the <head>
	function tidy_head() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
        global $wp_widget_factory;  
        remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );  
    }
    add_action('init', 'tidy_head');
    remove_action('wp_head', 'wp_generator');
    
    // Add widgetizable Sidebar
    if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Sidebar Widgets',
    		'id'   => 'sidebar-widgets',
    		'description'   => 'These are widgets for the sidebar.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
    }

    // Add main nav menu
    function register_main_nav_menu() {
        register_nav_menu('primary', 'Main Navigation Menu');
    }
    add_action( 'init', 'register_main_nav_menu' );

    // Add Editor Styles
    add_editor_style('/admin/admin-style.css');

    // Custom Excerpt
    function custom_Excerpt($more) {
        global $post;
        return '... <a href="'. get_permalink($post->ID) . '" class="more-link">read more →</a>';
    }
    add_filter('excerpt_more', 'custom_Excerpt');


    // If no more tag use excerpt
    function excerpt_or_more(){
        $ismore = @strpos( $post->post_content, '<!--more-->');
        return ($ismore) ? the_content() : the_excerpt();
    }

?>