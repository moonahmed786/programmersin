<?php
/**
 * The template for displaying Search Results pages
 */

get_header(); ?>
	<main id="main" class="page_content blog-single flw">
		<div class="container">
			<div class="row">
				<div class="col-md-9 col-lg-9">
					<?php
						if ( have_posts() ) :
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
