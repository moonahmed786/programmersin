<?php
/**
 * The template for displaying posts in the Video post format
 */
$video_type = (function_exists('fw_get_db_post_option') ? fw_get_db_post_option($post->ID, 'video_type') : '');
$video_url = (function_exists('fw_get_db_post_option') ? fw_get_db_post_option($post->ID, 'video_url') : '');
?>
<div itemscope itemtype="https://schema.org/Blog">
	<article id="post-<?php the_ID(); ?>" class="blog-post post-type-video hentry-content" itemid="<?php echo get_permalink(); ?>" itemscope itemtype="http://schema.org/BlogPosting">
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
			<div class="screen-reader-text" itemprop="image" itemscope itemtype="http://schema.org/ImageObject">
				<img src="<?php echo get_template_directory_uri() . '/images/thumbnail-default.jpg'; ?>" alt="<?php esc_attr_e('Blog thumbnail', 'topseo'); ?>">
				<meta itemprop="url" content="<?php echo get_template_directory_uri() . '/images/thumbnail-default.jpg'; ?>" />
				<meta itemprop="width" content="870" />
				<meta itemprop="height" content="420" />
			</div>
			<div class="entry-content use-plyr-render">
				<?php if(!empty($video_url)) : ?>
					<div class="blog-post-cover">
						<?php topseo_blog_post_top_left_info(); ?>
						<div data-type="<?php echo esc_attr($video_type); ?>" data-video-id="<?php echo esc_attr($video_url); ?>" class="blog-post-video-atc"></div>
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
							echo '<div class="ht-content" itemprop="description">';
							the_content();
							wp_link_pages();
							echo '</div>';
						else :
							?>
							<div class="blog-post-some-text"><?php the_excerpt(); ?></div>
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