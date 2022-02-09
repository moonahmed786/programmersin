<?php
function markethon_pagination($numpages = '', $pagerange = '', $paged='') 
{
	if (empty($pagerange)) {
	$pagerange = 2;
	}
	global $paged;
	if (empty($paged)) {
	$paged = 1;
	}
	if ($numpages == '') {
	global $wp_query;
	$numpages = $wp_query->max_num_pages;
	if(!$numpages) {
		$numpages = 1;
	}
	}
	/**
	* We construct the pagination arguments to enter into our paginate_links
	* function.
	*/
	$pagination_args = array(
		'format'		  => '?paged=%#%',
		'total'           => $numpages,
		'current'         => $paged,
		'show_all'        => False,
		'end_size'        => 1,
		'mid_size'        => $pagerange,
		'prev_next'       => True,
		'prev_text'       => '<span aria-hidden="true">'. esc_html__( 'Previous page', 'markethon' ) .'</span>',
		'next_text'       => '<span aria-hidden="true">'. esc_html__( 'Next page', 'markethon' ) .'</span>',
		'type'            => 'list',
		'add_args'        => false,
		'add_fragment'    => ''
		);
		
	$paginate_links = paginate_links($pagination_args);
	if ($paginate_links) {
		echo '<div class="row">';
			echo '<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="pagination justify-content-center">
					<nav aria-label="Page navigation">';
						printf( esc_html__('%s','markethon'),$paginate_links);
					echo '</nav>
				</div>
			</div>
		</div>';
	}
}
?>