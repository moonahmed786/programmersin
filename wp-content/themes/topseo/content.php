<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 * @package topseo
 */
?>
<div itemscope itemtype="https://schema.org/Blog">
	<article id="post-<?php the_ID(); ?>" itemid="<?php echo get_permalink(); ?>" <?php post_class('blog-post hentry'); ?> itemscope itemtype="http://schema.org/BlogPosting">
		<div class="flw" itemprop="mainEntityOfPage">
			<!-- Publisher  -->
			<div itemprop="publisher" itemscope="itemscope" itemtype="https://schema.org/Organization">
				<div itemprop="logo" itemscope="itemscope" itemtype="https://schema.org/ImageObject">
					<meta itemprop="url" content="<?php echo esc_url(home_url('/')); ?>" />
					<meta itemprop="width" content="100" />
					<meta itemprop="height" content="100" />
				</div>
				<meta itemprop="name" content="<?php the_author(); ?>" />
			</div>
			<!-- //Publisher  -->
			<!-- Modified date -->
			<span itemprop="dateModified" class="screen-reader-text">
				<time datetime="<?php echo esc_attr( get_the_modified_time( 'Y-m-d' ) ); ?>">
					<?php the_modified_date(); ?>
				</time>
			</span>
			<span class="screen-reader-text" itemprop="datePublished" content="<?php echo get_the_time('c'); ?>"></span>
			<!-- //Modified date -->
			<span class="screen-reader-text" itemprop="author"><?php the_author(); ?></span>
			<div class="entry-content">
				<?php
				$thumbnail = get_the_post_thumbnail_url();
				if(!empty($thumbnail)):
					global $post;
					$img_id  = get_post_thumbnail_id($post->ID);
					$img_alt = (get_post_meta($img_id,'_wp_attachment_image_alt', true) != '') ? get_post_meta($img_id,'_wp_attachment_image_alt', true) : 'Blog thumbnail';
					?>
					<div class="blog-post-cover" itemprop="image" itemscope itemtype="http://schema.org/ImageObject">
						<?php topseo_blog_post_top_left_info(); ?>
						<img src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo esc_attr($img_alt); ?>">
						<meta itemprop="url" content="<?php echo esc_url($thumbnail); ?>" />
						<meta itemprop="width" content="870" />
						<meta itemprop="height" content="420" />
					</div>
				<?php endif; ?>
				<div class="blog-post-info">
					<?php
					// detect page template
					topseo_blog_grid_template();
					// author - category
					top_seo_post_by();
					?>
					<div class="blog-post-sumary">
						<header>
							<?php topseo_post_title(); ?>
						</header>

						<?php
						if(is_single()) :
							echo '<div class="ht-content" itemprop="articleBody">';
							the_content();
							wp_link_pages();
							echo '</div>';
						else :
							?>
							<div class="blog-post-some-text" itemprop="description"><?php the_excerpt(); ?></div>
							<?php
						endif;
						if(!is_single()) :
							?>
							<div class="blog-btn-read-more"><a itemprop="url" href="<?php the_permalink(); ?>" class="ion-ios-list-outline"><?php esc_html_e('READ MORE', 'topseo'); ?></a></div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</article>
</div>
