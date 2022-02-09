<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 

    $html ='';
	$settings = $this->get_settings_for_display();
	$settings = $this->get_settings();

    $tabs = $this->get_settings_for_display( 'tabs' );
	$align = $settings['align'];  ?> 

	<div class="main-process position-relative"> <?php
		foreach ( $tabs as $index => $item ){
		    $box_pos = $item['box_align'];  ?>
		    <div class="process-main <?php echo esc_attr($align,'markethon'); ?> <?php echo esc_attr($box_pos,'markethon'); ?>">
		       <div class="process-shap"><span><?php echo $item['pro_number']; ?></span></div>
		       <div class="process-detail">
		          <h2 class="mt-0 iq-fw-8 mb-2"><?php echo $item['pro_title']; ?><span class="text-green">.</span></h2>
		          <p><?php echo $item['pro_content']; ?></p>
		       </div>
		    </div> <?php
		} ?>    
	</div>