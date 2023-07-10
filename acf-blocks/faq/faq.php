<?php

/**
 * Block template file: faq.php
 *
 * Faq Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */


// Common definition of $anchor, $module_classes, $container_classes
require(get_template_directory() . '/acf-blocks/module-classes.php');
array_unshift($module_classes, "module", "faq");
array_unshift($container_classes, "container bd-box");
?>
<div <?php echo $anchor; ?> class="<?php echo implode(" ", $module_classes);  ?>">
  <div class="<?php echo implode(" ", $container_classes); ?> grid12">
    <div class="entry-wrapper grid12-10">
      <?php if (have_rows('Block::faq:entry')) : ?>
        <?php while (have_rows('Block::faq:entry')) : the_row(); ?>
          <div class="entry">
            <input type="checkbox" class="faq-toggle">
            <div class="faq-question-wrapper">
              <div class="faq-question">
                <?php the_sub_field('question'); ?>
              </div>
              <i class="fa-regular fa-chevron-down"></i>
            </div>
            <div class="faq-answer">
              <?php the_sub_field('answer'); ?>
            </div>
          </div>
        <?php endwhile; ?>
      <?php else : ?>
        <?php // No rows found 
        ?>
      <?php endif; ?>
    </div>
  </div>
</div>