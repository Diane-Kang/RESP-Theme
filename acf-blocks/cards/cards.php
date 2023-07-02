<?php

/**
 * Card-List Block Template.
 *
 */

// Common definition of $anchor, $module_classes, $container_classes
require(get_template_directory() . '/acf-blocks/module-classes.php');
array_unshift($module_classes, "module", "cards");
array_unshift($container_classes, "container");

// Options for Module:cards
$graphic_type       = get_field('block::cards:image-type') == "image" ? "" : "graphic-icon";
$order              = get_field('block::cards:order');

array_push($module_classes, $graphic_type, $order);

?>

<div <?php echo $anchor; ?> class="<?php echo implode(" ", $module_classes);  ?>">
  <div class="<?php echo implode(" ", $container_classes); ?>">
    <?php if (have_rows('block::cards:card')) : ?>
      <?php while (have_rows('block::cards:card')) : the_row(); ?>
        <div class="card flex">
          <div class="card--inner flex flex-col">
            <div class="card__image flex">
              <?php $card_image = get_sub_field('card_image'); ?>
              <?php if ($card_image) : ?>
                <img src="<?php echo esc_url($card_image['url']); ?>" alt="<?php echo esc_attr($card_image['alt']); ?>" />
              <?php endif; ?>
            </div>
            <div class="card__text-content flexible flex flex-col">
              <?php $content = get_sub_field('content'); ?>
              <h3 class="heading heading3 text-center"><?php echo $content["title"] ?></h3>
              <div class="text flexible">
                <?php echo $content["paragraph"]; ?>
              </div>
              <!-- only if button exist -->
              <?php $buttons = $content["buttons"] ?>
              <?php $button1link = $buttons["block::buttons:btn1-link"] ?>
              <?php $button1type = $buttons["block::buttons:btn1-type"] ?>
              <?php $button2link = $buttons["block::buttons:btn2-link"] ?>
              <?php $button2type = $buttons["block::buttons:btn2-type"] ?>
              <?php if (!empty($button1link) || !empty($button1link)) : ?>
                <div class="buttons flex flex-col">
                  <?php if ($button1link != "") : ?>
                    <a href="<?php echo esc_url(parse_url($button1link["url"], PHP_URL_PATH)); ?>" class="btn btn--<?php echo $button1type ?>" target="<?php echo $button1link["target"] ?>"> <?php echo $button1link["title"] ?> </a>
                  <?php endif; ?>
                  <?php if ($button2link != "") : ?>
                    <?php if ($button2type != "link") : ?>
                      <a href="<?php echo esc_url(parse_url($button2link["url"], PHP_URL_PATH)); ?>" class="btn btn--<?php echo $button2type ?>" target="<?php echo $button2link["target"] ?>"> <?php echo $button2link["title"] ?> </a>
                    <?php endif; ?>
                    <?php if ($button2type == "link") : ?>
                      <a href="<?php echo esc_url(parse_url($button2link["url"], PHP_URL_PATH)); ?>" class="link link--underline" target="<?php echo $button2link["target"] ?>"> <?php echo $button2link["title"] ?> </a>
                    <?php endif; ?>
                  <?php endif; ?>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    <?php else : ?>
      <?php // No layouts found 
      ?>
    <?php endif; ?>

  </div>
</div>