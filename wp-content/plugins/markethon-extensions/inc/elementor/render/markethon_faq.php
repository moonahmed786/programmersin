<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 

  $html = '';
  $icon = '';
  
  $tabs = $this->get_settings_for_display( 'tabs' );
  $settings = $this->get_settings();
  $id_int = rand(10,100);    
  $align = $settings['align'];

  $this->add_render_attribute( 'iq_class', 'class', 'iq-accordion') ;  
  $this->add_render_attribute( 'iq_class', 'class', $align) ;

  if($settings['has_icon'] == 'yes') {
      $icon .= sprintf('<i aria-hidden="true" class="%1$s active"></i>',esc_attr($settings['active_icon']['value'],'markethon'));
      $icon .= sprintf('<i aria-hidden="true" class="%1$s inactive"></i>',esc_attr($settings['inactive_icon']['value'],'markethon'));
  }

  $this->add_render_attribute( 'iq_class', 'class', 'iq-accordion-round') ;

  if($settings['has_box_shadow'] == 'yes') {                  
     $this->add_render_attribute( 'iq_class', 'class', 'iq-accordion-shadow') ;
  }

  if($settings['title_back_active_color'] != $settings['content_back_color']) {
    $this->add_render_attribute( 'iq_class', 'class', 'iq-accordion-classic') ;    
  } ?>

  <div <?php echo $this->get_render_attribute_string( 'iq_class' ) ?> > <?php 
    $i=1; 
    foreach ( $tabs as $index => $item ) { 

      if($i == 1) { 
        $show = "show"; 
        $style="style=display:block"; 
        $adactive="iq-active";           
      } else { 
        $style=""; 
        $show = ""; 
        $adactive="";
      } ?>
      
      <div class="iq-accordion-block <?php echo esc_attr( $adactive ) . '  '.$i;  ?>">
        <div class="iq-accordion-title"> <?php

            if($settings['has_icon'] == 'yes' && $settings['icon_position'] == 'left') {
              echo '<div class="iq-icon-left">';
              echo $icon;
              echo '</div>';
            } else {
              echo '<div class="iq-icon-right">';
              echo $icon;
              echo '</div>';
            } ?>
            <<?php echo $settings['title_tag']; ?> class="mb-0 accordion-title">         
              <?php echo esc_html__($item['tab_title'],'markethon'); ?>                
            </<?php echo $settings['title_tag']; ?>>
        
        </div>
  
        <div class="iq-accordion-details">        
           <p class="iq-content-text"> <?php echo $this->parse_text_editor($item['tab_content']); ?> </p>
        </div>
      </div> <?php 
      $i++; 
    } ?>
    
  </div>