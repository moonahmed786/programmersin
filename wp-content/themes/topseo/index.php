<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package topseo
 */
$c_blog_layout = get_theme_mod( 'c_blog_layout', $default = 'right' );
get_header(); ?>
<main id="main" class="page_content blog-page flw">
	<div class="container">
		<div class="row">
			<?php if($c_blog_layout == 'right') : ?>
				<div class="col-md-9 col-lg-9">
					<?php
						get_template_part( 'page-templates/blog', 'structure' );
					?>
				</div>
				<div class="col-md-3 col-lg-3">
					<?php get_sidebar(); ?>
				</div>
			<?php elseif($c_blog_layout == 'left') : ?>
				<div class="col-md-3 col-lg-3">
					<?php get_sidebar(); ?>
				</div>
				<div class="col-md-9 col-lg-9">
					<?php
						get_template_part( 'page-templates/blog', 'structure' );
					?>
				</div>
			<?php else : ?>
				<div class="col-md-12 col-lg-12">
					<?php
						get_template_part( 'page-templates/blog', 'structure' );
					?>
				</div>
			<?php endif; ?>
			
		</div>
	</div>
</main>
<?php get_footer(); ?>
