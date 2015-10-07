<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package StartUp Reloaded
 */

get_header();

$page_header_visible = of_get_option( 'page-header-hidden' );
$page_header_background_color = of_get_option( 'page-header-background-color' );
$page_header_color = of_get_option( 'page-header-text-color' );
$page_header_padding = of_get_option( 'page-header-padding' );
$page_header_position = of_get_option( 'page-header-position' );
$page_header_boxed = of_get_option( 'page-header-boxed' );
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>
 
            <?php if (!is_front_page() && !$page_header_visible ){?>
                    <header class="page-header <?php echo $page_header_position ?>" style="<?php if ( $page_header_color ){ echo 'color:' . $page_header_color . ';'; }; if ( $page_header_padding ){ echo 'padding-top:' . $page_header_padding . 'px;padding-bottom:' . $page_header_padding . 'px;';if ( $page_header_background_color ) { echo 'background: ' . $page_header_background_color . ';'; };} ?>" >      
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php if ( $page_header_boxed == 1){ ?><h3 class="page-title boxed"><?php post_type_archive_title(); ?></h3><?php }  
                                        else { ?><h3 class="page-title"><?php post_type_archive_title(); ?></h3><?php } ?>                                                      
                                    <?php //if ( the_archive_description() && $page_header_boxed == 1){ echo '<h4 class="boxed">' . the_archive_description() . '</h4>'; }  
                                        //else if ( the_archive_description() ){ echo '<h4>' . the_archive_description() . '</h4>'; } ?>
                                </div>
                            </div>
                        </div>
                    </header><!-- .entry-header -->
            <?php }?>

            <div class="entry-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php require get_template_directory() . '/inc/shortcodes/blog.php'; ?>
                        </div>
                    </div>
                </div>
            </div><!-- .entry-content -->

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>