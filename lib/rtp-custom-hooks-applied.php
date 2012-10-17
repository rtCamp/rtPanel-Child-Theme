<?php
/**
 * rtPanel Child Custom Hooks
 *
 * @package rtPanel
 */

/**
 * List of default hooks used by rtPanel ( Can be removed using this function )
 * 
 * @since rtPanelChild 1.0
 */
function rtp_remove_parent_hooks() {
    //remove_action( 'rtp_hook_after_logo', 'rtp_blog_description' ); // Remove Tagline
    //remove_theme_support( 'custom-background' ); // Remove Bckground Option from Admin Menu
    //remove_theme_support( 'custom-header' ); // Remove Header Option from Admin Menu
    
    //remove_action( 'rtp_hook_single_pagination', 'rtp_default_single_pagination' );
    //remove_action( 'rtp_hook_archive_pagination', 'rtp_default_archive_pagination' );
    
    //remove_action( 'rtp_hook_after_header','rtp_default_nav_menu' );
    //remove_action( 'rtp_hook_post_meta_top','rtp_default_post_meta' ); // Post Meta Top
    //remove_action( 'rtp_hook_end_post_title', 'rtp_default_comment_count' ); // Post Meta Top Comment Count
    //remove_action( 'rtp_hook_post_meta_bottom','rtp_default_post_meta' ); // Post Meta Bottom
    //remove_action( 'rtp_hook_begin_post_meta_top', 'rtp_edit_link' );
    //remove_action( 'rtp_hook_comments', 'rtp_default_comments' );
    
    //remove_filter( 'rtp_readmore', 'rtp_readmore_braces' );
    //remove_filter( 'the_excerpt', 'rtp_no_ellipsis' );
    //remove_filter( 'gallery_style', 'rtp_remove_gallery_css' );
    //remove_filter( 'excerpt_length', 'rtp_new_excerpt_length' );
    //remove_filter( 'the_content', 'rt_nofollow' );
    //remove_filter( 'the_excerpt', 'rt_nofollow' );
    //remove_filter( 'get_search_form', 'rtp_custom_search_form' );
}
add_action( 'init', 'rtp_remove_parent_hooks' );

/*
 * List of other default rtpanel hooks that can be used
 */
//add_filter( 'rtp_content_width', create_function( '', 'return 600;' ) ); // Required Filter incase changing the width of the #content
//add_filter( 'rtp_nav_menu_depth', create_function( '', 'return 2;' ) );
//add_filter( 'rtp_header_image_width', create_function( '', 'return 940;' ) );
//add_filter( 'rtp_header_image_height', create_function( '', 'return 100;' ) );
//add_filter( 'rtp_default_image_path', create_function( '', 'return "' . RTP_CHILD_IMG . '/default.png";' ) );
//add_filter( 'rtp_search_placeholder', create_function( '', 'return "' . __( 'Search', 'rtPanel' ) . '";' ) );
//add_filter( 'rtp_author_placeholder', create_function( '', 'return "' . __( 'Name', 'rtPanel' ) . '";' ) );
//add_filter( 'rtp_email_placeholder', create_function( '', 'return "' . __( 'Email', 'rtPanel' ) . '";' ) );
//add_filter( 'rtp_url_placeholder', create_function( '', 'return "' . __( 'Website', 'rtPanel' ) . '";' ) );
//add_filter( 'rtp_comment_placeholder', create_function( '', 'return "' . __( 'Type your comment here', 'rtPanel' ) . '";' ) );
//add_filter( 'rtp_og_content', 'rtp_child_og_content' );
//add_filter( 'rtp_viewport', create_function( '', 'return "width=1024";' ) );

 /**
  * Add any custom scripts/styles using this function.
  * The 'wp_enqueue_scripts' hooks should be used to add both styles and scripts.
  * For more info visit :- http://wpdevel.wordpress.com/2011/12/12/use-wp_enqueue_scripts-not-wp_print_styles-to-enqueue-scripts-and-styles-for-the-frontend/
  * 
  * @since rtPanelChild 1.0
  */
function rtp_custom_scripts_and_styles() {
    
    /* Include Scripts */
    //wp_enqueue_script( 'rtp-custom-script', RTP_CHILD_JS . '/rtp-custom-scripts.js', array( 'jquery' ), '', true );
    
    /* Uncomment the following lines if using the jQuery Cycle Plugin for the slider */
    //wp_enqueue_script( 'jquery-cycle', RTP_CHILD_JS . '/jquery.cycle.js', array( 'jquery' ), '', true );
    //wp_enqueue_script( 'rtp-cycle-slideshow', RTP_CHILD_JS . '/rtp-cycle-slideshow.js', array( 'jquery', 'jquery-cycle' ), '', true );
    
    /* Include styles */
    //wp_enqueue_style( 'rtp-custom-style', RTP_CHILD_CSS . '/custom-style.css' );
}
add_action( 'wp_enqueue_scripts', 'rtp_custom_scripts_and_styles', 11 );

/**
  * Remove rtPanel Default Sidebars using this function.
  * 
  * @since rtPanelChild 1.0
  */
function rtp_remove_parent_sidebar(){
    //unregister_sidebar( 'sidebar-widgets' );
    //unregister_sidebar( 'footer-widgets' );
}
add_action( 'widgets_init', 'rtp_remove_parent_sidebar', 11 );

/**
  * Redirecting empty search to search page instead of blog page
  * 
  * @since rtPanelChild 2.0
  */
function rtp_empty_search_handling( $query_vars ) {
    if( isset( $_GET['s'] ) && empty( $_GET['s'] ) ) {
        $query_vars['s'] = " ";
    }
    return $query_vars;
}
//add_filter( 'request', 'rtp_empty_search_handling' );

/**
  * Show Google Analytics code in Header
  * 
  * @since rtPanelChild 2.0
  */
function rtp_google_analytics() {
    $theme_options = get_option( 'theme_options' );
    if ( !empty( $theme_options['rtp_google_analytics'] ) ) {
        echo $theme_options['rtp_google_analytics'];
    }
}
add_action( 'wp_head', 'rtp_google_analytics', 99 );