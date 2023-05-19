<?php

/**
 * The template for displaying the footer
 *
 */
?>

</main><!-- .site-main -->

<footer class="footer">
  <div class="footer__newsletter">
    newsletter
  </div>
  <div class="footer__main">
    <div class="container">
      <div class="sitemap">
        <?php getMenu($menu_name = 'footer', $depth = 2); ?>
      </div>
    </div>
    <?php getMenu($menu_name = 'social'); ?>
  </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>