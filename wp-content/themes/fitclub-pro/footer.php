<?php
/**
 * Theme Footer Section for our theme.
 *
 * Displays all of the footer section and closing of the #page div.
 *
 * @package ThemeGrill
 * @subpackage FitClub
 * @since FitClub 1.0
 */
?>
</div><!-- .body-content-wrapper -->
<footer id="colophon" role="contentinfo">

    <?php get_template_part('sidebar/footer'); ?>

    <div id="bottom-footer">
        <div class="tg-container">
            <?php do_action('fitclub_footer_copyright'); ?>

            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'footer',
                    'menu_id' => 'footermenu',
                    'container' => 'nav',
                    'container_class' => 'footer-menu',
                    'fallback_cb' => false
                )
            );
            ?>
        </div>
    </div>
</footer>
<a href="#" class="scrollup"><i class="fa fa-angle-up"> </i> </a>
</div><!-- #page -->
<?php wp_footer(); ?>


<script src="<?= get_template_directory_uri(); ?>/js/owl.carousel.min.js"></script>
<script src="<?= get_template_directory_uri(); ?>/js/owl.carousel2.thumbs.min.js"></script>
<script>
    jQuery(document).ready(function () {
        jQuery('#owl-1').owlCarousel({
            thumbs: true,
            thumbsPrerendered: true,
            items: 1
        });
    });
</script>
<!-- 1. Add latest jQuery and fancybox files -->
<script>
    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }
</script>
<?php
if(isset($_GET["pshow"])) { ?>
    <script>
        setCookie("city_chosen", "brovary", 1);
    </script>
<?php } elseif (!isset($_COOKIE['city_chosen'])) {
    if (isset($_COOKIE['redirect_disable'])) {
        setcookie('redirect_disable', '', time()-3600);
    } ?>
    <div class="overlay-city-choose"></div>
    <div class="city-choose-popup" id="hidden-content">
        <h2>Выберите ваш город:</h2>
        <div class="city-choose-popup-buttons">
            <a href="#" class="city-choose-popup-button redirect">Борисполь</a>
            <a href="#" class="city-choose-popup-button current">Бровары</a>
        </div>
    </div>
<?php } elseif (isset($_GET["rd"])) { ?>
    <script>
        setCookie("redirect_disable", "true", 1);
    </script>
<?php } elseif (($_COOKIE['city_chosen'] == 'borispol') && !isset($_COOKIE['redirect_disable'])) { ?>
    <script>
        window.location.href = "http://starfit.com.ua/";
    </script>
<?php
}
?>
<script>
    jQuery('.city-choose-popup-button.current').click(function (e) {
        e.preventDefault();
        jQuery('.overlay-city-choose').css('display', 'none');
        jQuery('.city-choose-popup').css('display', 'none');
        setCookie("city_chosen", "brovary", 1);
    });

    jQuery('.city-choose-popup-button.redirect').click(function (e) {
        e.preventDefault();
        setCookie("city_chosen", "borispol", 1);
        window.location.href = "http://starfit.com.ua/?pshow=0";
    });

    jQuery('#city_choose').on('change', function () {
        if (this.value == 'borispol') {
            window.location.href = "http://starfit.com.ua/?rd=true";
        }
    });
</script>
</body>
</html>
