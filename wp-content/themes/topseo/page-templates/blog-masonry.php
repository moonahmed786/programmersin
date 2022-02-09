<?php
/**
 *	Template Name: Blog Masonry
 */
get_header();
?>
<main id="main" class="page_content blog-page blog-masonry flw">
	<div class="container">
		<div class="row blog-masonry-grid">
			<?php
				if ( get_query_var('paged') ) {
					$paged = get_query_var('paged');
				} elseif ( get_query_var('page') ) {
					$paged = get_query_var('page');
				} else {
					$paged = 1;
				}
				$query_masonry = new WP_Query(array(
					'post_type' => 'post', 
					'paged' => $paged, 
					'posts_per_page' => 3
				));
				if ($query_masonry->have_posts()) :
					while ($query_masonry->have_posts() ) : $query_masonry->the_post();
						echo '<div class="blog-masonry-item">';
						get_template_part( 'content', get_post_format() );
						echo '</div>';
					endwhile;

				else :
					get_template_part( 'content', 'none' );
				endif;
				wp_reset_postdata();
			?>
		</div>
		<?php topseo_paging_nav($query_masonry); ?>
	</div>
</main>
<?php get_footer(); ?>