<?php
// require get_template_directory() . '/inc/global/vars.php';
// Изменить стили в админке
add_action('admin_head', function () {
 echo '<style>.cf-container__fields {margin: 0 !important;}.block-editor .cf-field {padding-left: 16px !important; padding-right: 16px !important;}.hndle.ui-sortable-handle{font-size: 18px !important;}.cf-container .cf-field{border-width: 1px 1px 0 0 !important;}.cf-container__tabs-list .cf-container__tabs-item--current, .cf-complex__tabs-item.cf-complex__tabs-item--tabbed-horizontal.cf-complex__tabs-item--current,.cf-complex__tabs-item.cf-complex__tabs-item--tabbed-vertical.cf-complex__tabs-item--current{background-color: #e2e4e7 !important;border-bottom-color: transparent !important;}.cf-field__body h3 {margin: 0 !important; font-size: 15px !important;}</style>';
});

// Отключение метабоксов
add_action('add_meta_boxes', 'true_remove_meta_boxes');
function true_remove_meta_boxes()
{
 // Произвольные поля
 remove_meta_box('postcustom', 'post', 'normal');
 remove_meta_box('postcustom', 'page', 'normal');
 // Комментарии
 // remove_meta_box('commentstatusdiv', 'post', 'normal');
 // remove_meta_box('commentsdiv', 'post', 'normal');
 // remove_meta_box('authordiv', 'post', 'normal');
 // remove_meta_box('commentstatusdiv', 'page', 'normal');
 // remove_meta_box('commentsdiv', 'page', 'normal');
 // remove_meta_box('authordiv', 'page', 'normal');
 // Редакции
 // remove_meta_box('revisionsdiv', 'post', 'normal');
 // remove_meta_box('revisionsdiv', 'page', 'normal');
 // Обратные ссылки
 // remove_meta_box('trackbacksdiv', 'post', 'normal');
}

// Очищаем атрибуты `srcset` и `sizes`.
add_filter('wp_get_attachment_image_attributes', 'unset_attach_srcset_attr', 99);
function unset_attach_srcset_attr($attr)
{
 foreach (array('sizes', 'srcset') as $key) {
  if (isset($attr[$key]))
   unset($attr[$key]);
 }
 return $attr;
}

add_filter('upload_mimes', 'svg_upload_allow');
function svg_upload_allow($mimes)
{
 $mimes['svg']  = 'image/svg+xml';
 return $mimes;
}

// Убирает лишние абзацы contact form 7
// add_filter('wpcf7_autop_or_not', '__return_false');

// Отключить архивы
// add_action('parse_query', function ($query) {
//  if (!is_admin()) {
//   if (is_date() || is_category() || is_tag() || is_author() || is_tax()) {
//    wp_redirect(home_url());
//    exit;
//   }
//  }
// });

// Отключить Guttenberg и редактор по названиям страниц
//if (is_admin()) {
// $pagesNames = ['vakansii'];
// $disPages = [get_option('page_on_front')];
// foreach ($pagesNames as $itemPage) {
//  $page = get_page_by_path($itemPage);
//  $id = $page->ID;
//  $disPages[] = $id;
// }
// add_filter('use_block_editor_for_post', 'disable_block_editor_for_page_ids', 10, 2);
// function disable_block_editor_for_page_ids($use_block_editor, $post)
// {
//  global $disPages;
//  if (in_array($post->ID, [...$disPages])) {
//   return false;
//  }
//  if ($post->post_type === 'post') {
//   return false;
//  }
//  return $use_block_editor;
// }
// add_action('admin_head', 'disable_wp_editor');
// function disable_wp_editor()
// {
//  global $disPages;
//  if (in_array(get_the_ID(), [...$disPages])) {
//   remove_post_type_support('page', 'editor');
//  }
// }
//}

// Отключить Gutenberg на определённых шаблонах страниц
// add_filter('use_block_editor_for_post_type', 'truemisha_no_gutenberg_for_page_template', 25);
// function truemisha_no_gutenberg_for_page_template($can_edit)
// {
//  if (empty($_GET['post'])) {
//   return $can_edit;
//  }
//  $excluded_templates = array(
//   'templates/works-page.php',
//  );
//  $template = get_page_template_slug(intval($_GET['post']));
//  if (in_array($template, $excluded_templates)) {
//   $can_edit = false;
//  }
//  return $can_edit;
// }
