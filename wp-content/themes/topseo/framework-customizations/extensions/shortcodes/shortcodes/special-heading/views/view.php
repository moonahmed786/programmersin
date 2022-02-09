<?php if (!defined('FW')) die( 'Forbidden' );
/**
 * @var $atts
 */
 $replace_target = array('<span>','</span>');
 $replace_source = array('[',']');
 $title = str_replace($replace_source, $replace_target, esc_html($atts['title']));
?>
<div class="fw-heading fw-heading-<?php echo esc_attr($atts['heading']); ?><?php echo !empty($atts['centered']) ? ' fw-heading-center' : ''; ?><?php echo !empty($atts['white_title']) ? ' white-title' : ''; ?>">
	<?php $heading = "<{$atts['heading']} class='fw-special-title'>{$title}</{$atts['heading']}>"; ?>
	<?php echo wp_kses($heading,
	array(
		'h1' => array(
			'class' => array(),
		),
		'h2' => array(
			'class' => array(),
		),
		'h3' => array(
			'class' => array(),
		),
		'h4' => array(
			'class' => array(),
		),
		'h5' => array(
			'class' => array(),
		),
		'h6' => array(
			'class' => array(),
		),
		'span' => array()
	)); ?>
	<?php if (!empty($atts['subtitle'])): ?>
		<div class="fw-desc"><?php echo wp_kses($atts['subtitle'], array('br'=>array())); ?></div>
	<?php endif; ?>
</div>
