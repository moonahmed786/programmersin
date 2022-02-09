<?php
function markethon_display_header(){

    $markethon_option = get_option('markethon_options');
    if(!is_front_page()) {

	    if ( ( ( is_page() && ! markethon_is_frontpage() ) ) && has_post_thumbnail( get_queried_object_id() ) ) {
		    $options = $markethon_option['bg_opacity'];

		    if($options == "1") { 
		    	$bg_class = 'iq-bg-over black'; 
		    } elseif($options == "2") { 
		    	$bg_class = 'iq-bg-over iq-over-dark-80'; 
		    } elseif($options == "3") { 
		    	$bg_class = 'breadcrumb-bg breadcrumb-ui'; 
		    } else { 
		    	$bg_class = 'iq-bg-over iq-over-dark-80'; 
		    } ?>

			<div class="text-left iq-breadcrumb-one 
				<?php if(!empty($bg_class)) { echo esc_attr($bg_class); } ?>"> <?php
		} else {

			if(!empty($markethon_option['bg_type'] == "1")) {

				$bg_color = 'iq-bg-over black';

			} elseif(!empty($markethon_option['bg_type'] == "2")) {

				if(isset($markethon_option['banner_image']['url'])){

					$bgurl = $markethon_option['banner_image']['url'];
				}

				$options= $markethon_option['bg_opacity'];

				if($options == "1") { 
					$bg_class = 'iq-bg-over black'; 
				} elseif($options == "2") { 
					$bg_class = 'iq-bg-over iq-over-dark-80'; 
				} elseif($options == "3") { 
					$bg_class = 'breadcrumb-bg breadcrumb-ui'; 
				} else { 
					$bg_class = 'iq-bg-over iq-over-dark-80'; 
				}

			} elseif(!empty($markethon_option['bg_type'] == "3")) {

				$options= $markethon_option['bg_opacity'];

				if($options == "1") { 
					$bg_class = 'video-iq-bg-over'; 
				} elseif($options == "2") { 
					$bg_class = 'video-breadcrumb-bg breadcrumb-video'; 
				} elseif($options == "3") { 
					$bg_class = 'video-breadcrumb-bg breadcrumb-video'; 
				} else { 
					$bg_class = 'iq-bg-over iq-over-dark-80'; 
				}
			} else {
				$bg_class = 'iq-bg-over';
			} ?>

			<div class="text-left iq-breadcrumb-one 
				<?php if(!empty($markethon_option['bg_type'] == "1")) { echo esc_attr($bg_color); } ?>
				<?php if(!empty($bg_class)) { echo esc_attr($bg_class); } ?>"
			
				<?php if(!empty($bgurl)){ ?> style="background: url(
				<?php echo esc_url($bgurl); ?> );" 
				<?php } ?>>
				<?php
			}


		if($markethon_option['bg_type'] == "3") {

			if(isset($markethon_option['bg_video_link'])){
				$videourl = $markethon_option['bg_video_link'];
			} ?>

			<video class="masthead-video" autoplay loop muted>
				<source src="<?php echo esc_url($videourl); ?>" type="video/mp4">
				<source src="<?php echo esc_url($videourl); ?>" type="video/webm">
			</video> <?php

	    } ?>

		<div class="container"> <?php

		    $options= $markethon_option['bg_image'];

		    if($options == '1') { ?>

				<div class="row align-items-center">
					<div class="col-sm-12">
						<nav aria-label="breadcrumb" class="text-center iq-breadcrumb-two"> <?php

					        if(is_archive()){ ?>
								<h2 class="title">
									<?php the_archive_title();  ?>
								</h2> <?php
					        } elseif(is_search()) {
					            if ( have_posts() ) : ?>
									<h2 class="title">
										<?php printf( esc_html__( 'Search Results for: %s', 'markethon' ), '
										<span>' . get_search_query() . '</span>' ); ?>
									</h2> <?php 
								else : ?>
								<h2 class="title">
									<?php esc_html_e( 'Nothing Found', 'markethon' ); ?>
								</h2> <?php 
							    endif;
					        } elseif(is_404()) {

								if(isset($markethon_option['markethon_fourzerofour_title'])){ ?>
									<h2 class="title">
										<?php $four_title =  $markethon_option['markethon_fourzerofour_title']; echo esc_html($four_title);  ?>
									</h2> <?php
								} else { ?>
									<h2 class="title">
										<?php esc_html_e( 'Oops! That page can not be found.', 'markethon' ); ?>
									</h2> <?php }
					            } elseif(is_home()){ ?>
									<h2 class="title">
										<?php esc_html_e( 'Blog', 'markethon' ); ?>
									</h2> <?php 
								} else { ?>
									<h2 class="title">
										<?php single_post_title(); ?>
									</h2> <?php 
								} ?> <?php

								if(isset($markethon_option['display_breadcrumbs'])) {
									$options = $markethon_option['display_breadcrumbs'];
									if($options == "yes") { ?>
										<ol class="breadcrumb main-bg">
											<?php echo markethon_custom_breadcrumbs(); ?>
										</ol> <?php
						            }
				 	            } ?>

						</nav>
					</div>
				</div> <?php 

			}  elseif($options == '2') { ?>

				<div class="row align-items-center">
					<div class="col-lg-12 col-md-12 text-left align-self-center">
						<nav aria-label="breadcrumb" class="text-left"> <?php

							if(is_archive()) { ?>

								<h2 class="title 1">
									<?php the_archive_title();  ?>
								</h2> <?php 

							} elseif(is_search()) {

					            if ( have_posts() ) : ?>
									<h2 class="title 2">
										<?php printf( esc_html__( 'Search Results for: %s', 'markethon' ), '
										<span>' . get_search_query() . '</span>' ); ?>
									</h2> <?php 
								else : ?>
									<h2 class="title 3">
										<?php esc_html_e( 'Nothing Found', 'markethon' ); ?>
									</h2> <?php 
							    endif;

					        } elseif(is_404()) {

								if(isset($markethon_option['markethon_fourzerofour_title'])){ ?>
									<h2 class="title 4">
										<?php $four_title =  $markethon_option['markethon_fourzerofour_title']; echo esc_html($four_title);  ?>
									</h2> <?php
								} else { ?>
									<h2 class="title 5">
										<?php esc_html_e( 'Oops! That page can not be found.', 'markethon' ); ?>
									</h2> <?php 
								}

					        } elseif(is_home()){ ?>

								<h2 class="title">
									<?php esc_html_e( 'Blog', 'markethon' ); ?>
								</h2> <?php 

							} else { ?>

								<h2 class="title">
									<?php single_post_title(); ?>
								</h2> <?php 

							} ?> <?php

							if(isset($markethon_option['display_breadcrumbs'])) {
								$options = $markethon_option['display_breadcrumbs'];
								if($options == "yes") { ?>
									<ol class="breadcrumb main-bg">
										<?php echo markethon_custom_breadcrumbs(); ?>
									</ol> <?php
						        }
				 	        } ?>
						</nav> 
					</div>
				</div> <?php 

			}  elseif($options == '3') { ?>

				<div class="row align-items-center">
					<div class="col-lg-12 col-md-12 text-left align-self-center">
						<nav aria-label="breadcrumb" class="text-right iq-breadcrumb-two"> <?php
							if(is_archive()){ ?>
								<h2 class="title">
									<?php the_archive_title();  ?>
								</h2> <?php
							} elseif(is_search()) {
							    if ( have_posts() ) : ?>
									<h2 class="title">
										<?php printf( esc_html__( 'Search Results for: %s', 'markethon' ), '
										<span>' . get_search_query() . '</span>' ); ?>
									</h2> <?php 
								else : ?>
									<h2 class="title">
										<?php esc_html_e( 'Nothing Found', 'markethon' ); ?>
									</h2> <?php 
								endif;
							} elseif(is_404()) {
							    if(isset($markethon_option['markethon_fourzerofour_title'])){ ?>
									<h2 class="title">
										<?php $four_title =  $markethon_option['markethon_fourzerofour_title']; echo esc_html($four_title);  ?>
									</h2> <?php
						        } else { ?>
									<h2 class="title">
										<?php esc_html_e( 'Oops! That page can not be found.', 'markethon' ); ?>
									</h2> <?php 
								} 
							} elseif(is_home()) { ?>
									<h2 class="title">
										<?php esc_html_e( 'Blog', 'markethon' ); ?>
									</h2> <?php 
							} else { ?>
								<h2 class="title">
									<?php single_post_title(); ?>
								</h2> <?php 
							} ?> <?php

							if(isset($markethon_option['display_breadcrumbs'])) {
								$options = $markethon_option['display_breadcrumbs']; 
								if($options == "yes") { ?>
									<ol class="breadcrumb main-bg">
										<?php echo markethon_custom_breadcrumbs(); ?>
									</ol> <?php
							    }
						    } ?>
						</nav>
					</div>
				</div> <?php 

			}  elseif($options == '4') { ?>

				<div class="row align-items-center iq-breadcrumb-three">
					<div class="col-sm-6 mb-3 mb-lg-0 mb-md-0"> <?php
					    if(is_archive()){ ?>
							<h2 class="title ext-lg-right text-md-right text-sm-left">
								<?php the_archive_title();  ?>
							</h2> <?php
					    } elseif(is_search()) {
							if ( have_posts() ) : ?>
								<h2 class="title">
									<?php printf( esc_html__( 'Search Results for: %s', 'markethon' ), '
									<span>' . get_search_query() . '</span>' ); ?>
								</h2> <?php 
							else : ?>
								<h2 class="title">
									<?php esc_html_e( 'Nothing Found', 'markethon' ); ?>
								</h2> <?php 
							endif;
						} elseif(is_404()) {

					        if(isset($markethon_option['markethon_fourzerofour_title'])){ ?>
								<h2 class="title">
									<?php $four_title =  $markethon_option['markethon_fourzerofour_title']; echo esc_html($four_title);  ?>
								</h2> <?php
					        } else{ ?>
								<h2 class="title">
									<?php esc_html_e( 'Oops! That page can not be found.', 'markethon' ); ?>
								</h2> <?php 
							}
					    } elseif(is_home()) { ?>

							<h2 class="title">
								<?php esc_html_e( 'Blog', 'markethon' ); ?>
							</h2> <?php 
						} else { ?>
							<h2 class="title">
								<?php single_post_title(); ?>
							</h2> <?php 
						} ?>
					</div>
					<div class="col-sm-6 ext-lg-right text-md-right text-sm-left">
						<nav aria-label="breadcrumb" class="iq-breadcrumb-two"> <?php
							if(isset($markethon_option['display_breadcrumbs'])) {
								$options = $markethon_option['display_breadcrumbs'];
								if($options == "yes") { ?>
									<ol class="breadcrumb main-bg">
										<?php echo markethon_custom_breadcrumbs(); ?>
									</ol> <?php
						        }
					        } ?>
						</nav>
					</div>
				</div> <?php 

			}  elseif($options == '5') { ?>

				<div class="row align-items-center iq-breadcrumb-three">
					<div class="col-sm-6 mb-3 mb-lg-0 mb-md-0">
						<nav aria-label="breadcrumb" class="text-left iq-breadcrumb-two">
							<ol class="breadcrumb main-bg">
								<?php echo markethon_custom_breadcrumbs(); ?>
							</ol>
						</nav>
					</div>
					<div class="col-sm-6"> <?php
						if(is_archive()){ ?>
							<h2 class="title text-lg-right text-md-right text-sm-left">
								<?php the_archive_title();  ?>
							</h2> <?php
					    } elseif(is_search()) {
							if ( have_posts() ) : ?>
								<h2 class="title text-lg-right text-md-right text-sm-left">
									<?php printf( esc_html__( 'Search Results for: %s', 'markethon' ), '
									<span>' . get_search_query() . '</span>' ); ?>
								</h2> <?php 
								else : ?>
									<h2 class="title text-lg-right text-md-right text-sm-left">
										<?php esc_html_e( 'Nothing Found', 'markethon' ); ?>
									</h2> <?php 
							endif;
						} elseif(is_404()) {
							if(isset($markethon_option['markethon_fourzerofour_title'])){ ?>
								<h2 class="title text-lg-right text-md-right text-sm-left">
									<?php $four_title =  $markethon_option['markethon_fourzerofour_title']; echo esc_html($four_title);  ?>
								</h2> <?php
							} else{ ?>
								<h2 class="title text-lg-right text-md-right text-sm-left">
									<?php esc_html_e( 'Oops! That page can not be found.', 'markethon' ); ?>
								</h2> <?php 
							}
						} elseif(is_home()){ ?>
							<h2 class="title text-lg-right text-md-right text-sm-left">
								<?php esc_html_e( 'Blog', 'markethon' ); ?>
							</h2> <?php 
						} else { ?>
							<h2 class="title text-lg-right text-md-right text-sm-left">
								<?php single_post_title(); ?>
							</h2> <?php 
						} ?>
					</div>
				</div> <?php 

			}  elseif($options == '6') { ?>

				<div class="row align-items-center iq-breadcrumb-six">
					<div class="col-sm-6 mb-3 mb-lg-0 mb-md-0">
						<nav aria-label="breadcrumb" class="text-left"> <?php

							if(is_archive()) { ?>

								<h2 class="title 1">
									<?php the_archive_title();  ?>
								</h2> <?php 

							} elseif(is_search()) {

					            if ( have_posts() ) : ?>
									<h2 class="title 2">
										<?php printf( esc_html__( 'Search Results for: %s', 'markethon' ), '
										<span>' . get_search_query() . '</span>' ); ?>
									</h2> <?php 
								else : ?>
									<h2 class="title 3">
										<?php esc_html_e( 'Nothing Found', 'markethon' ); ?>
									</h2> <?php 
							    endif;

					        } elseif(is_404()) {

								if(isset($markethon_option['markethon_fourzerofour_title'])){ ?>
									<h2 class="title 4">
										<?php $four_title =  $markethon_option['markethon_fourzerofour_title']; echo esc_html($four_title);  ?>
									</h2> <?php
								} else { ?>
									<h2 class="title 5">
										<?php esc_html_e( 'Oops! That page can not be found.', 'markethon' ); ?>
									</h2> <?php 
								}

					        } elseif(is_home()){ ?>

								<h2 class="title">
									<?php esc_html_e( 'Blog', 'markethon' ); ?>
								</h2> <?php 

							} else { ?>

								<h2 class="title">
									<?php single_post_title(); ?>
								</h2> <?php 

							} ?> <?php

							if(isset($markethon_option['display_breadcrumbs'])) {
								$options = $markethon_option['display_breadcrumbs'];
								if($options == "yes") { ?>
									<ol class="breadcrumb main-bg">
										<?php echo markethon_custom_breadcrumbs(); ?>
									</ol> <?php
						        }
				 	        } ?>
						</nav>
					</div>
					<div class="col-sm-6"> <?php  
                            
                            $leftimg = $markethon_option['display_banner_rightimage'];

						    if($leftimg == "yes" ) {
							    if(isset($markethon_option['iq_leftbanner_image']['url'])){

						                $bgurl = $markethon_option['iq_leftbanner_image']['url'];
					            } ?>
					            <div class="righ-image">
					                <img src="<?php echo esc_url( $bgurl ); ?>" alt="<?php  esc_attr_e( 'markethon', 'markethon' ); ?> "> 
					            </div> <?php 
					        }  ?>
						 
					</div>
				</div> <?php 

			}  else { ?>

				<div class="row align-items-center iq-breadcrumb-six">
					<div class="col-sm-6 mb-3 mb-lg-0 mb-md-0">
						<nav aria-label="breadcrumb" class="text-left">
								<?php
					if(is_archive()){
					?>
								<h2 class="title">
									<?php the_archive_title();  ?>
								</h2>
								<?php
					}
					elseif(is_search()){
					if ( have_posts() ) : ?>
								<h2 class="title">
									<?php printf( esc_html__( 'Search Results for: %s', 'markethon' ), '
									<span>' . get_search_query() . '</span>' ); ?>
								</h2>
								<?php else : ?>
								<h2 class="title">
									<?php esc_html_e( 'Nothing Found', 'markethon' ); ?>
								</h2>
								<?php endif;
					} elseif(is_404()){

					if(isset($markethon_option['markethon_fourzerofour_title'])){
					?>
								<h2 class="title">
									<?php $four_title =  $markethon_option['markethon_fourzerofour_title']; echo esc_html($four_title);  ?>
								</h2>
								<?php
					} else{
					?>
								<h2 class="title">
									<?php esc_html_e( 'Oops! That page can not be found.', 'markethon' ); ?>
								</h2>
								<?php }
					} elseif(is_home()){ ?>
								<h2 class="title">
									<?php esc_html_e( 'Blog', 'markethon' ); ?>
								</h2>
								<?php }
					else { ?>
								<h2 class="title">
									<?php single_post_title(); ?>
								</h2>
								<?php } ?>
								<ol class="breadcrumb main-bg">
									<?php echo markethon_custom_breadcrumbs(); ?>
								</ol>
							</nav>
					</div>
					<div class="col-sm-6"> <?php  
                            
                            $bred_url = get_template_directory_uri().'/assets/images/breadcum.png'; ?>
					            <div class="righ-image">
					            	<img src="<?php echo esc_url($bred_url); ?>" alt="<?php esc_attr_e('markethon','markethon'); ?> "> 
					            </div> <?php 
					        ?>
						 
					</div>
				</div> <?php 
			} ?>

		</div>
		</div> <?php
	}
}
?>