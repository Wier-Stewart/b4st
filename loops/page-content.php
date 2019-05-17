<?php
/*
The Page Content Loop
============================
Used by index.php, category.php and author.php

$isBuilder is a flag for Beaver Builder. checkes if it is enabled on the page or not.

*/
$isBuilder = in_array('fl-builder', get_body_class());
?>
<?php if(have_posts()): while(have_posts()): the_post(); ?>
<main role="article" id="post_<?php the_ID()?>" <?php post_class()?>>

	<?php if(!$isBuilder) : ?>
	<header id="page-header">
		<div class="container-responsive">
			<div class="row">
				<div class="col-12">
					<h1 class='page-title'><?php the_title()?></h1>
				</div>
			</div>
		</div>
	</header>
	<?php endif; ?>

	<section id="page-content">
		<div class="container-responsive">
			<div class="row">
				<div class="col-12">
					<?php the_content()?>
					<?php wp_link_pages(); ?>
				</div>
			</div>
		</div>
	</section>

</main>
<?php
endwhile; else:
	wp_redirect(esc_url( home_url() ) . '/404', 404);
	exit;
endif;
?>
