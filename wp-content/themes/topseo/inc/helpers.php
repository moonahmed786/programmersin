<?php
// @codingStandardsIgnoreStart
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

/* Helper functions and classes with static methods for usage in theme */

// Register Lato Google font
if(!function_exists('topseo_font_url')){
	function topseo_font_url() {
		$fonts_url = '';
		/* Translators: If there are characters in your language that are not
	    * supported by Lato, translate this to 'off'. Do not translate
	    * into your own language.
	    */
		$lato = esc_html_x( 'on', 'Lato font: on or off', 'topseo' );

		/* Translators: If there are characters in your language that are not
	    * supported by Open Sans, translate this to 'off'. Do not translate
	    * into your own language.
	    */
		$montserrat = esc_html_x( 'on', 'Montserrat font: on or off', 'topseo' );

		if (  'off' !== $lato || 'off' !== $montserrat) {
			$font_families = array();

			if ( 'off' !== $lato ) {
				$font_families[] = 'Lato:700,400,800,600,300';
			}

			if ( 'off' !== $montserrat ) {
				$font_families[] = 'Montserrat:700,400,800,600';
			}

			$query_args = array(
				'family' => urlencode( implode( '|', $font_families ) ),
				'subset' => urlencode( 'latin,latin-ext' ),
			);

			$fonts_url = add_query_arg( $query_args, "//fonts.googleapis.com/css" );
		}

		return esc_url_raw( $fonts_url );
	}
}

if ( ! function_exists('topseo_the_attached_image') ) : /**
 * Print the attached image with a link to the next attached image.
 */ {
	function topseo_the_attached_image() {
		$post = get_post();
		/**
		 * Filter the default attachment size.
		 *
		 * @param array $dimensions {
		 *     An array of height and width dimensions.
		 *
		 * @type int $height Height of the image in pixels. Default 810.
		 * @type int $width Width of the image in pixels. Default 810.
		 * }
		 */
		$attachment_size     = apply_filters( 'topseo_attachment_size', array( 810, 810 ) );
		$next_attachment_url = wp_get_attachment_url();

		/*
		 * Grab the IDs of all the image attachments in a gallery so we can get the URL
		 * of the next adjacent image in a gallery, or the first image (if we're
		 * looking at the last image in a gallery), or, in a gallery of one, just the
		 * link to that image file.
		 */
		$attachment_ids = get_posts( array(
			'post_parent'    => $post->post_parent,
			'fields'         => 'ids',
			'numberposts'    => - 1,
			'post_status'    => 'inherit',
			'post_type'      => 'attachment',
			'post_mime_type' => 'image',
			'order'          => 'ASC',
			'orderby'        => 'menu_order ID',
		) );

		// If there is more than 1 attachment in a gallery...
		if ( count( $attachment_ids ) > 1 ) {
			foreach ( $attachment_ids as $attachment_id ) {
				if ( $attachment_id == $post->ID ) {
					$next_id = current( $attachment_ids );
					break;
				}
			}

			// get the URL of the next image attachment...
			if ( $next_id ) {
				$next_attachment_url = get_attachment_link( $next_id );
			} // or get the URL of the first image attachment.
			else {
				$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
			}
		}

		printf( '<a href="%1$s" rel="attachment">%2$s</a>',
			esc_url( $next_attachment_url ),
			wp_get_attachment_image( $post->ID, $attachment_size )
		);
	}
}
endif;

