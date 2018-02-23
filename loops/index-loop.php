<?php
/*
The Index Loop (for excerpts)
============================
Used by index.php, category.php and author.php

Bad Idea: Wrapping anything around the article-list here.
Another Bad Idea: Adding the Bootstrap class 'row' to the article-list itself.

*/
?>
<div class="article-list">
<?php if(have_posts()): ?>
  <div class="row">
<?php  while(have_posts()): the_post(); ?>

      <div class='article-wrapper col-lg-4 col-md-6 col-sm-12'>
        <?php get_template_part('content-templates/post','excerpt'); ?>
      </div>

<?php endwhile; ?>

</div><!-- row -->

<?php
else:
  get_template_part('content-templates/index-post','none');
endif; 
?>
</div>
