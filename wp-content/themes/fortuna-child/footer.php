
</div>
<!-- Page content::END -->
<?php
// Check if Header is disabled
$footer_is_off = false;
if (isset($post->ID)) {
    // Check Page Settings also
    $footer_is_off = get_post_meta($post->ID, 'boc_footer_is_off', true) == 'on' ? true : false;
}

if (!$footer_is_off) {

    // Get footer Options
    $footer_style = (bool) ot_get_option('footer_style');
    $footer_columns = (int) ot_get_option('footer_columns', 4);
    ?>

    <!-- Footer::Start -->
    <div id="footer" class="<?php echo (!$footer_style ? 'footer_light' : ''); ?>" <?php echo (!$footer_columns ? "style='padding-top:0;  border-top: 0;'" : ""); ?>>


        <?php
        // Handle Column count
        if ($footer_columns) {
            ?>
            <div class="mobile-footer" style="display:none">
                <div class="container">
                    <div class="row">
                        <button class="accordion"> <h2>FIND OUT MORE</h2></button>
                        <div class="panel">
                            <ul id="footer-menu"> 
                                <?php
                                wp_nav_menu(array(
                                    'menu' => 'footer menu',
                                    'container' => 'false',
                                    'items_wrap' => '%3$s'
                                ));
                                ?>
                            </ul>
                        </div>

                        <button class="accordion">HEAD OFFICE</button>
                        <div class="panel">
                            <?php dynamic_sidebar('Footer Widget 1'); ?>
                        </div>

                        <button class="accordion">OUR LOCATIONS</button>
                        <div class="panel">
                            <?php dynamic_sidebar('Footer Widget 2'); ?>
                        </div>

                    </div>
                    <div class="row">
                        <div class="form">
                            <?php dynamic_sidebar('Footer Widget 3'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container footer-desk">	
                <div class="row" >
                    <h2>FIND OUT MORE</h2>
                    <ul id="footer-menu"> 
                        <?php
                        wp_nav_menu(array(
                            'menu' => 'footer menu',
                            'container' => 'false',
                            'items_wrap' => '%3$s'
                        ));
                        ?>
                    </ul>
                </div>
                <div class="section">

                    <?php
                    // Loop Columns
                    for ($i = 1; $i <= $footer_columns; $i++) {
                        ?>

                        <div class="col span_1_of_<?php echo $footer_columns; ?> wid-<?php echo $i; ?>">
                            <?php if (!dynamic_sidebar('Footer Widget ' . $i)) : ?>			
                                <h3 class="widgettitle">Footer Widget Area <?php echo $i; ?></h3>
                                <p><a href="<?php echo admin_url('widgets.php'); ?>">Assign a widget to this area now.</a></p>	
                            <?php endif; // end widget area  ?>	
                        </div>

                    <?php } ?>

                </div> 
            </div>

        <?php } ?>

        <div class="footer_btm" <?php echo (($footer_columns == 0) ? " style='margin-top: 0;'" : ""); ?>>
            <div class="container">
                <div class="footer_btm_inner">

                    <?php
                    if (is_array($footer_icons = ot_get_option('footer_icons'))) {
                        $footer_icons = array_reverse($footer_icons);
                        foreach ($footer_icons as $footer_icon) {
                            echo "<a target='_blank' class='footer_soc_icon' href='" . $footer_icon['icons_url_footer'] . "'>
											<span class='icon " . $footer_icon['icons_service_footer'] . "' title='" . esc_attr($footer_icon['title']) . "'></span>
										  </a>";
                        }
                    }
                    ?>

                    <div id="powered"><p class="copy-right"><?php echo ot_get_option('copyrights'); ?></p></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer::END -->
<?php } ?>  
<?php // echo do_shortcode('[slick-slider]'); ?>
<section class="links-sidebar">
    <div class="sticky-container">
        <ul class="sticky">
            <li><a href="<?php echo get_theme_mod('email_link'); ?>" target="_blank">
                <i class="fas fa-envelope-open"></i>
                <p><?php echo get_theme_mod('email_text'); ?></p></a>
            </li>
            <li><a href="<?php echo get_theme_mod('phone_no'); ?>" target="_blank">
                <i class="fas fa-phone-volume"></i>
                <p><?php echo get_theme_mod('phone_text'); ?></p></a>
            </li>
            <li><a href="<?php echo get_theme_mod('get_quote_link'); ?>" target="_blank">
                <i class="fas fa-quote-right"></i>
                <p><?php echo get_theme_mod('get_quote_text'); ?></p></a>
            </li>

        </ul>
    </div>
</section>


<!-- Page wrapper::END -->


<?php wp_footer(); ?>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
    jQuery(".regular").slick({
        speed: 3000,
        autoplay: true,
        infinite: true,
        autoplaySpeed: 0,
        cssEase: 'linear',
        slidesToShow: 5,
        slidesToScroll: 1,
        arrows: false,
        pauseOnHover: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 5,
                    slidesToScroll: 1,
                    infinite: true
                    
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });
jQuery(".blog-main-slider.slider").slick({
        speed: 4000,
        autoplay: true,
        infinite: true,
        autoplaySpeed: 0,
        cssEase: 'linear',
        slidesToShow: 2,
        slidesToScroll: 1,
        arrows: false,
//         prevArrow: "<a href='#' class='prev'><i class='fas fa-chevron-left'></i></a>",
//    nextArrow: "<a href='#' class='next'><i class='fas fa-chevron-right'></i></a>",
        pauseOnHover: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true
                    
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });
    
    jQuery(document).ready(function () {
        jQuery("#secondary-menu ul li.discover-menu").click(function () {
            jQuery('html, body').animate({
                scrollTop: jQuery("#discover").offset().top
            }, 1000);
        });
        jQuery("#secondary-menu ul li.catch-menu").click(function () {
            jQuery('html, body').animate({
                scrollTop: jQuery("#catch").offset().top
            }, 1000);
        });
    });

    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function () {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.display === "block") {
                panel.style.display = "none";
            } else {
                panel.style.display = "block";
            }
        });
    }

jQuery(document).ready(function(){
	jQuery('.service1 .list-boxes').wrapAll("<div class='list-box-main' />");
	jQuery('.service2 .list-boxes').wrapAll("<div class='list-box-main' />");
	jQuery('.service3 .list-boxes').wrapAll("<div class='list-box-main' />");
	jQuery('.service4 .list-boxes').wrapAll("<div class='list-box-main' />");
 });
 
   var $ = jQuery;
    $(document).ready(function () {
        if ($('.second-nav-fixed').length > 0) { 
    // it exists 

        // grab the initial top offset of the navigation 
        var stickyNavTop = $('.second-nav-fixed').offset().top + 300;
        // our function that decides weather the navigation bar should have "fixed" css position or not.
        var stickyNav = function () {
            var scrollTop = $(window).scrollTop(); // our current vertical position from the top
            // if we've scrolled more than the navigation, change its position to fixed to stick to top,
            // otherwise change it back to relative
            if (scrollTop > stickyNavTop) {
                $('#secondary-menu.second-nav-fixed').addClass('fixed-nav');
                $('#secondary-menu.second-nav').addClass('disable-nav');
            } else {
                $('#secondary-menu.second-nav-fixed').removeClass('fixed-nav');
                $('#secondary-menu.second-nav').removeClass('disable-nav');
            }
        };
        stickyNav();
        // and run it again every time you scroll
        $(window).scroll(function () {
            stickyNav();
        });
    }
    });
    
</script>
</body>
</html>