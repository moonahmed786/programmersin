<?php
/**
 * The template for displaying a "No posts found" message
 */
?>

<article class="<?php post_class('page-search flw hentry'); ?>">
	<div class="entry-conten">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php esc_html__( 'Ready to publish your first post?', 'topseo' ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'topseo' ); ?></p>
			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php esc_html_e( 'It seems we can not find what you are looking for. Perhaps searching can help.', 'topseo' ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>
	</div>
</article>
