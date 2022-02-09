<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package topseo
 */

$c_copyright = (function_exists('fw_get_db_customizer_option')) ? fw_get_db_customizer_option('c_copyright') : '';
$c_social_links = (function_exists('fw_get_db_customizer_option')) ? fw_get_db_customizer_option('c_social_links') : '';
$c_footer_bg = get_theme_mod( 'footer_bg', $default = '' );
$footer_bg_image = get_theme_mod( 'footer-bg-image', $default = '');

?>
	<!-- FOOTER -->
	<footer class="flw">
	<?php
        topseo_edit_location( $id = 'footer', $position = 'left: 50px;' );
        
        if (is_active_sidebar( 'sidebar-2' ) ){
            if($c_footer_bg == 'footer-bg-image' && $footer_bg_image != ''){
                ?>
				<div class="ht-footer flw" style="background-image: url('<?php echo esc_url($footer_bg_image); ?>')">
			<?php }else{
				echo '<div class="ht-footer flw">';
			} ?>
				<div class="container">
					<div class="row">
						<?php dynamic_sidebar('sidebar-2'); ?>
					</div>
				</div>
			</div>
		<?php } ?>
		<div class="copyright flw">
			<div class="container">
			<?php topseo_edit_location( $id = 'copyright', $position = 'left: 100px;' ); ?>
				<?php if(!empty($c_copyright)): ?>
					<div class="left-copyright">
						<span><?php echo wp_kses_post( $c_copyright ); ?></span>
					</div>
				<?php endif; ?>
				<button class="scroll-to-top ion-ios-arrow-up wow fadeInUp" data-wow-delay=".2s" title="<?php esc_attr_e('Scroll To Top', 'topseo'); ?>"></button>
				<?php if(!empty($c_social_links)) : ?>
					<?php if($c_social_links[0] != '') : ?>
						<div class="right-copyright">					
							<ul class="copy-right-social">
								<?php foreach($c_social_links as $social_link) : ?>
									<li><a href="<?php echo esc_url($social_link); ?>"></a></li>
								<?php endforeach; ?>
							</ul>
						</div>
					<?php endif; ?>
				<?php endif; ?>
			</div>
		</div>
	</footer>
	<!-- //FOOTER -->
</div>
<?php wp_footer(); ?>
</body>
</html>
