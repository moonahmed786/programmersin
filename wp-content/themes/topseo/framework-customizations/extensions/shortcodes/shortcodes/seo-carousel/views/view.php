<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$g_carousel = $atts['carousel'];
$g_s1 = $atts['carousel']['s1'];
$g_s2 = $atts['carousel']['s2'];
$g_s3 = $atts['carousel']['s3'];
$g_s4 = $atts['carousel']['s4'];
$g_s5 = $atts['carousel']['s5']['s5_options'];
$g_s6 = $atts['carousel']['s6'];
?>
<?php if($g_carousel['gadget']=='s1'){ ?>
	<div class="client flw">
		<?php foreach($g_s1['s1_options'] as $s1_key['s1_image']){ ?>			
			<?php foreach($s1_key['s1_image'] as $s1_value){ ?>
				<div class="row">
				<?php foreach($s1_value as $s1_sub){
					$image_alt = (get_post_meta( $s1_sub['attachment_id'], '_wp_attachment_image_alt', true) != '') ? get_post_meta( $s1_sub['attachment_id'], '_wp_attachment_image_alt', true) : 'Carousel image';
					?>
					<div class="col-xs-4 col-sm-4">
						<div class="client-item" itemscope itemtype="http://schema.org/ImageObject">							
							<img src="<?php echo esc_url($s1_sub['url']); ?>" alt="<?php echo esc_attr($image_alt); ?>" itemprop="contentUrl" />							
						</div>
					</div>
					<?php } ?>
				</div>
			<?php } ?>			
		<?php } ?>
	</div>
<?php }elseif($g_carousel['gadget']=='s2'){ ?>
	<div class="partner">
		<?php foreach($g_s2['s2_image'] as $s2_key){
			$image_alt = (get_post_meta( $s2_key['attachment_id'], '_wp_attachment_image_alt', true) != '') ? get_post_meta( $s2_key['attachment_id'], '_wp_attachment_image_alt', true) : 'Carousel image';
		?>
		<span itemscope itemtype="http://schema.org/ImageObject"><img src="<?php echo esc_url($s2_key['url']); ?>" alt="<?php echo esc_attr($image_alt); ?>" itemprop="contentUrl" /></span>
		<?php } ?>
	</div>
<?php }elseif($g_carousel['gadget']=='s3'){ ?>
	<div class="reputation-crs">
		<?php foreach($g_s3['s3_image'] as $s3_key){
			$image_alt = (get_post_meta( $s3_key['attachment_id'], '_wp_attachment_image_alt', true) != '') ? get_post_meta( $s3_key['attachment_id'], '_wp_attachment_image_alt', true) : 'Carousel image'; ?>
		<span itemscope itemtype="http://schema.org/ImageObject"><img src="<?php echo esc_url($s3_key['url']); ?>" alt="<?php echo esc_attr($image_alt); ?>" itemprop="contentUrl" /></span>
		<?php } ?>
	</div>
<?php }elseif($g_carousel['gadget']=='s4'){ ?>
	<div class="full-range-crs">
		<?php foreach($g_s4['s4_image'] as $s4_key){
			$image_alt = (get_post_meta( $s4_key['attachment_id'], '_wp_attachment_image_alt', true) != '') ? get_post_meta( $s4_key['attachment_id'], '_wp_attachment_image_alt', true) : 'Carousel image'; ?>
		<span itemscope itemtype="http://schema.org/ImageObject"><img src="<?php echo esc_url($s4_key['url']); ?>" alt="<?php echo esc_attr($image_alt); ?>" itemprop='contentUrl'></span>
		<?php } ?>
	</div>
<?php }elseif($g_carousel['gadget']=='s5'){ ?>
	<div class="pricing-results flw">
		<div class="pricing-results-crs flw">
			<?php foreach($g_s5 as $s5_key){
				$replace_target = array('<b>','</b>');
				$replace_source = array('[',']');
				$s5_content = str_replace($replace_source, $replace_target, esc_html($s5_key['s5_content']));
				$image_alt = (get_post_meta( $s5_key['s5_image']['attachment_id'], '_wp_attachment_image_alt', true) != '') ? get_post_meta( $s5_key['s5_image']['attachment_id'], '_wp_attachment_image_alt', true) : 'Carousel image';
			?>
			<div class="pricing-results-item" itemscope itemtype="http://schema.org/ImageObject">
				<img src="<?php echo esc_url($s5_key['s5_image']['url']); ?>" alt="<?php echo esc_attr($image_alt); ?>" itemprop='contentUrl'>
				<div class="result-hidden">
					<div class="result-hidden-content">
						<h3 itemprop='name'><?php echo esc_html($s5_key['s5_title']); ?></h3>
						<p itemprop='description'><?php echo wp_kses($s5_content, array('b'=>array())); ?></p>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
<?php }else{ ?>
<div class="partner-pagination">
	<?php foreach($g_s6['s6_image'] as $s6_key){
		$image_alt = (get_post_meta( $s6_key['attachment_id'], '_wp_attachment_image_alt', true) != '') ? get_post_meta( $s6_key['attachment_id'], '_wp_attachment_image_alt', true) : 'Carousel image'; ?>
	<span itemscope itemtype="http://schema.org/ImageObject"><img src="<?php echo esc_url($s6_key['url']); ?>" alt="<?php echo esc_attr($image_alt); ?>" itemprop='contentUrl'></span>
	<?php } ?>
</div>
<?php } ?>