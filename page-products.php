<?php
/**
* Template Name: Products */

get_header(); ?>

	<div id="primary" class="container content-area">
		<main id="main" class="row site-main" role="main">

			<?php require get_template_directory() . '/inc/shortcodes/products.php'; ?>
            
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>