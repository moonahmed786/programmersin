<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 

    $html = '';
    
    $progress_bar = $this->get_settings_for_display( 'progress_bar' );
	$settings = $this->get_settings_for_display();
	$settings = $this->get_settings(); 
   
   if($settings['progressbar_style'] === '1') { 

		foreach ($progress_bar as $index => $item ) {  ?>

			<div class="progressbar" data-animate="false">

                <div  class="circle" data-fill-color="#fff" data-percent="<?php  echo $item['tab_score']['size']; ?>">

                    <div><?php echo ($item['tab_score']['size']);echo ($item['tab_score']['unit']); ?> </div>
                    <p class="iq-progress-bar-text"><?php echo sprintf('%1$s',esc_html($item['section_title'],'markethon')) ; ?></p>
                </div>
            </div> <?php 
        }
	}

	if($settings['progressbar_style'] === '2') { ?>

		<div class="iq-progressbar-box"> <?php	

		    foreach ($progress_bar as $index => $item ) { 

		    	if(!empty($item['progressbar_color'])) {

		    	    $this->add_render_attribute( 'iq-bar', 'style', 'background:'.$item['progressbar_color'].'; ' ); 
		    	} ?>

				<div class="iq-progressbar-content">
					<span class="title">
						<?php echo sprintf('%1$s',esc_html($item['section_title'],'markethon')) ; ?>
					</span>
					<span class="progress-value">
						<?php echo ($item['tab_score']['size']);echo ($item['tab_score']['unit']); ?> 
					</span>
					<div class="iq-progress-bar">
						<span class="iq-bar" data-percent="<?php  echo $item['tab_score']['size']; ?>" <?php echo $this->get_render_attribute_string('iq-bar'); ?>>&nbsp;</span>
					</div>
			    </div> <?php	
			} ?>

		</div><?php
	} 
?>