<?php
/**
 * The template used for displaying Case Studies Single
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('hentry'); ?>>
	<div class="flw entry-content">
		<?php
			$fw_page_layout = ( function_exists('fw_ext_sidebars_get_current_position') ) ? fw_ext_sidebars_get_current_position() : 'full';
			if( function_exists('fw_ext_page_builder_is_builder_post')  && fw_ext_page_builder_is_builder_post($post->ID) ) {
				// When page builder activate and sidebar extension
				switch ($fw_page_layout) {
					case 'left':
						echo '<div class="container">
						<div class="row">';
							echo '<div class="col-md-3 col-lg-3">';
								get_sidebar('content');
							echo '</div>';

							echo '<div class="col-md-9 col-lg-9">';
								the_content();
							echo '</div>';

						echo '</div></div>';
						break;

					case 'right':
						echo '<div class="container">
						<div class="row">';
							echo '<div class="col-md-9 col-lg-9">';
								the_content();
							echo '</div>';
							echo '<div class="col-md-3 col-lg-3">';
								get_sidebar('content');
							echo '</div>';
						echo '</div></div>';
						break;

					default:
						the_content();
						break;
					}

			}else{
				switch ($fw_page_layout) {
					case 'left':
						echo '<div class="container">
						<div class="row">';
							echo '<div class="col-md-3 col-lg-3">';
								get_sidebar('content');

							echo '</div>';

							echo '<div class="col-md-9 col-lg-9">';
								the_content();
								if ( comments_open() || get_comments_number() ) {
									comments_template();
								}
							echo '</div>';

						echo '</div></div>';
						break;

					case 'right':
						echo '<div class="container">
						<div class="row">';
							echo '<div class="col-md-9 col-lg-9">';
								the_content();
								if ( comments_open() || get_comments_number() ) {
									comments_template();
								}
							echo '</div>';
							echo '<div class="col-md-3 col-lg-3">';
								get_sidebar('content');
							echo '</div>';
						echo '</div></div>';
						break;

					default:
						echo '<div class="container topseo-start-page">';
						the_content();
						if ( comments_open() || get_comments_number() ) {
							comments_template();
						}
						echo '</div>';
						break;
				}
			}
		?>
	</div>
</article>
