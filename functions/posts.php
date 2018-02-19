<?php
function custom_excerpt_length( $length ) {
  return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// Replaces the excerpt "Read More"
function new_excerpt_more($more) {
  global $post;
	return '&hellip;';
}
add_filter('excerpt_more', 'new_excerpt_more');