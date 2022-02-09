<?php
if (have_posts()) :
    // loop
    while ( have_posts() ) : the_post();
        get_template_part( 'content', get_post_format() );
    endwhile;
    // post count
    echo topseo_post_count();
    // pagination
    topseo_paging_nav();
else :
    get_template_part( 'content', 'none' );
endif;
?>