<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$l = $atts['list'];
$l_gg = $l['gadget'];
$l1 = $l['l1']['l1_ops'];
$l2 = $l['l2']['l2_ops'];
$l3 = $l['l3']['l3_ops'];
$l4 = $l['l4']['l4_ops'];

switch($l_gg){
case 'l1':
?>
<ul class="seo-lists seo-lists-1">
	<?php foreach($l1 as $l1key): ?>
	<li><?php echo esc_html($l1key['l1_title']); ?></li>
	<?php endforeach ?>
</ul>
<?php
break;
?>
<?php
case 'l2':
?>
<ul class="seo-lists seo-lists-2">
	<?php foreach($l2 as $l2key): ?>
	<li class="<?php echo esc_attr($l2key['l2_icon'] ); ?>"><?php echo esc_html($l2key['l2_title']); ?></li>
	<?php endforeach ?>
</ul>
<?php
break;
?>
<?php
case 'l3':
?>
<ul class="seo-lists seo-lists-3">
	<?php foreach($l3 as $l3key): ?>
	<li><?php echo esc_html($l3key['l3_title']); ?></li>
	<?php endforeach ?>
</ul>
<?php
break;
?>
<?php
default :
?>
<ul class="seo-lists seo-lists-4">
	<?php foreach($l4 as $l4key): ?>
	<li class="<?php echo esc_attr($l4key['l4_icon'] ); ?>"><?php echo esc_html($l4key['l4_title']); ?></li>
	<?php endforeach ?>
</ul>
<?php
break;
}
?>
