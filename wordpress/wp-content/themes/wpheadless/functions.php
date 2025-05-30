<?php

if (!defined('_S_VERSION')) {
 define('_S_VERSION', '100');
}

add_action('template_redirect', 'redirect_all_pages_to_home');
function redirect_all_pages_to_home()
{
 if (!is_front_page()) {
  wp_redirect(home_url());
  exit;
 }
}


function wpheadless_setup()
{
 load_theme_textdomain('wpheadless', get_template_directory() . '/languages');

 add_theme_support('automatic-feed-links');
 add_theme_support('title-tag');
 add_theme_support('post-thumbnails');
 add_theme_support('customize-selective-refresh-widgets');
 add_theme_support('menus');

 add_theme_support(
  'html5',
  array(
   'search-form',
   'comment-form',
   'comment-list',
   'gallery',
   'caption',
   'style',
   'script',
  )
 );

 // add_theme_support(
 //  'custom-logo',
 //  array(
 //   'height'      => 250,
 //   'width'       => 250,
 //   'flex-width'  => true,
 //   'flex-height' => true,
 //  )
 // );

 // add_theme_support(
 //  'custom-background',
 //  apply_filters(
 //   'dtagroprom_custom_background_args',
 //   array(
 //    'default-color' => 'ffffff',
 //    'default-image' => '',
 //   )
 //  )
 // );

 // register_nav_menus(
 //  array(
 //   'header_menu' => 'Меню в шапке',
 //   'footer_menu' => 'Меню в подвале'
 //  )
 // );
}

add_action('after_setup_theme', 'wpheadless_setup');

// function wpheadless_widgets_init()
// {
//  register_sidebar(
//   array(
//    'name'          => '',
//    'id'            => 'sidebar-1',
//    'description'   => esc_html__('Add widgets here.', 'wpheadless'),
//    'before_widget' => '<section id="%1$s" class="widget %2$s">',
//    'after_widget'  => '</section>',
//    'before_title'  => '<h2 class="widget-title">',
//    'after_title'   => '</h2>',
//   )
//  );
// }
// add_action('widgets_init', 'wpheadless_widgets_init');

function wpheadless_scripts()
{
 // wp_enqueue_style('wpheadless-google-fonts', '', array(), null);
 // wp_enqueue_style('wpheadless-style', '', array(), null);
 wp_enqueue_style('wpheadless-style', get_stylesheet_uri(), array(), false);
 // wp_enqueue_style('wpheadless-style-main', get_template_directory_uri() . '/assets/css/style.min.css', array(), null);
 wp_enqueue_style('wpheadless-style-custom', get_template_directory_uri() . '/assets/css/custom.css', array(), false);

 // wp_enqueue_script('jquery');
 // wp_enqueue_script('wpheadless-script', get_template_directory_uri() . '/assets/js/', array(), false, true);
 // wp_enqueue_script('wpheadless-script', '', array(), null, true);
 // wp_enqueue_script('wpheadless-script-main', get_template_directory_uri() . '/assets/js/app.min.js', array(), null, true);
 wp_enqueue_script('wpheadless-script-custom', get_template_directory_uri() . '/assets/js/custom.js', array(), false, true);
 // wp_localize_script(
 //  'wpheadless-script-custom', 
 //  'my_ajax_object',
 //  array('ajax_url' => admin_url('admin-ajax.php'))
 // );
 //  wp_add_inline_script('wpheadless-script-custom', 'const WPSCRIPT = ' . json_encode([
 //  'ajaxUrl' => admin_url('admin-ajax.php'),
 //  'param' => 'value',
 //  ]), 'before');
}
add_action('wp_enqueue_scripts', 'wpheadless_scripts');

add_action('carbon_fields_register_fields', 'crb_register_custom_fields');
function crb_register_custom_fields()
{
 require_once get_template_directory() . '/inc/carbon/general.php';
 // require_once get_template_directory() . '/inc/carbon';
}
add_action('after_setup_theme', 'crb_load');
function crb_load()
{
 require_once('vendor/autoload.php');
 \Carbon_Fields\Carbon_Fields::boot();
}

require_once get_template_directory() . '/inc/funcs.php';
require_once get_template_directory() . '/inc/options.php';
// require_once get_template_directory() . '/inc/customizer.php';
require_once get_template_directory() . '/inc/hooks.php';
// require_once get_template_directory() . '/inc/shortcodes.php';
// require_once get_template_directory() . '/inc/post-types/';
// require_once get_template_directory() . '/inc/menus/base.php';
if (class_exists('WooCommerce')) {
 require_once get_template_directory() . '/inc/woo/woo-func.php';
 require_once get_template_directory() . '/inc/woo/woo-hooks.php';
}
// require_once get_template_directory() . '/inc/ajax';
