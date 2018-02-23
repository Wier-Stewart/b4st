<?php
/*
The Index Post (or excerpt)
===========================
Used by single.php

Bad Idea: Wrapping anything around the article here.
Another Bad Idea: Adding the Bootstrap class 'row' to the article itself.

*/
?>

<article role="article" id="post_<?php the_ID(); ?>" <?php post_class(' post-content mb-5 '); ?> itemscope itemtype="http://schema.org/Article">

    <header class='page-header entry-header' >
        <?php the_category(" ");?>

        <h1 class='page-title entry-title'  itemprop="name">
            <?php the_title()?>
        </h1>

        <p class="text-muted">
          <i class="far fa-calendar-alt"></i>&nbsp;<?php b4st_post_date(); ?>&nbsp;|
          <i class="far fa-user"></i>&nbsp; <?php _e('By ', 'b4st'); the_author_posts_link(); ?>&nbsp;|
          <i class="far fa-comment"></i>&nbsp;<a href="<?php comments_link(); ?>"><?php comments_number('No comments', '1 comment', '% comments'); ?></a>
        </p>
    </header>

    <div class=" image-wrapper featured-image">
        <?php the_post_thumbnail(); ?>
    </div>

    <div class='entry-content ml-auto mr-auto'  itemprop="description">

        <?php the_content(); ?>

    </div>

    <footer class="">
    <div class='col-lg-3 col-md-4 col-sm-6 col-xs-12'>
      <?php
          get_template_part('content-templates/author','excerpt');
       ?>
    </div>
    </footer>

</article>
