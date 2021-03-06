<?php
/**!
* Enqueues
*/

if ( ! function_exists('b4st_enqueues') ) {
	function b4st_enqueues() {

		//show full version locally
		$min='';
		$timestamp='';
		if( stripos($_SERVER['SERVER_NAME'],'local.') !== false  || stripos($_SERVER['SERVER_NAME'],'dev.') !== false ){
			$min='.min';
			$timestamp=date('Y-m-d-h-i');
		}

		// Styles
		wp_register_style('bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css', false, '4.1.3', null);
		wp_enqueue_style('bootstrap-css');

		wp_register_style('font-awesome-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', false, '4.7.0', null);
		wp_enqueue_style('font-awesome-css');
	
		wp_register_style('b4st-css', get_template_directory_uri() . '/theme/css/b4st.css', false, null);
		wp_enqueue_style('b4st-css');

		wp_register_style('theme-css', get_template_directory_uri() . '/style.css', $timestamp, null);
		wp_enqueue_style('theme-css');

		wp_register_script('modernizr',  'https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js', false, '2.8.3', true);
		wp_enqueue_script('modernizr');

		wp_register_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js', false, '3.3.1', true);
		wp_enqueue_script('jquery');

		wp_register_script('popper',  'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', false, '1.12.9', true);
		wp_enqueue_script('popper');

		wp_register_script('bootstrap-js', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js', false, '4.0.0', true);
		wp_enqueue_script('bootstrap-js');

		wp_register_script('b4st-js', get_template_directory_uri() . '/theme/js/b4st.js', false, null, true);
		wp_enqueue_script('b4st-js');

		wp_register_script('masonry',  'https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js', false, null, true);
		wp_enqueue_script('masonry');

		wp_register_script('theme-js', get_template_directory_uri() . '/scripts/main'.$min.'.js', array('jquery'), $timestamp, true);
		wp_enqueue_script('theme-js');


		if (is_singular() && comments_open() && get_option('thread_comments')) {
			wp_enqueue_script('comment-reply');
		}
	}
}
add_action('wp_enqueue_scripts', 'b4st_enqueues', 100);
