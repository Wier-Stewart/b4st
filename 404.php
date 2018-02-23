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

      <!-- main, as opposed to, y'know.. sidebars. but what about other sections?-->
      <div id="content" role="main">

        <div class="alert alert-warning"><!-- kind of like an article.. -->
          <h1 class='page-title'>
            <i class="glyphicon glyphicon-warning-sign"></i> <?php _e('Error', 'b4st'); ?> 404
          </h1>
          <p><?php _e('The page you were looking for does not exist.', 'b4st'); ?></p>
        </div>

      </div><!-- /#content -->

    </div>
  </div><!-- /.row -->

  <div class="row">
    <?php
    //sidebar is wrapped in col-sm-12
    get_sidebar(); ?>
  </div><!-- /.row -->
</div><!-- /.container-responsive -->

<?php get_footer(); ?>
