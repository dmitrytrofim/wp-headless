<?php

function mytheme_customizer_live_preview()
{
 wp_enqueue_script(
  'mytheme-themecustomizer',
  get_template_directory_uri() . '/assets/js/customizer.js',
  array('jquery', 'customize-preview'),
  null,
  true
 );
}
add_action('customize_preview_init', 'mytheme_customizer_live_preview');

add_action('customize_register', 'my_theme_customize_register');
function my_theme_customize_register($wp_customize)
{
 $wp_customize->add_panel(
  'main_settings',
  array(
   'priority'       => 25,
   'title'          => 'Общие настройки',
   'description'    => '',
  )
 );
}
