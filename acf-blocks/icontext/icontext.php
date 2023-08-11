<?php

/**
 * Card-List Block Template.
 *
 */

// Common definition of $anchor, $module_classes, $container_classes
require(get_template_directory() . '/acf-blocks/module-classes.php');
array_unshift($module_classes, "module", "icontext");
array_unshift($container_classes, "container");

// Options for Module:icontext
$align              = get_field('block::icontext:align');

array_push($module_classes, $align);

?>



<div <?php echo $anchor; ?> class="<?php echo implode(" ", $module_classes);  ?>">
  <div class="<?php echo implode(" ", $container_classes); ?>">
    <?php if (have_rows('block::icontext:cards')) : ?>
      <?php while (have_rows('block::icontext:cards')) : the_row(); ?>
        <?php $order = get_sub_field('order'); ?>
        <div class="card">
          <?php $card_image = get_sub_field('icon'); ?>
          <?php if ($card_image) : ?>
            <div class="card__image flex <?php echo ($order == 'left') ? 'left' : 'right'; ?>">
              <img src="<?php echo esc_url($card_image['url']); ?>" alt="<?php echo esc_attr($card_image['alt']); ?>" />
            </div>
          <?php endif; ?>
          <div class="card__text <?php echo ($order == 'left') ? 'right' : 'left'; ?>">
            <?php $content = get_sub_field('content'); ?>
            <?php if (!empty($content)) : ?>
              <div class="text-editor">
                <?php echo $content; ?>
              </div>
            <?php endif; ?>
          </div>
        </div>
      <?php endwhile; ?>
    <?php else : ?>
      <?php // No layouts found 
      ?>
    <?php endif; ?>
  </div>
</div>