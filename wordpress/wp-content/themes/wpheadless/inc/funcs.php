<?php

// Распечатка ошибок
function dtf_debug($data)
{
 echo '<pre>' . print_r($data, true) . '</pre>';
}

// Получить ссылку на картинку
function dtf_get_url_img($slug, $size = 'full', $id_page = false)
{
 return wp_get_attachment_image_url(carbon_get_post_meta($id_page ? $id_page : get_the_ID(), $slug), $size);
}

// Получить ссылку на картинку из темы
function dtf_get_url_img_theme($slug, $size = 'full')
{
 return wp_get_attachment_image_url(carbon_get_theme_option($slug), $size);
}