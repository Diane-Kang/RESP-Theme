<?php

/**
 * The template for displaying the footer
 *
 */
?>

</main><!-- .site-main -->

<footer class="footer">
  <div class="container container--wide">
    <div class="footer__newsletter center border">
      <div class="text">
        Jetzt über GeoMap informiert bleiben und unseren Newsletter bestellen!
      </div>
      <div class="btn btn--empty">
        Jetzt anmelden
      </div>
    </div>
    <div class="footer__sitemap">
      <?php getMenu($menu_name = 'footer', $depth = 2); ?>
      <?php getMenu($menu_name = 'social'); ?>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>