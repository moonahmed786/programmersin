<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 
    
    $html = '';
    
	$settings = $this->get_settings_for_display();
	$settings = $this->get_settings();

	$align = $settings['align'];
	$img_pos = $settings['img_position'];

	 if($settings['iqonic_has_box_shadow'] == 'yes')
    {        
            
       $align .= ' iq-box-shadow';
    } 

	if(!empty($settings['icon_bg_color'])) {
	    $this->add_render_attribute( 'icon-bg', 'style', 'background:'.$settings['icon_bg_color'].'; ' );	
	}
	
    if(!empty($settings['icon_color'])) {
	    $this->add_render_attribute( 'icon-color', 'style', 'color:'.$settings['icon_color'].' ;  ' );
    }

	if($settings['fancy_style'] === '1') { ?> 

		<div class="iq-workinfo fancy-style <?php echo esc_attr($align,'markethon'); ?>"> <?php 

		    if($settings['fancy_image_icon'] === 'icon') { ?> 
		    	
		    	<div class="service-shap">
			    	<div class="iq-icon">
					    <?php echo sprintf('<i aria-hidden="true" class="%1$s" '.$this->get_render_attribute_string('icon-color').'> </i>',esc_attr($settings['selected_icon']['value'],'markethon')); ?>
				    </div> 
				</div> <?php

		    }

		    if($settings['fancy_image_icon'] === 'image') { 

		    	if(! empty( $settings['selected_image']['url'])) { ?> 
		    	    <div class="service-shap">
		    	        <img src="<?php echo esc_attr($settings['selected_image']['url']); ?>" alt="markethon-image" /> 
		    	    </div> <?php
		    	}    
		    } ?>	
			
			<<?php echo $settings['title_tag']; ?> class="title"><?php echo sprintf('%1$s',esc_html($settings['section_title'],'markethon'));?> </<?php echo $settings['title_tag']; ?>>
			<span class="iq-descript"><?php echo sprintf('%1$s',esc_html($settings['description'],'markethon'));?></span>

		</div> <?php 
	}

	if($settings['fancy_style'] === '2') {  
       

        if($img_pos  == "img-left") { ?>
        	
        	<div class="media service-info fancy-style <?php echo esc_attr($align,'markethon'); ?>"> <?php

	            if($settings['fancy_image_icon'] === 'icon') { ?> 
			    	
			    	<div class="service-shap mt-3">
				    	<div class="iq-icon" <?php echo $this->get_render_attribute_string('icon-bg'); ?>>
							<?php echo sprintf('<i aria-hidden="true" class="%1$s" '.$this->get_render_attribute_string('icon-color').'> </i>',esc_attr($settings['selected_icon']['value'],'markethon')); ?>
						</div>
					</div> <?php

			    }

			    if($settings['fancy_image_icon'] === 'image') { 

			    	if(! empty( $settings['selected_image']['url'])) { ?> 
			    	    <div class="service-shap mt-3">
			    	        <img src="<?php echo esc_attr($settings['selected_image']['url']); ?>" alt="markethon-image" /> 
			    	    </div> <?php
			    	}    
			    } ?>	

	            <div class="media-body">
	                <<?php echo $settings['title_tag'] ?> class="title"><?php echo sprintf('%1$s',esc_html($settings['section_title'],'markethon'));?> </<?php echo $settings['title_tag']; ?>>
				    <p class="iq-descript"><?php echo sprintf('%1$s',esc_html($settings['description'],'markethon'));?></p>
	            </div>
	        </div> <?php
        }

        if($img_pos  == "img-right") { ?>

        	<div class="media service-info fancy-style <?php echo esc_attr($align,'markethon'); ?>"> 

        		<div class="media-body mr-3">
	                <<?php echo $settings['title_tag'] ?> class="title"><?php echo sprintf('%1$s',esc_html($settings['section_title'],'markethon'));?> </<?php echo $settings['title_tag']; ?>>
				    <p class="iq-descript"><?php echo sprintf('%1$s',esc_html($settings['description'],'markethon'));?></p>
	            </div> <?php

	            if($settings['fancy_image_icon'] === 'icon') { ?> 
			    	
			    	<div class="service-shap mt-3">
				    	<div class="iq-icon" <?php echo $this->get_render_attribute_string('icon-bg'); ?>>
						    <?php echo sprintf('<i aria-hidden="true" class="%1$s" '.$this->get_render_attribute_string('icon-color').'> </i>',esc_attr($settings['selected_icon']['value'],'markethon')); ?>
					    </div>
					</div> <?php

			    }

			    if($settings['fancy_image_icon'] === 'image') { 

			    	if(! empty( $settings['selected_image']['url'])) { ?> 
			    	    <div class="service-shap mt-3">
			    	        <img src="<?php echo esc_attr($settings['selected_image']['url']); ?>" alt="markethon-image" /> 
			    	    </div> <?php
			    	}    
			    } ?>	

	        </div> <?php
        } 

	
	}

	if($settings['fancy_style'] === '3') {  ?>

		<div class="iq-slolution-details fancy-style <?php echo esc_attr($align,'markethon'); ?>">
            <div class="icon"> <?php

			    if($settings['fancy_image_icon'] === 'icon') { ?>
			    	<div class="iq-icon" <?php echo $this->get_render_attribute_string('icon-bg'); ?>>
						<?php echo sprintf('<i aria-hidden="true" class="%1$s" '.$this->get_render_attribute_string('icon-color').'> </i>',esc_attr($settings['selected_icon']['value'],'markethon')); ?>
					</div> <?php
	            } else {

	            	if(! empty( $settings['selected_image']['url'])) { ?> 
			    	    <div class="service-shap mt-3">
			    	        <img src="<?php echo esc_attr($settings['selected_image']['url']); ?>" alt="markethon-image" /> 
			    	    </div> <?php
			    	}   

	            } ?> 	

            </div>
            <<?php echo $settings['title_tag'] ?> class="title"><?php echo sprintf('%1$s',esc_html($settings['section_title'],'markethon'));?> </<?php echo $settings['title_tag']; ?>>
            <p class="iq-descript mb-0 mt-2"><?php echo sprintf('%1$s',esc_html($settings['description'],'markethon'));?></p>
        </div> <?php

	} 

	if($settings['fancy_style'] === '4') {  ?>


		<div class="iq-fancybox-four seo iq-mt-40 fancy-style <?php echo esc_attr($align,'markethon'); ?>"> <?php

		    if($settings['fancy_image_icon'] === 'icon') { ?>

		    	<div class="icon d-inline-block" <?php echo $this->get_render_attribute_string('icon-bg'); ?>>
		    		<span>
					    <?php echo sprintf('<i aria-hidden="true" class="%1$s" '.$this->get_render_attribute_string('icon-color').'> </i>',esc_attr($settings['selected_icon']['value'],'markethon')); ?>
				    </span>
				</div> <?php

            } else {

            	if(! empty( $settings['selected_image']['url'])) { ?> 
		    	    <div class="icon d-inline-block">
		    	        <img src="<?php echo esc_attr($settings['selected_image']['url']); ?>" alt="markethon-image" /> 
		    	    </div> <?php
		    	}   

            } ?> 	

			<<?php echo $settings['title_tag'] ?> class="title"><?php echo sprintf('%1$s',esc_html($settings['section_title'],'markethon'));?> </<?php echo $settings['title_tag']; ?>>
            <p class="iq-descript mb-0 mt-2"><?php echo sprintf('%1$s',esc_html($settings['description'],'markethon'));?></p>
		</div><?php

	} 
?>