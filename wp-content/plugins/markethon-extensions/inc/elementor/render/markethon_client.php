<?php
namespace Elementor;

use Elementor\Plugin;
if ( ! defined( 'ABSPATH' ) ) exit; 
	
	$settings = $this->get_settings();
    $args = array(
	  'post_type'=> 'client',
	  'post_status' => 'publish',  
	  'suppress_filters'  => 0  
	);
	
	$align = $settings['align'];

	$desk = $settings['desk_number'];
	$lap = $settings['lap_number'];
	$tab = $settings['tab_number'];
	$mob = $settings['mob_number'];		

	$this->add_render_attribute( 'slider', 'data-dots', $settings['dots'] );
	$this->add_render_attribute( 'slider', 'data-nav', $settings['nav-arrow'] );
	$this->add_render_attribute( 'slider', 'data-items', $settings['desk_number'] );
	$this->add_render_attribute( 'slider', 'data-items-laptop', $settings['lap_number'] );
	$this->add_render_attribute( 'slider', 'data-items-tab', $settings['tab_number'] );
	$this->add_render_attribute( 'slider', 'data-items-mobile', $settings['mob_number'] );
	$this->add_render_attribute( 'slider', 'data-items-mobile-sm', $settings['mob_number'] );
	$this->add_render_attribute( 'slider', 'data-autoplay', $settings['autoplay'] );
	$this->add_render_attribute( 'slider', 'data-loop', $settings['loop'] );
	$this->add_render_attribute( 'slider', 'data-margin', $settings['margin']['size'] );

    $wp_query = new \WP_Query($args);

    $out = '';

    global $post; ?>

    <div class="iq-client <?php echo esc_attr($align, 'markethon') ?>"> <?php

		if($settings['client_style'] === "1") { ?>
	 
		    <div  class="owl-carousel" <?php echo $this->get_render_attribute_string( 'slider' ) ?>> <?php 

			    if($wp_query->have_posts())  {
		 	        while ( $wp_query->have_posts() )  {
			 			$wp_query->the_post();
			 			$full_image = wp_get_attachment_image_src( get_post_thumbnail_id( $wp_query->ID  ), "full" );
		                ?>
					 	<div class="item">
					 		<div class="iq-client-img">
					 			<?php echo sprintf('<img src="%1$s" alt="markethon-image"/>',esc_url($full_image[0],'markethon')); ?>
					 		</div>
					 	</div> <?php 
				    }
				    wp_reset_postdata();
			    } ?>
		    </div> <?php

        } elseif($settings['client_style'] === "5"){ ?>
 
		    <div  class="owl-carousel client-box-shodow" <?php echo $this->get_render_attribute_string( 'slider' ) ?>>
		    <?php 

			    if($wp_query->have_posts())  {
		 	        while ( $wp_query->have_posts() )  {
			 			$wp_query->the_post();
			 			$full_image = wp_get_attachment_image_src( get_post_thumbnail_id( $wp_query->ID  ), "full" );
		                ?>
					 	<div class="item">
					 		<div class="iq-client-img">
					 			<?php echo sprintf('<img src="%1$s" alt="markethon-image"/>',esc_url($full_image[0],'markethon')); ?>
					 		</div>
					 	</div> <?php 
				    }
				    wp_reset_postdata();
			    } ?>
		    </div> <?php

        }  else {

			echo '<div class="row">';
				if($settings['client_style'] === "2")
				{
					$col = 'grid col-lg-8';		
				}
				if($settings['client_style'] === "3")
				{
					$col = 'grid col-lg-6';		
				}
				if($settings['client_style'] === "4")
				{
					$col = 'grid col-lg-4';		
				}
					if($wp_query->have_posts())  {

				 	    while ( $wp_query->have_posts() )  {
				 			$wp_query->the_post();
				 			$full_image = wp_get_attachment_image_src( get_post_thumbnail_id( $wp_query->ID  ), "full" );
				            ?>
							<div class="<?php echo esc_attr__($col, 'markethon' ) ?>">
								<div class="iq-client-img">
						 		    <?php echo sprintf('<img src="%1$s" alt="markethon-image"/>',esc_url($full_image[0],'markethon')); ?>
						 	    </div>						
					        </div>
		                    <?php 
		                } 
				    } 
		    echo '</div>';	
	    } ?> 
    </div>