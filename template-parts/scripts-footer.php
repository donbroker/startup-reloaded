<?php
$fastclick = of_get_option( 'general-fastclick' );
$smoothscroll = of_get_option( 'general-smoothscroll' );
$navbar_position = of_get_option( 'navbar-position' );
if ( $navbar_position == 'navbar-fixed-top' ) {
    $scroll_offset = 50;
} elseif ( $navbar_position == 'navbar-fixed-slider' ){
    $scroll_offset = 50;
} else {
    $scroll_offset = 0;
}
$slider_on = of_get_option( 'slider-on' );
$slider_height = of_get_option( 'slider-height' );
$navbar_transparent = of_get_option( 'navbar-transparent' );
$logo = of_get_option( 'general-logo' );
$blog_style = of_get_option( 'blog-style' );
$portfolio_style = of_get_option( 'portfolio-style' );
?>

<?php if ( $fastclick ) { ?>
<script type="text/javascript">
    //Fastclick
    
    jQuery(function () {
        FastClick.attach(document.body);
    });
</script>
<?php } ?>

<?php if ( $smoothscroll ) { ?>
    <script type="text/javascript">
        // Smooth Scroll to anchor

        jQuery(".scroll").on('click', function (e) {
            // prevent default anchor click behavior
            e.preventDefault();
            // animate
            jQuery('html, body').animate({
                scrollTop: jQuery(this.hash).offset().top - <?php echo $scroll_offset ?>
            }, 400, function () {
                // when done, add hash to url
                // (default click behaviour)
                //window.location.hash = this.hash;
            });
        });
    </script>
<?php } ?>

<?php if ($slider_on && $slider_height == '100%') { ?>
    <script type="text/javascript">
        <?php
            if(($navbar_position == 'navbar-static-top') || ($navbar_position == 'navbar-fixed-top' && !$navbar_transparent) || ($navbar_position == 'navbar-fixed-bottom') || ($navbar_position == 'navbar-fixed-slider')){
                if($logo){
                    $slider_offset = 95;
                } else {
                    $slider_offset = 50;
                };
            } else {
                $slider_offset = 0;
            }
        ?>
        function showViewportSize() {
            var the_height = jQuery(window).height() - <?php echo $slider_offset ?>;                   
            jQuery('#slider .item').css("height",the_height);
            <?php if ( $navbar_position == 'navbar-fixed-slider' ) { ?>
                jQuery('#masthead').affix({
                  offset: {
                    top: function() { return jQuery('#slider').height(); }
                  }
                }); 
            <?php } ?>
        }
        jQuery(document).ready(function(e) {
            showViewportSize();    
        });
        jQuery(window).resize(function(e) {
            showViewportSize();
        });
    </script>
<?php } ?>

<?php if ($navbar_position == 'navbar-fixed-slider') { ?>
<!-- A finir
    <script type="text/javascript">
        var midHeight = jQuery(window).height() / 2 //Splits screen in half
        var scrollTop = jQuery(window).scrollTop(),
        elementOffset = jQuery('#masthead').offset().top,
        distance      = (elementOffset - scrollTop);

        jQuery(window).scroll(function () {
            if (distance > midHeight) {
                //Do something on bottom
                //alert("Bellow 50%!");
            } else {
                //Do something on top
                alert("Above 50%!");
            }
        })
    </script>
-->
<?php } ?>

<?php  if( $blog_style == 'shuffle' || $portfolio_style == 'shuffle' || is_plugin_active('startup-cpt-products/startup-cpt-products.php')){ ?>
    <script type="text/javascript">
       //On utilise imagesloaded pour que Shuffle ne fasse pas de bug d'overlapping avec les tailles d'images responsives

        jQuery('#shuffle').imagesLoaded( function() {
          // images have loaded

            /* initialize shuffle plugin */
            var $grid = jQuery('#shuffle');

            $grid.shuffle({
                itemSelector: '.item' // the selector for the items in the grid
            });

            jQuery('#filter a').click(function (e) {
            e.preventDefault();

            // set active class
            jQuery('#filter a').removeClass('active');
            jQuery(this).addClass('active');

            // get group name from clicked item
            var groupName = jQuery(this).attr('data-group');

            // reshuffle grid
            $grid.shuffle('shuffle', groupName );
        });

        });
    </script>
<?php } ?>