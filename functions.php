<?php
/* ================================= !CONTENTS

    !BASE ACTIONS         (Load jQuery, etc)
    !THEME SUPPORT        (Thumbnails, rss, etc)
    !ROLES                (Capabilities, etc)
    !MENUS
    !SIDEBARS
    !CUSTOM POST TYPES
    !HELPER FUNCTIONS     (Custom Excerpts, etc)


=========================================== */


    /* ================================ !BASE ACTIONS */	
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





    /* ================================ !THEME SUPPORT */
    // Add Editor Styles
    add_editor_style('/admin/admin-style.css');

    // Add post thumbnail support
    add_theme_support('post-thumbnails');

    // Add RSS links to <head> section
    add_theme_support( 'automatic-feed-links' );





    /* ================================ !ROLE CAPABILITIES */
    // Add Editor Role Capabilities 
    function add_theme_caps() {
        $role = get_role( 'editor' );
        $role->add_cap( 'edit_theme_options' ); 
    }
    add_action( 'admin_init', 'add_theme_caps');

    // Remove unneeded menus for Editors
    function ed_remove_menus() {

        global $user_ID;
        global $submenu;

        if ( current_user_can( 'editor' ) ) {
            remove_menu_page('tools.php');
            remove_menu_page('profile.php');
            // remove_menu_page('edit-comments.php');

            unset($submenu['themes.php'][5]);                           //Appearence -> Themes
            unset($submenu['themes.php'][6]);                           //Appearence -> Customise
            unset($submenu['themes.php'][7]);                           //Appearence -> Customise

        }
    }

    add_action( 'admin_init', 'ed_remove_menus' );

    function remove_admin_bar_items( $wp_admin_bar ) {
        $wp_admin_bar->remove_node( 'wp-logo' );
        $wp_admin_bar->remove_node( 'customize' );
        $wp_admin_bar->remove_node( 'themes' );
        $wp_admin_bar->remove_node( 'comments' );
        $wp_admin_bar->remove_node( 'widgets' );
    }

    add_action( 'admin_bar_menu', 'remove_admin_bar_items', 999 );






    //* ================================ !MENUS */
    // Add Menus
    function register_main_nav_menu() {
        register_nav_menu('primary', 'Main Navigation Menu');
    }
    add_action( 'init', 'register_main_nav_menu' );






    /* ================================ !SIDEBARS */
    // Add Sidebars
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




    /* ================================ !CUSTOM POST TYPES */
    // Register Post Types
    if ( ! function_exists('custom_post_type') ) {

        
        function custom_post_type() {

            $labels = array(
                'name'                => 'Custom Posts',                        // change to appropriate name
                'singular_name'       => 'Custom Post',                         // change to appropriate name
                'menu_name'           => 'Custom Posts',                        // change to appropriate name
                'parent_item_colon'   => 'Custom Posts',                        // change to appropriate name
                'all_items'           => 'All Custom Posts',                    // change to appropriate name
                'view_item'           => 'View Custom Post',                    // change to appropriate name
                'add_new_item'        => 'Add New Custom Post',                 // change to appropriate name
                'add_new'             => 'Add New',
                'edit_item'           => 'Edit Custom Post',                    // change to appropriate name
                'update_item'         => 'Update Custom Post',                  // change to appropriate name
                'search_items'        => 'Search Custom Posts',                 // change to appropriate name
                'not_found'           => 'Not found',
                'not_found_in_trash'  => 'Not found in Trash',
            );
            $args = array(
                'label'               => 'custom-post',                         // change to appropriate slug
                'description'         => 'For New and Previous Custom Posts',   // change to appropriate name
                'labels'              => $labels,
                'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields', ),
                'hierarchical'        => false,
                'public'              => true,
                'show_ui'             => true,
                'show_in_menu'        => true,
                'rewrite' => array( 'slug' => '/custom-post'),                  // change to appropriate slug
                'show_in_nav_menus'   => true,
                'show_in_admin_bar'   => true,
                'menu_position'       => 5,
                'menu_icon'           => 'dashicons-media-interactive',         // change to appropriate icon
                'can_export'          => true,
                'has_archive'         => true,
                'exclude_from_search' => false,
                'publicly_queryable'  => true,
                'capability_type'     => 'page',
            );
            register_post_type( 'custom-post', $args );                         // change to appropriate slug

        }

        add_action( 'init', 'custom_post_type', 0 );

    }





    /* ================================ !HELPER FUNCTIONS */
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