<?php
/*
The Single Posts Loop
============================
Used by single.php

Bad Idea: Wrapping anything around the article-list here.
Another Bad Idea: Adding the Bootstrap class 'row' to the article-list itself.
 */
?>
<div class="article-single">
<?php

global $query;
if(!$query) $query=$wp_query; // allow custom queries

if($query->have_posts()): while($query->have_posts()): $query->the_post();

    $template_name='post';
    if( has_term( 'features', 'content_type', $post ) ) $template_name='featured';

    get_template_part('content-templates/'.$template_name, 'content');  // get_post_format()


    if ( comments_open() || get_comments_number() ) :
        comments_template();
    endif;

endwhile; else:
    wp_redirect(esc_url( home_url() ) . '/404', 404);
    exit;
endif;
?>
</div>
