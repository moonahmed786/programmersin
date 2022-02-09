<?php
{
    /**
     * Add custom style for background menu
     * @param  [type] $menu_id    [description]
     * @param  [type] $bg_row_img [description]
     * @return [type]             [description]
     */
    function topseo_custom_megamenu_row_bg($menu_id, $bg_row_img){
      wp_enqueue_style(
    		'topseo-custom-style',
    		get_template_directory_uri() . '/css/custom.css'
    	);
      wp_add_inline_style('topseo-custom-style',
          '.menu-item-'.$menu_id.' .mega-menu .mega-menu-row{ '.
              'background-image: url('. $bg_row_img .');'.
          '}'
      );
      add_action('wp_enqueue_scripts', 'topseo_custom_megamenu_row_bg');
    }


}
 ?>