if ( ! function_exists( 'topseo_list_authors' ) ) : /**
 * Print a list of all site contributors who published at least one post.
 */ {
	function topseo_list_authors() {
		$contributor_ids = get_users( array(
			'fields'  => 'ID',
			'orderby' => 'post_count',
			'order'   => 'DESC',
			'who'     => 'authors',
		) );

		foreach ( $contributor_ids as $contributor_id ) :
			$post_count = count_user_posts( $contributor_id );

			// Move on if user has not published a post (yet).
			if ( ! $post_count ) {
				continue;
			}
			?>

			<div class="contributor">
				<div class="contributor-info">
					<div class="contributor-avatar"><?php echo get_avatar( $contributor_id, 132 ); ?></div>
					<div class="contributor-summary">
						<h2 class="contributor-name"><?php echo get_the_author_meta( 'display_name',
								$contributor_id ); ?></h2>

						<p class="contributor-bio">
							<?php echo get_the_author_meta( 'description', $contributor_id ); ?>
						</p>
						<a class="button contributor-posts-link"
						   href="<?php echo esc_url( get_author_posts_url( $contributor_id ) ); ?>">
						</a>
					</div>
					<!-- .contributor-summary -->
				</div>
				<!-- .contributor-info -->
			</div><!-- .contributor -->

		<?php
		endforeach;
	}
}
endif;

