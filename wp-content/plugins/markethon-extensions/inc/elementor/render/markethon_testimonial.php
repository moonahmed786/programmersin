<?php
namespace Elementor; 

use Elementor\Plugin;
if ( ! defined( 'ABSPATH' ) ) exit; 
	
    $settings = $this->get_settings();
    $align = $settings['align'];
	$pe_page  = $settings['per_page_post'];
    $order  = $settings['order'];
    
    $args = array(
        'post_type'         => 'testimonial',
        'post_status'       => 'publish',
        'order'             => $order,
        'posts_per_page'    => $pe_page,
        'suppress_filters'  => 0              
    );

    $wp_query = new \WP_Query($args);

    $out = '';

    global $post;

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
	$this->add_render_attribute( 'slider', 'data-loop', $settings['loop'] ); ?> <?php

    if($settings['testimonial_style'] === "1" )  { ?>

	    <div class="iq-testimonials testimonials-style"> 
		    <div  class="owl-carousel" <?php echo $this->get_render_attribute_string( 'slider' ) ?> > <?php 
				if($wp_query->have_posts())  {   

			    	while ( $wp_query->have_posts() )  {

		                $wp_query->the_post();
		                $designation  = get_post_meta( $post->ID, 'markethon_testimonial_designation', true);
		                $company  = get_post_meta( $post->ID, 'markethon_testimonial_company', true);
						$full_image = wp_get_attachment_image_src( get_post_thumbnail_id( $wp_query->ID  ), "full" );	 ?>

						<div class="iq-testimonial-box <?php echo esc_attr__($align, 'markethon');  ?>">
							<?php echo sprintf('<img src="%1$s" class="img-fluid mb-5 img-shap" alt="markethon-user"/>',esc_url($full_image[0],'markethon')); ?>
		                    <p class="description">
		                    	<?php  echo sprintf("%s",get_the_content( $wp_query->ID ) ); ?>
		                    </p>

	                        <h6 class="iq-testimonial-user">
	                        	<span class="iq-name">
	                        		<?php echo sprintf("%s",esc_html__(get_the_title( $wp_query->ID ),'markethon')); ?>,
                                </span>
	                        	<span class="iq-designation">
	                        		<strong class="designation">
	                        			<?php echo  sprintf("%s",esc_html($designation,'markethon')); ?>
	                        	    </strong>
	                        	    <span class="company iq-fw-4 ml-0">
	                        	    	<?php echo  sprintf("%s",esc_html($company,'markethon')); ?>
	                        	    </span>
	                        	</span>
	                        </h6>        
		                </div> <?php 
					}
					wp_reset_postdata();
				} ?>
			</div>	
		</div> <?php 
    } 

    if($settings['testimonial_style'] === "2" )  { ?>

	    <div class="testimonial-block testimonials-style"> 
		    <div  class="owl-carousel" <?php echo $this->get_render_attribute_string( 'slider' ) ?> > <?php 
				if($wp_query->have_posts())  {   

			    	while ( $wp_query->have_posts() )  {

		                $wp_query->the_post();
		                $designation  = get_post_meta( $post->ID, 'markethon_testimonial_designation', true);
		                $company  = get_post_meta( $post->ID, 'markethon_testimonial_company', true);
						$full_image = wp_get_attachment_image_src( get_post_thumbnail_id( $wp_query->ID  ), "full" ); ?>

						<div class="item">
                            <div class="testimonial-box <?php echo esc_attr__($align, 'markethon');  ?>">
                            	<?php echo sprintf('<img src="%1$s" class="img-fluid mb-5 img-shap" alt="markethon-user"/>',esc_url($full_image[0],'markethon')); ?>
                                <p class="description testimonial-info"> 
                                	<?php  echo sprintf("%s",get_the_content( $wp_query->ID ) ); ?>
                                </p>

                                <h6 class="mb-5">
                                	<span class="iq-name">
	                        		    <?php echo sprintf("%s",esc_html__(get_the_title( $wp_query->ID ),'markethon')); ?>,
                                    </span>
                                	<span>
                                		<strong class="designation">
                                		    <?php echo  sprintf("%s",esc_html($designation,'markethon')); ?>
                                		</strong>
                                		<span class="company iq-fw-4 ml-0">
                                		    <?php echo  sprintf("%s",esc_html($company,'markethon')); ?>
                                		</span>
                                	</span>
                                </h6>

                            </div>
                        </div> <?php 
					}
					wp_reset_postdata();
				} ?>
			</div>
		</div> <?php 
    }

?>