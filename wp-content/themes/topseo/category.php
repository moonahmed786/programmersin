<?php
/**
 * The template for displaying Category pages
 */

get_header(); ?>

	<main id="main" class="page_content flw">
		<div class="container">
			<div class="row">
				<?php if ( have_posts() ) : ?>
				<div class="col-md-9 col-lg-9">
					<?php
						while ( have_posts() ) : the_post();
							get_template_part( 'content', get_post_format() );
						endwhile;
						topseo_paging_nav();
						else :
							get_template_part( 'content', 'none' );

						endif;
					?>
				</div>
				<div class="col-md-3 col-lg-3">
					<?php get_sidebar('sidebar-1'); ?>
				</div>
			</div>
		</div>
	</main>

<?php
get_footer();
