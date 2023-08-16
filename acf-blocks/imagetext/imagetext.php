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
      <?php if (!empty($text_content)) : ?>
        <div class="editor-content">
          <?php echo $text_content ?>
        </div>
      <?php endif; ?>
      <!-- only if button exist -->
      <?php if (!empty($button1link) || !empty($button2link)) : ?>
        <div class="buttons--wrapper">
          <?php echo acf_relative_path($button1link, $button1type); ?>
          <?php echo acf_relative_path($button2link, $button2type); ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>