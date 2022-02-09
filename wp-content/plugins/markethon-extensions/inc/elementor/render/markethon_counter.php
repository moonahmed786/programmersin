<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 

    $html = '';
    
	$settings = $this->get_settings_for_display();
	$settings = $this->get_settings();

	$align = $settings['align'];
	
	$this->add_render_attribute( 'icon-back', 'style', 'color:'.$settings['icon_color'].'' );

	if($settings['media_style'] == 'image') {

        if ( ! empty( $settings['image']['url'] ) )  {

            $this->add_render_attribute( 'image', 'src', $settings['image']['url'] );
            $this->add_render_attribute( 'image', 'srcset', $settings['image']['url'] );
            $this->add_render_attribute( 'image', 'alt', Control_Media::get_image_alt( $settings['image'] ) );
            $this->add_render_attribute( 'image', 'title', Control_Media::get_image_title( $settings['image'] ) );
            $image_html = Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image' );
        }
    }

    if($settings['media_style'] == 'icon') {
        $image_html = sprintf('<i aria-hidden="true" class="%1$s" '.$this->get_render_attribute_string('icon-back').'></i>',esc_attr($settings['selected_icon']['value'],'markethon'));
    }  ?>

	<div class="iq-counter  <?php echo esc_attr($align,'markethon'); ?>">

		<div class="iq-icon"> <?php
			echo sprintf($image_html); ?>
		</div>

		<div class="counter-content">
			<p class="iq-counter-info">
				<span class="timer" data-to="<?php echo  sprintf('%1$s',esc_html($settings['content'],'markethon')); ?>" data-speed="5000">
					<?php echo sprintf('%1$s',esc_html($settings['content'],'markethon')) ; ?>
				</span>
				<span class="icon">
					<?php echo sprintf('%1$s',esc_html($settings['content_symbol'],'markethon')); ?>
			    </span>
		    </p>
			<h5><?php echo sprintf('%1$s',esc_html($settings['section_title'],'markethon')); ?></h5>
		</div>

	</div>    