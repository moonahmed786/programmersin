<?php
/**
 * The template for displaying 404 pages (Not Found)
 */
$c_contact_btn = (function_exists('fw_get_db_customizer_option')) ? fw_get_db_customizer_option('c_contact_btn') : 'Contact';
$c_contact_link = (function_exists('fw_get_db_customizer_option')) ? fw_get_db_customizer_option('c_contact_link') : '#';
get_header(); ?>
<main id="main" class="flw">
	<div class="error-page flw">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-lg-4">
					<div class="error-img flw">
						<img src="<?php echo get_template_directory_uri().'/images/error-img.png' ?>" alt="<?php esc_attr__('Error image', 'topseo'); ?>">
					</div>
				</div>
				<div class="col-md-6 col-lg-6 col-md-offset-1 col-lg-offset-1">
					<div class="error-content flw">
						<h3 class="error-title"><?php esc_html_e('404', 'topseo'); ?></h3>
						<h4><?php esc_html_e('OOPS! Something went wrong!', 'topseo'); ?></h4>
						<p><?php
								esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'topseo' );
							?></p>
						<div class="box-button text-left flw">
							<span><a href="<?php echo esc_url(home_url('/')); ?>" class="ht-btn ht-btn-normal"><i class="ht-btn-icon-left ion-home"></i><?php esc_html_e('GO TO HOMEPAGE', 'topseo'); ?></a></span>
							<span><a href="<?php echo esc_url($c_contact_link); ?>" class="ht-btn ht-btn-normal"><i class="ht-btn-icon-left ion-android-contacts"></i><?php echo esc_html($c_contact_btn); ?></a></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>
