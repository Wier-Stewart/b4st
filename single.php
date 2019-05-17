<?php
/*

* Generally, Anything inside .row>.col-sm- is a 'Fundamental Content Block',
  and can be re-organized from 3 rows, into 1 .row>.col-sm

*/

get_header(); ?>
	<?php
		get_template_part('loops/single', 'post');  // get_post_format()
	?>
<?php get_footer(); ?>
