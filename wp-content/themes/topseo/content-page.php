<?php
/**
 * The template used for displaying page content
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('hentry'); ?>>
	<div class="flw entry-content">
		<?php
			echo '<div class="ht-content" itemprop="description">';
			the_content();
			wp_link_pages();
			echo '</div>';
		?>
	</div>
</article>
