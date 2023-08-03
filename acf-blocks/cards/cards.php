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
        <div class="card">
          <div class="card--inner">
            <?php $card_image = get_sub_field('card_image'); ?>
            <?php if ($card_image) : ?>
              <div class="card__image flex">
                <img src="<?php echo esc_url($card_image['url']); ?>" alt="<?php echo esc_attr($card_image['alt']); ?>" />
              </div>
            <?php endif; ?>
            <div class="card__text-content flexible flex flex-col">
              <?php $content = get_sub_field('content'); ?>
              <h4 class="heading"><?php echo $content["title"] ?></h4>
              <div class="text flexible">
                <?php if (!empty($content["paragraph"])) : ?>
                  <div class="text-editor">
                    <?php echo $content["paragraph"]; ?>
                  </div>
                <?php endif; ?>
              </div>
              <!-- only if button exist -->
              <?php if (!empty($content["buttons"])) {
                $buttons = $content["buttons"];
                $button1link = $buttons["button1"]["block::buttons:btn1-link"];
                $button1type = $buttons["button1"]["block::buttons:btn1-type"];
                $button2link = $buttons["button2"]["block::buttons:btn2-link"];
                $button2type = $buttons["button2"]["block::buttons:btn2-type"];
              } ?>

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