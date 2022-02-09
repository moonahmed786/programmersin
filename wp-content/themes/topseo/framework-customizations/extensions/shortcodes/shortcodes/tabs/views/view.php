<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$t = $atts['tab']['gadget'];
$t1 = $atts['tab']['t1']['t1_ops'];
$t2 = $atts['tab']['t2']['t2_ops'];
$t3 = $atts['tab']['t3']['t3_ops'];
$t4 = $atts['tab']['t4']['t4_ops'];
$t5 = $atts['tab']['t5']['t5_ops'];
$t6 = $atts['tab']['t6']['t6_ops'];
$t7 = $atts['tab']['t7']['t7_ops'];
$t8 = $atts['tab']['t8']['t8_ops'];
$t9 = $atts['tab']['t9']['t9_ops'];

switch($t){
	case 't1': ?>
	<!-- style 1 -->
	<div class="seo-tabs seotabs-v1">
	    <ul class="seotab-nav">
	    	<?php foreach($t1 as $t1_k => $t1_v){ ?>
	        <li><a href="#content-<?php echo esc_attr($t1_k); ?>" class="<?php if($t1_k=='0'){echo esc_attr('current-tabs' );} ?>" ><?php echo esc_html($t1_v['t1_title']); ?></a></li>
	        <?php } ?>
	    </ul>
	    <div class="seotab-wrap">
	    	<?php foreach($t1 as $t1_ks => $t1_vs){ ?>
	        <div id="content-<?php echo esc_attr($t1_ks); ?>" class="seotab-content">
	            <?php echo do_shortcode(wpautop($t1_vs['t1_content'], true)); ?>
	        </div>
	        <?php } ?>
	    </div>
	</div>
	<?php
	break;
	case 't2' :
	?>
	<!-- style 2 -->
	<div class="seo-tabs seotabs-v2">
		<ul class="seotab-nav">
	    	<?php foreach($t2 as $t2_k => $t2_v){ ?>
	        <li><a href="#content-<?php echo esc_attr($t2_k); ?>" class="<?php if($t2_k=='0'){echo esc_attr('current-tabs' );} ?>" ><span class="icon <?php echo esc_attr($t2_v['t2_icon']) ?>"></span><?php echo esc_html($t2_v['t2_title']); ?></a></li>
	        <?php } ?>
	    </ul>
	    <div class="seotab-wrap">
	    	<?php foreach($t2 as $t2_ks => $t2_vs){ ?>
	        <div id="content-<?php echo esc_attr($t2_ks); ?>" class="seotab-content">
	            <?php echo do_shortcode(wpautop($t2_vs['t2_content'], true)); ?>
	        </div>
	        <?php } ?>
	    </div>
    </div>
    <?php
    break;
    case 't3' :
    ?>
    <!-- style 3 -->
	<div class="seo-tabs seotabs-v3">
		<div class="v3-wrap">
			<ul class="seotab-nav">
		    	<?php foreach($t3 as $t3_k => $t3_v){ ?>
		        <li><a href="#content-<?php echo esc_attr($t3_k); ?>" class="<?php if($t3_k=='0'){echo esc_attr('current-tabs' );} ?>" ><?php echo esc_html($t3_v['t3_title']); ?></a></li>
		        <?php } ?>
		    </ul>
		</div>
	    <div class="seotab-wrap">
	    	<?php foreach($t3 as $t3_ks => $t3_vs){ ?>
	        <div id="content-<?php echo esc_attr($t3_ks); ?>" class="seotab-content">
	            <?php echo do_shortcode(wpautop($t3_vs['t3_content'], true )); ?>
	        </div>
	        <?php } ?>
	    </div>
    </div>
    <?php
    break;
    case 't4' :
    ?>
    <!-- style 4 -->
	<div class="seo-tabs seotabs-v4">
		<ul class="seotab-nav">
	    	<?php foreach($t4 as $t4_k => $t4_v){ ?>
	        <li><a href="#content-<?php echo esc_attr($t4_k); ?>" class="<?php if($t4_k=='0'){echo esc_attr('current-tabs' );} ?>" ><?php echo esc_html($t4_v['t4_title']); ?></a></li>
	        <?php } ?>
	    </ul>
	    <div class="seotab-wrap">
	    	<?php foreach($t4 as $t4_ks => $t4_vs){ ?>
	        <div id="content-<?php echo esc_attr($t4_ks); ?>" class="seotab-content">
	            <?php echo do_shortcode(wpautop($t4_vs['t4_content'], true)); ?>
	        </div>
	        <?php } ?>
	    </div>
    </div>
    <?php
    break;
    case 't5' :
    ?>
    <!-- style 5 -->
	<div class="seo-tabs seotabs-v5">
		<ul class="seotab-nav">
	    	<?php foreach($t5 as $t5_k => $t5_v){ ?>
	        <li><a href="#content-<?php echo esc_attr($t5_k); ?>" class="<?php if($t5_k=='0'){echo esc_attr('current-tabs' );} ?>" ><span class="icon <?php echo esc_attr($t5_v['t5_icon']); ?>"></span><?php echo esc_html($t5_v['t5_title']); ?></a></li>
	        <?php } ?>
	    </ul>
	    <div class="seotab-wrap">
	    	<?php foreach($t5 as $t5_ks => $t5_vs){ ?>
	        <div id="content-<?php echo esc_attr($t5_ks); ?>" class="seotab-content">
	            <?php echo do_shortcode(wpautop($t5_vs['t5_content'], true)); ?>
	        </div>
	        <?php } ?>
	    </div>
    </div>
    <?php
    break;
    case 't6' :
    ?>
    <!-- style 6 -->
	<div class="seo-tabs seotabs-v6">
		<ul class="seotab-nav">
	    	<?php foreach($t6 as $t6_k => $t6_v){ ?>
	        <li><a href="#content-<?php echo esc_attr($t6_k); ?>" class="<?php if($t6_k=='0'){echo esc_attr('current-tabs' );} ?>" ><?php echo esc_html($t6_v['t6_title']); ?></a></li>
	        <?php } ?>
	    </ul>
	    <div class="seotab-wrap">
	    	<?php foreach($t6 as $t6_ks => $t6_vs){ ?>
	        <div id="content-<?php echo esc_attr($t6_ks); ?>" class="seotab-content">
	            <?php echo do_shortcode(wpautop($t6_vs['t6_content'], true)); ?>
	        </div>
	        <?php } ?>
	    </div>
    </div>
    <?php
    break;
    case 't7' :
    ?>
    <!-- style 7 -->
	<div class="seo-tabs seotabs-v7">
		<ul class="seotab-nav">
	    	<?php foreach($t7 as $t7_k => $t7_v){ ?>
	        <li><a href="#content-<?php echo esc_attr($t7_k); ?>" class="<?php if($t7_k=='0'){echo esc_attr('current-tabs' );} ?>" ><span class="icon <?php echo esc_attr($t7_v['t7_icon']); ?>"></span><?php echo esc_html($t7_v['t7_title']); ?></a></li>
	        <?php } ?>
	    </ul>
	    <div class="seotab-wrap">
	    	<?php foreach($t7 as $t7_ks => $t7_vs){ ?>
	        <div id="content-<?php echo esc_attr($t7_ks); ?>" class="seotab-content">
	            <?php echo do_shortcode(wpautop($t7_vs['t7_content'], true)); ?>
	        </div>
	        <?php } ?>
	    </div>
    </div>
    <?php
    break;
    case 't8' :
    ?>
    <!-- style 8 -->
    <div class="seo-tabs seotabs-v8">
		<ul class="seotab-nav">
	    	<?php foreach($t8 as $t8_k => $t8_v){ ?>
	        <li><a href="#content-<?php echo esc_attr($t8_k); ?>" class="<?php if($t8_k=='0'){echo esc_attr('current-tabs' );} ?>" ><?php echo esc_html($t8_v['t8_title']); ?></a></li>
	        <?php } ?>
	    </ul>
	    <div class="seotab-wrap">
	    	<?php foreach($t8 as $t8_ks => $t8_vs){ ?>
	        <div id="content-<?php echo esc_attr($t8_ks); ?>" class="seotab-content">
	            <?php echo do_shortcode(wpautop($t8_vs['t8_content'], true)); ?>
	        </div>
	        <?php } ?>
	    </div>
    </div>
    <?php
    	break;
    	default:
	?>
	<!-- style 9 -->
    <div class="seo-tabs seotabs-v9">
		<ul class="seotab-nav">
	    	<?php foreach($t9 as $t9_k => $t9_v){
            $image_alt = (get_post_meta( $t9_v['t9_image']['attachment_id'], '_wp_attachment_image_alt', true) != '') ? get_post_meta( $t9_v['t9_image']['attachment_id'], '_wp_attachment_image_alt', true) : 'Tabs thumbnail'; ?>
	        <li>
	        	<a href="#content-<?php echo esc_attr($t9_k); ?>" class="<?php if($t9_k=='0'){echo esc_attr('current-tabs' );} ?>" >
					<img src="<?php echo esc_url($t9_v['t9_image']['url']); ?>" alt="<?php echo esc_attr($image_alt); ?>">
	        	</a>
        	</li>
	        <?php } ?>
	    </ul>
	    <div class="seotab-wrap">
	    	<?php foreach($t9 as $t9_ks => $t9_vs){ ?>
	        <div id="content-<?php echo esc_attr($t9_ks); ?>" class="seotab-content">
	            <?php echo do_shortcode(wpautop($t9_vs['t9_content'], true)); ?>
	        </div>
	        <?php } ?>
	    </div>
    </div>
    <?php
    	break;
    	}
    ?>