/* Custom template tags */
{
	if ( ! function_exists( 'topseo_paging_nav' ) ) : /**
	 * Display navigation to next/previous set of posts when applicable.
	 */ {
		function topseo_paging_nav( $wp_query = null ) {

			if ( ! $wp_query ) {
				$wp_query = $GLOBALS['wp_query'];
			}

			// Don't print empty markup if there's only one page.

			if ( $wp_query->max_num_pages < 2 ) {
				return;
			}
			$infinite_scroll = (function_exists('fw_get_db_customizer_option')) ? fw_get_db_customizer_option('infinite_scroll') : 'yes';
			$style = '';
			if($infinite_scroll == 'no'){
				$style = ('style="display: block;"');
			}
			$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
			$pagenum_link = html_entity_decode( get_pagenum_link() );
			$query_args   = array();
			$url_parts    = explode( '?', $pagenum_link );

			if ( isset( $url_parts[1] ) ) {
				wp_parse_str( $url_parts[1], $query_args );
			}

			$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
			$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

			$format = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link,
				'index.php' ) ? 'index.php/' : '';
			$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%',
				'paged' ) : '?paged=%#%';

			// Set up paginated links.
			$links = paginate_links( array(
				'base'      => $pagenum_link,
				'format'    => $format,
				'total'     => $wp_query->max_num_pages,
				'current'   => $paged,
				'mid_size'  => 1,
				'add_args'  => array_map( 'urlencode', $query_args ),
				'prev_text' => '',
				'next_text' => '',
				'type' 		=> 'list'
			) );

			if ( $links ) :

				?>
				<nav class="navigation paging-navigation" role="navigation" <?php echo ($style); ?>>
					<h1 class="screen-reader-text"><?php esc_html_e( 'Posts navigation', 'topseo' ); ?></h1>

					<ul class="pagination float-right">
						<?php echo wp_kses($links,
						array(
							'ul' => array(
								'class' => array(),
							),
							'li' => array(),
							'span' => array(
								'class' => array(),
							),
							'a' => array(
								'class' => array(),
								'href' => array(),
							),
						)); ?>
					</ul>
					<!-- .pagination -->
				</nav><!-- .navigation -->
			<?php
			endif;
		}
	}
	endif;

	if ( ! function_exists( 'topseo_posted_on' ) ) : /**
	 * Print HTML with meta information for the current post-date/time and author.
	 */ {
		function topseo_posted_on() {
			$post_date = get_the_date('d');
			$post_m = get_the_date('M');
			$post_y = get_the_date('Y');
			$post_comment = get_comments_number();

			$post_info = '<div class="blog-post-date-number">'.$post_date.'</div>';
			$post_info .= '<div class="blog-post-date-text">
				<span class="blog-post-year-text">'.$post_y.'</span>
				<span class="blog-post-month-text">'.$post_m.'</span>
			</div>';
			$post_info .= '<div class="blog-post-under-date">
				<span class="ion-ios-folder-outline">';

			$categories = get_the_category();
			$separator = ', ';
			$output = '';
			if ( ! empty( $categories ) ) {
				foreach( $categories as $category ) {
					$output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" title="' . esc_attr( sprintf( esc_html__( 'View all posts in %s', 'topseo' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
				}
				$post_info .= trim( $output, $separator );
			}

			$post_info .= '</span>';
			if(comments_open()){
				if ( $post_comment == 0 ) {
					$comments = esc_html__('No Comments', 'topseo');
				} elseif ( $post_comment > 1 ) {
					$comments = $post_comment . esc_html__(' Comments', 'topseo');
				} else {
					$comments = esc_html__('1 Comment', 'topseo');
				}
				$post_info .= '<span class="ion-ios-chatboxes-outline">';
				$post_info .= $comments;
				$post_info .= '</span>';
			}


			$post_info .= '</div>';

			return $post_info;

		}
	}
	endif;

	if(!function_exists('topseo_blog_grid_template')):
		/*
		Detect page template
		*/
		{
			function topseo_blog_grid_template(){
				$page_template = get_page_template_slug(get_queried_object_id());
				$the_time = get_the_date();
				if($page_template == '' || $page_template == 'page-templates/blog-2-columns.php'){
					echo '<div itemprop="commentCount" datetime="'. $the_time .'" class="blog-post-date">'.topseo_posted_on().'</div>';
				}
			}
		}
	endif;

	if(!function_exists('topseo_blog_post_top_left_info')):
		// blog post info top left blog masonry
		{
			function topseo_blog_post_top_left_info(){
				$page_template = get_page_template_slug(get_queried_object_id());
				$the_time = get_the_date();
				if($page_template == 'page-templates/blog-masonry.php'){
					echo '<div class="blog-post-top-left-info">
							<div class="top-info-date" itemprop="datePublished" content="'. get_the_time('c') .'">
								<b>'.get_the_date('d').'</b>
								<span>'.get_the_date('M').'</span>
							</div>
							<div class="bottom-info-cmt">
								<span class="cmt-icon"></span>
								<span class="cmt-count" itemprop="commentCount">'.get_comments_number().'</span>
							</div>
						</div>';
				}
			}
		}
	endif;

	if(!function_exists('top_seo_post_by')):
		// post by author - category blog masonry
		{
			function top_seo_post_by(){
				$page_template = get_page_template_slug(get_queried_object_id());
				$by = esc_html__('By: ', 'topseo');
				$in = esc_html__('In: ', 'topseo');
				if($page_template == 'page-templates/blog-masonry.php'){
					echo '<ul class="blog-masonry-post-by">
						<li itemprop="author">'.$by.' <a href="'.esc_url(get_author_posts_url(get_the_author_meta('ID'))).'">'.get_the_author().'</a></li>
						<li itemprop="articleSection">'.$in.' '.get_the_category_list(', ').'</li>
					</ul>';
				}
			}
		}
	endif;

	if( !function_exists('topseo_post_count')) {
		function topseo_post_count(){
			$post_count = wp_count_posts();
			$post_count_number = $post_count->publish;
			$post_per_page = get_option('posts_per_page');

			$post_count_result = '<ul class="blog-total-post float-left">';
			$post_count_result .= '<li>'.esc_html__("Total", "topseo").' <a href="#">'.$post_count_number.' '.esc_html__("news", "topseo").'</a> '.esc_html__("in our Blog", "topseo").'</li>';
			$post_count_result .= '<li>'.esc_html__("Showing", "topseo").' <a href="#">'.$post_per_page.'/'.$post_count_number.'</a> '.esc_html__("items", "topseo").'</li>';
			$post_count_result .= '</ul>';

			return $post_count_result;
		}
	}

	if(! function_exists('topseo_post_author')) :
		/**
		 * Display Author of post
		 */
		function topseo_post_author(){
			$author_desc = get_the_author_meta('description');
			if($author_desc != '') :
				?>
				<div class="blog-single-author-box">
					<div class="author-avatar">
						<div class="author-avatar-img">
							<img src="<?php echo get_avatar_url(get_the_author_meta('ID')); ?>" alt="<?php echo esc_attr__('Avatar', 'topseo'); ?>">
						</div>
						<div class="author-social-box">
							<ul class="author-avatar-social">
								<li><a href="#" class="ion-social-facebook"></a></li>
								<li><a href="#" class="ion-social-twitter"></a></li>
								<li><a href="#" class="ion-social-googleplus"></a></li>
							</ul>
						</div>
					</div>
					<div class="author-info">
						<h3 class="author-name"><a href="#"><?php the_author_meta('user_nicename'); ?></a></h3>
						<span class="author-role"><?php the_author_meta('position'); ?></span>
						<p class="author-desc"><?php the_author_meta('description'); ?></p>
					</div>
				</div>
				<?php
			endif;
		}
	endif;

	if ( ! function_exists('topseo_theme_post_nav') ) : /**
	 * Display navigation to next/previous post when applicable.
	 */ {
		function topseo_theme_post_nav() {
			// Don't print empty markup if there's nowhere to navigate.
			$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '',
				true );
			$next     = get_adjacent_post( false, '', false );

			if ( ! $next && ! $previous ) {
				return;
			}
			if(!empty($previous)){
				$pre_link = get_permalink($previous);
				$pre_post_id = $previous->ID;
				$pre_post_thumb = wp_get_attachment_image_src( get_post_thumbnail_id($pre_post_id), 'thumbnail' );
			}
			if(!empty($next)){
				$next_link = get_permalink($next);
				$next_post_id = $next->ID;
				$next_post_thumb = wp_get_attachment_image_src( get_post_thumbnail_id($next_post_id), 'thumbnail' );
			}

			?>

			<div class="blot-related-post flw">
				<?php
				if( is_attachment() ):
				?>
				<?php if(!empty($previous)){ ?>
					<div class="prev-post">
						<?php if($pre_post_thumb != false) : ?>
							<div class="control-post-img">
								<img src="<?php echo esc_url($pre_post_thumb[0]); ?>"
									 alt="<?php esc_attr_e('Post nav thumb', 'topseo'); ?>">
							</div>
						<?php endif; ?>
						<div class="control-post-desc">
							<h3 class="control-post-name"><?php previous_post_link('%link'); ?></h3>
							<a href="<?php echo esc_url($pre_link); ?>" class="control-post-btn"><?php esc_html_e('Previous', 'topseo'); ?></a>
						</div>
					</div>
				<?php } ?>
				<?php else : ?>
				<?php if(!empty($previous)){ ?>
					<div class="prev-post">
						<?php if($pre_post_thumb != false) : ?>
							<div class="control-post-img">
								<img src="<?php echo esc_url($pre_post_thumb[0]); ?>"
									 alt="<?php esc_attr_e('Post nav thumb', 'topseo'); ?>">
							</div>
						<?php endif; ?>
						<div class="control-post-desc">
							<h3 class="control-post-name"><?php previous_post_link('%link'); ?></h3>
							<a href="<?php echo esc_url($pre_link); ?>" class="control-post-btn"><?php esc_html_e('Previous', 'topseo'); ?></a>
						</div>
					</div>
				<?php } ?>
				<?php if(!empty($next)){ ?>
					<div class="next-post">
						<?php if($next_post_thumb != false) : ?>
							<div class="control-post-img">
								<img src="<?php echo esc_url($next_post_thumb[0]); ?>"
									 alt="<?php esc_attr_e('Post nav thumb', 'topseo'); ?>">
							</div>
						<?php endif; ?>
						<div class="control-post-desc">
							<h3 class="control-post-name"><?php next_post_link('%link'); ?></h3>
							<a href="<?php echo esc_url($next_link); ?>" class="control-post-btn"><?php esc_html_e('Next', 'topseo'); ?></a>
						</div>
					</div>
				<?php } ?>
				<?php endif; ?>
			</div>
			<?php
		}
	}
	endif;

	/**
	 * Find out if blog has more than one category.
	 *
	 * @return boolean true if blog has more than 1 category
	 */
	function topseo_categorized_blog() {
		if ( false === ( $all_the_cool_cats = get_transient( 'topseo_category_count' ) ) ) {
			// Create an array of all the categories that are attached to posts
			$all_the_cool_cats = get_categories( array(
				'hide_empty' => 1,
			) );

			// Count the number of categories that are attached to the posts
			$all_the_cool_cats = count( $all_the_cool_cats );

			set_transient( 'topseo_category_count', $all_the_cool_cats );
		}

		if ( 1 !== (int) $all_the_cool_cats ) {
			// This blog has more than 1 category so topseo_categorized_blog should return true
			return true;
		} else {
			// This blog has only 1 category so topseo_categorized_blog should return false
			return false;
		}
	}

}

