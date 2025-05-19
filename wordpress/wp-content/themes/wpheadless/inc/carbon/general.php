<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

$basic_options_container = Container::make('theme_options', 'Общие настройки')
 ->set_page_menu_title('Раздел настроек')
 ->set_page_menu_position(3)
 ->add_fields(array(
  Field::make('text', 'crb_gen_address', 'Адрес'),
 ));

// Container::make('theme_options', '')
//  ->set_page_parent($basic_options_container) 
//  ->add_fields(array(
//   Field::make('text', 'crb_', ''),
//  ));
