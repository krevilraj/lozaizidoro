<?php

/**
 * Enqueue scripts and styles.
 */
function lozaizidoro_scripts()
{
  //Bootstrap owl carousel javascript and CSS files
  wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'), '4.6.0', true);
  wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '4.6.0', 'all');
  wp_enqueue_style('fontawesome-css', "https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");


  // Flexslider Javascript and CSS files
  wp_enqueue_style('animate-css', get_template_directory_uri() . '/css/animate.css', array(), '', 'all');
  wp_enqueue_style('hover-css', get_template_directory_uri() . '/css/ihover.css', array(), '', 'all');

  //owl carousel
  wp_enqueue_style('owl-carousel-css', get_template_directory_uri() . '/css/owl.carousel.min.css', array(), '', 'all');
  wp_enqueue_style('owl-carousel-green-css', get_template_directory_uri() . '/css/owl.theme.green.css', array(), '', 'all');
  wp_enqueue_script('owl-carousel-js', get_template_directory_uri() . '/js/owl.carousel.js', array('jquery'), '', true);

  // Js


//  wp_enqueue_script('jquery-slim-js', "https://code.jquery.com/jquery-3.5.1.slim.min.js");
  wp_enqueue_script('wow-js', get_template_directory_uri() . '/js/wow.js', array('jquery'), '1.0.0', true);
  wp_enqueue_script('custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0.0', true);

  // Theme's main stylesheet
  wp_enqueue_style('lozaizidoro-style', get_stylesheet_uri(), array(), filemtime(get_template_directory() . '/style.css'), 'all');
//  wp_enqueue_style('lozaizidoro-custom-style', get_stylesheet_uri(), array(), filemtime(get_template_directory() . '/css/custom.css'), 'all');
//  wp_enqueue_style('lozaizidoro-responsive-style', get_stylesheet_uri(), array(), filemtime(get_template_directory() . '/css/responsive.css'), 'all');

}

add_action('wp_enqueue_scripts', 'lozaizidoro_scripts');

/**
 * Add support for core custom logo.
 *
 * @link https://codex.wordpress.org/Theme_Logo
 */
add_theme_support('custom-logo', array(
  'width' => 362,
  'height' => 105,
  'flex_height' => true,
  'flex_width' => true,
  'class' => 'img-fluid'
));

/*****************Add custom logo class ****************/
add_filter('get_custom_logo', 'add_custom_logo_url');
function add_custom_logo_url()
{
  $custom_logo_id = get_theme_mod('custom_logo');
  $html = sprintf('<a href="%1$s" class="custom-logo-link" rel="home" itemprop="url">%2$s</a>',
    esc_url(site_url()),
    wp_get_attachment_image($custom_logo_id, 'full', false, array(
      'class' => 'img-fluid',
    ))
  );
  return $html;
}


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function lozaizidoro_config()
{

  // This theme uses wp_nav_menu() in two locations.
  register_nav_menus(
    array(
      'lozaizidoro_main_menu' => 'Lozaizidoro Main Menu',
      'lozaizidoro_footer_menu' => 'Lozaizidoro Footer Menu',
    )
  );

  // This theme is WooCommerce compatible, so we're adding support to WooCommerce
  add_theme_support('woocommerce', array(
    'thumbnail_image_width' => 255,
    'single_image_width' => 255,
    'product_grid' => array(
      'default_rows' => 10,
      'min_rows' => 6,
      'max_rows' => 10,
      'default_columns' => 3,
      'min_columns' => 3,
      'max_columns' => 3,
    )
  ));
  add_theme_support('wc-product-gallery-zoom');
  add_theme_support('wc-product-gallery-lightbox');
  add_theme_support('wc-product-gallery-slider');


}