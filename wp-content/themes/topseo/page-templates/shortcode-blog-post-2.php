<?php
/**
 * Page template of Blog post
 * ver 2 shortcode
 */
if ($style == 's1') {
    ?>
    <div class="our-blog-top-news flw">
        <?php echo '<h4><i class="ion-bookmark"></i><a href="' . get_permalink($pid) . '">' . get_the_title($pid) . '</a></h4>'; ?>
    </div>
    <?php
    // style 2
} elseif ($style == 's2') {
    ?>
    <div class="our-blog-special-item">
        <?php if (!empty($thumbnail)): ?>
            <div class="our-blog-special-img">
                <div class="our-blog-overlay">
                    <div class="our-blog-special-rm"><a href="<?php echo get_permalink($pid); ?>"
                                                       class="our-blog-special-btn"><?php esc_html_e('Read more', 'topseo'); ?></a>
                    </div>
                </div>
                <a href="<?php echo get_permalink($pid); ?>"><img
                        src="<?php echo esc_url($thumbnail); ?>"
                        alt="<?php esc_attr_e('Image', 'topseo'); ?>"></a>
            </div>
        <?php endif; ?>
        <div class="our-blog-special-content">
            <div class="our-blog-date"><?php echo get_the_date('d', $pid) . '<span>' . get_the_date('F', $pid) . '</span>'; ?></div>
            <h3 class="ourblog-name"><a
                    href="<?php echo get_permalink($pid); ?>"><?php echo get_the_title($pid); ?></a>
            </h3>
            <dl class="ourblog-bottom-info">
                <dt class="ion-ios-folder-outline"><?php echo get_the_category_list(', ', '', $pid); ?></dt>
                <dd class="ion-ios-chatboxes-outline"><?php echo get_comments_number() . esc_html__(' comments', 'topseo'); ?></dd>
            </dl>
        </div>
    </div>
<?php } elseif ($style == 's3') { //style 3
    ?>
    <div class="our-blog-special-item blog-post-2-columns">
        <?php if (!empty($thumbnail)): ?>
            <div class="our-blog-special-img">
                <div class="our-blog-overlay">
                    <div class="our-blog-special-rm"><a href="<?php echo get_permalink($pid); ?>"
                                                       class="our-blog-special-btn"><?php esc_html_e('Read more', 'topseo'); ?></a>
                    </div>
                </div>
                <a href="<?php echo get_permalink($pid); ?>"><img
                        src="<?php echo esc_url($thumbnail); ?>"
                        alt="<?php esc_attr_e('Image', 'topseo'); ?>"></a>
            </div>
        <?php endif; ?>
        <div class="our-blog-special-content">
            <div class="our-blog-date"><?php echo get_the_date('d', $pid) . '<span>' . get_the_date('F', $pid) . '</span>'; ?></div>
            <h3 class="ourblog-name"><a
                    href="<?php echo get_permalink($pid); ?>"><?php echo get_the_title($pid); ?></a>
            </h3>
            <dl class="ourblog-bottom-info">
                <dt class="ion-ios-folder-outline"><?php echo get_the_category_list(', ', '', $pid); ?></dt>
                <dd class="ion-ios-chatboxes-outline"><?php echo get_comments_number() . esc_html__(' comments', 'topseo'); ?></dd>
            </dl>
        </div>
    </div>
<?php } else { //style 4
    ?>
    <div class="our-bookmark-special-item">
        <?php if (!empty($thumbnail)): ?>
            <div class="our-blog-special-img">
                <div class="our-blog-overlay">
                    <div class="our-blog-special-rm"><a href="#"
                                                       class="our-blog-special-btn"><?php esc_attr_e('read more', 'topseo'); ?></a>
                    </div>
                </div>
                <a href="<?php echo get_permalink($pid); ?>"><img
                        src="<?php echo esc_url($thumbnail); ?>"
                        alt="<?php esc_attr_e('Image', 'topseo'); ?>"></a>
            </div>
        <?php endif; ?>
        <div class="our-blog-special-content">
            <div class="our-blog-date"><?php echo get_the_date('d', $pid) . '<span>' . get_the_date('F', $pid) . '</span>'; ?></div>
            <h3 class="ourblog-name"><a
                    href="<?php echo get_permalink($pid); ?>"><?php echo get_the_title($pid); ?></a>
            </h3>
            <dl class="ourblog-bottom-info">
                <dt class="ion-ios-folder-outline"><?php echo get_the_category_list(', ', '', $pid); ?></dt>
                <dd class="ion-ios-chatboxes-outline"><?php echo get_comments_number() . esc_html__(' comments', 'topseo'); ?></dd>
            </dl>
        </div>
    </div>
    <?php
}