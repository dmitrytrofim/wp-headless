<?php

add_action('init', 'register_post_types');

function register_post_types()
{
 register_post_type('services', [
  'label'  => null,
  'labels' => [
   'name'               => 'Услуги', // основное название для типа записи
   'singular_name'      => 'Услуга', // название для одной записи этого типа
   'add_new'            => 'Добавить услугу', // для добавления новой записи
   'add_new_item'       => 'Добавление услуги', // заголовка у вновь создаваемой записи в админ-панели.
   'edit_item'          => 'Редактирование услуги', // для редактирования типа записи
   'new_item'           => 'Новая услуга', // текст новой записи
   'view_item'          => 'Смотреть услугу', // для просмотра записи этого типа.
   'search_items'       => 'Искать услугу', // для поиска по этим типам записи
   'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
   'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
   'parent_item_colon'  => '', // для родителей (у древовидных типов)
   'menu_name'          => 'Услуги', // название меню
  ],
  'description'            => '',
  'public'                 => true,
  'show_in_menu'           => null, // показывать ли в меню админки
  'show_in_rest'        => true, // добавить в REST API. C WP 4.7
  'rest_base'           => null, // $post_type. C WP 4.7
  'menu_position'       => 4,
  'menu_icon'           => 'dashicons-cart',
  'hierarchical'        => false,
  'supports'            => ['title', 'editor', 'thumbnail'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
  'taxonomies'          => [],
  'has_archive'         => true,
  'query_var'           => true,
 ]);
}

