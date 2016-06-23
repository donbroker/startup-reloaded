<?php

require get_template_directory() . '/inc/theme-options.php';

?>

<?php if ($ga){ ?>
    <script type="text/javascript">
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', '<?php echo $ga; ?>', 'auto');
        ga('send', 'pageview');
    </script>
<?php } ?>

<?php if ($navbar_on && $navbar_position == 'navbar-fixed-top'){ ?>
    <script type="text/javascript">
        //jQuery to collapse the navbar on scroll
        jQuery(window).scroll(function () {
            if (jQuery(".navbar").offset().top > 80) {
                jQuery(".navbar-fixed-top").addClass("top-nav-collapse");
            } else {
                jQuery(".navbar-fixed-top").removeClass("top-nav-collapse");
            }
        });
    </script>
<?php } ?>

<?php
    if( $left_panel_on || $right_panel_on ){
        $locations = get_registered_nav_menus();
        $menus = wp_get_nav_menus();
        $menu_locations = get_nav_menu_locations();
    }


    if( $left_panel_on ){
        $location_left_id = 'left-panel';
        if (isset($menu_locations[ $location_left_id ])) {
            foreach ($menus as $menu) {
                // If the ID of this menu is the ID associated with the location we're searching for
                if ($menu->term_id == $menu_locations[ $location_left_id ]) {
                    // This is the correct menu

                    // Get the items for this menu
                    $left_panel_title = $menu->name;

                    // Now do something with them here.
                    //
                    //
                    break;
                }
            }
        } else {
            // The location that you're trying to search doesn't exist
            $left_panel_title = 'menu';
        } ?>

    <script type="text/javascript">
        jQuery(function() {
            jQuery('nav#left-panel').mmenu({
                onClick: {
                    close: true
                },
                slidingSubmenus : false,
                extensions	: [ 'border-full'<?php if( $left_panel_theme == 'theme-dark' ){ ?>, 'theme-dark'<?php } ?><?php if( $left_panel_mode == 'tileview' ){ ?>, 'tileview'<?php } ?> ],
                navbar 		: {
                    title		: '<?php echo $left_panel_title ?>'
                },
                navbars		: [
                    {
                        position	: 'top',
                        content		: [
                            'prev',
                            'title',
                            'close'
                        ]
                    }
                ],
                "offCanvas": {
              "zposition": "front"
           }
            });
            var API = jQuery("nav#left-panel").data( "mmenu" );

              jQuery("#left-panel-button").click(function() {
                 API.open();
              });
        });
    </script>
<?php }

    if( $right_panel_on ){
            $location_right_id = 'right-panel';
            if (isset($menu_locations[ $location_right_id ])) {
                foreach ($menus as $menu) {
                    // If the ID of this menu is the ID associated with the location we're searching for
                    if ($menu->term_id == $menu_locations[ $location_right_id ]) {
                        // This is the correct menu

                        // Get the items for this menu
                        $right_panel_title = $menu->name;

                        // Now do something with them here.
                        //
                        //
                        break;
                    }
                }
            } else {
                // The location that you're trying to search doesn't exist
                $right_panel_title = 'menu';
            } ?>
    <script type="text/javascript">
        jQuery(function() {
            jQuery('nav#right-panel').mmenu({
                offCanvas: {
                    position: "right",
                    "zposition": "front"
                 },
                onClick: {
                    close: true
                },
                slidingSubmenus : false,

                extensions	: [ 'border-full'<?php if( $right_panel_theme == 'theme-dark' ){ ?>, 'theme-dark'<?php } ?><?php if( $right_panel_mode == 'tileview' ){ ?>, 'tileview'<?php } ?> ],
                navbar 		: {
                    title		: '<?php echo $right_panel_title ?>'
                },
                navbars		: [
                    {
                        position	: 'top',
                        content		: [
                            'prev',
                            'title',
                            'close'
                        ]
                    }
                ]
            });
            var API = jQuery("nav#right-panel").data( "mmenu" );

              jQuery("#right-panel-button").click(function() {
                 API.open();
              });
        });
    </script>
<?php } ?>

<?php if( $ytplayer ){ ?>
    <script type="text/javascript">
        jQuery(function(){
            jQuery(".player").YTPlayer();
        });
    </script>
<?php } ?>

<?php if( $page_transition ){ ?>
    <script type="text/javascript">
        jQuery( document ).ready(function() {
            jQuery(".animsition").animsition({
                inDuration            :    1000,
                outDuration           :    800,
                //linkElement           :   '.animsition-link',
                linkElement   :   'a:not([target="_blank"]):not([href^="#"]):not([class="no-animsition"])',
                loading               :    true,
                loadingParentElement  :   'body', //animsition wrapper element
                loadingClass          :   'animsition-loading',
                unSupportCss          : [ 'animation-duration',
                                          '-webkit-animation-duration',
                                          '-o-animation-duration'
                                        ],
                overlay               :   false,
                overlayClass          :   'animsition-overlay-slide',
                overlayParentElement  :   'body'
            });
        });
    </script>
<?php } ?>

<!--[if lt IE 9]>
    <script src="<?php echo get_stylesheet_directory_uri() ?>/lib/polyfills/selectivizr.js"></script>
    <noscript><link rel="stylesheet" href="[fallback css]" /></noscript>
    <script src="<?php echo get_stylesheet_directory_uri() ?>/lib/polyfills/html5shiv.min.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri() ?>/lib/polyfills/respond.min.js"></script>
<!-- <![endif] -->