// Custom template tags and functions by HAINTHEME
{
	/**
	 * Custom comment output.
	 */
	function topseo_comment_list($comment, $args, $depth)
	{
		$GLOBALS['comment'] = $comment; ?>
		<div id="comment-<?php comment_ID(); ?>">
			<div class="comment-body">
				<div class="comment-avatar vcard">
					<?php echo get_avatar($comment,$size='90'); ?>
				</div>
				<div class="comment-content">
					<div class="comment-author">
						<a href="<?php echo esc_url(get_comment_author_link()); ?>" class="comment-author-name"><?php echo get_comment_author(); ?></a>
						<div class="comment-time"><?php echo get_comment_date(); ?></div>
					</div>
					<div class="comment-text">
						<?php if ($comment->comment_approved == '0') : ?>
							<em><?php esc_html_e('Your comment is awaiting moderation.', 'topseo') ?></em>
							<br/>
						<?php endif; ?>

						<p><?php comment_text() ?></p>

					</div>
					<?php edit_comment_link(esc_html__('(Edit)', 'topseo'), '  ', '') ?>
					<?php
					$myclass = 'fa fa-reply comment-btn-reply';
					echo preg_replace( '/comment-reply-link/', 'comment-reply-link ' . $myclass,
						get_comment_reply_link(array_merge( $args, array(
							'depth' => $depth,
							'reply_text' => '',
							'max_depth' => $args['max_depth']))), 1 );
					?>
					<!-- /.comment-content-inner -->

				</div>
			</div>
		</div>
	<?php
	}
}

