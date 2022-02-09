<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 
    $html ='';
	$settings = $this->get_settings_for_display();
	$settings = $this->get_settings();

	$align = $settings['align']; ?>

    <div class="iq-button <?php echo esc_attr($align,'markethon'); ?>">
        <a class="button slide-button" href="<?php echo $settings['link']['url']; ?>"> 
            <?php echo $settings['section_title']; ?>
        </a>

    </div>