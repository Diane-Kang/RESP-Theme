<?php

/**
 * The template for displaying the footer
 *
 */
?>

</main><!-- .site-main -->

<footer class="footer">
  <div class="footer__newsletter">
    <div class="container center">
      <div class="text">Jetzt über GeoMap informiert bleiben und unseren Newsletter bestellen!</div>
      <div class="btn btn--empty"><a href="#">jetzt anmelden</a>
      </div>
    </div>
  </div>
  <div class="footer__main">
    <!-- get Menu is defined in  template-parts/nav-functions.php-->
    <?php getMenu($menu_name = 'footer', $depth = 2, $nav_class = 'container sitemap'); ?>
    <?php getMenu($menu_name = 'social', $depth = 0, $nav_class = 'container social-media', $container = 'div'); ?>
  </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>