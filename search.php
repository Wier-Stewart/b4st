<?php
/*

* Generally, Anything inside .row>.col-sm- is a 'Fundamental Content Block',
  and can be re-organized from 3 rows, into 1 .row>.col-sm

*/

get_header(); ?>

<div id="page" class="container-responsive">
    <!-- row & col-sm *could* be removed.. mayyyybe-->
    <div class="row">
      <div class="col-sm">

      <div id="content" role="main">
        <header class="page-header ">
          <h1 class='page-title'><?php _e('Search Results for', 'b4st'); ?> &ldquo;<?php the_search_query(); ?>&rdquo;</h1>
        </header>

        <?php get_template_part('loops/search-results'); ?>

      </div><!-- /#content -->
    </div><!-- /.row -->

    <div class="row">
      <?php
      //sidebar is wrapped in col-sm-12
      get_sidebar(); ?>
    </div><!-- /.row -->

</div><!-- /.container-responsive -->

<?php get_footer(); ?>
