<?php
/*
The Search Results Loop
============================
Used by search.php

Bad Idea: Wrapping anything around the article-list here.
Another Bad Idea: Adding the Bootstrap class 'row' to the article-list itself.

 */
?>
<div class="article-list">
<?php if(have_posts()): while(have_posts()): the_post(); ?>

  <div class='article-wrapper col-md-4 col-sm-6 col-xs-12'>
    <?php get_template_part('content-templates/post','excerpt'); ?>
  </div>

<?php endwhile; else: ?>
  <div class="alert alert-warning">
    <i class="fas fa-exclamation-triangle"></i> <?php _e('Sorry, your search yielded no results.', 'b4st'); ?>
  </div>
<?php endif; ?>
</div>
