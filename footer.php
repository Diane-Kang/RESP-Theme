<?php

/**
 * The template for displaying the footer
 *
 */
?>

</main><!-- .site-main -->

<footer class="footer">
    <!-- <div class="footer__newsletter">
    <div class="container center">
      <div class="text">Jetzt über GeoMap informiert bleiben und unseren Newsletter bestellen!</div>
      <div class="btn btn--empty"><a href="#">jetzt anmelden</a>
      </div>
    </div>
  </div> -->
    <div class="footer__main">
        <!-- Logo conditional Villa starts -->
        <?php $villa = get_field('villa_styles_active', 'option'); ?>
        <?php if ($villa == "villa_true"): ?>
        <div class="villa-footer">
            <?php $logo = get_field('logo', 'option'); ?>
            <?php $brand = get_field('brand_text', 'option'); ?>
            <?php $street = get_field('strase', 'option'); ?>
            <?php $ort = get_field('ort', 'option'); ?>
            <?php $telefon = get_field('telefon', 'option'); ?>
            <?php $email = get_field('email', 'option'); ?>

            <div class="left">
                <?php if ($logo): ?>
                <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" />
                <?php endif; ?>
                <?php if ($brand): ?>
                <div class="brand-text"><?php echo $brand; ?></div>
                <?php endif; ?>
            </div>
            <?php if ($street): ?>
            <ul class=contact-nav>
                <li class="contact street"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                        <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
                    </svg><span class="street"><?php echo $street; ?></span><span class="sep">&#8226;</span>
                    <?php if ($ort): ?>
                    <span class="ort"><?php echo $ort; ?></span>
                </li>
                <?php endif; ?>
                <?php if ($telefon): ?>
                <li class="contact phone"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z" />
                    </svg><?php echo $telefon; ?></li>
                <?php endif; ?>
                <?php if ($email): ?>
                <li class="contact email"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z" />
                    </svg><?php echo $email; ?></li>
                <?php endif; ?>
            </ul>
            <?php endif; ?>
            <?php endif; ?>
            <?php getMenu($menu_name = 'footer', $depth = 2, $nav_class = 'container sitemap villa'); ?>
        </div>
        <!-- Logo conditional Villa Ends -->

        <!-- get Menu is defined in  template-parts/nav-functions.php-->
        <?php getMenu($menu_name = 'footer', $depth = 2, $nav_class = 'container sitemap'); ?>
        <?php getMenu($menu_name = 'social', $depth = 0, $nav_class = 'container social-media', $container = 'div'); ?>

</footer>

<?php wp_footer(); ?>

</body>

</html>