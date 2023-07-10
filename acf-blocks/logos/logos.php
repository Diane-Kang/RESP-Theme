<?php

/**
 * Block template file: logos.php
 *
 * Logos Block Template.
 * 
 */

// Common definition of $anchor, $module_classes, $container_classes
require(get_template_directory() . '/acf-blocks/module-classes.php');
array_unshift($module_classes, "module", "logos");
array_unshift($container_classes, "container", "bd-box");



?>
<div <?php echo $anchor; ?> class="<?php echo implode(" ", $module_classes);  ?>">
  <div class="<?php echo implode(" ", $container_classes); ?>">
    <?php if (have_rows('icons')) : ?>
      <?php while (have_rows('icons')) : the_row(); ?>
        <div class="logo-box">
          <div class="image-wrapper">
            <?php $image = get_sub_field('image'); ?>
            <?php if ($image) : ?>
              <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            <?php endif; ?>
          </div>
          <?php if (have_rows('textbox')) : ?>
            <div class="textbox-wrapper">
              <?php while (have_rows('textbox')) : the_row(); ?>
                <div class="text title">
                  <?php the_sub_field('title'); ?>
                </div>
                <div class="text">
                  <?php the_sub_field('text'); ?>
                </div>
              <?php endwhile; ?>
            </div>
          <?php endif; ?>
        </div>
      <?php endwhile; ?>
    <?php else : ?>
      <?php // No rows found 
      ?>
    <?php endif; ?>
  </div>
</div>