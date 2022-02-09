<?php
/**
 *	Template Name: Blog 3 Columns
 */
get_header(); ?>
<main id="main" class="page_content blog-page blog-3-columns flw">
	<div class="container">
		<div class="row">
			<?php
			    if ( get_query_var('paged') ) {
			    	$paged = get_query_var('paged');
			    }elseif ( get_query_var('page') ){
			    	$paged = get_query_var('page');
			    }else {
			    	$paged = 1;
			    }

			    $temp = $wp_query;  // re-sets query
			    $wp_query = null;   // re-sets query
			    $args = array( 'post_type' => 'post', 'posts_per_page' => 6, 'paged' => $paged);
			    $wp_query = new WP_Query();
			    $wp_query->query( $args );
			    while ($wp_query->have_posts()) : $wp_query->the_post(); 
			?>
			<div class="col-md-4 col-lg-4 blog-3-columns-item">
				<?php get_template_part( 'content', get_post_format() ); ?>
			</div>
				<?php endwhile; ?>
   			<?php
   				echo topseo_post_count();
   				topseo_paging_nav(); 
   				$wp_query = null;
   				$wp_query = $temp; // Reset
			?>
		</div>
	</div>
</main>
<?php get_footer(); ?>
