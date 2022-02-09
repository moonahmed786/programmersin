<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 

    $html = '';    
	
    $tabs = $this->get_settings_for_display( 'tabs' );    
    $align = $settings['align'];
    $col = $settings['list_style'];

     ?>

    <div class="iq-markethon-list">
        <ul class="list-column-<?php echo esc_attr__($col, 'markethon'); ?>"> <?php 

            foreach ( $tabs as $index => $item ){ 

                if(!empty($item['title_color'])) {
                    $this->add_render_attribute( 'title-color', 'style', 'color:'.$item['title_color'].'' );
                }

                if(!empty($item['tab_title'])) { ?>
                    <li>
                        <i class="<?php echo esc_attr($item['selected_icon']['value'], 'markethon'); ?> icon-text" <?php echo $this->get_render_attribute_string('title-color'); ?>>                        
                        </i><?php echo esc_html($item['tab_title'],'markethon'); ?>
                    </li> <?php
                }  
            } ?>

        </ul>
    </div>