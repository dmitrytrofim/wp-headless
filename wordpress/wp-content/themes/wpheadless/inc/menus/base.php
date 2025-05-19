<?php

add_filter('nav_menu_css_class', 'change_menu_item_css_classes', 10, 4);
function change_menu_item_css_classes($classes, $item, $args, $depth)
{
 if ($args->container_class === 'header__nav') $classes[] = 'header__nav-item';
 if ($args->container_class === 'footer__nav') $classes[] = 'footer__nav-item';
 return $classes;
}

add_filter('nav_menu_item_id', '__return_empty_string');

add_filter('nav_menu_link_attributes', 'filter_nav_menu_link_class', 10, 4);
function filter_nav_menu_link_class($atts, $item, $args, $depth)
{
 $class = '';
 if ($args->container_class === 'header__nav') $class = 'header__nav-link';
 if ($args->container_class === 'footer__nav') $class = 'footer__nav-link';
 $atts['class'] = isset($atts['class']) ? "{$atts['class']} $class" : $class;
 return $atts;
}

add_filter('nav_menu_link_attributes', 'filter_nav_menu_link_current', 10, 4);
function filter_nav_menu_link_current($atts, $item, $args, $depth)
{
 if ($item->current) {
  $class = 'm-current';
  $atts['class'] = isset($atts['class']) ? "{$atts['class']} $class" : $class;
 }
 return $atts;
}
