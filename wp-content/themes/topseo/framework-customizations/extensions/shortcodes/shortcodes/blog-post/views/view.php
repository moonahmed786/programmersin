<?php if (!defined('FW')) die('Forbidden');

$style 	 = $atts['style'];
$item = $atts['item'];
if($style=='s4'){
	echo '<div class="blog-post-crs-s4 flw">';
}

	foreach($item as $key):
		$post = get_post($key);
		$img_id  = get_post_thumbnail_id($key);
		$thumbnail = get_the_post_thumbnail_url($key);

		$author_id = get_post_field ('post_author', $key);
		$author_name = get_the_author_meta( 'nickname', $author_id );

		$img_alt = (get_post_meta($img_id,'_wp_attachment_image_alt', true) != '') ? get_post_meta($img_id,'_wp_attachment_image_alt', true) : 'Blog thumbnail';
		// style 1
		if($style=='s1'){
	?>
	<div class="our-blog-top-news flw">
		<?php echo '<h4><i class="ion-bookmark"></i><a href="'.get_permalink($key).'">'.get_the_title($key).'</a></h4>'; ?>
	</div>		
	<?php
		// style 2
		}elseif($style=='s2'){
	?>
	<div class="our-blog-special-item" itemid="<?php echo get_permalink($key); ?>" itemscope itemtype="http://schema.org/BlogPosting">
		<div itemprop="mainEntityOfPage">
			<!-- Publisher  -->
            <div itemprop="publisher" itemscope="itemscope" itemtype="https://schema.org/Organization">
                <div itemprop="logo" itemscope="itemscope" itemtype="https://schema.org/ImageObject">
                    <meta itemprop="url" content="<?php echo esc_url(home_url('/')); ?>" />
                    <meta itemprop="width" content="100" />
                    <meta itemprop="height" content="100" />
                </div>
                <meta itemprop="name" content="<?php echo esc_html($author_name); ?>" />
            </div>
            <!-- //Publisher  -->
            <!-- Modified date -->
            <span itemprop="dateModified" class="screen-reader-text">
                <time datetime="<?php echo esc_attr( get_the_modified_time( 'Y-m-d', $key ) ); ?>">
                    <?php echo esc_attr( get_the_modified_time( 'Y-m-d', $key ) ); ?>
                </time>
            </span>
            <!-- //Modified date -->
            <span class="screen-reader-text" itemprop="author"><?php echo esc_html($author_name); ?></span>
			<?php if(!empty($thumbnail)): ?>
				<div class="our-blog-special-img">
					<div class="our-blog-overlay">
						<div class="our-blog-special-rm">
							<a href="<?php echo get_permalink($key); ?>" class="our-blog-special-btn"><?php esc_html_e('Read more', 'topseo'); ?></a>
						</div>
					</div>
					<a href="<?php echo get_permalink($key); ?>">
						<div itemprop="image" itemscope itemtype="http://schema.org/ImageObject">
	                        <img src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo esc_attr($img_alt); ?>">
	                        <meta itemprop="url" content="<?php echo esc_url($thumbnail); ?>" />
	                        <meta itemprop="width" content="362" />
	                        <meta itemprop="height" content="246" />
	                    </div>
					</a>
				</div>
			<?php endif; ?>
			<div class="our-blog-special-content">
				<div class="our-blog-date" itemprop="datePublished" content="<?php echo get_the_time('c', $key); ?>"><?php echo get_the_date('d', $key).'<span>'.get_the_date('F', $key).'</span>'; ?></div>
				<h3 class="ourblog-name" itemprop="headline"><a href="<?php echo get_permalink($key); ?>"><?php echo get_the_title($key); ?></a></h3>
				<dl class="ourblog-bottom-info">
					<dt class="ion-ios-folder-outline"><?php echo get_the_category_list(', ', '', $key); ?></dt>
					<dd class="ion-ios-chatboxes-outline"><?php echo get_comments_number().esc_html__(' comments', 'topseo'); ?></dd>
				</dl>
				<p class="screen-reader-text" itemprop="description"><?php echo wp_kses_post($post->post_excerpt); ?></p>
			</div>
		</div>
	</div>
	<?php }elseif($style=='s3'){ //style 3 ?>
		<div class="our-blog-special-item blog-post-2-columns" itemid="<?php echo get_permalink($key); ?>" itemscope itemtype="http://schema.org/BlogPosting">
			<div itemprop="mainEntityOfPage">
				<!-- Publisher  -->
	            <div itempserrop="publisher" itemscope="itemscope" itemtype="https://schema.org/Organization">
	                <div itemprop="logo" itemscope="itemscope" itemtype="https://schema.org/ImageObject">
	                    <meta itemprop="url" content="<?php echo esc_url(home_url('/')); ?>" />
	                    <meta itemprop="width" content="100" />
	                    <meta itemprop="height" content="100" />
	                </div>
	                <meta itemprop="name" content="<?php echo esc_html($author_name); ?>" />
	            </div>
	            <!-- //Publisher  -->
	            <!-- Modified date -->
	            <span itemprop="dateModified" class="screen-reader-text">
	                <time datetime="<?php echo esc_attr( get_the_modified_time( 'Y-m-d', $key ) ); ?>">
	                    <?php echo esc_attr( get_the_modified_time( 'Y-m-d', $key ) ); ?>
	                </time>
	            </span>
	            <!-- //Modified date -->
	            <span class="screen-reader-text" itemprop="author"><?php echo esc_html($author_name); ?></span>
				<?php if(!empty($thumbnail)): ?>
				<div class="our-blog-special-img">
					<div class="our-blog-overlay">
						<div class="our-blog-special-rm"><a href="<?php echo get_permalink($key); ?>" class="our-blog-special-btn"><?php esc_html_e('Read more', 'topseo'); ?></a></div>
					</div>
					<a href="<?php echo get_permalink($key); ?>">
						<div itemprop="image" itemscope itemtype="http://schema.org/ImageObject">
	                        <img src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo esc_attr($img_alt); ?>">
	                        <meta itemprop="url" content="<?php echo esc_url($thumbnail); ?>" />
	                        <meta itemprop="width" content="362" />
	                        <meta itemprop="height" content="246" />
	                    </div>
					</a>
				</div>
				<?php endif; ?>
				<div class="our-blog-special-content">
					<div class="our-blog-date" itemprop="datePublished" content="<?php echo get_the_time('c', $key); ?>"><?php echo get_the_date('d', $key).'<span>'.get_the_date('F', $key).'</span>'; ?></div>
					<h3 class="ourblog-name" itemprop="headline"><a href="<?php echo get_permalink($key); ?>"><?php echo get_the_title($key); ?></a></h3>
					<dl class="ourblog-bottom-info">
						<dt class="ion-ios-folder-outline"><?php echo get_the_category_list(', ', '', $key); ?></dt>
						<dd class="ion-ios-chatboxes-outline"><?php echo get_comments_number().esc_html__(' comments', 'topseo'); ?></dd>
					</dl>
					<p class="screen-reader-text" itemprop="description"><?php echo wp_kses_post($post->post_excerpt); ?></p>
				</div>
			</div>
		</div>
	<?php }else{ //style 4 ?>
		<div class="our-bookmark-special-item">
			<div itemprop="mainEntityOfPage">
				<!-- Publisher  -->
	            <div itemprop="publisher" itemscope="itemscope" itemtype="https://schema.org/Organization">
	                <div itemprop="logo" itemscope="itemscope" itemtype="https://schema.org/ImageObject">
	                    <meta itemprop="url" content="<?php echo esc_url(home_url('/')); ?>" />
	                    <meta itemprop="width" content="100" />
	                    <meta itemprop="height" content="100" />
	                </div>
	                <meta itemprop="name" content="<?php echo esc_html($author_name); ?>" />
	            </div>
	            <!-- //Publisher  -->
	            <!-- Modified date -->
	            <span itemprop="dateModified" class="screen-reader-text">
	                <time datetime="<?php echo esc_attr( get_the_modified_time( 'Y-m-d', $key ) ); ?>">
	                    <?php echo esc_attr( get_the_modified_time( 'Y-m-d', $key ) ); ?>
	                </time>
	            </span>
	            <!-- //Modified date -->
	            <span class="screen-reader-text" itemprop="author"><?php echo esc_html($author_name); ?></span>
				<?php if(!empty($thumbnail)): ?>
				<div class="our-blog-special-img">
					<div class="our-blog-overlay">
						<div class="our-blog-special-rm"><a href="<?php echo get_permalink($key); ?>" class="our-blog-special-btn"><?php esc_attr_e('Read more', 'topseo'); ?></a></div>
					</div>
					<a href="<?php echo get_permalink($key); ?>">
						<div itemprop="image" itemscope itemtype="http://schema.org/ImageObject">
	                        <img src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo esc_attr($img_alt); ?>">
	                        <meta itemprop="url" content="<?php echo esc_url($thumbnail); ?>" />
	                        <meta itemprop="width" content="362" />
	                        <meta itemprop="height" content="246" />
	                    </div>
					</a>
				</div>
				<?php endif; ?>
				<div class="our-blog-special-content">
					<div class="our-blog-date" itemprop="datePublished" content="<?php echo get_the_time('c', $key); ?>"><?php echo get_the_date('d', $key).'<span>'.get_the_date('F', $key).'</span>'; ?></div>
					<h3 class="ourblog-name" itemprop="headline"><a href="<?php echo get_permalink($key); ?>"><?php echo get_the_title($key); ?></a></h3>
					<dl class="ourblog-bottom-info">
						<dt class="ion-ios-folder-outline"><?php echo get_the_category_list(', ', '', $key); ?></dt>
						<dd class="ion-ios-chatboxes-outline"><?php echo get_comments_number().esc_html__(' comments', 'topseo'); ?></dd>
					</dl>
					<p class="screen-reader-text" itemprop="description"><?php echo wp_kses_post($post->post_excerpt); ?></p>
				</div>
			</div>
		</div>
	<?php
		}
		endforeach;
		if($style=='s4'){
			echo '</div';
		}
?>