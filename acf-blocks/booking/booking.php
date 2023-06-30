<?php

/**
 * Block template file: booking.php
 *
 * Booking Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */


// Get values from ACF Fields 

// Common definition of $anchor, $module_classes, $container_classes
require(get_template_directory() . '/acf-blocks/module-classes.php');
array_unshift($module_classes, "module", "booking");
array_unshift($container_classes, "container");



?>
<div <?php echo $anchor; ?> class="<?php echo implode(" ", $module_classes); ?>">
  <div class="<?php echo implode(" ", $container_classes); ?>">
    <?php if (have_rows('buchen_option')) : ?>
      <?php while (have_rows('buchen_option')) : the_row(); ?>
        <?php if (have_rows('offer')) : ?>
          <?php while (have_rows('offer')) : the_row(); ?>
            <div class="block">
              <div class="block-inner">
                <div class="image">
                  <?php $grafik = get_sub_field('grafik'); ?>
                  <img src="<?php echo esc_url($grafik['url']); ?>" alt="<?php echo esc_attr($grafik['alt']); ?>" />
                </div>
                <div class="content">
                  <?php $text = get_sub_field('text'); ?>
                  <h4 class="title">
                    <?php echo $text["title"] ?>
                  </h4>
                  <div class="paragraph">
                    <?php echo $text["paragraph"] ?>
                  </div>
                  <h4 class="price">
                    <?php echo $text["price"] ?> €
                  </h4>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        <?php endif; ?>
      <?php endwhile; ?>
    <?php else : ?>
      <?php // No rows found 
      ?>
    <?php endif; ?>
  </div>
</div>