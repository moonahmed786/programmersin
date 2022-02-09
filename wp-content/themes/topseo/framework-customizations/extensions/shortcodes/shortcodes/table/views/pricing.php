<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$class_width = 'fw-col-sm-' . ceil(12 / count($atts['table']['cols']));
?>
<div class="fw-pricing">
	<?php foreach ($atts['table']['cols'] as $col_key => $col): ?>
		<div class="fw-package-wrap <?php echo esc_attr($class_width . ' ' . $col['name']); ?> ">
			<div class="fw-package">
				<?php foreach ($atts['table']['rows'] as $row_key => $row): ?>
					<?php if( $col['name'] == 'desc-col' ) : ?>
						<div class="fw-default-row">
							<?php $value = $atts['table']['content'][$row_key][$col_key]['textarea']; ?>
							<span><?php echo esc_html($value); ?></span>
						</div>
					<?php continue; endif; ?>
					<?php if ($row['name'] === 'heading-row'): ?>
						<div class="fw-heading-row">
							<?php $value = $atts['table']['content'][$row_key][$col_key]['textarea']; ?>
							<span class="heading-text">
								<?php echo (empty($value) && $col['name'] === 'desc-col') ? '&nbps;' : $value; ?>
							</span>
						</div>
					<?php elseif ($row['name'] === 'pricing-row'): ?>
						<div class="fw-pricing-row">
							<?php $amount = $atts['table']['content'][$row_key][$col_key]['amount'] ?>
							<?php $desc   = $atts['table']['content'][$row_key][$col_key]['description']; ?>
							<h3 class="pricing-table-price"><?php echo (empty($value) && $col['name'] === 'desc-col') ? '&nbps;' : $amount; ?><span><?php echo (empty($value) && $col['name'] === 'desc-col') ? '&nbps;' : $desc; ?></span></h3>
						</div>
					<?php elseif ( $row['name'] == 'button-row' ) : ?>
						<?php $button = fw_ext( 'shortcodes' )->get_shortcode( 'button' ); ?>
							<div class="fw-button-row">
								<?php if ( false === empty( $atts['table']['content'][ $row_key ][ $col_key ]['button'] ) and false === empty($button) ) : ?>
									<?php
										$v = $button->render($atts['table']['content'][ $row_key ][ $col_key ]['button']);
										echo wp_kses($v, array(
											'div' => array(
												'class' => array(),
											),
											'span' => array(),
											'a' => array(
												'href' => array(),
												'target' => array(),
												'class' => array(),
											)
										));
									?>
								<?php else : ?>
									<span>&nbsp;</span>
								<?php endif; ?>
							</div>
					<?php elseif ($row['name'] === 'switch-row') : ?>
						<div class="fw-switch-row">
							<?php $value = $atts['table']['content'][$row_key][$col_key]['switch']; ?>
							<span>
								<?php if($value=='yes'): ?>
								<i class="fa fa-check-circle"></i>
								<?php else: ?>
								<i class="fa fa-times-circle"></i>
								<?php endif; ?>
							</span>
						</div>
					<?php elseif ($row['name'] === 'default-row') : ?>
						<div class="fw-default-row">
							<?php $value = $atts['table']['content'][$row_key][$col_key]['textarea']; ?>
							<span><?php echo esc_html($value); ?></span>
						</div>
					<?php elseif ($row['name'] === 'image-row') : ?>
						<div class="fw-image-row">
							<?php
								$value = $atts['table']['content'][$row_key][$col_key]['image']['url'];
								$text = $atts['table']['content'][$row_key][$col_key]['text'];
								$image_alt = (get_post_meta( $atts['table']['content'][$row_key][$col_key]['image']['attachment_id'], '_wp_attachment_image_alt', true) != '') ? get_post_meta( $atts['table']['content'][$row_key][$col_key]['image']['attachment_id'], '_wp_attachment_image_alt', true) : 'Pricing thumbnail';
								if(!empty($text)):
							?>
							<span class="pricing-table-corner"><?php echo esc_html($text); ?></span>
							<?php endif; ?>
							<img src="<?php echo esc_url($value); ?>" alt="<?php echo esc_attr($image_alt); ?>">
						</div>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		</div>
	<?php endforeach; ?>
</div>