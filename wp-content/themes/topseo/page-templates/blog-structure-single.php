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