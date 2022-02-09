<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 

  $html = '';    
	
  $list = $this->get_settings_for_display( 'timeline_list' );
  $align = $settings['align'];

  foreach ( $list as $index => $item ) {  ?>
      <div class="time-line">
          <div class="left-detail left-details first-detail float-left">
            <h5 class="title"><?php echo esc_attr($item['timeline_title'], 'markethon'); ?></h5>
            <p class="sub-title"><?php echo esc_attr($item['timeline_sub_title'], 'markethon'); ?></p>
          </div>
          <div class="right-detail  mt-3">
            <h6 class="content title"><?php echo esc_attr($item['timeline_content_title'], 'markethon'); ?></h6>
            <p class="content"><?php echo esc_attr($item['timeline_content'], 'markethon'); ?></p>
          </div>
      </div>
      <div class="clearfix"></div> <?php
  } ?>