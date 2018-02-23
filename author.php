<?php
/*

* Generally, Anything inside .row>.col-sm- is a 'Fundamental Content Block',
  and can be re-organized from 3 rows, into 1 .row>.col-sm

*/

$userInfo = get_userdata( get_query_var('author'));
$isAuthor = true;
if (
    !in_array('contributor', $userInfo -> roles) &&
    !in_array('administrator', $userInfo -> roles) &&
    !in_array('author', $userInfo -> roles) &&
    !in_array('editor', $userInfo -> roles)
) {
    $isAuthor = false;
    wp_redirect(esc_url( home_url() ) . '/404', 404);
}
?>
<?php get_header(); ?>

<div id="page" class="container-responsive">
  <!-- row & col-sm *could* be removed.. mayyyybe-->
  <div class="row">
    <div class="col-sm">

      <!-- main, as opposed to, y'know.. sidebars. but what about other sections?-->
      <div id="content" role="main">
        <header class="page-header">
          <?php if ($isAuthor === true): ?>
          <h1 class='page-title'>
            <?php _e('Articles by ', 'b4st'); echo get_the_author_meta( 'display_name' ); ?>
          </h1>
          <?php endif; ?>

          <?php
            get_template_part('content-templates/author','content');
          ?>

        </header>

        <!-- Wait, should archive-list go here? -->

      </div><!-- /#content -->

    </div>
  </div><!-- /.row -->


    <!-- row & col-sm *are* removed.. here, they have one in loop -->
    <?php
      // row-free zone
      // index-loop provides article-list
      if(have_posts()): ?>
      <?php get_template_part('loops/index-loop'); ?>
    <?php else: ?>
      <?php get_template_part('loops/index-none'); ?>
    <?php endif; ?>


  <!-- sidebar should have it's own row, or be moved up into a row. -->
  <div class='row'>
    <?php
    //sidebar is wrapped in col-sm-12
    get_sidebar(); ?>
  </div><!-- /.row -->

</div><!-- /.container-responsive -->

<?php get_footer(); ?>
