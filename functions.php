<?php
define( 'STYLE_DIRECTORY', get_stylesheet_directory_uri() . '/css/' );
define( 'SCRIPT_DIRECTORY', get_stylesheet_directory_uri() . '/scripts/' );
define( 'INCLUDES_DIRECTORY', get_stylesheet_directory() . '/includes/' );

if ( ! isset( $content_width ) ) {
	$content_width = 1024;
}

add_editor_style( '/css/pdxc-main-styles.css' );

/*Actions and Filters*/

add_action( 'wp_enqueue_scripts', 'pdxc_enqueue_styles' );
add_action ('widgets_init', 'pdxc_widget_init');
add_action( 'init', 'pdxc_register_menu' );
add_action( 'init', 'pdxc_add_support' );
add_action( 'after_theme_setup', 'pdxc_add_logo_support' );

add_filter( 'post_thumbnail_html', 'pdxc_remove_img_attr' );

function pdxc_remove_img_attr($html){
	return preg_replace( '/(width|height)="\d+"\s/', "", $html );
}

/*Enqueue Scripts and Styles*/

function pdxc_enqueue_styles() {
	wp_enqueue_style( 'pdxc-main-style', STYLE_DIRECTORY . 'pdxc-main-styles.css' );
	wp_enqueue_style( 'pdxc-nav-style', STYLE_DIRECTORY . 'pdxc-nav-menu.css' );
	wp_enqueue_style( 'pdxc-wp-required', get_stylesheet_directory_uri() . '/style.css');
	wp_enqueue_script('menu-javascript', SCRIPT_DIRECTORY . 'menu.js', array( 'jquery', 'jquery-ui-core' ),'', true );
}

/*Register Menus*/
function pdxc_register_menu() {
	register_nav_menu('pdxc-main-menu',__( 'Main Site Navigation', 'pdxc-framework' ));
}

/*register widget areas*/

function pdxc_widget_init(){
	register_sidebar ( array(
			'name' => 'Primary Sidebar',
			'id' => 'site-sidebar',
			'before_widget' => '<div>',
			'after_widget' => '</div>',
			'before_title' =>'<h2>',
			'after_title' => '</h2>'
	));
}

/*Add Theme Support for WP Features*/
function pdxc_add_support() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-background');
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
}

function pdxc_add_logo_support(){
  add_theme_support( 'custom-logo' );
}

function pdxc_the_custom_logo(){
  /*
   * Echos custom HTML elements. If a change is needed to the branding of the theme,
   * this is where you'll want to do it.
   */
  $logo_id = get_theme_mod( 'custom_logo' );
  $logo = wp_get_attachment_image_src( $logo_id , 'full' );
  if (has_custom_logo() ) {
    echo '<div><img class="site-logo" src="' . esc_url( $logo[0] ) . '"></div>';
    echo '<div><h1 id="site-title"><a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . esc_attr( get_bloginfo( 'name' ) ) . '</a></h1>';
    echo '<h2 id="site-description">' .  esc_attr( get_bloginfo( 'description' ) ) . '</h2></div>';
  } else {
    echo '<h1 id="site-title"><a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . esc_attr( get_bloginfo( 'name' ) ) . '</a></h1>';
    echo '<h2 id="site-description">' .  esc_attr( get_bloginfo( 'description' ) ) . '</h2>';
  }
}

/*Include third party code*/

