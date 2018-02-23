<?php
/*
Template Name: Authors


* Generally, Anything inside .row>.col-sm- is a 'Fundamental Content Block',
  and can be re-organized from 3 rows, into 1 .row>.col-sm

 */

get_header(); ?>

<div id="page"  class="container-responsive">
  <!-- row & col-sm *could* be removed.. mayyyybe-->
  <div class="row">
    <div class="col-sm">

      <!-- main, as opposed to, y'know.. sidebars. but what about other sections?-->
      <div id="content" role="main">
        <header class=" page-header">
          <h1 class='page-title'>
            <?php the_title()?>
          </h1>
        </header>

        </div><!-- /#content -->

      </div>
    </div><!-- /.row -->


    <!-- row & col-sm *are* removed.. here, they have one in loop -->
    <?php
    // row-free zone
    // authors-loop provides article-list
    get_template_part('loops/authors-loop');
    ?>

    <div class="row">
      <?php
      //sidebar is wrapped in col-sm-12
      get_sidebar(); ?>
    </div><!-- /.row -->

</div><!-- /.container-responsive -->

<?php get_footer(); ?>
