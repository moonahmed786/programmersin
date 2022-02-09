<?php if (!defined('FW')) die('Forbidden');
/**
 * @var WP_Post $item
 * @var string $title
 * @var array $attributes
 * @var object $args
 * @var int $depth
 */
$menu_id = $item->ID;
$bg_row = function_exists('fw_ext_mega_menu_get_db_item_option') ? (fw_ext_mega_menu_get_db_item_option($menu_id, 'row')) : '';

if($bg_row['bg'] != ''){
  $bg_row_img = $bg_row['bg']['url'];

  // Call function from megamenu/hooks.php
  topseo_custom_megamenu_row_bg($menu_id, $bg_row_img);
}
{
    $icon_html = '';
    if ((fw()->extensions->get('megamenu')->show_icon()) && ($icon = fw_ext_mega_menu_get_meta($item, 'icon'))){
        $icon_html = '<i class="topseo-icon-primary-menu '. $icon .'"></i> ';
    }
}
// Make a menu WordPress way
echo fw_html_tag('a', $attributes, $args->link_before . $icon_html . $title . $args->link_after);
