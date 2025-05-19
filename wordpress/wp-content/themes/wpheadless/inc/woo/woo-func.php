<?php
function wpheadless_add_woocommerce_support()
{
 add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'wpheadless_add_woocommerce_support');

add_action('after_setup_theme', 'yourtheme_setup');
function yourtheme_setup()
{
 add_theme_support('wc-product-gallery-zoom');
 add_theme_support('wc-product-gallery-lightbox');
 add_theme_support('wc-product-gallery-slider');
}

add_filter('woocommerce_enqueue_styles', 'jk_dequeue_styles');
function jk_dequeue_styles($enqueue_styles)
{
 unset($enqueue_styles['woocommerce-general']);
 unset($enqueue_styles['woocommerce-layout']);
 // unset($enqueue_styles['woocommerce-smallscreen']);
 return $enqueue_styles;
}

// Структура постоянных ссылок
function mihdan_woocommerce_permalinks($flash = false)
{
 $terms = get_terms(
  array(
   'taxonomy'   => 'product_cat',
   'post_type'  => 'product',
   'hide_empty' => false,
  )
 );
 if ($terms && !is_wp_error($terms)) {
  $siteurl = esc_url(home_url('/'));
  foreach ($terms as $term) {
   $term_slug = $term->slug;
   $baseterm  = str_replace($siteurl, '', get_term_link($term->term_id, 'product_cat'));
   add_rewrite_rule($baseterm . '?$', 'index.php?product_cat=' . $term_slug, 'top');
   add_rewrite_rule($baseterm . 'page/([0-9]{1,})/?$', 'index.php?product_cat=' . $term_slug . '&paged=$matches[1]', 'top');
   add_rewrite_rule($baseterm . '(?:feed/)?(feed|rdf|rss|rss2|atom)/?$', 'index.php?product_cat=' . $term_slug . '&feed=$matches[1]', 'top');
  }
 }
 if (true === $flash) {
  flush_rewrite_rules(false);
 }
}
add_filter('init', 'mihdan_woocommerce_permalinks');
function mihdan_woocommerce_permalinks_flush($term_id, $taxonomy)
{
 if ('product_cat' === $taxonomy) {
  mihdan_woocommerce_permalinks(true);
 }
}
add_action('create_term', 'mihdan_woocommerce_permalinks_flush', 10, 2);
function mihdan_woocommerce_fixed_category_permalink($url, $term, $taxonomy)
{
 if ('product_cat' === $taxonomy) {
  return str_replace('product-category/', 'shop/', $url);
 }
 return $url;
}
add_filter('term_link', 'mihdan_woocommerce_fixed_category_permalink', 10, 3);
