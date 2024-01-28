<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Basis_Tech_2024
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function basistechllc_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'basistechllc_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function basistechllc_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'basistechllc_pingback_header' );

/**
 * Clean up the admin sidebar navigation 
 */
function basistechllc_admin_menu_edits() {
	$remove_menu_items = array(__('Comments'));
	global $menu;
	end ($menu);
	while (prev($menu)){
		$item = explode(' ',$menu[key($menu)][0]);
		if(in_array($item[0] != NULL?$item[0]:"" , $remove_menu_items)){
			unset($menu[key($menu)]);
		}
	}
}
add_action('admin_menu', 'basistechllc_admin_menu_edits');

/**
 * Clean up the admin topbar navigation 
 */
function basistechllc_remove_adminbar_comments(){
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('comments');
	$wp_admin_bar->remove_menu('new-content');
}
add_action( 'wp_before_admin_bar_render', 'basistechllc_remove_adminbar_comments' );

/**
 * Move Yoast to Bottom of edit screen
 */
function basistechllc_yoasttobottom() {
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'basistechllc_yoasttobottom');

/**
 * Remove Yoast metabox awards
 */
function basistechllc_remove_yoast_awards(){
    remove_meta_box('wpseo_meta', 'awardsposts', 'normal');
}
add_action( 'add_meta_boxes', 'basistechllc_remove_yoast_awards', 11 );

/**
 * Login Styles
 */
function basistechllc_login_stylesheet() {
// 	wp_enqueue_style( 'adobe-fonts', 'https://use.typekit.net/uel3kag.css' );
    wp_enqueue_style( 'custom-login', get_template_directory_uri() . '/css/style-login.css', array(), '1.02' );
}
add_action( 'login_enqueue_scripts', 'basistechllc_login_stylesheet' );

/*
 * Load admin CSS
 *
 */
function load_custom_wp_admin_style(){
    wp_register_style( 'custom_wp_admin_css', get_bloginfo('stylesheet_directory') . '/css/style-admin.css', false, '1.0.1' );
    wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action('admin_enqueue_scripts', 'load_custom_wp_admin_style');

/**
 * Login Logo URL
 */
function basistechllc_login_logo_url() {
	return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'basistechllc_login_logo_url' );

/**
 * Add shortcode for current year
 * Usage:  [year]
 */
function basistechllc_year_shortcode() {
	$year = date('Y');
	return $year;
}
add_shortcode('year', 'basistechllc_year_shortcode');

/*
 * Make room for custom MCE settings
 */
function basistechllc_mce_buttons_shift($buttons) {
	array_unshift($buttons, 'styleselect');
	return $buttons;
}
add_filter('mce_buttons_2', 'basistechllc_mce_buttons_shift');

/*
 * Callback function to filter the MCE settings
 */
function basistechllc_my_mce_before_init( $settings ) {
	$style_formats = array(
		array(
			'title' => 'Button',
			'selector' => 'a',
			'classes' => 'button'
		),
	);
    $settings['style_formats'] = json_encode( $style_formats );
    return $settings;
}
add_filter( 'tiny_mce_before_init', 'basistechllc_my_mce_before_init' );

/*
 * Change "more" text on excerpts
 */
function basistechllc_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'basistechllc_excerpt_more');

/*
 * Limit Excerpt characters
 */
function basistechllc_excerpt_length( $length ) {
	return 140;
}
add_filter( 'excerpt_length', 'basistechllc_excerpt_length', 999 );

/* Remove emoji scripts */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 ); 
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' ); 
remove_action( 'wp_print_styles', 'print_emoji_styles' ); 
remove_action( 'admin_print_styles', 'print_emoji_styles' );
remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );

/* Slugify Function */
function slugify($text) {
	// replace non letter or digits by -
	$text = preg_replace('~[^\pL\d]+~u', '-', $text);

	// transliterate
	$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

	// remove unwanted characters
	$text = preg_replace('~[^-\w]+~', '', $text);

	// trim
	$text = trim($text, '-'); 

	// remove duplicate -
	$text = preg_replace('~-+~', '-', $text);

	// lowercase
	$text = strtolower($text);

	if (empty($text)) {
		return 'n-a';
	}

	return $text;
}

/*
 * ACF menu
 */
function basistechllc_acf_show_admin( $show ) {
	$current_user = wp_get_current_user();
    if($current_user->user_nicename == 'sunnywanser') {
		return true;
    }
    else {
		return false;
    }
}
add_filter('acf/settings/show_admin', 'basistechllc_acf_show_admin');

/**
 * Remove Admin Menu Link to Theme Customizer
 */
add_action( 'admin_menu', function () {
    global $submenu;
    if ( isset( $submenu[ 'themes.php' ] ) ) {
        foreach ( $submenu[ 'themes.php' ] as $index => $menu_item ) {
            if ( in_array( 'Customize', $menu_item, true ) || in_array( 'Customizer', $menu_item, true ) || in_array( 'customize', $menu_item, true )) {
                unset( $submenu[ 'themes.php' ][ $index ] );
            }
        }
    }
});

/*
 * remove category prefix from archives
 */
add_filter( 'get_the_archive_title', function ($title) {
	if ( is_category() ) {
	    $title = single_cat_title( '', false );
	} 
	elseif ( is_tag() ) {
	    $title = single_tag_title( '', false );
	} 
	elseif (is_post_type_archive()) {
	    $title = post_type_archive_title( '', false );
	}
	return $title;
});

/*
 * add excerpt to pages
 */
add_post_type_support( 'page', 'excerpt' );

/*
 * custom pagination 
 */
function custom_pagination($numpages = '', $pagerange = '', $paged='') {

    if (empty($pagerange)) {
    	$pagerange = 2;
    }

  /**
   * This first part of our function is a fallback
   * for custom pagination inside a regular loop that
   * uses the global $paged and global $wp_query variables.
   * 
   * We can now override default pagination
   * in our theme, and use this function in default queries
   * and custom queries.
   */
    global $paged;
    if (empty($paged)) {
    	$paged = 1;
    }
    if ($numpages == '') {
    	global $wp_query;
    	$numpages = $wp_query->max_num_pages;
    	if(!$numpages) {
    		$numpages = 1;
    	}
    }

    /** 
    * Construct the pagination arguments to enter 
    * into our paginate_links function. 
    */
    $pagination_args = array(
        'base'            => get_pagenum_link(1) . '%_%',
        'format'          => 'page/%#%',
        'total'           => $numpages,
        'current'         => $paged,
        'show_all'        => False,
        'end_size'        => 1,
        'mid_size'        => $pagerange,
        'prev_next'       => True,
        'prev_text'       => __('<'),
        'next_text'       => __('>'),
        'type'            => 'plain',
        'add_args'        => false,
        'add_fragment'    => ''
    );

    $paginate_links = paginate_links($pagination_args);

    if ($paginate_links) {
    	echo "<nav class='custom-pagination'>";
			echo $paginate_links;
        echo "</nav>";
    }

}