// Display rating of testinominal
if ( ! function_exists( 'topseo_testimonial_rating' ) ) {
	function topseo_testimonial_rating($rating){
		for($x = 0; $x < $rating; $x++): ?>
			<span class="fa fa-star"></span>
		<?php endfor; ?>
		<?php
		if($rating != 5) :
			for($i = 0; $i < 5-$rating; $i++) :?>
				<span class="fa fa-star-o"></span>
				<?php
			endfor;
		endif;
	}
}

// remove default woocomerce style sheet
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

// check yith woocommerce active or deactive
if(class_exists('YITH_WCWL')){
	function topseo_check_yith_enable_or_disable(){
		echo do_shortcode( "[yith_wcwl_add_to_wishlist]" );
	}
	add_action( 'woocommerce_after_shop_loop_item', 'topseo_check_yith_enable_or_disable', 10 );
}

//replace more tag
function topseo_excerpt( $more ) {
	if ( is_admin() ) {
		return $more;
	}

	return '...';
}
add_filter( 'excerpt_more', 'topseo_excerpt' );

// Get shortcode options (style inline)
if ( ! function_exists( 'topseo_shortcode_options' ) ) {
	function topseo_shortcode_options( $data, $shortcode ){
		$atts = shortcode_parse_atts( $data['atts_string'] );
	    $atts = fw_ext_shortcodes_decode_attr($atts, $shortcode, $data['post']->ID);
		return $atts;
	}
}

//disable default shortcode
function topseo_disable_shortcodes($to_disable){
	$to_disable[] = 'calendar';
	$to_disable[] = 'icon';
	$to_disable[] = 'notification';
	$to_disable[] = 'widget_area';
	return $to_disable;
}
add_filter('fw_ext_shortcodes_disable_shortcodes', 'topseo_disable_shortcodes');

/*----CONTACT FORM 7----*/

// disable css of contact form 7
add_filter( 'wpcf7_load_css', '__return_false' );

