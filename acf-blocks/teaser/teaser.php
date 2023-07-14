<?php

/**
 * Block template file: teaser.php
 *
 * Teaser Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
// Support custom "anchor" values.

// Common definition of $anchor, $module_classes, $container_classes
require(get_template_directory() . '/acf-blocks/module-classes.php');
array_unshift($module_classes, "module", "teaser");
array_unshift($container_classes, "container");

// Buttons 
$button1 = get_field('button1');
if ($button1) {
  $button1link        = $button1['block::buttons:btn1-link'];
  $button1type        = $button1['block::buttons:btn1-type'];
}
$button2 = get_field('button2');
if ($button2) {
  $button2link        = $button2['block::buttons:btn2-link'];
  $button2type        = $button2['block::buttons:btn2-type'];
}

// Teaser block options 
$teaser_height      = get_field('block::teaser:height') != "none" ?  get_field('block::teaser:height') : '';
$teaser_textcolor   = "fc--" . get_field('block::teaser:textcolor');
// Teaser background Image 
$image              = get_field('block::teaser:image');
$image_url          = $image ? esc_url($image['url']) : NULL;
// Teaser text content
$text_content       = get_field('block::teaser:content');

array_push($module_classes);
array_push($container_classes,  $teaser_height, $teaser_textcolor);


?>
<div <?php echo $anchor; ?> class="<?php echo implode(" ", $module_classes);  ?>">
  <div class="<?php echo implode(" ", $container_classes); ?>">
    <div class="teaser__bg-image" style="
              background-image: url('<?php echo $image_url; ?>');
            "></div>
    <div class="teaser__bg-gradient"></div>
    <div class="teaser__content">
      <div class="teaser__text text-center">
        <?php echo $text_content ?>
      </div>
      <?php if (!empty($button1link) || !empty($button1link)) : ?>
        <!-- only if button exist -->
        <div class="buttons--wrapper">
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