<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 

	$settings = $this->get_settings_for_display();
	$settings = $this->get_settings();

	$align = $settings['align'];
	$this->add_render_attribute( 'iq-section', 'class', $align);
	$this->add_render_attribute( 'iq-section', 'class', 'title-box');
	$this->add_render_attribute( 'iq-section', 'class', 'iq-stitle-element');

	$this->add_render_attribute( 'iq-trans', 'class', 'sub_title');

	if($settings['title_transform_style'] == "2") {		
		$this->add_render_attribute( 'iq-trans', 'class', 'text-uppercase');
	}
	

	$this->add_inline_editing_attributes( 'section_title' );
	$this->add_inline_editing_attributes( 'sub_title' );

	if($settings['title_style'] == "2") {
		$this->add_render_attribute( 'iq-section', 'class', 'title-white');			
		$this->add_render_attribute( 'iq-section', 'style', 'color:white;');		
	}  ?>

	<div <?php echo $this->get_render_attribute_string( 'iq-section' ); ?>> <?php 

	    if(!empty($settings['sub_title']))  { ?>
			<span <?php echo $this->get_render_attribute_string( 'iq-trans' ); ?>> <?php echo esc_html($settings['sub_title']); ?> </span> <?php 
		} ?>

		<h2 class="title">  <?php 
		    if(!empty($settings['counter_content']) && !empty($settings['counter_symbol'])) { ?>
				<span class="timer" data-to="<?php echo  $settings['counter_content']; ?>" data-speed="5000"> 
					<?php echo esc_html($settings['counter_content']); ?> 
				</span>
				<sup>
					<?php echo esc_html($settings['counter_symbol']); ?> 
				</sup> <?php 
			} ?> <?php 
			echo esc_html($settings['section_title']); ?> 
		</h2> <?php 

		if(!empty($settings['description'])) { ?>
			<p class="title_desc"> <?php echo $this->parse_text_editor($settings['description']);?> <?php 
		} ?>
		
	</div>