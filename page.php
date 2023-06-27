<?php

/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 */
?>

<?php get_header(); ?>
<?php if (is_front_page()) : ?>
  <div class="container">
    <?php the_content(); ?>
  </div>
<?php else : ?>
  <?php the_content(); ?>
<?php endif; ?>
<?php get_footer(); ?>