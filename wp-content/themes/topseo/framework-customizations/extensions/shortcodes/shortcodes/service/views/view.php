<?php if (!defined('FW')) die('Forbidden');
	$type = $atts['type']['gadget'];
	$select = $atts['item']['gadget'];
	$p1 = $atts['item']['p1']['p1_ops'];
	$p2 = $atts['item']['p2']['p2_ops'];
	$arr = array();
	if($type=='t1'):
?>
<div class="services-crs">
	<?php
		// carousel style
		if($select=='p1'):
		// single post			
		foreach($p1 as $key):
		$post = get_post($key);
		$pid = $post->ID;
		$post_excerpt = $post->post_excerpt;
		$thumbnail = get_the_post_thumbnail_url($pid);

		$img_id  = get_post_thumbnail_id($pid);
		$img_alt = (get_post_meta($img_id,'_wp_attachment_image_alt', true) != '') ? get_post_meta($img_id,'_wp_attachment_image_alt', true) : 'Service thumbnail';
	?>
		<div class="services-item" itemscope itemtype="http://schema.org/Service">
			<div class="services-img">
				<img src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo esc_attr($img_alt); ?>">
			</div>
			<h3 class="services-title" itemprop="name">
				<a href="<?php echo get_permalink($pid); ?>" class="services-title-btn"><?php echo get_the_title($pid); ?></a>
				<span class="services-effect"></span>
			</h3>
			<div class="servide-desc" itemprop="description">
				<?php echo wp_kses_post(wp_trim_words( $post_excerpt, 12 )); ?>
			</div>
			<div class="services-rm">
				<a href="<?php echo get_permalink($pid); ?>" class="services-rm-btn"><?php esc_html_e('READ MORE', 'topseo'); ?></a>
			</div>
		</div>
	<?php
		endforeach;
		// categories
		else:
			foreach($p2 as $key){
				$all_post = get_posts(
					array(
						'post_type' => 'ht-service',
						'posts_per_page' => -1,
						'tax_query' => array(
							array(
								'taxonomy' => 'ht-service-filter',
								'field' => 'term_id',
								'terms' => $key
							)
						)
					)
				);
				foreach($all_post as $key_arr){
					if(!in_array($key_arr->ID, $arr)){
						array_push($arr, $key_arr->ID);
					}
				}
			}
			foreach($arr as $key):
				$post = get_post($key);
				$pid = $post->ID;
				$post_excerpt = $post->post_excerpt;
				$thumbnail = get_the_post_thumbnail_url($pid);

				$img_id  = get_post_thumbnail_id($pid);
				$img_alt = (get_post_meta($img_id,'_wp_attachment_image_alt', true) != '') ? get_post_meta($img_id,'_wp_attachment_image_alt', true) : 'Service thumbnail';
	?>
	<div class="services-item" itemscope itemtype="http://schema.org/Service">
		<div class="services-img">
			<img src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo esc_attr($img_alt); ?>">
		</div>
		<h3 class="services-title" itemprop="name">
			<a href="<?php echo get_permalink($pid); ?>" class="services-title-btn"><?php echo get_the_title($pid); ?></a>
			<span class="services-effect"></span>
		</h3>
		<div class="servide-desc" itemprop="description">
			<?php echo wp_kses_post(wp_trim_words( $post_excerpt, 12 )); ?>
		</div>
		<div class="services-rm">
			<a href="<?php echo get_permalink($pid); ?>" class="services-rm-btn"><?php esc_html_e('READ MORE', 'topseo'); ?></a>
		</div>
	</div>
	<?php
		endforeach;
		endif;
	?>
</div>
<?php
	// box style
	elseif($type=='t2'):
	$column = $atts['type']['t2']['t2_column'];
	$value = $atts['type']['t2']['t2_eff'];
	$eff = '';
	if($value=='yes'){
		$eff = ' service-special-hover-effect';
	}else{
		$eff = '';
	}
