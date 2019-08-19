<?php

add_action( 'after_setup_theme', 'my_theme_footer_support' );
function my_theme_footer_support() {
  add_theme_support( 'fl-theme-builder-footers' );
}

add_action( 'wp', 'my_theme_footer_render' );
function my_theme_footer_render() {
  // Get the footer ID.
  $footer_ids = FLThemeBuilderLayoutData::get_current_page_footer_ids();
  // If we have a footer, remove the theme footer and hook in Theme Builder's.
  if ( ! empty( $footer_ids ) ) {
    remove_action( 'b4st_footer', 'b4st_do_footer' );
    add_action( 'b4st_footer', 'FLThemeBuilderLayoutRenderer::render_footer' );
  }
}