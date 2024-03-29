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
$margin_classes = $container_classes;
$container_classes = [];
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

// Block Title        
$title_text           = get_field('block::section-title:text');
$title_tag            = get_field('block::section-title:tag');

// Image text fields 
$order              = get_field('block::imagetext:position');
$column             = 'ratio--' . get_field('block::imagetext:column');
$image              = get_field('block::imagetext:image');
$text_content       = get_field('block::imagetext:text');

array_push($container_classes, $order,  $column, "bd-box");


?>

<div <?php echo $anchor; ?> class="<?php echo implode(" ", $module_classes);  ?>">
  <div class="outter-container <?php echo implode(" ", $margin_classes); ?>">
    <?php if (isset($title_text)) : ?>
      <?php echo '<' . $title_tag . ' class ="section-title">' . $title_text . '</' . $title_tag . '>'; ?>
    <?php endif ?>
    <div class="<?php echo implode(" ", $container_classes); ?>">
      <div class="imagetext__image center">
        <?php if ($image) : ?>
          <?php echo wp_get_attachment_image($image, 'medium_large'); ?>
        <?php endif ?>
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
</div>