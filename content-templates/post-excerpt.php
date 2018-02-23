<?php
/*
The Index Post (or excerpt)
===========================
Used by index.php, archive.php and author.php

Bad Idea: Wrapping anything around the article here.
Another Bad Idea: Adding the Bootstrap class 'row' to the article itself.

*/

//TODO: if it's an external link-out, show a LH logo

?>

<article role="article" id="post_<?php the_ID(); ?>" <?php post_class(' post-excerpt mb-5'); ?> itemscope itemtype="http://schema.org/Article">
  <header class='entry-header' >
    <div class="featured-image ">
    <?php the_post_thumbnail('medium'); ?>
    </div>

    <h2 class='entry-title'  itemprop="name">
      <a href="<?php the_permalink(); ?>">
        <?php the_title()?>
      </a>
    </h2>

  </header>
  <div class='entry-excerpt'  itemprop="description">

    <?php the_excerpt(); ?>

  </div>
  <footer>
    <p class="text-muted">
      Posted in <?php the_category(', ' ); ?>
      , on <?php b4st_post_date(); ?>
      <!--
      <i class="far fa-user"></i>&nbsp; <?php _e('By ', 'b4st'); the_author_posts_link(); ?>&nbsp;|
      <i class="far fa-comment"></i>&nbsp;<a href="<?php comments_link(); ?>"><?php comments_number('No comments', '1 comment', '% comments'); ?></a>
    -->
    </p>

    <p><a class="read-more" href="<?php the_permalink(); ?>">
        <?php _e( ''. ' &gt; ' . __('See Full Story', 'b4st' ) , 'b4st' ) ?>
      </a></p>
  </footer>

</article>
