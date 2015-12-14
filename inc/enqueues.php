<?php
/**
 * Enqueue scripts and styles.
 */
function startup_reloaded_scripts() {

    /************************************************************************* css */
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/lib/bootstrap/css/bootstrap.min.css', array( ), false, 'all' );
    
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/lib/font-awesome/css/font-awesome.min.css' );
    
    wp_enqueue_style( 'hover', get_template_directory_uri() . '/lib/hover-css/hover-min.css' );
    
    wp_enqueue_style( 'animate', get_template_directory_uri() . '/lib/animate-css/animate.css' );
    
    if( of_get_option( 'page-transition' ) ){
        wp_enqueue_style( 'animsition', get_template_directory_uri() . '/lib/animsition/animsition.min.css' );
    }
    
    if( of_get_option( 'general-ytplayer' ) ){
        wp_enqueue_style( 'ytplayer', get_template_directory_uri() . '/lib/jquery.mb.YTPlayer/css/jquery.mb.YTPlayer.min.css' );
    }
    
    if( of_get_option( 'left-panel-on' ) || of_get_option( 'right-panel-on' ) ){
        wp_enqueue_style( 'mmenu', get_template_directory_uri() . '/lib/jQuery.mmenu/core/css/jquery.mmenu.all.css' );
    }
    
    wp_enqueue_style( 'startup-reloaded-style', get_template_directory_uri() . '/css/style.css');

    /************************************************************************* js */
    wp_enqueue_script( 'jquery' );
    
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/lib/bootstrap/js/bootstrap.min.js', array( ), '', false );
   
    /**/
    wp_enqueue_script( 'touchswipe', get_template_directory_uri() . '/js/jquery.touchSwipe.min.js', array( ), '', true );
    /**/
    wp_enqueue_script( 'viewportchecker', get_template_directory_uri() . '/js/jquery.viewportchecker.min.js', array( ), '', false );

	wp_enqueue_script( 'startup-reloaded-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
    
    wp_enqueue_script( 'parallax', get_template_directory_uri() . '/js/parallax.min.js', array( ), '', false );
    
    if( of_get_option( 'page-transition' ) ){
        wp_enqueue_script( 'animsition', get_template_directory_uri() . '/lib/animsition/jquery.animsition.min.js', array( ), '', false );
    }
    
    if( of_get_option( 'general-ytplayer' ) ){
        wp_enqueue_script( 'ytplayer', get_template_directory_uri() . '/lib/jquery.mb.YTPlayer/jquery.mb.YTPlayer.min.js', array( ), '', false );
    }
    /**/
    if( of_get_option( 'blog-style' ) == 'shuffle' || of_get_option( 'portfolio-style' ) == 'shuffle' || is_plugin_active('startup-cpt-products/startup-cpt-products.php')){
        wp_enqueue_script( 'shuffle', get_template_directory_uri() . '/js/jquery.shuffle.modernizr.min.js', array( ), '', false );
        wp_enqueue_script( 'imagesloaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array( ), '', true );
    }
    
    wp_enqueue_script( 'fastclick', get_template_directory_uri() . '/js/fastclick.js', array( ), '', false );
       
    if( of_get_option( 'left-panel-on' ) || of_get_option( 'right-panel-on' ) ){
        wp_enqueue_script( 'mmenu', get_template_directory_uri() . '/lib/jQuery.mmenu/core/js/jquery.mmenu.min.all.js', array( ), '', false );
    }
    
    wp_enqueue_script( 'startup-reloaded-scripts', get_template_directory_uri() . '/js/startup.js', array( ), '', false );
    
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'startup_reloaded_scripts' );

// Pour l'admin, mais a modifier, il faudrait plutot utiliser admin_enqueue_scripts
function startup_reloaded_admin_enqueues() {
  echo '<link rel="stylesheet" href="' . get_template_directory_uri() . '/lib/select2/css/select2.min.css' . '" type="text/css" media="all">';
  echo '<script type="text/javascript" src="' . get_template_directory_uri() . '/lib/select2/js/select2.min.js' . '"></script>';
  echo '<script type="text/javascript" src="' . get_template_directory_uri() . '/js/startup-admin.js' . '"></script>';
}

add_action('admin_head', 'startup_reloaded_admin_enqueues');
?>