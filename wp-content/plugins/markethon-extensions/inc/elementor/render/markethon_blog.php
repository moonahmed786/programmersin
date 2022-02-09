<?php
namespace Elementor;

use Elementor\Plugin;
if ( ! defined( 'ABSPATH' ) ) exit; 
	
	$settings = $this->get_settings();
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $pe_page  = $settings['per_page_post'];
    $order  = $settings['order'];

    $args = array(
        'post_type'         => 'post',
        'post_status'       => 'publish',
        'posts_per_page'    => $pe_page,
        'paged'             => $paged,
        'order'             => $order,
        'suppress_filters'  => 0              
	);

    global $post;

	$general_img = $settings['general_img'];
	$readmore_switch = $settings['readmore_switch'];
	$metabox_switch = $settings['metabox_switch'];
	$align = $settings['align'];
	$metabox_align = $settings['metabox_align'];

	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $wp_query = new \WP_Query($args);

    $html = '';

    $out = '';  ?>
    
    <div class="iq-blog-style <?php echo esc_attr($align, 'markethon') ?>">  <?php

		if($settings['blog_style'] === '1') {

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
			$this->add_render_attribute( 'slider', 'data-loop', $settings['loop'] );	 ?>
 
	        <div  class="blog-carousel owl-carousel" <?php echo $this->get_render_attribute_string( 'slider' ) ?>> <?php 

				if($wp_query->have_posts())  {

			    	while ( $wp_query->have_posts() )  {

			    		$wp_query->the_post();
					    $full_image = wp_get_attachment_image_src( get_post_thumbnail_id( $wp_query->ID  ), "full" ); ?>

				    	<div class="iq-blog-box">

					    		<div class="iq-blog-image"> <?php
					    		    if($general_img == 'true') {
					    			    echo sprintf('<img src="%1$s" alt="markethon-blog"/>',esc_url($full_image[0],'markethon'));
					    			}

					    			if($metabox_switch == 'true') { ?>
						    			<div class="iq-blog-meta <?php echo esc_attr($metabox_align, 'markethon') ?>">
											<ul class="list-inline">
												<?php 											
												$archive_year  = get_the_time('Y',$post->post_id);
												$archive_month = get_the_time('m',$post->post_id); 
												$archive_day   = get_the_time('d',$post->post_id);
												$date=date_create($post->post_date); ?>

												<li class="list-inline-item">	
													<i class="fa fa-calendar mr-2" aria-hidden="true"></i>
													<?php echo sprintf("%s",markethon_time_link()); ?>	
												</li>

										
												<li class="list-inline-item">
												    <a href="<?php echo  sprintf("%s",get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ),'markethon'); ?>" class="iq-user">
												        <i class="fa fa-user mr-2" aria-hidden="true"></i>
													    <?php echo  sprintf("%s ",get_the_author(),'markethon'); ?>
												    </a>
											    </li>
											</ul>
									    </div> <?php
									} ?>    
					    		</div>
					    		
					    		<div class="iq-blog-detail"> 
					    		
									<div class="blog-title">
										<a class="button-link" href="<?php echo sprintf("%s",esc_url(get_permalink($wp_query->ID)));?>">
					    			        <h5><?php echo sprintf("%s",esc_html__(get_the_title( $wp_query->ID ),'markethon')); ?></h5>
					    			    </a>
					    			</div>
					    			
					    			<div class="blog-content">
					    			    <p><?php  echo sprintf("%s",get_the_excerpt( $wp_query->ID ) ); ?></p>
					    			</div>  <?php  

                                    if($readmore_switch == 'true'){ ?>
						                <div class="blog-button">
											<?php 
											if(!empty($markethon_option['blog_btn']))
											{ 
											?>
											<a class="button-link" href="<?php the_permalink();?>"><?php echo esc_attr($markethon_option['blog_btn']); ?><i class="fa fa-angle-right" aria-hidden="true"></i></a>
											<?php 
											}
											else
											{ 
											?>
											<a class="button-link" href="<?php the_permalink();?>"><?php esc_html_e('Read More', 'markethon'); ?><i class="fa fa-angle-right" aria-hidden="true"></i></a>
											<?php 
											}
											?>
										</div> <?php 
									} ?>	
		    			
		    		            </div>

		    	            </div><?php 
			        }
		        }

		        wp_reset_postdata();  ?>
	        </div>  <?php 

	    } else {

			echo '<div class="row">';
				if($settings['blog_style'] === "2") {
					$col = 'col-lg-12';		
				}
				if($settings['blog_style'] === "3") {
					$col = 'col-lg-6 col-md-6 ';		
				}
				if($settings['blog_style'] === "4") {
					$col = 'col-lg-4 col-md-6';		
				}

				if($wp_query->have_posts()) {   

			    	while ( $wp_query->have_posts() )  {

		    			$wp_query->the_post();
						$full_image = wp_get_attachment_image_src( get_post_thumbnail_id( $wp_query->ID  ), "full" ); ?>

						<div class="<?php echo esc_attr__($col, 'markethon') ?>">
							<div class="iq-blog-box">

					    		<div class="iq-blog-image">
					    			<?php echo sprintf('<img src="%1$s" alt="markethon-blog"/>',esc_url($full_image[0],'markethon')); 

					    			if($metabox_switch == 'true') { ?>

						    			<div class="iq-blog-meta <?php echo esc_attr($metabox_align, 'markethon') ?>">
											<ul class="list-inline"> <?php
												$archive_year  = get_the_time('Y',$post->post_id);
												$archive_month = get_the_time('m',$post->post_id); 
												$archive_day   = get_the_time('d',$post->post_id);
												$date=date_create($post->post_date); ?>
												<li class="list-inline-item">	
													<i class="fa fa-calendar mr-2" aria-hidden="true"></i>
														<?php echo sprintf("%s",markethon_time_link()); ?>	
												</li>										
												<li class="list-inline-item">
													<a href="<?php echo  sprintf("%s",get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ),'markethon'); ?>" class="iq-user">
													    <i class="fa fa-user mr-2" aria-hidden="true"></i>
														<?php echo  sprintf("%s ",get_the_author(),'markethon'); ?>
													</a>
											    </li>
											</ul>
									    </div> <?php
									} ?>    
					    		</div>

					    		

					    		<div class="iq-blog-detail"> 
					    		
									<div class="blog-title">
										<a class="button-link" href="<?php echo sprintf("%s",esc_url(get_permalink($wp_query->ID)));?>">
					    			        <h5><?php echo sprintf("%s",esc_html__(get_the_title( $wp_query->ID ),'markethon')); ?></h5>
					    			    </a>
					    			</div>
					    			
					    			<div class="blog-content">
					    			    <p><?php  echo sprintf("%s",get_the_excerpt( $wp_query->ID ) ); ?></p>
					    			</div> <?php  

                                    if($readmore_switch == 'true'){ ?>

						                <div class="blog-button">
											<?php 
											if(!empty($markethon_option['blog_btn']))
											{ 
											?>
											<a class="button-link" href="<?php the_permalink();?>"><?php echo esc_attr($markethon_option['blog_btn']); ?><i class="fa fa-angle-right" aria-hidden="true"></i></a>
											<?php 
											}
											else
											{ 
											?>
											<a class="button-link" href="<?php the_permalink();?>"><?php esc_html_e('Read More', 'markethon'); ?><i class="fa fa-angle-right" aria-hidden="true"></i></a>
											<?php 
											}
											?>
										</div> <?php
									} ?>	
		    			
		    		            </div>

		    	            </div>
			            </div> <?php 		
			        } 
		
			    } 
		    wp_reset_postdata();
	        echo '</div>';	
	    } ?> 
    </div> <?php

    if($settings['blog_style'] != '1'){
    $total_pages = $wp_query->max_num_pages;
        if ($total_pages > 1){
            $current_page = max(1, get_query_var('paged'));
            echo paginate_links(array(
            'base' => get_pagenum_link(1) . '%_%',
            'format' => '/page/%#%',
            'current' => $current_page,
            'total' => $total_pages,
            'type'            => 'list',
            'prev_text'       => wp_kses('<span aria-hidden="true">'. __( 'Previous page', 'consultab' ) .'</span>','consultab'),
            'next_text'       => wp_kses('<span aria-hidden="true">'. __( 'Next page', 'consultab' ) .'</span>','consultab'),
            ));
        }
    } ?>