<?php
/**
 * Displays footer site info
 *
 * @package WordPress
 * @subpackage markethon
 * @since 1.0
 * @version 1.0
 */

?> <?php 

    $markethon_option = get_option('markethon_options');
    ?>

	<?php
	if(isset($markethon_option['display_copyright'])) {

		$options = $markethon_option['display_copyright'];

		if($options == "yes") {

		    $copyright_opt =  $markethon_option['marfooter_copyright_variation'];

		        if($copyright_opt == "copyright_default") { ?>

					<div class="copyright-footer">
						<div class="container">
							<div class="pt-3 pb-3">
								<div class="row justify-content-between">
									<div class="col-lg-6 col-md-12 text-lg-left text-md-center text-center"> <?php
										$markethon_option = get_option('markethon_options');
										if(isset($markethon_option['social-media-iq'])) {	 ?>
											<div class="social-icone">
												<?php $data = $markethon_option['social-media-iq']; ?>
												<ul>
													<?php
													foreach ($data as $key=>$options )
													{
														if($options) {
															echo '<li class="d-inline"><a href="'.$options.'"><i class="fa fa-'.$key.'"></i></a></li>';
														}
													} ?>
												</ul>
											</div>	 <?php				
										}	 ?>
				                    </div>
									<div class="col-lg-6 col-md-12 text-lg-right text-md-center text-center"> <?php
										if(isset($markethon_option['footer_copyright'])) {  ?>
											<span class="copyright"><?php echo esc_attr($markethon_option['footer_copyright']); ?></span> <?php
										} else { ?>
											<span class="copyright">
												<a target="_blank" href="<?php echo esc_url( __( 'https://themeforest.net/user/iqonicthemes/portfolio/', 'markethon' ) ); ?>"> 
													<?php printf( esc_html__( 'Proudly powered by %s', 'markethon' ), 'markethon.' ); ?>
													</a>
											</span> <?php
										} ?>
									</div>
							    </div>
						    </div>
					    </div>
				    </div> <?php

				} 

				if($copyright_opt == "copyright_center") { ?>

					<div class="copyright-footer">
						<div class="container">
							<div class="pt-3 pb-3">
								<div class="row flex-row-reverse justify-content-between">
									<div class="col-md-12 text-center"> <?php
										if(isset($markethon_option['footer_copyright'])) { ?>
											<span class="copyright"><?php echo esc_attr($markethon_option['footer_copyright']); ?></span> <?php
										} else { ?>
											<span class="copyright">
												<a target="_blank" href="<?php echo esc_url( __( 'https://themeforest.net/user/iqonicthemes/portfolio/', 'markethon' ) ); ?>"> 
													<?php printf( esc_html__( 'Proudly powered by %s', 'markethon' ), 'markethon.' ); ?>
													</a>
												</span> <?php
										} ?>
									</div>
								</div>
							</div>
						</div>
					</div> <?php

				} 

		}

	} else { ?>
		<div class="copyright-footer">
			<div class="container">
				<div class="pt-3 pb-3">
					<div class="row flex-row-reverse justify-content-between">
						<div class="col-md-12 text-center"> <?php
							if(isset($markethon_option['footer_copyright'])) { ?>
								<span class="copyright"><?php echo esc_attr($markethon_option['footer_copyright']); ?></span> <?php
							} else { ?>
								<span class="copyright">
									<a target="_blank" href="<?php echo esc_url( __( 'https://themeforest.net/user/iqonicthemes/portfolio/', 'markethon' ) ); ?>"> 
										<?php printf( esc_html__( 'Proudly powered by %s', 'markethon' ), 'markethon.' ); ?>
										</a>
									</span> <?php
							} ?>
						</div>
					</div>
				</div>
			</div>
		</div><?php
	}
	?>