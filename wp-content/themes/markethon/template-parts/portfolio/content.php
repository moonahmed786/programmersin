<?php 
    $markethon_option = get_option('markethon_options');

    $cons_port_client  = get_post_meta( $post->ID, 'markethon_portfolio_client', true); 
    $cons_port_dob  = get_post_meta( $post->ID, 'markethon_portfolio_dob', true); 
    $cons_port_city  = get_post_meta( $post->ID, 'markethon_portfolio_city', true);

    $cons_port_facebook  = get_post_meta( $post->ID, 'markethon_portfolio_facebook', true);
    $cons_port_twitter  = get_post_meta( $post->ID, 'markethon_portfolio_twitter', true);
    $cons_port_google  = get_post_meta( $post->ID, 'markethon_portfolio_google', true);
    $cons_port_github  = get_post_meta( $post->ID, 'markethon_portfolio_github', true);
    $cons_port_insta  = get_post_meta( $post->ID, 'markethon_portfolio_insta', true);

    $image_id   = get_post_meta( get_the_Id(), 'iq_portfolio_detail_image', true );
    $full_image= wp_get_attachment_image_src(  $image_id , "full" );  

?>
<?php
if(isset($markethon_option['portfolio_top'])) {

    $options = $markethon_option['portfolio_top'];

    if($options == "yes"){ ?>

         <?php 
        if(has_post_thumbnail()) { ?>

            <div class="row">
                <div class="col-lg-12">
                    <div class="portfolio-img">
                        <div class="iq-portfolio-image clearfix">
                            <img src="<?php echo esc_url( $full_image[0]); ?>" class="img-fluid center-block" alt="<?php  esc_attr_e( 'markethonimg', 'markethon' ); ?>">
                        </div>
                    </div>
                </div>
            </div> <?php 
        } ?>

            <div class="row mt-5 mb-5">
                      
                <div class="col-lg-3 col-md-4">
                    <div class="section-title mb-3">
                        <h4 class="title mb-0"><?php the_date() ?><span class="text-green">&nbsp;</span></h4>
                    </div>

                    <div class="portfolio-info"> <?php

                        if(!empty($cons_port_client)) { ?>
                            <div class="media mb-3">
                                <div class="mr-3">
                                    <i class="contact-icon fa fa-check-circle text-green"></i>
                                </div>
                                <div class="media-body mt-1">
                                    <h6 class="mt-0 text-uppercase iq-fw-8">
                                        <?php echo esc_html__("Name :","markethon"); ?>
                                    </h6>
                                    <p class="mb-0"><?php echo esc_html($cons_port_client); ?></p>
                                </div>                               
                            </div> <?php 
                        } ?>     

                        <?php
                        if(!empty($cons_port_dob)) { ?>
                            <div class="media">
                                <div class="mr-3">
                                    <i class="contact-icon fa fa-check-circle text-green"></i>
                                </div>
                                <div class="media-body mt-1">
                                    <h6 class="mt-0 text-uppercase iq-fw-8"><?php echo esc_html__("Date Of Birth: :","markethon"); ?></h6>
                                    <p class="mb-0"><?php echo esc_html($cons_port_dob); ?></p>
                                </div>
                            </div> <?php 
                        } ?>

                        <?php
                        if(!empty($cons_port_city)) { ?>
                            <div class="media  mb-3">
                                <div class="mr-3">
                                    <i class="contact-icon fa fa-check-circle text-green"></i>
                                </div>
                                <div class="media-body mt-1">
                                    <h6 class="mt-0 text-uppercase iq-fw-8"><?php echo esc_html__("City: :","markethon"); ?></h6>
                                    <p class="mb-0"><?php echo esc_html($cons_port_city); ?></p>
                                </div>
                            </div> <?php 
                        } ?>


                        <?php 
                        if(!empty($cons_port_facebook) || !empty($cons_port_twitter) || !empty($cons_port_google) || !empty($cons_port_github) || !empty($cons_port_insta) ) { ?>

                            <div class="social-media">
                                <ul class="social"> <?php 

                                    if(!empty($cons_port_facebook)) { ?>
                                        <li class="list-inline-item">
                                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-facebook-f"></i></a>
                                        </li><?php
                                    }

                                    if(!empty($cons_port_twitter)) { ?>
                                        <li class="list-inline-item">
                                            <a href="http://twitter.com/intent/tweet?text=<?php the_title(); ?>&<?php the_permalink(); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
                                        </li> <?php
                                    }
                                    
                                    if(!empty($cons_port_google)) { ?>
                                        <li class="list-inline-item">
                                            <a href="https://plus.google.com/share?url=<?php the_title(); ?>&text=<?php the_excerpt(); ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
                                        </li> <?php
                                    }  ?>

                                </ul>
                            </div> <?php

                        } ?>    

                        <div class="clearfix"></div>

                    </div>

                </div>

                <div class="col-lg-9 col-md-8"> <?php

                    $port_sub_title = $markethon_option['portfolio_sub_title'];
                    if(!empty($port_sub_title)) { ?>
                        <div class="section-title mb-2">
                            <h2 class="title mb-0"><?php echo esc_html($port_sub_title); ?><span class="text-green">.</span></h2>
                        </div> <?php 
                    } 

                   ?>

                        <p><?php  echo html_entity_decode(get_the_excerpt($post->ID ) ); ?></p><?php
                
                    
                    $markethon_exploreall_title = $markethon_option['markethon_exploreall_title'];
                    $markethon_exploreall_link = $markethon_option['markethon_exploreall_link'];

                    if(!empty($markethon_exploreall_title)) { ?>
                        <a class="button slide-button mt-3" href="<?php echo esc_url( $markethon_exploreall_link ); ?>">
                            <?php echo esc_html($markethon_exploreall_title); ?>
                        </a> <?php
                    } ?>

                </div>

            </div>

    <?php
    }    
} ?>
        
<?php the_content(); ?>