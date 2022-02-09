<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 
    
    $html = '';
    
	$settings = $this->get_settings_for_display();
	$settings = $this->get_settings();

	$align = $settings['service_align'];   

    if($settings['service_style'] === "1") {  ?>

		<div class="iq-services iq-element-service <?php echo esc_attr($align,'markethon'); ?>"> 

			<div class="services-info">
	            <div class="service-shap <?php echo esc_attr($align,'markethon'); ?>"> <?php

	                if($settings['service_image_icon'] === '1') { ?> 
	            	    <div class="iq-icon">
					        <?php echo sprintf('<i aria-hidden="true" class="%1$s">&nbsp;</i>',esc_attr($settings['service_selected_icon']['value'],'markethon')); ?>
				        </div> <?php
	            	}    

	            	if($settings['service_image_icon'] === '2') { 

	            	    if(! empty( $settings['service_selected_image']['url'])) { ?> 
		    	            <div class="iq-service-shap">
		    	                <img src="<?php echo esc_attr($settings['service_selected_image']['url']); ?>" alt="markethon-image" /> 
		    	            </div> <?php
		    	        }    
	            	} ?>

	            </div>
	            <h5 class="title float-left mt-4">
	            	<?php echo sprintf('%1$s',esc_html($settings['service_title'],'markethon'));?>
	            </h5>
	            <div class="clearfix"></div>
	            <p class="iq-cont mt-3 mb-0"><?php echo sprintf('%1$s',esc_html($settings['service_description'],'markethon'));?></p>
	        </div> <?php 

	        if(!empty($settings['service_link_title']) && !empty($settings['service_link']) ){ ?>

				<a class="button-link readmore button-info" href="<?php echo sprintf('%1$s',esc_html($settings['service_link']['url'],'markethon'));?> ">
					<?php echo  sprintf('%1$s',esc_html($settings['service_link_title'],'markethon'));?>
					<span class="float-right">
						<?php echo  sprintf('%1$s',esc_html($settings['service_right_test'],'markethon'));?>
					</span>    
				</a> <?php 	
			} ?>

		</div> <?php
	}	
    
    if($settings['service_style'] === "2") {  ?>

		<div class="iq-services-two iq-element-service first-line <?php echo esc_attr($align,'markethon'); ?>"> <?php

	        if($settings['service_image_icon'] === '1') { ?> 
        	    <div class="iq-icon">
			        <?php echo sprintf('<i aria-hidden="true" class="%1$s">&nbsp;</i>',esc_attr($settings['service_selected_icon']['value'],'markethon')); ?>
		        </div> <?php
        	}    

        	if($settings['service_image_icon'] === '2') { 

        	    if(! empty( $settings['service_selected_image']['url'])) { ?> 
    	            <div class="image-box position-relative overflow-hidden">
    	                <img src="<?php echo esc_attr($settings['service_selected_image']['url']); ?>" alt="markethon-image" /> 
    	            </div> <?php
    	        }    
        	} ?>

			
			<div class="offers-content">
				<div class="iq-offers-detail">
					<h4 class="title iq-fw-8">
						<?php echo sprintf('%1$s',esc_html($settings['service_title'],'markethon'));?>
					</h4>
					<p class="iq-cont mt-2 mb-0">
						<?php echo sprintf('%1$s',esc_html($settings['service_description'],'markethon'));?>
					</p>
				</div> <?php

				if(!empty($settings['service_link_title']) && !empty($settings['service_link']) ){ ?>

					<a class="readmore iq-fw-5 <?php echo esc_attr($align,'markethon'); ?>" href="<?php echo sprintf('%1$s',esc_html($settings['service_link']['url'],'markethon'));?> ">
						<?php echo  sprintf('%1$s',esc_html($settings['service_link_title'],'markethon'));?>
					</a> <?php 	
				} ?>

			</div>
		</div><?php
	}	
    ?>