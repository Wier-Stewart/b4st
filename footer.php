<footer class="site-footer bg-dark container-responsive">

  <!-- div class="row">
      <?php if(is_active_sidebar('footer-widget-area')): ?>
      <div class="row border-bottom pt-5 pb-4" id="footer" role="navigation">
        <?php dynamic_sidebar('footer-widget-area'); ?>
      </div>
      <?php endif; ?>
  </div -->
  <div class="row">
    <div class="col-md-12">
   
    </div>
  </div>
  <div class="row">
    <div class=' col-md-4 col-sm-12'>
        logo
        <p class="text-center">&copy; <?php echo date('Y'); ?> <a href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a></p>

    </div>
    <div class=' col-md-8 col-sm-12 '>
    <?php
      wp_nav_menu( array(
        'theme_location'  => 'navbar-top',
        'container'       => false,
        'menu_class'      => '',
        'fallback_cb'     => '__return_false',
        'items_wrap'      => '<ul id="%1$s" class="navbar-top menu-inline mr-auto  %2$s">%3$s</ul>',
        'depth'           => 1,
        'walker'          => new b4st_walker_nav_menu()
      ) );
    ?>
    </div>
  </div>

  </div>

</footer>

<?php wp_footer(); ?>
</body>
</html>
