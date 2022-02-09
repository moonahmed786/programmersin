<?php
/**
 *	Template Name: Page Landing
 */
get_header('landing');
?>
<div id="mainview" class="flw">
	<div class="page-landing flw">
		<?php
			while ( have_posts() ) : the_post();
				get_template_part('content', 'page');
			endwhile;
		?>
	</div>
</div>
<?php get_footer('landing'); ?>