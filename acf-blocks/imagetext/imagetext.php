<?php

/**
 * Block template file: imagetext.php
 *
 * Imagetext Block Template.
 */

// Get values from ACF Fields 

// Common definition of $anchor, $module_classes, $container_classes
require(get_template_directory() . '/acf-blocks/module-classes.php');
array_unshift($module_classes, "module", "imagetext");
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

// Image text fields 
$order              = get_field('block::imagetext:position');
$column             = 'ratio--' . get_field('block::imagetext:column');

$image              = get_field('block::imagetext:image');
$content_title      = get_field('block::imagetext:title');
$text_content       = get_field('block::imagetext:text');

array_push($container_classes, $order,  $column, "bd-box");


?>

<div <?php echo $anchor; ?> class="<?php echo implode(" ", $module_classes);  ?>">
  <div class="<?php echo implode(" ", $container_classes); ?>">
    <div class="imagetext__image center">
      <img src="<?php echo esc_url($image['url']); ?>" alt="" />
    </div>
    <div class="imagetext__textbox flex flex-col">
      <div class="content flex flex-col">
        <h3 class="heading heading3"><?php echo $content_title ?> </h3>
        <?php if (!empty($text_content)) : ?>
          <div class="text-editor">
            <?php echo $text_content ?>
          </div>
        <?php endif; ?>
      </div>
      <?php if (!empty($button1) || !empty($button2)) : ?>
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