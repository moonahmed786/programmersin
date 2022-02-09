<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 
    
    $html = '';
    
	$settings = $this->get_settings_for_display();
	$settings = $this->get_settings();

    
	if(!empty($settings['play_icon_bg_color'])) {
	    $this->add_render_attribute( 'play-icon-bg', 'style', 'background:'.$settings['play_icon_bg_color'].'; ' );	
	}
	
    if(!empty($settings['play_icon_color'])) {
	    $this->add_render_attribute( 'play-icon-color', 'style', 'color:'.$settings['play_icon_color'].' ;  ' );
    } ?>

	<div class="position-relative"> <?php

        if(! empty( $settings['video_bg_image']['url'])) { ?> 
    	    <img class="img-fluid w-100" src="<?php echo esc_attr($settings['video_bg_image']['url']); ?>" alt="markethon-image" /> <?php
    	} ?>

    	<!-- https://www.youtube.com/watch?v=0O2aH4XLbto -->

        <div class="waves-box">
            <a href="<?php echo esc_url($settings['video_link']['url']); ?>" class="video-play popup-youtube" <?php echo $this->get_render_attribute_string('play-icon-bg'); ?>> <?php 
                echo sprintf('<i aria-hidden="true" class="play-icon %1$s" '.$this->get_render_attribute_string('play-icon-color').'></i>',esc_attr($settings['play_icon']['value'],'markethon')); ?>
            </a>
	        <div class="iq-waves">
	            <div class="waves wave-1"></div>
	            <div class="waves wave-2"></div>
	            <div class="waves wave-3"></div>
	        </div>
        </div>
        <div class="video-people">
	        <div class="scrollme"><?php

		        if(! empty( $settings['video_people1_image']['url'])) { ?> 
		    	    <img class="img-fluid one animateme" src="<?php echo esc_attr($settings['video_people1_image']['url']); ?>"
				    	data-when="span"
				        data-from="1"
				        data-to="0"
				        data-translatex="-300" 
				        alt="markethon-image" /> <?php
		    	} ?>

	        </div>
	        <div class="scrollme"><?php

		        if(! empty( $settings['video_people2_image']['url'])) { ?> 
		    	    <img class="img-fluid two animateme" src="<?php echo esc_attr($settings['video_people2_image']['url']); ?>"
				    	data-when="span"
				        data-from="1"
				        data-to="0"
				        data-translatex="300" 
				        alt="markethon-image" /> <?php
		    	} ?>

	        </div>
	    </div>
    </div>
