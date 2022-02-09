<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 

    $html ='';
	$settings = $this->get_settings_for_display();
	$settings = $this->get_settings();

    $list = $this->get_settings_for_display( 'list' );
	$align = $settings['align'];  ?>

    <div class="iq-works-process"> <?php
        foreach ( $list as $index => $item ){

            if($item['hide_before_effect'] == 'yes') { ?>
                <div class="before-effect"></div> <?php
            } ?>

			<div class="iq-work first-line wow fadeInUp" data-wow-duration="0.5s">
		        <div class="work-content">
		            <div class="iq-work-id"><?php echo $item['step_number']; ?></div>
			        <div class="iq-work-detail"> <?php

					    if(! empty( $item['work_image']['url'])) { ?> 
				    	    <img src="<?php echo esc_attr($item['work_image']['url']); ?>" alt="markethon-image" /> <?php				
					    } ?>

			            <h3 class="title iq-fw-8"><?php echo $item['pro_title']; ?></h3> <?php
			            if(!empty($item['pro_content'])) { ?>
			                <p class="mt-2 mb-0"><?php echo $item['pro_content']; ?></p> <?php
                        } ?>
			        </div> <?php

			        if(!empty($item['work_btn_title'])) { ?>

				        <a class="readmore iq-fw-5" href="<?php echo sprintf('%1$s',esc_html($item['work_link']['url'],'markethon'));?> ">
				        	<?php echo $item['work_btn_title']; 
				        	if(!empty($item['work_right_test'])) { ?>
					        	<span class="float-right">
					        	    <?php echo $item['work_right_test']; ?>
				                </span> <?php
				            } ?>
				        </a> <?php
				    } ?>
				        
		        </div>
		    </div> <?php
		} ?>    
	</div>