<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage markethon
 * @since 1.0
 * @version 1.0
 */

get_header(); 
$markethon_option = get_option('markethon_options');

if(isset($markethon_option['markethon_404_banner_image']['url'])){
	$bgurl = $markethon_option['markethon_404_banner_image']['url'];
}
?>
<div <?php if(!empty($bgurl)){ ?> style="background: url(<?php echo esc_url($bgurl); ?> );" <?php } ?>>
	<div class="container">
		<div id="primary" class="content-area">
			<main id="main" class="site-main">
				<div class="error-404 not-found">
					<div class="page-content">
						<div class="row">
							<div class="col-sm-12 text-center">
								<?php  
									if(!empty($markethon_option['markethon_404_banner_image']['url'])) { ?>
									<div class="fourzero-image mb-5">
										<img src="<?php echo esc_url($markethon_option['markethon_404_banner_image']['url']); ?>" alt="<?php  esc_attr_e( '404', 'markethon' ); ?>"/>
									</div>	

								<?php } else { ?>
							
									<div class="big-text"><?php esc_html_e( '404', 'markethon' ); ?></div>

								<?php } ?>
								<h4>
									<?php 
										if(isset($markethon_option['markethon_four_description']) && !empty($markethon_option['markethon_four_description']))
										{
											$four_title = $markethon_option['markethon_fourzerofour_title']; 
											echo esc_html($four_title); 
										}
										else 
										{
											echo esc_html_e('404 Error', 'markethon');
										}
										
									?>
								</h4>
								<p class="mb-5">
									
									<?php 
										if(isset($markethon_option['markethon_four_description']) && !empty($markethon_option['markethon_four_description']))
										{
											$four_des = $markethon_option['markethon_four_description']; 
											echo esc_html($four_des); 
										}
										else 
										{
											echo esc_html_e('Oops! This Page is Not Found.', 'markethon');
										}
									?>
								</p>

								<div class="iq-button">
				                    <a class="button slide-button" href="<?php echo esc_url(home_url()); ?>"> 
				                        <div class="back-to-home"><?php esc_html_e('Back to Home', 'markethon'); ?></div>
				                    </a>								                    
								</div>

							</div>
						</div>
					</div><!-- .page-content -->
				</div><!-- .error-404 -->
			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- .container -->
</div>

<?php get_footer(); ?>