?>
<div class="services-box row">
	<?php
		// single post
		if($select=='p1'):
		foreach($p1 as $key):
		$post = get_post($key);
		$post_excerpt = $post->post_excerpt;

		$pid = $post->ID;
		$thumbnail = get_the_post_thumbnail_url($pid);

		$img_id  = get_post_thumbnail_id($pid);
		$img_alt = (get_post_meta($img_id,'_wp_attachment_image_alt', true) != '') ? get_post_meta($img_id,'_wp_attachment_image_alt', true) : 'Service thumbnail';
	?>
	<div class="col-md-<?php echo esc_attr($column); ?>">
		<div class="services-box-item flw<?php echo esc_attr($eff); ?>" itemscope itemtype="http://schema.org/Service">
			<div class="services-img">
				<img src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo esc_attr($img_alt); ?>">
			</div>
			<h3 class="services-box-title" itemprop='name'>
				<a href="<?php echo get_permalink($pid); ?>" class="services-title-btn"><?php echo get_the_title($pid); ?></a>
			</h3>
			<?php if(!empty($value)){ ?>
				<p class="service-box-item-content"><?php echo wp_kses_post(wp_trim_words($post_excerpt, 12 )); ?></p>
				<div class="services-box-item-read-more">
					<a href="<?php echo get_permalink($pid); ?>" class="ion-ios-plus-outline"><?php esc_html_e('Read more', 'topseo'); ?></a>
				</div>
			<?php } ?>
		</div>
	</div>
	<?php
		endforeach;
		// category
		else:
			foreach($p2 as $key){
				$all_post = get_posts(
					array(
						'post_type' => 'ht-service',
						'posts_per_page' => -1,
						'tax_query' => array(
							array(
								'taxonomy' => 'ht-service-filter',
								'field' => 'term_id',
								'terms' => $key
							)
						)
					)
				);
				foreach($all_post as $key_arr){
					if(!in_array($key_arr->ID, $arr)){
						array_push($arr, $key_arr->ID);
					}
				}
			}
			foreach($arr as $key):
			$post = get_post($key);
			$pid = $post->ID;
			$post_excerpt = $post->post_excerpt;
			$thumbnail = get_the_post_thumbnail_url($pid);

			$img_id  = get_post_thumbnail_id($pid);
			$img_alt = (get_post_meta($img_id,'_wp_attachment_image_alt', true) != '') ? get_post_meta($img_id,'_wp_attachment_image_alt', true) : 'Service thumbnail';
		?>
		<div class="col-md-<?php echo esc_attr($column); ?>">
			<div class="services-box-item flw<?php echo esc_attr($eff); ?>" itemscope itemtype="http://schema.org/Service">
				<div class="services-img">
					<img src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo esc_attr($img_alt); ?>">
				</div>
				<h3 class="services-box-title" itemprop='name'>
					<a href="<?php echo get_permalink($pid); ?>" class="services-title-btn"><?php echo get_the_title($pid); ?></a>
				</h3>
				<?php if(!empty($value)){ ?>
					<p class="service-box-item-content"><?php echo wp_kses_post(wp_trim_words( $post_excerpt, 12 )); ?></p>
					<div class="services-box-item-read-more">
						<a href="<?php echo get_permalink($pid); ?>" class="ion-ios-plus-outline"><?php esc_html_e('Read more', 'topseo'); ?></a>
					</div>
				<?php } ?>
			</div>
		</div>
	<?php
		endforeach;
		endif;
	?>
</div>
<?php else://normal style ?>
<div class="service-normal row">
	<?php
		// carousel style
		if($select=='p1'):
		// single post			
		foreach($p1 as $key):
		$post = get_post($key);
		$pid = $post->ID;
		$post_excerpt = $post->post_excerpt;
		$thumbnail = get_the_post_thumbnail_url($pid);

		$img_id  = get_post_thumbnail_id($pid);
		$img_alt = (get_post_meta($img_id,'_wp_attachment_image_alt', true) != '') ? get_post_meta($img_id,'_wp_attachment_image_alt', true) : 'Service thumbnail';
	?>
	<div class="col-md-3 col-lg-3">
		<div class="services-item" itemscope itemtype="http://schema.org/Service">
			<div class="services-img">
				<img src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo esc_attr($img_alt); ?>">
			</div>
			<h3 class="services-title" itemprop='name'>
				<a href="<?php echo get_permalink($pid); ?>" class="services-title-btn"><?php echo get_the_title($pid); ?></a>
				<span class="services-effect"></span>
			</h3>
			<div class="servide-desc" itemprop='description'>
				<?php echo wp_kses_post(wp_trim_words( $post_excerpt, 12 )); ?>
			</div>
			<div class="services-rm">
				<a href="<?php echo get_permalink($pid); ?>" class="services-rm-btn"><?php esc_html_e('READ MORE', 'topseo'); ?></a>
			</div>
		</div>
	</div>
	<?php
		endforeach;
		// categories
		else:
			foreach($p2 as $key){
				$all_post = get_posts(
					array(
						'post_type' => 'ht-service',
						'posts_per_page' => -1,
						'tax_query' => array(
							array(
								'taxonomy' => 'ht-service-filter',
								'field' => 'term_id',
								'terms' => $key
							)
						)
					)
				);
				foreach($all_post as $key_arr){
					if(!in_array($key_arr->ID, $arr)){
						array_push($arr, $key_arr->ID);
					}
				}
			}
			foreach($arr as $key):
				$post = get_post($key);
				$pid = $post->ID;
				$post_excerpt = $post->post_excerpt;
				$thumbnail = get_the_post_thumbnail_url($pid);

				$img_id  = get_post_thumbnail_id($pid);
				$img_alt = (get_post_meta($img_id,'_wp_attachment_image_alt', true) != '') ? get_post_meta($img_id,'_wp_attachment_image_alt', true) : 'Service thumbnail';
	?>
	<div class="col-md-3 col-lg-3">
		<div class="services-item" itemscope itemtype="http://schema.org/Service">
			<div class="services-img">
				<img src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo esc_attr($img_alt); ?>">
			</div>
			<h3 class="services-title" itemprop="name">
				<a href="<?php echo get_permalink($pid); ?>" class="services-title-btn"><?php echo get_the_title($pid); ?></a>
				<span class="services-effect"></span>
			</h3>
			<div class="servide-desc" itemprop="description">
				<?php echo wp_kses_post(wp_trim_words( $post_excerpt, 12 )); ?>
			</div>
			<div class="services-rm">
				<a href="<?php echo get_permalink($pid); ?>" class="services-rm-btn"><?php esc_html_e('READ MORE', 'topseo'); ?></a>
			</div>
		</div>
	</div>
	<?php
		endforeach;
		endif;
	?>
</div>
<?php endif; ?>