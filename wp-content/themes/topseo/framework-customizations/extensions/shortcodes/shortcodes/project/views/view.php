<?php if (!defined('FW')) die('Forbidden');
// project type
$type = $atts['type']['gadget'];
$select = $atts['item']['gadget'];
$p1 = $atts['item']['p1']['p1_ops'];
$p2 = $atts['item']['p2']['p2_ops'];
// TERMS
$all_cats = get_categories('taxonomy=fw-portfolio-category&type=fw-portfolio');
$arr = array();
// SWITCH
switch($type){
case 't1' :
// style option
$style = $atts['type']['t1']['t1_style'];
if($style == 'no_margin'){
	$class_style = ' no-padding';
}else{
	$class_style = '';
}
// filter option
$filter = $atts['type']['t1']['t1_filter'];
// column option
$column = $atts['type']['t1']['t1_column'];
?>
<div class="row">
	<div class="seo-projects flw">
		<?php if($select=='p1')://SINGLE POST ?>
			<?php if($filter == 'on') ://filter1 ?>
				<div class="project-nav flw">
					<?php
						echo '<button class="button is-checked" data-filter="*">All</button>';
						foreach ($all_cats as $key => $a_cat):
							$cat_id = $a_cat->term_id;
							// Variable to contain the printed class
							$filters = array();
							// CHeck what cat is using, print only those which are used
							foreach ( $p1 as $key) :
								$post = get_post($key);
								$taxs = get_the_terms( $post->ID, 'fw-portfolio-category' );
								$array = '';
								if($taxs != false){
									foreach($taxs as $key){
									$array = $key->term_id;
									// Only print if this tax_id belong to one of displaying menu and tax_id is not printed before
									if ( $array == $cat_id && !in_array($array, $filters) ):
										// Add the tax_id to the array for later check
										array_push($filters, $array);
										echo '<button class="button" data-filter=".'.$key->slug.'">'.$key->name.'</button>';
									endif;
								}
							}
							endforeach;
						endforeach
					?>
				</div>
			<?php endif;//endfilter1 ?>
			<div class="project-grid grid flw">
				<?php
					foreach($p1 as $p1_key):
						$post = get_post($p1_key);
						$taxs = get_the_terms($post->ID, 'fw-portfolio-category');
						$taxs_class = '';
						if($taxs){
							foreach($taxs as $tax){
								$taxs_class .= $tax->slug.' ';
							}
						}
						$pid = $post->ID;
						$post_thumbnail_id = get_post_thumbnail_id($pid);	// Get post thumbnail id
						$post_thumbnail = fw_resize($post_thumbnail_id, 570, 428, false); // Set thumbnail size in default
						/*alt text*/
						$img_alt = (get_post_meta($post_thumbnail_id,'_wp_attachment_image_alt', true) != '') ? get_post_meta($post_thumbnail_id,'_wp_attachment_image_alt', true) : 'Project thumbnail';

						$liked = fw_get_db_post_option($pid, 'liked');
						if($liked == 0){
							$liked = $pid;
						}
					?>
				<div class="col-xs-12 col-sm-6 element-item<?php echo esc_attr($class_style).esc_attr(' col-md-'.$column.' '.$taxs_class); ?>">
					<div class="project-item" itemscope itemtype="http://schema.org/ImageObject">
						<div class="case-img">
							<img src="<?php echo esc_url($post_thumbnail); ?>" alt="<?php echo esc_attr($img_alt); ?>" itemprop='contentUrl' />
						</div>
						<div class="case-like">
							<span class="ion-ios-heart-outline"><?php echo esc_html($liked); ?></span>
						</div>
						<div class="case-overlay-banner"></div>
						<div class="case-readmore"><a href="<?php echo the_permalink($pid); ?>" class="case-readmore-btn"><?php esc_html_e('Read more', 'topseo'); ?></a></div>
						<div class="case-overlay-info">
							<h3 class="case-name"><a href="<?php echo the_permalink($pid); ?>" class="case-name-btn"><?php echo get_the_title($pid); ?></a></h3>
							<?php if(!empty($taxs)): ?>
							<div class="case-cate">
								<?php
									foreach ( $taxs as $term ) {
										echo '<span><a href="'.get_term_link($term).'">'.esc_html($term->name).'</a></span>';
									}
								?>
							</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<?php endforeach;//END STYLE 1 ?>
			</div>

		<?php else://CATEGORIES POST ?>

			<?php if($filter == 'on') ://filter2 ?>
				<div class="project-nav flw">
					<?php
						echo '<button class="button is-checked" data-filter="*">All</button>';
						foreach($p2 as $key){
							$term = get_term_by('id', (int)$key, 'fw-portfolio-category');
							echo '<button class="button" data-filter=".'.$term->slug.' '.'">'.$term->name.'</button>';
						}
					?>
				</div>
			<?php endif;//endfilter2 ?>
			<div class="project-grid grid flw">
				<?php  // style 2
					foreach($p2 as $p2_key){
						$all_post = get_posts(
							array(
								'post_type' => 'fw-portfolio',
								'posts_per_page' => -1,
								'tax_query' => array(
									array(
										'taxonomy' => 'fw-portfolio-category',
										'field' => 'term_id',
										'terms' => $p2_key
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
					foreach($arr as $key){
						$post = get_post($key);
						$pid = $post->ID;
						$taxs = get_the_terms($pid, 'fw-portfolio-category');
						$slug = '';
						if($taxs){
							foreach($taxs as $key){
								$slug .= $key->slug.' ';
							}
						}
						$liked = fw_get_db_post_option($pid, 'liked');
						if($liked == 0){
							$liked = $pid;
						}
				?>
				<div class="element-item<?php echo esc_attr($class_style).esc_attr(' col-md-'.$column.' '.$slug); ?>">
					<?php
						$post_thumbnail_id = get_post_thumbnail_id($pid);	// Get post thumbnail id
						$post_thumbnail = fw_resize($post_thumbnail_id, 370, 270, false); // Set thumbnail size in default
						/*alt text*/
						$img_alt = (get_post_meta($post_thumbnail_id,'_wp_attachment_image_alt', true) != '') ? get_post_meta($post_thumbnail_id,'_wp_attachment_image_alt', true) : 'Project thumbnail';
					?>
					<div class="project-item" itemscope itemtype="http://schema.org/ImageObject">
						<div class="case-img">
							<img src="<?php echo esc_url($post_thumbnail); ?>" alt="<?php echo esc_attr($img_alt); ?>" itemprop='contentUrl' />
						</div>
						<div class="case-like">
							<span class="ion-ios-heart-outline"><?php echo esc_html($liked); ?></span>
						</div>
						<div class="case-overlay-banner"></div>
						<div class="case-readmore"><a href="<?php echo the_permalink($pid); ?>" class="case-readmore-btn"><?php esc_html_e('Read more', 'topseo'); ?></a></div>
						<div class="case-overlay-info">
							<h3 class="case-name"><a href="<?php echo the_permalink($pid); ?>" class="case-name-btn"><?php echo get_the_title($pid); ?></a></h3>
							<?php if(!empty($taxs)): ?>
							<div class="case-cate">
								<?php
									foreach ( $taxs as $term ) {
										echo '<span><a href="'.get_term_link($term).'">'.esc_html($term->name).'</a></span>';
									}
								?>
							</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>

		<?php endif; ?>
	</div>
</div>
<?php
break;
case 't2' :
?>
<div class="row">
	<div class="case-detail-more-crs flw">
		<?php
			//SINGLE POST
			if($select=='p1'):
			foreach($p1 as $key):
				$post = get_post($key);
				$pid = $post->ID;
				$terms = get_the_terms($pid, 'fw-portfolio-category');
				$get_thumbnail_id = get_post_thumbnail_id($pid);
				$post_thumbnail = fw_resize($get_thumbnail_id, 370, 270, false);
				/*alt text*/
				$img_alt = (get_post_meta($get_thumbnail_id,'_wp_attachment_image_alt', true) != '') ? get_post_meta($get_thumbnail_id,'_wp_attachment_image_alt', true) : 'Project thumbnail';

				$liked = fw_get_db_post_option($pid, 'liked');
				if($liked == 0){
					$liked = $pid;
				}
		?>
		<div class="case-study" itemscope itemtype="http://schema.org/ImageObject">
			<div class="case-img">
				<img src="<?php echo esc_url($post_thumbnail); ?>" alt="<?php echo esc_attr($img_alt); ?>" itemprop='contentUrl'>
			</div>
			<div class="case-like">
				<span class="ion-ios-heart-outline"><?php echo esc_html($liked); ?></span>
			</div>
			<div class="case-overlay-banner"></div>
			<div class="case-readmore"><a href="<?php echo get_permalink($pid); ?>" class="case-readmore-btn"><?php esc_html_e('Read more', 'topseo'); ?></a></div>
			<div class="case-overlay-info">
				<h3 class="case-name"><a href="<?php echo get_permalink($pid); ?>" class="case-name-btn"><?php echo get_the_title($pid); ?></a></h3>
				<?php if(!empty($terms)): ?>
				<div class="case-cate">
					<?php foreach($terms as $key){
						echo '<span><a href="'.$key->slug.'">'.$key->name.'</a></span>'	;
					} ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
		<?php
			endforeach;
			//CATEGORIES POST
			else:
				foreach($p2 as $key){
					$all_post = get_posts(
						array(
							'post_type' => 'fw-portfolio',
							'posts_per_page' => -1,
							'tax_query' => array(
								array(
									'taxonomy' => 'fw-portfolio-category',
									'field' => 'id',
									'terms' => $key
								)
							)
						)
					);
					foreach($all_post as $key){
						if(!in_array($key->ID, $arr)){
							array_push($arr, $key->ID);
						}
					}
				}
				foreach($arr as $key){
					$post = get_post($key);
					$pid = $post->ID;
					$terms = get_the_terms($pid, 'fw-portfolio-category');
					$get_thumbnail_id = get_post_thumbnail_id($pid);
					$post_thumbnail = fw_resize($get_thumbnail_id, 370, 270, false);

					/*alt text*/
					$img_alt = (get_post_meta($get_thumbnail_id,'_wp_attachment_image_alt', true) != '') ? get_post_meta($get_thumbnail_id,'_wp_attachment_image_alt', true) : 'Project thumbnail';

					$liked = fw_get_db_post_option($pid, 'liked');
					if($liked == 0){
						$liked = $pid;
					}
					 ?>
					<div class="case-study" itemscope itemtype="http://schema.org/ImageObject">
						<div class="case-img">
							<img src="<?php echo esc_url($post_thumbnail); ?>" alt="<?php echo esc_attr($img_alt); ?>" itemprop='contentUrl' />
						</div>
						<div class="case-like">
							<span class="ion-ios-heart-outline"><?php echo esc_html($liked); ?></span>
						</div>
						<div class="case-overlay-banner"></div>
						<div class="case-readmore"><a href="<?php echo get_permalink($pid); ?>" class="case-readmore-btn"><?php esc_html_e('Read more', 'topseo'); ?></a></div>
						<div class="case-overlay-info">
							<h3 class="case-name"><a href="<?php echo get_permalink($pid); ?>" class="case-name-btn"><?php echo get_the_title($pid); ?></a></h3>
							<?php if(!empty($terms)): ?>
							<div class="case-cate">
								<?php
									foreach ( $terms as $term ) {
										echo '<span><a href="'.get_term_link($term).'">'.esc_html($term->name).'</a></span>';
									}
								?>
							</div>
							<?php endif; ?>
						</div>
					</div>
				<?php }
			endif;
		?>
	</div>
</div>
<?php
break;
default:
?>
<div class="row">
	<div class="project-large-thumbnail-crs">
		<?php
			//SINGLE POST
			if($select=='p1'):
				foreach($p1 as $key):
					$post = get_post($key);
					$pid = $post->ID;
					$terms = get_the_terms($pid, 'fw-portfolio-category');
					$get_thumbnail_id = get_post_thumbnail_id($pid);
					$post_thumbnail = fw_resize($get_thumbnail_id, 340, 500, false);
					/*alt text*/
					$img_alt = (get_post_meta($get_thumbnail_id,'_wp_attachment_image_alt', true) != '') ? get_post_meta($get_thumbnail_id,'_wp_attachment_image_alt', true) : 'Project thumbnail';

					$liked = fw_get_db_post_option($pid, 'liked');
					if($liked == 0){
						$liked = $pid;
					}
		?>
		<div class="case-study" itemscope itemtype="http://schema.org/ImageObject">
			<div class="case-img">
				<img src="<?php echo esc_url($post_thumbnail); ?>" alt="<?php echo esc_attr($img_alt); ?>" itemprop='contentUrl'>
			</div>
			<div class="case-like">
				<span class="ion-ios-heart-outline"><?php echo esc_html($liked); ?></span>
			</div>
			<div class="case-overlay-banner"></div>
			<div class="case-readmore"><a href="<?php echo get_permalink($pid); ?>" class="case-readmore-btn"><?php esc_html_e('Read more +', 'topseo'); ?></a></div>
			<div class="case-overlay-info">
				<h3 class="case-name"><a href="<?php echo get_permalink($pid); ?>" class="case-name-btn"><?php echo get_the_title($pid); ?></a></h3>
				<?php if(!empty($terms)): ?>
					<div class="case-cate">
						<?php
							foreach($terms as $key):
								echo '<span><a href="'.$key->slug.'">'.$key->name.'</a></span>';
							endforeach;
						?>
					</div>
				<?php endif; ?>
			</div>
		</div>
		<?php
			endforeach;
			//CATEGORIES POST
			else:
				foreach($p2 as $key):
					$all_post = get_posts(
						array(
							'post_type' => 'fw-portfolio',
							'posts_per_page_per' => -1,
							'tax_query' => array(
								array(
									'taxonomy' => 'fw-portfolio-category',
									'field' => 'id',
									'terms' => $key
								)
							)
						)
					);
					foreach($all_post as $key){
						if(!in_array($key->ID, $arr)){
							array_push($arr, $key->ID);
						}
					}
				endforeach;
				foreach($arr as $key):
					$post = get_post($key);
					$pid = $post->ID;
					$terms = get_the_terms($pid, 'fw-portfolio-category');
					$get_thumbnail_id = get_post_thumbnail_id($pid);
					$post_thumbnail = fw_resize($get_thumbnail_id, 340, 500, false);
					/*alt text*/
					$img_alt = (get_post_meta($get_thumbnail_id,'_wp_attachment_image_alt', true) != '') ? get_post_meta($get_thumbnail_id,'_wp_attachment_image_alt', true) : 'Project thumbnail';

					$liked = fw_get_db_post_option($pid, 'liked');
					if($liked == 0){
						$liked = $pid;
					}
			?>
			<div class="case-study" itemscope itemtype="http://schema.org/ImageObject">
				<div class="case-img">
					<img src="<?php echo esc_url($post_thumbnail); ?>" alt="<?php echo esc_attr($img_alt); ?>" itemprop='contentUrl' />
				</div>
				<div class="case-like">
					<span class="ion-ios-heart-outline"><?php echo esc_html($liked); ?></span>
				</div>
				<div class="case-overlay-banner"></div>
				<div class="case-readmore"><a href="<?php echo get_permalink($pid); ?>" class="case-readmore-btn"><?php esc_html_e('Read more +', 'topseo'); ?></a></div>
				<div class="case-overlay-info">
					<h3 class="case-name"><a href="<?php echo get_permalink($pid); ?>" class="case-name-btn"><?php echo get_the_title($pid); ?></a></h3>
					<?php if(!empty($terms)): ?>
						<div class="case-cate">
							<?php
								foreach($terms as $key):
									echo '<span><a href="'.$key->slug.'">'.$key->name.'</a></span>';
								endforeach;
							?>
						</div>
					<?php endif; ?>
				</div>
			</div>
			<?php
				endforeach;
				endif;
			?>
	</div>
</div>
<?php
break;
}
?>
