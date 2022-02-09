<?php
/**
 * The Template for displaying all single posts
 */
get_header(); 
$c_blog_layout = get_theme_mod( 'c_blog_layout', $default = 'right' ); // blog layout from Customizer 
$fw_page_layout = ( function_exists('fw_ext_sidebars_get_current_position') ) ? fw_ext_sidebars_get_current_position() : 'full'; // page layout from Sidebar Extension

?>

<main id="main" class="page_content blog-single flw">
	<?php if($post_type == 'fw-portfolio') {
		while ( have_posts() ) : the_post();
			get_template_part( 'content-case', get_post_format() );
		endwhile;
	}else{ ?>
	<div class="container">
		<div class="row">
		<?php if($c_blog_layout == 'right') : ?>
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="col-md-9 col-lg-9">
						<?php get_template_part( 'content', get_post_format() ); ?>
						<!-- BOX AUTHOR -->
						<div class="blog-single-author flw">
							<div class="flw box-author-top">
								<?php if(has_tag()) : ?>
									<div class="blog-single-tags">
										<span class="ion-ios-pricetag"><?php esc_html_e('Tags:', 'topseo'); ?> </span>
										<?php the_tags('', ', ', ''); ?>
									</div>
								<?php endif; ?>
							</div>
							<?php
							/**
							* Get author post meta
							* inc/helper
							*/
							topseo_post_author();
							?>
						</div>
						<!-- //BOX AUTHOR -->

						<!-- Single POST Nav-->
						<?php topseo_theme_post_nav(); ?>
						<!-- //Single POST Nav-->
						<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) {
						comments_template();
						}
						?>		
					</div>
				<?php endwhile; ?>
			<?php else : ?>
				<?php get_template_part('content', 'none') ; ?>
			<?php endif; ?>
			<div class="col-md-3 col-lg-3">
				<?php get_sidebar('content'); ?>
			</div>
		</div>
		<?php elseif($c_blog_layout == 'left') : ?>
			<div class="col-md-3 col-lg-3">
				<?php get_sidebar('content'); ?>
			</div>
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="col-md-9 col-lg-9">
						<?php get_template_part( 'page-templates/blog-structure', 'single' ); ?>
					</div>
				<?php endwhile; ?>
			<?php else : ?>
				<?php get_template_part('content', 'none') ; ?>
			<?php endif; ?>
		<?php elseif($c_blog_layout == 'full') : ?>
			<div class="col-md-12 col-lg-12">
				<?php get_template_part( 'page-templates/blog-structure', 'single' ); ?>
			</div>
		<?php else : ?>
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'page-templates/blog-structure', 'single' ); ?>
				<?php endwhile; ?>
			<?php else : ?>
				<?php get_template_part('content', 'none') ; ?>
			<?php endif; ?>
			<div class="col-md-3 col-lg-3">
				<?php get_sidebar(); ?>
			</div>
		<?php endif; ?>
	</div>
	<?php } ?>
</main>
<?php get_footer(); ?>
