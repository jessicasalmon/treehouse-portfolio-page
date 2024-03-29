<?php

// these functions add theme support for x
add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );

// this function sets a custom excerpt length for blog posts
function wpt_excerpt_length ($length) {
  return 16;
}
add_filter ( 'excerpt_length', wpt_excerpt_length, 999 );


// this function makes WP recognise our menu
function register_theme_menus() {

  register_nav_menus(
    array(
      'primary-menu' => __( 'Primary Menu' )
    )
  );

}
add_action( 'init', 'register_theme_menus' );


// this function creates a widget
function wpt_create_widget( $name, $id, $description ) {

 register_sidebar(array(
   'name' => __( $name ),
   'id' => $id,
   'description' => __( $description ),
   'before_widget' => '<div class="widget">',
   'after_widget' => '</div>',
   'before_title' => '<h2 class="module-heading">',
   'after_title' => '</h2>'
 ));

}

wpt_create_widget( 'Page Sidebar', 'page', 'Displays on the side of pages with a sidebar' );
wpt_create_widget( 'Blog Sidebar', 'blog', 'Displays on the side of pages in the blog section' );


// this function loads the style (css) files
function wpt_theme_styles() {

  wp_enqueue_style( 'foundation_css', get_template_directory_uri() . '/css/foundation.css' );
  // wp_enqueue_style('normalize_css', get_template_directory_uri() . '/css/normalize.css');
  wp_enqueue_style( 'google_fonts', 'http://fonts.googleapis.com/css?family=Asap:400,700,400italic,700italic' );
  wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css' );

}
add_action( 'wp_enqueue_scripts', 'wpt_theme_styles' );


// this function loads the scripts (js)
function wpt_theme_js() {

  wp_enqueue_script( 'modernizr_js', get_template_directory_uri() . '/js/modernizr.js', '', '', false) ;
  wp_enqueue_script( 'foundation_js', get_template_directory_uri() . '/js/foundation.min.js', array('jquery'), '', true) ;
  wp_enqueue_script( 'main_js', get_template_directory_uri() . '/js/app.js', array('jquery', 'foundation_js'), '', true) ;

}
add_action( 'wp_enqueue_scripts', 'wpt_theme_js' );

?>
