<?php
namespace Elementor;

use Elementor\Plugin;
if ( ! defined( 'ABSPATH' ) ) exit; 
	
	$settings = $this->get_settings();
	$pe_page  = $settings['per_page_post'];
	$order  = $settings['order'];
	$category_tab = $settings['category_tab'];

    $args = array(
        'post_type'         => 'portfolio',
        'post_status'       => 'publish',
        'order'             => $order,
        'posts_per_page'    => $pe_page,
        'suppress_filters'  => 0              
	);
	
	$align = $settings['align'];

    $wp_query = new \WP_Query($args);

    $out = '';

    global $post; ?>

<div class="iq-masonry <?php echo esc_attr($align, 'markethon') ?>">  <?php

	if($settings['portfolio_style'] === '1') {

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
		$this->add_render_attribute( 'slider', 'data-margin', $settings['margin']['size'] );	 ?>


        <div  class="blog-carousel owl-carousel" <?php echo $this->get_render_attribute_string( 'slider' ) ?>>
        <?php 

			if($wp_query->have_posts())  {

		    	while ( $wp_query->have_posts() )  {

	    			$wp_query->the_post();
					$full_image = wp_get_attachment_image_src( get_post_thumbnail_id( $wp_query->ID  ), "full" ); 

                    $term_list = wp_get_post_terms(get_the_ID(), 'portfolio-categories');
                            $slugs=array();
                    foreach($term_list as $term)
                        $slugs[]=$term->slug; ?>

					<div class="item">
		                <div class="iq-portfolio">
		                    <?php echo sprintf('<img src="%1$s" alt="markethon-blog"/>',esc_url($full_image[0],'markethon')); ?>
		                    <div class="portfolio-info">
		                        <a href="<?php echo get_permalink(); ?>"><?php echo sprintf("%s",esc_html__(get_the_title( $wp_query->ID ),'markethon')); ?></a>
		                        <a href="<?php echo  sprintf("%s",get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ),'markethon'); ?>" class="text-uppercase text-gray float-right">
									<?php echo  "category" ?>

		                        </a>
		                    </div>
		                </div>
	                </div>

			    	 <?php 
			    }
		    }
		    wp_reset_postdata(); ?>
        </div> <?php 

    } elseif ( $settings['portfolio_style'] === '6' ) { 

    	if($settings['portfolio_masonry_style'] === "2") {
			$masa = 'iq-masonry iq-columns-2';
		}
		if($settings['portfolio_masonry_style'] === "3") {
			$masa = 'iq-masonry iq-columns-3';
		}
		if($settings['portfolio_masonry_style'] === "4") {
			$masa = 'iq-masonry iq-columns-4';
		}
		if($settings['portfolio_masonry_style'] === "5") {
			$masa = 'iq-masonry iq-columns-5';
		}
		if($settings['portfolio_masonry_style'] === "7") {			
			$masa = 'iq-masonry no-padding'; 
		}?>


    <div class="row">
	    <div class="col-sm-12">
	    	<div class="iq-masonry-block"> <?php

	    	    if($category_tab == 'true') { 

		    	    $terms = get_terms( array('taxonomy' => 'portfolio-categories',) ); ?> 

					<div class="isotope-filters isotope-tooltip">
		                <button data-filter="" class="active">All </button> <?php

		                foreach($terms as $term) { ?>
		                	<button data-filter=".<?php echo $term->slug; ?>"> 
		                		<?php echo $term->name; ?>
		                    </button> <?php
		                } ?>

		            </div> <?php 
		        } ?>    
	            
	            <div class="<?php echo esc_attr__($masa, 'markethon') ?>"> <?php

	                while ( $wp_query->have_posts() )  {
		    			$wp_query->the_post();						
					    $term_list = wp_get_post_terms(get_the_ID(), 'portfolio-categories');
					    $slugs = array();

					    $img_id   = get_post_meta( get_the_Id(), 'iq_portfolio_masonry_image', true );
                        $full_img= wp_get_attachment_image_src(  $img_id , "full" );  

	                    foreach($term_list as $term)
	                    $slugs[]=$term->slug; ?>

			                <div class="iq-masonry-item <?php echo implode(' ',$slugs); ?>">
			                    <div class="iq-portfolio"> <?php 
			                        echo sprintf('<img src="%1$s" alt="markethon-blog"/>',esc_url($full_img[0],'markethon')); ?>
				                    <div class="portfolio-info">
				                        <a href="<?php echo get_permalink(); ?>"><?php echo sprintf("%s",esc_html__(get_the_title( $wp_query->ID ),'markethon')); ?></a>
				                        <a href="<?php echo  sprintf("%s",get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ),'markethon'); ?>" class="text-uppercase text-gray float-right">
							                <?php echo $term->name; ?>						              
				                        </a>
				                    </div>
				                </div>
			                </div> <?php
			            // End Foreach    
				    } ?>                       
	            </div>            
	        </div>
	    </div>
    </div> <?php

    }  else { ?>

		<div class="row"> <?php

			if($settings['portfolio_style'] === "2") {
				$col = 'col-lg-12';		
				$isotope = 'isotope iq-columns-2';
			}
			if($settings['portfolio_style'] === "3") {
				$col = 'col-lg-12';		
				$isotope = 'isotope iq-columns-3';
			}
			if($settings['portfolio_style'] === "4") {
				$col = 'col-lg-12';		
				$isotope = 'isotope iq-columns-4';
			}
			if($settings['portfolio_style'] === "5") {
				$col = 'col-lg-12';		
				$isotope = 'isotope iq-columns-5';
			}

			if($settings['portfolio_style'] === "7") {
				$col = 'col-lg-12';		
				$isotope = 'isotope no-padding';
			}

			if($wp_query->have_posts())  {   ?>

				<div class="<?php echo esc_attr__($col, 'markethon') ?>"> <?php

				    if($category_tab == 'true') { 

					    $terms = get_terms( array('taxonomy' => 'portfolio-categories',) ); ?> 

						<div class="isotope-filters isotope-tooltip">
			                <button data-filter="" class="active">All </button> <?php

			                foreach($terms as $term) { ?>
			                	<button data-filter=".<?php echo $term->slug; ?>"> 
			                		<?php echo $term->name; ?>
			                    </button> <?php
			                } ?>

			            </div> <?php
			        } ?>    

		            <div class="<?php echo esc_attr__($isotope, 'markethon') ?>"> <?php

				    	while ( $wp_query->have_posts() )  {

			    			$wp_query->the_post();
							$full_image = wp_get_attachment_image_src( get_post_thumbnail_id( $wp_query->ID  ), "full" ); 

							    $term_list = wp_get_post_terms(get_the_ID(), 'portfolio-categories');

							    $slugs = array();

	                            foreach($term_list as $term)
	                            $slugs[]=$term->slug; ?>

							    <div class="iq-grid-item creative <?php echo implode(' ',$slugs); ?>">
									<div class="iq-portfolio">
					                    <?php echo sprintf('<img src="%1$s" alt="markethon-blog"/>',esc_url($full_image[0],'markethon')); ?>
					                    <div class="portfolio-info">
					                        <a href="<?php echo get_permalink(); ?>"><?php echo sprintf("%s",esc_html__(get_the_title( $wp_query->ID ),'markethon')); ?></a>
					                        <a href="<?php echo  sprintf("%s",get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ),'markethon'); ?>" class="text-uppercase text-gray float-right"> 
								                
								                <?php echo $term->name; ?>
								               
					                        </a>
					                    </div>
					                </div>
					            </div> <?php

			    	    } ?>
				    </div>	
			    </div> <?php	  
	        } 
		    wp_reset_postdata(); ?>
	    </div> 	<?php
    } ?> 
</div>