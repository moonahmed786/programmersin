<?php
function markethon_display_acf_header(){
$markethon_option = get_option('markethon_options');
if(!is_front_page()) {
	if ( ( ( is_page() && ! markethon_is_frontpage() ) ) && has_post_thumbnail( get_queried_object_id() ) )
	{
		$options= get_field('opacity_color');

		if($options == "none"){ $bg_class = esc_html__('iq-bg-over black','markethon'); }
		elseif($options == "dark"){ $bg_class = esc_html__('iq-bg-over iq-over-dark-80','markethon'); }
		elseif($options == "opacity-custom"){ $bg_class = esc_html__('breadcrumb-bg breadcrumb-ui','markethon'); }
		else{ $bg_class = esc_html__('iq-bg-over iq-over-dark-80','markethon'); }
		?>
		<div class="text-left iq-breadcrumb-one acf <?php if(!empty($bg_class)) { echo esc_attr($bg_class); } ?>" style="background: url(<?php the_post_thumbnail_url(); ?>);">
	<?php
	}
	else{
			if(get_field('header_set_option') == "color")
			{ 
				$bg_color = esc_html__('iq-bg-over black','markethon');
			}
			elseif(get_field('header_set_option') == "image")
			{ 
				if(get_field("banner_image")){
					$bgurl = get_field("banner_image");
				}

				$options= get_field('opacity_color');

				if($options == "none"){ $bg_class = esc_html__('iq-bg-over black','markethon'); }
				elseif($options == "dark"){  $bg_class = esc_html__('iq-over-dark-80','markethon'); }
				elseif($options == "opacity-custom"){ $bg_class = esc_html__('breadcrumb-bg breadcrumb-ui','markethon'); }
				else{ $bg_class = esc_html__('iq-bg-over iq-over-dark-80','markethon'); }
			}
			elseif(get_field('header_set_option') == "video")
			{ 
				$options= get_field('opacity_color');

				if($options == "none"){ $bg_class = esc_html__('video-iq-bg-over','markethon'); }
				elseif($options == "dark"){ $bg_class = esc_html__('video-breadcrumb-bg breadcrumb-video','markethon'); }
				elseif($options == "opacity-custom"){ $bg_class = esc_html__('video-breadcrumb-bg breadcrumb-video','markethon'); }
				else{ $bg_class = esc_html__('iq-bg-over iq-over-dark-80','markethon'); }
			}
			else
			{ 
				$bg_class = esc_html__('iq-bg-over','markethon');
			}
			?>
	<div class="text-left iq-breadcrumb-one acf <?php if(!empty(get_field('header_set_option') == "color")) { echo esc_attr($bg_color); } ?> <?php if(!empty($bg_class)) { echo esc_attr($bg_class); } ?>"
	<?php if(!empty($bgurl)){ ?> style="background: url(<?php echo esc_url($bgurl); ?> );" <?php } ?>>
	<?php
	}
?>
	<?php
	if(get_field('header_set_option') == "video")
	{
		if(get_field("banner_video")){
			$videourl = get_field("banner_video");
		}
		?>
			<video class="masthead-video" autoplay loop muted>
                <source src="<?php echo esc_url($videourl); ?>" type="video/mp4">
                <source src="<?php echo esc_url($videourl); ?>" type="video/webm">
            </video>
		<?php

	}
	?>
	<div class="container">
		<?php
		$options= get_field('title_text_align');

		if($options == 'center')
		{
		?>
		<div class="row align-items-center">
			<div class="col-sm-12">
				<nav aria-label="breadcrumb" class="text-center iq-breadcrumb-two">
					<?php
					if(is_archive()){
					?>
					<h2 class="title"><?php the_archive_title();  ?></h2>
					<?php
					}
					elseif(is_search()){
					if ( have_posts() ) : ?>
					<h2 class="title"><?php printf( esc_html__( 'Search Results for: %s', 'markethon' ), '<span>' . get_search_query() . '</span>' ); ?></h2>

					<?php else : ?>
					<h2 class="title"><?php esc_html_e( 'Nothing Found', 'markethon' ); ?></h2>

					<?php endif;
					} elseif(is_404()){

					if(isset($markethon_option['markethon_fourzerofour_title'])){
					?>
					<h2 class="title"><?php $four_title =  $markethon_option['markethon_fourzerofour_title']; echo esc_html($four_title);  ?></h2>
					<?php
					} else{
					?>
					<h2 class="title"><?php esc_html_e( 'Oops! That page can not be found.', 'markethon' ); ?></h2>

					<?php }
					} elseif(is_home()){ ?>
					<h2 class="title"><?php esc_html_e( 'Blog', 'markethon' ); ?></h2>
					<?php }
					else { ?>
							<h2 class="title"><?php single_post_title(); ?></h2>
					<?php } ?>
					<?php
					$options = get_field('display_breadcrumbs_on_banner');
					if($options == "yes")
					{
					?>
					<ol class="breadcrumb main-bg">
						<?php echo markethon_custom_breadcrumbs(); ?>
					</ol>
					<?php
					}
					?>
				</nav>
			</div>
		</div>
		<?php }  elseif($options == 'left')
		{
		?>
		<div class="row align-items-center">
			<div class="col-lg-8 col-md-8 text-left align-self-center">
				<nav aria-label="breadcrumb" class="text-left">
					<?php
					if(is_archive()){
					?>
					<h2 class="title"><?php the_archive_title();  ?></h2>
					<?php
					}
					elseif(is_search()){
					if ( have_posts() ) : ?>
					<h2 class="title"><?php printf( esc_html__( 'Search Results for: %s', 'markethon' ), '<span>' . get_search_query() . '</span>' ); ?></h2>

					<?php else : ?>
					<h2 class="title"><?php esc_html_e( 'Nothing Found', 'markethon' ); ?></h2>

					<?php endif;
					} elseif(is_404()){

					if(isset($markethon_option['markethon_fourzerofour_title'])){
					?>
					<h2 class="title"><?php $four_title =  $markethon_option['markethon_fourzerofour_title']; echo esc_html($four_title);  ?></h2>
					<?php
					} else{
					?>
					<h2 class="title"><?php esc_html_e( 'Oops! That page can not be found.', 'markethon' ); ?></h2>

					<?php }
					} elseif(is_home()){ ?>
					<h2 class="title"><?php esc_html_e( 'Blog', 'markethon' ); ?></h2>
					<?php }
					else { ?>
							<h2 class="title"><?php single_post_title(); ?></h2>
					<?php } ?>
					<?php
					$options = get_field('display_breadcrumbs_on_banner');
					if($options == "yes")
					{
					?>
					<ol class="breadcrumb main-bg">
						<?php echo markethon_custom_breadcrumbs(); ?>
					</ol>
					<?php
					}
					?>
				</nav>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-12 text-right wow fadeInRight">
				<?php
				if ( ( ( is_page() && ! markethon_is_frontpage() ) ) && has_post_thumbnail( get_queried_object_id() ) )
				{
					the_post_thumbnail();

				?>
				<?php
				}
				else{
					if(is_404())
					{
						if(!empty($markethon_option['markethon_404_banner_image']['url'])){
						$bnurl = $markethon_option['markethon_404_banner_image']['url'];
						}
					}
					elseif(is_home())
					{
						if(!empty($markethon_option['markethon_blog_banner_image']['url'])){
						$bnurl = $markethon_option['markethon_blog_banner_image']['url'];
						}
					}
					else
					{
						if(!empty($markethon_option['markethon_page_banner_image']['url']))
						{
						$bnurl = $markethon_option['markethon_page_banner_image']['url'];
						}
					}
					?>
					<img src="<?php echo esc_url($bnurl); ?>" class="img-fluid float-right" alt="<?php  esc_attr_e( 'banner', 'markethon' ); ?>">
				<?php
				}
				?>
			</div>
		</div>
		<?php }  elseif($options == 'right')
		{
		?>
		<div class="row align-items-center">
			<div class="col-lg-4 col-md-4 col-sm-12 wow fadeInRight">
				<?php
				if ( ( ( is_page() && ! markethon_is_frontpage() ) ) && has_post_thumbnail( get_queried_object_id() ) )
				{
					the_post_thumbnail();

				?>
				<?php
				}
				else {

					if(is_404())
					{
						if(!empty($markethon_option['markethon_404_banner_image']['url'])){
						$bnurl = $markethon_option['markethon_404_banner_image']['url'];
						}
					}
					elseif(is_home())
					{
						if(!empty($markethon_option['markethon_blog_banner_image']['url'])){
						$bnurl = $markethon_option['markethon_blog_banner_image']['url'];
						}
					}
					else
					{
						if(!empty($markethon_option['markethon_page_banner_image']['url']))
						{
						$bnurl = $markethon_option['markethon_page_banner_image']['url'];
						}
					}
					?>
					<img src="<?php echo esc_url($bnurl); ?>" class="img-fluid" alt="<?php  esc_attr_e( 'banner', 'markethon' ); ?>">
				<?php
				}
				?>
			</div>
			<div class="col-lg-8 col-md-8 text-left align-self-center">
				<nav aria-label="breadcrumb" class="text-right iq-breadcrumb-two">
					<?php
					if(is_archive()){
					?>
					<h2 class="title"><?php the_archive_title();  ?></h2>
					<?php
					}
					elseif(is_search()){
					if ( have_posts() ) : ?>
					<h2 class="title"><?php printf( esc_html__( 'Search Results for: %s', 'markethon' ), '<span>' . get_search_query() . '</span>' ); ?></h2>

					<?php else : ?>
					<h2 class="title"><?php esc_html_e( 'Nothing Found', 'markethon' ); ?></h2>

					<?php endif;
					} elseif(is_404()){

					if(isset($markethon_option['markethon_fourzerofour_title'])){
					?>
					<h2 class="title"><?php $four_title =  $markethon_option['markethon_fourzerofour_title']; echo esc_html($four_title);  ?></h2>
					<?php
					} else{
					?>
					<h2 class="title"><?php esc_html_e( 'Oops! That page can not be found.', 'markethon' ); ?></h2>

					<?php }
					} elseif(is_home()){ ?>
					<h2 class="title"><?php esc_html_e( 'Blog', 'markethon' ); ?></h2>
					<?php }
					else { ?>
							<h2 class="title"><?php single_post_title(); ?></h2>
					<?php } ?>
					<?php
					$options = get_field('display_breadcrumbs_on_banner');
					if($options == "yes")
					{
					?>
					<ol class="breadcrumb main-bg">
						<?php echo markethon_custom_breadcrumbs(); ?>
					</ol>
					<?php
					}
					?>
				</nav>
			</div>
		</div>
		<?php }  elseif($options == 'title-left')
		{
		?>
		<div class="row align-items-center iq-breadcrumb-three">
			<div class="col-sm-6 mb-3 mb-lg-0 mb-md-0">
					<?php
					if(is_archive()){
					?>
					<h2 class="title text-white ext-lg-right text-md-right text-sm-left"><?php the_archive_title();  ?></h2>
					<?php
					}
					elseif(is_search()){
					if ( have_posts() ) : ?>
					<h2 class="title text-white"><?php printf( esc_html__( 'Search Results for: %s', 'markethon' ), '<span>' . get_search_query() . '</span>' ); ?></h2>

					<?php else : ?>
					<h2 class="title text-white"><?php esc_html_e( 'Nothing Found', 'markethon' ); ?></h2>

					<?php endif;
					} elseif(is_404()){

					if(isset($markethon_option['markethon_fourzerofour_title'])){
					?>
					<h2 class="title text-white"><?php $four_title =  $markethon_option['markethon_fourzerofour_title']; echo esc_html($four_title);  ?></h2>
					<?php
					} else{
					?>
					<h2 class="title text-white"><?php esc_html_e( 'Oops! That page can not be found.', 'markethon' ); ?></h2>

					<?php }
					} elseif(is_home()){ ?>
					<h2 class="title text-white"><?php esc_html_e( 'Blog', 'markethon' ); ?></h2>
					<?php }
					else { ?>
							<h2 class="title text-white"><?php single_post_title(); ?></h2>
					<?php } ?>
			</div>
			<div class="col-sm-6 ext-lg-right text-md-right text-sm-left">
				<nav aria-label="breadcrumb" class="iq-breadcrumb-two">
					<?php
					$options = get_field('display_breadcrumbs_on_banner');
					if($options == "yes")
					{
					?>
					<ol class="breadcrumb main-bg">
						<?php echo markethon_custom_breadcrumbs(); ?>
					</ol>
					<?php
					}
					?>
				</nav>
			</div>
		</div>
		<?php }  elseif($options == 'title-right')
		{
		?>
		<div class="row align-items-center iq-breadcrumb-three">
			<div class="col-sm-6 mb-3 mb-lg-0 mb-md-0">
				<nav aria-label="breadcrumb" class="text-left iq-breadcrumb-two">
					<ol class="breadcrumb main-bg">
						<?php echo markethon_custom_breadcrumbs(); ?>
					</ol>
				</nav>
			</div>
			<div class="col-sm-6">
					<?php
					if(is_archive()){
					?>
					<h2 class="title text-white text-lg-right text-md-right text-sm-left"><?php the_archive_title();  ?></h2>
					<?php
					}
					elseif(is_search()){
					if ( have_posts() ) : ?>
					<h2 class="title text-white text-lg-right text-md-right text-sm-left"><?php printf( esc_html__( 'Search Results for: %s', 'markethon' ), '<span>' . get_search_query() . '</span>' ); ?></h2>

					<?php else : ?>
					<h2 class="title text-white text-lg-right text-md-right text-sm-left"><?php esc_html_e( 'Nothing Found', 'markethon' ); ?></h2>

					<?php endif;
					} elseif(is_404()){

					if(isset($markethon_option['markethon_fourzerofour_title'])){
					?>
					<h2 class="title text-white text-lg-right text-md-right text-sm-left"><?php $four_title =  $markethon_option['markethon_fourzerofour_title']; echo esc_html($four_title);  ?></h2>
					<?php
					} else{
					?>
					<h2 class="title text-white text-lg-right text-md-right text-sm-left"><?php esc_html_e( 'Oops! That page can not be found.', 'markethon' ); ?></h2>

					<?php }
					} elseif(is_home()){ ?>
					<h2 class="title text-white text-lg-right text-md-right text-sm-left"><?php esc_html_e( 'Blog', 'markethon' ); ?></h2>
					<?php }
					else { ?>
							<h2 class="title text-white text-lg-right text-md-right text-sm-left"><?php single_post_title(); ?></h2>
					<?php } ?>
			</div>
		</div>
		<?php } else
		{
		?>
		<div class="row align-items-center">
			<div class="col-sm-12">
				<nav aria-label="breadcrumb" class="text-left">
					<?php
					if(is_archive()){
					?>
					<h2 class="title"><?php the_archive_title();  ?></h2>
					<?php
					}
					elseif(is_search()){
					if ( have_posts() ) : ?>
					<h2 class="title"><?php printf( esc_html__( 'Search Results for: %s', 'markethon' ), '<span>' . get_search_query() . '</span>' ); ?></h2>

					<?php else : ?>
					<h2 class="title"><?php esc_html_e( 'Nothing Found', 'markethon' ); ?></h2>

					<?php endif;
					} elseif(is_404()){

					if(isset($markethon_option['markethon_fourzerofour_title'])){
					?>
					<h2 class="title"><?php $four_title =  $markethon_option['markethon_fourzerofour_title']; echo esc_html($four_title);  ?></h2>
					<?php
					} else{
					?>
					<h2 class="title"><?php esc_html_e( 'Oops! That page can not be found.', 'markethon' ); ?></h2>

					<?php }
					} elseif(is_home()){ ?>
					<h2 class="title"><?php esc_html_e( 'Blog', 'markethon' ); ?></h2>
					<?php }
					else { ?>
							<h2 class="title"><?php single_post_title(); ?></h2>
					<?php } ?>
					<ol class="breadcrumb main-bg">
						<?php echo markethon_custom_breadcrumbs(); ?>
					</ol>
				</nav>
			</div>
		</div>
		<?php } ?>

		</div>
	</div>

<?php
	}
}
?>