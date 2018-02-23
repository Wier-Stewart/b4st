<?php
/*
The Page Content Loop
============================
Used by index.php, category.php and author.php

Bad Idea: Wrapping anything around the article-list here.
Another Bad Idea: Adding the Bootstrap class 'row' to the article-list itself.

 */
?>
<div class="article-single">
<?php if(have_posts()): while(have_posts()): the_post(); ?>
  <article role="article" id="post_<?php the_ID()?>" <?php post_class()?>>
    <header class=" page-header mb-4 border-bottom">
      <h1 class='page-title'>
        <?php the_title()?>
      </h1>
    </header>
    <main>
      <?php the_content()?>
      <?php wp_link_pages(); ?>
    </main>
  </article>
<?php
  endwhile; else:
    wp_redirect(esc_url( home_url() ) . '/404', 404);
    exit;
  endif;
?>
</div>
