<?php
namespace Elementor; 
$html = '';
if ( ! defined( 'ABSPATH' ) ) exit; 
    
	$settings = $this->get_settings_for_display();
	$settings = $this->get_settings();
	$pe_page  = $settings['per_page_post'];
    $order  = $settings['order'];

    $args = array(
        'post_type'         => 'markethonteam',
        'post_status'       => 'publish',
        'order'             => $order,
        'posts_per_page'    => $pe_page
    );

    $desk = $settings['desk_number'];
	$lap = $settings['lap_number'];
	$tab = $settings['tab_number'];
	$mob = $settings['mob_number'];

	$this->add_render_attribute( 'cl-slider', 'data-dots', $settings['dots'] );
	$this->add_render_attribute( 'cl-slider', 'data-nav', $settings['nav-arrow'] );
	$this->add_render_attribute( 'cl-slider', 'data-items', $settings['desk_number'] );
	$this->add_render_attribute( 'cl-slider', 'data-items-laptop', $settings['lap_number'] );
	$this->add_render_attribute( 'cl-slider', 'data-items-tab', $settings['tab_number'] );
	$this->add_render_attribute( 'cl-slider', 'data-items-mobile', $settings['mob_number'] );
	$this->add_render_attribute( 'cl-slider', 'data-items-mobile-sm', $settings['mob_number'] );
	$this->add_render_attribute( 'cl-slider', 'data-autoplay', $settings['autoplay'] );
	$this->add_render_attribute( 'cl-slider', 'data-loop', $settings['loop'] );

    $wp_query = new \WP_Query($args);  

	global $post; 

	if($settings['team_style'] == '1') {

	    if($settings['team_display'] == 'slider' ) {  ?>

	    	<div  class="iq-team-style team-carousel owl-carousel" <?php echo $this->get_render_attribute_string( 'cl-slider' ) ?>> <?php
		        if($wp_query->have_posts())  {   

		    	    while ( $wp_query->have_posts() )  {

		    			$wp_query->the_post();
		    			$full_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID  ), "full" );
		    			$designation   = get_post_meta( $post->ID, 'markethon_team_designation', true);
		    			$twitter   = get_post_meta( $post->ID, 'markethon_team_twitter', true);
		                $facebook   = get_post_meta( $post->ID, 'markethon_team_facebook', true);
		                $google   = get_post_meta( $post->ID, 'markethon_team_google', true);
		                $github     = get_post_meta( $post->ID, 'markethon_team_github', true);
		                $insta     = get_post_meta( $post->ID, 'markethon_team_insta', true); ?>
		    				    	
					    <div class="team-box" data-wow-duration="0.5s">
					        <div class="team-img"> <?php 
					            echo sprintf('<img src="%1$s" alt="team-member" class="img-fluid rounded-circle" />',esc_url($full_image[0],'markethon')); ?>
					        </div>
				            <div class="team-detail">
				                <a class="team-plus" href="#"><i class="fas fa-plus"></i></a>
				                <div class="team-info">
				                    <h5 class="title mb-0">
				                    	<a href="#" class="member-name">
				                    		<?php echo get_the_title();?>
				                        </a>
				                    </h5> <?php

				                    if(!empty($designation)) { ?>
					                    <p class="designation mb-0 iq-fw-4">
					                  	    <?php echo sprintf("%s",esc_html($designation,'markethon') );?>	     	
					                    </p> <?php 
					                } ?>    

				                </div>
				            </div>
				            <div class="team-hover">
				                <p class="content"><?php echo get_the_content(); ?></p>
				                <ul class="list-inline"> <?php

	                                if(!empty($facebook)) { ?>
				                        <li class="list-inline-item"><?php echo sprintf('<a href="%s"><i class="fa fa-facebook">&nbsp;</i></a>',esc_url($facebook,'markethon'));?></li><?php
				                    }

				                    if(!empty($twitter)) { ?>
				    				    <li class="list-inline-item"><?php echo sprintf('<a href="%s"><i class="fa fa-twitter">&nbsp;</i></a>',esc_url($twitter,'markethon')); ?></li> <?php
	                                }

				    				if(!empty($google)) { ?>    
				    				    <li class="list-inline-item"><?php echo sprintf('<a href="%s"><i class="fa fa-google">&nbsp;</i></a>',esc_url($google,'markethon')); ?></li> <?php
				    				}
				    				
				    				if(!empty($github)) { ?>    
				    				    <li class="list-inline-item"><?php echo sprintf('<a href="%s"><i class="fa fa-github">&nbsp;</i></a>',esc_url($github,'markethon')); ?></li> <?php
	                                }

				    				if(!empty($insta)) { ?>    
				    				    <li class="list-inline-item"><?php echo sprintf('<a href="%s"><i class="fa fa-instagram">&nbsp;</i></a>',esc_url($insta,'markethon')); ?></li> <?php
				    				} ?>    

				               </ul>
				            </div>
					    </div> <?php
					}
				  wp_reset_postdata();		    
			    }  ?>  
		    </div> <?php    

	    } else { ?>

			<div class="iq-team-style iq-team row"> <?php
		        if($wp_query->have_posts())  {   

		    	    while ( $wp_query->have_posts() )  {

		    			$wp_query->the_post();
		    			$full_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID  ), "full" );
		    			$designation   = get_post_meta( $post->ID, 'markethon_team_designation', true);
		    			$twitter   = get_post_meta( $post->ID, 'markethon_team_twitter', true);
		                $facebook   = get_post_meta( $post->ID, 'markethon_team_facebook', true);
		                $google   = get_post_meta( $post->ID, 'markethon_team_google', true);
		                $github     = get_post_meta( $post->ID, 'markethon_team_github', true);
		                $insta     = get_post_meta( $post->ID, 'markethon_team_insta', true); ?>
		    
				    	<div class="col-lg-3 col-md-6">
					        <div class="team-box" data-wow-duration="0.5s">
					            <div class="team-img">
					            	<?php echo sprintf('<img src="%1$s" alt="team-member" class="img-fluid rounded-circle" />',esc_url($full_image[0],'markethon')); ?>
					            </div>
					            <div class="team-detail">
					                <a class="team-plus" href="#"><i class="fas fa-plus"></i></a>
					                <div class="team-info">
					                    <h5 class="title mb-0">
					                    	<a href="#" class="member-name">		                    	
					                    		<?php echo get_the_title();?>
					                        </a>
					                    </h5> <?php

					                    if(!empty($designation)) { ?>
						                    <p class="designation mb-0 iq-fw-4">
						                  	    <?php echo sprintf("%s",esc_html($designation,'markethon') );?>	     	
						                    </p> <?php 
						                } ?>    

					                </div>
					            </div>
					            <div class="team-hover">
					                <p class="content"><?php echo get_the_content(); ?></p>
					                <ul class="list-inline"> <?php

		                                if(!empty($facebook)) { ?>
					                        <li class="list-inline-item"><?php echo sprintf('<a href="%s"><i class="fa fa-facebook">&nbsp;</i></a>',esc_url($facebook,'markethon'));?></li><?php
					                    }

					                    if(!empty($twitter)) { ?>
					    				    <li class="list-inline-item"><?php echo sprintf('<a href="%s"><i class="fa fa-twitter">&nbsp;</i></a>',esc_url($twitter,'markethon')); ?></li> <?php
		                                }

					    				if(!empty($google)) { ?>    
					    				    <li class="list-inline-item"><?php echo sprintf('<a href="%s"><i class="fa fa-google">&nbsp;</i></a>',esc_url($google,'markethon')); ?></li> <?php
					    				}
					    				
					    				if(!empty($github)) { ?>    
					    				    <li class="list-inline-item"><?php echo sprintf('<a href="%s"><i class="fa fa-github">&nbsp;</i></a>',esc_url($github,'markethon')); ?></li> <?php
		                                }

					    				if(!empty($insta)) { ?>    
					    				    <li class="list-inline-item"><?php echo sprintf('<a href="%s"><i class="fa fa-instagram">&nbsp;</i></a>',esc_url($insta,'markethon')); ?></li> <?php
					    				} ?>    

					               </ul>
					            </div>
					         </div>
					    </div> <?php
					}
				  wp_reset_postdata();		    
			    }  ?>   
			</div> <?php

	    }

	} 

    if($settings['team_style'] == '2') { ?>

	    <div class="iq-team-style iq-team row"> <?php

	        if($wp_query->have_posts())  {   

	    	    while ( $wp_query->have_posts() )  {

	    			$wp_query->the_post();
	    			$full_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID  ), "full" );
	    			$designation   = get_post_meta( $post->ID, 'markethon_team_designation', true);
	    			$twitter   = get_post_meta( $post->ID, 'markethon_team_twitter', true);
	                $facebook   = get_post_meta( $post->ID, 'markethon_team_facebook', true);
	                $google   = get_post_meta( $post->ID, 'markethon_team_google', true);
	                $github     = get_post_meta( $post->ID, 'markethon_team_github', true);
	                $insta     = get_post_meta( $post->ID, 'markethon_team_insta', true); ?>
	    
			    	 <div class="col-lg-4 col-md-6">
				        <div class="team-three">
				            <div class="team-bg">
				            	<?php echo sprintf('<img src="%1$s" alt="team-member" class="img-fluid" />',esc_url($full_image[0],'markethon')); ?>
				            	<div class="social-box"> <?php

				            		if(!empty($facebook)) { ?>
				                        <?php echo sprintf('<a href="%s"><i class="fa fa-facebook"></i></a>',esc_url($facebook,'markethon'));?><?php
				                    }

				                    if(!empty($twitter)) { ?>
				    				    <?php echo sprintf('<a href="%s"><i class="fa fa-twitter"></i></a>',esc_url($twitter,'markethon')); ?><?php
	                                }

				    				if(!empty($google)) { ?>    
				    				    <?php echo sprintf('<a href="%s"><i class="fa fa-google"></i></a>',esc_url($google,'markethon')); ?><?php
				    				}
				    				
				    				if(!empty($github)) { ?>    
				    				    <?php echo sprintf('<a href="%s"><i class="fa fa-github"></i></a>',esc_url($github,'markethon')); ?><?php
	                                }

				    				if(!empty($insta)) { ?>    
				    				    <?php echo sprintf('<a href="%s"><i class="fa fa-instagram"></i></a>',esc_url($insta,'markethon')); ?><?php
				    				} ?>    
				            	</div>
				            </div>
				            <div class="team-content text-center">
				            	<h5 class="title">
				            		<a href="#" class="member-name">
				            		    <?php echo get_the_title();?>
				            		</a>
				            	</h5> <?php
	                            if(!empty($designation)) { ?>
					                <p class="designation">
					                  	<?php echo sprintf("%s",esc_html($designation,'markethon') );?>	
					                </p> <?php 
					            } ?>				             
				            </div>				            
				         </div>
				    </div> <?php
				}
			  wp_reset_postdata();		    
		    }  ?>   
		</div> <?php

	} ?>