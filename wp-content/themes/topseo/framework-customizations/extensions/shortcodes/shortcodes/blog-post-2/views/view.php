<?php if (!defined('FW')) die('Forbidden');

$style 	 = $atts['style'];
$limit = $atts['limit'];

$sources = $atts['item_select'] ['gadget'];

if($style=='s4'){
	echo '<div class="blog-post-crs-s4 flw">';
}

	if($sources == 'all'){
		$posts = get_posts(array('posts_per_page' => $limit));
		foreach ($posts as $post) :
			$pid = $post->ID;
			$thumbnail = wp_get_attachment_url(get_post_thumbnail_id($pid));


			include(get_template_directory().'/page-templates/shortcode-blog-post-2.php');

		endforeach;
	}else {
		$categories = $atts['item_select']['category']['cat_items'];
		foreach ($categories as $cat) :
			$posts = get_posts(array('category' => $cat, 'posts_per_page' => $limit));

			foreach ($posts as $post) :
				$pid = $post->ID;
				$thumbnail = wp_get_attachment_url(get_post_thumbnail_id($pid));


				include(get_template_directory().'/page-templates/shortcode-blog-post-2.php');

			endforeach;
		endforeach;
	}
		if($style=='s4'){
			echo '</div';
		}
?>