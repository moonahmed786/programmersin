<?php if (!defined('FW')) die( 'Forbidden' );
$acc = $atts['acc'];
$acc_style = $acc['gadget'];
$ac_active = $atts['ac_active'];

$a1_i = $a2_i = $a3_i = $a4_i = 1;
?>
<?php if($acc_style=='a1'){
	$a1_ops = $acc['a1']['a1_ops']; ?>
	<div class="seo-accordion full-range-accordion smk_accordion acc_with_icon">
		<?php foreach($a1_ops as $a1_key => $a1_value){ ?>
			<?php 
			if($ac_active - $a1_key == 1){
				$class_active = ' acc_active';
			}else{
				$class_active = '';
			}
			?>
			<div class="accordion_in<?php echo esc_attr($class_active); ?>" itemscope itemtype="http://schema.org/Thing">
				<h3 class="acc_head" itemprop='name'><?php echo esc_html($a1_value['a1_title']); ?></h3>
				<div class="acc_content">
					<span itemprop='description'><?php echo wp_kses_post($a1_value['a1_content']); ?></span>
				</div>
			</div>
		<?php $a1_i++; } ?>
	</div>
<?php }elseif($acc_style=='a2'){
	$a2_ops = $acc['a2']['a2_ops']; ?>
	<div class="seo-accordion our-branding-accordion flw smk_accordion acc_with_icon">
		<?php foreach($a2_ops as $a2_key => $a2_value){ ?>
		<?php 
			if($ac_active - $a2_key == 1){
				$class_active = ' acc_active';
			}else{
				$class_active = '';
			}
		?>
		<div class="accordion_in<?php echo esc_attr($class_active); ?>" itemscope itemtype="http://schema.org/Thing">
			<h3 class="acc_head <?php echo esc_attr($a2_value['a2_icon']); ?>" itemprop='name'><?php echo esc_html($a2_value['a2_title']); ?></h3>
			<div class="acc_content">
				<span itemprop='description'><?php echo wp_kses_post($a2_value['a2_content']); ?></span>
			</div>
		</div>
		<?php } ?>
	</div>
<?php }elseif($acc_style=='a3'){
	$a3_ops = $acc['a3']['a3_ops']; ?>
	<div class="seo-accordion about-live-by smk_accordion acc_with_icon">
		<?php foreach($a3_ops as $a3_key => $a3_value){
			$image_alt = (get_post_meta( $a3_value['a3_icon']['attachment_id'], '_wp_attachment_image_alt', true) != '') ? get_post_meta( $a3_value['a3_icon']['attachment_id'], '_wp_attachment_image_alt', true) : 'Accordion image';

			if($ac_active - $a3_key == 1){
				$class_active = ' acc_active';
			}else{
				$class_active = '';
			}

		?>
		<div class="accordion_in<?php echo esc_attr($class_active); ?>" itemscope itemtype="http://schema.org/Thing">
			<h3 class="acc_head ion-bag" itemprop='name'><?php echo esc_html($a3_value['a3_title']); ?></h3>
			<div class="acc_content">
				<div class="about-live-img">
					<img src="<?php echo esc_url($a3_value['a3_icon']['url']); ?>" alt="<?php echo esc_attr($image_alt); ?>" itemprop='image' />
				</div>
				<span itemprop='description'><?php echo wp_kses_post($a3_value['a3_content']); ?></span>
			</div>
		</div>
		<?php } ?>
	</div>
<?php }else{
	$a4_ops = $acc['a4']['a4_ops']; ?>
	<div class="seo-accordion our-branding-accordion flw smk_accordion acc_with_icon acc_tab_transparent">
		<?php foreach($a4_ops as $a4_key => $a4_value){ ?>
		<?php 
			if($ac_active - $a4_key == 1){
				$class_active = ' acc_active';
			}else{
				$class_active = '';
			}
		?>
		<div class="accordion_in<?php echo esc_attr($class_active); ?>" itemscope itemtype="http://schema.org/Thing">
			<h3 class="acc_head <?php echo esc_attr($a4_value['a4_icon']); ?>" itemprop='name'><?php echo esc_html($a4_value['a4_title']); ?></h3>
			<div class="acc_content">
				<span itemprop='description'><?php echo wp_kses_post($a4_value['a4_content']); ?></span>
			</div>
		</div>
		<?php } ?>
	</div>
<?php } ?>
