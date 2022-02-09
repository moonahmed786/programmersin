<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 

    $html = '';

	$settings = $this->get_settings();
    $tabs = $this->get_settings_for_display( 'tabs' );
    $align = $settings['align'];

    $active = $settings['active'];
    if($active === "yes") {
        $align .= ' active';
    }

    if ($settings['pricing_style'] == 1) {   ?>
	
        <div  class="iq-markethon-price <?php echo esc_attr__($align,'markethon'); ?>">                
            <div class="iq-price-info">
                <div class="row">

                    <div class="col-lg-2 col-sm-12">
                        <img src="<?php echo esc_attr($settings['pricing_image']['url']); ?>" alt="markethon-image">
                    </div>

                    <div class="col-lg-7 col-sm-12 align-self-center">
                        <div class="pricing-plan">
                            <div class="section-title mb-3">
                                <h3 class="title">
                                    <?php echo $settings['title'];?>
                                </h3>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <ul class="pricing-list"> <?php 
                                        foreach ( $tabs as $index => $item ){ 

                                            if(!empty($item['pricong_icon_color'])) {

                                                $this->add_render_attribute( 'icon-color', 'style', ' color:'.$item['pricong_icon_color'].' ; ' );
                                            } ?>

                                            <li class="list">
                                                <span>                                                    
                                                    <?php echo sprintf('<i aria-hidden="true" class="iq-icon %1$s" '.$this->get_render_attribute_string('icon-color').'></i>',esc_attr($item['pricing_selected_icon']['value'],'markethon')); ?>
                                                    <?php echo $item['tab_title'];?>
                                                </span>
                                            </li> <?php 
                                        } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>                                
                    
                    <div class="col-lg-3 col-sm-12 text-center align-self-center">
                        <h2 class="price"> <?php echo $settings['price'] ;?> 
                            <span><?php echo $settings['duration'] ;?> </span>
                        </h2>
                        <a class="button slide-button" href="<?php echo $settings['link']['url']; ?>"> 
                            <?php echo $settings['button_text']; ?>
                        </a>                        
                    </div>

                </div>
            </div>
        </div> <?php        
    }

    if ($settings['pricing_style'] == 2) {   ?>
        <div class="iq-vertical-price <?php echo esc_attr__($align,'markethon'); ?>">
            <div class="iq-pricing  white-bg">
                <div class="pricing-header mb-5">
                   <h6 class="title iq-fw-6 mb-2"><?php echo $settings['title'];?></h6>
                   <span class="price iq-fw-8"><?php echo $settings['price'] ;?></span>
                   <span class="duration"><?php echo $settings['duration'] ;?> </span>
                </div>
                <ul class="ul-list"><?php 
                    foreach ( $tabs as $index => $item ){ 

                        if(!empty($item['pricong_icon_color'])) {

                            $this->add_render_attribute( 'icon-color', 'style', ' color:'.$item['pricong_icon_color'].' ; ' ); 
                        }  ?>

                        <li class="mb-2">
                            <span>                                                    
                                <?php echo sprintf('<i aria-hidden="true" class="iq-icon %1$s" '.$this->get_render_attribute_string('icon-color').'></i>',esc_attr($item['pricing_selected_icon']['value'],'markethon')); ?>
                                <?php echo $item['tab_title'];?>
                            </span>
                        </li> <?php 
                    } ?>
                </ul>
                <a class="slide-button button mt-5" href="<?php echo $settings['link']['url']; ?>">
                   <?php echo $settings['button_text']; ?>
                </a>
            </div>            
        </div> <?php
    }    

?>