/* Custom ajax loader */
function topseo_wpcf7_ajax_loader () {
	return  get_template_directory_uri() . '/images/contact-form-loader.gif';
}
add_filter('wpcf7_ajax_loader', 'topseo_wpcf7_ajax_loader');

//remove query strings
function topseo_remove_script_version( $src ){
	$parts = explode( '?ver', $src );
	return $parts[0];
}
add_filter( 'script_loader_src', 'topseo_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', 'topseo_remove_script_version', 15, 1 );

if(class_exists('Woocommerce' )){
	# Only load CSS and JS on Woocommerce pages
	function topseo_load_woocommerce_js_css(){
		remove_action( 'wp_head', array( $GLOBALS['woocommerce'], 'generator' ) );
		// Unless we're in the store, remove all the cruft!
		if ( ! is_woocommerce() && ! is_cart() && ! is_checkout() ) {
			wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
			wp_dequeue_style( 'jquery-selectBox' );
			wp_dequeue_script( 'wc-add-payment-method' );
			wp_dequeue_script( 'wc-lost-password' );
			wp_dequeue_script( 'wc_price_slider' );
			wp_dequeue_script( 'wc-single-product' );
			wp_dequeue_script( 'wc-add-to-cart' );
			wp_dequeue_script( 'wc-cart-fragments' );
			wp_dequeue_script( 'wc-credit-card-form' );
			wp_dequeue_script( 'wc-checkout' );
			wp_dequeue_script( 'wc-add-to-cart-variation' );
			wp_dequeue_script( 'wc-single-product' );
			wp_dequeue_script( 'wc-cart' );
			wp_dequeue_script( 'wc-chosen' );
			wp_dequeue_script( 'woocommerce' );
			wp_dequeue_script( 'prettyPhoto' );
			wp_dequeue_script( 'prettyPhoto-init' );
			wp_dequeue_script( 'jquery-blockui' );
			wp_dequeue_script( 'jquery-placeholder' );
			wp_dequeue_script( 'jquery-payment' );
			wp_dequeue_script( 'fancybox' );
			wp_dequeue_script( 'jqueryui' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'topseo_load_woocommerce_js_css', 99 );
}


# Only load CSS and JS easy-social on blog page
function topseo_load_other_plugin(){
	if ( ! is_home() && ! is_single()) {
		wp_dequeue_style( 'easy-social-share-buttons' );
		wp_dequeue_style( 'essb-cct-style' );
	}
}
add_action( 'wp_enqueue_scripts', 'topseo_load_other_plugin', 99 );

// disable css yith woocommerce
function topseo_dequeue_yith_css() {
	wp_dequeue_style('yith-wcwl-main');
	wp_dequeue_style('yith-wcwl-font-awesome');
}
add_action('wp_enqueue_scripts','topseo_dequeue_yith_css', 100);

// remove breadcrumbs woocommerce
remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);

// disable font awesome unyson - front-end
function topseo_dequeue_fontawesome_css() {
	wp_dequeue_style('fw-font-awesome');
	wp_deregister_style('fw-ext-builder-frontend-grid');
	wp_dequeue_style('fw-ext-forms-default-styles');
	wp_deregister_style('fw-font-awesome');
    /*remove js and css for media*/
    wp_deregister_script('wp-mediaelement');
    wp_deregister_style('wp-mediaelement');
}
add_action('wp_enqueue_scripts','topseo_dequeue_fontawesome_css', 100);

// add ionicon font for backend
function topseo_ionicon_pack($default_packs) {
    return array(
      'topseo_ionicon' => array(
        'name' => 'topseo_ionicon', // same as key
        'title' => 'Ionicon',
        'css_class_prefix' => '',
        'css_file' => get_template_directory().'/css/ionicon.min.css',
        'css_file_uri' => get_template_directory_uri().'/css/ionicon.min.css',
      )
    );
}
add_filter('fw:option_type:icon-v2:packs', 'topseo_ionicon_pack');

// list icon for backend
function topseo_list_icon_pack_backend($current_packs) {
    return array('font-awesome', 'topseo_ionicon');
}
add_filter('fw:option_type:icon-v2:filter_packs', 'topseo_list_icon_pack_backend');

// add custom css
function topseo_add_custom_css() {
	$customizer_css = get_theme_mod( 'customizer_css', $default = false );
	if($customizer_css!=''){
		echo '<style type="text/css">'.$customizer_css.'</style>';
	}
}
add_action('wp_head', 'topseo_add_custom_css');

// add page loader animated
if ( ! function_exists( 'topseo_enable_page_loader' ) ) {
	function topseo_enable_page_loader(){
		$page_loader = (function_exists('fw_get_db_customizer_option')) ? fw_get_db_customizer_option('page_loader') : '';
		if($page_loader=='yes'){
			echo '<div id="preloader"><div class="img-preloader"></div></div>';
		}
	}
}

// search form on mobile
if ( ! function_exists( 'topseo_search_form_mobile' ) ) {
	function topseo_search_form_mobile(){
		?>
		<form action="<?php echo esc_url(home_url('/')); ?>" class="search-form-mobile">
			<input required class="search-form-monile-input" name="s" type="text" placeholder="<?php esc_attr_e('Search...', 'topseo'); ?>" >
			<button class="topseo_search_form_mobile"></button>
		</form>
		<?php
	}
}

// search form on desktop
if ( ! function_exists( 'topseo_search_form' ) ) {
	function topseo_search_form(){
		?>
		<div class="box-form-top">
			<form action="<?php echo esc_url(home_url('/')); ?>" class="search-form-menu">
				<input required class="search-form-input" name="s" type="text" autofocus placeholder="<?php esc_attr_e('To Search start typing...', 'topseo'); ?>" >
			</form>
			<span class="ion-close close-form-btn"></span>
		</div>
		<?php
	}
}

// Convert hex color to RGB
if ( ! function_exists( 'topseo_rgb' ) ) {
	function topseo_rgb($hex, $alpha = false) {
	   $hex = str_replace('#', '', $hex);
	   if ( strlen($hex) == 6 ) {
	      $rgb['r'] = hexdec(substr($hex, 0, 2));
	      $rgb['g'] = hexdec(substr($hex, 2, 2));
	      $rgb['b'] = hexdec(substr($hex, 4, 2));
	   }
	   else if ( strlen($hex) == 3 ) {
	      $rgb['r'] = hexdec(str_repeat(substr($hex, 0, 1), 2));
	      $rgb['g'] = hexdec(str_repeat(substr($hex, 1, 1), 2));
	      $rgb['b'] = hexdec(str_repeat(substr($hex, 2, 1), 2));
	   }
	   else {
	      $rgb['r'] = '0';
	      $rgb['g'] = '0';
	      $rgb['b'] = '0';
	   }
	   if ( $alpha ) {
	      $rgb['a'] = $alpha;
	   }
	   return $rgb;
	}
}

/*MENU BACKGROUND: TRANSPARENT || SOLID COLOR*/
if( ! function_exists( 'topseo_menu_background' ) ):
	function topseo_menu_background(){
        $pid       = get_queried_object_id();
        $c_menu_bg = get_theme_mod( 'logo_image', 'menu-style-1' );
        $p_menu_bg = function_exists( 'fw_get_db_post_option' ) ? fw_get_db_post_option( $pid, 'page_menu_style' ) : 'default';

        if( isset( $p_menu_bg ) && 'default' != $p_menu_bg ){
            $c_menu_bg = $p_menu_bg;
        }

        return $c_menu_bg;
	}
endif;

/*MENU LAYOUT: NORMAL || STICK*/
if( ! function_exists( 'topseo_menu_layout' ) ):
    function topseo_menu_layout(){
        $pid           = get_queried_object_id();
        $c_menu_stick  = get_theme_mod( 'custom_menu_sticky', 'default-menu' );
        $p_menu_sticky = function_exists( 'fw_get_db_post_option' ) ? fw_get_db_post_option( $pid, 'page_menu_sticky' ) : 'default';

        if( isset( $p_menu_sticky ) && 'default' != $p_menu_sticky ){
            $c_menu_stick = $p_menu_sticky;
        }

        return $c_menu_stick;
    }
endif;

// shopping cart
if ( ! function_exists( 'topseo_shopping_cart' ) ) {
	function topseo_shopping_cart(){
		if(class_exists('Woocommerce')):
			global $woocommerce; $args = array(); ?>
			<ul class="action-menu">
			<li class="has-shopping-cart-icon">
				<a href="<?php echo wc_get_cart_url(); ?>" class="fa fa-shopping-bag"></a>
				<?php
					$cart_cout  = $woocommerce->cart->cart_contents_count;
					if($cart_cout > 0){
						echo '<span>'.esc_attr($cart_cout).'</span>';
						echo '<div class="topbar-cart">';
							woocommerce_mini_cart( $args );
						echo '</div>';
					}
				?>
			</li>
		</ul>
		<?php
		endif;
	}
}


// blog masonry
if(!function_exists('topseo_blog_masonry')){
	function topseo_blog_masonry(){
		$page_template = get_page_template_slug(get_queried_object_id());
		$infinite_scroll = (function_exists('fw_get_db_customizer_option')) ? fw_get_db_customizer_option('infinite_scroll') : 'yes';
		if($infinite_scroll == 'yes'){
			if($page_template == 'page-templates/blog-masonry.php'){
				wp_enqueue_script(
					'topseo-masonry',
					get_template_directory_uri() . '/js/topseo.masonry.pkgd.min.js',
					array('jquery'),
					'1.0',
					true
				);
				wp_enqueue_script(
					'topseo-imagesloaded',
					get_template_directory_uri() . '/js/topseo.imagesloaded.pkgd.min.js',
					array('jquery'),
					'1.0',
					true
				);
				wp_enqueue_script(
					'topseo-infinitescroll',
					get_template_directory_uri() . '/js/topseo.jquery.infinitescroll.min.js',
					array('jquery'),
					'1.0',
					true
				);
				wp_enqueue_script(
					'topseo-blog-masonry-custom',
					get_template_directory_uri() . '/js/topseo.blog.masonry.js',
					array('jquery'),
					'1.0',
					true
				);
			}
		}
		
	}
	add_action('wp_enqueue_scripts', 'topseo_blog_masonry', 100);
}

// heard of WordPress
if ( ! isset( $content_width ) ) $content_width = 1170;

// Declare WooCommerce support
function topseo_woocommerce_support() {
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'topseo_woocommerce_support' );

// Redirect to demo page after install extension
function topseo_action_redirect_to_demo()	{
	echo
		'<script type="text/javascript">'.
			'window.location.replace("'. esc_js(self_admin_url('tools.php?page=fw-backups-demo-content')) .'");'.
		'</script>';
}
add_action( 'fw_after_supported_extensions_install_success', 'topseo_action_redirect_to_demo' );

/**
 * Refresh Partial 
 * for Customizer
 */
if( ! function_exists( 'topseo_edit_location' ) ){
	function topseo_edit_location( $id = '', $position = '' ){
		$option = $id.'_edit_location';
        if( ! is_preview() ) return;
        ?>
		<div id="<?php echo esc_attr($id); ?>-edit-location" class="topseo-edit-location" style="<?php echo esc_attr($position); ?>">
	        <?php
	        	if ( class_exists( 'Kirki' ) ){
	        		echo Kirki::get_option( $option );
        		}
        	?>
	    </div>
	<?php
    }
}

if ( ! function_exists( 'topseo_post_title' ) ) {
	function topseo_post_title(){
		if(is_single()) :
			echo '<h1 class="blog-post-name" itemprop="headline">';
			echo	the_title();
			echo '</h1>';
		else :
			$url = get_the_permalink();
			$title = get_the_title();
			echo '<h3 class="blog-post-name" itemprop="headline">';
			echo '<a itemprop="url" href="'.$url.'">'.$title.'</a></h3>';
		endif;	
	}
}
